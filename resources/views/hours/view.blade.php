<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Hour') }}
        </h2>
    </x-slot>

    @include('components.CRUDit.view', ['data' => $hour, 'type' => 'hours','created_by' => $created_by, 'updated_by' => $updated_by])
</x-app-layout>