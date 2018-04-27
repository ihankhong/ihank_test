<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAvatarRequest extends FormRequest
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
        return [
            'avatar' => [
                'required', 
                'image', 
                (config('image.should_validate_mime') ? 'mimetypes:'.implode(',', config('image.valid_image_mimetypes')) : ''), 
                (config('image.should_validate_size') ? 'max:'.config('image.max_image_size') : '')
            ]
        ];
    }
}
