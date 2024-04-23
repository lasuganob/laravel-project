<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use Livewire\Component;
use App\Models\Post;

class EditPost extends Component
{

    public ?Post $post = null;
    public PostForm $form;
    public $mode = 2;

    /**
     * Set post values on inputs in Edit Form
     */
    public function mount(Post $post = null) : void
    {
        if($post->exists) {
            $this->form->setPost($post);
        }
    }

    public function save()
    {
        $this->form->save();

        return redirect()->route(role_prefix() . '.posts.index')->with('success_edit', 'Post Successfully Edited');
    }


    public function render()
    {
        return view('livewire.post-form');
    }
}
