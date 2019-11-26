@extends('admin.base_layout')

@section('title')
    {{ $item ? "Manage status" : "New status" }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('admin.includes._form_errors')
            @include('admin.includes._form_response_messages')
            {{ Form::open([
                    'url'	=> $item ? 	['admin/statuses',$item->getId()]:['admin/statuses'],
                    'method'	=>  	$item ? 'put' : 'post',
                ])
            }}

            <div class="form-group">
                {{ Form::label('status', 'Status') }}
                {{ Form::text('status', $item ? $item->getStatus() : '', ["class" => "form-control"]) }}
            </div>
            <div class="form-group">
                {{ Form::label('description', 'Description') }}
                {{ Form::text('description', $item ? $item->getDescription() : '', ["class" => "form-control"]) }}
            </div>


            <div class="form-group">
                <a href="{{ url('admin/statuses') }}" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

