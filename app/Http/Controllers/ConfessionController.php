<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FacebookGroupService;
use App\Services\ConfessionDatabaseService;

class ConfessionController extends Controller
{
    public function add(Request $request){
      $confession = ConfessionDatabaseService::add_confession($request);

      return view('thankyouPage',['posts' => $confession->content]);
    }

    public function approve($confession_id){
      $data = ConfessionDatabaseService::approve_confession($confession_id);

      if($data === ConfessionDatabaseService::AUTH_ERR){
        return $this->message(-1,"Please login to continue");
      }

      if($data === ConfessionDatabaseService::DELETED_ERR){
        return $this->message(-1,"This confession have been deleted !");
      }

      $facebookGrService = new FacebookGroupService();
      $result = $facebookGrService->publishConfession($data->order,$data->confession->content);

      if($result == FacebookGroupService::PUBLISH_ERR){
        return $this->message(-1,"Cannot post to facebook group");
      }

      return $this->message(0,"Approved");
    }

    public function delete($confession_id){
      $data = ConfessionDatabaseService::delete_confession($confession_id);

      if($data === ConfessionDatabaseService::AUTH_ERR){
        return $this->message(-1,"Please login to continue");
      }

      return $this->message(0,"Deleted");
    }

    public function complete_delete($confession_id){
      $data = ConfessionDatabaseService::complete_delete_confession($confession_id);

      if($data === ConfessionDatabaseService::AUTH_ERR){
        return $this->message(-1,"Please login to continue");
      }

      return $this->message(0,"Deleted");
    }

    public function recover($confession_id){
      $data = ConfessionDatabaseService::recover_confession($confession_id);

      if($data === ConfessionDatabaseService::AUTH_ERR){
        return $this->message(-1,"Please login to continue");
      }

      return $this->message(0,"Recovered");
    }

    public function merge_confession_and_approve(Request $request){
      $checkedConfessionIDs = json_decode($request->checkedConfessionIDs);
      $message = "";

      foreach($checkedConfessionIDs as $id){
        $data = ConfessionDatabaseService::approve_confession($id);
        //please no bug here
        $_message = "#cfs".$data->order.'
        '.$data->confession->content;
        $message = $message.$_message.'
        ';
      }

      $facebookGrService = new FacebookGroupService();
      $result = $facebookGrService->publishToPage($message);

      if($result == FacebookGroupService::PUBLISH_ERR){
        return $this->message(-1,"Cannot post to facebook group");
      }

      return $this->message(0,"Merge successfully");
    }

    private function message($message_code,$message){
      $pack = array('message_code' => $message_code,'message' => $message);
      return json_encode($pack);
    }
}
