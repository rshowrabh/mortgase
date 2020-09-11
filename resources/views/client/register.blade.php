
<?php

$color = $bid ? $bid->brand_color: '';
$logo = $bid ? $bid->picture: '';

?>


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="hold-transition login-page" style="background-color: {{$color}}">
    <div class="register-box">
        <div class="register-logo">
             <img style="height: 100px" src="/storage/images/{{$logo}}" class='img-fluid' alt="">
            <p> Mortgage Application </p>
           
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="mb-1 text-center">Register a new membership </p>

                <form method="POST" action="{{ route('register.client') }}">
                    @csrf
                    <input type="hidden" name="agents_table_id", value="{{$aid->agent->id}}">
                    <div class="input-group mb-3">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            placeholder="Enter First Name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email"  required autocomplete="email"
                            placeholder="Enter Email">



                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input  id="phone" type="number" class="form-control @error('phone') is-invalid @enderror"
                            name="phone" value="" required 
                            placeholder="Enter Phone">



                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                   
                    <div class="input-group mb-3">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password" placeholder="Password">


                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                   
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input required type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-round">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <a href="{{route('login')}}" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var broker = {!! json_encode($bid->toArray()) !!};
        var agent = {!! json_encode($aid->toArray()) !!};
        console.log(agent)

        localStorage.setItem('broker_picture',broker.picture,60)
        localStorage.setItem('broker_banner',broker.broker.banner_color,60)
        localStorage.setItem('broker_body',broker.broker.body_color,60)
        localStorage.setItem('broker_button',broker.broker.button_color,60)


        localStorage.setItem('agent_picture',agent.picture,60)
        localStorage.setItem('agent_license_no',agent.agent.agent_license_number,60)
        localStorage.setItem('agent_phone',agent.phone,60)
        localStorage.setItem('agent_name',agent.name,60)
        localStorage.setItem('agent_id',agent.agent.id,60)
    </script>

</body>

</html>
