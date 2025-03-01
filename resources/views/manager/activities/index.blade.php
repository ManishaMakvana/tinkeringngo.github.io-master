
@extends('layouts.projectmanager')
@section('content')
<div class="container">
    <h2>Assigned Activities</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Program</th>
                <th>Trainer (Username)</th>
                <th>Activity</th>
                <th>Due Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activities as $activity)
                <tr>
                    <td>{{ $activity->program->title }}</td>
                    <td>{{ $activity->username }}</td>
                    <td>{{ $activity->activity_name }}</td>
                    <td>{{ $activity->due_date }}</td>
                    <td>{{ ucfirst($activity->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
