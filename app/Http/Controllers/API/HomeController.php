<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Intrest;
use App\Models\MedicalCondition;
use App\Models\AccountFor;
class HomeController extends Controller
{
    function medicalCondition() {

        $data  = MedicalCondition::select('id','name')->get();
        $data1 = [];
        $data2 = [];
        if ($data[0]) {
        $total = $data->count();
        $half =  ceil($total/2);

            for ($i=0; $i < $total; $i++) {
                if ($data[$i]) {
                    if ($i < $half) {
                        $data1[] =$data[$i];
                    }else{
                        $data2[] =$data[$i];
                    }

                }
            }
        }

        return response()->json([
	            'success' => true,
	            'data1' 	  => $data1,
	            'data2' 	  => $data2,

	        ]);

    }

    function intrest() {
        $data  = Intrest::select('id','name')->get();
        return response()->json([
	            'success' => true,
	            'data' 	  => $data,
	    ]);

    }
    function accountFor() {
        $data  = AccountFor::select('id','name')->get();
        return response()->json([
	            'success' => true,
	            'data' 	  => $data,
	    ]);

    }
}
