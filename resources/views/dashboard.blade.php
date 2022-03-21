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
                    <input type="checkbox" name="over" id="over"><label for="over">期限超過のみ</label></input>
                    <input type="checkbox" name="completed" id="completed"><label for="completed">完了済み表示</label></input>
                    <a href="/add-task" class="border rounded px-2" style="background: rgb(70, 108, 233); color: white; ">+Add Task</a>
                    <div class="flex mb-4 text-xl">
                        <div class="flex-1">Name</div>
                        <div class="flex-1">Title</div>
                        <div class="flex-1">Deadline</div>
                    </div>
                    @foreach($tasks as $task)
                    <a href="/detail?id={{ $task->id }}" class="flex border-t py-2">
                        <div class="flex-1">{{ $task->name }}</div>
                        <div class="flex-1">{{ $task->title }}</div>
                        <div class="flex-1">{{ $task->deadline }}</div>
                    </a>
                    @endforeach

                    <div style="margin: 0 auto;">
                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
