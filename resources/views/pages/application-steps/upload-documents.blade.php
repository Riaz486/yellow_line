<div class="form-heading mb-50">
    <span class="iconify" data-icon="charm:circle-tick" data-inline="false"></span>
    <h2 class="text-md-24">Upload Documents</h2>
</div>

<form method="POST" action="{{url('process-application')}}" class="career-form-submit">
    <h4 class="card-sub-heading">Maximum size of all documents must not exceed 10MB.</h4>

    <div class="form-group field-inline">
        <label>Upload Cover Letter</label>
        <div class="row">
            <div class="col-md-12">
                <div class="image-uploader">
                    <div class="file-upload-init">
                        <div class="fileUploader">
                            <input type="file" name="coverLetter" class="input-upload-file" multiple="false" id="coverLetter" />
                            <div id="cover_letter_dropzone" class="dropZone">
                                <h4>
                                    <i class="fa fa-cloud-upload"></i>
                                    <h2>Upload A File</h2>
                                    <span>Drag & Drop files here</span>
                                    <small>( PDF / Word / Image and Video etc.)</small>
                                </h4>
                            </div>
                            <div id="coverLetter_progress"></div>                            
                        </div>
                    </div>  

                    <div id="cover_letter_message" class="file-uploader-message"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group field-inline">
        <label>Upload Resume</label>
        <div class="row">
            <div class="col-md-12">
                <div class="image-uploader">
                    <div class="file-upload-init">
                        <div class="fileUploader">
                            <input type="file" name="resume" class="input-upload-file" multiple="false" id="resume" />
                            <div id="resume_dropzone" class="dropZone">
                                <h4>
                                    <i class="fa fa-cloud-upload"></i>
                                    <h2>Upload A File</h2>
                                    <span>Drag & Drop files here</span>
                                    <small>( PDF / Word / Image and Video etc.)</small>
                                </h4>
                            </div>
                            <div id="resume_progress"></div>                            
                        </div>
                    </div>  

                    <div id="resume_message" class="file-uploader-message"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group field-inline">
        <label>Upload Documents</label>
        <div class="row">
            <div class="col-md-12">
                <div class="image-uploader">
                    <div class="file-upload-init">
                        <div class="fileUploader">
                            <input type="file" name="documents" class="input-upload-file" multiple="true" id="documents" />
                            <div id="documents_dropzone" class="dropZone">
                                <h4>
                                    <i class="fa fa-cloud-upload"></i>
                                    <h2>Upload A File</h2>
                                    <span>Drag & Drop files here</span>
                                    <small>( PDF / Word / Image and Video etc.)</small>
                                </h4>
                            </div>
                            <div id="documents_progress"></div>                            
                        </div>
                    </div>  

                    <div id="documents_message" class="file-uploader-message"></div>
                </div>
            </div>
        </div>
    </div>

    <span class="text-info">Send Applications</span>
    <hr />

    <div class="card-text">
        <p>
            o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its 
        </p>

        <p>
            o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its 
        </p>

        <p>
            o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its 
        </p>
    </div>

    <div class="form-group col-md-4 mt-40">
        <label>Date</label>
        <input type="date" name="application[created_at]" class="form-control" value="{{$applicationData['current_benefits'] ?? date('Y-m-d')}}" />
    </div>

    <input type="hidden" name="step" value="final" />
    <input type="hidden" name="processID" value="{{$processID}}" />

    {{csrf_field()}}

    <div class="d-flex btn-form-row justify-content-between">
        <div class="btn-right-row d-flex align-items-center">
            <a href="{{$backUrl}}" class="btn bg-yellow btn-leaf text-semibold btn-form">Previous</a>
            <button type="submit" name="next" class="btn btn-form btn-leaf bg-yellow">Submit</button>
        </div>
    </div>
</form>

<input type="hidden" name="processUrl" value="{{url('process-careeer-files')}}" />