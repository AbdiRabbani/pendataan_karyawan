<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeavePermit extends Model
{
    protected $table = 'leavepermit';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_luser');
    }

    public function manager()
    {
        return $this->belongsTo('App\User', 'id_manager');
    }

    public function supervisor()
    {
        return $this->belongsTo('App\User', 'id_supervisor');
    }
}
