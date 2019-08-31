<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

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
      "email"=>"required|email",
      "password"=>"required|string|min:8"
    ]);
      $finduser = DB::table('users')
                ->where('email', '=',$data['email'])->where('password','=',$data['password'])
                ->get();
        if (count($finduser)== 1) {
          return response('autheticated');  
          
        }
        return response('credintial does not match');
        
   }
  
}
