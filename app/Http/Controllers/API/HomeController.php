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

        return $data  = MedicalCondition::select('id','name')->get();
        return response()->json([
	            'success' => true,
	            'data' 	  => $data,

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
