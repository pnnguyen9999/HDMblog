<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcceptedConfession extends Model
{
    protected $table = 'accepted_confession';

    public function confession(){
      return $this->belongsTo('App\Confession','confession_id');
    }

    public function user(){
      return $this->belongsTo('App\User','accept_by');
    }
}
