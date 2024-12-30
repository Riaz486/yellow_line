<?php 
    $title     = '';
    $content = '';
    $conversion_code = '';
    $select_unit_customers_allow   = '';
    $show_prices_tax = '';
    $unit_left_count_status = '';
    $unit_left_count = '';
    $layout_style = '';
    $rent_button = '';
    $reserve_button = '';
    $waiting_list_button = '';
    $contact_button = '';

    foreach($widgetMeta as $key => $meta):
        if($meta->meta_key == 'title') {
            $title = $meta->meta_value;
        }

        if($meta->meta_key == 'content') {
            $content = $meta->meta_value;
        }

        if($meta->meta_key == 'conversion_code') {
            $conversion_code = $meta->meta_value;
        }

        if($meta->meta_key == 'select_unit_customers_allow') {
            $select_unit_customers_allow = $meta->meta_value;
        }

        if($meta->meta_key == 'show_prices_tax') {
            $show_prices_tax = $meta->meta_value;
        }

        if($meta->meta_key == 'unit_left_count_status') {
            $unit_left_count_status = $meta->meta_value;
        }

        if($meta->meta_key == 'unit_left_count') {
            $unit_left_count = $meta->meta_value;
        }

        if($meta->meta_key == 'layout_style') {
            $layout_style = $meta->meta_value;
        }

        if($meta->meta_key == 'rent_button') {
            $rent_button = unserialize($meta->meta_value);
        }

        if($meta->meta_key == 'reserve_button') {
            $reserve_button = unserialize($meta->meta_value);
        }

        if($meta->meta_key == 'waiting_list_button') {
            $waiting_list_button = unserialize($meta->meta_value);
        }

        if($meta->meta_key == 'contact_button') {
            $contact_button = unserialize($meta->meta_value);
        }
    endforeach;
?>
<section class="pad-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-content">
                    <h3 class="text-center">{{$title}}</h3>
                </div>
            </div>
            
            @foreach($unit_types_data as $unit_type)
            <div class="col-md-4">
                <div class="card">
                	<div class="card-body">
                		<div class="product-box">
                            <div class="product-body">
                                @php
                                    $image_url = asset('public/assets/uploads/unit-type-photo/');

                                    if($unit_type->photo_type == 0) {
                                        if($unit_type->thumbnail != 'small_unit_type.jpg') {
                                            $photo_name = 'small_unit_type_'.$unit_type->thumbnail;
                                        } else {
                                            $photo_name = $unit_type->thumbnail;
                                        } 
                                    } else {
                                        $photo_name = $unit_type->thumbnail;
                                    }

                                    $photo_url = $image_url . '/' . $photo_name;
                                @endphp
                                <div class="product-img">
                                    <img src="{{$photo_url}}" />
                                </div>

                                @php
                                    $unit_dimension[] = $unit_type->length;
                                    $unit_dimension[] = $unit_type->width;
                                    $unit_dimension[] = $unit_type->height;
                                    $unit_dimension = array_filter($unit_dimension);
                                    $unit_type_size = implode(' x ', $unit_dimension);                                  
                                @endphp
                                
                                <?php 
                                    $price = $unit_type->price;
                                    if($show_prices_tax == 1) {
                                        $setup_fee_tax = $unit_type->setup_fee_tax;
                                        $tax_amount = $price / 100 * $setup_fee_tax;
                                        $price = $tax_amount + $price;
                                    } 
                                ?>
                                <div class="product-content">   
                                    <h3>{{$unit_type_size}}</h3>
                                    <p>{{$unit_type->description}}</p>
                                    <span>${{$price}} / month</span>
                                </div>
                                @php
                                    $unit_dimension = null;
                                @endphp
                            </div>

                            <div class="product-footer">
                                @if($unit_type->hasAvailableUnits == 1)
                                <a href="{{url('/home/get_unit_data')}}" class="btn btn-info btn-rounded get_unit_data" data-method="rental" data-id="{{$unit_type->ID}}">Rent Now</a>
                                @else
                                <a href="javascript:void(0);" class="btn btn-info btn-rounded">Not Available</a>
                                @endif
                                <a href="{{url('/home/get_unit_data')}}" class="btn btn-outline-info btn-rounded btn-bordered get_unit_data" data-method="reservation" data-id="{{$unit_type->ID}}">Reserve Now For Free!</a>
                            </div>
                        </div>
                	</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="modal fade" id="rentNow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{url('customer/rent-storage/tenant-protection')}}" class="processRentNowButton" onsubmit="return false;">
                <div class="modal-header">
                    <h5 class="modal-title" id="unit-head">10 x 05</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    {{csrf_field()}}
                    
                    <div class="content-info">
                        <div class="row m-b-20">
                            <div class="col-md-5">
                                <div class="full-img">
                                    <img src="assets/images/unit-1.png" class="unit-type-img" />
                                </div>
                            </div>

                            <div class="col-md-7">
                                <p class="m-b-20 unit-description">
                                    It fits the contents of an entire family room.
                                </p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Payment options</label>

                            <div class="payment-plans">
                                <div class="form-check">
                                    <input type="radio" name="" class="form-check-input" />
                                    <label class="form-check-label">
                                        1 Month for $60.00
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Select unit</label>
                            <select name="unitData[unitID]" class="form-control bg-gray rounded-half unitsData" required>
                                <option value="A1">A1</option>
                                <option value="A2">A2</option>
                                <option value="A3">A3</option>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="unitData[unitTypeID]" value="" />
                    <input type="hidden" name="unitData[planID]" value="" />
                    <input type="hidden" name="processMethod" value="" />

                    <div class="rentMessage" style="display: none;">
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <p style="margin: 0;">
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-info btn-rounded btn-bordered" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info btn-rounded button-title">Rent Now</button>
                </div>

                <div class="loader-full" id="rent-load">
                    <div class="loader-inner">
                        <div class="lds-roller">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
