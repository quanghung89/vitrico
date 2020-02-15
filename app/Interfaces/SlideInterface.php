<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface SlideInterface extends BaseInterface
{
    public function listsSlide();

    public function getAllSlide();

    public function createSlide(Request $request);

    public function updateSlide(Request $request, $id);

    public function findSlideId($id);

    public function deleteSlide($id);
}
