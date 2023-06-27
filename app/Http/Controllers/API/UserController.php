<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Image;
use App\Models\UserIntrest;
use App\Models\UserMedicalCondition;
use App\Models\Heart;
use App\Models\HelpAndSupport;
use App\Models\Notification;
use App\Models\Recommendation;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Auth;
use Hash;
use Mail;
use App\Mail\SendCodeMail;
use Session;
use Jenssegers\Agent\Agent;
use Mobile_Detect;
use DB;


/*use Carbon\Carbon;
use File;
use Image;*/

class UserController extends Controller
{

    /* Authentications */
    public function verify_otp(Request $request) {
        $user_id = auth()->user()->id;
        $validator = Validator::make($request->all(), [
            'code' => ['required'],
        ]);
        if ($validator->fails()) {
            return response()->json(['message'=>$validator->messages()->first(),'success' => false]);
        }
         $user = User::find($user_id);

        if ($user->otp != $request->code) {
            return response()->json(['message'=>'Invalid OTP','success' => false]);
        }
        $user->update(['verified_by_number'=>1]);
        return response()->json([
        'success' => true,
        'message' => 'OTP Verifed',

        ]);


    }
    public function send_otp(Request $request){
        $validator = Validator::make($request->all(), [

            'phone' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json(['message'=>$validator->messages()->first(),'success' => false]);
        }
        $check_phone = User::where('phone',$request->phone)->where('verified_by_number',1)->first();
        if (isset($check_phone)) {
            return response()->json(['message'=>"Phone Number Already Exist",'success' => false]);
        }
         $user = User::find(auth()->user()->id);

        // $min = 100000;
        // $max = 999999;
        //  $otp = rand($min,$max );
        $otp = 1234;
        $user->update([
            'phone' =>$request->phone,
            'otp' =>$otp ,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Otp send to your number '.$request->phone,
            'otp' => $otp
        ]);
    }

    public function register(Request $request)
   	{
        $checkEmail = User::where('email',$request->email)->first();
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);


        if(!$request->password)
        {
            return response()->json([
                'success' => false,
                'message' => 'Password is required'
            ]);
        }

        if($checkEmail){
            return response()->json([
                'success' => false,
                'message' => 'Email already exits'
            ]);
        }
        $data = $request->except(['confirm_password'],$request->all());
        if($request->hasFile('profile'))
        {
            $img = Str::random(20).$request->file('profile')->getClientOriginalName();
            $data['profile'] = $img;
            $request->profile->move(public_path("documents/profile"), $img);
        }else{
            $data['profile'] = 'default.png';
        }

        $data['role_id'] = 'user';
        $data['password'] = Hash::make($request->password);
        $data['status']   = 0;
        // $data['reference_link'] = 'ref'.Str::random(10) . '-' .time();
        if (session()->has('link')) {
            $sender_id = User::where('reference_link',session()->get('link'))->first()->id;
            $data['reference_id'] = $sender_id;
            $user = User::create($data);
            // $invite = Invite::create([
            // 'recever_id' => $user->id,
            // 'sender_id' => $sender_id,

            // ]);
            session()->forget('link');
        }else{

          $user = User::create($data);
        }

        if($user)
        {
            $user->assignRole('user');
            return response()->json([
            'success' => true,
            'message' => 'Account Created'
            ]);

        }else{
            return response()->json([
            'success' => false,
            'message' => 'User has not added please try again'
            ]);
        }



	}

