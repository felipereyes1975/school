<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Matter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <form method="POST" action="{{route('matters.store')}}" class="bg-transparent rounded px-8 pt-6 pb-8 mb-4 ">
                    @csrf
                    <h1 class="mb-4">{{ __('Register a new matter') }}</h1><br>
                    <table>
                        <tr>
                            <td><span>description:</span></td>
                            <td><input type="text" name="desc" id="" class="bg-transparent shadow-md rounded px-8 " ></td>
                        </tr>
                        <tr>
                            <td><span>semester:</span></td>
                            <td><input type="number" name="semester" id="" class="bg-transparent shadow-md rounded px-8" ></td>
                        </tr>
                        <tr>
                            <td><span>hours per week:</span></td>
                            <td><input type="number" name="hoursPerWeek" id="" class="bg-transparent shadow-md rounded px-8"></td>
                        </tr>
                    </table>
                    <br>
                    <button class="bg-blue-600 round text-blue-200 p-2 my-2">{{ __('Add new matter')}}</button>
                </form>
                <div class="my-4">
                    <a href="/matters" class="border bg-blue-600 rounded text-blue-200 p-2 px-4">{{ __('back')}}</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>