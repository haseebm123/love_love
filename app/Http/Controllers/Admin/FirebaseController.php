<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Firestore;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
class FirebaseController extends Controller
{





/* Conversation */
    public function getConversation(){
        $projectId='lovelove-d6d33';
        $conversationId = '022bae4a91af43599e81';
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

            dd($messages);
        }
    }
/* End Conversation */

/* chat */
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

            dd($conversation);
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
/* end chat */

/* Send Event */

        public function sendMsg(Request $request){
        $projectId='lovelove-d6d33';
        $data=[];
        $msg=[];
        $myId = auth()->id();
        $userIds = [$request->user_id,$myId];
        sort($userIds);
        $other = User::find($request->user_id);
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
                        'msg'=>$request->message,
                        'time'=>Carbon::now(),
                    ]);


                    $this->sendMsg1($ref,$msg);
                }

                return "Exist ".$ref;
            }else{
                    // // send
                $data = ([
                    auth()->id() => "Love Love Admin",
                    $other->id=> $other->first_name.' '.$other->mid_name.' '.$other->mid_name,
                    'img'.auth()->id()=>'profile',
                    'img'.$other->id=> $other->profile,
                    'msg' => null,
                    'time'=>Carbon::now(),
                    'userId'=>$userIds

                ]);
                $addedDocRef = $db->collection('chats')->add($data);
                $ref = $addedDocRef->id();
                $get_count = count($db->collection('chats')->document($ref)->collection('messages')->documents()->rows());
                $msg = ([
                    'count'=>$get_count++,
                    'id'=>auth()->id(),
                    'img'=>auth()->user()->profile,
                    'msg'=>$request->message,
                    'time'=>Carbon::now(),
                ]);

                $this->sendMsg1($ref,$msg);
                return 'new send '.$ref;
            }


        }
        }

        public function sendMsg1($id,$msg){
        $projectId='lovelove-d6d33';
        $db = new FirestoreClient([
                'projectId' => $projectId,
        ]);
        $addedDocRef = $db->collection('chats')->document($id);
        $addedDocRef->set([
            'msg'=>$request->message,
            'time'=>Carbon::now(),

        ], ['merge' => true]);
        $addedDocRef = $db->collection('chats')->document($id)->collection('messages')->add($msg);
/* End Send Event */

    }
}
