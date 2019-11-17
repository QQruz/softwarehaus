@extends('layouts.app')

@section('content')
<ul class="list-group">
@forelse ($users as $user)
@php $job = $user->jobs[0]; @endphp
    <li class="list-group-item clearfix">
        <div class="row">
            <div class="col-xs-12 col-md-10">
                <a href="{{ route('jobs.show', ['job' => $job->id]) }}">
                <h4>{{ $job->title }}</h4>
                <h6><b>By: </b><i>{{ $user->name }}</i></h6>
                <small><b>Posted at: </b><i>{{ explode(' ', $job->created_at)[0] }}</i></small>
                </a>
            </div>

            <div class="col-xs-12 col-md-2 mt-4">
                <form action="{{ route('users.approve', ['user' => $user->id]) }}" method="POST" class="float-left mr-1">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success">Approve</button>
                </form>

                <form action="{{ route('users.delete', ['user' => $user->id]) }}" method="POST" class="float-left">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn
                    {{ Route::currentRouteName() === 'users.listTrashed' ? 'btn-danger' : 'btn-warning' }}">
                    {{ Route::currentRouteName() === 'users.listTrashed' ? 'Delete' : 'Spam'}}</button>
                </form>
            </div>
        </div>
    </li>

@empty
    <h3 class="text-center"><i>
    {{ Route::currentRouteName() === 'users.listTrashed' ? 'Spam is empty': 'No new users to approve' }}
    </i></h3>
@endforelse
</ul>
@endsection
