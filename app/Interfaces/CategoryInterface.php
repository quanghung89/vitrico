<?php


namespace App\Interfaces;


use Illuminate\Http\Request;

interface CategoryInterface extends BaseInterface
{
    public function listsCate();

    public function getAllCategory();

    public function createCategory(Request $request);

    public function updateCategory(Request $request, $id);

    public function parentId();

    public function findCategoryId($id);

    public function deleteCategory($id);

    public function getCategoryStatus();
}
