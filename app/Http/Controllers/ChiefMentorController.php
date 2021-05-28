<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class ChiefMentorController extends Controller
{
    public function index()
    {
        $chiefmentor = DB::table('Chief_Mentor')->get();
        return view('Chief_Mentor.index',['Chief_Mentor' => $chiefmentor]);
    }
}
