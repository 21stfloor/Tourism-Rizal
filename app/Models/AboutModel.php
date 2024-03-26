<?php namespace App\Models;

use CodeIgniter\Model;

class AboutModel extends Model
{
    protected $table = 'aboutus'; // Assuming 'pages' is the table name
    protected $primaryKey = 'id';
    protected $allowedFields = ['content'];

    public function getAbout()
    {
        // Assuming '1' is the id of the about us page
        $aboutPage = $this->first();

        return $aboutPage ? $aboutPage : [];
    }

    public function updateOrCreateAboutContent($content)
    {
        $aboutPage = $this->first();

        if ($aboutPage) {
            // If about page exists, update the content
            $aboutPage['content'] = $content;
            $this->save($aboutPage);
        } else {
            // If about page doesn't exist, create a new record
            $this->insert(['content' => $content]);
        }
    }

    public function updateAboutContent($content)
    {
        $aboutPage = $this->find(1);

        if ($aboutPage) {
            // If about page exists, update the content
            $aboutPage->content = $content;
            $this->save($aboutPage);
        }
    }
}
