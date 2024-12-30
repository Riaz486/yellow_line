<?php 
    $carouselImages = '';
    $image_height   = '';
    $overlay_text   = '';
    $alignment      = '';

    foreach($widgetMeta as $key => $meta):
        if($meta->meta_key == 'carouselImage') {
            $carouselImages = $meta->meta_value;
        }

        if($meta->meta_key == 'image_height') {
            $image_height = $meta->meta_value;
        }

        if($meta->meta_key == 'carouselImageTextOverlay') {
            $overlay_text = $meta->meta_value;
        }

        if($meta->meta_key == 'overlayAlignment') {
            $alignment = $meta->meta_value;
        }
    endforeach;
?>
<section class="section-main-banner">
    <div class="carousel-slider owl-carousel" id="carousel-item-<?= $widget->ID; ?>">
    <?php
        $image_url      = asset('public/assets/uploads/carousel-images/');
        $carouselImages = unserialize($carouselImages);
        $content        = unserialize($overlay_text);
        $alignment      = unserialize($alignment);
        foreach($carouselImages as $key => $image):
            $photo_url = $image_url . '/' . $image;
            $contentAlignment = $alignment[$key];
            if($contentAlignment == 'center') {
                $align = 'col-sm-offset-3';
            } elseif($contentAlignment == 'right') {
                $align = 'col-sm-offset-6';
            } else {
                $align = '';
            }
    ?>
    <div class="banner" style="background: url('{{$photo_url}}');">
        <div class="container">
            <div class="row">
                <div class="col-md-7 {{$align}}">
                    <div class="banner-content">
                        <?= $content[$key]; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    </div>
</section>