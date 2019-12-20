@extends('admin.base_layout')

@section('title')
    Add aircraft
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('admin.includes._form_errors')
            @include('admin.includes._form_response_messages')
            {{ Form::open([
                    'url'	=> 'admin/aircrafts',
                    'method'	=>  	'post'
                ])
            }}
            <div class="form-group">
                {{ Form::label('aircraft', 'Aircraft') }}
                {{ Form::text('aircraft','', ["class" => "form-control"]) }}
            </div>

            <p>Only on debug,in real life driver can`t choose time </p>

            <div class="form-group">
                {{ Form::label('added', 'Added') }}
                {{ Form::text('added',date("Y-m-d H:i:s"), ["class" => "form-control"]) }}
            </div>
            <div class="form-group row">
                <label for="exampleInputPassword2"
                       class="col-sm-3 col-form-label">   {{ Form::label('apron', 'Apron') }}</label>
                <div class="col-sm-9">
                    {{ Form::select('stand',$stands,
                             '',
                            ['class' => 'form-control selectpicker' ,
                            'required'=>'required']
                        )
                    }}</div>
            </div>



            <div class="form-group">
                <a href="{{ url('admin/aircrafts') }}" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

