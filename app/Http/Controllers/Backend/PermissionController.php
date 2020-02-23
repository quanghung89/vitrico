<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Permission\CreateRequest;
use App\Http\Requests\Permission\UpdateRequest;
use App\Interfaces\PermissionInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class PermissionController extends Controller
{

    private $repository;

    public function __construct(PermissionInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        abort_if(Gate::denies('permission_view'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = $this->repository->listPermission();
        return view("backend.permissions.index", ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.permissions.create');
    }

    /**
     * @param CreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $add = $this->repository->createPermissions($request);
        if (!$add) {
            return redirect()->back()->with('error', 'Thêm Không Thành công');
        }
        return redirect()->route('permissions.index')->with('success', 'Thêm Thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permission = $this->repository->findPermissionsId($id);

        return view('backend.permissions.update', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $permission = $this->repository->updatePermissions($request, $id);
        if (!$permission) {
            return redirect()->back()->with('error', 'Cập Nhật Không Thành công');
        }
        return redirect()->route('permissions.index')->with('success', 'Cập Nhật Thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permission = $this->repository->deletePermissions($id);
        if (!$permission)
        {
            return redirect()->back()->with('error', 'Xóa Không Thành công');
        }
        return redirect()->route('permissions.index')->with('success', 'Xóa thành công');
    }
}
