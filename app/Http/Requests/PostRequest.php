<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','string'],
            'content' => ['required','string'],
        ];
    }

    public function prepareInsert() : array
    {
        return $this->safe()
            ->merge([
                'user_id' => auth()->user()->id,
                'title' => $this->title,
                'content' => $this->input('content'), // $this->content is merging token and post content
                'status' => $this->status ? 1 : 0,
            ])->toArray();
    }
}
