  <?php
  include("./header.php");
  include("./menu.php");
   ?>
  </-------------------------------------------------------------------------------->
   <br><center><p style="font-size:25px;">เลือกสถานนะ</p></center>
    <center><table width="100%">
      <tr>
        <td><center><button style="background-color:E98989; width:250px; height:70px" onclick="window.location='add_user.php?id=1'">ผู้ดูแลระบบ</button></center></td>
      </tr>
      <td>&nbsp;</td>
      <tr>
        <td><center><button style="background-color:E98989; width:250px; height:70px" onclick="window.location='add_user.php?id=2'">นิสิต</button></center></td>
      </tr>
      <td>&nbsp;</td>
      <tr>
        <td><center><button style="background-color:E98989; width:250px; height:70px" onclick="window.location='add_user.php?id=3'">อาจารย์ที่ปรึกษา</button></center></td>
      </tr>
      <td>&nbsp;</td>
      <tr>
        <td><center><button style="background-color:E98989; width:250px; height:70px" onclick="window.location='add_user.php?id=4'">ผู้ดูแลสถานที่</button></center></td>
      </tr>
  </table>
  </center>
  </-------------------------------------------------------------------------------->
   <?php
   include("./footer.php");
    ?>
