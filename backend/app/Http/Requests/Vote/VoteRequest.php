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
            'title' => ['string', 'max:20'],
            'type' => ['string', 'in:'.implode(',', array_values(Vote::$TYPES))],
            //TODO: options
            'startDate' => ['date', 'after:yesterday'],
            'endDate' => ['date', 'after:startDate']
        ];
    }
}
