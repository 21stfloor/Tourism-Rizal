<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
  
class ProfileController extends Controller
{
    public function index()
    {
        $session = session();
        return view('profile');
        echo "Hello : ".$session->get('name');
    }
    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/');

    }



}
