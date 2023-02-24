<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'biodata';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function title()
    {
        return $this->belongsTo('App\Title');
    }

    public function dept()
    {
        return $this->belongsTo('App\Dept', 'id_dept');
    }
}
