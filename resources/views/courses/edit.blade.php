<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="mb-4">{{ __('Update the Course: ') }}{{ $Course->desc }}</h1>
                <form method="POST" class="bg-transparent rounded px-8 pt-6 pb-8 mb-4 ">
                    @csrf
                    <table>
                        <tr>
                            <td><span>{{__('Description:')}}</span></td>
                            <td><input type="text" name="desc" id="" class="bg-transparent rounded" value="{{$Course->desc}}"></td>
                        </tr>
                        <tr>
                            <td><span>{{__('Semester:')}}</span></td>
                            <td><input type="number" name="semester" id="" class="bg-transparent rounded" value="{{$Course->semester}}"></td>
                        </tr>
                        <tr>
                            <td class="p-2"><span>{{__('Classroom:')}}</span></td>
                            <td>
                            <select name="classroom" id="" class="bg-transparent">
                            @forelse($classrooms as $classroom)
                            @if ($classroom->id == $Course->classroom_id)
                            <option selected class="border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 dark:text-gray-200 dark:bg-gray-800">{{$classroom->id}}</option>
                            @else
                            <option class="border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 dark:text-gray-200 dark:bg-gray-800">{{$classroom->id}}</option>
                            @endif
                            @empty
                            @endforelse
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2"><span>{{__('Matter:')}}</span></td>
                            <td>
                            <select name="matter" id="matterSelect" class="bg-transparent rounded" onchange="setHoursWeek()">
                                @forelse($matters as $matter)
                                @if ($matter->id == $Course->matter_id)
                                    <option selected value="{{$matter->id}}"  horas="{{$matter->hoursPerWeek}}" class="border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 dark:text-gray-200 dark:bg-gray-800">{{$matter->desc}}</option>
                                @else
                                    <option value="{{$matter->id}}"  horas="{{$matter->hoursPerWeek}}" class="border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 dark:text-gray-200 dark:bg-gray-800">{{$matter->desc}}</option>
                                @endif
                                @empty
                                @endforelse
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2"><span>{{__('Teacher')}}</span></td>
                            <td>
                                <select name="teacher" id="" class="bg-transparent rounded">
                                    @forelse($teachers as $teacher)
                                    @if ($teacher->id == $Course->teacher_id)
                                        <option selected value="{{$teacher->id}}" class="border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 dark:text-gray-200 dark:bg-gray-800">{{$teacher->name.' '.$teacher->last_name.' '.$teacher->second_last_name}}</option>
                                    @else
                                        <option value="{{$teacher->id}}" class="border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 dark:text-gray-200 dark:bg-gray-800">{{$teacher->name.' '.$teacher->last_name.' '.$teacher->second_last_name}}</option>
                                    @endif
                                    @empty
                                    @endforelse
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2"><span>{{__('Hours per week:')}}</span></td>
                            <td><span id="hoursWeek">{{$matter->hoursPerWeek}}</span></td>
                        </tr>
                        
                    </table>
                    <div class="m-2">
                    <tr>
                            <td><span>{{__('days')}}</span></td>
                            <td>
                            <select name="" id="day" class="bg-transparent rounded">
                                @forelse($days as $day)
                                <option value="{{$day->id}}" class="border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 dark:text-gray-200 dark:bg-gray-800">{{$day->desc}}</option>
                                @empty
                                @endforelse
                            </select>
                            </td>
                            <td><span class="text-center px-4">{{__('hours')}}</span></td>
                            <td>
                            <select name="" id="hour" class="bg-transparent rounded">
                                @forelse($hours as $hour)
                                <option value="{{$hour->id}}" class="border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 dark:text-gray-200 dark:bg-gray-800">{{$hour->start_at.' '.$hour->end_at}}</option>
                                @empty
                                @endforelse
                            </select>
                            </td>
                            <td>
                                <button type="button" class="border bg-orange-600 rounded text-grey-200 p-2 px-4" onclick="addSession()" >{{__('add session')}}</button>
                                <button type="button" class="border bg-red-600 rounded text-grey-200 p-2 px-4" onclick="cleanSessions()" >{{__('clean sessions')}}</button>
                            </td>
                        </tr>
                        <tr>
                        <div class="bg-gray-900 rounded m-5 p-3 display:flex">
                            <ul id="horasAgregadas"></ul>
                            <input type="text" name="horario" id="horario" class="text-gray-600 hidden ">
                        </div>
                    </tr>
                </div>
                    <button class="bg-blue-600 round text-gray-200 p-2 rounded border p-auto m-auto" type="submit" onclick="return validation('{{$matter->hoursPerWeek}}')">{{ __('Update course')}}</button>
                </form>
                @include('components.schedule', ['course' => $Course, 'hours' => $hours, 'days' => $days, 'schedule' => $schedule])
                </div>
                <div class="my-2">
                    <a href="/courses" class="border bg-orange-600 rounded text-gray-200 p-2 m-5 px-4">{{ __('Cancel')}}</a>
                </div>
            </div>
            <script>
                let horario = [];
                const materia = document.getElementById('matterSelect')
                const hoursWeek =document.getElementById('hoursWeek')
                const lista = document.getElementById('horasAgregadas')
                const day = document.getElementById('day')
                const hour = document.getElementById('hour')
                const inn = document.getElementById('horario')
                function setHoursWeek()
                {
                    try {
                    var selected = materia.options[materia.selectedIndex]
                    var horas = selected.getAttribute('horas')
                    hoursWeek.innerHTML = horas
                    } catch (error) {
                     alert(error)   
                    }                
                }
                function validation()
                {
                    if ((horario.length) == Number(hoursWeek.innerHTML))
                    {
                        return confirm('sure?')
                    } else {
                        alert('This schedule has incorrect hours, please retry')
                        return false
                    }
                }
                function cleanSessions(){
                    try {
                        horario = [];
                        inn.value = ""
                        lista.textContent = ""
                    } catch (error) {
                        alert(error.message)
                    }
                }
                function removeSesion(relacion)
                {
                    try {
                        var saveIndex
                    for (let index = 0; index < horario.length; index++) {
                        if (relacion == horario[index])
                        {
                           saveIndex = index
                           console.log(saveIndex)
                        }
                    }
                    horario.splice(saveIndex, 1)
                    document.getElementById('horario').value = JSON.stringify(horario)
                    } catch (error) {
                        alert(error)
                    }
                    
                }
                function validateSession()
                {
                    try {
                        var relacion = [day.selectedIndex + 1, hour.selectedIndex + 1]
                        var saveIndex
                    for (let index = 0; index < horario.length; index++) {
                        if (relacion[1] == horario[index][1] && relacion[0] == horario[index][0])
                        {
                           alert('session already selected')
                           return false
                        }
                    }
                    return true
                    } catch (error) {
                        alert(error)
                    }
                }
                function addSession(){
                    try {
                    //alert(hour.value)
                    if(hour && day && validateSession())
                    {
                        
                        const li = document.createElement('li')
                        const deleteSession = document.createElement('button')
                        let dayIndex = day.options[day.selectedIndex].text
                        let hourIndex = hour.options[hour.selectedIndex].text
                        var relacion = dayIndex +" - "+ hourIndex
                        li.textContent = relacion
                        li.id = [day.selectedIndex +1, hour.selectedIndex+1]
                        li.appendChild(deleteSession)
                        deleteSession.classList.add('bg-red-600')
                        deleteSession.classList.add('rounded')
                        deleteSession.classList.add('p-2')
                        deleteSession.classList.add('m-2')
                        deleteSession.textContent = "remove"
                        deleteSession.type = "button"
                        deleteSession.onclick = function () {
                            removeSesion(this.parentElement.id)
                            this.parentElement.parentElement.removeChild(this.parentElement);
                        };
                        li.classList.add("rounded")
                        li.classList.add("bg-gray-600")
                        li.classList.add("p-2")
                        li.classList.add("m-2")
                        li.classList.add("text-gray-200")
                        li.classList.add("border")
                        li.value = day.options[day.selectedIndex].text +" - "+hour.options[hour.selectedIndex].text
                        horario.push([Number(day.value), Number(hour.value)])
                        document.getElementById('horario').value = JSON.stringify(horario)
                        lista.appendChild(li)
                    }
                    } catch (error) {
                        alert(error)
                    }
                }
            </script>
            
        </div>
    </div>
</x-app-layout>