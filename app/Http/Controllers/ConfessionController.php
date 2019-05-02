<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Confession;
use App\AcceptedConfession;
use App\DeletedConfession;
use Auth;

class ConfessionController extends Controller
{
    const NO_APPROVE_STATUS  = "no_approve";
    const APPROVED_STATUS = "approved";
    const DELETED_STATUS = "deleted";

    public function add(Request $request){
      $confession_content = $request->noidung;
      $confession = new Confession();
      $confession->content = $confession_content;
      $confession->save();

      session()->put('success','Added');
      
      return view('thankyouPage',['posts' => $confession->content]);
    }

    public function approve($confession_id){
      //do this by ajax

      if(Auth::check() == false){
        return $this->message(-1,"Please login to continue");
      }

      if(DeletedConfession::find($confession_id)){
        return $this->message(-1,"This confession have deleted before !");
      }

      $defined_order = 12345;
      $offset = 1;

      $accepted_confession = new AcceptedConfession();
      $accepted_confession->confession_id = $confession_id;
      $accepted_confession->accept_by = Auth::user()->id;

      $order = AcceptedConfession::count() == 0 ? $defined_order : (AcceptedConfession::latest()->first()->order + $offset);
      $accepted_confession->order =$order;
      $accepted_confession->save();

      $confession = Confession::find($confession_id);
      $confession->status = self::APPROVED_STATUS;
      $confession->save();

      return $this->message(0,"Approved");
    }

    public function delete($confession_id){
      if(Auth::check() == false){
        return $this->message(-1,"Please login to continue");
      }

      $accepted_confession = AcceptedConfession::findOrFail($confession_id);
      $accepted_confession->delete();

      $delete_confession = new DeletedConfession();
      $delete_confession->confession_id = $confession_id;
      $delete_confession->delete_by = Auth::user()->id;
      $delete_confession->save();

      $confession = Confession::find($confession_id);
      $confession->status = self::DELETED_STATUS;
      $confession->save();

      return $this->message(0,"Deleted");
    }

    public function complete_delete($confession_id){
      $deleted_confession = DeletedConfession::findOrFail($confession_id);
      $deleted_confession->delete();

      $accepted_confession = AcceptedConfession::findOrFail($confession_id);
      $accepted_confession->delete();

      $confession = Confession::findOrFail($confession_id);
      $confession->delete();

      return $this->message(0,"Deleted");
    }

    public function recover($confession_id){
      $deleted_confession = DeletedConfession::findOrFail($confession_id);
      $deleted_confession->delete();

      $confession = Confession::find($confession_id);
      $confession->status = self::NO_APPROVE_STATUS;
    }

    public function merge_confession_and_approve(){

    }

    private function message($message_code,$message){
      $pack = array('message_code' => $message_code,'message' => $message);
      return json_encode($pack);
    }
}
