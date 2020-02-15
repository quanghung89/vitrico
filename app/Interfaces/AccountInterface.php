<?php


namespace App\Interfaces;


use Illuminate\Http\Request;

interface AccountInterface extends BaseInterface
{
    public function listsAccount();

    public function getAllAccount();

    public function createAccount(Request $request);

    public function updateAccount(Request $request, $id);

    public function findAccountId($id);

    public function deleteAccount($id);
}
