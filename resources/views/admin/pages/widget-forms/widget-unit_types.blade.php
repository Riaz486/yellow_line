<div class="row">
    <div class="col-md-12 form-group">
        <label class="form-label">Name</label>
        <input type="text" name="widgetSettings[name]" class="form-control bg-gray rounded-half" value="{{$name}}" />
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Title</label>
        <input type="text" name="widgetData[title]" class="form-control bg-gray rounded-half" value="{{$title}}" />
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Content</label>
        <textarea name="widgetData[content]" class="summernote form-control"></textarea>
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Conversion Code</label>
        <textarea name="widgetData[conversion_code]" class="form-control bg-gray rounded-half" rows="5"></textarea>
        <span class="text-gray text-sm mt-2 dsp-block">This javascript code will be executed when a customer rents a unit online. For example, paste a conversion code snippet from Google Analytics to track successful online rentals.</span>
    </div>

    <div class="col-md-12 form-group">
        <div class="form-check">
            <input type="checkbox" name="widgetData[select_unit_customers_allow]" class="form-check-input"  />
            <label class="form-check-label">Allow customers to select a unit</label>
        </div>
        <span class="text-gray text-sm mt-2 dsp-block">If unchecked the software will automatically pick the next available unit for the desired unit type.</span>
    </div>

    <div class="col-md-12 form-group">
        <div class="form-check">
            <input type="checkbox" name="widgetData[show_prices_tax]" class="form-check-input"  />
            <label class="form-check-label">Show prices with tax included</label>
        </div>
    </div>

    <div class="col-md-12 form-group">
        <div class="form-check">
            <input type="checkbox" name="widgetData[unit_left_count_status]" data-target="move_outs" class="field-check form-check-input" value="1" />
            <label class="form-check-label">
                Show text with remaining available unit count
            </label>

            <div class="inline-bottom-field">
                <div class="flex align-items-center">
                    <label>available units remaining for count to appear on website.</label>
                    <input type="number" name="widgetData[unit_left_count]" class="form-control bg-gray input-sm move_outs"  />
                </div>
            </div>
        </div>
    </div>

    <div class="form-group col-md-12">
        <label class="form-label">Layout Style</label>
        <div class="flex">
            <div class="form-check m-r-15">
                <input type="radio" name="widgetData[layout_style]" class="form-check-input" value="grid">
                <label class="form-check-label">
                    Grid
                </label>
            </div>

            <div class="form-check">
                <input type="radio" name="widgetData[layout_style]" class="form-check-input" value="list">
                <label class="form-check-label">
                    List
                </label>
            </div>
        </div>
    </div>

    <div class="form-group col-md-12">
        <label class="form-label">Unit Types</label>

        <div class="table-block">
            <div class="dataTable-wrapper">
                <div class="dataTable-container">
                    <table class="table-3 dataTable-table max-w-full w-full">
                        <thead>
                            <tr>
                                <th>Unit Type</th>
                                <th>
                                    Rent
                                    <a data-toggle="tooltip" data-placement="top" title='Show the rent now button for this unit type.'>
                                		<i class="ti-info-alt"></i>
                                	</a>

                                    <div class="btn-row text-sm">
                                        <label class="text-sm m-r-10">Select</label>
                                        <a href="javascript:void(0)" data-status="all" data-target="rent" class="select-checkbox m-r-10">All</a>
                                        <a href="javascript:void(0)" data-status="none" data-target="rent" class="select-checkbox">None</a>
                                    </div>
                                </th>
                                <th>
                                    Reserve
                                    <a data-toggle="tooltip" data-placement="top" title='Show the Reserve Now button for this unit type.'>
                                		<i class="ti-info-alt"></i>
                                	</a>

                                    <div class="btn-row text-sm">
                                        <label class="text-sm m-r-10">Select</label>
                                        <a href="javascript:void(0)" data-status="all" data-target="reserve" class="select-checkbox m-r-10">All</a>
                                        <a href="javascript:void(0)" data-status="none" data-target="reserve" class="select-checkbox">None</a>
                                    </div>
                                </th>
                                <th>
                                    Waiting List 
                                    <a data-toggle="tooltip" data-placement="top" title='If the Rent and Reserve options are not checked or the unit type has no available units, this button will be shown to allow users to add themselves to a waiting list.'>
                                		<i class="ti-info-alt"></i>
                                	</a>

                                    <div class="btn-row text-sm">
                                        <label class="text-sm m-r-10">Select</label>
                                        <a href="javascript:void(0)" data-status="all" data-target="waiting-list" class="select-checkbox m-r-10">All</a>
                                        <a href="javascript:void(0)" data-status="none" data-target="waiting-list" class="select-checkbox">None</a>
                                    </div>
                                </th>
                                <th>
                                    Contact Us 
                                    <a data-toggle="tooltip" data-placement="top" title='Show a Contact Us message instead of the other options.'>
                                		<i class="ti-info-alt"></i>
                                	</a>

                                    <div class="btn-row text-sm">
                                        <label class="text-sm m-r-10">Select</label>
                                        <a href="javascript:void(0)" data-status="all" data-target="contact-us" class="select-checkbox m-r-10">All</a>
                                        <a href="javascript:void(0)" data-status="none" data-target="contact-us" class="select-checkbox">None</a>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($units as $unit)	
                            <tr>
                                <td>
                                @php
                                    $dimensions = array($unit->length, $unit->width, $unit->height);
                                    $dimensions = implode(' x ', array_filter($dimensions));
                                @endphp
                                {{$dimensions}}
                                </td>
                                <td><div class="form-check"><input type="checkbox" name="widgetData[rent_button][]" id="{{$unit->ID}}" class="form-check-input hide-contact rent" value="{{$unit->ID}}" /></div></td>
                                <td><div class="form-check"><input type="checkbox" name="widgetData[reserve_button][]" id="{{$unit->ID}}" class="form-check-input hide-contact reserve" value="{{$unit->ID}}" /></div></td>
                                <td><div class="form-check"><input type="checkbox" name="widgetData[waiting_list_button][]" id="{{$unit->ID}}" class="form-check-input hide-contact waiting-list" value="{{$unit->ID}}" /></div></td>
                                <td><div class="form-check"><input type="checkbox" name="widgetData[contact_button][]" class="form-check-input contact-us" value="{{$unit->ID}}" /></div></td>
                            </tr>
                            <input type="hidden" name="unitID[]" value="{{$unit->ID}}" />
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>