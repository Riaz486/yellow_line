<div class="row">
    <div class="col-md-12">
        <p class="text-muted">
            Displays a list of the most recent blog posts.
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
        <label class="form-label">Number of posts</label>
        <select name="widgetData[post_count]" class="form-control bg-gray rounded-half">
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <span class="text-gray text-sm mt-2 dsp-block">The maximum number of recent blog posts to display.</span>
    </div>
</div>