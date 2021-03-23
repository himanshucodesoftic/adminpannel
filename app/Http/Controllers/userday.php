<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use DB as DBraw;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
class userday extends Controller
{
   public function oneday(Request $request)
   {
    if (!$request->session()->has('ssiapp_adm_id')) {
        return \redirect('/adminlogin')->withErrors(['error_reason'=>'Session Don\'t exist']);
    } 
    // $users = Carbon::now();
    $users = DB::table('users')->count();
    $date = \Carbon\Carbon::today()->subDays(1);
    $users = User::where('created_at','>=',$date)->get();
    // dd($users);
return view('oneday',['users'=>$users]);
   }

   public function sevenday(Request $request)
   {
    if (!$request->session()->has('ssiapp_adm_id')) {
        return \redirect('/adminlogin')->withErrors(['error_reason'=>'Session Don\'t exist']);
    } 
    $users = DB::table('users')->count();
    // $users = Carbon::now();
    $date = \Carbon\Carbon::today()->subDays(7);
    $users = User::where('created_at','>=',$date)->get();
    // dd($users);
return view('sevenday',['users'=>$users]);
   }

   
   public function thirtyday(Request $request)
   {
    if (!$request->session()->has('ssiapp_adm_id')) {
        return \redirect('/adminlogin')->withErrors(['error_reason'=>'Session Don\'t exist']);
    } 
    $users = DB::table('users')->count();
    // $users = Carbon::now();
    $date = \Carbon\Carbon::today()->subDays(7);
    $users = User::where('created_at','>=',$date)->get();
    // dd($users);
return view('thirtyday',['users'=>$users]);
   }


   public function oneyear(Request $request)
   {
    if (!$request->session()->has('ssiapp_adm_id')) {
        return \redirect('/adminlogin')->withErrors(['error_reason'=>'Session Don\'t exist']);
    } 
    $users = DB::table('users')->count();
    // $users = Carbon::now();
    $date = \Carbon\Carbon::today()->subDays(365);
    $users = User::where('created_at','>=',$date)->get();
    // dd($users);
return view('oneyear',['users'=>$users]);
   }
   
 

   
}
