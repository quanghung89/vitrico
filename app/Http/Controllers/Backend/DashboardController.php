<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\RepositoryEloquent\BaseRepository;
class DashboardController extends Controller
{

    public function index()
    {
        return view('backend.dashboard.index');
    }
}
