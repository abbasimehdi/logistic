<?php

namespace Logistic\Modules\Domain\Assignment\src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignDriverRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:drivers,id'
        ];
    }
}
