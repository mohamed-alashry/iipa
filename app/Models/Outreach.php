<?php

namespace App\Models;


use App\Helpers\ImageUploaderTrait;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Outreach extends Model
{
    use SoftDeletes, Translatable, ImageUploaderTrait;


    public $table = 'outreaches';

    protected $dates = ['deleted_at'];

    public $translatedAttributes =  [
        'meta_title',
        'meta_description',
        'meta_keywords',
        'name',
        'slug',
        'title',
        'brief',
        'description',
        'btn_name'
    ];


    public $fillable = [
        'photo',
        'attachment_pdf',
        'type',
        'btn_link'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                => 'integer',
        'name'              => 'string',
        'slug'              => 'string',
        'meta_title'        => 'string',
        'meta_description'  => 'string',
        'meta_keywords'     => 'string',
        'btn_link'          => 'string',
        'btn_name'          => 'string',
        'title'             => 'string',
        'brief'             => 'string',
        'description'       => 'string',
        'strategic_goal'    => 'string',
        'target_group'      => 'string',
        'photo'             => 'string',
        'attachment_pdf'    => 'string',
        'type'              => 'integer'
    ];

    public static function rules()
    {
        $languages = array_keys(config('langs'));

        foreach ($languages as $language) {
            $rules[$language . '.name'] = 'required_if:type,1';
            $rules[$language . '.btn_name'] = 'required_if:type,1';
            $rules[$language . '.meta_title'] = 'required_if:type,1';
            $rules[$language . '.meta_description'] = 'required_if:type,1';
            $rules[$language . '.meta_keywords'] = 'required_if:type,1';
            $rules[$language . '.title'] = 'required|string|min:3|max:191';
            $rules[$language . '.brief'] = 'required|string|min:3|max:191';
            $rules[$language . '.description'] = 'required_if:type,1';
            // $rules[$language . '.slug'] = 'required|string|min:3|max:191';
        }

        $rules['type'] = 'required|in:1,2';
        $rules['attachment_pdf'] = 'required_if:type,2|file|mimes:pdf';
        $rules['btn_link'] = 'required_if:type,1';
        $rules['photo'] = 'required|image|mimes:jpeg,jpg,png';

        return $rules;
    }


    // Attachment Pdf
    public function setAttachmentPdfAttribute($file)
    {
        if ($file) {
            try {
                $fileName = $this->createFileName($file);
                $this->saveFile($file, $fileName);
                $this->attributes['attachment_pdf'] = $fileName;
            } catch (\Throwable $th) {
                $this->attributes['attachment_pdf'] = $file;
            }
        }
    }

    public function getAttachmentPdfAttribute($val)
    {
        return asset('uploads/files/' . $val);
    }

    // Attachment Pdf

    // Photo Handling
    public function setPhotoAttribute($file)
    {
        if ($file) {
            try {
                $fileName = $this->createFileName($file);

                $this->originalImage($file, $fileName);

                $this->thumbImage($file, $fileName, 300, 300);

                $this->attributes['photo'] = $fileName;
            } catch (\Throwable $th) {
                $this->attributes['photo'] = $file;
            }
        }
    }


    public function getPhotoAttribute($val)
    {
        return $val ? asset('uploads/images/original') . '/' . $val : null;
    }
    // End Photo Handling
}
