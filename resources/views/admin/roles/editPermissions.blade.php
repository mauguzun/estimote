@extends ('admin.base_layout')

@section('title')
    {{ $role ? "Update Role" : "New Role" }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ $role->getName() }} Permissions</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @include('admin.includes._form_errors')
            @include('admin.includes._form_response_messages')
            {{ Form::open([
                'method' => 'post',
                'route' => ['admin::role.post.permissions', 'roleId' => $role ? $role->getId() : null ]
                ])
            }}
            <table width="100%" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Permission</th>
                    <th>Enabled</th>
                </tr>
                </thead>
                <tbody>
                @foreach($availablePermissions as $permission)
                    <tr>
                        <td>{{ $permission }}</td>
                        <td class="text-center" width="10%">
                            {{ Form::checkbox($permission, 1, $role->hasPermission($permission)) }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="form-group" style="margin-top: 20px;">
                <a href="{{ url(route('admin::role.index')) }}" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection