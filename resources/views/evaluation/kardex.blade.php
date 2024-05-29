<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kardex') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container p-6 my-2 text-xl">
                        <span>{{__('Hello ')}}</span>
                        <span>{{__(' this is your kardex!')}}</span>
                    </div>
                    <table class="w-full border">
                        <thead class="border">
                            <th>{{__('id')}}</th>
                            <th>{{__('Student')}}</th>
                            <th>{{__('Semester')}}</th>
                            <th>{{__('Matter')}}</th>
                            <th>{{__('Classroom')}}</th>
                            <th>{{__('Evaluation')}}</th>
                        </thead>
                        <tbody>
                    @forelse($student as $matter)
                    <tr class="border text-center">
                        <td class="text-center">{{$matter->id}}</td>
                        <td>
                            <span>{{$matter->names}}</span>
                            <span>{{$matter->last_name}}</span>
                            <span>{{$matter->second_last_name}}</span>
                        </td>
                        <td>{{$matter->semester}}</td>
                        <td>{{$matter->desc}}</td>
                        <td>{{$matter->classroom_id}}</td>
                        <td>
                            @if ($matter->approved)
                            <span class="text-green-600">{{$matter->evaluation}}</span>
                            @else
                            <span class="text-red-600">{{$matter->evaluation}}</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <p>{{__('Nothing to evaluate')}}</p>
                    @endforelse
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>