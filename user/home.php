<?php

$strKeyword = null;

if ( isset( $_POST["txtKeyword"] ) ) {
    $strKeyword = $_POST["txtKeyword"];
}
if ( isset( $_GET["txtKeyword"] ) ) {
    $strKeyword = $_GET["txtKeyword"];
}
?>
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

$strSQL = "SELECT * FROM user WHERE userID = '" . $_SESSION['userID'] . "' ";
$objQuery = mysqli_query( $con, $strSQL );
$objResult = mysqli_fetch_array( $objQuery, MYSQLI_ASSOC );

$sql = "SELECT * ,( YEAR(CURDATE()) - YEAR(birthdate)) AS age FROM user WHERE Interests LIKE '%" . $strKeyword . "%'";
$query = mysqli_query( $con, $sql );

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
    text-align: left;
    padding: 8px;
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
    <p><?php echo $objResult["username"]; ?> <a href="from.php">ข้อมูล</a> </p>
    <form style="text-align: right;" method="get" action="/webmini/logout.php">
      <input type="submit" title="Logout" value="Logout">
    </form>
    <hr width="100%">
  </nav>

  <main>
    <div align="center">
      <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
        สิ่งที่คุณสนใจ <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword; ?>">
        <button class="button b5" type="submit" class="button">ค้นหา</button>
      </form>
    </div>
    <br>
    <table width="100%" style="text-align:center">

      <tr>
        <th>ชื่อ</th>
        <th>นามสกุล</th>
        <th>เพศ</th>
        <th>อายุ</th>
        <th>ข้อมูล</th>
      </tr>
      <?php
while ( $result = mysqli_fetch_array( $query, MYSQLI_ASSOC ) ) {?>
      <tr>
        <td><?php echo $result['firstname']; ?></td>
        <td><?php echo $result['lastname']; ?></td>
        <td><?php echo $result['gender']; ?></td>
        <td><?php echo $result['age']; ?></td>

        <td><a href="dataUser.php?userID=<?php echo $result["userID"]; ?>">show</a> </td>

      </tr>
      <?php }?>

    </table>
  </main>
  <footer>

  </footer>
</body>

</html>
<?php
mysqli_close( $con );
?>