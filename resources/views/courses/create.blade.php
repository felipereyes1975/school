<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="mb-4">{{ __('Register a new Course') }}</h1>
                <form method="POST" class="bg-transparent rounded px-8 pt-6 pb-8 mb-4 ">
                    @csrf
                    <table>
                        <tr>
                            <td><span>{{__('Description:')}}</span></td>
                            <td><input type="text" name="desc" id="" class="bg-transparent rounded"></td>
                        </tr>
                        <tr>
                            <td><span>{{__('Semester:')}}</span></td>
                            <td><input type="number" name="semester" id="" class="bg-transparent rounded"></td>
                        </tr>
                        <tr>
                            <td class="p-2"><span>{{__('Classroom:')}}</span></td>
                            <td>
                            <select name="classroom" id="" class="bg-transparent">
                            @forelse($classrooms as $classroom)
                            <option class="border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 dark:text-gray-200 dark:bg-gray-800">{{$classroom->id}}</option>
                            @empty
                            @endforelse
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2"><span>{{__('Matter:')}}</span></td>
                            <td>
                            <select name="matter" id="" class="bg-transparent rounded">
                                @forelse($matters as $matter)
                                <option value="{{$matter->id}}" class="border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 dark:text-gray-200 dark:bg-gray-800">{{$matter->desc}}</option>
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
                                    <option value="{{$teacher->id}}" class="border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 dark:text-gray-200 dark:bg-gray-800">{{$teacher->name.' '.$teacher->last_name.' '.$teacher->second_last_name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2"><span>{{__('Hours per week:')}}</span></td>
                            <td><span>{{$matter->hoursPerWeek}}</span></td>
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
                            <input type="text" name="horario" id="horario" class="text-gray-600 ">
                        </div>
                    </tr>
                </div>
                    <br>
                    
                    <button class="bg-blue-600 round text-gray-200 p-2 rounded border" type="submit">{{ __('Add new course')}}</button>
                </form>
                
                
                <table class="align-center">
                        @forelse($hours as $hour)
                        <tr>
                            <td><span>{{$hour->start_at}}</span></td>
                            @forelse($days as $day)
                            <td class="border p-4 ">{{$day->desc}}</td>
                            @empty
                            @endforelse
                        </tr>
                        @empty
                        @endforelse
                    </table>

                </div>
                <div class="my-4">
                    <a href="/courses" class="border bg-blue-600 rounded text-blue-200 p-2 m-5 px-4">{{ __('back')}}</a>
                </div>
            </div>
            <script>
                let horario = [];
                function cleanSessions(){
                    try {
                        horario = [];
                        const lista = document.getElementById('horasAgregadas')
                        const inn = document.getElementById('horario')
                        inn.value = ""
                        lista.textContent = ""
                    } catch (error) {
                        alert(error.message)
                    }
                }
                function addSession(){
                    try {
                    const lista = document.getElementById('horasAgregadas')
                    const day = document.getElementById('day')
                    const hour = document.getElementById('hour')
                    //alert(hour.value)
                    if(hour && day)
                    {
                        const li = document.createElement('li')
                        const deleteSession = document.createElement('button')
                        let dayIndex = day.options[day.selectedIndex].text
                        let hourIndex = hour.options[hour.selectedIndex].text
                        var relacion = dayIndex +" - "+ hourIndex
                        li.textContent = relacion
                        li.id = relacion
                        //myDay = JSON.parse(day.value)
                        //alert(day.options[day.selectedIndex].text)
                        li.classList.add("rounded")
                        li.classList.add("bg-gray-600")
                        li.classList.add("p-2")
                        li.classList.add("m-2")
                        li.classList.add("text-gray-200")
                        li.classList.add("border")
                        // li.appendChild(deleteSession)
                        // deleteSession.classList.add('bg-red-600')
                        // deleteSession.classList.add('rounded')
                        // deleteSession.classList.add('p-2')
                        // deleteSession.classList.add('m-2')
                        // deleteSession.textContent = "remove"
                        // deleteSession.type = "button"
                        // deleteSession.addEventListener("click", function($this){
                        //     var indice = horario.indexOf([day.options[day.selectedIndex].text, hour.options[hour.selectedIndex].text])
                        //     // alert(indice)
                        //     // horario.splice(indice, 1)
                        //     // alert(horario)
                        //     alert(node.pareng)
                        //     //alert('searchJson: '+JSON.stringify(horario))
                        //     var searchJson = JSON.stringify(horario); // "[3,566,23,79]"
                        //     //alert('arrJson: '+horario.map(JSON.stringify))
                        //     var arrJson = horario.map(JSON.stringify); // ["[2,6,89,45]", "[3,566,23,79]", "[434,677,9,23]"]
                        //     alert(arrJson.indexOf(searchJson));
                        //     lista.removeChild(document.getElementById(day.options[day.selectedIndex].text +" - "+hour.options[hour.selectedIndex].text))
                        //     document.getElementById('horario').value = JSON.stringify(horario)
                        // });
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