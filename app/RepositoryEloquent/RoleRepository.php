<?php

namespace App\RepositoryEloquent;

use App\Interfaces\RoleInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleRepository extends BaseRepository implements RoleInterface
{
    public function model()
    {
        return \App\Models\Role::class;
    }

    public function listRole()
    {
        return $this->model->paginate(10);
    }

    public function getAllRoles()
    {
        return $this->model->all();
    }

    public function createRoles(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $role = $this->create($request->all());
            $role->permissions()->sync($request->input('permissions', []));
        });

    }

    public function findRolesId($id)
    {
        return $this->find($id);
    }

    public function updateRoles(Request $request, $id)
    {
        return DB::transaction(function () use ($request, $id) {
            $role = $this->updates($id, $request->all());
            $role->permissions()->sync($request->input('permissions', []));
        });

    }

    public function deleteRoles($id)
    {
        return $cate = $this->delete($id);
    }

    public function getRoleById($id)
    {
        return $Roles = $this->model->where('id', $id)->get();
    }

    public function getRoleUser()
    {
        return $this->model->all()->pluck('title', 'id');
    }
}
