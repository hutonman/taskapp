<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- <div style="display: grid;">
                        <div style="grid-column: 1/4; background:gray;">Name</div>
                        <div style="grid-column: 1/4; background:pink;">Title</div>
                        <div style="grid-column: 1/4; background:blue;">Deadline</div>
                        <div style="grid-column: 1/4; background:black;">Email</div>
                    </div> --}}
                    <div class="flex mb-4">
                        <div class="flex-1">Name</div>
                        <div class="flex-1">Title</div>
                        <div class="flex-1">Deadline</div>
                    </div>
                    @foreach($tasks as $task)
                    <a href="" class="flex border-t pt-2 pb-2">
                        <div class="flex-1">{{ $task->name }}</div>
                        <div class="flex-1">{{ $task->title }}</div>
                        <div class="flex-1">{{ $task->deadline }}</div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
