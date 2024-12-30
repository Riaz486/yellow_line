<div class="form-heading mb-50">
    <span class="iconify" data-icon="charm:circle-tick" data-inline="false"></span>
    <h2 class="text-md-24">Work Experience</h2>
</div>

<form method="POST" action="{{url('process-application')}}" class="career-form-process">
    <h4 class="card-sub-heading">Compensation Details.</h4>

    <div class="form-group field-inline align-items-start">
        <label>Please write description of your current benefits</label>
        <div class="row">
            <div class="col-md-12">
                <textarea name="application[current_benefits]" class="form-control h-50" rows="6">{{$applicationData['current_benefits'] ?? ''}}</textarea>
                <span class="text-sm mt-2 dsp-block">(Optional)</span>
            </div>
        </div>
    </div>

    <div class="form-group field-inline">
        <label>What is your current employment status?</label>
        <div class="row">
            <div class="col-md-12">
                <div class="inline-checkbox-fields">
                    <?php
                        $empStatus = $applicationData['employementStatus'] ?? '';
                    ?>
                    <div class="field-checkbox">
                        <input type="radio" name="application[employementStatus]" value="Employed" {{$empStatus == 'Employed' ? 'checked' : ''}} />
                        <span>Employed</span>
                    </div>

                    <div class="field-checkbox">
                        <input type="radio" name="application[employementStatus]" value="Unemployed" {{$empStatus == 'Unemployed' ? 'checked' : ''}} />
                        <span>Unemployed</span>
                    </div>

                    <div class="field-checkbox">
                        <input type="radio" name="application[employementStatus]" value="Self-Employed" {{$empStatus == 'Self-Employed' ? 'checked' : ''}} />
                        <span>Self-Employed</span>
                    </div>

                    <div class="field-checkbox">
                        <input type="radio" name="application[employementStatus]" value="Student" {{$empStatus == 'Student' ? 'checked' : ''}} />
                        <span>Student</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-6">
            <div class="field-inline">
                <label>Current Salary (PKR)</label>
                <input type="text" name="application[current_salary]" value="{{$applicationData['current_salary'] ?? ''}}" class="form-control" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="field-inline">
                <label>Expected Salary (PKR)</label>
                <input type="text" name="application[expected_salary]" value="{{$applicationData['expected_salary'] ?? ''}}" class="form-control" />
            </div>
        </div>
    </div>
    
    <div class="form-group field-inline">
        <label>Overall Expereince</label>
    </div>

    <div class="row form-group">
        <div class="col-md-6">
            <div class="field-inline">
                <label>Years</label>
                <?php $exp_years = $applicationData['exp_years'] ?? ''; ?>
                <select name="application[exp_years]" class="form-control">
                    <?php for($i = 0; $i <= 11; $i++) { ?>
                    <?php 
                        $selected = '';
                        if($i == 11) {
                            $i = $i . '+';
                        }

                        if($exp_years == $i) {
                            $selected = 'selected';
                        }
                    ?>
                    <option value="{{$i}}" {{$selected}}>{{$i}}</option>          
                    <?php } ?>          
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="field-inline">
                <label>Months</label>
                <?php $exp_months = $applicationData['exp_months'] ?? ''; ?>
                <select name="application[exp_months]" class="form-control">
                    <?php for($i = 0; $i <= 11; $i++) { ?>
                    <?php 
                        $selected = '';
                        if($i == 11) {
                            $i = $i . '+';
                        }

                        if($exp_months == $i) {
                            $selected = 'selected';
                        }
                    ?>
                    <option value="{{$i}}" {{$selected}}>{{$i}}</option>          
                    <?php } ?>  
                </select>
            </div>
        </div>
    </div>
    
    <span class="text-info mb-20">Add Details of your work experience below. Start by listing the latest organization  you have worked in or currently working.</span>

    @php
        // Group education data by index (like 0, 1, etc.)
        $experienceData = [];
        foreach ($applicationData as $key => $value) {
            if (preg_match('/experience\[(\d+)]\[(\w+)]/', $key, $matches)) {
                $index = $matches[1];
                $field = $matches[2];
                $experienceData[$index][$field] = $value;
            }
        }
    @endphp

    <div class="education-box">
    @if(count($experienceData) > 0) 
    @foreach($experienceData as $key => $value)
    <div class="card-body shade-light mb-20 position-relative">
        <a class="btn-exp-remove">
            <span class="iconify" data-icon="mdi:trash-can-outline" data-inline="false" ></span>
        </a>

        <div class="form-group field-inline">
            <label>Designation / Position</label>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" name="experience[{{$key}}][designation_position]" value="{{ $applicationData['experience['.$key.'][designation_position]'] ?? '' }}" class="form-control" />
                </div>
            </div>
        </div>

        <div class="form-group field-inline">
            <label>Company / Organization</label>
            <div class="row">
                <div class="col-md-12">
                    <?php 
                        $workStatus = $applicationData['experience['.$key.'][workStatus]'] ?? '';
                    ?>
                    <input type="text" name="experience[{{$key}}][company_organization]" value="{{$applicationData['experience['.$key.'][company_organization]'] ?? ''}}" class="form-control" />
                    <div class="supporting-block">
                        <span>I’m currently working in this role</span>
                        <div class="slide-btn">
                            <div class="toggle-switch">
                                <input type="checkbox" name="experience[{{$key}}][workStatus]" id="toggle" {{$workStatus == 'Yes' ? 'checked' : ''}} class="toggle-input" value="Yes">
                                <label for="toggle" class="toggle-label">
                                    <span class="toggle-inner"></span>
                                    <span class="toggle-switch-handle"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6">
                <div class="field-inline">
                    <label>Start Date</label>
                    <input type="date" name="experience[{{$key}}][start_date]" value="{{$applicationData['experience['.$key.'][start_date]'] ?? ''}}" class="form-control" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="field-inline">
                    <label>End Date</label>
                    <input type="date" name="experience[{{$key}}][end_date]" value="{{$applicationData['experience['.$key.'][end_date]'] ?? ''}}" class="form-control" />
                </div>
            </div>
        </div>

        <div class="form-group field-inline align-items-start">
            <label>Brief description of your responsibilities</label>
            <div class="row">
                <div class="col-md-12">
                    <textarea name="experience[{{$key}}][description]" class="form-control h-50" rows="12">{{$applicationData['experience['.$key.'][description]'] ?? ''}}</textarea>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
    </div>

    <input type="hidden" name="step" value="4" />
    <input type="hidden" name="processID" value="{{$processID}}" />
    
    {{csrf_field()}}

    <div class="d-flex btn-form-row justify-content-between">
        <button type="button" name="next" class="btn bg-yellow add-education"><i class="fa fa-plus"></i> Add Experience</button>

        <div class="btn-right-row d-flex align-items-center">
            <a href="{{$backUrl}}" class="btn bg-yellow btn-leaf text-semibold btn-form">Previous</a>
            <button type="submit" name="next" class="btn btn-form btn-leaf btn-outline">Next</button>
        </div>
    </div>
