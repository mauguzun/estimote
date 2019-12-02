@extends('admin.base_layout')

@section('title')
    Report
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Report form</h4>

            {{ Form::open([
               'url'	=>'admin/reports/show',
               'method'	=>  	'get',
               'class'=>"forms-sample"
           ])
       }}
            @include('admin.includes._form_errors')
            @include('admin.includes._form_response_messages')


            <div class="form-group">

                {{ Form::label('start', 'start') }}
                {{ Form::text('start',  '2018-12-01', ["class" => "form-control"]) }}

            </div>
            <div class="form-group">
                {{ Form::label('stop', 'stop') }}
                {{ Form::text('stop',  '2022-12-02', ["class" => "form-control"]) }}

            </div>

            <div class="form-group row">
                <label for="exampleInputPassword2"
                       class="col-sm-3 col-form-label">   {{ Form::label('ts', 'Beacon') }}</label>
                <div class="col-sm-9">
                    {{ Form::select('ts',$ts ,'',
                            ['class' => 'form-control selectpicker' ,
                            'required'=>'required']
                        )
                    }}</div>
            </div>



            <div class="form-group">
                <a href="{{ url('admin/reports') }}" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection




