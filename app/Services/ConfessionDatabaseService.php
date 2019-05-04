<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Confession;
use App\AcceptedConfession;
use App\DeletedConfession;
use Auth;

class ConfessionDatabaseService{
  const AUTH_ERR = -1;
  const DELETED_ERR = -2;
  const SUCCESS = 0;

  const NO_APPROVE_STATUS  = "no_approve";
  const APPROVED_STATUS = "approved";
  const DELETED_STATUS = "deleted";

  public static function approve_confession($confession_id){
    if(Auth::check() == false) return self::AUTH_ERR;
    if(DeletedConfession::find($confession_id)) return self::DELETED_ERR;

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

    return $accepted_confession;
  }


  public static function add_confession(Request $request){
    $confession_content = $request->noidung;
    $confession = new Confession();
    $confession->content = $confession_content;
    $confession->save();

    return $confession;
  }

  public static function delete_confession($confession_id){
    if(Auth::check() == false) return self::AUTH_ERR;

    $accepted_confession = AcceptedConfession::find($confession_id);
    if($accepted_confession) $accepted_confession->delete();

    $delete_confession = new DeletedConfession();
    $delete_confession->confession_id = $confession_id;
    $delete_confession->delete_by = Auth::user()->id;
    $delete_confession->save();

    $confession = Confession::find($confession_id);
    $confession->status = self::DELETED_STATUS;
    $confession->save();

    return self::SUCCESS;
  }

  public static function complete_delete_confession($confession_id){
    if(Auth::check() == false) return self::AUTH_ERR;

    $deleted_confession = DeletedConfession::find($confession_id);
    if($deleted_confession) $deleted_confession->delete();

    $accepted_confession = AcceptedConfession::find($confession_id);
    if($accepted_confession) $accepted_confession->delete();

    $confession = Confession::find($confession_id);
    if($confession) $confession->delete();

    return self::SUCCESS;
  }

  public static function recover_confession($confession_id){
    $deleted_confession = DeletedConfession::findOrFail($confession_id);
    $deleted_confession->delete();

    $confession = Confession::find($confession_id);
    $confession->status = self::NO_APPROVE_STATUS;
    $confession->save();

    return self::SUCCESS;
  }
}
