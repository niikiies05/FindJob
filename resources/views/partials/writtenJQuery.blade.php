<script type="text/javascript">
  $(document).ready(function(){
    $(".checkcategory").change(function(){
      var status = $(this).prop('checked') == true ? 1 : 0;
      var id = $(this).data('id');
      $.ajax({
        type: "GET",
        dataType: "json",
        url: '/updateCategory',
        data:{'status': status, 'id': id},
         success:function(){
          console.log('cool le grand julio !');
        }
      });
     
    });
  });  
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $(".checkuserstatus").change(function(){
      var status = $(this).prop('checked') == true ? 1 : 0;
      var id = $(this).data('id');
      $.ajax({
        type: "GET",
        dataType: "json",
        url: '/update-user-status',
        data:{'status': status, 'id': id},
         success:function(){
          console.log('cool le grand Loic !');
        }
      }); 
     
    });
  });  
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $(".checkjobstatus").change(function(){
      var status = $(this).prop('checked') == true ? 1 : 0;
      var id = $(this).data('id');
      $.ajax({
        type: "GET",
        dataType: "json",
        url: '/update-job-status',
        data:{'status': status, 'id': id},
         success:function(){
          console.log('cool le grand Loic !');
        }
      }); 
     
    });
  });  
</script>


<script>
  $(document).ready(function() {
      $('#brandIdCheck').click(function () { 
          // e.preventDefault();
          console.log('ogggg');
          alert('qsd');
      });
  });
  
  </script>    
  
  <script>
    $(() => {

        App.checkAll()


    })
</script>


