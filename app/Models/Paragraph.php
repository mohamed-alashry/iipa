<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

/**
 * Class Paragraph
 * @package App\Models
 * @version September 27, 2020, 12:24 pm UTC
 *
 * @property integer $page_id
 * @property string $text
 */
class Paragraph extends Model
{
    use SoftDeletes;
    use Translatable;

    public $table = 'paragraphs';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'page_id',

    ];


    /**
     * Translated attributes.
     *
     * @var array
     */
    public $translatedAttributes =  [
        'title',
        'text',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'page_id' => 'integer'
    ];


    /**
     * Timestamps.
     *
     * @var boolean
     */
    public $timestamps = false;




    /**
     * Rules validation
     *
     * @return array vaildations rules
     */
    public static function rules()
    {
        $languages = array_keys(config('langs'));
        foreach ($languages as $language) {
            $rules[$language . '.title'] = 'nullable|string';
            $rules[$language . '.text'] = 'required|string';
        }

        return $rules;
    }



    // Relations

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
