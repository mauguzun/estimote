@extends ('admin.base_layout')

@section('title')
    Beacon Devices
@endsection

@section('toolbar')
    <div class="sort-wrapper">
        @if($in_use )

            {{Form::open(['url'=>['admin/userdevice', $in_use->getId()], 'method'=>'delete'])}}
            <button class="btn btn-danger toolbar-item">

                Drop <?= $in_use->getDevice()->getId() ?></button>
            {{Form::close()}}

        @else
            <a href="{{ url('/admin/userdevice/create') }}" class="btn btn-primary toolbar-item">Pick device</a>
        @endif
    </div>
@endsection


@section('content')
    @include('admin.includes._form_response_messages')
    <table class="table">
        <thead>
        <tr>
            <th>Device Id</th>

            <th>Start</th>
            <th>Stop</th>

        </tr>
        </thead>
        <tbody>
        @foreach($stands  as $stand)
            <tr class="odd gradeX">
                <td><a href="#"><?= $stand->getDevice()->getId()?></a></td>
                <td><?= $stand->getStart()->format('Y-m-d H:i') ?></td>
                <td><?= $stand->getStop() ? $stand->getStop()->format('Y-m-d H:i') : null ?></td>


            </tr>
        @endforeach
        </tbody>
    </table>


@endsection

@section('scripts')
    <script>

    </script>
@endsection