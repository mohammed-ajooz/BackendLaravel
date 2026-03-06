<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $table = 'dates';
    protected $primaryKey = 'dateId';


public function date_invs()
{
    return $this->hasMany(Invoice::class,'dateId');
}
    public function date_mfest()
    {
        return $this->hasMany(Manifest::class,'dateId');
    }
}
