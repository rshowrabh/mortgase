

<footer id='footer' style="width:100%;positon:relative">
  <div class="text-center d-flex justify-content-center">
    <h3 style='line-height:50px;color:#fff'>Copyright Your Mortgage Appy</h3>
    <div style="position: fixed;right:0;bottom:0">
      <img width="100px"  class='img-fluid float-right' src="/images/logo.png" alt="">
    </div>
  </div>
</footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->

<!-- ./wrapper -->
  
  <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')

 <script>
  
     let broker_picture =   localStorage.getItem('broker_picture')
     let broker_banner =  localStorage.getItem('broker_banner')
     let broker_body =  localStorage.getItem('broker_body')
     let broker_button =  localStorage.getItem('broker_button')
     let broker_logo =  localStorage.getItem('broker_logo')

     let agent_picture =  localStorage.getItem('agent_picture')
     let agent_license_no =   localStorage.getItem('agent_license_no')
     let agent_id =   localStorage.getItem('agent_id')
     let agent_name =   localStorage.getItem('agent_name')
     let agent_phone =   localStorage.getItem('agent_phone')
     let broker_license =   localStorage.getItem('broker_license')
     


       let  lighter_body =  broker_body.replace(/FF/g, "AA");

        $('#logo').attr('src', '/storage/images/'+ broker_logo )
        $('#picture').attr('src', '/storage/images/'+agent_picture )
        $('#logo').css('border-color', broker_button)
        $('#picture').css('border-color', broker_button)
        $('#button1').css('border-color', broker_button)
        $('.btn-round').css('background-color', broker_button)
        $('.btn-round').css('border-color', broker_button)
        $('#agent_license').text(agent_license_no) 
        $('#agent_name').text(agent_name) 
        $('#agent_phone').text(agent_phone) 
        $('#broker_license').text(broker_license) 
        $('nav').css('background-color', broker_banner)
        $('body').css({'background-color': lighter_body})
        $('#footer').css('background', broker_body)
        
        $("#button1").hover(function(){
      $(this).css('background-color', agent.color_system);
      }, function(){
      $(this).css("background-color", 'transparent');
      });  
</script>

</body>

</html>