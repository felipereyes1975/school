<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="SHOW" class="bg-transparent rounded px-8 pt-6 pb-8 mb-4 ">
                        <input type="text" name="" id="" class="bg-transparent rounded">
                        <button class="p-2 bg-gray-600 text-gray-100 rounded"
                        aria-placeholder="type name">{{__('Search')}}</button>
                        <a href="/students/new"
                        class="bg-blue-600 rounded text-blue-200 px-10 py-3 right-0">{{ __('Create') }}</a>
                    </form>
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
                            <tr class="border border-separate p-5 m-10 mt-5 border border-slate-500">
                                <td class="p-4"> {{ $student->id }} </td>
                                <td> {{ $student->names }} </td>
                                <td>{{ $student->last_name }}</td>
                                <td>{{ $student->second_last_name }}</td>
                                <td class="inline-block m-4 content-center flex">
                                <a href="/students/view/{{ $student->id }}/" 
                                class="text-green-200 bg-green-600 rounded p-2 mx-2 w-1/3 text-center">{{__("view")}}</a>
                                <a href="/students/edit/{{ $student->id }}" 
                                class="text-blue-200 bg-blue-600 rounded p-2 mx-2 w-1/3 text-center">{{__('edit')}}</a>
                                <a href="" class="text-red-200 bg-red-600 rounded p-2 mx-2 w-1/3 text-center">{{__('delete')}}</a></td>
                            </tr>
                            @empty
                            <tr>
                                <td>{{__('no students yet :(')}}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    
                </div>    
            </div>
        </div>
    </div>
</x-app-layout>