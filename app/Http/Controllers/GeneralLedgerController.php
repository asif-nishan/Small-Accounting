<?php

namespace App\Http\Controllers;

use App\Exports\GeneraLedgerExport;
use App\JV;
use App\JVItem;
use App\Mail\SendLedger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class GeneralLedgerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       // $jvItems = JVItem::orderBy('id', 'asc')->get();
        $jvs = JV::orderBy('id', 'asc')->get();
        return view('general_ledgers.index', [
            //'jvItems' => $jvItems,
            'jvs' => $jvs,
        ]);
    }

//    public function export()
//    {
//        Mail::to('info@shadownicsoft.com')->send(new SendLedger());
////        Mail::to('info@shadownicsoft.com')->
////        return Excel::download(new GeneraLedgerExport(), 'general-ledger.xlsx');
//    }
    public function send()
    {
        return view('general_ledgers.send', [
            'title' => "Send General Ledger to a mail",
        ]);
    }

    public function sendPost()
    {
        $validatedData = $this->getValidatedData();
        try {
            Mail::to($validatedData['email'])->send(new SendLedger());
            Session::flash('message', 'Successfully sent');
            Session::flash('alert-class', 'alert-success');
            return redirect('/');
        }catch (\Exception $exception){
            Session::flash('message', 'Failed to sent');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/');
        }
    }

    private function getValidatedData()
    {
        return request()->validate([
            'email' => 'required|email',
        ]);
    }
}
