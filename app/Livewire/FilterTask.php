<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use function PHPUnit\Framework\matches;

class FilterTask extends Component
{
    use WithPagination, WithoutUrlPagination;

    public int $statusTask = 0;
    public string $title = '';

    public function search()
    {
        $this->resetPage();
    }

    public function filterTasks()
    {
        $query = Task::query();

        match($this->statusTask) {
            1 => $query->completed(),
            2 => $query->incomplete(),
            default => null,
        };

        if (!empty($this->title)) {
            $query->searchByTitle($this->title);
        }

        return $query;
    }

    public function render()
    {
        $tasks = $this->filterTasks()->paginate(5);
        return view('livewire.filter-task', [
            'tasks' => $tasks,
        ]);
    }
}
