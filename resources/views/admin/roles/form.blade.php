@extends ('admin.base_layout')

@section('title')
    {{ $role ? "Update Role" : "New Role" }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('admin.includes._form_errors')
            @include('admin.includes._form_response_messages')
            {{ Form::open([
                'method' => 'post',
                'route' => ['admin::role.post', 'roleId' => $role ? $role->getId() : null ]
                ])
            }}
            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', $role ? $role->getName() : '', ["class" => "form-control"]) }}
            </div>
            <div class="form-group">
                {{ Form::label('description', 'Description') }}
                {{ Form::text('description', $role ? $role->getDescription() : '', ["class" => "form-control"]) }}
            </div>

            <div class="form-group">
                <a href="{{ url(route('admin::role.index')) }}" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection