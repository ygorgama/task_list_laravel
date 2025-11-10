<div class="lg:w-4xl  p-4 lg:p-0 lg:mx-auto mt-10">
    <section>
        <form wire:submit="search" class="mb-6 ">
            <div class="flex flex-wrap lg:flex-nowrap">
                <x-input
                        wire:model="title"
                        label="Search title"
                        placeholder="title..."
                        class="sm:mb-4 lg:mb-0 lg:mr-4"
                />
                <x-select
                    wire:model="statusTask"
                    label="Status"
                    placeholder="Select one status"
                >
                    <x-select.option label="All" value="0" />
                    <x-select.option label="Completed" value="1" />
                    <x-select.option label="Pending" value="2" />
                </x-select>
            </div>
            <x-button type="submit" class="mt-4" label="Search"/>
        </form>
    </section>
    <section class="task__items">
        @foreach ($tasks as $task)
            <x-default.card >
                    <h2 class="font-bold text-gray-800">{{ $task->title }}</h2>
                    <p class="font-semibold text-gray-600">{{ $task->description }}</p>
            </x-default.card>
        @endforeach
        <div >
            {{ $tasks->links() }}
        </div>
    </section>
    <div>
        <x-button
            href="{{ route('tasks.create') }}"
            label="Create New Task"
            class="mt-6"
        />
    </div>
</div>
