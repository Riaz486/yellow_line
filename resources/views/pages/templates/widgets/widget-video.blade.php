<?php 
    $title     = '';
    $embed_code = '';
    $alignment = '';
    $content   = '';
    $description = '';
    $image = '';
    $thumbnail_title = '';

    foreach($widgetMeta as $key => $meta):
        if($meta->meta_key == 'title') {
            $title = $meta->meta_value;
        }

        if($meta->meta_key == 'embed_code') {
            $embed_code = $meta->meta_value;
        }

        if($meta->meta_key == 'alignment') {
            $alignment = $meta->meta_value;
        }

        if($meta->meta_key == 'content') {
            $content = $meta->meta_value;
        }

        if($meta->meta_key == 'description') {
            $description = $meta->meta_value;
        }

        if($meta->meta_key == 'image') {
            $image = $meta->meta_value;
        }

        if($meta->meta_key == 'thumbnail_title') {
            $thumbnail_title = $meta->meta_value;
        }
    endforeach;
?>
<section class="pad-80">
    <div class="container">
        <div class="row m-t-40">
            <div class="col-md-6">
                <?php if($alignment == 'left') { ?>
                <h2>{{$title}}</h2>

                <div class="video-box"><?= $embed_code; ?></div>
                <?php } else { ?>
                <?= $content; ?>
                <?php } ?>
            </div>

            <div class="col-md-6">
                <?php if($alignment == 'right') { ?>
                <h2>{{$title}}</h2>

                <div class="video-box"><?= $embed_code; ?></div>
                <?php } else { ?>
                <?= $content; ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>