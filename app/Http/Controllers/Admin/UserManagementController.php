<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use App\Models\HelpAndSupport;

class UserManagementController extends Controller
{
    function index(){

        $users = User::with('images')
        ->select('first_name','last_name','mid_name','age','description','profile','role_id','email','id','status','is_block')
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
        $user = User::with(['images','user_intrest.intrest'])
        ->where('id',$request->id)
        ->where(function($query) use ($status){
            $query->where('is_block',$status);
        })->where('role_id','user')->first();

        return view('admin.pages.users_management.ajax.user_req_detail_section',['data'=>$user]);
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
            return array('message'=>"Users Approve Successfully",'type'=>'success','status'=>1);
        }
        return array('message'=>"Not Request Found",'type'=>'error');

        // ->whereColumn('created_at', '<', 'updated_at')
    }
    function usersDiscover() {
        return view('admin.pages.users_management.users_discovere');
    }

    function accounts() {
        return view('admin.pages.account');
    }
    function notification() {
        $data = Notification::get();
        return view('admin.pages.notification',compact('data'));
    }
    function terms_condition() {
        return view('admin.pages.content_moderation.term_condition');
    }

    function privacy_policy() {
        return view('admin.pages.content_moderation.privacy_policy');
    }

    function help_support() {
        return view('admin.pages.content_moderation.help_support');
    }

    function setting() {
        return view('admin.pages.settings');
    }

    function support(){
        $data = HelpAndSupport::with('user')->get();

        return view('admin.pages.support',compact('data'));

    }
    function blockList(){
        $data = User::select('first_name','last_name','mid_name','age','description','profile','role_id','email','id','status','is_block')
        ->where('is_block',1)
        ->where('role_id','user')->get();
        return view('admin.pages.users_management.block_users',compact('data'));
    }
}

