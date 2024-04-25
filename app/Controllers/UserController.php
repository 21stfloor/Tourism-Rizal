<?php


namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        return view('/admin/dataManagement.php', $data);
    }

    public function create()
    {
        return view('admin/user_create');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $record = $model->find($id);

        // Load the view with the record data
        return view('admin/user_create', ['record' => $record]);
    }

    public function store()
    {
        $request = \Config\Services::request();

        if (!$request->getPost()) {
            return redirect()->back()->withInput()->with('errors', ['Invalid request']);
        }

        if (!$this->validate([
            'name' => 'required',
            'email' => 'required'
        ])) {
            $errors = $this->validator->getErrors();
            // If validation fails, redirect back with errors
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $id = $request->getPost('id');
        $isNewRecord = true;
        if ($id) {
            $isNewRecord = false;
        }

        if($isNewRecord && $request->getPost('password') == null){
            return redirect()->back()->withInput()->with('errors', ['Password is required!']);
        }

        $model = new UserModel();
        $existingEmail = $request->getPost('email');
        $existingName = $request->getPost('name');

        $data = [
            'name' => $existingName,
            'email' => $existingEmail
        ];

        $password = $request->getPost('password');
        if($password != null && !empty(trim($password))){
            $password = $request->getPost('password');
            $password_pattern = '/^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.{8,})/';

            if (preg_match($password_pattern, $password)) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $data['password'] = $hashed_password;
            } else {
                return redirect()->back()->withInput()->with('errors', ["Password must be at least 8 characters long, contain at least one special symbol (!@#$%^&*), and at least one uppercase letter."]);
            }
        }

        $userModel = new UserModel();

        // Check if user exists with the given email
        if ($isNewRecord && $userModel->userExistsByEmail($existingEmail)) {
            $error = 'User with email ' . $existingEmail . ' already exists.';
            session()->setFlashdata('errors', [$error]);
            return redirect()->back()->withInput()->with('errors', [$error]);
        } 
        
        if(!$isNewRecord){
            $previousEmail = $request->getPost('previousEmail');
            if($userModel->userExistsByEmail($existingEmail) && $existingEmail != $previousEmail){
                $error = 'User with email ' . $existingEmail . ' already exists.';
                session()->setFlashdata('errors', [$error]);
                return redirect()->back()->withInput()->with('errors', [$error]);
            }
        }

        $message = 'User was created successfully!';
        if (!$isNewRecord) {
            $model->update($id, $data);
            $message = 'User was updated successfully!';
        } else {
            $model->insert($data);
        }

        // Redirect to a page after successful creation
        return redirect()->to('views/admin/dataManagement.php')->with('messages', [$message]);
    }

    public function delete($id)
    {
        $model = new UserModel();
        $user = $model->find($id);
        $email = $_SESSION['email'];
        if($email == $user['email']){
            session()->setFlashdata('errors', ['It is not allowed to delete your own account!']);
            return $this->response->setJSON([]);
        }

        $model->delete($id);

        session()->setFlashdata('messages', ['Record was deleted successfully']);
        return $this->response->setJSON(['message' => 'Record deleted successfully']);
    }

    public function view($id)
    {
        $model = new UserModel(); // Replace 'YourModel' with your actual model name

        $user = $model->find($id);

        if (!$user) {
            // Handle case where thumbnail is not found
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
        }

        return view('user_view', ['user' => $user]);
    }
}
