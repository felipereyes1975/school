<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('matter') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" class="p-5">
                        @csrf
                        @if($matter)
                        
                        <table class="">
                        <tr>
                            <td class="p-2">id:</td><td>{{$matter->id}}</td>
                        </tr>
                        <tr>
                        <td class="p-2">description:</td><td><input type="text" class="bg-transparent rounded" name="desc" id="" value="{{$matter->desc}}"> </td>
                        </tr>
                        <tr>
                        <td class="p-2">semester:</td><td><input type="number" class="bg-transparent rounded" name="semester" id="" value="{{$matter->semester}}"> </td>
                        </tr>
                        <tr>
                        <td class="p-2">hours per week:</td><td><input type="number" class="bg-transparent rounded" name="hoursPerWeek" id="" value="{{$matter->hoursPerWeek}}"> </td>
                        </tr>
                        </table>
                        <button class="border rounded text-blue-200 p-2 px-4 my-2 mx-2" style="margin-left: 235px;">{{ __('edit') }}</button>
                        @else
                        <p>{{__('no such a matter')}}</p>
                        @endif
                        <div class="container flex my-5 ">
                        <a href="/matters" class="border bg-blue-600 rounded text-blue-200 p-2 px-4 ">{{ __('back')}}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>