@extends('layouts.app')

@section('content')  
        <div class="container mt-5">
        <form method="GET" action="{{url('/home')}}"><div class="ml-16 form-group row mb-0 d-flex justify-content-center">
                        @csrf
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Home') }}
                            </button>
                        </div>
                    </div>
                </form>
</br>
            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="table-success">
                        <th scope="col">Id</th>
                        <th scope="col">Type</th>
                        <th scope="col">Stauts</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Create Time</th>
                        <th scope="col">Update Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $ticket)
                    <tr>
                        <td><a href="{{ url('/details/'.$ticket["id"].'/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ $ticket['id'] }}</a></td>
                        <td>{{ $ticket['type'] }}</td>
                        <td>{{ $ticket['status'] }}</td>
                        <td>{{ $ticket['priority'] }}</td>
                        <td>{{ $ticket['subject'] }}</td>
                        <td>{{ $ticket['created_at'] }}</td>
                        <td>{{ $ticket['updated_at'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $data->links() !!}
        </div>
        </div>
        @endsection        


 




