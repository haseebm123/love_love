<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use App\Models\HelpAndSupport;
use App\Models\ContentModification;
use App\Models\DisappearMessage;
use App\Models\SpanWords;
use Google\Cloud\Firestore\FirestoreClient;
use Carbon\Carbon;
class UserManagementController extends Controller
{
    function searchUser(Request $request){
        $search = $request->search;
        $type = $request->type;
        $users = User::with('images')
        ->select('first_name','last_name','mid_name','age','description','profile','role_id','email','id','status','is_block')
        ->where('role_id','user');
        if ($type == 'request') {
            $data['request'] = $users->where([
            ['status',0],
            ['is_block',0],
            ])
            ->where(function($query) use ($search){

                    # code...
                    $query->where('first_name', 'LIKE', "%$search%");

                // ->orWhere('mid_name', 'LIKE', "$search%")
                // ->orwhere('last_name', 'LIKE', "$search%");
            })
            ->get();

            return view('admin.pages.users_management.ajax.users_request_list',compact('data'));

        }

        if ($type == 'block') {
            $data = $users->where('is_block',1)->where(function($query) use ($search){

                 if ($search) {
                    # code...
                    $query->where('first_name', 'LIKE', "%$search%");
                }
                // ->orWhere('mid_name', 'LIKE', "$search%")
                // ->orwhere('last_name', 'LIKE', "$search%");
            })
            ->get();

            return view('admin.pages.users_management.discover_user_list',compact('data'));
        }
        if ($type == 'discover') {

            $data = $users->where(function($query) use ($search){

                 if ($search) {
                    # code...
                    $query->where('first_name', 'LIKE', "%$search%");
                }
                // ->orWhere('mid_name', 'LIKE', "$search%")
                // ->orwhere('last_name', 'LIKE', "$search%");
            })
            ->get();
            return view('admin.pages.users_management.discover_user_list',compact('data'));
        }
    }
    function index(){

        $users = User::with('images')
        ->select('first_name','last_name','mid_name','age','description','profile','role_id','email','id','status','is_block','about')
        ->where('role_id','user');


        /* Requests  */
        $data['request'] = $users->where([
            ['status',0],
            ['is_block',0],
        ])
        // ->whereColumn('created_at', '<', 'updated_at')
        ->get();

        /* Request_count */
        $data['requestCount'] = $data['request']->count();

        /* Approved Users */
        $data['approvedCount'] =
        User::with('images')
        ->select('first_name','last_name','mid_name','age','description','profile','role_id','email','id','status','is_block')
        ->where('role_id','user')->where([
            ['status',1],

        ])->count();

        /* Blocked Users */
        $data['blockCount'] = User::with('images')
        ->select('first_name','last_name','mid_name','age','description','profile','role_id','email','id','status','is_block')
        ->where('role_id','user')->where([
            ['is_block',1],
        ])->count();

        return view('admin.pages.users_management.index',['data'=>$data]);
    }

    function userReqInfo(Request $request){

        $status = $request->status;
        $id = $request->id;
        // $user = User::with(['images','user_intrest.intrest'])
        // ->where('id',$id);
        // if ($request->type = 'discover') {
        //     $user = $user->first();

        //     return view('admin.pages.components.user_detail',['data'=>$user]);
        // }else{

        $user = User::with(['images','user_intrest.intrest'])
            ->where('id',$id)
            ->where(function($query) use ($status){
                $query->where('is_block',$status);
            })
            ->where('role_id','user')
            ->first();

            return view('admin.pages.users_management.ajax.user_details_horizontal',['data'=>$user]);
        // }
    }
    function userReqInfo1(Request $request){
        $id = $request->id;

        $user = User::with(['images','user_intrest.intrest'])
            ->where('id',$id)
            ->where('role_id','user')
            ->first();

        return view('admin.pages.users_management.ajax.user_detail_vertical',['data'=>$user]);

    }

    function blockById(Request $request){


        $data = User::with('images','user_intrest.intrest')
        ->select()
        ->where('id',$request->id)
        ->where('is_block',0)
        ->where('role_id','user')
        ->first();
        if (!$data) {
            return array('message'=>"User Not Found",'type'=>'error');
        }
        $data->is_block = 1;
        $data->save();
        return view('admin.pages.users_management.ajax.user_req_detail_section',['data'=>$data])->with(['message'=>'User Block Successfully','type'=>'success']);


    }

    function unBlockById(Request $request){

        $data = User::with('images','user_intrest.intrest')
        ->select()
        ->where('id',$request->id)
        ->where('is_block',1)
        ->where('role_id','user')
        ->first();
        if (!$data) {
            return array('message'=>"User Not Found",'type'=>'error');
        }
        $data->is_block = 0;
        $data->save();
        return view('admin.pages.users_management.ajax.user_block_detail',['data'=>$data])->with(['message'=>'User Block Successfully','type'=>'success']);


    }

