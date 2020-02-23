<?php


namespace App\Interfaces;


use Illuminate\Http\Request;

interface PermissionInterface extends BaseInterface
{
    public function listPermission();

    public function getAllPermissions();

    public function createPermissions(Request $request);

    public function findPermissionsId($id);

    public function updatePermissions(Request $request, $id);

    public function deletePermissions($id);

    public function getPermissionById($id);

    public function getRolePermission();


}
