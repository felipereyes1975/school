<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Evaluation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="controllers">
                        <form action="" method="POST">
                        @csrf
                        <input type="text" id="search" name="search" class="bg-transparent border my-4 mx-2 rounded" placeholder="type search">
                        <button type="button" class="border bg-gray-500 py-2 rounded px-4">{{__('Search')}}</button>
                        </form>
                    </div>
                    <table class="w-full text-xl border">
                        <tr>
                        <th>{{__('Alumn')}}</th>
                        <th>{{__('Semester')}}</th>
                        <th>{{__('Actions')}}</th>
                        </tr>
                    @forelse($students as $alumn)
                    <tr class="text-l">
                        <td class="w-2/3 p-2 border">
                            <span>{{$alumn->names}}</span>
                            <span>{{$alumn->last_name}}</span>
                            <span>{{$alumn->second_last_name}}</span>
                        </td>
                        <td class="text-center border">
                            <span>{{$alumn->semester}}</span>
                        </td>
                        <td class="center border flex p-2">
                            <a href="/evaluation/students/{{$alumn->id}}" class="bg-blue-600 rounded px-5 py-2 m-auto">{{__('Evaluate')}}</a>
                        </td>
                    </tr>
                    @empty
                    <tr>{{__('no students to evaluate :(')}}</tr>
                    @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>