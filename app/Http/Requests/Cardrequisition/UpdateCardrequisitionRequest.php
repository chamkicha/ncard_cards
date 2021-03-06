<?php

namespace App\Http\Requests\Cardrequisition;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Cardrequisition\Cardrequisition;

class UpdateCardrequisitionRequest extends FormRequest
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
        return Cardrequisition::$rules;
    }
}
