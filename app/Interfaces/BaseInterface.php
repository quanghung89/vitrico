<?php


namespace App\Interfaces;


interface BaseInterface
{
    public function where($conditions, $operator = null, $value = null);

    public function orWhere($conditions, $operator = null, $value = null);

    public function count();

    public function get($columns = ['*']);

    public function lists($column, $key = null);

    public function paginate($perPage = 20, $columns = ['*'], $limit = null);

    public function find($id, $columns = ['*']);

    public function create(array $data);

    public function update(array $data, $id, $attribute = 'id');

    public function delete($id);

    public function deleteAll();

    public function updates($id, array $attributes);
}
