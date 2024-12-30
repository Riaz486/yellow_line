<?php 
    $title     = '';
    $alignment = '';
    $subtitle  = '';
    $content   = '';

    foreach($widgetMeta as $key => $meta):
        if($meta->meta_key == 'title') {
            $title = $meta->meta_value;
        }

        if($meta->meta_key == 'alignment') {
            $alignment = $meta->meta_value;
        }

        if($meta->meta_key == 'subTitle') {
            $subtitle = $meta->meta_value;
        }

        if($meta->meta_key == 'content') {
            $content = $meta->meta_value;
        }
    endforeach;
?>

<section class="pad-80">
    <div class="container">
        <div class="row">
            <?php if($alignment == 'left') { ?>
            <div class="col-md-7">
                <div class="card">
                	<div class="card-body">
                        <h2 class="card-title">{{$title}}</h2>
                		<form method="POST">
                			<div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" name="title" class="form-control bg-gray rounded-half" value="" />
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="text" name="title" class="form-control bg-gray rounded-half" value="" />
                            </div>

                            <div class="form-group">
                                <label class="form-label">Phone</label>
                                <input type="text" name="title" class="form-control bg-gray rounded-half" value="" />
                            </div>

                            <div class="form-group">
                                <label class="form-label">Message</label>
                                <textarea name="" class="form-control bg-gray rounded-half" rows="6"></textarea>
                            </div>

                            <div class="btn-row">
                            	<button type="submit" class="btn btn-info btn-rounded row-inline m-r-10">Send Message</button>
                            </div>
                		</form>
                	</div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="box-content">
                    <h3>{{$subtitle}}</h3>

                    <div class="box-inner-content"><?= $content; ?></div>
                </div>
            </div>
            <?php } else { ?>
            <div class="col-md-5">
                <div class="box-content">
                    <h3>{{$subtitle}}</h3>

                    <div class="box-inner-content"><?= $content; ?></div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card">
                	<div class="card-body">
                        <h2 class="card-title">{{$title}}</h2>
                		<form method="POST">
                			<div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" name="title" class="form-control bg-gray rounded-half" value="" />
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="text" name="title" class="form-control bg-gray rounded-half" value="" />
                            </div>

                            <div class="form-group">
                                <label class="form-label">Phone</label>
                                <input type="text" name="title" class="form-control bg-gray rounded-half" value="" />
                            </div>

                            <div class="form-group">
                                <label class="form-label">Message</label>
                                <textarea name="" class="form-control bg-gray rounded-half" rows="6"></textarea>
                            </div>

                            <div class="btn-row">
                            	<button type="submit" class="btn btn-info btn-rounded row-inline m-r-10">Send Message</button>
                            </div>
                		</form>
                	</div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>