<div class="row">
    <div class="col-md-12">
        <p>
            Each item listed below will appear in a big list with a checked box icon. Empty items will be ignored.
        </p>
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Name</label>
        <input type="text" name="widgetSettings[name]" class="form-control bg-gray rounded-half" value="{{$name}}" />
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Title</label>
        <input type="text" name="widgetData[title]" class="form-control bg-gray rounded-half" value="{{$title}}" />
    </div>

    <div class="col-md-12 form-group">
        <div class="d-flex align-items-center justify-content-between m-b-30">
            <label class="form-label">Checklist</label>
            <a href="#" class="btn btn-info btn-rounded add-checklist">Add Checklist</a>
        </div>

        <div class="checklist-row">
            <input type="text" name="widgetData[checklist][]" class="form-control bg-gray rounded-half" value="" />
        </div>
    </div>
</div>