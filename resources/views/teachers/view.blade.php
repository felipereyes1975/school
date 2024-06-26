<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Teacher') }}
        </h2>
    </x-slot>

    @include('components.CRUDit.view', ['data' => $teacher, 'type' => 'teachers', 'created_by' => $created_by, 'updated_by' => $updated_by])

</x-app-layout>