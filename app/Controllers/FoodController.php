<?php

namespace App\Controllers;

use App\Models\FoodModel;
use CodeIgniter\Controller;

class FoodController extends Controller
{
    public function index()
    {
        $model = new FoodModel();
        $data['foods'] = $model->findAll();

        return view('admin/foodManagement', $data);
    }

    public function create()
    {
        return view('admin/food_create');
    }

    public function edit($id)
    {
        $model = new FoodModel();
        $record = $model->find($id);

        // Load the view with the record data
        return view('admin/food_create', ['record' => $record]);
    }

    public function store()
    {
        $request = \Config\Services::request();

        if (!$request->getPost()) {
            return redirect()->back()->withInput()->with('errors', ['invalid request']);
        }

        if (
            !$this->validate([
                'name' => 'required',
                'description' => 'required',
                'image' => 'uploaded[image]|max_size[image,1024]|ext_in[image,jpg,jpeg,png,gif]',
                // ... (other validation rules)
            ])
        ) {
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
        $visible = $request->getPost('visible') ?? 0;

        $data = [
            'name' => $request->getPost('name'),
            'description' => $request->getPost('description'),
            'image' => $imageName,
            // Store the filename in the database
            'visible' => (int) $visible
            // ... (other fields)
        ];

        $model = new FoodModel();
        $message = 'Food Tourism was created successfully!';
        if ($isNewRecord) {
            $model->insert($data);
        } else {
            $model->update($id, $data);
            $message = 'Food Tourism was updated successfully!';
        }

        // Redirect to a page after successful creation
        return redirect()->to('views/admin/foodManagement.php')->with('messages', [$message]);

    }

    public function delete($id)
    {
        $model = new FoodModel();
        $model->delete($id);

        session()->setFlashdata('messages', ['Record was deleted successfully']);
        return $this->response->setJSON(['message' => 'Record deleted successfully']);
    }

    public function thumbnail()
    {
        $model = new FoodModel(); // Replace 'YourModel' with your actual model name

        // Retrieve records with visible=1 and sort by created_at in descending order
        $thumbnails = $model->select('id, name, image, created_at')
            ->where('visible', 1)
            ->orderBy('created_at', 'DESC')
            ->findAll();

        $data = [
            'thumbnails' => $thumbnails,
        ];

        // Calculate "Last updated" times
        foreach ($data['thumbnails'] as &$thumbnail) {
            $thumbnail['last_updated'] = $this->calculateTimeDifference($thumbnail['created_at']);
        }

        return view('foods', $data);

    }

    private function calculateTimeDifference($created_at)
    {
        $createdDateTime = new \DateTime($created_at);
        $currentDateTime = new \DateTime();
        $interval = $currentDateTime->diff($createdDateTime);

        if ($interval->y > 0) {
            return $interval->format('%y years ago');
        } elseif ($interval->m > 0) {
            return $interval->format('%m months ago');
        } elseif ($interval->d > 0) {
            return $interval->format('%d days ago');
        } elseif ($interval->h > 0) {
            return $interval->format('%h hours ago');
        } elseif ($interval->i > 0) {
            return $interval->format('%i minutes ago');
        } else {
            return $interval->format('%s seconds ago');
        }
    }

    public function view($thumbnailId)
    {
        $model = new FoodModel(); // Replace 'YourModel' with your actual model name

        $thumbnail = $model->find($thumbnailId);

        if (!$thumbnail) {
            // Handle case where thumbnail is not found
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
        }

        return view('food_view', ['thumbnail' => $thumbnail]);
    }
}