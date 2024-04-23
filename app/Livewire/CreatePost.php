<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use Livewire\Component;

class CreatePost extends Component
{
    public PostForm $form;
    public $mode = 1;

    public function save()
    {
        $this->form->save();

        return redirect()->route(role_prefix() . '.posts.index')->with('success_add', 'Post Successfully Added');
    }

    public function render()
    {
        return view('livewire.post-form');
    }
}
