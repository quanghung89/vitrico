<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Role\CreateRequest;
use App\Http\Requests\Role\UpdateRequest;
use App\Interfaces\PermissionInterface;
use App\Interfaces\RoleInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class RoleController extends Controller
{
    private $repository;
    private $repositoryPermission;

    public function __construct(RoleInterface $repository, PermissionInterface $repositoryPermission)
    {
        $this->repository = $repository;
        $this->repositoryPermission = $repositoryPermission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('role_view'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = $this->repository->listRole();
        return view('backend.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = $this->repositoryPermission->getRolePermission();
        return view('backend.roles.create', ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $this->repository->createRoles($request);

        return redirect()->route('roles.index')->with('success', 'Thêm Thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = $this->repositoryPermission->getRolePermission();
        $role = $this->repository->findRolesId($id);
        return view('backend.roles.update', ['permissions' => $permissions, 'role' =>$role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $this->repository->updateRoles($request, $id);

        return redirect()->route('roles.index')->with('success', 'Cập Nhật Thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->repository->deleteRoles($id);
        return redirect()->route('roles.index')->with('success', 'Xóa Thành công');
    }
}
