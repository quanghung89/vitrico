<?php

namespace App\RepositoryEloquent;

use App\Interfaces\CategoryInterface;
use App\Interfaces\NewsInterface;
use App\RepositoryEloquent\BaseRepository;
use Illuminate\Http\Request;

class NewsRepository extends BaseRepository implements NewsInterface
{
    public function model()
    {
        return \App\Models\News::class;
    }

    public function listNew()
    {
        return $this->model->paginate(10);
    }

    public function getAllNews()
    {
        return $this->model->all();
    }

    public function createNews(Request $request)
    {
        $file_name="";
        $user = $request->user();
        if(file_exists($request->file('image'))){

            $file_name = time().$request->file('image')->getClientOriginalName();

            $image = $request->file('image')->move('upload/images/new' ,$file_name);
        }

        $arr = [
            'user_id' => $user->id,
            'cate_id' => $request->get('category'),
            'name' => $request->get('name'),
            'title' => $request->get('title'),
            'slug' => changeTitle($request->get('title')),
            'description' => $request->get('description'),
            'content' => $request->get('content'),
            'image' => $file_name,
            'status' => $request->get('status'),
        ];

        $add = $this->create($arr);

        if (!$add)
        {
            return false;
        }
        return true;
    }

    public function findNewsId($id)
    {
        return $this->find($id);
    }

    public function updateNews(Request $request, $id)
    {
        $user = $request->user();
//        $img_curr='image/tintuc/'.$request->input('img_curr');
        if(file_exists($request->file('images')))
        {
            $file_name = time().$request->file('images')->getClientOriginalName();
            $request->file('images')->move('upload/images/new/',$file_name);
        }
        else {
            $file_name = $request->input('img_curr');
        }

        $arr = [
            'user_id' => $user->id,
            'cate_id' => $request->get('category'),
            'name' => $request->get('name'),
            'title' => $request->get('title'),
            'slug' => changeTitle($request->get('title')),
            'description' => $request->get('description'),
            'content' => $request->get('content'),
            'image' => $file_name,
            'status' => $request->get('status'),
        ];

        $update = $this->update($arr, $id);
        if (!$update)
        {
            return false;
        }
        return true;
    }

    public function deleteNews($id)
    {
        return $cate = $this->delete($id);
    }

    public function getNewById($id){
        return $news = $this->model->where('id', $id)->get();
    }

    public function representative()
    {
        return $this->model->orderBy('id', 'DESC')->take(3)->get();
    }

    public function allNews()
    {
        return $this->model->paginate(12);
    }
}
