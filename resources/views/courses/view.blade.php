<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('course') }}
        </h2>
    </x-slot>

    @include('components.CRUDit.view', ['data' => $course, 'type' => 'courses','created_by' => $created_by, 'updated_by' => $updated_by])
    @include('components.schedule', ['course' => $course, 'hours' => $hours, 'days' => $days, 'schedule' => $schedule])
</x-app-layout>