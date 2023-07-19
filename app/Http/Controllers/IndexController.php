<?php

namespace App\Http\Controllers;

use App\Models\DispatchStatus;
use App\Models\Package;
use App\Models\PackageStatus;
use App\Models\Repack;
use App\Models\RepackStatus;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function dashboard(Request $request)
    {
        if ($request->user()->isAdmin()) {
            $package_statuses = PackageStatus::all();
            return view(
                'dashadmin',

                compact(
                    'package_statuses'
                )
            );
        } else {

            $package_statuses  = PackageStatus::all();
            return view(
                'dashboard',

                compact(
                    'package_statuses'
                )
            );
        }
    }
}
