<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dept extends Model
{
    protected $table = 'departement';
    protected $guarded = [];

    public function manager()
    {
        return $this->belongsTo('App\User', 'id_manager');
    }

    public function supervisor()
    {
        return $this->belongsTo('App\User', 'id_supervisor');
    }

}
