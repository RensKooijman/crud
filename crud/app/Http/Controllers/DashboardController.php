<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\roster;
use App\Models\abscent;
use App\Modals\klas;


class DashboardController extends Controller
{
    public function view()
    {
        $roster = roster::with('klas')->get();
        return view('dashboard', [
            'roster' => $roster,
        ]);
    }

    public function lesson($id)
    {
        $roster = roster::find($id);
        $students = student::where('klas_id', $id)->get();
        return view('lesson', [
            'id' => $id,
            'students' => $students,
            'roster' => $roster,
        ]);
    }

    public function abscence(Request $request)
    {
        $firstName = $request->query('firstName', '');
        $lastName = $request->query('lastName', '');
        $subject = $request->query('subject', '');
        $klas = $request->query('klas', '');

        $abscent = abscent::whereHas('student', function ($query) use ($firstName, $lastName, $klas) {
            $query->where(function ($subquery) use ($firstName, $lastName) {
                $subquery->where('first-name', 'like', "%$firstName%")
                ->where('last-name', 'like', "%$lastName%");
            })->whereHas('klas', function ($subquery) use ($klas) {
                $subquery->where('name', 'like', "%$klas%");
            });
        })->whereHas('roster', function ($query) use ($subject) {
            $query->where('subject', 'like', "%$subject%");
        })->get();

        return view('abscence',[
            'abscents' => $abscent,
        ]);
    }

    public function filter(Request $request)
    {
        $incommingArray = $request->all();
        return redirect()->route('abscence', [
            'firstName' => $incommingArray['firstName'],
            'lastName' => $incommingArray['lastName'],
            'subject' => $incommingArray['subject'],
            'klas' => $incommingArray['klas'],
        ]);
    }

    public function submit(Request $request, $id)
    {
        $incommingArray = $request->all();
        foreach($incommingArray['attendance'] as $studentId => $state){
            if($state == 'afwezig'){
                abscent::insert(['student_id' => $studentId, 'roster_id' => $id]);
            }
        }
                    
        return redirect()->back()->with('succes', 'the attendance is placed succesfully!!');
    }

    public function deleteAbscent($id)
    {
        abscent::where('id', $id)->delete();
        return redirect()->back();
    }
}