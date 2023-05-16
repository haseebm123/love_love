<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;

class AdminController extends Controller
{
    public function profileReq(){

        $data = User::with('images')
        ->select('first_name','last_name','mid_name','age','description','role_id','email','id')
        ->where('status',0)
        ->where('role_id','user')
        ->whereColumn('created_at', '<', 'updated_at')
        ->get();
        return response()->json([
                'success' => true,
                'data' => $data
            ]);
    }

    public function acceptProfile(Request $request){

        $ids= $request->ids;
        User::whereIn('id',$ids)->update(['status'=>1]);

        return response()->json([
                'success' => true,
                'message' => "Profile Accepted"
            ]);
    }
    public function notification(Request $request){
        $noti = Notification::whereNotNull('user_id')->get();
        return response()->json([
                'success' => true,
                'data' => $noti
            ]);
    }
}
