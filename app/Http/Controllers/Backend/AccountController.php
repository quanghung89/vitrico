<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\CreateAccountRequest;
use App\Http\Requests\Account\UpdateAccountRequest;
use App\Interfaces\AccountInterface;

class AccountController extends Controller
{
    public $repository;

    /**
     * CategoryController constructor.
     * @param AccountInterface $repository
     */
    public function __construct(AccountInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listAccounts = $this->repository->listsAccount();
        return view('backend.account.index', ['listAccounts' => $listAccounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAccountRequest $request)
    {
        $account = $this->repository->createAccount($request);
        if (!$account) {
            return redirect()->back()->with('error', 'Thêm Mới Không Thành công');
        }
        return redirect()->route('account.index')->with('success', 'Thêm Mới Thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = $this->repository->findAccountId($id);

        return view('backend.account.update', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccountRequest $request, $id)
    {
        $account = $this->repository->updateAccount($request, $id);
        if (!$account) {
            return redirect()->back()->with('error', 'Cập Nhật Không Thành công');
        }
        return redirect()->route('account.index')->with('success', 'Cập Nhật Thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = $this->repository->deleteAccount($id);
        if (!$account)
        {
            return redirect()->back()->with('error', 'Xóa Không Thành công');
        }
        return redirect()->route('account.index')->with('success', 'Xóa thành công');
    }
}
