<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller {
    public function index() {
        $title = 'Dashboard';
        $addtitle = '';
        return view( 'admin.dashboard.dashboard', compact( 'title', 'addtitle' ) );
    }
}