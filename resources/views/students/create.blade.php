<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <form method="POST" class="bg-transparent rounded px-8 pt-6 pb-8 mb-4 ">
                    @csrf
                    <h1 class="mb-4">{{ __('Register a new Student') }}</h1>
                    <input type="text" name="name" id="" placeholder="name" class="bg-transparent shadow-md rounded px-8 my-1" ><br>
                    <input type="text" name="last_name" id="" placeholder="last name" class="bg-transparent shadow-md rounded px-8 my-1" ><br>
                    <input type="text" name="second_last_name" id="" placeholder="second last name"  class="bg-transparent shadow-md rounded px-8 my-1"><br>
                    <input type="number" name="age" placeholder="age" class="bg-transparent shadow-md rounded px-8 py-1"><br>
                    <input type="number" name="semester" id="" placeholder="semester" class="bg-transparent shadow-md rounded px-8 my-1"><br>
                    <button class="bg-blue-600 round text-blue-200 p-2">{{ __('Add new student')}}</button>
                </form>
                <div class="my-4">
                    <a href="/students" class="border bg-blue-600 rounded text-blue-200 p-2 px-4">{{ __('back')}}</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>