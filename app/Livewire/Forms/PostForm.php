<?php

namespace App\Livewire\Forms;

use App\Http\Requests\PostRequest;
use Livewire\Form;
use App\Models\Post;

class PostForm extends Form
{
    public ?Post $post = null;
    public $title = '';
    public $content = '';
    public $status = false;

    /**
     * Define the validations
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required|min:20',
        ];
    }

    /**
     * Custom validation messages
     */
    public function messages()
    {
        return [
            'content.required' => 'The :attribute are missing.',
            'content.min' => 'The :attribute is too short.',
        ];
    }

    /**
     * Custom field name to appear on the message
     */
    public function validationAttributes()
    {
        return [
            'title' => 'post title',
            'content' => 'post content',
        ];
    }

     /**
      *
      * @param \App\Models\Post $post
      * @return void
      */
    public function setPost(?Post $post = null) : void
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->status = $post->status;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'user_id'=> auth()->user()->id,
            'title' => $this->title,
            'content'=> $this->content,
            'status'=> $this->status ? 1 : 0,
        ];

        if(empty($this->post)) {
            Post::create($data);
        } else {
            $this->post->update($data);
        }

    }
}
