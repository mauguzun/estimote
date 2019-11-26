@foreach(['success','danger'] as $value)
    @if(Session::has($value))
        <div class="alert alert-{{$value}} alert-dismissable form-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get($value) }}
        </div>
    @endif
@endforeach