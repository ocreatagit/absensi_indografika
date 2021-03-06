<?php

class loginController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return View::make('login');
    }

    public function login() {
        $data = Input::all();
        $rules = array(
            'usernm' => 'required',
            'password' => 'required',
        );
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return Redirect::to('login')->withInput(Input::except('password'))->withErrors($validator);
        } else {
            $usernm = Input::get('usernm');
            $passwd = Input::get('password');

            $sql = "SELECT * FROM mk01 WHERE usernm = " . $usernm;
            $kar = DB::select(DB::raw($sql));
            if (!empty($kar)) {
                if ($kar[0]->passwd == $passwd) {
                    Session::put('user.idkar', $kar[0]->idkar);
                    Session::put('user.nama', $kar[0]->nama);
                    Session::put('user.tipe', $kar[0]->tipe);
                    return Redirect::to('master/jamkerja');
                }
            }
            return Redirect::to('login');
        }
    }

    public function logout() {        
        Session::forget('user');
        return Redirect::to('/');
    }


}
