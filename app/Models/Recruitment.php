<?php

namespace App\Models;

use App\Helpers\ImageUploaderTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Recruitment extends Model
{
    use SoftDeletes, ImageUploaderTrait;


    public $table = 'recruitments';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'full_name',
        'email',
        'country_code',
        'phone',
        'attachment_cv',
        'user_id',
        'status', // 1=>pending, 2 => inprogress, 3 => approved, 4 => rejected, 5 => closed, 6 => finished
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'full_name' => 'string',
        'email' => 'string',
        'country_code' => 'string',
        'phone' => 'string',
        'attachment_cv' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'full_name' => 'required|string|min:3|max:191',
        'email' => 'required|email',
        'country_code' => 'required',
        'phone' => 'required',
        'attachment_cv' => 'required',
        'g-recaptcha-response' => 'recaptcha',
    ];



    // Attachment Cv
    public function setAttachmentCvAttribute($file)
    {
        if ($file) {
            try {
                $fileName = $this->createFileName($file);
                $this->saveFile($file, $fileName);
                $this->attributes['attachment_cv'] = $fileName;
            } catch (\Throwable $th) {
                $this->attributes['attachment_cv'] = $file;
            }
        }
    }

    public function getAttachmentCvAttribute($val)
    {
        return asset('uploads/files/' . $val);
    }

    // Attachment Cv



    public $appends = ['status_text'];

    public function getStatusTextAttribute($val)
    {
        return Follow::status_types()[$this->attributes['status']];
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
