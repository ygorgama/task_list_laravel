<div class="lg:w-4xl p-4 lg:p-0 lg:mx-auto mt-10">
    <form method="post" wire:submit="save" class="mb-6 ">
        @csrf
        <div class="">
            <x-input
                    wire:model="title"
                    label="Title"
                    placeholder="Task title..."
                    class="mb-4"
            />
            <x-textarea
                wire:model="description"
                label="Description"
                placeholder="Task description..."
            />
        </div>
        <x-button type="submit" class="mt-4" label="Create Task"/>
    </form>
</div>
