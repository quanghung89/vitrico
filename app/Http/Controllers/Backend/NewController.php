<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\News\AddNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Interfaces\CategoryInterface;
use App\Interfaces\NewsInterface;
use App\Http\Controllers\Controller;

class NewController extends Controller
{
    private $repository;
    private $categoryRepository;

    public function __construct(NewsInterface $repository, CategoryInterface $categoryRepository)
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = $this->repository->listNew();
        return view('backend.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $parent = $this->categoryRepository->parentId();
        $category = $this->categoryRepository->getAllCategory();
        return view('backend.news.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewsRequest $request)
    {
        $add = $this->repository->createNews($request);
        if (!$add) {
            return redirect()->back()->with('error', 'Thêm Không Thành công');
        }
        return redirect()->route('news.index')->with('success', 'Thêm Thành công');
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
        $category = $this->categoryRepository->getAllCategory();
        $new = $this->repository->findNewsId($id);

        return view('backend.news.update', compact('category','new'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, $id)
    {
        $category = $this->repository->updateNews($request, $id);
        if (!$category) {
            return redirect()->back()->with('error', 'Cập Nhật Không Thành công');
        }
        return redirect()->route('news.index')->with('success', 'Cập Nhật Thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = $this->repository->deleteNews($id);
        if (!$news)
        {
            return redirect()->back()->with('error', 'Xóa Không Thành công');
        }
        return redirect()->route('category.index')->with('success', 'Xóa thành công');
    }
}
