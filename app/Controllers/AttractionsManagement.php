<?php

namespace App\Controllers;

use App\Models\UserModel;


class AttractionsManagement extends BaseController
{
      public function index()
    {
      //echo view('profile');
      return view('/admin/attractionsManagement.php');

    }
}
