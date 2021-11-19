@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ticket# ') }} {{ $details['id'] }} -  {{ $details['subject'] }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     
                    Description: {{ $details['description'] }} <br>
                    Status:  {{ $details['status'] }} <br>
                    Priority:  {{ $details['priority'] }} <br>
                    Requester Id: {{ $details['requester_id'] }} <br>
                    Submitter Id: {{ $details['submitter_id'] }} <br>
                    Assignee Id: {{ $details['assignee_id'] }} <br>
                    Created At: {{ $details['created_at'] }} <br>
                    Updated At: {{ $details['updated_at'] }} <br>
                   
                    <form method="GET" action="{{url('/tickets')}}"><div class="ml-4 form-group row mb-0">
                        @csrf
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Go Back') }}
                            </button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection