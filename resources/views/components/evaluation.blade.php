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
                    <div class="container p-6 my-2 text-xl">
                        <span>{{__('You can evaluate ')}}</span>
                        <span>{{$class->first()->desc}}</span>
                        <span>{{__(' here!')}}</span>
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
                    @forelse($class as $matter)
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
                            <input placeholder="asign final note" value="{{$matter->evaluation}}" min="0" max="10" step="0.1" type="number" id="{{$matter->id}}" name="{{$matter->id}}" class="bg-transparent border rounded p-2 px-5 w-2/3"/>
                            <button id="btn-{{$matter->id}}" onclick="setCalif('{{$matter->id}}')" class="text-gray-200 bg-blue-600 rounded w-1/4 py-2">{{__('set')}}</button>
                        </td>
                    </tr>
                    @empty
                    <p>{{__('Nothing to evaluate')}}</p>
                    @endforelse
                    </tbody>
                    </table>
                    <form action="{{route('evaluation.update')}}" method="POST">
                        @csrf
                    <div class="container w-full flex">
                        <span class="basis-2/4"></span>
                        <span class="basis-2/4"></span>
                        <input type="text" name="notes" id="notes_input" class="bg-transparent hidden">
                    <button type="submit" class="basis-1/4 py-2 px-8 right-0 mx-4 my-2 border bg-orange-600 rounded" onclick="return validate()">{{__('Submit')}}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var notes = [];
        const notes_input = document.getElementById('notes_input')
        function validate(){
            if (notes.size == 0)
            {
                alert('evaluations are unset')
                return false
            } else {
                return true;
            }
        }
        function setCalif(id)
        {
            try {
                var isSetting =true;
                var index_note = 0;
                var button =document.getElementById('btn-'+id)
                for (let index = 0; index < notes.length; index++) {
                    if (notes[index][0] == id)
                    {
                        index_note = index;
                        isSetting =false;
                        break
                    }
                }
                if (isSetting)
                {
                    
                    var input = document.getElementById(id)
                    var note = Number(input.value)
                    notes.push([Number(id), note])
                    button.style.backgroundColor = 'green'
                    button.innerHTML = 'unset'

                } else {
                    var input = document.getElementById(id)
                    input.value = ""
                    notes.splice(index_note, 1)
                    button.style.backgroundColor = 'rgb(37 99 235 / var(--tw-bg-opacity))'
                    button.innerHTML = 'set'
                }    
                notes_input.value = JSON.stringify(notes)
            } catch (error) {
                alert(error)
            }
        }
        function cleanSessions(){
            try {
                inn.value = ""
                lista.textContent = ""
            } catch (error) {
                alert(error.message)
            }
        }
    </script>
</x-app-layout>