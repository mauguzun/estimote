@extends ('admin.base_layout')

@section('title')
    Stands
@endsection

@section('toolbar')
    <div class="sort-wrapper">
        <a href="{{ url('/admin/aprons/create') }}" class="btn btn-primary toolbar-item">New</a>
    </div>
@endsection


@section('content')
    @include('admin.includes._form_response_messages')
    <table class="table">
        <thead>
        <tr>
            <th>Ttile</th>


        </tr>
        </thead>
        <tbody>
        @foreach($stands  as $stand)
            <tr class="odd gradeX">
                <td>{{ $stand->getTitle() }}</td>

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
                        @can('access-content', 'aprons.edit')
                            <a class="dropdown-item"
                               href="{{ url('admin/aprons/'.$stand->getId().'/edit')}}">
                                <i class="mdi mdi-pencil-circle"></i> Edit
                            </a>
                        @endcan
                        @can('access-content', 'aprons.delete')
                            {{Form::open(['url'=>['admin/aprons', $stand->getId()], 'method'=>'delete'])}}
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