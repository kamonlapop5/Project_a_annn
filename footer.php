</td>
</tr>
</body>
<td bgcolor = FCAEA9 colspan="2" height = "100">
</-------------------------------------------------------------------------------->

</-------------------------------------------------------------------------------->
</td>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
    function myFunction() {
      var password = document.getElementById("password");
      if (password.type === "password") {
        password.type = "text";
      } else {
        password.type = "password";
      }
    }

     $(document).ready(function(){
     $('#faculty').on('change', function(){
         var facultyID = $(this).val();
         if(facultyID){
             $.ajax({
                 type:'POST',
                 url:'ajaxData.php',
                 data:'faculty_id='+facultyID,
                 success:function(html){
                     $('#major').html(html);
                 }
             });
         }else{
             $('#major').html('<option value="">เลือกคณะก่อน</option>');

         }
     });
     });
     </script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
