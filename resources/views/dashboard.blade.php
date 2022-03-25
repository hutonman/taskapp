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
                    <div class="flex justify-between">
                        <div>
                            <input type="checkbox" name="over" id="over" @if( isset($over) && $over ) checked @endif />
                            <x-label-inline for="over">{{ __('期限超過のみ') }}</x-label>
                            <input type="checkbox" name="status" id="status" @if( isset($status) && $status ) checked @endif />
                            <x-label-inline for="status">{{ __('完了済み表示') }}</x-label>
                        </div>
                        <div>
                            <form action="/add-task" method="get"><x-button>{{ __('＋タスク追加') }}</x-button></form>
                        </div>
                    </div>
                    {{-- <a href="/add-task" class="border rounded px-2" style="background: rgb(70, 108, 233); color: white; ">+Add Task</a> --}}
                    <div class="flex mb-4 text-xl">
                        <div class="flex-1">名前</div>
                        <div class="flex-1">タイトル</div>
                        <div class="flex-1">期限</div>
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
    <script>
        $overEl = document.getElementById('over');
        $statusEl = document.getElementById('status');
        $overEl.addEventListener('click', function(e) {
            this.checked ? location.href = '/over' : location.href = '/dashboard';
        })
        $statusEl.addEventListener('click', function(e) {
            this.checked ? location.href = '/status' : location.href = '/dashboard';
        })
    </script>
</x-app-layout>
