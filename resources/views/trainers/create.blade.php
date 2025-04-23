@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Trainer</h1>

    <form action="{{ route('trainers.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea class="form-control" name="bio"></textarea>
        </div>

        <button type="submit" class="btn btn-success mt-3">Save</button>
    </form>
</div>
@endsection
