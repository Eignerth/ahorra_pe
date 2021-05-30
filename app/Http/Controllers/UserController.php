<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>['required','string'],
            'email'=>['required','email','unique:users,email'],
            'password'=>['required','min:8']

        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>1,'response'=>$validator->errors()]);
        }
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
        return response()->json(['status'=>0,'response'=>$user]);
    }
}
