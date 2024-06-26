@props([
    'data',
    'type',
    'created_by',
    'updated_by'])
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @csrf
                    <table class="m-4 border-spacing-7">
                        @foreach (json_decode($data) as $key => $value)
                        @if($key == "created_by" or $key =="updated_by" or $key == "created_at" or $key =="updated_at")

                        @else
                        <tr>
                            <td class="p-2">{{$key}}</td>
                            <td>{{$value}}</td>
                        </tr>
                        @endif
                        
                        @endforeach
                        <tr>
                            <td class="p-2">{{__('created by:')}}</td>
                            <td class="my-2"><a href="/users/{{$created_by->id}}"> {{ $created_by->name }}</a></td>
                            <td class="p-2">{{ $data->created_at }}</td>
                        </tr>
                        @if($updated_by)
                        <tr>
                            <td class="p-2">{{__('updated by:')}}</td>
                            <td class="my-2"><a href="/users/{{$updated_by->id}}"> {{ $updated_by->name }} </a></td>
                            <td class="p-2"> {{ $data->updated_at }} </td>
                        </tr>
                        @endif
                       
                    </table>
                    <a href="/{{$type}}" class="bg-blue-600 rounded text-blue-200 p-2 px-4 mx-4e">{{ __('back')}}</a>
                </div>
            </div>
        </div>
    </div>