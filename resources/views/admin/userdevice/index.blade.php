@extends ('admin.base_layout')

@section('title')
    Beacon Devices
@endsection

@section('toolbar')
    <div class="sort-wrapper">
        <a href="{{ url('/admin/userdevice/create') }}" class="btn btn-primary toolbar-item">New</a>
    </div>
@endsection


@section('content')
    @include('admin.includes._form_response_messages')
    <table class="table">
        <thead>
        <tr>
            <th>Device Id</th>

            <th>From</th>
            <th>Till</th>

        </tr>
        </thead>
        <tbody>
        @foreach($stands  as $stand)
            <tr class="odd gradeX">
                <td>{{ $stand->getDevice() }}</td>

                <td>{{ $stand->getStart() }}</td>
                <td>{{ $stand->getStop() }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script>

    </script>
@endsection