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
<section class="m-t-40 m-b-40 section-widget">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-content">
                    <h3 class="text-center">{{$title}}</h3>
                </div>

                <div class="single-icon-box">
                    @foreach($section_title as $key => $titleItem)
                    <div class="icon-l-box m-t-20 m-b-20">
                        <div class="icon-l">
                            <i class="{{$icon[$key]}}"></i>
                        </div>

                        <div class="box-content-r">
                            <h3>{{$titleItem}}</h3>
                            <p><?= $iconWidgetContent[$key]; ?></p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>