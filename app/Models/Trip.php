<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = array('fromcity', 'tocity', 'stime', 'etime');

    public function lines()
    {
        return $this->hasMany(Lines::class);
    }
}