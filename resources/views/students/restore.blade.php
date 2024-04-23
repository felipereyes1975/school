<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Students deleted') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <table class="border-collapse border border-slate-500 rounded w-full">
                        <thead>
                            <tr>
                                <th class="border border-slate-500 p-5">{{ __('ID') }}</th>
                                <th class="border border-slate-500 p-5">{{ __('NAME') }}</th>
                                <th class="border border-slate-500 p-5">{{ __('LAST NAME') }}</th>
                                <th class="border border-slate-500 p-5">{{ __("LAST NAME")}}</th>
                                <th class="border border-slate-500 p-5">{{ __('ACTIONS') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                            <tr class="border border-separate p-2 border border-slate-500
                            odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="p-4"> {{ $student->id }} </td>
                                <td> {{ $student->names }} </td>
                                <td>{{ $student->last_name }}</td>
                                <td>{{ $student->second_last_name }}</td>
                                <td class="inline-block m-4 content-center flex px-5">
                                <form action="{{route('students.restoredd')}}" class="w-2/3" method="post">
                                @csrf
                                    <input type="number" name="id" id="" class="hidden" value="{{$student->id}}">
                                    <button class="bg-blue-600 rounded p-2 mx-2 w-2/3 text-center" onclick="return confirm('sure?')">{{__('restore')}}</button>
                                </form>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center p-5">{{__('no students to restore :)')}}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="container flex">
                        <a href="/students" class="border bg-blue-600 rounded text-blue-200 p-2 px-4 my-4">{{ __('back')}}</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>