<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class UserModel extends Model{
    protected $table = 'admin_users';
    
    protected $allowedFields = [
        'name',
        'email',
        'password',
        'created_at'
    ];

    public function userExistsByEmail($email)
    {
        // Query the database to check if the user exists with the given email
        $user = $this->where('email', $email)
                     ->countAllResults();

        // If count is greater than 0, user exists, otherwise, not exists
        return $user > 0;
    }

}