<?php

namespace App\Http\Requests\Vote;

use App\Models\Vote;
use Illuminate\Foundation\Http\FormRequest;

class VotedUserRequest extends FormRequest
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
            'answer' => ['required']
        ];
    }

    public function withValidator($validator)
    {
      /*  $validator->after(function ($validator) {
            // if ($this->somethingElseIsInvalid()) {
            //$this->answer
            $vote = Vote::find($this->request->get('voteId'));

            $validator->errors()->add('field', $this->answer);

            if ($vote->type === Vote::$TYPES["MULTIPLE"]){
                $validator->errors()->add('field', $this->answer);
            }

            if ($vote->type === Vote::$TYPES["POWER"]){
                $validator->errors()->add('field', $this->answer);
            }

            //$validator->errors()->add('field', $vote);
            //}
        });*/
    }
}
