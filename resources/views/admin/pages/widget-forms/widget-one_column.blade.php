<div class="row">
    <div class="col-md-12 form-group">
        <label class="form-label">Name</label>
        <input type="text" name="widgetSettings[name]" class="form-control bg-gray rounded-half" value="{{$name}}" />
    </div>

    <div class="col-md-12 form-group">
        <label class="form-label">Widget Title</label>
        <input type="text" name="widgetData[title]" class="form-control bg-gray rounded-half" value="{{$title}}" />
    </div>

    <div class="col-md-12 form-group">
        <div class="form-check">
            <input type="checkbox" name="widgetData[full_width]" class="form-check-input"  />
            <label class="form-check-label">Full Width</label>
        </div>
        <span class="text-gray text-sm mt-2 dsp-block">Extend the content area to the full width</span>
    </div>

    <div class="col-md-12">
        <p class="text-muted">Sections with a blank title will be ignored.</p>
    </div>

    <div class="col-md-12 form-group">
        <div class="d-flex align-items-center justify-content-between m-b-30">
            <label class="form-label">Icon Widget</label>
            <a href="#" class="btn btn-info btn-rounded add-icon-widget">Add Icon Widget</a>
        </div>

        <div class="widget-row">
            <div class="widget-box">
                <div class="form-group">
                    <label class="form-label">Section Title</label>
                    <input type="text" name="widgetData[section_title][]" class="form-control bg-gray rounded-half" />
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" name="widgetData[center_title][]" class="form-check-input"  />
                        <label class="form-check-label">Center Title</label>
                    </div>
                    <span class="text-gray text-sm mt-2 dsp-block">If unchecked, the title will be left aligned.</span>
                </div>

                <div class="form-group">
                    <label class="form-label">Icon</label>
                    <a href="javascript:void(0);" class="btn-add-icon" id="icon-1">Select Icon</a>
                    <input type="hidden" name="widgetData[icon][]" />
                </div>

                <div class="form-group">
                    <label class="form-label">Content</label>
                    <textarea name="widgetData[iconWidgetContent][]" class="summernote form-control"></textarea>
                </div>
            </div>
        </div>

        <input type="hidden" name="widgetCount" value="1" />
    </div>
</div>

