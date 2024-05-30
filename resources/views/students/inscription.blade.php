<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Register students in Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="font-semibold m-5 text-xl text-gray-800 dark:text-gray-200 leading-tight bg-gray-800 p-10 rounded-xl">
            <span>Welcome {{$student->names}}, you can suscribe here</span>
            </div>
           <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight bg-gray-800 p-5 rounded-xl">
            <span class="mx-5">{{__('Avilable:')}}</span>
            {{ $canPrint =False;}}
                <div class="bg-gray-900 rounded m-5 p-3 display:flex grid">
                    <ul id="avilablecourses">
                       
                    @forelse($avilable as $course)
                        @if (count($suscribed) >= 1)
                            @php($canPrint = True)
                            @forelse($suscribed as $sus)

                             @if ($course->id == $sus->id)
                                @php($canPrint = False)
                             @endif
                            @empty
                            @endforelse
                             @if($canPrint)
                             <li class="bg-gray-500 p-2 rounded">
                             <span>{{$course->desc}}</span>
                             <button onclick="addCourse('{{json_encode($course)}}')" class="bg-green-600 rounded p-1 m-1 w-auto text-center">{{__('Suscribe!')}}</button>
                             <a href="/courses/view/{{$course->id}}/" class="bg-blue-600 rounded p-2 mx-1 w-auto text-center">{{__('view')}}</a>
                            </li>
                            @endif
                         
                        @else
                    <li class="bg-gray-500 p-2 rounded">
                         <span>{{$course->desc}}</span>
                         <button onclick="addCourse('{{json_encode($course)}}')" class="bg-green-600 rounded p-1 m-1 w-auto text-center">{{__('Suscribe!')}}</button>
                         <a href="/courses/view/{{$course->id}}/" class="bg-blue-600 rounded p-2 mx-1 w-auto text-center">{{__('view')}}</a>
                        </li>
                        @endif
                    @empty
                    @endforelse
                    </ul>
                </div>
                <span class="mx-5">{{__('Selected:')}}</span>
                <button onclick="cleanCourses()" class="bg-orange-600 rounded text-grey-200 p-1 px-4">{{__('Clean selection')}}</button>
                <div class="bg-gray-900 rounded m-5 p-3 display:flex grid">
                    <ul id="addedcourses">
                    </ul>
                </div>
                <form action="{{route('studentcourse.store')}}" method="POST">
                    @csrf
                    <input type="text" name="courses" id="courses" class="text-gray-600 hidden">
                    <input type="text" name="student" id="student" value="{{$student->id}}" class="text-gray-600 hidden">
                    <br>
                    <button class="bg-orange-600 rounded mx-4 text-grey-200 p-2 px-4" onclick="return confirm('sure?')">{{__('Confirm')}}</button>
                </form>
                <br>
                <span class="mx-5">{{__('On-going:')}}</span>
                <div class="bg-gray-900 rounded m-5 p-3 display:flex grid">
                    <ul id="avilablecourses">
                       @forelse($suscribed as $course)
                            @if($course->evaluation == null)
                            <li class="bg-gray-500 p-4 rounded">
                             <span>{{$course->desc}}</span>
                             <a href="/courses/view/{{$course->id}}/" class="bg-blue-600 rounded p-2 mx-1 w-auto text-center">{{__('view')}}</a>
                            </li>
                            @endif
                       @empty
                       @endforelse
                    </ul>
                </div>
                <div class="container m-4 py-5">
                    <a href="/students/view/{{$student->id}}" class="py-2 px-8 my-10 border bg-blue-600 rounded">back</a>
                    </div>
            </div>
        </div>
    </div>
    <script>
        const lista =document.getElementById('addedcourses')
        var addedCourses = [];
        function cleanCourses()
        {
            addedCourses = [];
            lista.innerText = ""
            document.getElementById('courses').value = JSON.stringify(addedCourses)
        }
        function addCourse(Course)
        {
            try {
                var parsed = JSON.parse(Course)
                if (!addedCourses.includes(parsed.id))
                {
                const li = document.createElement('li')
                li.classList.add("rounded")
                li.classList.add("bg-gray-600")
                li.classList.add("p-2")
                li.classList.add("m-2")
                li.classList.add("text-gray-200")
                li.classList.add("border")
                li.innerText = parsed.desc
                li.value = parsed.desc
                addedCourses.push(parsed.id)
                document.getElementById('courses').value = JSON.stringify(addedCourses)
                lista.appendChild(li)
                } else {
                    alert('This course is already selected: '+ parsed.desc)
                }
            } catch (error) {
                alert(error)
            }
        }
    </script>
</x-app-layout>