<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {
    public function index() {
        $title = 'Dashboard';
        $addtitle = '';
        if ( Auth::user()->role == 'Developer' ) {
            return view( 'admin.dashboard.dashboard', compact( 'title', 'addtitle' ) );
        } elseif ( Auth::user()->role == 'QA Tester' ) {
            return view( 'admin.dashboard.qa_tester_dashboard', compact( 'title', 'addtitle' ) );
        } elseif ( Auth::user()->role == 'Project Manager' ) {
            $projectCount = Projects::getProjectsCount();
            $userCount = User::getUserCount();
            $taskCount = Tasks::getTaskCount();
            return view( 'admin.dashboard.manager_dashboard', compact( 'title', 'addtitle', 'projectCount', 'userCount', 'taskCount' ) );
        } elseif ( Auth::user()->role == 'Team Lead' ) {
            return view( 'admin.dashboard.team_lead_dashboard', compact( 'title', 'addtitle' ) );
        } elseif ( Auth::user()->role == 'Designer' ) {
            return view( 'admin.dashboard.designer_dashboard', compact( 'title', 'addtitle' ) );
        } else {
            return view( 'admin.dashboard.administator' );
        }
    }
}