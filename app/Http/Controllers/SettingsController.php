<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $settings = Setting::where('id', 1)->first();
      if($settings==null) {
        $homepage_img = null;
        $homepage_content = null;
        $hr_color = '#222';
        $btn_color = '#222';
        $btn_hover_color = '#222';
        return view('settings')->with('homepage_img', $homepage_img)->with('homepage_content', $homepage_content)->with('hr_color', $hr_color)->with('btn_color', $btn_color)->with('btn_hover_color', $btn_hover_color);
      } else {
        $homepage_img = $settings->homepage_img;
        $homepage_content = $settings->homepage_content;
        $hr_color = $settings->hr_color;
        $btn_color = $settings->btn_color;
        $btn_hover_color = $settings->btn_hover_color;
        return view('settings')->with('homepage_img', $homepage_img)->with('homepage_content', $homepage_content)->with('hr_color', $hr_color)->with('btn_color', $btn_color)->with('btn_hover_color', $btn_hover_color);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
      $settings = Setting::where('id', 1)->first();

      if($settings==null) {
        $new_settings = new Setting;
        $new_settings->homepage_content = nl2br($request->settings_contect);
        $new_settings->hr_color = $request->settings_hr_color;
        $new_settings->btn_color = $request->settings_btn_color;
        $new_settings->btn_hover_color = $request->settings_btn_hover_color;
        $new_settings->homepage_img = $request->settings_img->move('images','home.jpg');
        $new_settings->save();
      } else {
        if($request->homepage_img==null) {
          $settings->homepage_content = nl2br($request->settings_contect);
          $settings->btn_color = $request->settings_btn_color;
          $settings->hr_color = $request->settings_hr_color;
          $settings->btn_hover_color = $request->settings_btn_hover_color;
          $settings->save();
        } else {
          $settings->homepage_content = nl2br($request->settings_contect);
          $settings->btn_color = $request->settings_btn_color;
          $settings->hr_color = $request->settings_hr_color;
          $settings->btn_hover_color = $request->settings_btn_hover_color;
          $settings->homepage_img = $request->settings_img->move('images','home.jpg');
          $settings->save();
        }
      }

      return redirect()->route('settings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
