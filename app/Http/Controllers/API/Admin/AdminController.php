<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
        User::whereIn('id',$ids)->update(['status'=>0]);

        return response()->json([
                'success' => true,
                'message' => "Profile Accepted"
            ]);
    }
}
