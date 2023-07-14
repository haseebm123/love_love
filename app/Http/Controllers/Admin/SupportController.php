<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContentModification;

class SupportController extends Controller
{
    public function index(Request $request) {


        $data =ContentModification::first();
        if ($request->segments()[0]) {

            if ($request->segments()[0] == 'help-support') {
                return view('admin.pages.content_moderation.help_support',compact('data'));
            }elseif($request->segments()[0] == 'privacy-policy'){
                return view('admin.pages.content_moderation.privacy_policy',compact('data'));
            }elseif($request->segments()[0] == 'term-conditions'){
                return view('admin.pages.content_moderation.term_condition',compact('data'));
            }
        }
        return redirect()->back()
                        ->with(['message'=>'Something Went Worng','type'=>'error']);

    }

    public function updateContent(Request $request){
        $input = $request->except(['_token'],$request->all());
        $input['user_id'] = auth()->user()->id;

        $data = ContentModification::first();
        if ($request->segments()[0]) {
            $data->update($input);
            if ($request->segments()[0] == 'help-support-update') {
                return redirect()->back()->with(['message'=>'Content Update Successfully','type'=>'success']);
            }elseif($request->segments()[0] == 'privacy-policy-update'){
                return redirect()->back()->with(['message'=>'Content Update Successfully','type'=>'success']);
            }elseif($request->segments()[0] == 'term-conditions-update'){
                return redirect()->back()->with(['message'=>'Content Update Successfully','type'=>'success']);
            }
        }
        return redirect()->back()->with(['message'=>'Something Went Worng','type'=>'error']);
    }
}
