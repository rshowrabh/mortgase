@include('inc.header')

<body class="hold-transition">

  @include('inc.question-nav')
    <div id="app">
        <main class="py-4">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-8 question_div">
                       @yield('content')
                            
                    </div>
                    <div class="" style="height: 50px;background:transparent;width:100%"></div>
                </div>
            </div>

           
        </main>
    </div>

@include('inc.footer')