<div id="iconsModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered wd-60">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vcenter">Select an Icon</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="search-field">
                    <input type="text" name="searchIcon" class="form-control bg-gray rounded-half" placeholder="Search Icons" />
                </div>

                <div class="icons-list">
                    <div class="icon-list-demo row">
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class=""></i> Remove</div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-address-book"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-address-card"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-adjust"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-align-center"></i> </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-align-justify"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-align-left"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-align-right"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-ambulance"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-american-sign-language-interpreting"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-anchor"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-angle-double-down"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-angle-double-left"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-angle-double-right"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-angle-double-up"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-angle-down"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-angle-left"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-angle-right"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-angle-up"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-archive"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-arrow-circle-down"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-arrow-circle-left"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-arrow-circle-right"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-arrow-circle-up"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-arrow-down"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-arrow-left"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-arrow-right"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-arrow-up"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-arrows-alt"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-assistive-listening-systems"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-asterisk"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-at"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-audio-description"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-backward"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-balance-scale"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-ban"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-barcode"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-bars"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-bath"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-battery-empty"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-battery-full"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-battery-half"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-battery-quarter"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon "><i class="fa fa-battery-three-quarters"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-bed"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-beer"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-bell"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-bell-slash"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-bicycle"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-binoculars"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-birthday-cake"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-blind"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-bold"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-bolt"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-bomb"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-book"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-bookmark"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-braille"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-briefcase"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-bug"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-building"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-bullhorn"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-bullseye"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-bus"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-calculator"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-calendar"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-camera"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-camera-retro"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-car"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-caret-down"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-caret-left"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-caret-right"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-caret-up"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-cart-arrow-down"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-cart-plus"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-certificate"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-check"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-check-circle"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-check-square"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-chevron-circle-down"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-chevron-circle-left"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-chevron-circle-right"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-chevron-circle-up"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-chevron-down"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-chevron-left"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-chevron-right"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-chevron-up"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-child"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-circle"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-circle-notch"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-clipboard"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-clone"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-cloud"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-code"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-coffee"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-cog"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-cogs"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-columns"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-comment"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-comments"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-compass"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-compress"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-copy"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-copyright"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-credit-card"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-crop"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-crosshairs"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-cube"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-cubes"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-cut"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-database"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-deaf"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-desktop"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-diagnoses"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-download"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-edit"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-eject"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-ellipsis-h"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-ellipsis-v"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-envelope"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-envelope-open"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-envelope-square"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-eraser"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-exclamation"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-exclamation-circle"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-exclamation-triangle"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-expand"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-eye"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-eye-slash"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-fax"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-female"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-fighter-jet"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-file"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-film"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-filter"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-fire"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-fire-extinguisher"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-flag"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-flag-checkered"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-flask"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-folder"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-folder-open"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-font"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-forward"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-gamepad"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-gavel"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-genderless"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-gift"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-globe"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-graduation-cap"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-h-square"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-hashtag"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-headphones"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-heart"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-heartbeat"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-history"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-home"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-hourglass"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-hourglass-end"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-hourglass-half"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-hourglass-start"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-i-cursor"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-id-badge"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-id-card"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-image"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-inbox"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-indent"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-industry"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-info"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-info-circle"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-italic"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-key"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-language"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-laptop"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-leaf"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-life-ring"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-link"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-lira-sign"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-list"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-list-alt"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-list-ol"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-list-ul"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-location-arrow"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-lock"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-low-vision"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-magic"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-magnet"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-male"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-map"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-map-marker"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-map-pin"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-map-signs"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-mars"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-mars-double"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-mars-stroke"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-mars-stroke-h"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-mars-stroke-v"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-medkit"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-mercury"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-microchip"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-microphone"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-microphone-slash"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-minus"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-minus-circle"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-minus-square"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-mobile"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-motorcycle"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-mouse-pointer"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-music"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-neuter"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-object-group"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-object-ungroup"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-outdent"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-paint-brush"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-paper-plane"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-paperclip"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-paragraph"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-paste"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-pause"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-pause-circle"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-paw"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-percent"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-phone"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-phone-square"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-plane"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-play"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-play-circle"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-plug"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-plus"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-plus-circle"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-plus-square"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-podcast"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-power-off"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-print"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-puzzle-piece"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-qrcode"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-question"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-question-circle"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-quote-left"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-quote-right"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-random"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-recycle"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-registered"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-reply"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-reply-all"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-retweet"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-road"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-rocket"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-rss"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-rss-square"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-save"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-search"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-search-minus"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-search-plus"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-server"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-share"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-share-alt"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-share-alt-square"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-share-square"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-ship"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-shipping-fat"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-shopping-bag"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-shopping-basket"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-shopping-cart"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-shower"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-sign-language"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-signal"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-sitemap"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-sort"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-sort-down"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-sort-up"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-space-shuttle"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-spinner"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-square"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-star"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-star-half"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-step-backward"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-step-forward"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-stethoscope"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-sticky-note"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-stop"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-stop-circle"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-street-view"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-strikethrough"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-subscript"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-subway"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-suitcase"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-superscript"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-table"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-tablet"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-tag"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-tags"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-tasks"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-taxi"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-terminal"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-text-height"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-text-width"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-th"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-th-large"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-th-list"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-thermometer"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-thermometer-empty"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-thermometer-full"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-thermometer-half"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-thermometer-quarter"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-thermometer-three-quarters"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-thumbs-down"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-thumbs-up"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-times"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-times-circle"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-tint"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-toggle-off"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-toggle-on"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-trademark"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-train"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-transgender"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-transgender-alt"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-trash"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-tree"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-trophy"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-truck"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-tty"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-tv"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-umbrella"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-underline"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-undo"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-universal-access"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-university"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-unlink"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-unlock"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-unlock-alt"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-upload"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-user"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-user-circle"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-user-md"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-user-plus"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-user-secret"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-user-times"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-users"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-venus"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-venus-double"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-venus-mars"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-vial"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-vials"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-volume-up"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-wheelchair"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-wifi"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-window-close"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-window-maximize"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-window-minimize"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-window-restore"></i></div>
                        <div class="col-xl-4 col-lg-4 col-md-6 f-icon"><i class="fa fa-wrench"></i></div>
                    </div>
                </div>

                <input type="hidden" name="targetIcon" value="" />
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>