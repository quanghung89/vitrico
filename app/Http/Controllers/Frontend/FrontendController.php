<?php

namespace App\Http\Controllers\Frontend;

use App\Interfaces\CategoryInterface;
use App\Interfaces\NewsInterface;
use App\Interfaces\SlideInterface;
use App\Interfaces\UniversityInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    private $categoryRepository;
    private $newsRepository;
    private $slideRepository;
    private $universityRepository;

    /**
     * FrontendController constructor.
     * @param CategoryInterface $categoryRepository
     * @param NewsInterface $newsRepository
     * @param SlideInterface $slideRepository
     * @param UniversityInterface $universityRepository
     */
    public function __construct(
        CategoryInterface $categoryRepository,
        NewsInterface $newsRepository,
        SlideInterface $slideRepository,
        UniversityInterface $universityRepository
    )
    {
       $this->categoryRepository = $categoryRepository;
       $this->newsRepository = $newsRepository;
       $this->slideRepository = $slideRepository;
       $this->universityRepository = $universityRepository;

       $categories = $this->categoryRepository->getCategoryStatus();
       $news = $this->newsRepository->getAllNews();
       $slides = $this->slideRepository->getAllSlide();
       $newRepresentative = $this->newsRepository->representative();
       $universities = $this->universityRepository->getUniversity();

       View::share('slides', $slides);
       View::share('categories', $categories);
       View::share('news', $news);
       View::share('newRepresentative', $newRepresentative);
       View::share('universities', $universities);
//       dd($newRepresentative);

    }

    public function index()
    {
        return view('frontend.pages.index');
    }

    public function allnews()
    {
        $allnews = $this->newsRepository->allNews();
        return view('frontend.pages.all-tin-tuc', ['allnews'=>$allnews]);
    }

    public function tintuc($id)
    {
        $tintuc = $this->newsRepository->findNewsId($id);
        return view('frontend.pages.tintuc', ['tintuc' => $tintuc]);
    }

    public function detailuniversity($id)
    {
        $detailUniversity = $this->universityRepository->findUniversityId($id);
        return view('frontend.pages.detail-university', ['detailUniversity' => $detailUniversity]);
    }

    public function allUniversity()
    {
        $allUniversities = $this->universityRepository->allUniversity();
        return view('frontend.pages.all-university', ['allUniversities' => $allUniversities]);
    }


}
