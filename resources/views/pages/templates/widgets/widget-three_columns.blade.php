<?php 
    $title     = '';
    $full_width = '';
    $section_title = '';
    $center_title   = '';
    $icon = '';
    $iconWidgetContent = '';

    foreach($widgetMeta as $key => $meta):
        if($meta->meta_key == 'title') {
            $title = $meta->meta_value;
        }

        if($meta->meta_key == 'full_width') {
            $full_width = $meta->meta_value;
        }

        if($meta->meta_key == 'section_title') {
            $section_title = unserialize($meta->meta_value);
        }

        if($meta->meta_key == 'center_title') {
            $center_title = unserialize($meta->meta_value);
        }

        if($meta->meta_key == 'icon') {
            $icon = unserialize($meta->meta_value);
        }

        if($meta->meta_key == 'iconWidgetContent') {
            $iconWidgetContent = unserialize($meta->meta_value);
        }
    endforeach;
?>
<section class="pad-80">
    <div class="container">
        <h2 class="text-lg">{{$title}}</h2>

        <div class="row m-t-40">
            @foreach($section_title as $key => $titleItem)
            <div class="col-md-4">
                <div class="icon-l-box">
                    <div class="icon-l">
                        <i class="{{$icon[$key]}}"></i>
                    </div>

                    <div class="box-content-r">
                        <h3>{{$titleItem}}</h3>
                        <div class="p-description"><?= $iconWidgetContent[$key]; ?></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>