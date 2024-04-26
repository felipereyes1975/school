<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Students deleted') }}
        </h2>
    </x-slot>

    @include('components.CRUDit.restore', ['data' => $students, 'type' => 'students'])
</x-app-layout>