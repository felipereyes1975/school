<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" class="p-5">
                        @csrf
                        @if($student)
                        <table class="">
                        <tr>
                            <td class="p-2">id:</td><td>{{$student->id}}</td>
                        </tr>
                        <tr>
                        <td class="p-2">names:</td><td><input type="text" class="bg-transparent rounded" name="names" id="" value="{{$student->names}}"> </td>
                        </tr>
                        <tr>
                        <td class="p-2">last name:</td><td><input type="text" class="bg-transparent rounded" name="last_name" id="" value="{{$student->last_name}}"> </td>
                        </tr>
                        <tr>
                        <td class="p-2">last name:</td><td><input type="text" class="bg-transparent rounded" name="second_last_name" id="" value="{{$student->second_last_name}}"> </td>
                        </tr>
                        </table>
                        <button class="border rounded text-blue-200 p-2 px-4 " style="margin-left: 235px;">{{ __('edit') }}</button>
                        @else
                        <p>{{__('no such a student')}}</p>
                        @endif
                        <div class="container flex">
                        <a href="/students" class="border bg-blue-600 rounded text-blue-200 p-2 px-4">{{ __('back')}}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>