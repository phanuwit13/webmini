<?php
session_start();
if ( $_SESSION['userID'] == "" ) {
    echo "Please Login!";
    exit();
}

if ( $_SESSION['status'] != "User" ) {
    echo "This page for User only!";
    exit();
}

$con = mysqli_connect( "localhost", "root", "", "user_information" );
$con->set_charset( "utf8" );

if ( isset( $_GET["userID"] ) ) {
    $struserID = $_GET["userID"];
}

$strSQL = "SELECT * ,( YEAR(CURDATE()) - YEAR(birthdate)) AS age FROM user WHERE userID = '" . $_SESSION['userID'] . "'  ";
$objQuery = mysqli_query( $con, $strSQL );
$result = mysqli_fetch_array( $objQuery, MYSQLI_ASSOC );

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
  table {
    border-collapse: collapse;
  }

  td,
  th {
    border: 1px solid #dddddd;

    padding: 5px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }
  </style>
</head>

<body>

  <header>
    <hr width="60%">
    <h1 align="center">Welcome</h1>
    <hr width="100%">
  </header>
  <nav>
    <p><?php echo $result["username"]; ?> <a href="edit.php?userID=<?php echo $result["userID"]; ?>">edit</a>
    </p>
    <form style="text-align: right;" method="get" action="/webmini/logout.php">
      <input type="submit" title="Logout" value="Logout">
    </form>
    <hr width="100%">
  </nav>

  <main>
    <form action="saveEdit.php" method="post">
      <table align="center">
        <tr>
          <center>
            <?php
if ( $result["gender"] == "male" ) {
    $m = "male";
} else {
    $m = "female";
}
?>
            <img width="200px" style=" height:200px" src="/webmini/photo/<?php echo $m ?>.jpg" alt="">
          </center>
        </tr>
        <tr>
          <td>Username</td>
          <td><span><?php echo $result["username"]; ?> </span><input type="text" name="username"
              value="<?php echo $result["username"]; ?>" hidden>
          </td>
        </tr>
        <tr>
          <td>ชื่อ</td>
          <td><input type="text" name="firstname" value="<?php echo $result["firstname"]; ?>"></td>
        </tr>
        <tr>
          <td>นามสกุล</td>
          <td><input type="text" name="lastname" value="<?php echo $result["lastname"]; ?>"></td>
        </tr>
        <tr>
          <td>ชื่อเล่น</td>
          <td><input type="text" name="nikname" value="<?php echo $result["nikname"]; ?>"></td>
        </tr>
        <tr>
          <td>เพศ</td>
          <td><input type="text" name="gender" value="<?php echo $result["gender"]; ?>"></td>
        </tr>
        <tr>
          <td>อายุ</td>
          <td><input type="text" name="birthdate" value="<?php echo $result["birthdate"]; ?>"></td>
        </tr>
        <tr>
          <td>facebook</td>
          <td><input type="text" name="facebook" value="<?php echo $result["facebook"]; ?>"></td>
        </tr>
        <tr>

          <td>เบอร์มือถือ</td>
          <td><input type="text" name="phone" value="<?php echo $result["phone"]; ?>"></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="text" name="mail" value="<?php echo $result["mail"]; ?>"></td>
        </tr>
        <tr>
          <td>สิ่งที่สนใจ</td>
          <td><textarea name="Interests" id="" cols="30" rows="4"><?php echo $result["Interests"]; ?></textarea></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" value="แก้ไข">
            <input type="button" value="ย้อนกลับ" onclick="window.location='home.php'">
          </td>
        </tr>
      </table>
    </form>
    <center>

    </center>
  </main>
  <footer>

  </footer>
</body>

</html>
<?php
mysqli_close( $con );
?>