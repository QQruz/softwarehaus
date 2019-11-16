@extends('layouts.app')

@section('content')
<ul class="list-group">
@foreach ($jobs as $job)
<a href="{{ route('jobs.show', ['job' => $job->id]) }}">
    <li class="list-group-item clearfix">
        <h4>{{ $job->title }}</h4>
        <small><b>Posted at: </b><i>{{ explode(' ', $job->created_at)[0] }}</i></small>
    </li>
    </a>
@endforeach
</ul>
@endsection
