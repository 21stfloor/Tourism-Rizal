<?php

namespace App\Controllers;
use App\Models\AboutModel;

class AboutUsController extends BaseController
{
    public function index() {
        // Load model
        $aboutModel = new AboutModel();

        // Get about us content from model
        $data = $aboutModel->getAbout();

        // Load view
        return view('about_us', ['record'=>$data]);
    }

    public function store()
    {
        // Load model
        $aboutModel = new AboutModel();

        // Get the content from POST request
        $content = $this->request->getPost('content');

        // Update or insert the content
        $aboutModel->updateOrCreateAboutContent($content);

        // Redirect back to the about us page
        return redirect()->to(site_url('aboutus'));
    }

    public function edit()
    {
        // Load model
        $aboutModel = new AboutModel();

        // Get about us content from model
        $data = $aboutModel->getAbout();

        // Load edit view
        return view('admin/about_us_manage', ['record' => $data]);
    }

    public function update()
    {
        // Load model
        $aboutModel = new AboutModel();

        // Get the content from POST request
        $content = $this->request->getPost('content');

        // Update the content
        $aboutModel->updateAboutContent($content);

        // Redirect back to the about us page
        return redirect()->to(site_url('about'));
    }
}
