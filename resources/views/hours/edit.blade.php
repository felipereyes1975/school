<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Hour') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" class="p-5">
                        @csrf
                        @if($hour)
                        
                        <table class="">
                        <tr>
                            <td class="p-2">id:</td><td>{{$hour->id}}</td>
                        </tr>
                        <tr>
                        <td class="p-2">names:</td><td><input type="time" class="bg-transparent rounded" name="start_at" id="" value="{{$hour->start_at}}"> </td>
                        </tr>
                        <tr>
                        <td class="p-2">last name:</td><td><input type="time" class="bg-transparent rounded" name="end_at" id="" value="{{$hour->end_at}}"> </td>
                        </tr>
                        </tr>
                        </table>
                        <button class="border rounded text-blue-200 p-2 px-4 " style="margin-left: 235px;">{{ __('edit') }}</button>
                        @else
                        <p>{{__('no such a hour')}}</p>
                        @endif
                        <div class="container flex my-5">
                        <a href="/hours" class="border bg-blue-600 rounded text-blue-200 p-2 px-4">{{ __('back')}}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>