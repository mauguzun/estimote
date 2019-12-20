@extends ('admin.base_layout')

@section('title')
    Aircraft
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
            <th>Date</th>
            <th>Aircraft</th>
            <th>Stand <small>Only debug</small> </th>
            <th>Device</th>
        </tr>
        </thead>
        <tbody>
        @foreach($aircrafts  as $stand)
            <tr class="odd gradeX">

                <td><?= $stand->getAdded()->format('Y-m-d H:i') ?></td>
                <td><?= $stand->getAircraft() ?></td>
                <td><?= $stand->getStand()->getName() ?></td>
                <td><a href="#"><?= $stand->getDevice()->getId()?></a></td>



            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script>

    </script>
@endsection