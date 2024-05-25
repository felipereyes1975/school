@props([
    'course',
    'days',
    'hours',
    'schedule'
    ])

<div class="p-6 text-gray-900 dark:text-gray-100 grid">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
        <div class="p-6 text-gray-900 dark:text-gray-100 text-center display-flex ">            
        <table class="">
            {{ $color = ''}}
            @forelse($hours as $hour)
            <tr>
                @forelse($days as $day)
                    @forelse($schedule as $session)
                        @if ($session->hour_id == $hour->id && $session->day_id == $day->id)
                         @php($color = 'bg-green-400 text-gray-900') 
                         @break
                         @else
                         @php($color = '')  
                        @endif
                    @empty
                    @endforelse
                <td class="border p-5 {{$color}}">{{ $day->desc}} - {{ $hour->start_at}}</td>
                @empty
                @endforelse
            </tr>
            @empty
            @endforelse
        </table>
        <a href="/courses/{{$course->id}}/assistants">
        <button class="p-4 m-2 w-full bg-green-500 text-gray-800 text-lg rounded-lg border-gray-200">show assistant list</button>
        </a>
        </div>
    </div>
</div>