<div class="row">
    <div class="col-md-12 form-group">
        <label class="form-label">Name</label>
        <input type="text" name="widgetSettings[name]" class="form-control bg-gray rounded-half" value="{{$name}}" />
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Title</label>
        <input type="text" name="widgetData[title]" class="form-control bg-gray rounded-half" value="{{$title}}" />
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Subtitle</label>
        <input type="text" name="widgetData[subTitle]" class="form-control bg-gray rounded-half" value="{{$title}}" />
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Image</label>
        <input type="file" name="widgetData[image]" class="form-control bg-gray rounded-half" />
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Image height</label>
        <input type="text" name="widgetData[image_height]" class="form-control bg-gray rounded-half" value="{{$image_height}}" />
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Link Title</label>
        <input type="text" name="widgetData[link_title]" class="form-control bg-gray rounded-half" />
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Link URL</label>
        <input type="text" name="widgetData[link_url]" class="form-control bg-gray rounded-half" />
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Overlay Text Position</label>
        <select name="widgetData[alignment]" class="form-control bg-gray rounded-half">
            <option value="left">Left</option>
            <option value="center">Center</option>
            <option value="right">Right</option>
        </select>
        <span class="text-gray text-sm mt-2 dsp-block">The position to display the overlay text.</span>
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Content</label>
        <textarea name="widgetData[content]" class="summernote form-control"></textarea>
    </div>
</div>