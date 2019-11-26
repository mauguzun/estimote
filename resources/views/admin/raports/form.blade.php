@extends('admin.base_layout')

@section('title')
    {{ $item ? "Manage raport" : "New raport" }}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Report form</h4>

            {{ Form::open([
               'url'	=> $item ? 	['admin/raports',$item->getId()]:['admin/raports'],
               'method'	=>  	$item ? 'put' : 'post',
                'class'=>"forms-sample"
           ])
       }}
            @include('admin.includes._form_errors')
            @include('admin.includes._form_response_messages')

            <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">ETA</label>
                <div class="col-sm-9">
                    <input type="text" name="eta"
                           value=" <?=  $item ? $item->getEta() : date('H:i') ?>"
                           class="form-control timepicker" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="exampleInputPassword2"
                       class="col-sm-3 col-form-label">   {{ Form::label('tail', 'Aircraft') }}</label>
                <div class="col-sm-9">
                    {{ Form::select('tail', $aircrafts,
                            $item && $item->getTail() ? $item->getTail()->getId() : '',
                            [
                                'class' => 'form-control selectpicker' ,
                                'data-live-search'=>'true',
                                'required'=>'required'
                            ]
                        )
                    }}</div>
            </div>

            <div class="form-group row">
                <label for="exampleInputPassword2"
                       class="col-sm-3 col-form-label">   {{ Form::label('status', 'Status') }}</label>
                <div class="col-sm-9">
                    {{ Form::select('status', $statuses,
                            $item && $item->getStatus() ? $item->getStatus()->getId() : '',
                            ['class' => 'form-control selectpicker' ,
                            'required'=>'required']
                        )
                    }}</div>
            </div>

            <div class="form-group row">
                <label for="exampleInputPassword2"
                       class="col-sm-3 col-form-label">   {{ Form::label('stand', 'Stand') }}</label>
                <div class="col-sm-9">
                    {{ Form::select('stand', $stands,
                            $item && $item->getStand() ? $item->getStand()->getId() : '',
                            ['class' => 'form-control selectpicker' ,
                            'required'=>'required']
                        )
                    }}</div>
            </div>


            <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Comment</label>
                <div class="col-sm-9">
                    <textarea class="form-group" rows="3" name="comment"></textarea>
                </div>
            </div>
            <div class="form-group">
                <a href="{{ url('admin/raports') }}" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection




