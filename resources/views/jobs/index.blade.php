@extends('layouts.app')

@section('content')
<ul class="list-group">
@foreach ($jobs as $job)
<a href="{{ route('jobs.show', ['job' => $job->id]) }}">
    <li class="list-group-item clearfix">
        <p class="float-left">{{ $job->title }}<p>
        <span class="float-right">{{ explode(' ', $job->created_at)[0] }}</span>
    </li>
    </a>
@endforeach
</ul>
@endsection
