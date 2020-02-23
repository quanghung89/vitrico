<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slide\CreateSlideRequest;
use App\Interfaces\SlideInterface;
use Illuminate\Http\Request;
use App\RepositoryEloquent\SlideRepository;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class SlideController extends Controller
{
    public $repository;

    /**
     * CategoryController constructor.
     * @param SlideRepository $repository
     */
    public function __construct(SlideInterface $repository)
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
        abort_if(Gate::denies('banner_view'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $listSlides = $this->repository->listsSlide();
        return view('backend.slide.index', ['listSlides' => $listSlides]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('banner_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSlideRequest $request)
    {
        $slide = $this->repository->createSlide($request);
        if (!$slide) {
            return redirect()->back()->with('error', 'Thêm Mới Không Thành công');
        }
        return redirect()->route('slide.index')->with('success', 'Thêm Mới Thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('banner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $slide = $this->repository->findSlideId($id);

        return view('backend.slide.update', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slide = $this->repository->updateSlide($request, $id);
        if (!$slide) {
            return redirect()->back()->with('error', 'Cập Nhật Không Thành công');
        }
        return redirect()->route('slide.index')->with('success', 'Cập Nhật Thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('banner_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $slide = $this->repository->deleteSlide($id);
        if (!$slide)
        {
            return redirect()->back()->with('error', 'Xóa Không Thành công');
        }
        return redirect()->route('slide.index')->with('success', 'Xóa thành công');
    }
}
