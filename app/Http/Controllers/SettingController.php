<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Traits\AttachFilesTrait;

class SettingController extends Controller
{
    use AttachFilesTrait;
    public function index()
    {
        $collection = Setting::all();
        // return $collection;
        $setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });

        return view('pages.setting.index', $setting);
    }
    public function update(Request $request)
    {
        try {
            $info = $request->except('_token', '_method', 'logo');
            foreach ($info as $key => $value) {
                Setting::where('key', $key)->update(['value' => $value]);
            }
            //            $key = array_keys($info);
            //            $value = array_values($info);
            //            for($i =0; $i<count($info);$i++){
            //                Setting::where('key', $key[$i])->update(['value' => $value[$i]]);
            //            }
            if ($request->hasFile('logo')) {
                $logo_name = $request->file('logo')->getClientOriginalName();
                $file = $request->file('logo');
                Setting::where('key', 'logo')->update(['value' => $logo_name]);
                $this->uploadFile($file, $logo_name, 'logo');
            }
            toastr()->success(trans('messages.Update'));
            return back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
