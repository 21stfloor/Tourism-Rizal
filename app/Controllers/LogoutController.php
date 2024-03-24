<?php

namespace App\Controllers;

use App\Models\UserModel;


class LogoutController extends BaseController

{
  public function index()
{
    $data = [];

    $session = session();
    $session->destroy();
    return redirect()->to('/');


}
}
