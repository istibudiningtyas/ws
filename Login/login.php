<center><h2><b>Log In</b></h2></center> 
<?php
  //memulaisession
  session_start();
  //cek adanya session, jika session sudah ada maka diarahkan ke index.php 
  if (ISSET($_SESSION['username'])){
    header("location:index.php"); 
  }
?>
<form method="post" action="client.php">
  <table border="0" align="center" cellpadding="5" cellspacing="8">
    <tr>
      <td>Username : </td>
      <td><input name="username" type="text"></td> 
    </tr>
    <tr>
      <td>Password : </td>
      <td><input name="password" type="password"></td>
    </tr>
    <tr>
      <td colspan="2" align="center" height="10">
        <input name="submit" type="submit" value="Log In"> 
      </td>
    </tr>
  </table>
</form>