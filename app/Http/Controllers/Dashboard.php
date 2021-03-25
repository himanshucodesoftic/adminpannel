<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use DB as DBraw;

class Dashboard extends Controller
{
    public function show(Request $request)
    {
        if (!$request->session()->has('ssiapp_adm_id')) {
            return \redirect('/adminlogin')->withErrors(['error_reason'=>'Session Don\'t exist']);
        } 
        $data = DB::table('users')->count();
$data=User::all();
return view('admin_dashboard',['members'=>$data]);
    }

    public function destroy($id) {
        DB::delete('delete from users where id = ?',[$id]);
     return redirect('admin_dashbaord');
     }
   
     public function edit(Request $request,$id) {
        $name = $request->input('stud_name');
        DB::update('update users set first_name = ? where id = ?',[$name,$id]);
    
     }

     public function showpage(Request $request,$id) {
        if (!$request->session()->has('ssiapp_adm_id')) {
            return \redirect('/adminlogin')->withErrors(['error_reason'=>'Session Don\'t exist']);
        } 
        $users = User::find($id);
        return view('edit',['users'=>$users]);
     }




     public function update_product(Request $request)
    {
        // dd($request);
       
        $data=User::find($request->id);
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->email=$request->email;
        $data->password=$request->password;
        $data->gender=$request->gender;
        // $data->profile_pic=$request->profile_pic;
        $data->address=$request->address;
        $data->city=$request->city;
        $data->state=$request->state;
        $data->pincode=$request->pincode;
        
        

        $data->countryCode=$request->countryCode;
        $data->phone=$request->phone;
        $data->save();
        return redirect('admin_dashboard');
        }

    }
