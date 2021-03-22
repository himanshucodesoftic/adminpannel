<?php
namespace App\Utils;

use App\Defines\CartDefines;
use App\Defines\MiscDefines;
use DB as DBraw;
use Illuminate\Support\Facades\DB;
use Spipu\Html2Pdf\Html2Pdf;

?>
<?php

class GeneralUtils
{

    public static function gen_adm_LoginToken()
    {
        $prefix = 'adm-';
        return uniqid($prefix, true);
    }

    
    public static function update_adm_Token($token, $adm_id)
    {
        DB::beginTransaction();
        try {
            DB::update('update admins set adm_login_session = \'' . $token . '\' where adm_id =' . $adm_id);
            DB::commit();
            return true;
        } catch (\Exception $ex) {
            DB::rollback();
            return false;
        }
    }



}


?>