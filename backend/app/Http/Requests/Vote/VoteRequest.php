<?php

namespace App\Http\Requests\Vote;

use App\Models\Vote;
use Illuminate\Foundation\Http\FormRequest;

class VoteRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:20'],
            'type' => ['required', 'string', 'in:'.implode(',', array_values(Vote::$TYPES))],
            'options' => ['required'],
            'options.*.type' => ['in:'.implode(',', array_values(Vote::$OPTIONS_TYPES))],
            'options.*.message' => ['string', 'nullable'],
            'options.*.path' => ['string', 'nullable'],
            'start_date' => ['required', 'date', 'after:yesterday'],
            'end_date' => ['required', 'date', 'after:startDate']
        ];
    }
}
