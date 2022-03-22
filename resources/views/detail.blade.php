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
                  <div>
                    Title: {{ $task->title }}
                  </div>
                  <div>
                    Content: {{ $task->content }}
                  </div>
                  <div>
                    Deadline: {{ $task->deadline }}
                  </div>
                  <a href="/edit?id={{ $task->id }}" class="border rounded px-2" style="background: rgb(70, 108, 233); color: white; ">Edit</a>
                  {{-- <a href="" class="border rounded px-2" style="background: rgb(223, 57, 51); color: white;" id="delbtn">Delete</a> --}}
                  <a href="/del?id={{ $task->id }}" class="border rounded px-2" style="background: rgb(223, 57, 51); color: white;" id="delbtn">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <script>
      $el = document.getElementById('delbtn');
      $url = location.href;
      $delUrl = $url.replace('detail', 'del');
      $el.addEventListener('click', function(e) {
        // e.preventDefault();
        confirm('本当に削除しますか？') || e.preventDefault();
      })
    </script>
</x-app-layout>
