<?php

namespace App\RepositoryEloquent;

use App\Interfaces\SlideInterface;
use Illuminate\Http\Request;

class SlideRepository extends BaseRepository implements SlideInterface
{
    public function model()
    {
        return \App\Models\Slide::class;
    }

    public function listsSlide()
    {
        return $this->model->paginate(15);
    }

    public function getAllSlide()
    {
        return $this->model->all();
    }

    public function createSlide(Request $request)
    {
//        dd($request->file('image')->getMaxFilesize());
        $file_name="";
        $user = $request->user();
        if(file_exists($request->file('image'))){
            $file_name = time().$request->file('image')->getClientOriginalName();
            $image = $request->file('image')->move('upload/images/slide' ,$file_name);
        }
//        dd($file_name);
        $data = [
            'user_id' => $user->id,
            'title' => $request->get('title'),
            'link' => $request->get('link'),
            'image' => $file_name,
            'status' => $request->get('status')
        ];

        $saveSile = $this->model->create($data);

        return $saveSile;
    }

    public function findSlideId($id)
    {
        return $this->find($id);
    }

    public function updateSlide(Request $request, $id)
    {
        $user = $request->user();
        if(file_exists($request->file('images')))
        {
            $file_name = time().$request->file('images')->getClientOriginalName();
            $request->file('images')->move('upload/images/slide/',$file_name);
        }
        else {
            $file_name = $request->input('img_curr');
        }

        $data = [
            'user_id' => $user->id,
            'title' => $request->get('title'),
            'link' => $request->get('link'),
            'image' => $file_name,
            'status' => $request->get('status')
        ];
        $updateSlide = $this->update($data, $id);

        return $updateSlide;
    }

    public function deleteSlide($id)
    {
        return $slide = $this->delete($id);
    }
}
