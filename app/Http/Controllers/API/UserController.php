<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Image;
use App\Models\Notification;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Auth;
use Hash;
use Mail;
use App\Mail\SendCodeMail;

use DB;


/*use Carbon\Carbon;
use File;
use Image;*/

class UserController extends Controller
{

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
        $user = User::create($data);

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
                'profile_path' =>$profile_path,
	            'success' => true,
	            'data' 	  => $user,
	            'token'	  => $user_login_token
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

        $imagePaths = [];
        $user = $request->except(['images'],$request->all());
        $data = User::find(auth()->user()->id);
        if($request->hasFile('images'))
        {
            foreach ($request->file('images') as $key => $image) {

                $img = Str::random(20).$image->getClientOriginalName();
                $image->move(public_path("documents/images"), $img);
                $imagePaths[$key] = $img;

                $addImg = Image::create([
                    'user_id'=> auth()->id(),
                    'image'=>$img
                ]);

            }
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


    public function filter(Request $request){

        $lat = auth()->user()->lat;
        $lon = auth()->user()->lon;
        $search = $request->search;
        $data  = User::query();
        $data  = $data->select('*');

        $data = $data->selectRaw('6371 * acos(cos(radians(' . $lat . ')) * cos(radians(users.lat)) * cos(radians(users.lon) - radians(' . $lon . ')) + sin(radians(' . $lat . ')) * sin(radians(users.lat))) AS distance') ;

        if ( isset($request->distance)) {
            $data =  $data->having('distance', '=', $request->distance);
            // $data =  $data->havingBetween('distance', [0, $request->distance]);
        }
        if ($request->has('gender') && isset($request->gender)) {

            $data->where('gender', 'like', '%' . $request->gender . '%');
        }
        if (isset($request->age)) {
            $data->where('age', $request->age);
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
        $data = User::where('status',1)->where('role_id','user')->with('images')->select('first_name','last_name','mid_name','age','description','role_id','email','id')->get();

        return response()->json(['data'=>$data,'success' => true]);
    }

    public function discoverView($id){
        $data = User::where('status',1)->where('role_id','user')->where('id',$id)->with('images')->select('first_name','last_name','mid_name','age','description','role_id','email','id')->get();
        return response()->json(['data'=>$data,'success' => true]);
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

    public function invalid()
    {
        return response()->json([
            'success' => false,
            'message' => 'UnAuthorized Access'
        ]);
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

}
