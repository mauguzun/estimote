@extends ('admin.base_layout')

@section('title')
    Stands
@endsection

@section('toolbar')
    <div class="sort-wrapper">
        <a href="{{ url('/admin/stands/create') }}" class="btn btn-primary toolbar-item">New</a>
    </div>
@endsection


@section('content')
    @include('admin.includes._form_response_messages')
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Longitude</th>
            <th>Latitude</th>

        </tr>
        </thead>
        <tbody>
        @foreach($stands  as $stand)
            <tr class="odd gradeX">
                <td>{{ $stand->getName() }}</td>
                <td>{{ $stand->getLongitude() }}</td>
                <td>{{ $stand->getLatitude() }}</td>
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

                            <a class="dropdown-item"
                               href="{{ url('admin/stands/'.$stand->getId().'/edit')}}">
                                <i class="mdi mdi-pencil-circle"></i> Edit
                            </a>


                        {{Form::open(['url'=>['admin/stands', $stand->getId()], 'method'=>'delete'])}}



                        <button class="dropdown-item delete_item" >  <i class="mdi mdi-trash-can"></i> Delete</button>



                        {{Form::close()}}



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