<?php
namespace App\Http\Controllers;
use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GoalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $goals = Goal::where('user_id',$user_id)->get();
        return \response()->json(['status'=>0,'response'=>$goals]);     
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'description'=>['required','max:20'],
            'total'=>['required','numeric'],
            'date_final'=>['date'],
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>1,'response'=>$validator->errors()]);
        }
        $user_id = Auth::user()->id;
        $goal = new Goal();
        $goal->user_id = $user_id;
        $goal->description=$request->description;
        $goal->total=$request->total;
        $goal->date_final=$request->date_final;
        $goal->save();
        return response()->json(['status'=>0,'response'=>$goal]);
    }
}
