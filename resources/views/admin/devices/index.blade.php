@extends ('admin.base_layout')

@section('title')
    Beacon Devices
@endsection

@section('toolbar')
    <div class="sort-wrapper">
        <a href="{{ url('/admin/devices/create') }}" class="btn btn-primary toolbar-item">New</a>
    </div>
@endsection


@section('content')
    @include('admin.includes._form_response_messages')
    <table class="table">
        <thead>
        <tr>
            <th>Device Id</th>

            <th>Api Id</th>
            <th>Description </th>
            <th> 123</th>
        </tr>
        </thead>
        <tbody>
        @foreach($stands  as $stand)
            <tr class="odd gradeX">
                <td>{{ $stand->getId() }}</td>

                <td>{{ $stand->getApiId() }}</td>
                <td>{{ $stand->getDescription() }}</td>
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
                        @can('access-content', 'devices.edit')
                            <a class="dropdown-item"
                               href="{{ url('admin/devices/'.$stand->getId().'/edit')}}">
                                <i class="mdi mdi-pencil-circle"></i> Edit
                            </a>
                        @endcan
                        @can('access-content', 'devices.delete')
                            {{Form::open(['url'=>['admin/devices', $stand->getId()], 'method'=>'delete'])}}
                            <button class="dropdown-item delete_item"><i class="mdi mdi-trash-can"></i> Delete</button>
                            {{Form::close()}}
                        @endcan


                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script>

    </script>
@endsection