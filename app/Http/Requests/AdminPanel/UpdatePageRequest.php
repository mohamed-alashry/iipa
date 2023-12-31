<?php

namespace App\Http\Requests\AdminPanel;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Page;

class UpdatePageRequest extends FormRequest
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
        $rules = Page::rules();
        $rules['photo'] = 'image|mimes:jpeg,jpg,png';
        $rules['image'] = 'image|mimes:jpeg,jpg,png';
        return $rules;
    }
}
