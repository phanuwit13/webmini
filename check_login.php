<?php
session_start();

$con = mysqli_connect( "localhost", "root", "", "user_information" );
$con->set_charset( "utf8" );

$strSQL = "SELECT * FROM user WHERE username = '" . mysqli_real_escape_string( $con, $_POST['txtUsername'] ) . "'
	and password = '" . mysqli_real_escape_string( $con, base64_encode( $_POST['txtPassword'] . "" ) ) . "'";
$objQuery = mysqli_query( $con, $strSQL );
$objResult = mysqli_fetch_array( $objQuery, MYSQLI_ASSOC );
if ( !$objResult ) {
    echo '<script language="javascript">';
    echo 'alert("Username and Password Incorrect!!")';
    echo '</script>';
} else {
    $_SESSION["userID"] = $objResult["userID"];
    $_SESSION["status"] = $objResult["status"];

    session_write_close();

    if ( $objResult["status"] == "Admin" ) {
        header( "location:admin/admin_page.php" );
    } else {
        header( "location:user/home.php" );
    }
}
mysqli_close( $con );
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <header>
    <hr width="60%">
    <h1 align="center">FRIEND SEARCH</h1>
    <h4>เว็บไซต์สำหรับหาเพื่อนที่สนใจสิ่งเดียวกัน</h3>
      <hr width="100%">
  </header>
  <main>
    <H3 align="center">เข้าสู่ระบบ</H3>
    <form name="form1" method="post" action="check_login.php">
      <div align="center">
        Username <input name="txtUsername" type="text" id="txtUsername"> <br><br>
        Password &nbsp;<input name="txtPassword" type="password" id="txtPassword">
      </div>
      <br>
      <div align="center">
        <input type="submit" title="เข้าสู่ระบบ" value="เข้าสู่ระบบ">
      </div>
    </form>

    <br><br>
    <form method="get" action="/webmini/register.php">
      <input type="submit" title="สมัครสมาชิก" value="สมัครสมาชิก">
    </form>

    <hr width="100%">
  </main>
  <footer>

  </footer>
</body>

</html>