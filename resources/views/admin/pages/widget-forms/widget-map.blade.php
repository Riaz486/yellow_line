<div class="row">
    <div class="col-md-12 form-group">
        <label class="form-label">Name</label>
        <input type="text" name="widgetSettings[name]" class="form-control bg-gray rounded-half" value="{{$name}}" />
    </div>

    <div class="col-md-12">
        <p class="text-muted">
            Address
            <br />
            4319 Twin Valley Rd. - 4589 Garfoot Road
            <br />
            Middleton - Cross Plains, WI, 53562 - 53528
            <br />
            <a href="{{url('admin/contact')}}">Change the physical address</a>
        </p>
    </div>    

    <div class="col-md-12 form-group">
        <label class="form-label">Map Alignment</label>
        <select name="widgetData[alignment]" class="form-control bg-gray rounded-half">
            <option value="left">Left</option>
            <option value="right">Right</option>
        </select>
        <span class="text-gray text-sm mt-2 dsp-block">Whether the map appears on the left or right of the page.</span>
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Title</label>
        <input type="text" name="widgetSettings[title]" class="form-control bg-gray rounded-half" value="{{$title}}" />
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Content</label>
        <textarea name="widgetData[content]" class="summernote form-control"></textarea>
    </div>
</div>