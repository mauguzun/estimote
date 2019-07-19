@extends('admin.base_layout')

@section('title')
    {{ $user ? "Manage User" : "New User" }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('admin.includes._form_errors')
            @include('admin.includes._form_response_messages')
            {{ Form::open([
                'method' => 'post',
                'route' => ['admin::user.post', 'userId' => $user ? $user->getId() : null ]
                ])
            }}
            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                @if($user)
                    <p class="form-control-static">{{ $user->getEmail() }}</p>
                @else
                    {{ Form::text('email', $user ? $user->getEmail() : '', ["class" => "form-control"]) }}
                @endif
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', $user ? $user->getName() : '', ["class" => "form-control"]) }}
            </div>
            <div class="form-group">
                {{ Form::label('lastname', 'Lastname') }}
                {{ Form::text('lastname', $user ? $user->getLastname() : '', ["class" => "form-control"]) }}
            </div>
            <div class="form-group">
                {{ Form::label('role', 'Role') }}
                {{ Form::select('role', $roles,
                        $user && $user->getRole() ? $user->getRole()->getId() : '',
                        ['class' => 'form-control selectpicker']
                    )
                }}
            </div>

            <div class="form-group">
                <a href="{{ url(route('admin::user.index')) }}" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

