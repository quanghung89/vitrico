<?php


namespace App\Interfaces;


use Illuminate\Http\Request;

interface NewsInterface extends BaseInterface
{
    public function listNew();

    public function getAllNews();

    public function createNews(Request $request);

    public function findNewsId($id);

    public function updateNews(Request $request, $id);

    public function deleteNews($id);

    public function getNewById($id);

    public function representative();

}
