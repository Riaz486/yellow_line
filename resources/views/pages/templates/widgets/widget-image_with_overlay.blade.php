<?php 
    $title     = '';
    $subtitle  = '';
    $link_title = '';
    $link_url = '';
    $alignment = '';
    $content   = '';
    $background = '';

    foreach($widgetMeta as $key => $meta):
        if($meta->meta_key == 'title') {
            $title = $meta->meta_value;
        }

        if($meta->meta_key == 'subTitle') {
            $subtitle = $meta->meta_value;
        }

        if($meta->meta_key == 'link_title') {
            $link_title = $meta->meta_value;
        }

        if($meta->meta_key == 'link_url') {
            $link_url = $meta->meta_value;
        }

        if($meta->meta_key == 'alignment') {
            $alignment = $meta->meta_value;
        }

        if($meta->meta_key == 'content') {
            $content = $meta->meta_value;
        }

        if($meta->meta_key == 'image') {
            $background = $meta->meta_value;
        }
    endforeach;
?>

<section class="banner" style="background : url({{asset('public/assets/uploads/' . $background)}});background-size: cover; ">
    <div class="container">
        <div class="row">
            <?php 
                if($alignment == 'center') {
                    $align = 'col-sm-offset-3';
                } elseif($alignment == 'right') {
                    $align = 'col-sm-offset-6';
                } else {
                    $align = '';
                }
            ?>  
            <div class="col-md-7 {{$align}}">
                <div class="banner-content">
                    <h1>{{$title}}</h1>
                    <h2>{{$subtitle}}</h2>
                    
                    <div class="content"><?= $content; ?></div>

                    <a href="{{$link_url}}" class="btn btn-rounded btn-info">{{$link_title}}</a>
                </div>
            </div>
        </div>
    </div>
</section>