

@include('inc.header')

<body class="hold-transition login-page">
   
        @include('inc.client-nav')
  
    <section class="section header-bg-img " id="home">
            <div class="bg-overlay"></div>
            <div class="header-table">
                <div class="header-table-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="text-center header-content mx-auto">
                                    <h4 class="text-white first-title mb-4">Welcome</h4>
                                    <h1 class="header-name text-white text-capitalize mb-0">I M <span class="element font-weight-bold"></span></h1>
                                    <p class="text-white mx-auto header-desc mt-4">Welcome! Please Fill Out Your Mortgage Application Citadel Mortgages is Canada’s Trusted Mortgage Agents & Brokers who will be with you through the life of your mortgage. We save you money by sourcing the best products at the best rates – not only on your first mortgage but through every subsequent renewal.  When filling out your application please be sure to list the following if it applies to you: 
                                        <ul style="list-style: url;color:#fff">
                                            <li> All other income ( Child Tax Credit, Investment income etc) </li>    
                                            <li> All assets you have  By completing the information the first time it helps to save time and ensure the best mortgage rates and terms for your mortgages needs!</li>    
                                        </ul> 
                                          
                                    </p>
                                    <div class="mt-4 pt-2">
                                        <a href="{{route('client.welcome')}}" class="btn btn-outline-custom btn-round">Continue</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="bottom_logo">
            <img src="/images/logo.png" alt="" class="img-fluid">
        </div>
 @include('inc.footer')

 <style>

.bottom_logo{
    position: fixed;
    right: 5%;
    bottom: 5%;
}
/*==========================
        2.HELPER
============================*/

.section {
    padding-top: 100px;
    padding-bottom: 100px;
    position: relative;
    background-color: #fff;
}

.text-custom{
    color: #e65f78 !important;
}

.h-100vh{
    height: 100vh;
}

.z-index{
    z-index: 2;
}

.clippath_none{
    clip-path: none !important;
}

.section-subtitle{
    max-width: 500px;
}

.btn {
    padding: 15px 32px;
    font-size: 14px;
    font-weight: 700;
    transition: all 0.5s;
    letter-spacing: 0.6px;
    color: #fff;
    box-shadow: none !important;
    text-transform: uppercase;
    outline: none !important;
}

.btn-custom{
    border:1px solid #e65f78;
    background-color: #e65f78;
}

.btn-round {
    border-radius: 30px;
}

.btn-custom:hover,
.btn-custom:focus,
.btn-custom:active,
.btn-custom.active,
.btn-custom.focus,
.btn-custom:active,
.btn-custom:focus,
.btn-custom:hover,
.open > .dropdown-toggle.btn-custom {
    color: #f3f3f3;
    background-color: #d8576f;
    border-color: #d8576f;
}

.btn-outline-custom {
    border: 2px solid #f5f5f5;
}

.btn-outline-custom:hover,
.btn-outline-custom:focus,
.btn-outline-custom:active,
.btn-outline-custom.active,
.btn-outline-custom.focus,
.btn-outline-custom:active,
.btn-outline-custom:focus,
.btn-outline-custom:hover,
.open > .dropdown-toggle.btn-outline-custom {
    color: #000;
    background-color: #fff;
    border-color: #fff;
}

.bg-overlay {
    background-color: rgba(0, 0, 0, 0.75);
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
}



/*===========================
        4.HOME
=============================*/

.header-bg-img {
    background-image: url(/dist/img/banner.jpg);
    position: relative;
    background-size: cover;
    background-position: center center;
    clip-path: polygon(0 0, 100% 0, 100% 80%, 70% 100%, 0 80%);
    width: 100%;
}

.header-content{
    max-width: 800px;
}

.header-table-center {
    display: table-cell;
    vertical-align: middle;
}

.header-table {
    display: table;
    width: 100%;
    height: 100%;
}

.header-name{
    font-size: 54px;
}

.header-desc{
    max-width: auto;
    color: rgba(255, 255, 255, 0.75) !important;
    font-size: 15px;
}
.header-desc ul li{
    list-style: url;
    color:#fff;
    font-size: 16px;
}


 </style>

<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
 <script>
 var typed = new Typed('.element', {
  strings: ['your mortgage expert! ',],
  smartBackspace: true, // Default value,
  loop: true,
  typeSpeed: 50,
  backDelay:1700,
});
 </script>
 <script>
     let broker_picture =   localStorage.getItem('broker_picture')
     let broker_banner =  localStorage.getItem('broker_banner')
     let broker_body =  localStorage.getItem('broker_body')
     let broker_button =  localStorage.getItem('broker_button')

     let agent_picture =  localStorage.getItem('agent_picture')
     let agent_license_no =   localStorage.getItem('agent_license_no')
     let agent_id =   localStorage.getItem('agent_id')
     let agent_name =   localStorage.getItem('agent_name')
     let agent_phone =   localStorage.getItem('agent_phone')
     let broker_license =   localStorage.getItem('broker_license')
     



        $('#logo').attr('src', '/storage/images/'+agent_picture )
        $('#picture').attr('src', '/storage/images/'+broker_picture )
        $('#logo').css('border-color', broker_button)
        $('#picture').css('border-color', broker_button)
        $('#button1').css('border-color', broker_button)
        $('.btn-round').css('background-color', broker_button)
        $('#agent_license').text(agent_license_no) 
        $('#agent_name').text(agent_name) 
        $('#agent_phone').text(agent_phone) 
        $('#broker_license').text(broker_license) 
        $('.navbar-white').css('background-color', broker_banner)
        $('body').css('background-color', broker_body)
        
        $("#button1").hover(function(){
      $(this).css('background-color', agent.color_system);
      }, function(){
      $(this).css("background-color", 'transparent');
      });

</script>