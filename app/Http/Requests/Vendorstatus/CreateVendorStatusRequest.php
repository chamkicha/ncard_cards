<?php

namespace App\Http\Requests\Vendorstatus;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Vendorstatus\VendorStatus;

class CreateVendorStatusRequest extends FormRequest
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
        return VendorStatus::$rules;
    }
}
