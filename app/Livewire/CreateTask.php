<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateTask extends Component
{
    #[Validate("required|max: 50|string")]
    public string $title = '';
    #[Validate("required|max: 50|string")]
    public string $description = '';

    public function save(){
        $this->validate();
        Task::create([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        return redirect()->route('tasks.index');
    }

    public function render()
    {
        return view('livewire.create-task');
    }
}
