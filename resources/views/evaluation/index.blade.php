<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Evaluation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Hello") }} {{ Auth::user()->name}} {{ (', you can evaluate here!') }}
                    <div class="container p-6 mx-auto my-10 bg-gray-600 rounded-lg">
                        <a href="/evaluation/courses">{{__('Evaluate a Class')}}</a>
                    </div>
                    
                    <div class="container p-6 mx-auto my-10 bg-gray-600 rounded-lg">
                    <a href="/evaluation/students">{{__('Evaluate a Student')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>