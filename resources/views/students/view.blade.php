<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student') }}
        </h2>
    </x-slot>

    @include('components.CRUDit.view', ['data' => $student, 'type' => 'students','created_by' => $created_by, 'updated_by' => $updated_by])
    <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">

<div class="p-4 text-gray-900 dark:text-gray-100">
    <div class="bg-white p-7 m-auto dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex ">
        <a href="/students/inscription/{{$student->id}}">
        <button class="py-4 border px-6 m-2 w-auto bg-gray-600 text-gray-200 text-lg rounded-lg border-gray-200 grid">{{__('sign to a course')}}</button>
        </a>
        <a href="/students/kardex/{{$student->id}}">
        <button class="py-4 border px-6 m-2 w-auto bg-gray-600 text-gray-200 text-lg rounded-lg border-gray-200 grid">{{__('get kardex')}}</button>
        </a>
        </div>
    </div>
</div>
    
    
</x-app-layout>