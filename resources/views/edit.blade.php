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
                  <form action="/edit?id={{ $task->id }}" method="post">
                    @csrf
                    <div>
                      <label for="title">Title: </label>
                      <input type="text" id="title" name="title" value="{{ $task->title }}"></input>
                    </div>
                    <div>
                      <label for="content">Content: </label>
                      <textarea name="content" id="content" cols="30" rows="10">{{ $task->content }}</textarea>
                    </div>
                    <div>
                      <label for="deadline">Deadline</label>
                      <input type="date" id="deadline" name="deadline" value="{{ $task->deadline }}">
                    </div>
                    <div>
                      <label for="status">Status</label>
                      <input type="radio" id="incomplete" name="status" value="0" @if(!$task->status) checked @endif><label for="incomplete">Incomplete</label>
                      <input type="radio" id="complete" name="status" value="1" @if($task->status) checked @endif><label for="complete">Complete</label>
                    </div>
                    <input type="submit" value="Update" class="border rounded px-2" style="background: rgb(70, 108, 233); color: white; cursor:pointer;">
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
