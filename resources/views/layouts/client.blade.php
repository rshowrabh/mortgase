@include('inc.header')
<body class="">
<div class="wrapper" id='app'>

  <!-- Navbar -->
  @include('inc.client-nav')
  <!-- /.navbar -->

 

  <!-- Content Wrapper. Contains page content -->

  
  <div class="content-wrapper">
    <v-app>
       <vue-progress-bar></vue-progress-bar>
       @yield('content')
    </v-app>
     
  </div>
  <!-- /.content-wrapper -->


@include('inc.footer')
<script>
     let broker_picture =   localStorage.getItem('broker_picture')
     let  broker_banner =  localStorage.getItem('broker_banner')
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
        $('.navbar-white').css('background-color', broker_banner)
        $('body').css('background-color', broker_body)
        $('#agent_license').text(agent_license_no) 
        $('#agent_name').text(agent_name) 
        $('#agent_phone').text(agent_phone) 
        $('#broker_license').text(broker_license) 
        
        $("#button1").hover(function(){
      $(this).css('background-color', agent.color_system);
      }, function(){
      $(this).css("background-color", 'transparent');
      });

</script>

<style>
   #logo, #picture{
        height: 100px;
        padding: 5px;
        border:1px solid transparent;
    }
</style>
