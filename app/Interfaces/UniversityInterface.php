<?php


namespace App\Interfaces;

use App\Http\Requests\University\UpdateUniversityRequest;
use Illuminate\Http\Request;

interface UniversityInterface extends BaseInterface
{
    public function listUniversity();

    public function getAllUniversity();

    public function createUniversity(Request $request);

    public function findUniversityId($id);

    public function updateUniversity(UpdateUniversityRequest $request, $id);

    public function deleteUniversity($id);

    public function getUniversity();

    public function allUniversity();
}
