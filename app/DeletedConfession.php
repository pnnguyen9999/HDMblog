<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeletedConfession extends Model
{
    protected $table = 'deleted_confession';

    public function confession(){
      return $this->belongsTo('App\Confession','confession_id');
    }

    public function user(){
      return $this->belongsTo('App\User','delete_by');
    }
}
