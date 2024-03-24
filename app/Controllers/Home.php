<?php

namespace App\Controllers;

use App\Models\NewsModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new NewsModel(); // Replace 'YourModel' with your actual model name

        // Retrieve records with visible=1 and sort by created_at in descending order
        $thumbnails = $model->select('id, name, image, created_at, description')
            ->where('visible', 1)
            ->orderBy('created_at', 'DESC')
            ->findAll();

        $data = [
            'thumbnails' => $thumbnails,
        ];

        // Calculate "Last updated" times
        foreach ($data['thumbnails'] as &$thumbnail) {
            $thumbnail['last_updated'] = $this->calculateTimeDifference($thumbnail['created_at']);

            // Split the text into an array of words
            $words = explode(' ', $thumbnail['description']);

            // Keep the first 100 words
            $truncatedWords = array_slice($words, 0, 100);

            // Join the words back together to form the truncated text
            $thumbnail['short_description'] = implode(' ', $truncatedWords);
        }

        return view('index', $data);

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
        $model = new NewsModel(); // Replace 'YourModel' with your actual model name

        $thumbnail = $model->find($thumbnailId);

        if (!$thumbnail) {
            // Handle case where thumbnail is not found
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
        }

        return view('news_view', ['thumbnail' => $thumbnail]);
    }

}