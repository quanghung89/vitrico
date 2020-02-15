<?php

namespace App\RepositoryEloquent;

use App\Interfaces\AccountInterface;
use Illuminate\Http\Request;

class AccountRepository extends BaseRepository implements AccountInterface
{
    public function model()
    {
        return \App\Models\Accounts::class;
    }

    public function listsAccount()
    {
        return $this->model->paginate(15);
    }

    public function getAllAccount()
    {
        return $this->model->all();
    }

    public function createAccount(Request $request)
    {
        $user = $request->user();
        $file_name = "";
        if(file_exists($request->file('image')))
        {
            $file_name = time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move('upload/images/account/',$file_name);
        }

        $data = [
            'user_id' => $user->id,
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => $request->get('password') ? bcrypt($request->get('password')) : bcrypt('12345678'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'no_cmt' => $request->get('no_cmt'),
            'image' =>$file_name,
            'status' => $request->get('status')
        ];

        $saveAccount = $this->model->create($data);

        return $saveAccount;
    }


    public function findAccountId($id)
    {
        return $this->find($id);
    }

    public function updateAccount(Request $request, $id)
    {
        $user = $request->user();
        $img_curr='upload/images/account'.$request->input('img_curr');
        if(file_exists($request->file('images')))
        {
            $file_name = time().$request->file('images')->getClientOriginalName();
            $request->file('images')->move('upload/images/account/',$file_name);
        }
        else {
            $file_name = $request->input('img_curr');
        }

        $data = [
            'user_id' => $user->id,
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => $request->get('password') ? bcrypt($request->get('password')) : bcrypt('12345678'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'no_cmt' => $request->get('no_cmt'),
            'image' =>$file_name,
            'status' => $request->get('status')
        ];
        $saveAccount = $this->update($data, $id);

        return $saveAccount;
    }

    public function deleteAccount($id)
    {
        return $account = $this->delete($id);
    }
}
