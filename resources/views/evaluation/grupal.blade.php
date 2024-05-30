<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- to asign crud -->
                @include('components.evaluation',['class' => $class, 'type' => 'courses'] )
            </div>
        </div>
    </div>
</x-app-layout>