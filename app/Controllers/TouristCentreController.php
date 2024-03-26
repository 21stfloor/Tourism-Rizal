<?php

namespace App\Controllers;

use App\Models\TouristCentre;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\IncomingRequest;

/**
 * @property IncomingRequest $request 
 */
class TouristCentreController extends Controller
{
    public function index()
    {
        $model = new TouristCentre();
        $data['touristCentres'] = $model->findAll();

        return view('admin/attractionsManagement', $data);
    }

    public function create()
    {
        return view('admin/tourist_create');
    }

    public function edit($id)
    {
        $model = new TouristCentre();
        $record = $model->find($id);

        // Load the view with the record data
        return view('admin/tourist_create', ['record' => $record]);
    }

    public function store()
    {
        $request = \Config\Services::request();

        if (!$request->getPost()) {
            return redirect()->back()->withInput()->with('errors', ['Invalid request']);
        }

        if (!$this->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'max_size[image,102400]|ext_in[image,jpg,jpeg,png,gif]',
            // 'image360' => 'max_size[image360,102400]|ext_in[image360,jpg,jpeg,png,gif]',
            // ... (other validation rules)
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

        $model = new TouristCentre();
        $existingImage = null;
        $existingImage360 = null;
        if (!$isNewRecord) {
            // Retrieve existing image names if it's an update operation
            $existingData = $model->find($id);
            $existingImage = $existingData['image'];
            $existingImage360 = $existingData['image360'];
        }

        // Handle regular image upload
        $image = $request->getFile('image');
        $imageName = $existingImage;
        if ($image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $uploadPath = './public/uploads/images/';
            $image->move($uploadPath, $imageName);
        }

        // Handle image360 upload
        $image360 = $request->getFile('image360');
        $image360Name = $existingImage360;
        if ($image360->isValid() && !$image360->hasMoved()) {
            $image360Name = $image360->getRandomName();
            $uploadPath = './public/uploads/images360/';
            $image360->move($uploadPath, $image360Name);
        }

        $visible = $request->getPost('visible') ?? 0;

        $data = [
            'name' => $request->getPost('name'),
            'description' => $request->getPost('description'),
            'image' => $imageName, // Store the regular image filename in the database
            'image360' => $image360Name, // Store the image360 filename in the database
            'visible' => (int) $visible
            // ... (other fields)
        ];

        $message = 'Tourist Centre was created successfully!';
        if (!$isNewRecord) {
            $model->update($id, $data);
            $message = 'Tourist Centre was updated successfully!';
        } else {
            $model->insert($data);
        }

        // Redirect to a page after successful creation
        return redirect()->to('views/admin/attractionsManagement.php')->with('messages', [$message]);
    }

    public function delete($id)
    {
        $model = new TouristCentre();
        $model->delete($id);

        session()->setFlashdata('messages', ['Record was deleted successfully']);
        return $this->response->setJSON(['message' => 'Record deleted successfully']);
    }
}
