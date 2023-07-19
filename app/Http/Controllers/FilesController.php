<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorSVG;

class FilesController extends Controller
{
    public function barcode($type, $code)
    {
        $bc = new BarcodeGeneratorSVG();
        return response($bc->getBarcode($code, $bc::TYPE_CODE_39))
            ->header('Content-Type', 'image/svg+xml');
    }
}
