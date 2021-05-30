<?php
namespace App\Http\Controllers;
use App\Models\Movimient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MovimientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        if (isset($request->goal_id)) {
            $movimients = Goal::GetAll($user_id)->where('goal_id',$request->goal_id)->get();
            return \response()->json(['status'=>0,'response'=>$movimients]);
        }else{
            $movimients = Movimient::GetAll($user_id)->get();
            return \response()->json(['status'=>0,'response'=>$movimients]);
        }
        return \response()->json(['status'=>1,'response'=>null]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'goal_id'=>['required','exists:goals,id'],
            'type'=>['required','size:1'],
            'amount'=>['required','numeric'],
            'date'=>['date'],
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>1,'response'=>$validator->errors()]);
        }
        $movimient = new Movimient();
        $movimient->goal_id = $request->goal_id;
        $movimient->type=$request->type;
        $movimient->amount=$request->amount;
        $movimient->date=$request->date;
        $movimient->save();
        return response()->json(['status'=>0,'response'=>$movimient]);
    }
}