	public function authenticate(Request $request)
	{
        if(!$request->email)
        {
            return response()->json([
                'success' => false,
                'message' => 'Email is required'
            ]);

        }else if(!$request->password)
        {
           return response()->json([
                'success' => false,
                'message' => 'Password is required'
            ]);
        }

		$credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);
		if (Auth()->attempt($credentials))
        {
            $user_login_token= Auth()->user()->createToken('love-love')->accessToken;
            $profile_path = asset('documents/profile/'.auth()->user()->profile);


            User::where('id',auth()->id())->update([
                'lon' => isset($request->lon)? $request->lon : auth()->user()->lon,
                'lat' => isset($request->lat)? $request->lat : auth()->user()->lat,
            ]);
            $user = User::find(auth()->id());
            return response()->json([
	            'token'	  => $user_login_token,
                'profile_path' =>$profile_path,
	            'success' => true,
	            'data' 	  => $user
	        ]);
		}
        else
        {

            return response()->json([
                'success' => false,
                'message' => 'Email or Password is invalid'
            ]);
		}

	}

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'age' => ['required'],
            'preferred_name' => ['required'],
            'education' => ['required'],
            'gender' => ['required'],
            'city' => ['required'],
            'country' => ['required'],
            'about'=> ['required'],

        ]);
        if ($validator->fails()) {
            return response()->json(['message'=>$validator->messages()->first(),'success' => false]);
        }

        $user = $request->except(['images','intrest_id','medical_condition_id'],$request->all());
        $intrest =json_decode($request->intrest_id);
        $medical_condition =json_decode($request->medical_condition_id);
        // Add Intrests
        if (isset($intrest[0])) {
            UserIntrest::where('user_id',auth()->user()->id)->whereNotIn('intrest_id',$intrest)->delete();
            foreach ($intrest as $key => $value) {
                $check_user_intrest = UserIntrest::where('user_id',auth()->user()->id)->where('intrest_id',$value)->first();

                if (!$check_user_intrest) {
                    UserIntrest::Create([
                    'user_id' =>auth()->user()->id,
                    'intrest_id'=>$value
                    ]);
                }
            }
        }
        // Add Medical Condition
        if (isset($medical_condition[0])) {
            UserMedicalCondition::where('user_id',auth()->user()->id)->whereNotIn('medical_condition_id',$medical_condition)->delete();
            foreach ($medical_condition as $key => $value) {
                $check_user_medical_condition = UserMedicalCondition::where('user_id',auth()->user()->id)->where('medical_condition_id',$value)->first();
                if (!$check_user_medical_condition) {
                    UserMedicalCondition::Create([
                    'user_id' =>auth()->user()->id,
                    'medical_condition_id'=>$value
                    ]);
                }
            }
        }

        if ($request->account_for_id && $request->account_for_id != 1) {
            $user['reference_link '] = $this->CreateRefLink(auth()->user()->id);
        }
        $data->update($user);

        $nofication = Notification::Create([
            'user_id' =>auth()->user()->id,
            'description'=>'New Profile Request',
            'type'=>'request',
            'status'=>0
        ]);

        return response()->json([
            'message'=> "Profile Update Successfilly",
            'success' => true]);

    }

   public function uploadImg(Request $request){
        $data = User::find(auth()->user()->id);
        $imagePaths = [];
        $addImg = [];
        $user = [];
        $validator = Validator::make($request->all(), [
            'images' => ['required'],
        ]);
        if ($validator->fails()) {
            return response()->json(['message'=>$validator->messages()->first(),'success' => false]);
        }
        if($request->hasFile('images'))
        {
            foreach ($request->file('images') as $key => $image) {

                $img = Str::random(20).$image->getClientOriginalName();

                $image->move(public_path("documents/images"), $img);
                // return $imagePaths[$key] = $img;


                if ($key == 0) {

                    $data->update(['profile'=>$img]);
                }else{
                    $addImg = Image::create([
                    'user_id'=> auth()->user()->id,
                    'image'=>$img
                    ]);
                }

            }
        }
        return response()->json([
            'message'=> "Images Upload Successfilly",
            'success' => true]);



    }
    public function ForgetPasswordEmail1(Request $request)
	{
		$emailAddress   = $request->email;
		$checkEmailExist = User::where('email', $emailAddress)->first();
        if($checkEmailExist)
        {
            //generate six digits code
            // return str_random(1,20);
             $six_digit_random_number = mt_rand(1000, 9999);

            $setCode = User::where('email', $emailAddress)->update([
                'forget_password_code'  => $six_digit_random_number
            ]);

            if($setCode)
            {
               return response([
                    'success' => true,
                    'message' => 'Successfully Code generated',
                    'data'      => [
                        'id'    => $checkEmailExist->id,
                        'email' => $checkEmailExist->email
                    ]
                ]);
            }
            else
            {
                return response([
                    'success' => false,
                    'message' => 'Failed to generate code'
                ]);
            }
        }
        else
        {
            return response([
                'success' => false,
                'message' => 'Email not exists'
            ]);
        }
	}

    public function ForgetPasswordEmail(Request $request)
    {
        if($request->has("email")){
           $user = User::where('email',$request->email)->get()->first();
            if($user){

                $email = $user->email;
                $fourRandomDigit = mt_rand(1000, 9999);
                User::where('email',$request->email)->update(['forget_password_code'=>$fourRandomDigit]);
                $data = array('otp'=>$fourRandomDigit);
                $details = [
                'title' => 'Mail from ItSolutionStuff.com',
                'code' => $fourRandomDigit
                ];
                  $check = Mail::to($request->email)->send(new SendCodeMail($details));

                // $send = Mail::send("mail", $data, function($message) use($email) {
                // $message->to($email)->subject('You have requested to reset your password');
                // $message->from('bharat@gmail.com','');
                // });
                 return response([
                    'success' => true,
                    'message' => 'Otp has been send to your email',
                    'code'    => $fourRandomDigit,
                    'id'      =>$user->id
                 ]);

            }else{

                 return response([
                    'success' => false,
                    'message' => 'Invalid Email'
                 ]);
            }
        }else
        {
             return response([
                'success' => false,
                'message' => 'Please provide email'
            ]);

        }
    }

    public function checkForgetPasswordCodeVerification(Request $request)
	{
		$code = $request->code;
        // $id   = $request->id;

        $checkEmailCode = User::where('forget_password_code', $code)->first();
        if($checkEmailCode == null)
            return response([
                'success' => false,
                'message' => 'Invalid Code'
            ]);
        else
            return response([
                'success'   => true,
                'message'   => 'Code matched successfully'
            ]);
    }

    public function updateForgetPassword(Request $request)
    {
        $id = $request->id;
        $password = $request->password;

        $passwordHash   = Hash::make($password);
        $updatePassword = User::find($id)->update(['password' => $passwordHash]);
        if($updatePassword)
        {
            return response([
                'success'   => true,
                'message'   => 'Password updated successfully'
            ]);
        }
        else
        {
            return response([
                'success' => false,
                'message' => 'Failed'
            ]);
        }
    }

    public function changePassword(Request $request)
    {

        // $token= request()->bearerToken();
		#Match The Old Password
        if(!Hash::check($request->oldPassword, auth()->user()->password))
            return response([
                'success' => false,
                'message' => "Old Password Doesn't match!"
            ]);

            #Update the new Password

            User::find(auth()->user()->id)->update([
                'password' => Hash::make($request->newPassword)
        ]);

        return response([
            'success'   => true,
            'message'   => 'Password updated successfully'
        ]);
	}

    public function logout(Request $request)
    {
        return $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }

    /* Profiles */
    public function checkProfileStatus(){
        $id = auth()->user()->id;
        $data = User::where('id',$id)->whereNotNull([
            'first_name',
            'last_name',
            'age',
            'preferred_name',
            'education',
            'gender',
            'email',
            'city',
            'country',
            "profile_for",
            'about',
        ])->where('verified_by_number',1) ->first();
        if (isset($data)) {
            return response()->json(['message'=>'Profile Complete','success' => true]);
        }
        return response()->json(['message'=>'Profile Uncomplete','success' => false]);
    }
    public function filter(Request $request){

        $lat = auth()->user()->lat;
        $lon = auth()->user()->lon;
        $search = $request->search;
        $data  = User::query();
        $data  = $data->select('*');
        $age =[];
        $data = $data->selectRaw('6371 * acos(cos(radians(' . $lat . ')) * cos(radians(users.lat)) * cos(radians(users.lon) - radians(' . $lon . ')) + sin(radians(' . $lat . ')) * sin(radians(users.lat))) AS distance') ;

        if ( isset($request->distance)) {
            $data =  $data->having('distance', '=', $request->distance);
            // $data =  $data->havingBetween('distance', [0, $request->distance]);
        }
        if ($request->has('gender') && isset($request->gender)) {

            $data->where('gender', 'like', '%' . $request->gender . '%');
        }

        if (isset($request->age)) {
            $age = explode(',', $request->age);
            // $data->where('age', $request->age);
            $data->whereBetween('age', [$age[0], $age[1]]);
        }
        if (isset($request->search)) {
            $data->where('first_name', 'like', "%{$search}%")
            ->orwhere('last_name', 'like', "%{$search}%")
            ->orwhere('mid_name', 'like', "%{$search}%");

        }
        $data = $data->where('status',1)
        ->where('role_id','user')
        ->with('images') ;
        $data = $data->get();

        return response()->json(['data'=>$data,'success' => true]);
    }
    public function discover(){
        $users = User::where('status',1)->where('role_id','user')->with('images')->select('first_name','last_name','mid_name','age','about','role_id','email','id','profile')->get();
        $data = $this->isHeart($users);
        return response()->json(['data'=>$data,'success' => true]);
    }

    public function discoverView($id){
        $users = User::with(['user_intrest.intrest','user_medical_condition.medical_condition'])
        ->where('status',1)
        ->where('role_id','user')
        ->where('id',$id)
        ->with('images')
        ->select('first_name','last_name','mid_name','age','about','role_id','email','id','profile','city','country')
        ->get();
        $data = $this->isHeart($users);
        return response()->json(['data'=>$data,'success' => true]);
    }
    // Hearts
    function receivedHearts() {
        $user_id = auth()->user()->id;
        $data = Heart::with('user_sender')
        ->where('receiver_id', $user_id)
        ->selectRaw('sender_id AS user_id')
        ->where('status', 0)
        ->get()->map(function ($heart) {
        $heart->user = $heart->user_sender;
        return $heart;
    });

        return response()->json(['data'=>$data,'success' => true]);
    }
    function sendHearts() {
        $user_id = auth()->user()->id;
        $data = Heart::with('user_receiver')->where('sender_id',$user_id)->selectRaw('receiver_id AS user_id')->where('status',0)
        ->get()->map(function ($heart) {
            $heart->user = $heart->user_receiver;
            return $heart;
        });

        return response()->json(['data'=>$data,'success' => true]);
    }
    public function sendHeartRequest($receiver_id)
    {
        $receiver_user = User::where('id',$receiver_id)->first();
        $sender_user = auth()->user()->id;

        if (!$receiver_user) {
             return response()->json(['message'=>'User Not Found','success' => false]);
        }
        if ($receiver_user->id == $sender_user) {
             return response()->json(['message'=>'Something went wrong','success' => false]);
        }
        $check = Heart::where('receiver_id',$receiver_user->id)->where('sender_id',$sender_user)->first();
        if ($check) {
            return response()->json(['message'=>'Already Send a request','success' => false]);
        }
        Heart::Create([
            'receiver_id'=>$receiver_user->id,
            'sender_id'=>$sender_user,

        ]);
        return response()->json(['message'=>'Heart Send Successfully','success' => true]);
    }

    public function acceptHeartRequest(Request $request)
    {
        $receiver_id = auth()->user()->id;
        $sender_id = $request->user_id;
        $data = Heart::where('sender_id',$sender_id)->where('receiver_id',$receiver_id)->where('status',0)->first();
        if(!isset($data)){
            return response()->json([
                'success' => true,
                'message' => 'User  Not Found'
            ]);
        }
        $data->update([
            'status'=>1
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Request Accept Sucessfully'
        ]);
    }

    public function cancelHeartRequest(Request $request)
    {
        $receiver_id = auth()->user()->id;
        $sender_id = $request->user_id;
        $data = Heart::where('sender_id',$sender_id)->where('receiver_id',$receiver_id)->first();
        if(!isset($data)){
            return response()->json([
                'success' => true,
                'message' => 'User  Not Found'
            ]);
        }
        $data->delete();

        return response()->json([
            'success' => true,
            'message' => 'Request Cancel Sucessfully'
        ]);
    }


    public function invalid(Request $request)
    {

        $mobileDetect = new Mobile_Detect($request->server->all());

        if ($mobileDetect->isMobile()) {
            if ($mobileDetect->is('iOS')) {
                // Handle iOS
                return 'iOS';
            } elseif ($mobileDetect->is('AndroidOS')) {
                // Handle Android
                return 'AndroidOS';
            } else {
                // Handle other mobile OS
            }
        } else {
            return 'mobile not found';
        }

        //  return $agent = new Agent();
        //  $device = $agent->device();
        //  $platform = $agent->platform();
        //  return $platform;
        //  if ($agent->is('iPhone') || $agent->is('iPad')) {
        //     // Redirect to Apple Store
        //     // return new RedirectResponse('https://apps.apple.com/app/your_app_name/idyour_app_id');
        //     return 'Apple';
        // } elseif ($agent->is('android')) {
        //     return 'Andriod';
        // }else {
        //     // Redirect to Google Play
        //     return 'Not Found';
        //     return new RedirectResponse('https://play.google.com/store/apps/details?id=your_app_package_name');
        // }
        //  return session()->get('link');
        return response()->json([
            'success' => false,
            'message' => 'UnAuthorized Access'
        ]);
    }

    function createRefLink($userId){
        $uniqueIdentifier = $userId; // Replace with the unique attribute of the user

        $referenceLink = 'ref'.Str::random(10) . '-' . $uniqueIdentifier;

        return $referenceLink;
    }

    public function invite_link(Request $request)
    {
        $url = url('api/get_link?link='.auth()->user()->reference_link);
        return response()->json(['message'=>'Link Create','data'=>$url,'success' => true]);

    }

    public function get_link(Request $request)
    {

        $link = session()->put('link', $request->link);
         $mobileDetect = new Mobile_Detect($request->server->all());

        if ($mobileDetect->isMobile()) {
            if ($mobileDetect->is('iOS')) {

                return new RedirectResponse('https://apps.apple.com/app/your_app_name/idyour_app_id');
            } elseif ($mobileDetect->is('AndroidOS')) {

                return new RedirectResponse('https://play.google.com/store/apps/details?id=your_app_package_name');
            } else {
                return response()->json([
                'success' => false,
                'message' => 'Your is version not  Android nor IOS'
            ]);

            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Your is version not  Android nor IOS'
            ]);

        }


        // if ($agent->is('iPhone') || $agent->is('iPad')) {
        //     // Redirect to Apple Store
        //     return new RedirectResponse('https://apps.apple.com/app/your_app_name/idyour_app_id');
        // } else {
        //     // Redirect to Google Play
        //     return new RedirectResponse('https://play.google.com/store/apps/details?id=your_app_package_name');
        // }

         return response()->json([
            'success' => true,

            'message' => 'Go to register page'
            ]);

    }


    /* Clean Server */
    public function clearCache()
    {
        try {
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('config:cache');
            // Additional cache clearing commands can be added here if needed

            return "Cache cleared successfully.";
        } catch (\Exception $e) {
            return "Cache clearing failed: " . $e->getMessage();
        }
    }

    public function composer_update()
    {

        // Run the Composer update command using the Process component
        $process = new Process(['composer', 'update']);
        $process->run();

        // Check if the process was successful
        if ($process->isSuccessful()) {
            return response()->json(['message' => 'Composer update completed successfully']);
        } else {
            return response()->json(['message' => 'Composer update failed'], 500);
        }
    }

    public function isHeart($data){

        /* Is Friend  */
        $user_id = auth()->user()->id;
        $hearts = Heart::select('sender_id','receiver_id')->where('status',1)->where(function($query) use ($user_id){
            $query->where('sender_id',$user_id)
            ->orWhere('receiver_id',$user_id);
        })
        ->get();
        $ids= array();
        foreach ($hearts as $key => $value) {
            if ($user_id != $value->sender_id) {
                array_push($ids,$value->sender_id);
            }
            if ($user_id != $value->receiver_id) {
                array_push($ids,$value->receiver_id);
            }
        }
        // Array of object IDs to check
        foreach ($data as $object) {
            if (in_array($object->id, $ids)) {
                $object->is_friend = true;
            }else{
                $object->is_friend = false;
            }
        }

        return $data;
        /* Is Friend  */
    }

    /* Send Help and Support Messages */
    function SendQuery(Request $request) {
        $validator = Validator::make($request->all(), [

            'message' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json(['message'=>$validator->messages()->first(),'success' => false]);
        }
        $user = Auth::id();
        $msg = $request->message;
        HelpAndSupport::Create([
            'user_id'=>$user,
            'message'=>$msg,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Message Sent Sucessfully'
            ]);
    }


    /* Reference Link */
    function SendRecommendation(Request $request) {
        $myRefLink = auth()->user()->reference_link;
        $recom_to = User::where('reference_id',auth()->user()->id)->select('id','first_name','mid_name','last_name')->first();
        $check_recomm = Recommendation::where('recom_to',$recom_to->id)->where('recom_from',auth()->user()->id)->where('recom_user_id',$request->user_id)->first();
        if (isset($check_recomm)) {
            return response()->json([
            'success' => true,
            'message' => 'Recommendation Already Send'
            ]);
        }
        Recommendation::Create([
            'recom_to'=>  $recom_to->id,
            'recom_from'=> auth()->user()->id,
            'recom_user_id'=> $request->user_id,
        ]);
         return response()->json([
            'success' => true,
            'message' => 'Recommend the profile to '.$recom_to->first_name.' '.$recom_to->mid_name.' '.$recom_to->last_name.' '
            ]);

    }

    function recommendations(Request $request) {
        $check_recomm = Recommendation::with(['user'])->select('recom_to','recom_from', 'recom_user_id')->where('recom_to',auth()->user()->id)->get()->map(function ($heart) {
            $heart->user = $heart;
            $heart->user_id =$heart->user->id;
        return $heart;
        });

        $users=[];
        $data = $check_recomm->each(function ($item) use (&$users) {

            $users[] = $item->user;
        });
        $isHeart = $this->isHeart($users);

         return response()->json([
            'success' => true,
            'data'=>  $isHeart,
            'message' => 'Recommend the profile to '
            ]);

    }
}
