@extends('admin.base_layout')

@section('title')
    {{ $stand ? "Manage apron" : "New apron" }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('admin.includes._form_errors')
            @include('admin.includes._form_response_messages')
            {{ Form::open([
                    'url'	=> $stand ? 	['admin/aprons',$stand->getId()]:['admin/aprons'],
                    'method'	=>  	$stand ? 'put' : 'post',
                ])
            }}

            <div class="form-group">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', $stand ? $stand->getName() : '', ["class" => "form-control"]) }}
            </div>



            <div class="form-group">
                <a href="{{ url('admin/aprons') }}" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

