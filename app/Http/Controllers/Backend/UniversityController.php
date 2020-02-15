<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\University\AddUniversityRequest;
use App\Http\Requests\University\UpdateUniversityRequest;
use App\Interfaces\UniversityInterface;
use App\Http\Controllers\Controller;

class UniversityController extends Controller
{
    private $repository;

    public function __construct(UniversityInterface $repository)
    {
        $this->repository = $repository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universitys = $this->repository->listUniversity();
        return view('backend.university.index', compact('universitys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('backend.university.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUniversityRequest $request)
    {
        $add = $this->repository->createUniversity($request);
        if (!$add) {
            return redirect()->back()->with('error', 'Thêm Không Thành công');
        }
        return redirect()->route('university.index')->with('success', 'Thêm Thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $university = $this->repository->findUniversityId($id);

        return view('backend.university.update', compact('university'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUniversityRequest $request, $id)
    {
        $university = $this->repository->updateUniversity($request, $id);
//        dd($request);
        if (!$university) {
            return redirect()->back()->with('error', 'Cập Nhật Không Thành công');
        }
        return redirect()->route('university.index')->with('success', 'Cập Nhật Thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $university = $this->repository->deleteUniversity($id);
        if (!$university)
        {
            return redirect()->back()->with('error', 'Xóa Không Thành công');
        }
        return redirect()->route('university.index')->with('success', 'Xóa thành công');
    }
}
