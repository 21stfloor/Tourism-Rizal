<?php

namespace App\Controllers;

use App\Models\UserModel;


class FoodManagement extends BaseController
{
      public function index()
    {
        $data = [];
        
        //echo view('profile');
        return view('/admin/foodManagement.php');


    }
}
