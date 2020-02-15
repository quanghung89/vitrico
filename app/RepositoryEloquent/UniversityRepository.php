<?php

namespace App\RepositoryEloquent;

use App\Http\Requests\University\UpdateUniversityRequest;
use App\Interfaces\UniversityInterface;
use Illuminate\Http\Request;

class UniversityRepository extends BaseRepository implements UniversityInterface
{
    public function model()
    {
        return \App\Models\University::class;
    }

    public function listUniversity()
    {
        return $this->model->paginate(10);
    }

    public function getAllUniversity()
    {
        return $this->model->all();
    }

    public function createUniversity(Request $request)
    {
        $user = $request->user();
        $file_name = '';
        if(file_exists($request->file('image'))){

            $file_name = time().$request->file('image')->getClientOriginalName();

            $image = $request->file('image')->move('upload/images/university' ,$file_name);
        }

        $arr = [
            'user_id' => $user->id,
            'title' => $request->get('title'),
            'slug' => changeTitle($request->get('title')),
            'description' => $request->get('description'),
            'content' => $request->get('content'),
            'image' => $file_name,
            'status' => $request->get('status'),
            'address' => $request->get('address'),
            'constitutive' => $request->get('constitutive'),
            'admission' => $request->get('admission'),
            'tuition' => $request->get('tuition'),
        ];

        $add = $this->create($arr);

        if (!$add)
        {
            return false;
        }
        return true;
    }

    public function findUniversityId($id)
    {
        return $this->find($id);
    }

    public function updateUniversity(UpdateUniversityRequest $request, $id)
    {
//        dd($request);
        $user = $request->user();
//        $img_curr='upload/images/university/'.$request->input('img_curr');
        if(file_exists($request->file('images')))
        {
            $file_name = time().$request->file('images')->getClientOriginalName();
            $request->file('images')->move('upload/images/university/',$file_name);
        }
        else {
            $file_name = $request->input('img_curr');
        }

        $arr = [
            'user_id' => $user->id,
            'title' => $request->get('title'),
            'slug' => changeTitle($request->get('title')),
            'description' => $request->get('description'),
            'content' => $request->get('content'),
            'image' => $file_name,
            'status' => $request->get('status'),
            'address' => $request->get('address'),
            'constitutive' => $request->get('constitutive'),
            'admission' => $request->get('admission'),
            'tuition' => $request->get('tuition'),
        ];

        $update = $this->update($arr, $id);
        if (!$update)
        {
            return false;
        }
        return true;
    }

    public function deleteUniversity($id)
    {
        return $university = $this->delete($id);

    }

    public function getUniversity()
    {
        return $this->model->take(6)->get();
    }

    public function allUniversity()
    {
        return $this->model->paginate(12);
    }
}
