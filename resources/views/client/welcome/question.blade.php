@extends('layouts.client')

@section('content')
   
    <div class="container  ">
        <div class="row pt-5">
            <div class="col-5 mx-auto">
                <textarea class="border" name="" id="" cols="60" rows="10" placeholder="Tell us about yourself"></textarea>
                <a href="{{route('client.question')}}" class='btn btn-danger mt-2 text-white'>Continue</a>
            </div>
            <div class="col-7 mx-auto">
                <img class="img-fluid" src="/dist/img/photo2.png" alt="">
            </div>
        </div>
    </div>

@endsection