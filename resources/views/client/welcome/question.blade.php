@extends('layouts.client')

@section('content')
   
    <div class="container  ">
        <div class="row pt-5">
            <div class="col-5 mx-auto">
                <form action="{{route('client.question.store')}}" method="post">@csrf
                <label>
                    Please tell us about yourself
                    <textarea name='about_me' class="border" name="" id="" cols="60" rows="10" ></textarea></label>
                    <p>Now we are going to ask you about your employment status and etc.</p>
                <button type="submit" class='btn btn-danger mt-2 text-white btn-round'>Continue</button>
                </form>
            </div>
            <div class="col-7 mx-auto">
                <img class="img-fluid" src="/dist/img/photo2.png" alt="">
            </div>
        </div>
    </div>

@endsection 