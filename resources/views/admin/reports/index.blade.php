@extends ('admin.base_layout')

@section('title')
    Reports
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
                <td><?= date('d-m-Y h:i', strtotime($item['start'])) ?> </td>
                <td><?= $item['lat']?></td>
                <td><?= $item['lng']?></td>
                <td>
                    <? if($item['name'] ):?>
                    <a target="_blank" href="{{ url('admin/stands/'.$item['id'].'/edit' ) }}"><?= $item['name']?></a>
                    <? endif; ?>
                </td>
                <td> in progrress </td>
                <td><?=
                  ( strtotime($item['stop'])- strtotime($item['start'])) / 60   ?>
                     min
                </td>


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