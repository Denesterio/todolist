@extends('home')

@section('main')
    <form method="POST" action="{{ $action }}">
        @csrf
        <div class="form-group mb-2">
            <label for="todo-title">{{ __('Title') }}</label>
            <input type="text" class="form-control form-control-sm" id="todo-title" name="title" />
            @error('title')
                <small class="text-danger text-small">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-2">
            <label for="todo-description">{{ __('Description') }}</label>
            <textarea class="form-control form-control-sm" id="todo-description" name="description" rows="3"></textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-2">
            <label for="todo-type">{{ __('Visibility') }}</label>
            <select class="form-control form-control-sm" id="todo-type" name="type">
                @foreach ($types as $type)
                    <option value="{{ $type['value'] }}">{{ __($type['label']) }}</option>                    
                @endforeach
            </select>
            @error('type')
                <small class="text-danger text-small">{{ $message }}</small>
            @enderror
        </div>

        <input type="submit" class="btn btn-sm btn-info" id="add-todo" value="{{ __('Save') }}" />
    </form>
@endsection
