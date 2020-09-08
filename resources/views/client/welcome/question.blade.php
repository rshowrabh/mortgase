@extends('layouts.client')

@section('content')
   
    <div class="container  ">
        <div class="row pt-5">
            <div class="col-5 mx-auto">
                <form action="{{route('client.question.store')}}" method="post">@csrf
                <textarea name='about_me' class="border" name="" id="" cols="60" rows="10" placeholder="Tell us about yourself"></textarea>
                <button type="submit" class='btn btn-danger mt-2 text-white'>Continue</button>
                </form>
            </div>
            <div class="col-7 mx-auto">
                <img class="img-fluid" src="/dist/img/photo2.png" alt="">
            </div>
        </div>
    </div>

@endsection 