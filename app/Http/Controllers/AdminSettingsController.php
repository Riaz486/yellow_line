<?php

namespace App\Http\Controllers;

use App\Models\AppFunctions; 
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use DB;
use Auth;

class AdminSettingsController extends Controller {
    public function update_settings_meta($meta_key = null, $meta_value = null, $postID = 0) {
        $settingsMetaData = DB::table('settings_meta')->where(array('meta_key' => $meta_key))->first();
        
        if(empty($settingsMetaData)) {
            $DBfield = array(
                'postID'     => $postID,
                'meta_key'   => $meta_key,
                'meta_value' => $meta_value
            );

            DB::table('settings_meta')->insert($DBfield);
        } else {
            $DBfield = array(
                'meta_value' => $meta_value
            );

            DB::table('settings_meta')->where(array('ID' => $settingsMetaData->ID))->update($DBfield);
        }
    }

    public function settings() {
        $data['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $data['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

        return view('admin.pages.settings')->with($data);
    }


    public function update_header_settings(Request $request) {
        $data = $request->input();
        try {
            //Get Logo file name first
            $logo = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS, 'meta_key' => 'header_logo'))->first();
            $logo = ($logo) ? $logo->meta_value : '';

            //Get Logo file name first
            $favicon = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS, 'meta_key' => 'header_favicon'))->first();
            $favicon = ($favicon) ? $favicon->meta_value : '';

            //Clear All Data First 
            DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->delete();

            // Extract Checbox values from the loop
            foreach($data['header_settings'] as $meta_key => $meta_value):
                if($meta_value == '') {
                    $meta_value = 'N/A';
                }

                $this->update_settings_meta($meta_key, $meta_value, AppFunctions::HEADER_SETTINGS);
            endforeach;

            // Saving Logo
            if($request->hasFile('header_logo')) {
                $header_logo = time().'.'.$request->header_logo->extension();  
                $request->header_logo->move(public_path('assets/uploads/logo'), $header_logo);

                $this->update_settings_meta('header_logo', $header_logo, AppFunctions::HEADER_SETTINGS);
            } else {
                $this->update_settings_meta('header_logo', $logo, AppFunctions::HEADER_SETTINGS);
            }

            // Saving Favicon
            if($request->hasFile('header_favicon')) {
                $header_favicon = time().'.'.$request->header_favicon->extension();  
                $request->header_favicon->move(public_path('assets/uploads/logo'), $header_favicon);

                $this->update_settings_meta('header_favicon', $header_favicon, AppFunctions::HEADER_SETTINGS);
            } else {
                $this->update_settings_meta('header_favicon', $favicon, AppFunctions::HEADER_SETTINGS);
            }

            return redirect('admin/settings');
        } catch (Exception $e) {
            return redirect('admin/settings/error');
        }
    }

    public function update_footer_settings(Request $request) {
        $data = $request->input();
        try {
            //Get Logo file name first
            $logo = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS, 'meta_key' => 'footer_logo'))->first();
            $logo = ($logo) ? $logo->meta_value : '';

            //Clear All Data First 
            DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->delete();

            // Extract Checbox values from the loop
            foreach($data['footer_settings'] as $meta_key => $meta_value):
                if($meta_value == '') {
                    $meta_value = 'N/A';
                }

                $this->update_settings_meta($meta_key, $meta_value, AppFunctions::FOOTER_SETTINGS);
            endforeach;


            // Saving Logo
            if($request->hasFile('footer_logo')) {
                $footer_logo = time().'.'.$request->footer_logo->extension();  
                $request->footer_logo->move(public_path('assets/uploads/logo'), $footer_logo);

                $this->update_settings_meta('footer_logo', $footer_logo, AppFunctions::FOOTER_SETTINGS);
            } else {
                $this->update_settings_meta('footer_logo', $logo, AppFunctions::FOOTER_SETTINGS);
            }

            return redirect('admin/settings');
        } catch (Exception $e) {
            return redirect('admin/settings/error');
        }
    }

    public function formProcessor(Request $request) {
        $data = $request->input();

        try {
            $DBfield  = array();
            $dataUrl  = $data['response'];
            $database = $data['processType']; 

            foreach($data['formData'] as $key => $field_value):
                if($field_value == '') {
                    $field_value = 'N/A';
                }

                $DBfield[$key] = $field_value;
            endforeach;

            if(!empty($_FILES['file']['name'])) {
                $imageName = time().'.'.$request->file->extension();  
                $request->file->move(public_path('assets/uploads/'), $imageName);

                $DBfield['file'] = $imageName;
            }

            if(isset($DBfield['title'])) {
                $slugExists = Schema::hasColumn($database, 'slug');

                if ($slugExists) {
                    $DBfield['slug'] = AppFunctions::generateUniqueSlug($DBfield['title'], $database);
                }
            }

            if($data['id'] != '') {
                DB::table($database)->where('id', $data['id'])->update($DBfield);
            } else {
                $insertID = DB::table($database)->insertGetId($DBfield);
            }

            if($dataUrl == 'async') {
                $method = 'insert';
                
                if($data['id'] != ''){
                    $insertID = $data['id'];
                    $method   = 'update';
                } 

                $response = array(
                    'status'    => 1,
                    'message'   => "Data created successfully",
                    'createdID' => $insertID,
                    'method'    => $method,
                    'data'      => $DBfield,
                    'baseUrl'   => url('admin') 
                );

                return response()->json($response);
            } else {
                return redirect('admin/' . $dataUrl);
            }
        } catch (Exception $e) {
            return redirect('admin/' . $dataUrl . '/error');
        }
    }

    public function website($page = null, $method = null, $id = null) {
        $userID = Auth::id();

        if($page == 'pages') {
            if($method == 'create') {
                $data['title']            = '';
                $data['heading_main']     = '';
                $data['content']          = '';
                $data['banner_type']      = '';
                $data['bannerFile']       = '';
                $data['meta_keywords']    = '';
                $data['meta_description'] = '';
                $data['slug']             = '';
                $data['id']               = $id;

                if($id != null) {
                    $pageData =  DB::table('pages')->where(array('ID' => $id))->get();
                
                    $data['title']            = $pageData[0]->title;
                    $data['heading_main']     = $pageData[0]->heading_main;
                    $data['content']          = $pageData[0]->content;
                    $data['banner_type']      = $pageData[0]->banner_type;
                    $data['bannerFile']       = $pageData[0]->bannerFile;
                    $data['meta_keywords']    = $pageData[0]->meta_keywords;
                    $data['meta_description'] = $pageData[0]->meta_description;
                    $data['slug']             = $pageData[0]->slug;
                }

                return view('admin.pages.create-page')->with($data); 
            } else {
                $pages = DB::table('pages')->orderBy('ID')->paginate(10);

                return view('admin.pages.pages', compact('pages'))->with(1, (request()->input('page', 1) - 1) * 5);
            } 
        }
    }

    public function create_page(Request $request) {
        $data = $request->input();
        
        try {
            $userID  = Auth::id();
            $DBfield = array();

            foreach($data['page'] as $key => $field_value):
                if($field_value == '') {
                    $field_value = 'N/A';
                }

                $DBfield[$key] = $field_value;
            endforeach;

            if(!empty($_FILES['uploadFile']['name'])) {
                $imageName = uniqid().'.'.$request->uploadFile->extension();  
                $request->uploadFile->move(public_path('assets/uploads'), $imageName);

                $DBfield['bannerFile'] = $imageName;
            }
 
            if($data['id'] == '') {
                $pageID = DB::table('pages')->insertGetId($DBfield);
            } else {
                DB::table('pages')->where(array('ID' => $data['id']))->update($DBfield);
            }

            return redirect('admin/website/pages');
        } catch (Exception $e) {
            return redirect('admin/settings/error');
        }
    }
}
