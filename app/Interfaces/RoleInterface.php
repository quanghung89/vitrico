<?php


namespace App\Interfaces;


use Illuminate\Http\Request;

interface RoleInterface extends BaseInterface
{
    public function listRole();

    public function getAllRoles();

    public function createRoles(Request $request);

    public function findRolesId($id);

    public function updateRoles(Request $request, $id);

    public function deleteRoles($id);

    public function getRoleById($id);

    public function getRoleUser();

}
