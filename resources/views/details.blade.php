@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="font-weight: bold; background-color: #E5E4E2;">Ticket#  {{ $details['id'] }} -  {{ $details['subject'] }}</div>
                    <div class="card-header">
                        <div style="width: 100%; display: flex;">
                            <span style="margin-right: 10px;">Status : 
                                <span class="badge badge-primary">{{ $details['status'] }}</span>
                            </span>
                            <span style="margin-right: 10px;">Priority : 
                                <span class="badge badge-info">{{ $details['priority'] }}</span>
                            </span>    
                        </div>
                        <div style="width: 100%; display: block;">
                            <span style="float: left; margin-right: 10px;">Created : 
                            {{ $details['created_at'] }}
                            </span>
                            <span style="float: right; margin-right: 10px;">Updated : 
                            {{ $details['updated_at'] }}
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <span style="font-weight: bold">Description :</span><br>
                        {{ $details['description'] }}
                        <br>
                    </div>
                    <div class="card-footer">
                        <span style="float: left; padding-right: 10px; width: 33%;"><u>Requester</u>: {{ $details['requester_id'] }}</span>
                        <span style="float: left; padding-right: 10px; width: 33%;"><u>Submitter</u>: {{ $details['submitter_id'] }}</span>
                        <span style="float: left; padding-right: 10px; width: 33%;"><u>Assignee</u>: {{ $details['assignee_id'] }}</span>                        
                    </div>
                    <div class="card-footer">
                        <form method="GET" action="http://127.0.0.1:8000/tickets">
                            <div class="ml-4 form-group row mb-0">
                                <input type="hidden" name="_token" value="bRsjfPTMYuhqdIDohNpJZv1PTt7crAAjTWBnDzmG">                        
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Go Back
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