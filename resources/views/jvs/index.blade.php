@extends('layouts.layout')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="main-card mb-6 card">
            <div class="card-body table-responsive">
                <h5 class="card-title">All JV</h5>
                <table id="datatable" class="mb-0 table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Ref</th>
                        <th>Party</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jvs as $key=> $jv)
                        <tr>
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$jv->ref}}</td>
                            <td>{{$jv->party}}</td>
                            <td>{{\Carbon\Carbon::parse($jv->date)->format('d-m-Y')}}</td>
                            <td>
                                <a href="{{'/jvs/'.$jv->id}}" class="mt-2 btn btn-success">View</a>
                                <a  href="{{route('jvs.edit',$jv->id)}}"  class="mt-2 btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
    </script>
@endsection
