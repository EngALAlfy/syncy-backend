<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Laracasts\Flash\Flash;
use Spatie\Activitylog\Models\Activity;

class SettingsController extends Controller
{
    function index()
    {
        return view("admin.settings.index");
    }

    function clearCache()
    {
        $output = "";
        Artisan::call('cache:clear');
        $output .= "<br/>";
        $output .= Artisan::output();
        Artisan::call('view:clear');
        $output .= "<br/>";
        $output .= Artisan::output();
        Artisan::call('route:clear');
        $output .= "<br/>";
        $output .= Artisan::output();
        Artisan::call('config:clear');
        $output .= "<br/>";
        $output .= Artisan::output();
        Flash::success($output);

        return redirect()->back();
    }
}
