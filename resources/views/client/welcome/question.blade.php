@extends('layouts.client')

@section('content')
   
    <div class="container  ">
        <div class="row pt-5">
            <div class="col-5 mx-auto">
                <form action="{{route('client.question.store')}}" method="post">@csrf
                <label>
                    Please tell us about yourself
                    <textarea name='about_me' class="border" name="" id="" cols="30" rows="10" ></textarea></label>
                    <p>Please share with us your details to start your mortgage application and journey.</p>
                <button type="submit" class='btn  mt-2 text-white btn-round'>Continue</button>
                </form>
            </div>
            <div class="col-7 mx-auto">
                <img class="img-fluid" src="/dist/img/photo2.png" alt="">
            </div>
        </div>
    </div>

@endsection 