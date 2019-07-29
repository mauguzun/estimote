@extends('admin.base_layout')

@section('title')
    {{ $aircraft ? "Manage aircraft" : "New aircraft" }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('admin.includes._form_errors')
            @include('admin.includes._form_response_messages')
            {{ Form::open([
                    'route'	=> $aircraft ? 	['admin::aircrafts.update',$aircraft->getId()]:['admin::aircrafts.store'],
                    'method'	=>  	$aircraft ? 'put' : 'post',
                ])
            }}

            <div class="form-group">
                {{ Form::label('acReg', 'Ac Reg') }}
                {{ Form::text('acReg', $aircraft ? $aircraft->getAcReg() : '', ["class" => "form-control"]) }}
            </div>


            <div class="form-group">
                <a href="{{ url(route('admin::aircrafts')) }}" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

