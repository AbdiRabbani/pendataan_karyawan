<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'biodata';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    public function dept()
    {
        return $this->belongsTo(Dept::class);
    }
}
