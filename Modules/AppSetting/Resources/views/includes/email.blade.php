<div class="card-header">
    <div class="row form-md-line-input">
        <label class="col-md-3 form-control-label">Email</label>
    </div>
</div>
<div class="card-body">
    <div class="form-group row form-md-line-input form-md-floating-label">
        <label class="col-md-3" for="mail_driver">Mail Driver</label>
        <input type="text" value="{{ config('appsetting.email.mail_driver') }}" id="mail_driver" name="mail_driver" class="form-control col-md-9">
    </div>

    <div class="form-group row form-md-line-input form-md-floating-label">
        <label class="col-md-3" for="mail_host">Mail Host</label>
        <input type="text" value="{{ config('appsetting.email.mail_host') }}" id="mail_host" name="mail_host" class="form-control col-md-9">
    </div>

    <div class="form-group row form-md-line-input form-md-floating-label">
        <label class="col-md-3" for="mail_port">Mail Port</label>
        <input type="text" value="{{ config('appsetting.email.mail_port') }}" id="mail_port" name="mail_port" class="form-control col-md-9">
    </div>

    <div class="form-group row form-md-line-input form-md-floating-label">
        <label class="col-md-3" for="mail_host">Mail UserName</label>
        <input type="text" value="{{ config('appsetting.email.mail_username') }}" id="mail_username" name="mail_username" class="form-control col-md-9">
    </div>

    <div class="form-group row form-md-line-input form-md-floating-label">
        <label class="col-md-3" for="mail_host">Mail Password</label>
        <input type="text" value="{{ config('appsetting.email.mail_password') }}" id="mail_password" name="mail_password" class="form-control col-md-9">
    </div>

    <div class="form-group row form-md-line-input form-md-floating-label">
        <label class="col-md-3" for="mail_encryption">Mail Encryption</label>
        <input type="text" value="{{ config('appsetting.email.mail_encryption') }}" id="mail_encryption" name="mail_encryption" class="form-control col-md-9">
    </div>
    
</div>