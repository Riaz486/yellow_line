<div class="form-heading mb-50">
    <span class="iconify" data-icon="charm:circle-tick" data-inline="false"></span>
    <h2 class="text-md-24">Education</h2>
</div>

<form method="POST" action="{{url('process-application')}}" class="career-form-process">
    <h4 class="card-sub-heading">Add your education information below start by listing the highest level of education you have received.</h4>
    
    @php
        // Group education data by index (like 0, 1, etc.)
        $educationData = [];
        foreach ($applicationData as $key => $value) {
            if (preg_match('/education\[(\d+)]\[(\w+)]/', $key, $matches)) {
                $index = $matches[1];
                $field = $matches[2];
                $educationData[$index][$field] = $value;
            }
        }
    @endphp

    <div class="education-box">
    @if(count($educationData) > 0) 
    @foreach($educationData as $key => $value)
        <div class="card-body shade-light mb-20">
            <!-- Degree / Certificate Level -->
            <div class="form-group field-inline">
                <label>Degree / Certificate Level</label>
                <div class="row">
                      <div class="col-md-12">
                        <?php 
                            $education = $applicationData['education['.$key.'][degree_certificate]'];
                        ?>
                        <select name="education[{{ $key }}][degree_certificate]" class="form-control">
                            <option value="">Select Degree / Certificate Level</option>
                            <option value="PhD" {{ $education == 'PhD' ? 'selected' : '' }}>PhD</option>
                            <option value="M. Phil" {{ $education == 'M. Phil' ? 'selected' : '' }}>M. Phil</option>
                            <option value="Masters" {{ $education == 'Masters' ? 'selected' : '' }}>Masters</option>
                            <option value="Bachelors (Honors)" {{ $education == 'Bachelors (Honors)' ? 'selected' : '' }}>Bachelors (Honors)</option>
                            <option value="Bachelors" {{ $education == 'Bachelors' ? 'selected' : '' }}>Bachelors</option>
                            <option value="A Levels" {{ $education == 'A Levels' ? 'selected' : '' }}>A Levels</option>
                            <option value="O Level" {{ $education == 'O Level' ? 'selected' : '' }}>O Level</option>
                            <option value="Intermediate" {{ $education == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                            <option value="Matric" {{ $education == 'Matric' ? 'selected' : '' }}>Matric</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Discipline -->
            <div class="form-group field-inline">
                <label>Discipline</label>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="education[{{ $key }}][discipline]" class="form-control" value="{{ $applicationData['education['.$key.'][descipline]'] ?? '' }}" />
                    </div>
                </div>
            </div>

            <!-- Grade / Division -->
            <div class="form-group field-inline">
                <label>Grade / Division</label>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="education[{{ $key }}][grade]" class="form-control" value="{{ $applicationData['education['.$key.'][grade]'] ?? '' }}" />
                    </div>
                </div>
            </div>

            <!-- Board / Institute -->
            <div class="form-group field-inline">
                <label>Board / Institute</label>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="education[{{ $key }}][institute]" class="form-control" value="{{ $applicationData['education['.$key.'][institute]'] ?? '' }}" />
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @else
        <div class="card-body shade-light mb-20">
            <div class="form-group field-inline">
                <label>Degree / Certificate Level</label>
                <div class="row">
                    <div class="col-md-12">
                        <select name="education[0][degree_certificate]" class="form-control">
                            <option value="">Select Degree / Certificate Level</option>
                            <option value="PhD">PhD</option>
                            <option value="M. Phil">M. Phil</option>
                            <option value="Masters">Masters</option>
                            <option value="Bachelors (Honors)">Bachelors (Honors)</option>
                            <option value="Bachelors">Bachelors</option>
                            <option value="A Levels">A Levels</option>
                            <option value="O Level">O Level</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Matric">Matric</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group field-inline">
                <label>Descipline</label>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="education[0][descipline]" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="form-group field-inline">
                <label>Grade / Division</label>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="education[0][grade]" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="form-group field-inline">
                <label>Board / Institute</label>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="education[0][institute]" class="form-control" />
                    </div>
                </div>
            </div>
        </div>
    @endif
    </div>

    <input type="hidden" name="step" value="3" />
    <input type="hidden" name="processID" value="{{$processID}}" />

    {{csrf_field()}}

    <div class="d-flex btn-form-row justify-content-between">
        <button type="button" name="next" class="btn bg-yellow add-education"><i class="fa fa-plus"></i> Add Qualification</button>

        <div class="btn-right-row d-flex align-items-center">
            <a href="{{$backUrl}}" class="btn bg-yellow btn-leaf text-semibold btn-form">Previous</a>
            <button type="submit" name="next" class="btn btn-form btn-leaf btn-outline">Next</button>
        </div>
    </div>
</form>

<div class="educationBlock template" style="display: none;">
    <div class="card-body shade-light mb-20 position-relative">
        <a class="btn-edu-remove">
            <i class="fa fa-times-circle"></i>
        </a>
        <div class="form-group field-inline">
            <label>Degree / Certificate Level</label>
            <div class="row">
                <div class="col-md-12">
                    <select name="education[0][degree_certificate]" class="form-control">
                        <option value="">Select Degree / Certificate Level</option>
                        <option value="PhD">PhD</option>
                        <option value="M. Phil">M. Phil</option>
                        <option value="Masters">Masters</option>
                        <option value="Bachelors (Honors)">Bachelors (Honors)</option>
                        <option value="Bachelors">Bachelors</option>
                        <option value="A Levels">A Levels</option>
                        <option value="O Level">O Level</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Matric">Matric</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group field-inline">
            <label>Discipline</label>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" name="education[0][discipline]" class="form-control" />
                </div>
            </div>
        </div>

        <div class="form-group field-inline">
            <label>Grade / Division</label>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" name="education[0][grade]" class="form-control" />
                </div>
            </div>
        </div>

        <div class="form-group field-inline">
            <label>Board / Institute</label>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" name="education[0][institute]" class="form-control" />
                </div>
            </div>
        </div>
    </div>
</div>