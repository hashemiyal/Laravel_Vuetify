<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
   
   public function index(){
   	$user=new User();
    return response($user->all()[0]);
   }
   public function update(Request $request,$id){
    $data=$request->validate([
    "name"=>"required|string",
    "email"=>"required|string",
    "position"=>"required|string"
    ]);
    $users=new User();
    $user=$users->find($id);
    $user->name=$data['name'];
    $user->position=$data['position'];
    $user->email=$data['email'];
    $user->save();
    return response(User::all()[0]);
   }
   public function store( Request $request)
   {
     $profile=$request->profile;
     $cover=$request->cover;
     $prpath=$profile->store('images');
     $cvpath=$cover->store('images');
     $users=new User();
     $user=$users->find(1);
     $user->profileUrl=$prpath;
     $user->coverUrl=$cvpath;
     $user->save();
     return response(User::all()[0]);
   }
   public function login(Request $request)
   {
     $data=$request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response('credential does not match');
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
        ]);
        
   }
  
}
