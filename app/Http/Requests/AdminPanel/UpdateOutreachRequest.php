<?php

namespace App\Http\Requests\AdminPanel;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Outreach;

class UpdateOutreachRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = Outreach::rules();
        $rules['photo'] = 'image|mimes:jpeg,jpg,png';
        $rules['attachment_pdf'] = 'file|mimes:pdf';

        return $rules;
    }
}
