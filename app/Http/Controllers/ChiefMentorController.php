<?php


namespace App\Http\Controllers;


use App\Models\Chief_Mentor;
use Illuminate\Support\Facades\DB;

class ChiefMentorController extends Controller
{
    public function index()
    {
        $chief_mentor = Chief_Mentor::all();
        return view('chiefmentor.index',compact('chief_mentor'));
    }
}
