<div class="card-header">
    <div class="row form-md-line-input">
        <label class="col-md-3 form-control-label">Covid Cases (Mandalay)</label>
    </div>
</div>
<div class="card-body">
    <div class="form-group row form-md-line-input form-md-floating-label">
        <label class="col-md-3" for="total_cases">Total Cases<span class="text-danger">*</span></label>
        <input type="text" value="{{ config('appsetting.covid.total_cases') }}" id="total_cases" name="total_cases" class="form-control col-md-9">
    </div>

    <div class="form-group row form-md-line-input form-md-floating-label">
        <label class="col-md-3" for="new_cases">New Cases<span class="text-danger">*</span></label>
        <input type="text" value="{{ config('appsetting.covid.new_cases') }}" id="new_cases" name="new_cases" class="form-control col-md-9">
    </div>

    <div class="form-group row form-md-line-input form-md-floating-label">
        <label class="col-md-3" for="total_deaths">Total Deaths<span class="text-danger">*</span></label>
        <input type="text" value="{{ config('appsetting.covid.total_deaths') }}" id="total_deaths" name="total_deaths" class="form-control col-md-9">
    </div>

    <div class="form-group row form-md-line-input form-md-floating-label">
        <label class="col-md-3" for="new_deaths">New Deaths<span class="text-danger">*</span></label>
        <input type="text" value="{{ config('appsetting.covid.new_deaths') }}" id="new_deaths" name="new_deaths" class="form-control col-md-9">
    </div>

    <div class="form-group row form-md-line-input form-md-floating-label">
        <label class="col-md-3" for="total_recovered">Total Recovered<span class="text-danger">*</span></label>
        <input type="text" value="{{ config('appsetting.covid.total_recovered') }}" id="total_recovered" name="total_recovered" class="form-control col-md-9">
    </div>
    
</div>