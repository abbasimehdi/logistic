<?php

namespace Logistic\Modules\Domain\Driver\src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'license_number' => 'required|string|unique:drivers,license_number',
            'phone_number' => 'nullable|string',
        ];
    }
}
