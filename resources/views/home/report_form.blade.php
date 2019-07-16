
    <div class="col-12 stretch-card" id="report_form">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Report form</h4>
            <form class="forms-sample">
                <div class="alert alert-danger" role="alert" id="login_error">
                    Error:
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label" >Date</label>
                    <div class="col-sm-9">
                        <input type="text"  name="timepicker" class="form-control"  id="datepicker" placeholder="Date" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">ETA</label>
                    <div class="col-sm-9">
                        <input type="text"  name="timepicker" class="form-control timepicker" id="ETA" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">TAIL</label>
                    <div class="col-sm-9">
                        <select class="form-control" required>
                            <option>Aircraft option 1</option>
                            <option>Aircraft option 2</option>
                            <option>Aircraft option 3</option>
                            <option>Aircraft option 4</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Stand</label>
                    <div class="col-sm-9">
                        <select class="form-control" required>
                            <option>Stand option 1</option>
                            <option>Stand option 2</option>
                            <option>Stand option 3</option>
                            <option>Stand option 4</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                        <select class="form-control" required>
                            <option>Status option 1</option>
                            <option>Status option 2</option>
                            <option>Status option 3</option>
                            <option>Status option 4</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Comment</label>
                    <div class="col-sm-9">
                        <textarea class="form-group" rows="3" id="comment" required></textarea>
                    </div>
                </div>                <a type="" class="btn btn-success mr-2" id="report_form_submit" style="color:white !important;">Submit</a>
            </form>
        </div>
    </div>
</div>
