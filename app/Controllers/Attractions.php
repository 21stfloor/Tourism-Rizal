<?php

namespace App\Controllers;

use App\Models\TouristCentre;
use App\Models\UserModel;


class Attractions extends BaseController
{
    public function index()
    {
        $model = new TouristCentre(); // Replace 'YourModel' with your actual model name

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

        return view('attractions', $data);

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
        $model = new TouristCentre(); // Replace 'YourModel' with your actual model name

        $thumbnail = $model->find($thumbnailId);

        if (!$thumbnail) {
            // Handle case where thumbnail is not found
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
        }

        return view('tourist_centre_view', ['thumbnail' => $thumbnail]);
    }
}