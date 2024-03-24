<?php

namespace App\Controllers;

use App\Models\UserModel;


class DataManagement extends BaseController
{
      public function index()
    {
        //echo view('profile');
        return view('/admin/dataManagement.php');

    }
}