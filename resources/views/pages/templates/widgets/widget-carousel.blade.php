<?php 
    $title     = '';
    $alignment = '';
    $content   = '';
    $carouselImages = '';

    foreach($widgetMeta as $key => $meta):
        if($meta->meta_key == 'title') {
            $title = $meta->meta_value;
        }

        if($meta->meta_key == 'alignment') {
            $alignment = $meta->meta_value;
        }

        if($meta->meta_key == 'content') {
            $content = $meta->meta_value;
        }

        if($meta->meta_key == 'carouselImage') {
            $carouselImages = $meta->meta_value;
        }
    endforeach;
?>
<section class="m-t-40 m-b-40 section-widget">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if($alignment == 'left') { ?>
                <div class="carousel-conent">
                    <h2>{{$title}}</h2>
                    <?= $content; ?>
                </div>
                <?php } else { ?>
                <div class="carousel-slider owl-carousel" id="carousel-item-<?= $widget->ID; ?>">
                    <?php
                        $image_url = asset('public/assets/uploads/carousel-images/');
                        $carouselImages = unserialize($carouselImages);
                        foreach($carouselImages as $image):
                            $photo_url = $image_url . '/' . $image;
                    ?>
                    <div class="carousel-thumbnail">
                        <img src="{{$photo_url}}" />
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php } ?>
            </div>

            <div class="col-md-6">
                <?php if($alignment == 'left') { ?>
                <div class="carousel-slider owl-carousel" id="carousel-item-<?= $widget->ID; ?>">
                    <?php
                        $image_url = asset('public/assets/uploads/carousel-images/');
                        $carouselImages = unserialize($carouselImages);
                        foreach($carouselImages as $image):
                            $photo_url = $image_url . '/' . $image;
                    ?>
                    <div class="carousel-thumbnail">
                        <img src="{{$photo_url}}" />
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php } else { ?>
                <div class="carousel-conent">
                    <h2>{{$title}}</h2>
                    <?= $content; ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>