</form>

<div class="educationBlock template" style="display: none;">
    <div class="card-body shade-light mb-20 position-relative">
        <a class="btn-exp-remove">
            <span class="iconify" data-icon="mdi:trash-can-outline" data-inline="false" ></span>
        </a>

        <div class="form-group field-inline">
            <label>Designation / Position</label>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" name="experience[0][designation_position]" class="form-control" />
                </div>
            </div>
        </div>

        <div class="form-group field-inline">
            <label>Company / Organization</label>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" name="experience[0][company_organization]" class="form-control" />
                    <div class="supporting-block">
                        <span>I’m currently working in this role</span>
                        <div class="slide-btn">
                            <div class="toggle-switch">
                                <input type="checkbox" name="experience[0][workStatus]" id="toggle" class="toggle-input" value="Yes">
                                <label for="toggle" class="toggle-label">
                                    <span class="toggle-inner"></span>
                                    <span class="toggle-switch-handle"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6">
                <div class="field-inline">
                    <label>Start Date</label>
                    <input type="date" name="experience[0][start_date]" class="form-control" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="field-inline">
                    <label>End Date</label>
                    <input type="date" name="experience[0][end_date]" class="form-control" />
                </div>
            </div>
        </div>

        <div class="form-group field-inline align-items-start">
            <label>Brief description of your responsibilities</label>
            <div class="row">
                <div class="col-md-12">
                    <textarea name="experience[0][description]" class="form-control h-50" rows="12"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>