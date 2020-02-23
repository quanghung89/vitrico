<?php


namespace App\Interfaces;


use Illuminate\Http\Request;

interface UserInterface extends BaseInterface
{
    public function listUser();

    public function getAllUsers();

    public function createUsers(Request $request);

    public function findUsersId($id);

    public function updateUsers(Request $request, $id);

    public function deleteUsers($id);

    public function getUserById($id);


}
