<div class="row">
    <div class="col-md-12 form-group">
        <label class="form-label">Name</label>
        <input type="text" name="widgetSettings[name]" class="form-control bg-gray rounded-half" value="{{$name}}" />
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Carousel Alignment</label>
        <select name="widgetData[alignment]" class="form-control bg-gray rounded-half">
            <option value="left">Left</option>
            <option value="right">Right</option>
        </select>
        <span class="text-gray text-sm mt-2 dsp-block">Whether the image carousel appears on the left or right of the page.</span>
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Title</label>
        <input type="text" name="widgetData[title]" class="form-control bg-gray rounded-half" value="{{$title}}" />
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Content</label>
        <textarea name="widgetData[content]" class="summernote form-control"></textarea>
    </div>

    <div class="col-md-12 form-group">
        <div class="d-flex align-items-center justify-content-between m-b-30">
            <label class="form-label">Carousel Images</label>
            <a href="#" class="btn btn-info btn-rounded add-carousel-image">Add Carousel Image</a>
        </div>

        <div class="carousel-row">
            <div class="carousel-image">
                <label>Image</label>
                <input type="file" name="widgetData[carouselImage][]" class="form-control bg-gray rounded-half" />
            </div>
        </div>
    </div>
</div>