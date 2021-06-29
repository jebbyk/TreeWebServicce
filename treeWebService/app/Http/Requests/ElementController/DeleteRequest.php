<?php

namespace App\Http\Requests\ElementController;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class DeleteRequest
 * @package App\Http\Requests\ElementController
 */
class DeleteRequest extends FormRequest
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
            "id" => ['required', 'exists:elements']
        ];
    }


}
