@extends('layouts.app')

@section('content')  
        <div class="container mt-5">
            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="table-success">
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $ticket)
                    <tr>
                        <td>{{ $ticket['id'] }}</td>
                        <td>{{ $ticket['title'] }}</td>
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


 




