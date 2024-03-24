<?php
// app/Controllers/ThumbnailController.php

namespace App\Controllers;

use CodeIgniter\Controller;

class ThumbnailController extends Controller
{
    public function index($tableName, $columnName, $model)
    {
        // Load necessary models, libraries, and data from the database

        $model = model($model); // Replace 'YourModel' with your actual model name
        
        // Retrieve records with visible=1 and sort by created_at in descending order
        $thumbnails = $model->select($columnName . ' as image')
            ->where('visible', 1)
            ->orderBy('created_at', 'DESC')
            ->findAll();
        
        $data = [
            'thumbnails' => $thumbnails,
        ];

        return view('thumbnails_view', $data);
    }
}
