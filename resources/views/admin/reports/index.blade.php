@extends ('admin.base_layout')

@section('title')
    Raports
@endsection

@section('toolbar')

@endsection


@section('content')
    @include('admin.includes._form_response_messages')
    <table class="table">
        <thead>
        <tr>
            <th>Time</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Gate</th>
            <th>Aircraft</th>
            <th>Lead time at gate</th>

        </tr>
        </thead>
        <tbody>
        @foreach($items  as $item)
            <tr class="odd gradeX">
                <td><?= date('d-m-Y h:i', strtotime( $item['start'])) ?> </td>
                <td><?= $item['lat']?></td>
                <td><?= $item['lng']?></td>
                <td> in progr </td>
                <td> in progr</td>
                <td><?= date_diff(date_create($item['stop']),date_create($item['start']) )->format('%i') ?></td>



            </tr>
        @endforeach
        </tbody>
    </table>


    <br>
    <br>

    @include('admin.reports.map')
@endsection



@section('scripts')
    <script>

    </script>
@endsection