    function approveByID(Request $request){
        $message = "";
        if ($request->id) {
            $user = User::where("id",$request->id)->where('status',0)->first();

            if (!$user) {

                return array('message'=>"User Not Found",'type'=>'error','status'=>1);
            }

            $user->status = 1;
            $user->save();
            return array('message'=>"User Approve Successfully",'type'=>'success','status'=>0);
        }

        $ids = User::with('images')
        ->select('first_name','last_name','mid_name','age','description','profile','role_id','email','id','status','is_block')
        ->where('role_id','user')->where([
            ['status',0],
            ['is_block',0],
        ])
        ->pluck('id');

        if (isset($ids[0])) {
            # code...
            User::whereIn('id',$ids)->update(['status'=>1]);
            return array('message'=>"Users Approve Successfully",'type'=>'success','status'=>2);
        }
        return array('message'=>"Not Request Found",'type'=>'error');

        // ->whereColumn('created_at', '<', 'updated_at')
    }
    function usersDiscover() {
        $data = User::select('first_name','last_name','mid_name','age','description','profile','role_id','email','id','status','is_block')
        ->where('role_id','user')->get();
        // $cov_user = $this->chats();
        // $id =array();
        // $data= [];
        // foreach ($cov_user as $key => $value) {
        //     if (isset($value['user'])) {
        //         $id[$value['user']->id]= $value['ids'];
        //     }
        // }
        // if(isset($user[0])){
        //     foreach ($user as $key => $value) {

        //         if (isset($id[$value->id])) {
        //             $value->conv_id = $id[$value->id];
        //             $data[$key] =$value;

        //         }else{
        //             $data[$key] =$value;
        //         }
        //     }
        // }
        return view('admin.pages.users_management.users_discover',compact('data'));
    }

    function accounts() {
        return view('admin.pages.account');
    }
    function notification() {
        $data = Notification::get();

        return view('admin.pages.notification',compact('data'));
    }
    function terms_condition() {
        $data = ContentModification::first();
        return view('admin.pages.content_moderation.term_condition',compact('data'));
    }

    function privacy_policy() {
        $data = ContentModification::first();
        return view('admin.pages.content_moderation.privacy_policy',compact('data'));
    }

    function help_support() {
        $data = ContentModification::first();
        return view('admin.pages.content_moderation.help_support',compact('data'));
    }

    function setting() {
        return view('admin.pages.settings');
    }

    function support(){

        $data = $this->chats();
         
        return view('admin.pages.support',compact('data'));

    }

    public function communicationTool()
    {

        $data = DisappearMessage::with(['sender','receiver'])->wherehas('sender',function($query) {
            $query->where('is_block',0);
        })->get();

        return view('admin.pages.communication_tool',compact('data'));
    }

    public function disappearMsg(Request $request) {
        $sender_id = $request->sender_id;
        $receiver_id = $request->receiver_id;
        $data = DisappearMessage::
        where('sender_id',$request->sender_id)
        ->where('receiver_id',$request->receiver_id)
        ->get();

        return view('admin.pages.users_management.ajax.disappear_chat',compact('data'));
    }
    function blockList(){
        $data = User::select('first_name','last_name','mid_name','age','description','profile','role_id','email','id','status','is_block')
        ->where('is_block',1)
        ->where('role_id','user')->get();

        return view('admin.pages.users_management.block_users',compact('data'));
    }

    public function chats(){
        $conversation =[];
        $projectId='lovelove-d6d33';
        if (empty($projectId)) {

            $db = new FirestoreClient();
            return array('message'=>'Server Error','type'=>'error');
        } else {
            $db = new FirestoreClient([
                'projectId' => $projectId,
            ]);

            $user = $db->collection('chats');
            $query = $user->where('userId', 'array-contains', auth()->id());
            $documents = $query->documents()->rows();
            foreach ($documents as $key => $value) {
                array_push($conversation,$value->data());
                $conversation[$key]['ids'] = $value->id();
                $conversation[$key]['user'] = $this->getUserDetails($conversation[$key]['userId']);
                unset($conversation[$key]['userId']);
            }
            return $conversation;
        }

    }

    public function getUserDetails($data){
        $myId = auth()->id();
        foreach ($data as $key => $value) {
            if($value !=  $myId){
                return User::find($value);
            }
        }
    }

    public function getConversation(Request $request){
        $projectId='lovelove-d6d33';
        $conversationId = $request->id;
        $messages = [];

        if (empty($projectId)) {

            $db = new FirestoreClient();
            return array('message'=>'Server Error','type'=>'error');
        } else {
            $db = new FirestoreClient([
                'projectId' => $projectId,
            ]);

            $firebase_msg = $db->collection('chats')->document($conversationId)->collection('messages')->documents()->rows();

            // dd($documents[0]->data());
            foreach ($firebase_msg as $key => $value) {
                array_push($messages,$value->data());
                $messages[$key]['ids'] = $value->id();
            }
            $data = collect($messages)->sortBy('count')->values()->all();
            return view('admin.pages.users_management.ajax.chat',compact('data'));

        }
    }

