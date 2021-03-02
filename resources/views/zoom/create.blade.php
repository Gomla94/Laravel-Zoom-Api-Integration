@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Create New Zoom Meeting
    </div>
    <div class="card-body">
        <form action="{{ route('meeting.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="">Meeting Name</label>
                <input type="text" class="form-control" name="meeting_name">
                @error('meeting_name')
                <span style="color:red">
                    {{$message}}
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Meeting Password</label>
                <input type="password" class="form-control" name="meeting_password">
                @error('meeting_password')
                <span style="color:red">
                    {{$message}}
                </span>
                @enderror
            </div>
            
            <button class="btn btn-primary btn-sm">Create Meeting</button>
        </form>
    </div>
</div>
@endsection