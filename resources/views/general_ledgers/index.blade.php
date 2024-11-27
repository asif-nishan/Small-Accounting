@extends('layouts.layout')
@section('content')
    <div class="col-lg-12">
        <div class="main-card mb-6 card">
            <div class="card-body table-responsive">
                <h5 class="card-title">General Ledger</h5>
                <table id="datatable" class="mb-0 table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Ref</th>
                        <th>Details</th>
                        <th>Party</th>
                        <th>D.C</th>
                        <th>Acc. Head</th>
{{--                        <th>D.A.</th>--}}
                        <th>CC</th>
                        <th>Acc. Head</th>
                        <th>Amount</th>
                        <th>Remark</th>
                        <th>Pic</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $sl = 1; ?>
                    @foreach($jvs as $key=> $jv)
                        <?php
                        $hasMoreDebit = $jv->hasMoreDebit();
                        $credits = $jv->getCredits();
                        $debits = $jv->getDebits();
                        $getFirstCredit = $jv->getFirstCredit();
                        $getFirstDebit = $jv->getFirstDebit();
                        ?>
                        @if(count($debits) == count($credits))
                            @foreach($debits as $key=> $debit)
                                <tr>
                                    <th scope="row">{{$sl}}</th>
                                    <td>{{\Carbon\Carbon::parse($jv->date)->format('d-m-Y')}}</td>
                                    <td>{{$jv->ref}}</td>
                                    <td>{{$jv->detail}}</td>
                                    <td>{{$jv->party}}</td>
                                    <td>{{$debit->accountHead->code}}</td>
                                    <td>{{$debit->accountHead->name}}</td>
                                    <td>{{$credits[$key]->accountHead->code}}</td>
                                    <td>{{$credits[$key]->accountHead->name}}</td>
                                    <td>{{$debit->debit}}</td>
                                    {{--                                    <td>{{$credits[$key]->credit}}</td>--}}
                                    <td>{{$jv->remarks}}</td>
                                    <td>{{$jv->image_url}}</td>
                                    <td>
                                        <a href="{{route('jvs.edit',$jv->id)}}" class="mt-2 btn btn-primary">Edit</a>
                                    </td>
                                </tr>
                                <?php $sl++?>
                            @endforeach
                        @else
                            @foreach($jv->jvItems as $key=> $jvItem)
                                <tr>
                                    @if(count($debits) > count($credits))
                                        @if($getFirstCredit != null)
                                            @if($getFirstCredit->id == $jvItem->id)
                                                @continue
                                            @endif
                                        @endif
                                        <th scope="row">{{$sl}}</th>
                                        <td>{{\Carbon\Carbon::parse($jv->date)->format('d-m-Y')}}</td>
                                        <td>{{$jv->ref}}</td>
                                        <td>{{$jv->detail}}</td>
                                        <td>{{$jv->party}}</td>
                                        <td>{{$jvItem->accountHead->code}}</td>
                                        <td>{{$jvItem->accountHead->name}}</td>

                                        <td>{{$getFirstCredit !=null? $getFirstCredit->accountHead->code :''}}</td>
                                        <td>{{$getFirstCredit !=null? $getFirstCredit->accountHead->name:''}}
                                            <td>{{$jvItem->debit}}</td>
                                        {{--                                            <td>{{$getFirstCredit !=null? $getFirstCredit->credit:''}}</td>--}}
                                        <td>{{$jv->remarks}}</td>
                                        <td>{{$jv->image_url}}</td>
                                    @else
                                        @if($getFirstDebit != null)
                                            @if($getFirstDebit->id == $jvItem->id)
                                                @continue
                                            @endif
                                        @endif
                                        <th scope="row">{{$sl}}</th>
                                        <td>{{\Carbon\Carbon::parse($jvItem->date)->format('d-m-Y')}}</td>
                                        <td>{{$jv->ref}}</td>
                                        <td>{{$jv->detail}}</td>
                                        <td>{{$jv->party}}</td>
                                        <td>{{$getFirstDebit !=null? $getFirstDebit->accountHead->code :''}}</td>
                                        <td>{{$getFirstDebit !=null? $getFirstDebit->accountHead->name:''}}</td>
                                        {{--                                        <td>{{$getFirstDebit !=null? $getFirstDebit->debit:''}}</td>--}}
                                        <td>{{$jvItem->accountHead->code}}</td>
                                        <td>{{$jvItem->accountHead->name}}</td>
                                        <td>{{$jvItem->credit}}</td>
                                        <td>{{$jv->remarks}}</td>
                                        <td>{{$jv->image_url}}</td>
                                    @endif

                                    <td>
                                        <a href="{{route('jvs.edit',$jv->id)}}" class="mt-2 btn btn-primary">Edit</a>
                                    </td>
                                    <?php $sl++?>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
