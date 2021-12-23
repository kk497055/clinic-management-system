<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceFeeCategory;

class ServiceFeeCategoryController extends Controller
{
    //
    public function ServiceFeeCategoryView() {
        $data['allData'] = ServiceFeeCategory::all();
        return view('backend.setup.view_servicefeecategory', $data);
    }

    public function ServiceFeeCategoryAdd() {
        return view('backend.setup.add_servicefeecategory');
    }
}
