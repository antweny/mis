<div class="form-group row ">
    <div class="col-md-3">
        pic
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-4">
                <x-form.label name="Employee No <span class='star'>*</span>" />
                <x-form.input id="employee_no" for="employee_no" req="required" :model="$employee"  />
            </div>
            <div class="col-md-8">
                <x-form.label name="Full Name: <span class='star'>*</span>" />
                <x-form.input name="name" id="name" for="name" req="required" :model="$employee"  />
            </div>
        </div>
        <x-form.label name="" />
        <x-dropdown.job-type :model="$employee" req="required" />
    </div>
</div>

<div class="row mt-2">
    <div class="col-md-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="wi-tab" data-toggle="tab" href="#wi" role="tab" aria-controls="wi" aria-selected="true">Work information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pi-tab" data-toggle="tab" href="#pi" role="tab" aria-controls="pi" aria-selected="false">Personal Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="hrs-tab" data-toggle="tab" href="#hrs" role="tab" aria-controls="hrs" aria-selected="false">HR Settings</a>
            </li>
        </ul>

        <div class="tab-content pt-2" id="myTabContent" style="min-height: 350px;">
            <div class="tab-pane fade show active" id="wi" role="tabpanel" aria-labelledby="wi-tab">
                <div class="form-group row">
                    <div class="col-md-6">
                        <x-form.label name="Location: <span class='star'>*</span>" />
                        <x-dropdown.location req="required" :model="$employee"/>
                    </div>
                    <div class="col-md-6">
                        <x-form.label name="Email: <span class='star'>*</span>" />
                        <x-form.input type="email" name="email" id="email" req="required" for="email" :model="$employee"  />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <x-form.label name="Mobile <span class='star'>*</span>" />
                        <x-form.input name="mobile" id="mobile" for="mobile" req="required" :model="$employee"  />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <x-form.label name="Department <span class='star'>*</span>" />
                        <x-dropdown.department req="required" :model="$employee"/>
                    </div>
                    <div class="col-md-6">
                        <x-form.label name="Designation <span class='star'>*</span>" />
                        <x-dropdown.designation req="required" :model="$employee"/>
                    </div>
                </div>

            </div>

            <!-- Personal Information Form Fields-->
            <div class="tab-pane fade" id="pi" role="tabpanel" aria-labelledby="pi-tab">
                <div class="form-group row">
                    <div class="col-md-6">
                        <x-form.label name="Sex <span class='star'>*</span>" for="sex" />
                        <select class="form-control @error('sex') is-invalid @enderror single-select" name="sex" required>
                            <option value="">--</option>
                            <option value="Male" {{old('sex',$employee->sex) == 'Male' ? 'selected' : ''}}>Male</option>
                            <option value="Female" {{old('sex',$employee->sex) == 'Female' ? 'selected' : ''}}>Female</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <x-form.label name="Date of Birth <span class='star'>*</span>" />
                        <x-form.input label="" type="date" name="dob" id="dob" for="dob" :model="$employee" req="required"/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <x-form.label name="Marital Status" for="marital_status" />
                        <select class="form-control @error('marital_status') is-invalid @enderror single-select" name="marital_status">
                            <option value="">--</option>
                            <option value="Male" {{old('marital_status',$employee->marital_status) == 'Male' ? 'selected' : ''}}>Male</option>
                            <option value="Female" {{old('marital_status',$employee->marital_status) == 'Female' ? 'selected' : ''}}>Female</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <x-form.label name="Children" />
                        <x-form.input name="children" id="children" for="children" :model="$employee" />
                    </div>
                </div>
            </div>

            <!-- HR Settings -->
            <div class="tab-pane fade" id="hrs" role="tabpanel" aria-labelledby="hrs-tab">
                <div class="form-group row">
                    <div class="col-md-6">
                        <x-form.label name="Related User " />
                        <x-dropdown.user :model="$employee" />
                    </div>
                    <div class="col-md-6">
                        <x-form.label name="Active: <span class='star'>*</span>" for="active" />
                        <select class="form-control @error('active') is-invalid @enderror single-select" name="active" required>
                            <option value="1" {{old('active',$employee->active) == '1' ? 'selected' : ''}}>Yes</option>
                            <option value="0" {{old('active',$employee->active) == '0' ? 'selected' : ''}}>No</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="form-group row">
    <div class="col">
        <div class="float-left">
            <x-button.back />
        </div>
        <div class="float-right">
            <x-button.submit label="{{$buttonText}}"/>
        </div>
    </div>
</div>

