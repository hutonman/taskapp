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
                  <form action="/add-task" method="post">
                    @csrf
                    <div>
                      <label for="title">Title: </label>
                      <input type="text" id="title" name="title">
                    </div>
                    <div>
                      <label for="content">Content: </label>
                      <textarea name="content" id="content" cols="30" rows="10"></textarea>
                    </div>
                    <div>
                      <label for="deadline">Deadline</label>
                      <input type="date" id="deadline" name="deadline">
                    </div>
                    <input type="submit" value="Add">
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>