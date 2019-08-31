<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mailcontroller extends Controller
{
	public function mail(Request $request)
	{
     $message =$request->message;
   Mail::to('.com')->send(new SendMailable($message));
   
   return 'Email was sent';		
	}
    
 }
