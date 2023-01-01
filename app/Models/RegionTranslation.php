<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegionTranslation extends Model
{


    protected $table = 'region_translations';

    protected $fillable = ['name'];

    public $timestamps = false;
}
