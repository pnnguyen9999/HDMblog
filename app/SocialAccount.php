<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $table = 'social_account';

    protected $fillable = ['user_id','provider_user_id','provider'];

    public function user(){
      return $this->belongsTo('App\User');
    }
}
