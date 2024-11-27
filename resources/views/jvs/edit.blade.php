@extends('layouts.layout')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet"/>
    {{--<link rel="stylesheet"--}}
    {{--href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">--}}
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <style>
        .list-table [class^='select2'] {
            width: 100%;
            border: 0 !important;
            border-radius: 0 !important;
        }

        .list-table .select2-container {
            min-width: 150px;
        }

        .list-table .form-control {
            border: 0 !important;
            margin: 0 !important;
            border-radius: 0 !important;
        }

        .list-table .form-control:disabled, .form-control[readonly] {
            background-color: white;
            opacity: 1;
        }
    </style>
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">JV Information</h5>
                {{--            <form class="">--}}
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="date" class="">Date</label>
                            <input  type="text" name="date" autocomplete="off"
                                   id="date"
                                   value="{{ \Carbon\Carbon::parse($jv->date)->format('d-m-Y') }}"
                                   class="form-control   datepicker">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="ref" class="">Ref</label>
                            <input  type="text" name="ref" autocomplete="off"
                                   id="ref"
                                   value="{{$jv->ref}}"
                                   class="form-control   ">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="detail" class="">Detail</label>
                            <input  type="text" name="detail" autocomplete="off"
                                   id="detail"
                                   value="{{$jv->detail}}"
                                   class="form-control   ">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="dps" class="">Image</label>
                            <input  name="image_url" id="image_url" type="file"
                                   class="form-control-file @error('image_url') is-invalid @enderror">
                            <small class="form-text text-muted">Upload an image</small>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="party" class="">Party</label>
                            <input  type="text" name="party" autocomplete="off"
                                   id="party"
                                   value="{{$jv->party}}"
                                   class="form-control   ">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="remark" class="">Remark</label>
                            <input  type="text" name="remark" autocomplete="off"
                                   id="remark"
                                   value="{{$jv->remark}}"
                                   class="form-control   ">
                        </div>
                    </div>
                </div>
                {{--            </form>--}}
            </div>
        </div>
    </div>
    <div class="divider">
    </div>
    <div class="col-lg-12">
        <div class="main-card mb-6 card">
            <div class="card-body table-responsive">
                <h5 class="card-title">List</h5>
                <table class="mb-0 table table-bordered list-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>code</th>
                        <th>Account Head</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="main_tbody">
                    @foreach($jvItems as $jvItem)
                        <tr>
                            <td class="row_sl">1</td>
                            <td class="p-0">
                                <select class="select2 form-control p-0 m-0 row_acc_head_id" style="width: 100%"
                                        name="state">
                                    <option value="0">Select Code</option>
                                    @foreach($accountHeads as $accountHead)
                                        @if($jvItem->account_head_id == $accountHead->id)
                                            <option selected
                                                    value="{{$accountHead->id}}">{{$accountHead->code}}</option>
                                        @else
                                            <option value="{{$accountHead->id}}">{{$accountHead->code}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                            <td class="p-0 "><input disabled
                                                    class="form-control p-0 m-0 b-radius-0 text-center row_acc_head_name"
                                                    value="{{$jvItem->accountHead->name}}" type="text"></td>
                            <td class="p-0 "><input  class="form-control p-0 m-0 b-radius-0 text-center row_debit"
                                                    value="{{$jvItem->debit}}" type="number"></td>
                            <td class="p-0 "><input  class="form-control p-0 m-0 b-radius-0 text-center row_credit"
                                                    value="{{$jvItem->credit}}" type="number"></td>
                            <td class="p-0  text-center">
                                <button class="btn  btn-danger row_delete_btn"><i
                                        class="metismenu-icon pe-7s-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <td class="text-right" colspan="4"><b id="total_debit">{{$jv->total_debit}}</b></td>
                        <td class="p-0 m-0 text-right"><b id="total_credit">{{$jv->total_credit}}</b></td>
                        <td class="p-0 m-0 text-right"></td>
                    </tr>
                    <tr>
                        <td colspan="8" class="text-center">
                            <button id="add_new_item_btn" class="btn btn-primary">Add New Row</button>
                            <button id="save_btn" class="btn btn-success">Save Update</button>
                            <button id="delete_jv_btn" class="btn btn-success">Delete JV</button>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    {{--<script type="text/javascript"--}}
    {{--src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>--}}
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $(document).ready(function () {
            var accountHeads =@json($accountHeads);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.select2').select2();
            $('.datepicker').datepicker({
                showOtherMonths: true,
                autoclose: true,
                format: 'dd-mm-yyyy',
                showRightIcon: false,
                modal: true,
                header: true,
                uiLibrary: 'bootstrap4', iconsLibrary: 'materialicons'
            });
            //$('.datepicker').datepicker('setDate', new Date());
            //changes
            $("#main_tbody").on('change', '.row_debit', function () {
                updateGrandTotal();
            });
            $("#main_tbody").on('change', '.row_credit', function () {
                updateGrandTotal();
            });
            $("#main_tbody").on('click', '.row_delete_btn', function () {
                $(this).closest('tr').remove();
                updateRowSerialNumber();
                updateGrandTotal();
            });

            $('#save_btn').click(function () {
                $(this).attr("disabled", "disabled");
                let row_acc_heads = $('#main_tbody').find(".row_acc_head_id").toArray();
                let blank_row_acc_head = false;
                $.each(row_acc_heads, function (index, row_acc_head) {
                    if ($(row_acc_head).val() == 0) {
                        blank_row_acc_head = true;
                    }
                });
                if (!validated()) {
                    Swal.fire(
                        'Warning!',
                        'Please fill up necessary information!',
                        'danger'
                    )
                    $(this).removeAttr("disabled");
                } else {

                    if (!blank_row_acc_head) {
                        let date = $('#date').val();
                        let ref = $('#ref').val();
                        let detail = $('#detail').val();
                        let party = $('#party').val();
                        let remark = $('#remark').val();
                        let total_debit = $('#total_debit').html();
                        let total_credit = $('#total_credit').html();
                        let account_head_ids = $("#main_tbody").find('.row_acc_head_id').toArray().map(item => item.value);
                        let debits = $("#main_tbody").find('.row_debit').toArray().map(item => item.value);
                        let credits = $("#main_tbody").find('.row_credit').toArray().map(item => item.value);
                        $.ajax({
                            type: "POST",
                            dataType: 'json',
                            url: '/jvs/{{$jv->id}}',
                            data: {
                                _method:'put',
                                data: JSON.stringify({
                                    account_head_ids,
                                    debits,
                                    credits,
                                    total_debit,
                                    total_credit,
                                    remark,
                                    party,
                                    detail,
                                    ref,
                                    date
                                })
                            },
                            cache: false,
                            success: function (objects) {
                                if (objects) {
                                    console.log(objects);
                                    Swal.fire({
                                        title: "Success!",
                                        text: "Successfully Saved!",
                                        type: "success",
                                        showCancelButton: true,
                                        //useRejections: true,
                                        confirmButtonText: "Go To JV List",
                                        cancelButtonText: "Create another JV ?",
                                    }).then(function (result) {
                                        if (result.value) {
                                            $(location).attr("href", '/jvs');
                                        } else if (result.dismiss == 'cancel') {
                                            $(location).attr("href", '/jvs/create');
                                        }
                                        //$(this).removeAttr("disabled");
                                    });

                                } else {
                                    Swal.fire(
                                        'Failed!',
                                        'Failed To Do the operation',
                                        'danger'
                                    )
                                    $(this).removeAttr("disabled");
                                }
                            }
                        });
                    } else {
                        Swal.fire(
                            'Warning!',
                            'Please fill up the blank row first!',
                            'danger'
                        )
                        $(this).removeAttr("disabled");
                    }
                }
            });

            $('#delete_jv_btn').click(function () {
                $(this).attr("disabled", "disabled");
                Swal.fire({
                    title: "Warning!",
                    text: "Are you sure you want to delete?!",
                    //type: "danger",
                    showCancelButton: true,
                    //useRejections: true,
                    confirmButtonText: "Proceed",
                    cancelButtonText: "Cancel",
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            type: "POST",
                            dataType: 'json',
                            url: '/jvs/{{$jv->id}}',
                            data: {
                                _method:'DELETE'
                            },
                            cache: false,
                            success: function (objects) {
                                if (objects) {
                                    Swal.fire(
                                        'Success!',
                                        'Successful',
                                        'success'
                                    )
                                    $(location).attr("href", '/jvs');
                                } else {
                                    Swal.fire(
                                        'Failed!',
                                        'Failed To Do the operation',
                                        'danger'
                                    )
                                }
                            }
                        });
                    } else if (result.dismiss == 'cancel') {
                        //$(location).attr("href", '/jvs/create');
                    }
                    $(this).removeAttr("disabled");
                });

            });

            $('#add_new_item_btn').click(function () {
                //check before
                let row_acc_heads = $('#main_tbody').find(".row_acc_head_id").toArray();
                let blank_row_acc_head = false;
                $.each(row_acc_heads, function (index, row_acc_head) {
                    if ($(row_acc_head).val() == 0) {
                        blank_row_acc_head = true;
                    }
                });
                if (!blank_row_acc_head) {
                    let option = '';
                    $.each(accountHeads, function (index, object) {
                        option += '<option value="' + object.id + '">' + object.code + '</option>'
                    });
                    $('#main_tbody').append(
                        '<tr>' +
                        '<td class="row_sl">1</td>' +
                        '<td class="p-0">' +
                        '<select class="select2 form-control p-0 m-0 row_acc_head_id" style="width: 100%" name="state">' +
                        '<option value="0">Select Code</option>' +
                        option +
                        '</select>' +
                        '</td>' +
                        '<td class="p-0 "><input disabled class="form-control p-0 m-0 b-radius-0 text-center row_acc_head_name" value="" type="text"></td>' +
                        '<td class="p-0 "><input class="form-control p-0 m-0 b-radius-0 text-center row_debit" value="" type="number"></td>' +
                        '<td class="p-0 "><input class="form-control p-0 m-0 b-radius-0 text-center row_credit" value=""  type="number"></td>' +
                        '<td class="p-0  text-center">' +
                        '<button class="btn  btn-danger row_delete_btn"><i class="metismenu-icon pe-7s-trash"></i>' +
                        '</button>' +
                        '</td>' +
                        '</tr>'
                    );
                    $('.select2').select2();
                    updateRowSerialNumber();
                    updateGrandTotal();
                } else {
                    Swal.fire(
                        'Warning!',
                        'Please fill up the blank row first!',
                        'danger'
                    )
                }

            });

            $("#main_tbody").on('change', '.row_acc_head_id', function () {
                let acc_head_id = $(this).val();
                let row = $(this).closest('tr');
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: '/account-heads/info',
                    data: {
                        data: JSON.stringify({
                            acc_head_id
                        })
                    },
                    cache: false,
                    success: function (objects) {
                        if (objects) {
                            row.find('.row_acc_head_name').val(objects.name);
                            //updateGrandTotal();
                        }
                    }
                });
            });

            function validated() {
                let validation = true;
                if ($('#date').val() == "" || $('#ref').val() == "" || $('#party').val() == "" || $('#party').val() == "") {
                    validation = false
                }

                let rows = $('#main_tbody').find("tr").toArray();
                if (rows.length == 0) {
                    validation = false;
                }
                $.each(rows, function (index, row) {
                    let debit = $(row).find('.row_debit').val()
                    let credit = $(row).find('.row_credit').val()
                    if (debit == credit) {
                        validation = false;
                    }
                    if (debit == 0 && credit == 0) {
                        validation = false;
                    }
                });
                return validation;
            }

            function updateGrandTotal() {

                let total_debit = 0;
                let total_credit = 0;
                let row_debits = $('#main_tbody').find(".row_debit").toArray();
                $.each(row_debits, function (index, row_debit) {
                    console.log($(row_debit).val());
                    if ($(row_debit).val() != "") {
                        total_debit += eval($(row_debit).val());
                    }
                });
                let row_credits = $('#main_tbody').find(".row_credit").toArray();
                $.each(row_credits, function (index, row_credit) {
                    if ($(row_credit).val() != "") {
                        total_credit += eval($(row_credit).val());
                    }
                });
                $('#total_debit').html(MathUtils.roundToPrecision(total_debit, 2));
                $('#total_credit').html(MathUtils.roundToPrecision(total_credit, 2));
                //$('#total_debit').html(formatterBdt.format(MathUtils.roundToPrecision(total_debit, 2)));
                //$('#total_credit').html(formatterBdt.format(MathUtils.roundToPrecision(total_credit, 2)));
            }

            function updateRowSerialNumber() {

                var count = 0;
                var rowSerials = $('#main_tbody').find(".row_sl").toArray();
                $.each(rowSerials, function (index, value) {
                    count += eval(1);
                    value.innerHTML = count;
                });

            }

            var formatterBdt = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'BDT',
            });
            let MathUtils = {
                roundToPrecision: function (subject, precision) {
                    return +((+subject).toFixed(precision));
                }
            }
        });
    </script>
@endsection
