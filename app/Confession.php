<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confession extends Model
{
    protected $table = 'confession';

    public function approve(){
      return $this->hasOne('App\AcceptedConfession');
    }

    public function delete(){
      return $this->hasOne('App\DeletedConfession');
    }
}
