<?php

class User {

    public static function loginCheck($tipe, $idmenu = FALSE) {
        if (Session::has('user') && $idmenu) {
            $user = Session::get('user');
            if (in_array($user['tipe'], $tipe)) {
                $sql = "SELECT * FROM `mm02` WHERE mm01_id = $idmenu AND mk01_id = " . $user["idkar"];
                $usermatrik = DB::select(DB::raw($sql));
                if (count($usermatrik) > 0) {
                    return TRUE;
                } else {
                    //redirect ke peringatan akses halaman
                    print_r("anda tidak berhak mengakses halaman $idmenu, kalo mau membukanya bayar dulu");
                    exit;
                }
            }
        }
        return Redirect::to('login');
    }

}
