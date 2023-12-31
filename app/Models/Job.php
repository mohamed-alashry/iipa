<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Job
 * @package App\Models
 * @version December 20, 2022, 1:17 pm UTC
 *
 * @property string $name
 */
class Job extends Model
{
    use SoftDeletes, Translatable;


    public $table = 'jobs';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    public $translatedAttributes = ['name'];


    public static function rules()
    {
        $languages = array_keys(config('langs'));
        foreach ($languages as $language) {
            $rules[$language . '.name'] = 'required|string|min:3|max:191';
        }

        return $rules;
    }


}
