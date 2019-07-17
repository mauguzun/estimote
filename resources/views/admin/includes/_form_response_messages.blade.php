@if(Session::has('success'))
    <div class="alert alert-success alert-dismissable form-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ Session::get('success') }}
    </div>
@endif