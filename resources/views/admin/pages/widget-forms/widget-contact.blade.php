<div class="row">
    <div class="col-md-12">
        <p class="text-muted">
            The contact form sends an email to <b>shamrockllc@charter.net</b>
            (<a href="/site_notification_settings_changes/new">change</a>).
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
        <label class="form-label">Form Alignment</label>
        <select name="widgetData[alignment]" class="form-control bg-gray rounded-half">
            <option value="left">Left</option>
            <option value="right">Right</option>
        </select>
        <span class="text-gray text-sm mt-2 dsp-block">Whether the form appears on the left or right of the page.</span>
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Subtitle</label>
        <input type="text" name="widgetData[subTitle]" class="form-control bg-gray rounded-half" value="{{$title}}" />
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Content</label>
        <textarea name="widgetData[content]" class="summernote form-control"></textarea>
    </div>
</div>