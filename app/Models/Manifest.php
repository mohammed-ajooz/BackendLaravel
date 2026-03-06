<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manifest extends Model
{
    protected $table = 'manifests';
    protected $primaryKey = 'mfId';

    public function mf_info()
    {
        return $this->hasMany(ManifestInfo::class,'mfId');
    }
}
