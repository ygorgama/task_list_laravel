<x-layouts.app title="Task List">
    <main>
        <section class="w-4xl  mx-auto mt-10">
            @foreach ($tasks as $task)
                <x-card :title="$task->title" class="mb-3 {{ $task->completed ? 'bg-green-200' : 'bg-gray-200' }}">
                    <x-slot name="slot" class="!text-rose-500">
                        {{ $task->description }}
                        </br>
                        <x-link label="Show" href="#" blue sm />
                    </x-slot>
                </x-card>
            @endforeach
            <div >
                {{ $tasks->links() }}
            </div>
        </section>
    </main>
</x-layouts.app>
