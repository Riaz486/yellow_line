<div class="form-heading mb-50">
    <span class="iconify" data-icon="charm:circle-tick" data-inline="false"></span>
    <h2 class="text-md-24">Basic Information</h2>
</div>

<form method="POST" action="{{url('process-application')}}" class="career-form-process">
    <h4 class="card-sub-heading">Personal Details</h4>

    <div class="row form-group field-inline">
        <label>Full Name</label>
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="application[first_name]" class="form-control" value="{{$applicationData['first_name'] ?? ''}}" required />
                <span class="text-sm mt-2 dsp-block">First Name</span>
            </div>

            <div class="col-md-6">
                <input type="text" name="application[last_name]" class="form-control" value="{{$applicationData['last_name'] ?? ''}}" required />
                <span class="text-sm mt-2 dsp-block">Last Name</span>
            </div>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-6">
            <div class="field-inline">
                <label>Date Of Birth</label>
                <div class="row">
                    <div class="col-md-12">
                        <input type="date" name="application[date_of_birth]" value="{{$applicationData['date_of_birth'] ?? ''}}" class="form-control" required />
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="field-inline">
                <label>Age</label>
                <div class="row">
                    <div class="col-md-12">
                        <div class="number-input">
                            <button type="button" class="decrease">-</button>
                            <input type="text" name="application[age]" class="form-control" value="{{$applicationData['age'] ?? '0'}}" id="number-field" min="0" max="100" required />
                            <button type="button" class="increase">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-6">
            <div class="field-inline">
                <label>Email</label>
                <div class="row">
                    <div class="col-md-12">
                        <input type="email" name="application[email]" value="{{$applicationData['email'] ?? ''}}" class="form-control" required />
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="field-inline">
                <label>Phone</label>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="application[phone]" value="{{$applicationData['phone'] ?? ''}}" class="form-control" required />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group field-inline">
        <label>Permanent Address</label>
        <div class="row">
            <div class="col-md-12">
                <input type="text" name="application[address]" value="{{$applicationData['address'] ?? ''}}" class="form-control" required />
            </div>
        </div>
    </div>

    <div class="form-group field-inline">
        <label>&nbsp;</label>
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="application[city]" value="{{$applicationData['city'] ?? ''}}" class="form-control" required />
                <span class="text-sm mt-2 dsp-block">City</span>
            </div>

            <?php
                $province = $applicationData['province'] ?? '';
            ?>
            <div class="col-md-6">
                <select name="application[province]" class="form-control" required>
                    <option value="">Select Province/State</option>
                    <option value="punjab" {{$province == 'punjab' ? 'selected' : ''}}>Punjab</option>
                    <option value="sindh" {{$province == 'sindh' ? 'selected' : ''}}>Sindh</option>
                    <option value="khyber-pakhtunkhwa" {{$province == 'khyber-pakhtunkhwa' ? 'selected' : ''}}>Khyber Pakhtunkhwa</option>
                    <option value="balochistan" {{$province == 'balochistan' ? 'selected' : ''}}>Balochistan</option>
                    <option value="gilgit-baltistan" {{$province == 'gilgit-baltistan' ? 'selected' : ''}}>Gilgit-Baltistan</option>
                    <option value="azad-kashmir" {{$province == 'azad-kashmir' ? 'selected' : ''}}>Azad Kashmir</option>
                </select>
                <span class="text-sm mt-2 dsp-block">Province / State</span>
            </div>
        </div>
    </div>

    <div class="form-group field-inline">
        <label>&nbsp;</label>
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="application[zipcode]" value="{{$applicationData['zipcode'] ?? ''}}" class="form-control" required />
                <span class="text-sm mt-2 dsp-block">Postal / Zip Code</span>
            </div>

            <div class="col-md-6">
                <input type="text" name="application[country]" value="{{$applicationData['country'] ?? ''}}" class="form-control" required />
                <span class="text-sm mt-2 dsp-block">Country</span>
            </div>
        </div>
    </div>

    <input type="hidden" name="step" value="2" />
    <input type="hidden" name="jobID" value="{{$jobID}}" />
    <input type="hidden" name="processID" value="{{$processID}}" />
    
    {{csrf_field()}}

    <div class="btn-row">
        <button type="submit" name="next" class="btn btn-default-outline">Next</button>
    </div>
</form>