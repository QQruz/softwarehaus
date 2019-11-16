@extends('layouts.app')

@section('content')
<h4>{{ $job->title }}</h4>
<p>{{ $job->description }}</p>
<hr>
<p><strong>Contact: </strong><a href="mailto:{{ $job->email }}">{{ $job->email }}</a></p>
@endsection
