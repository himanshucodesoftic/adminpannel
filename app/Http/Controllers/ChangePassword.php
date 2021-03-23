<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use DB as DBraw;
class ChangePassword extends Controller
{
    public function show_edit_info(Request $request){
        // if (!$request->session()->has('ssiapp_rec_id')) {
        //     return \redirect('/login')->withErrors(['error_reason' => 'Session Don\'t exist']);
        // }
// dd($request);
        $sel_query = "SELECT * FROM users WHERE users.id = " . $request->session()->get('ssiapp_adm_id');
        $res_query = DBraw::select($sel_query);
        error_log($sel_query);
        $res_query = json_decode(json_encode($res_query), true);
        if (count($res_query)) {
            $res = $res_query[0];

            $rec_obj = array(
                'id' => $res['id'],
                // 'name' => $res['r_name'],
              
            );
        }else{
            $rec_obj = array();
        }
        return view('change_password',compact(['rec_obj']));
    }


    public function updatePassword(Request $request,$recid){

        $request->validate([
            
            'password'          =>      'required|min:6',
            'confirm_password'  =>      'required|same:password',

        ]);
        // dd($request);
        $id = $recid;
        $input = $request->all();
        DB::beginTransaction();
        try{
            DB::table('admins')->where('adm_id', $recid)->update([
                'adm_pwd' => $input['password'],
            ]);
        
            DB::commit();

            return redirect('admin_dashboard');
        }catch (\Exception $ex) {
            DB::rollback();
            $res['res'] = 'FAIL';
            $res['error'] = $ex->getMessage();

            return response()->json($res);
        }
        
    }

}
