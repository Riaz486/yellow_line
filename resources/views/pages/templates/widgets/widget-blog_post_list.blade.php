<?php 
    $title      = '';
    $post_count = '';

    foreach($widgetMeta as $key => $meta):
        if($meta->meta_key == 'title') {
            $title = $meta->meta_value;
        }

        if($meta->meta_key == 'post_count') {
            $post_count = $meta->meta_value;
        }
    endforeach;
?>
<section class="m-t-40 m-b-40 section-widget">
    <div class="container">
        <div class="row">
            @foreach($postsData as $post)
            <div class="col-md-4">
                <div class="card">
                	<div class="card-body">
                		<div class="product-box">
                            <div class="product-body">
                                <div class="product-content">
                                    <h3>{{$post->title}}</h3>
                                    <p>{{$post->summary}}</p>
                                    <span>Published on {{$post->date_created}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>