@extends('admin.base_layout')

@section('title')
    {{ $stand ? "Manage stand" : "New stand" }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('admin.includes._form_errors')
            @include('admin.includes._form_response_messages')
            {{ Form::open([
                    'url'	=> $stand ? 	['admin/stands',$stand->getId()]:['admin/stands'],
                    'method'	=>  	$stand ? 'put' : 'post',
                ])
            }}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', $stand ? $stand->getName() : '', ["class" => "form-control"]) }}
            </div>
            <div class="form-group">
                {{ Form::label('latitude', 'Latitude') }}
                {{ Form::text('latitude', $stand ? $stand->getLatitude() : '', ["class" => "form-control"]) }}
            </div>
            <div class="form-group">
                {{ Form::label('longitude', 'Longitude') }}
                {{ Form::text('longitude', $stand ? $stand->getLongitude() : '', ["class" => "form-control"]) }}
            </div>


            <div class="form-group row">
                <label for="exampleInputPassword2"
                       class="col-sm-3 col-form-label">   {{ Form::label('apron', 'Apron') }}</label>
                <div class="col-sm-9">
                    {{ Form::select('apron',array_merge($aprons,[''=>'']) ,
                            $stand && $stand->getApron() ? $stand->getApron()->getId() : '',
                            ['class' => 'form-control selectpicker' ,
                            'required'=>'required']
                        )
                    }}</div>
            </div>

            <div class="form-group">
                <a href="{{ url('admin/stands') }}" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

