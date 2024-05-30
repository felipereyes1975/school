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
                    <h1 class="text-3xl text-xl my-4 p-2">{{__('Assistant list for the course ')}}{{$course->desc}}</h1>
                    <table class="w-full text-center border">
                        <thead class="border text-xl uppercase">
                            <th>{{__('id')}}</th>
                            <th>{{__('name')}}</th>
                            <th>{{__('age')}}</th>
                            <th>{{__('semester')}}</th>
                            <th>{{__('evaluation')}}</th>
                            <th>{{__('actions')}}</th>
                        </thead>
                        <tbody>
                    @forelse($assistants as $student)
                    <tr class="bg-gray-900 p-2 m-2 text-xl rounded ">
                        <td>
                            <span>{{$student->id}}</span>
                        </td>
                        <td>
                        <span>{{$student->names}} </span>
                        <span>{{$student->last_name}} </span>
                        <span>{{$student->second_last_name}}</span>
                        </td>
                        <td>
                            <span>{{$student->age}}</span>
                        </td>
                        <td>
                            <span>{{$student->semester}}</span>
                        </td>
                        <td>
                            @if ($student->approved)
                            <span class="text-green-600">{{$student->evaluation}}</span>
                            @else
                            <span class="text-red-600">{{$student->evaluation}}</span>
                            @endif
                        </td>
                        <td>
                        <a href="/students/view/{{$student->id}}"><button class="bg-blue-600 rounded text-gray-200 px-2 py-1">view</button></a>
                        <a href="/students/view/{{$student->id}}"><button class="bg-green-600 rounded text-gray-200 px-2 py-1">evaluate</button></a>
                        </td>
                    </tr>
                    @empty
                    <p class="m-auto">{{__('no students in this course')}}</p>
                    @endforelse
                    </tbody>
                    </table>
                </div>
                <div class="text-xl m-4 p-2">
                    <a href="/courses" class="border bg-blue-600 rounded text-blue-200 p-2 m-5 px-4">{{ __('back')}}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>