<?php

namespace App\RepositoryEloquent;

use App\Interfaces\CategoryInterface;
use App\RepositoryEloquent\BaseRepository;
use Illuminate\Http\Request;

class CategoryRepository extends BaseRepository implements CategoryInterface
{
    public function model()
    {
        return \App\Models\Category::class;
    }

    public function listsCate()
    {
        return $this->model->paginate(15);
    }

    public function getAllCategory()
    {
        return $this->model->all();
    }

    public function createCategory(Request $request)
    {
        $data = [
            'user_id' => $request->user()->id,
            'name' => $request->get('name'),
            'title' => $request->get('title'),
            'slug' => changeTitle($request->get('name')),
            'status' => $request->get('status')
        ];

        $saveCategory = $this->model->create($data);

        return $saveCategory;
    }

    public function parentId()
    {
        return $this->model->select('id', 'name', 'parent_id')->get()->toArray();
    }

    public function findCategoryId($id)
    {
        return $this->find($id);
    }

    public function updateCategory(Request $request, $id)
    {
        $data = [
            'user_id' => $request->user()->id,
            'name' => $request->get('name'),
            'title' => $request->get('title'),
            'slug' => changeTitle($request->get('name')),
//            'parent_id' => $request->get('parent'),
            'status' => $request->get('status')
        ];
        $saveCategory = $this->update($data, $id);

        return $saveCategory;
    }

    public function deleteCategory($id)
    {
        return $cate = $this->delete($id);
    }

    public function getCategoryStatus()
    {
        return $this->model->where('status', 1)->get();
    }
}
