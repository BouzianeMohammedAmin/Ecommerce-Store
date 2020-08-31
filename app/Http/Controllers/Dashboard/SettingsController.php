<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

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

        return  view('dashboard.settings.shippings.edit', compact('shippingMethod'));
    }
    public function updateShippingMethod($id)
    {
    }
}