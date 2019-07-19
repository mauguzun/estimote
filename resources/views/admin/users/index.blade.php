@extends ('admin.base_layout')

@section('title')
    Users
@endsection

@section('toolbar')
    <div class="sort-wrapper">
        <a href="{{ url(route('admin::user.showForm')) }}" class="btn btn-primary toolbar-item">New</a>
    </div>
@endsection


@section('content')
    @include('admin.includes._form_response_messages')
    <table class="table">
        <thead>
        <tr>
            <th>Full name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr class="odd gradeX">
                <td>{{ $user->getFullName() }}</td>
                <td>{{ $user->getEmail() }}</td>
                <td>
                    @if ($user->getRole() != null)
                        {{ $user->getRole()->getName() }} {{ $user->getRole()->getDescription() }}
                    @else
                        Role is not assigned to this user yet
                    @endif
                </td>
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
                        @can('access-content', 'user.edit')
                            <a class="dropdown-item"
                               href="{{ url(route("admin::role.showForm", ['userId' => $user->getId()])) }}">
                                <i class="mdi mdi-pencil-circle"></i> Edit
                            </a>
                        @endcan
                        @can('access-content', 'user.user.passwordReset')
                            <a class="dropdown-item"
                               href="{{ url(route("admin::user.resetPassword", ['userId' => $user->getId()])) }}">
                                <i class="mdi mdi-key"></i> Reset Password
                            </a>
                        @endcan
                        @can('access-content', 'user.delete')
                            <a class="dropdown-item"
                               href="{{url(route('admin::user.delete', ['userId' => $user->getId()]))}}">
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