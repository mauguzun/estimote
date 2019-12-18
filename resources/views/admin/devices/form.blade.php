@extends('admin.base_layout')

@section('title')
    {{ $stand ? "Manage device" : "New device" }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('admin.includes._form_errors')
            @include('admin.includes._form_response_messages')
            {{ Form::open([
                    'url'	=> $stand ? 	['admin/devices',$stand->getId()]:['admin/devices'],
                    'method'	=>  	$stand ? 'put' : 'post',
                ])
            }}

            @if (!$stand)
            <div class="form-group">
                {{ Form::label('device_identifier', 'Device identifier') }}
                {{ Form::text('device_identifier', $stand ? $stand->getId() : '', ["class" => "form-control"]) }}
            </div>
            @endif
            <div class="form-group">
                {{ Form::label('api_id', 'Api') }}
                {{ Form::text('api_id', $stand ? $stand->getApiId() : '', ["class" => "form-control"]) }}
            </div>
            <div class="form-group">
                {{ Form::label('description', 'Description') }}
                {{ Form::text('description', $stand ? $stand->getDescription() : '', ["class" => "form-control"]) }}
            </div>




            <div class="form-group">
                <a href="{{ url('admin/stands') }}" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

