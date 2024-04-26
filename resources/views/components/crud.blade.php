@props([
    'type',
    'data'
    ])

<div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route($type.'.show') }}" method="post" class="bg-transparent rounded px-8 pt-6 pb-8 mb-4 w-full">
                        @csrf   
                        <input type="text" name="search" id="" class="bg-transparent rounded text-gray-200" placeholder="type search">
                        <button class="p-2 bg-gray-600 text-gray-100 rounded"
                        >{{__('Search')}}</button>
                        <a href="/{{$type}}/new"
                        class="bg-blue-600 rounded px-10 py-3">{{ __('Create') }}</a>
                        <a href="/{{$type}}/restore"
                        class="border rounded px-10 py-3 ">{{ __('Restore') }}</a>
                    </form>
                    <table class="border-collapse border border-slate-500 rounded w-full">
                        <thead>
                            <tr>
                                <!-- <th class="border border-slate-500 p-5">{{ __('ID') }}</th>
                                <th class="border border-slate-500 p-5">{{ __('NAME') }}</th>
                                <th class="border border-slate-500 p-5">{{ __('LAST NAME') }}</th>
                                <th class="border border-slate-500 p-5">{{ __("LAST NAME")}}</th>
                                <th class="border border-slate-500 p-5">{{ __('ACTIONS') }}</th> -->
                                @foreach(json_decode($data->first()) as $colum => $value)
                                @if(strpos($colum, 'dated') == false and strpos($colum, 'eleted') == false and strpos($colum, 'eated') == false)
                                <th class="border border-slate-500 p-5">{{$colum}}</th>
                                @endif
                                @endforeach
                                <th class="border border-slate-500 p-5">{{ __('ACTIONS') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $row)
                            <tr class="border border-separate p-2 border border-slate-500
                            odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                
                                @foreach(json_decode($row) as $colum => $value)
                                @if(strpos($colum, 'created') == false and strpos($colum, 'at') == false and strpos($colum, 'dated') == false)
                                <td class="p-4">{{$value}}</td>
                                @endif
                                @endforeach
                                <td class="inline-block m-4 content-center flex px-5">
                                <a href="/{{$type}}/view/{{ $row->id }}/" 
                                class="bg-green-600 rounded p-2 mx-2 w-1/3 text-center">{{__("view")}}</a>
                                <a href="/{{$type}}/edit/{{ $row->id }}" 
                                class="bg-blue-600 rounded p-2 mx-2 w-1/3 text-center">{{__('edit')}}</a>
                                <form action="{{route($type.'.delete')}}" class="w-2/3" method="post">
                                @csrf
                                    <input type="number" name="id" id="" class="hidden" value="{{$row->id}}">
                                    <button class="bg-red-600 rounded p-2 mx-2 w-2/3 text-center" onclick="return confirm('sure?')">{{__('delete')}}</button>
                                </form>
                            </tr>
                            @empty
                            <tr>
                                <td>{{__('no '.$type.' yet :(')}}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>