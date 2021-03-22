<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use Illuminate\Http\Request;
use DB as DBraw;
use App\Utils\GeneralUtils;

class AdminController extends Controller
{
    public function adminlogin(Request $request) {
        $data = $request->validate([
            'password' => 'required',
            'email' => 'required|email',
        ]);

        $email = $request->input('email'); 
        $passwd = $request->input('password');
        $sel_query = "SELECT * FROM admins where adm_pwd = '" . $passwd . "' AND adm_email = '" . $email . "';";
        $res_query = DBraw::select($sel_query);
        $res_query = json_decode(json_encode($res_query), true);
        if (count($res_query)) {
            $res = $res_query[0];
            $token = GeneralUtils::gen_adm_LoginToken();
            error_log($token);
        if (GeneralUtils::update_adm_Token($token, $res['adm_id'])) {
            $request->session()->put('ssiapp_adm', true);
            $request->session()->put('ssiapp_adm_id', $res['adm_id']);
            $request->session()->put('ssiapp_adm_email', $res['adm_email']);
            $request->session()->put('ssiapp_adm_name', $res['adm_name']);
            $request->session()->put('ssiapp_adm_token', $token);
            return \redirect('admin_dashboard');
                           }   
        }
        $request->session()->flash('msg','wrong email password');
        return redirect('adminlogin');
       }

       /**
        * Admin logout session code
        */

    public function adminlogout(Request $request)
    {
       if ($request->session()->has('ssiapp_adm')) {
          $request->session()->forget(['ssiapp_adm', 'ssiapp_adm_id', 'ssiapp_adm_token']);
        } 
        return \redirect('/adminlogin');
    }

  /**
   * Admin Login page
   */
   
     public function Adminloginpage()
     {
        return view('page-login');
     }



}
