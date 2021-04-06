<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    protected $fillable = array('trip_id', 'train_id', 'from_station_id', 'to_station_id', 'stime','etime');

    public function Train()
    {
        return $this->belongsTo(Train::class);
    }
    public function Trip()
    {
        return $this->belongsTo(Trip::class);
    }
    public function FromStation()
    {
        return $this->belongsTo(Station::class);
    }
    public function ToStation()
    {
        return $this->belongsTo(Station::class);
    }
}