<?php

namespace App\Modules\Domain\Vehicle\src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'plate_number' => 'required|string|unique:vehicles,plate_number',
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'driver_id' => 'nullable|exists:drivers,id',
        ];
    }
}
