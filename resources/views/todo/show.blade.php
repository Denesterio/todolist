@extends('home')

@section('main')
    <div class="d-flex" id="form-container">
        <div class="col-11" id="title-container">
            <h5>{{ $todo->title }}</h5>
        </div>
    </div>
    <div class="d-flex">
        <div class="col-11" id="description-container">
            <p>{{ $todo->description }}</p>
        </div>
    </div>

    <ul class="list-group list-group-flush mt-4" id="todo-items-list">
        @foreach ($todo->items as $item)
            <li class="list-group-item d-flex">
                <div class="col-3"></div>
                <div class="col-9" data-id="{{ $item->id }}">{{ $item->description }}</div>
            </li>
        @endforeach
    </ul>
@endsection
