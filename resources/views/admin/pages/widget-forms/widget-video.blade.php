<div class="row">
    <div class="col-md-12 form-group">
        <label class="form-label">Name</label>
        <input type="text" name="widgetSettings[name]" class="form-control bg-gray rounded-half" value="{{$name}}" />
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Title</label>
        <input type="text" name="widgetData[title]" class="form-control bg-gray rounded-half" value="{{$title}}" />
        <span class="text-gray text-sm mt-2 dsp-block">Whether the image carousel appears on the left or right of the page.</span>
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Embed Code</label>
        <input type="text" name="widgetData[embed_code]" class="form-control bg-gray rounded-half" value="" />
        <span class="text-gray text-sm mt-2 dsp-block">
            Copy and paste the embed code from your video hosting service. For example:<br />
            &lt;iframe
            width=&quot;560&quot;
            height=&quot;315&quot;
            src=&quot;https://www.youtube.com/embed/6rATBD1BOJg&quot;
            frameborder=&quot;0&quot;
            allowfullscreen
            &gt;&lt;/iframe&gt;
        </span>
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Video Alignment</label>
        <select name="widgetData[alignment]" class="form-control bg-gray rounded-half">
            <option value="left">Left</option>
            <option value="center">Center</option>
            <option value="right">Right</option>
        </select>
        <span class="text-gray text-sm mt-2 dsp-block">If the video is aligned left or right the additional content is displayed beside it. When centered the additional content appears below the video.</span>
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Additional Content</label>
        <textarea name="widgetData[content]" class="summernote form-control"></textarea>
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Description</label>
        <textarea name="widgetData[description]" class="form-control" rows="6"></textarea>
        <span class="text-gray text-sm mt-2 dsp-block">Describe the video content for search engines.</span>
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Thumbnail Image</label>
        <input type="file" name="widgetData[image]" class="form-control bg-gray rounded-half" />
        <span class="text-gray text-sm mt-2 dsp-block">This thumbnail image is not ordinarily visible but is useful for search engines. Files must be jpeg, gif or png and should have a resolution of at least 160x90.</span>
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Thumbnail Title</label>
        <input type="text" name="widgetData[thumbnail_title]" class="form-control bg-gray rounded-half" value="" />
        <span class="text-gray text-sm mt-2 dsp-block">Describe the thumbnail image for search engines.</span>
    </div>
</div>