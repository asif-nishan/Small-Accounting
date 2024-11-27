<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JV extends Model
{
    public function jvItems()
    {
        return $this->hasMany('App\JVItem', 'j_v_id');
    }

    public function hasMoreDebit()
    {
        $creditCount = JVItem::where([['j_v_id', '=', $this->id], ['credit', '>', 0]])->count();
        $debitCount = JVItem::where([['j_v_id', '=', $this->id], ['debit', '>', 0]])->count();
        if ($debitCount > $creditCount) {
            return true;
        }
        return false;
    }

    public function getFirstCredit()
    {
        return JVItem::where([['j_v_id', '=', $this->id], ['credit', '>', 0]])->first();
    }

    public function getFirstDebit()
    {
        return JVItem::where([['j_v_id', '=', $this->id], ['debit', '>', 0]])->first();
    }

    public function getCredits()
    {
        return JVItem::where([['j_v_id', '=', $this->id], ['credit', '>', 0]])->get();
    }

    public function getDebits()
    {

        return JVItem::where([['j_v_id', '=', $this->id], ['debit', '>', 0]])->get();
    }
}
