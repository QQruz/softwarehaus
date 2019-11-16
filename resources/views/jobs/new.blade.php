@extends('layouts.app')

@section('content')
<form method="POST" action="">
@csrf

<div class="form-group">
    <label for="title">Title</label>

    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required pattern=".{5,30}">

    @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="email">Email</label>

    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required">

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="description">Description</label>

    <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description"
        value="{{ old('description') }}" required pattern=".{10,255}"></textarea>

    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
@endsection
