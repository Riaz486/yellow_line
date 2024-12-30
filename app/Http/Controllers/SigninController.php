<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class SigninController extends Controller {
    public function signin() {
        $data = array();

        return view('admin.pages.login')->with($data);
    }

    public function admin_signin() {
        $data = array();
        
        return view('admin.pages.manager-login-form')->with($data);   
    }

    public function register_account() {
        $data['settingsData'] = DB::table('settings_meta')->where(array('postID' => 5))->get();
        $data['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => 6))->get();
        $data['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => 7))->get();
        $data['officeHoursData'] = DB::table('website_office_hours')->where(array('userID' => 0))->get();

        return view('pages.create-account-form')->with($data);   
    }

    public function forget_password() {
        $data['settingsData'] = DB::table('settings_meta')->where(array('postID' => 5))->get();
        $data['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => 6))->get();
        $data['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => 7))->get();
        $data['officeHoursData'] = DB::table('website_office_hours')->where(array('userID' => 0))->get();

        return view('pages.forget-password-form')->with($data);   
    }

    public function create_user() {
        $userData['password'] = Hash::make('Admin1234@@');
        $userData['username'] = 'admin';
        $userData['email'] = 'test@testmail.com';
        $userData['name'] = 'Mark' . ' ' . ' Alan';
        $userData['role'] = 'admin';
        DB::table('users')->insertGetId($userData);
    }
}
