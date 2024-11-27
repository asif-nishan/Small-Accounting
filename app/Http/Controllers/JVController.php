<?php

namespace App\Http\Controllers;

use App\AccountHead;
use App\JV;
use App\JVItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JVController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $jvs = JV::orderBy('id', 'desc')->get();
        return view('jvs.index', [
            'jvs' => $jvs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $accountHeads = AccountHead::select('id', 'name', 'code')->get();
        return view('jvs.create', [
            'accountHeads' => $accountHeads,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode($request->data, true);
        $validator = Validator::make($data, [
            'account_head_ids' => 'required|array',
            'account_head_ids.*' => 'integer',
            'debits' => 'required|array',
            'debits.*' => 'numeric',
            'credits' => 'required|array',
            'credits.*' => 'numeric',
            'total_debit' => 'required|numeric',
            'total_credit' => 'required|numeric',
            'date' => 'required',
            'ref' => 'required',
            'party' => 'required',
            'detail' => 'nullable',
            'remark' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(false);
        }
        $jv = new JV();
        $jv->date = Carbon::createFromFormat('d-m-Y', $data['date'])->format('Y-m-d');
        $jv->ref = $data['ref'];
        $jv->detail = $data['detail'];
        $jv->party = $data['party'];
        $jv->remarks = $data['remark'];
        $jv->total_debit = $data['total_debit'];
        $jv->total_credit = $data['total_credit'];
        $jv->save();
        for ($i = 0; $i < count($data['account_head_ids']); $i++) {
            $jvItem = new JVItem();
            $jvItem->j_v_id = $jv->id;
            $jvItem->account_head_id = $data['account_head_ids'][$i];
            $jvItem->credit = $data['credits'][$i] == "" ? 0 : $data['credits'][$i];
            $jvItem->debit = $data['debits'][$i] == "" ? 0 : $data['debits'][$i];
            $jvItem->save();
        }
        return response()->json(true);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\JV $jv
     *
     */
    public function show(JV $jv)
    {
        $accountHeads = AccountHead::select('id', 'name', 'code')->get();
        $jvItems = JVItem::where('j_v_id', $jv->id)->get();
        return view('jvs.show', [
            'accountHeads' => $accountHeads,
            'jv' => $jv,
            'jvItems' => $jvItems,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\JV $jv
     */
    public function edit(JV $jv)
    {
        $accountHeads = AccountHead::select('id', 'name', 'code')->get();
        $jvItems = JVItem::where('j_v_id', $jv->id)->get();
        return view('jvs.edit', [
            'accountHeads' => $accountHeads,
            'jv' => $jv,
            'jvItems' => $jvItems,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\JV $jv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JV $jv)
    {
        $data = json_decode($request->data, true);
        $validator = Validator::make($data, [
            'account_head_ids' => 'required|array',
            'account_head_ids.*' => 'integer',
            'debits' => 'required|array',
            'debits.*' => 'numeric',
            'credits' => 'required|array',
            'credits.*' => 'numeric',
            'total_debit' => 'required|numeric',
            'total_credit' => 'required|numeric',
            'date' => 'required',
            'ref' => 'required',
            'party' => 'required',
            'detail' => 'nullable',
            'remark' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(false);
        }
        $jv->date = Carbon::createFromFormat('d-m-Y', $data['date'])->format('Y-m-d');
        $jv->ref = $data['ref'];
        $jv->detail = $data['detail'];
        $jv->party = $data['party'];
        $jv->remarks = $data['remark'];
        $jv->total_debit = $data['total_debit'];
        $jv->total_credit = $data['total_credit'];
        $jv->save();
        JVItem::where('j_v_id', $jv->id)->delete();;
        for ($i = 0; $i < count($data['account_head_ids']); $i++) {
            $jvItem = new JVItem();
            $jvItem->j_v_id = $jv->id;
            $jvItem->account_head_id = $data['account_head_ids'][$i];
            $jvItem->credit = $data['credits'][$i] == "" ? 0 : $data['credits'][$i];
            $jvItem->debit = $data['debits'][$i] == "" ? 0 : $data['debits'][$i];
            $jvItem->save();
        }
        return response()->json(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\JV $jv
     *
     */
    public function destroy(JV $jv)
    {
        return $jv->delete();
    }
}
