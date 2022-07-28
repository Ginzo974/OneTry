<?php

namespace App\Http\Requests;

use App\Rules\DateBetween;
use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nom' => ['required'],
            'prenom' => ['required'],
            'email' => ['required', 'email'],
            'num_tel' => ['required'],
            'date_res' => ['required', 'date', new DateBetween],
            'voitures_id' => ['required'],
        ];
    }
}
