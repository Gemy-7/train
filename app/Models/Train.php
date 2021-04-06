<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    protected $fillable = array('trainid', 'traintype', 'feast');

    public function lines()
    {
        return $this->hasMany(Lines::class);
    }
}