    public function getConversation2($conv_id){
        $projectId='lovelove-d6d33';
        $conversationId = $conv_id;
        $messages = [];

        if (empty($projectId)) {

            $db = new FirestoreClient();
            return array('message'=>'Server Error','type'=>'error');
        } else {
            $db = new FirestoreClient([
                'projectId' => $projectId,
            ]);

            $firebase_msg = $db->collection('chats')->document($conversationId)->collection('messages')->documents()->rows();

            // dd($documents[0]->data());
            foreach ($firebase_msg as $key => $value) {
                array_push($messages,$value->data());
                $messages[$key]['ids'] = $value->id();
            }
            $data = collect($messages)->sortBy('count')->values()->all();
            return $data;
            // return view('admin.pages.users_management.ajax.chat',compact('data'));

        }
    }

    public function getConversationById(Request $request){
        $projectId='lovelove-d6d33';
        $myId = auth()->id();
        $user_id = (int)$request->id;

        $userIds = [$user_id,$myId];
        sort($userIds);
        $conversationId = '';
        $messages = [];


        if (empty($projectId)) {

            $db = new FirestoreClient();
            return array('message'=>'Server Error','type'=>'error');
        } else {
            $db = new FirestoreClient([
                'projectId' => $projectId,
            ]);

            $user = $db->collection('chats');
            $query = $user->where('userId', '==', $userIds);
            $documents = $query->documents()->rows();
            if ($documents) {
                # code...
                foreach ($documents as $key => $value) {

                    $conversationId = $value->id();

                }
                $data = $this->getConversation2($conversationId);
                return view('admin.pages.users_management.ajax.chat',compact('data'));
                // return array('id'=>$conversationId,'status'=>0);
            }
            return array('status'=>1);
        }

        // if (empty($projectId)) {

        //     $db = new FirestoreClient();
        //     return array('message'=>'Server Error','type'=>'error');
        // } else {
        //     $db = new FirestoreClient([
        //         'projectId' => $projectId,
        //     ]);

        //     $firebase_msg = $db->collection('chats')->document($conversationId)->collection('messages')->documents()->rows();

        //     // dd($documents[0]->data());
        //     foreach ($firebase_msg as $key => $value) {
        //         array_push($messages,$value->data());
        //         $messages[$key]['ids'] = $value->id();
        //     }
        //     $data = collect($messages)->sortBy('count')->values()->all();
        //     return view('admin.pages.users_management.ajax.chat',compact('data'));

        // }
    }

    // send.message
    public function sendMsg(Request $request){
        $projectId='lovelove-d6d33';
        $data=[];
        $msg=[];
        $myId = auth()->id();
        $user_id = (int)$request->user_id;
        $userIds = [$user_id,$myId];
        sort($userIds);
        
        $userToken = '';
         
        $other = User::find($user_id);
        if($other->type =='user')
        {
            $userToken = $other->firebase_token;
        } 
        if (empty($projectId)) {
            $db = new FirestoreClient();
            return array('message'=>'Server Error','type'=>'error');
        } else {
            $db = new FirestoreClient([
                'projectId' => $projectId,
            ]);

            $user = $db->collection('chats');
            $query = $user->where('userId', '=', $userIds);
            $documents = $query->documents()->rows();

            if ($documents != []) {
                foreach ($documents as $document) {
                    $ref = $document->id();

                    $get_count = count($db->collection('chats')->document($ref)->collection('messages')->documents()->rows());

                    $msg = ([
                        'count'=>$get_count++,
                        'id'=>$myId,
                        'img'=>auth()->user()->profile,
                        'msg'=>$request->msg,
                        'time'=>Carbon::now(),
                    ]);


                   $send_msg_method = $this->send($ref,$msg);
                }

                return $send_msg_method;
            }else{
                    // // send
                $data = ([
                    auth()->id() => "Love Love Admin",
                    $other->id=> $other->first_name.' '.$other->mid_name.' '.$other->mid_name,
                    'img'.auth()->id()=>'profile',
                    'img'.$other->id=> $other->profile,
                    'msg' => null,
                    'time'=>Carbon::now(),
                    'userId'=>$userIds,
                    'userToken'=>$userToken

                ]);
                $addedDocRef = $db->collection('chats')->add($data);
                $ref = $addedDocRef->id();
                $get_count = count($db->collection('chats')->document($ref)->collection('messages')->documents()->rows());
                $msg = ([
                    'count'=>$get_count++,
                    'id'=>auth()->id(),
                    'img'=>auth()->user()->profile,
                    'msg'=>$request->msg,
                    'time'=>Carbon::now(),
                ]);


                $send_msg_method =  $this->send($ref,$msg);
                return $send_msg_method;
            }


        }
        }

        public function send($id,$msg){
            try {
                # code...
                $projectId='lovelove-d6d33';
                $db = new FirestoreClient([
                        'projectId' => $projectId,
                ]);
                $addedDocRef = $db->collection('chats')->document($id);
                $addedDocRef->set([
                    'msg'=>$msg['msg'],
                    'time'=>Carbon::now(),

                ], ['merge' => true]);
                $addedDocRef = $db->collection('chats')->document($id)->collection('messages')->add($msg);
                return array('message'=>'Message Send Successfully','type'=>'success');
            } catch (\Throwable $e) {
                return array('message'=>'SomeThing Went worng','type'=>'error');
            }

        }
        /* End Send Event */

}

