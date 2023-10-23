<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\roster;


class DashboardController extends Controller
{
    public function view()
    {
        $roster = roster::all();
        $students = student::all();
        return view('dashboard', [
            'students' => $students,
            'roster' => $roster,
        ]);
    }
    public function lesson($id)
    {
        $roster = roster::find($id);
        return view('lesson', [
            'students' => null,
            'roster' => $roster,
        ]);
    }
}