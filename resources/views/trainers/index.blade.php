@extends('layouts.app')




@section('content')


<div class="container">
    <h1>Trainers</h1>
    <a href="{{ route('trainers.create') }}" class="btn btn-primary">Add Trainer</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Bio</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trainers as $trainer)
                <tr>
                    <td>{{ $trainer->name }}</td>
                    <td>{{ $trainer->email }}</td>
                    <td>{{ $trainer->bio }}</td>
                    <td>
                        <a href="{{ route('trainers.edit', $trainer->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('trainers.destroy', $trainer->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
