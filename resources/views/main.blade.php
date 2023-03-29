@extends('home')

@section('main')
    @auth
        <div class="p-3 text-center"><a href="{{ route('users.todos.create', ['user' => Auth::id()]) }}">{{ __('Add todo') }}</a></div>
    @else
        <div class="p-3 text-center">{{ __('Login to add todo') }}</div>
    @endauth
    @foreach ($todos as $todo)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><a href="{{ route('users.todos.edit', ['user' => $todo->user_id, 'todo' => $todo->id]) }}">{{ $todo->title }}</a></h5>
                <p class="card-text">{{ $todo->description }}</p>
            </div>
        </div>
    @endforeach
@endsection
