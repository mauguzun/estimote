@extends('admin.base_layout')

@section('title')
    Pick up Device
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('admin.includes._form_errors')
            @include('admin.includes._form_response_messages')
            {{ Form::open([
                    'url'	=> ['admin/userdevice'],
                    'method'	=>  	$stand ? 'put' : 'post',
                ])
            }}


            <div class="form-group row">
                <label for="exampleInputPassword2"
                       class="col-sm-3 col-form-label">   {{ Form::label('apron', 'Device') }}</label>
                <div class="col-sm-9">
                    {{ Form::select('device_identifier',$devices ,  '',
                            ['class' => 'form-control selectpicker' ,
                            'required'=>'required']
                        )
                    }}</div>
            </div>

            <div class="form-group">
                <a href="{{ url('admin/userdevice') }}" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

