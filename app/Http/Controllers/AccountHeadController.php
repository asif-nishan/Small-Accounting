<?php

namespace App\Http\Controllers;

use App\AccountHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountHeadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $accountHeads = AccountHead::all();
        return view('account_heads.index', [
            'title' => "Account Head",
            'accountHeads' => $accountHeads,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('account_heads.create', [
            'title' => "Create Account Head",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     */
    public function store(Request $request)
    {
        $validatedData = $this->getValidatedData();
        $accountHead = new AccountHead($validatedData);
        $accountHead->save();
        return redirect(route('account-heads.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AccountHead $accountHead
     * @return \Illuminate\Http\Response
     */
    public function show(AccountHead $accountHead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AccountHead $accountHead
     *
     */
    public function edit(AccountHead $accountHead)
    {
        return view('account_heads.edit', [
            'title' => "Edit Account Head",
            'accountHead' => $accountHead,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\AccountHead $accountHead
     *
     */
    public function update(Request $request, AccountHead $accountHead)
    {
        $validatedData = $this->getValidatedData();
        $accountHead->update($validatedData);
        return redirect(route('account-heads.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AccountHead $accountHead
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountHead $accountHead)
    {
        //
    }

    private function getValidatedData()
    {
        return request()->validate([
            'code' => 'required',
            'name' => 'required',
            'type' => 'nullable',
        ]);
    }

    public function info(Request $request)
    {

        $data = json_decode($request->data, true);
        $validator = Validator::make($data, [
            'acc_head_id' => 'required|integer',
            // 'product_id.*' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json(false);
        }

        //get batch
        $accountHead = AccountHead::find($data['acc_head_id']);
        //get selling unit price
        return response()->json($accountHead);
    }
}
