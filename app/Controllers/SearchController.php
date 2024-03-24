<?php
// SearchController.php
namespace App\Controllers;

use App\Models\FoodModel;
use App\Models\TouristCentre;

class SearchController extends BaseController
{
    public function results()
    {
        $query = $this->request->getGet('query');

        if (!empty($query)) {
            $foodModel = new FoodModel();
            $touristCentreModel = new TouristCentre();

            $foodResults = $foodModel->like('name', $query)->findAll();
            $touristCentreResults = $touristCentreModel->like('name', $query)->findAll();

            $foodResults = array_map(function ($result) {
                $result['type'] = 'Food';
                return $result;
            }, $foodResults);

            $touristCentreResults = array_map(function ($result) {
                $result['type'] = 'Tourist Centre';
                return $result;
            }, $touristCentreResults);

            $data = [
                'results' => array_merge($foodResults, $touristCentreResults),
                'query' => $query
            ];

            // Calculate "Last updated" times
            foreach ($data['results'] as &$thumbnail) {
                $thumbnail['last_updated'] = $this->calculateTimeDifference($thumbnail['created_at']);
            }
        } else {
            $data['results'] = [];
            $data['query'] = '';
        }

        return view('search_results', $data);
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
}