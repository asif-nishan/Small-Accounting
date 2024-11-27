<?php

namespace App\Exports;

use App\JV;
use App\JVItem;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GeneraLedgerExport implements FromArray, WithHeadings
{
    /**
     * @return array
     */
    public function array(): array
    {
        $reportArray = [];
        $jvs = JV::all();
        foreach ($jvs as $key => $jv) {

            $hasMoreDebit = $jv->hasMoreDebit();
            $credits = $jv->getCredits();
            $debits = $jv->getDebits();
            $getFirstCredit = $jv->getFirstCredit();
            $getFirstDebit = $jv->getFirstDebit();
            if (count($debits) == count($credits)) {
                foreach ($debits as $key => $debit) {
                    $row = [];
                    $row[] = Carbon::parse($jv->date)->format('d-m-Y');
                    $row[] = $jv->ref;
                    $row[] = $jv->detail;
                    $row[] = $jv->party;
                    $row[] = $debit->accountHead->code;
                    $row[] = $debit->accountHead->name;
                    $row[] = $credits[$key]->accountHead->code;
                    $row[] = $credits[$key]->accountHead->name;
                    $row[] = $debit->debit;
                    $row[] = $jv->remarks;
                    $reportArray[] = $row;
                }
            } else {
                foreach ($jv->jvItems as $key => $jvItem) {
                    if (count($debits) > count($credits)) {
                        if ($getFirstCredit != null) {
                            if ($getFirstCredit->id == $jvItem->id) {
                                continue;
                            }
                        }
                        $row = [];
                        $row[] = Carbon::parse($jv->date)->format('d-m-Y');
                        $row[] = $jv->ref;
                        $row[] = $jv->detail;
                        $row[] = $jv->party;
                        $row[] = $jvItem->accountHead->code;
                        $row[] = $jvItem->accountHead->name;
                        $row[] = $getFirstCredit != null ? $getFirstCredit->accountHead->code : '';
                        $row[] = $getFirstCredit != null ? $getFirstCredit->accountHead->name : '';
                        $row[] = $jvItem->debit;
                        $row[] = $jv->remarks;
                        $reportArray[] = $row;

                    } else {
                        if ($getFirstDebit != null) {
                            if ($getFirstDebit->id == $jvItem->id) {
                                continue;
                            }
                        }
                        $row = [];
                        $row[] = Carbon::parse($jvItem->date)->format('d-m-Y');
                        $row[] = $jv->ref;
                        $row[] = $jv->detail;
                        $row[] = $jv->party;
                        $row[] = $getFirstDebit != null ? $getFirstDebit->accountHead->code : '';
                        $row[] = $getFirstDebit != null ? $getFirstDebit->accountHead->name : '';
                        $row[] = $jvItem->accountHead->code;
                        $row[] = $jvItem->accountHead->name;
                        $row[] = $jvItem->credit;
                        $row[] = $jv->remarks;
                        $reportArray[] = $row;

                    }

                }
            }

        }
        return $reportArray;
    }

    public function headings(): array
    {
        return [
            'Date',
            'Ref',
            'Details',
            'Party',
            'D.C',
            'Acc. Head',
            'CC',
            'Acc. Head',
            'Amount',
            'Remark',
        ];
    }
}
