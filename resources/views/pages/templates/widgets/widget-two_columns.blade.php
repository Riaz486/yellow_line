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
        <div class="row">
            <div class="col-md-4 d-flex align-items-center">
                <h2 class="text-lg">{{$title}}</h2>
            </div>

            <div class="col-md-8">
                <div class="row">
                <?php $i = 1; ?>
                @foreach($section_title as $key => $titleItem)
                    <div class="col-md-6">
                        <div class="box-icon-lg <?= ($i == 1) ? 'box-blue' : ''; ?>">
                            <div class="inner-icon">
                                <i class="{{$icon[$key]}}"></i>
                            </div>

                            <h3>{{$titleItem}}</h3>

                            <div class="inner-content"><?= $iconWidgetContent[$key]; ?></div>
                        </div>
                    </div>
                <?php $i++; ?>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>