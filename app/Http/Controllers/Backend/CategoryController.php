<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Interfaces\CategoryInterface;
use App\Interfaces\NewsInterface;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class CategoryController extends Controller
{
    public $repository;
    public $newsRepository;

    /**
     * CategoryController constructor.
     * @param CategoryInterface $repository
     * @param NewsInterface $newsRepository
     */
    public function __construct(CategoryInterface $repository, NewsInterface $newsRepository)
    {
        $this->repository = $repository;
        $this->newsRepository = $newsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('category_view'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $listCategories = $this->repository->listsCate();
        return view('backend.category.index', ['listCategories' => $listCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = $this->repository->createCategory($request);
        if (!$category) {
            return redirect()->back()->with('error', 'Thêm Mới Không Thành công');
        }
        return redirect()->route('category.index')->with('success', 'Thêm Mới Thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $category = $this->repository->findCategoryId($id);

        return view('backend.category.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = $this->repository->updateCategory($request, $id);
        if (!$category) {
            return redirect()->back()->with('error', 'Cập Nhật Không Thành công');
        }
        return redirect()->route('category.index')->with('success', 'Cập Nhật Thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $news = $this->newsRepository->getAllNews();

        foreach ($news as $new)
        {
            if ($new->cate_id == $id)
            {
                $this->newsRepository->deleteNews($new->id);
            }
        }

        $category = $this->repository->deleteCategory($id);
        if (!$category)
        {
            return redirect()->back()->with('error', 'Xóa Không Thành công');
        }
        return redirect()->route('category.index')->with('success', 'Xóa thành công');
    }
}
