<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Controller;

class NewsController extends Controller
{
    public function index()
    {
        $model = new NewsModel();
        $data['news'] = $model->findAll();

        return view('admin/newsManagement', $data);
    }

    public function create()
    {
        return view('admin/news_create');
    }

    public function edit($id)
    {
        $model = new NewsModel();
        $record = $model->find($id);

        // Load the view with the record data
        return view('admin/news_create', ['record' => $record]);
    }

    public function store()
    {
        $request = \Config\Services::request();

        if(!$request->getPost()){
            return redirect()->back()->withInput()->with('errors', ['invalid request']);
        }

        if (!$this->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'uploaded[image]|max_size[image,1024]|ext_in[image,jpg,jpeg,png,gif]',
            // ... (other validation rules)
        ])) {
            // If validation fails, redirect back with errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $id = $request->getPost('id');
        $isNewRecord = true;
        if ($request->getPost('id')) {
            $isNewRecord = false;
        }

        $image = $request->getFile('image');
        $imageName = $image->getRandomName();
        
        // Configure the upload path
        $uploadPath = './public/uploads/images/';
        $image->move($uploadPath, $imageName); // Move the image to the target directory
        $visible = $request->getPost('visible')??0;

        $data = [
            'name' => $request->getPost('name'),
            'description' => $request->getPost('description'),
            'image' => $imageName, // Store the filename in the database
            'visible' => (int)$visible
            // ... (other fields)
        ];

        $model = new NewsModel();
        $message = 'News was created successfully!';
        if($isNewRecord){            
            $model->insert($data);
        }
        else{
            $model->update($id, $data);
            $message = 'News was updated successfully!';
        }

        // Redirect to a page after successful creation
        return redirect()->to('views/admin/newsManagement.php')->with('messages', [$message]);
        
    }

    public function delete($id)
    {
        $model = new NewsModel();
        $model->delete($id);

        session()->setFlashdata('messages', ['Record was deleted successfully']);
        return $this->response->setJSON(['message' => 'Record deleted successfully']);
    }
}
