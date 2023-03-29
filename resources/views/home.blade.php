@extends('layouts.app')

@section('content')
    <div class="container h-100 my-4 overflow-hidden rounded shadow">
        <div class="row h-100">
            <aside class="col-md-4 col-lg-3 col-xl-2 px-0">
                <ul class="list-group">
                    <li @class(['list-group-item', 'text-center', 'bg-info' => Route::is('home')])>
                        <a class="nav-link" href="{{ route('home') }}">{{ __('Public todos') }}</a>
                    </li>
                    @auth
                        <li @class(['list-group-item', 'text-center', 'bg-info' => Route::is('users.todos.index')])>
                            <a class="nav-link" href="{{ route('users.todos.index', ['user' => Auth::id()]) }}">{{ __('My todos') }}</a>
                        </li>
                        <li @class(['list-group-item', 'text-center', 'bg-info' => Route::is('users.todos.friends')])>
                            <a class="nav-link" href="{{ route('users.todos.friends', ['user' => Auth::id()]) }}">{{ __('Friends todos') }}</a>
                        </li>
                    @endauth
                </ul>
            </aside>
            <div class="col-md-8 col-lg-9 col-xl-10 p-3">
                @yield('main')
            </div>
        </div>
    </div>
@endsection
