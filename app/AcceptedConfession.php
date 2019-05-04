<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcceptedConfession extends Model
{
    protected $table = 'accepted_confession';

    public function confession(){
      return $this->belongsTo('App\Confession');
    }
}
