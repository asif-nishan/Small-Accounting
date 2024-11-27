<?php

namespace App\Http\Controllers;

use App\EMail;
use App\Events\EmailEvent;
use App\Mail\GeneralLedgerReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EMailController extends Controller
{
    function store(Request $request)
    {
        $items = EMail::all();
        if (count($items) > 0){
            foreach ($items as $row){
                if ($row->fileUrl && file_exists($row->fileUrl)){
                    unlink($row->fileUrl);
                }
            }
            EMail::truncate();
        }


        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=file.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $columns = $request->data;
        $filename = 'assets/'.time().'-'.mt_rand()."-gl.csv";
        $callback = function() use ($columns, $filename)
        {
            $file = fopen($filename, 'w');
            fputs($file, $columns);
            fclose($file);
        };
        $mail = new EMail();
        $mail->fileUrl = $filename;
        $mail->email = $request->email;
        $mail->save();
        //todo
        event(new EmailEvent($mail));
        return response()->stream($callback, 200, $headers);;
    }
}
