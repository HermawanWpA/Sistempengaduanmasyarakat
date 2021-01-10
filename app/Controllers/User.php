<?php namespace App\Controllers;

class User extends BaseController
{
    public function index()

    {
        $data['title'] = 'My Profil';
        return view('user/index', $data);
    }


    //--------------------------------------------------------------------

}
