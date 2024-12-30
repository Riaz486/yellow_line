<?php 
    $title     = '';
    $checklist = '';

    foreach($widgetMeta as $key => $meta):
        if($meta->meta_key == 'title') {
            $title = $meta->meta_value;
        }

        if($meta->meta_key == 'checklist') {
            $checklist = $meta->meta_value;
        }
    endforeach;

    $checklist = unserialize($checklist);
?>
<section class="m-t-40 m-b-40 section-widget">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-content text-center">
                    <h3>{{$title}}</h3>

                    <ul class="list-check">
                    @foreach($checklist as $item)
                        <li>{{$item}}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>