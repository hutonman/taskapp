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
                  <form action="/edit" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $task->id }}">
                    <div>
                      <x-label for="title" :value="__('タイトル')" />
                      {{-- <input class="" type="text" id="title" name="title" value="{{ $task->title }}"></input> --}}
                      <x-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $task->title }}" />
                    </div>
                    <div class="mt-4">
                      <x-label for="content" :value="__('内容')" />
                      <x-textarea name="content" id="content" cols="30" rows="10" >{{ $task->content }}</x-textarea>
                    </div>
                    <div class="mt-4">
                      <x-label for="deadline" :value="__('期限')" />
                      <x-input type="date" id="deadline" name="deadline" value="{{ $task->deadline }}" />
                    </div>
                    <div class="mt-4">
                      <x-label for="status" :value="__('ステータス')" />
                      <input type="radio" id="incomplete" name="status" value="0" @if(!$task->status) checked @endif>
                      <x-label-inline class="inline" for="incomplete">{{ __('未対応') }}</x-label-inline>
                      <input type="radio" id="complete" name="status" value="1" @if($task->status) checked @endif>
                      <x-label-inline for="complete">{{ __('完了') }}</x-label-inline>
                    </div>
                    {{-- <input type="submit" value="Update" class="border rounded px-2" style="background: rgb(70, 108, 233); color: white; cursor:pointer;"> --}}
                    <div class="mt-4">
                      <x-button>{{ __('更新') }}</x-button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
