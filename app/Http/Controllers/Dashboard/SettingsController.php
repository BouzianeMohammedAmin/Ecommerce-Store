<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingsRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use DB;

class SettingsController extends Controller
{
    public function editShippingMethod($type)
    {
        //inner outer free for shipping method 
        $shippingMethod = null;
        if ($type == 'free') {
            $shippingMethod = Setting::where('key', 'free_shipping_label')->first();
        } else if ($type == 'inner') {
            $shippingMethod = Setting::where('key', 'local_label')->first();
        } else  if ($type == 'outer') {
            $shippingMethod =  Setting::where('key', 'outer_label')->first();
        } else {
        }
        // return  $shippingMethod;

        return  view('dashboard.settings.shippings.edit', compact('shippingMethod'));
    }
    public function updateShippingMethod(ShippingsRequest $request, $id)
    {

        // validation 


        try {
            //update db

            DB::beginTransaction();

            $shippingMethod = Setting::find($id);
            $shippingMethod->update([
                'plain_value' => $request->plain_value,
            ]);

            //save trans
            $shippingMethod->value = $request->value;
            $shippingMethod->save();
            DB::commit();

            return redirect()->back()->with(["success" => "تم التحديث بنجاح"]);
        } catch (\Exception $e) {
            DB::rolback();
            return redirect()->back()->with(["error" => "هناك خطا ما "]);
        }
    }
}