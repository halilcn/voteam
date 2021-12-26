<?php

namespace App\Http\Requests\Vote;

use App\Models\Vote;
use App\Models\VotedUser;
use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Type;

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
        // Answer check

        $validator->after(function ($validator) {
            $answer = $this->answer;
            $vote = Vote::find($this->request->get('voteId'));

            if ($vote->type === Vote::$TYPES["DOUBLE"]) {
                if (!array_key_exists('answer', $answer) || !is_bool($answer['answer'])) {
                    return $validator->errors()->add('field', "Answer error.");
                }
            }

            if ($vote->type === Vote::$TYPES["POWER"]) {
                if (!array_key_exists('power', $answer[0]) || !array_key_exists('team_user_id', $answer[0])) {
                    return $validator->errors()->add('field', "Answer error.");
                }

                if (
                    (!is_int($answer[0]['power']) && !is_float($answer[0]['power']))
                    || !is_int($answer[0]['team_user_id'])
                ) {
                    return $validator->errors()->add('field', "Answer error.");
                }

                $teamUsersId = collect($answer)->map(function ($item) {
                    return $item['team_user_id'];
                });
                if ($teamUsersId->contains($this->user()->id)) {
                    return $validator->errors()->add('field', "Answer error.");
                }
            }

            if ($vote->type === Vote::$TYPES["MULTIPLE"]) {
                if (!array_key_exists('type', $answer) || !in_array($answer['type'], Vote::$OPTIONS_TYPES)) {
                    return $validator->errors()->add('field', "Answer error.");
                }

                $optionsContent = collect($vote->options)->map(function ($item) {
                    return array_key_exists('message', $item)
                        ? $item['message']
                        : $item['path'];
                });

                $answerContent = $answer['type'] == Vote::$OPTIONS_TYPES['TEXT']
                    ? $answer['message']
                    : $answer['path'];

                if (!$optionsContent->contains($answerContent)) {
                    $validator->errors()->add('field', "Answer error.");
                }
            }
        });
    }
}
