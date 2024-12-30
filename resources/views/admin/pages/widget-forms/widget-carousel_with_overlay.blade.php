<div class="row">
    <div class="col-md-12 form-group">
        <label class="form-label">Name</label>
        <input type="text" name="widgetSettings[name]" class="form-control bg-gray rounded-half" value="{{$name}}" />
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Image height</label>
        <input type="text" name="widgetData[image_height]" class="form-control bg-gray rounded-half" value="{{$image_height}}" />
    </div>

    <div class="col-md-12 form-group">
        <div class="d-flex align-items-center justify-content-between m-b-30">
            <label class="form-label">Carousel Images</label>
            <a href="#" class="btn btn-info btn-rounded add-carousel-overlay-image">Add Carousel Image</a>
        </div>

        <div class="carousel-overlay-row">
            <div class="carousel-image-box">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="form-label">Image</label>
                            <input type="file" name="widgetData[carouselImage][]" class="form-control bg-gray rounded-half" />
                        </div>

                        <div class="form-group">
                            <label class="form-label">Overlay Alignment</label>
                            <select name="widgetData[overlayAlignment][]" class="form-control bg-gray rounded-half">
                                <option value="left">Left</option>
                                <option value="center">Center</option>
                                <option value="right">Right</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-7 form-group">
                        <label class="form-label">Content</label>
                        <textarea name="widgetData[carouselImageTextOverlay][]" class="summernote form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>