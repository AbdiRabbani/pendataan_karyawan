<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dept extends Model
{
    protected $table = 'departement';
    protected $guarded = [];

    public function user_manager()
    {
        return $this->belongsTo('App\User', 'id_manager');
    }

    public function user_supervisor()
    {
        return $this->belongsTo('App\User', 'id_supervisor');
    }

}
