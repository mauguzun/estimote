@extends ('admin.base_layout')

@section('title')
    Reports
@endsection

@section('toolbar')
    <div class="sort-wrapper">
        <a href="{{ url(route('admin::role.showForm')) }}" class="btn btn-primary toolbar-item">New</a>
    </div>
@endsection


@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr class="odd gradeX">
                <td>{{ $role->getName() }}</td>
                <td>{{ $role->getDescription() }}</td>
                <td width="25%">
                    <button class="btn btn-warning icon-btn dropdown-toggle"
                            type="button" id="dropdownMenuIconButton1"
                            data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                    </button>
                    <div class="dropdown-menu"
                         aria-labelledby="dropdownMenuIconButton1"
                         x-placement="bottom-start"
                         style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                        @can('access-content', 'role.edit')
                            <a class="dropdown-item"
                               href="{{ url(route("admin::role.showForm", ['roleId' => $role->getId()])) }}">
                                <i class="mdi mdi-pencil-circle"></i> Edit
                            </a>
                        @endcan
                        @can('access-content', 'role.permission.edit')
                            <a class="dropdown-item"
                               href="{{url(route('admin::role.edit.permissions', ['roleId' => $role->getId()]))}}">
                                <i class="mdi mdi-pencil-circle"></i> Edit Permissions
                            </a>
                        @endcan
                        @can('access-content', 'role.delete')
                            <a class="dropdown-item"
                               href="{{url(route('admin::role.delete', ['roleId' => $role->getId()]))}}">
                                <i class="mdi mdi-trash-can"></i> Delete
                            </a>
                        @endcan
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection