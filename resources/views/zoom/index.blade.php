@extends('layouts.app')

@section('content')
@if (Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif
<div class="card">
    <div class="card-header">
        All Zoom Meetings
    </div>
    <div class="card-body">
        <ul class="list-group">
            @if ($meetings->count() > 0)
            @foreach ($meetings as $meeting)
                <li class="list-group-item">
                    <div>
                        Meeting Name: <strong>{{$meeting->meeting_name}}</strong>
                    </div>
                    <div>
                        Meeting Password: <strong>{{$meeting->meeting_password}}</strong>
                    </div>
                    @if (!$meeting->is_active && !$meeting->finished)
                        <div>
                            <a href="{{ route('meeting.start', $meeting->meeting_id)}}"><strong>Click To Start Meeting</strong></a> 
                        </div>
                    @elseif ($meeting->is_active && !$meeting->finished)
                        Meeting Status: <img src="{{ asset('live-streaming.png') }}" style="color:red" width="40px" height="40px" alt="">
                        <div>
                            <a href="{{ route('meeting.join', $meeting->meeting_id) }}"><strong>Click To Join Meeting</strong></a> 
                        </div>
                    @endif

                    @if ($meeting->user_id == auth()->user()->id)
                        <form action="{{ route('meeting.destroy', $meeting->meeting_id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">Delete Meeting</button>
                        </form>
                    @endif
                </li>
            @endforeach 
            @else
            <h3 style="color:red;text-align:center">No Meetings Created Yet!</h3> 
            @endif  
        </ul>        
    </div>
</div>
@endsection