<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserFestivalController extends Controller
{
    public function index()
    {
        return view('layouts.user-festivals');
    }
}