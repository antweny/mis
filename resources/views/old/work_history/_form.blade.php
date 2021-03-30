<div class="form-group row ">
    <div class="col-md-3">
        pic
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-4">
                <x-form.elements.input label="Employee No: <span class='star'>*</span>" name="employee_no" id="employee_no" for="employee_no" req="required" :model="$employee"  />
            </div>
            <div class="col-md-8">
                <x-form.elements.input label="Full Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required" :model="$employee"  />
            </div>
        </div>
        <x-dropdown.job-type :model="$employee" />
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
                        <x-dropdown.location label="Location: <span class='star'>*</span>" class="single-select" req="required" :model="$employee" />
                    </div>
                    <div class="col-md-6">
                        <x-form.elements.input type="email" label="Email: <span class='star'>*</span>" name="email" id="email" req="required" for="email" :model="$employee"  />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <x-form.elements.input label="Mobile <span class='star'>*</span>" name="mobile" id="mobile" for="mobile" req="required" :model="$employee"  />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <x-dropdown.department label="Department <span class='star'>*</span>" req="required" :model="$employee" />
                    </div>
                    <div class="col-md-6">
                        <x-dropdown.designation label="Job Post <span class='star'>*</span>"  req="required" :model="$employee" />
                    </div>
                </div>

            </div>

            <!-- Personal Information Form Fields-->
            <div class="tab-pane fade" id="pi" role="tabpanel" aria-labelledby="pi-tab">
                <div class="form-group row">
                    <div class="col-md-6">
                        <x-form.elements.label name="Sex <span class='star'>*</span>" for="sex" />
                        <select class="form-control @error('sex') is-invalid @enderror single-select" name="sex" required>
                            <option value="">--</option>
                            <option value="Male" {{old('sex',$employee->sex) == 'Male' ? 'selected' : ''}}>Male</option>
                            <option value="Female" {{old('sex',$employee->sex) == 'Female' ? 'selected' : ''}}>Female</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <x-form.elements.input label="Date of Birth" type="date" name="dob" id="dob" for="dob" :model="$employee" />
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <x-form.elements.label name="Marital Status" for="smarital_status" />
                        <select class="form-control @error('marital_status') is-invalid @enderror single-select" name="marital_status">
                            <option value="">--</option>
                            <option value="Male" {{old('marital_status',$employee->marital_status) == 'Male' ? 'selected' : ''}}>Male</option>
                            <option value="Female" {{old('marital_status',$employee->marital_status) == 'Female' ? 'selected' : ''}}>Female</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <x-form.elements.input label="Children" name="children" id="children" for="children" :model="$employee" />
                    </div>
                </div>
            </div>

            <!-- HR Settings -->
            <div class="tab-pane fade" id="hrs" role="tabpanel" aria-labelledby="hrs-tab">
                <div class="form-group row">
                    <div class="col-md-6">
                        <x-dropdown.user label="Related User " :model="$employee" />
                    </div>
                    <div class="col-md-6">
                        <x-form.elements.label name="Active: <span class='star'>*</span>" for="active" />
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

<div class="form-group text-right">
    <x-button.back> {{route('employees.index')}} </x-button.back>
    <x-button label="{{$buttonText}}"/>
</div>


