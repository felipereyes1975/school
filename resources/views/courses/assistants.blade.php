<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Assistants list') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl text-xl m-4 p-2">{{__('Assistant list for the course')}}</h1>
                    @forelse($assistants as $student)
                        <li class="bg-gray-900 p-2 m-2 text-xl rounded text-gray-200 list-none " style="list-style-type: none;">
                         <span>{{$student->names}} </span>
                         <span>{{$student->last_name}} </span>
                         <span>{{$student->second_last_name}}</span>
                         <button></button>
                        </li>
                    @empty
                    <p class="m-auto">{{__('no students in this course')}}</p>
                    @endforelse
                </div>
                <div class="text-xl m-4 p-2">
                    <a href="/courses" class="border bg-blue-600 rounded text-blue-200 p-2 m-5 px-4">{{ __('back')}}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>