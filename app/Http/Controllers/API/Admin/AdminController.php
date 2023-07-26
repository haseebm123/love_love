<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;

class AdminController extends Controller
{
    public function addSpam(Request $request)
    {
        $word ='';
        if(isset($request->words)){
            $words = explode(',', $request->words);

        }

        foreach($words as $word){
            $check_word = SpanWords::where('word',$word)->first();
            if(!$check_word){

                SpanWords::create([
                    'word'=>$word
                ]);
            }
        }

        return response()->json([
                'success' => true,
                'message' =>"Admin add a New Spam word"
            ]);
    }
    public function AdminInfo( )
    {

        $data = User::where('role_id','admin')->first();
        return response()->json([
                'success' => true,
                'data' => $data->id
            ]);
    }
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
