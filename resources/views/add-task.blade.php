<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8" style="max-width: 30rem">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <form action="/add-task" method="post">
                    @csrf
                    <div style="color: red;">
                      @error ('title') {{ $message }} @enderror
                    </div>
                    <div>
                      <x-label for="title">{{ __('タイトル') }}</x-label>
                      <x-input type="text" id="title" name="title" />
                    </div>
                    <div style="color: red;">
                      @error ('content') {{ $message }} @enderror
                    </div>
                    <div class="mt-4">
                      <x-label for="content">{{ __('内容') }}</x-label>
                      <x-textarea name="content" id="content" cols="30" rows="10"></x-textarea>
                    </div>
                    <div style="color: red;">
                      @error ('deadline') {{ $message }} @enderror
                    </div>
                    <div class="mt-4">
                      <x-label for="deadline">{{ __('期限') }}</x-label>
                      <x-input type="date" id="deadline" name="deadline" />
                    </div>
                    <div class="mt-4">
                      {{-- <input type="submit" value="Add" class="border rounded px-2" style="background: rgb(70, 108, 233); color: white; cursor:pointer;"> --}}
                      <x-button>{{ __('＋タスク追加') }}</x-button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
