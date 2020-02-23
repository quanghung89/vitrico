<?php

namespace App\RepositoryEloquent;

use App\Interfaces\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository implements UserInterface
{
    const IMAGE_USER = 'favicon.png';
    public function model()
    {
        return \App\Models\User::class;
    }

    public function listUser()
    {
        return $this->model->paginate(15);
    }

    public function getAllUsers()
    {
        return $this->model->all();
    }

    public function createUsers(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $arr = [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
                'image' => self::IMAGE_USER,
            ];

            $user = $this->create($arr);
            $user->roles()->sync($request->input('roles', []));
        });
    }

    public function findUsersId($id)
    {
        return $this->find($id);
    }

    public function updateUsers(Request $request, $id)
    {
        return DB::transaction(function () use ($request, $id) {
            $data = [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'image' => self::IMAGE_USER,
            ];

            if ($request->get('password') != null)
            {
                $data['password'] = bcrypt($request->get('password'));
            }

            $user = $this->updates($id, $data);
            $user->roles()->sync($request->input('roles', []));
        });
    }

    public function deleteUsers($id)
    {
        return $this->delete($id);
    }

    public function getUserById($id)
    {
        return $Users = $this->model->where('id', $id)->get();
    }

}
