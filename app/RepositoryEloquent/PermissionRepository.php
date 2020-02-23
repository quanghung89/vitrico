<?php

namespace App\RepositoryEloquent;

use App\Interfaces\PermissionInterface;
use Illuminate\Http\Request;

class PermissionRepository extends BaseRepository implements PermissionInterface
{
    public function model()
    {
        return \App\Models\Permission::class;
    }

    public function listPermission()
    {
        return $this->model->paginate(15);
    }

    public function getAllPermissions()
    {
        return $this->model->all();
    }

    public function createPermissions(Request $request)
    {
        $arr = [
            'title' => $request->get('title'),
        ];

        $add = $this->create($arr);

        if (!$add) {
            return false;
        }
        return true;
    }

    public function findPermissionsId($id)
    {
        return $this->find($id);
    }

    public function updatePermissions(Request $request, $id)
    {
        $arr = [
            'title' => $request->get('title'),
        ];

        $update = $this->update($arr, $id);
        if (!$update) {
            return false;
        }
        return true;
    }

    public function deletePermissions($id)
    {
        return $this->delete($id);
    }

    public function getPermissionById($id)
    {
        return $Permissions = $this->model->where('id', $id)->get();
    }

    public function getRolePermission(){
        return $this->model->pluck('title', 'id');
    }

}
