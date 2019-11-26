@extends ('admin.base_layout')

@section('title')
    Aircrafts
@endsection

@section('toolbar')
    <div class="sort-wrapper">
        <a href="{{ url('/admin/aircrafts/create') }}" class="btn btn-primary toolbar-item">New</a>
    </div>
@endsection


@section('content')
    @include('admin.includes._form_response_messages')
    <table class="table">
        <thead>
        <tr>
            <th>Ac Reg</th>
            <th>Manage</th>

        </tr>
        </thead>
        <tbody>
        @foreach($aircrafts as $aircraft)
            <tr class="odd gradeX">
                <td>{{ $aircraft->getAcReg() }}</td>
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


                        @can('access-content', 'aircraft.edit')
                            <a class="dropdown-item"
                               href="{{ url('admin/aircrafts/'.$aircraft->getId().'/edit')}}">
                                <i class="mdi mdi-pencil-circle"></i> Edit
                            </a>
                        @endcan

                        @can('access-content', 'aircraft.delete')
                            {{Form::open(['url'=>['admin/aircrafts', $aircraft->getId()], 'method'=>'delete'])}}
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