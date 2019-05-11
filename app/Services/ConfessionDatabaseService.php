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
  const APPROVED_ERR = -3;
  const SUCCESS = 0;

  const NO_APPROVE_STATUS  = "no_approve";
  const APPROVED_STATUS = "approved";
  const DELETED_STATUS = "deleted";

  public static function approve_confession($confession_id,$confession_content){
    if(Auth::check() == false) return self::AUTH_ERR;
    if(DeletedConfession::where('confession_id','=',$confession_id)->first()) return self::DELETED_ERR;
    if(AcceptedConfession::where('confession_id','=',$confession_id)->first()) return self::APPROVED_ERR;

    $defined_order = 12345;

    $confession = Confession::find($confession_id);
    $confession->status = self::APPROVED_STATUS;
    $confession->content = $confession_content;
    $confession->save();

    $accepted_confession = new AcceptedConfession();
    $accepted_confession->confession_id = $confession_id;
    $accepted_confession->accept_by = Auth::user()->id;
    $order = AcceptedConfession::count() == 0 ? $defined_order : (AcceptedConfession::orderBy('id', 'desc')->first()->order + 1);
    $accepted_confession->order =  $order;
    $accepted_confession->save();

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

    $accepted_confession = AcceptedConfession::where('confession_id','=',$confession_id)->first();
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

    $deleted_confession = DeletedConfession::where('confession_id','=',$confession_id)->first();
    if($deleted_confession) $deleted_confession->delete();

    $accepted_confession = AcceptedConfession::where('confession_id','=',$confession_id)->first();
    if($accepted_confession) $accepted_confession->delete();

    $confession = Confession::find($confession_id);
    if($confession) $confession->delete();

    return self::SUCCESS;
  }

  public static function recover_confession($confession_id){
    $deleted_confession = DeletedConfession::where('confession_id','=',$confession_id)->first();
    if($deleted_confession) $deleted_confession->delete();

    $confession = Confession::find($confession_id);
    $confession->status = self::NO_APPROVE_STATUS;
    $confession->save();

    return self::SUCCESS;
  }
}
