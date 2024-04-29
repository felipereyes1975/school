@props([
    'data',
    'type'])
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <table class="border-collapse border border-slate-500 rounded w-full">
                        <thead>
                            <tr>
                                @if(json_decode($data->first()))
                                @foreach(json_decode($data->first()) as $colum => $value)
                                @if(strpos($colum, 'dated') == false and strpos($colum, 'eletd') == false and strpos($colum, 'eated') == false)
                                <th class="border border-slate-500 p-5">{{$colum}}</th>
                                @endif
                                @endforeach
                                <th class="border border-slate-500 p-5">{{ __('ACTIONS') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $row)
                            <tr class="border border-separate p-2 border border-slate-500
                            odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                @foreach(json_decode($row) as $colum => $value)
                                @if(strpos($colum, 'created') == false and strpos($colum, 'eat') == false and strpos($colum, 'dated') == false)
                                <td class="p-4">{{$value}}</td>
                                @endif
                                @endforeach
                                <td class="inline-block m-4 content-center flex px-5">
                                <form action="{{route($type.'.restoredd')}}" class="w-2/3" method="post">
                                @csrf
                                    <input type="number" name="id" id="" class="hidden" value="{{$row->id}}">
                                    <button class="bg-blue-600 rounded p-2 mx-2 w-2/3 text-center" onclick="return confirm('sure?')">{{__('restore')}}</button>
                                </form>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center p-5">{{__('no '.$type.' to restore :)')}}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="container flex">
                        <a href="/{{$type}}" class="border bg-blue-600 rounded text-blue-200 p-2 px-4 my-4">{{ __('back')}}</a>
                        </div>
                </div>
            </div>
        </div>
    </div>