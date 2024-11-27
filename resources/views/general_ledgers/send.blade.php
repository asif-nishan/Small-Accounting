@extends('layouts.layout')
@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            @isset($title)
                <h5 class="card-title">{{$title}}</h5>
            @endisset
            <form class="" action="{{route('general-ledgers.sendPost')}}" method="post">
                {{csrf_field()}}
                <div class="position-relative form-group">
                    <label for="email" class="">Email</label>
                    <input required name="email" id="email" placeholder="" type="email" value="{{ old('email') }}"
                           class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <em class="error invalid-feedback">{{$errors->first('email')}}
                    </em>
                    @enderror
                </div>
                <div class="position-relative form-group">
                    <input type="submit" value="Send" class="mt-2 btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
