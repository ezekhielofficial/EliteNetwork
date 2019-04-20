<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivationCode extends Model
{
    protected $fillable = [
        'ActivationCode',
        'User_id',
        
      ];
      public function user()
    {
        return $this->belongsTo('App\User');
    }
}
