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

$strSQL = "SELECT * FROM user WHERE userID = '" . $_SESSION['userID'] . "'  ";
$objQuery = mysqli_query( $con, $strSQL );
$objResult = mysqli_fetch_array( $objQuery, MYSQLI_ASSOC );

$sql = "SELECT * ,( YEAR(CURDATE()) - YEAR(birthdate)) AS age FROM user WHERE userID = '" . $struserID . "' ";
$query = mysqli_query( $con, $sql );
$result = mysqli_fetch_array( $query, MYSQLI_ASSOC );

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
    <p><?php echo $objResult["username"]; ?> <a href="edit.php?userID=<?php echo $result["userID"]; ?>">edit</a> </p>
    <form style="text-align: right;" method="get" action="/webmini/logout.php">
      <input type="submit" title="Logout" value="Logout">
    </form>
    <hr width="100%">
  </nav>

  <main>
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
        <td>ชื่อ</td>
        <td><?php echo $result["firstname"]; ?></td>
      </tr>
      <tr>
        <td>นามสกุล</td>
        <td><?php echo $result["lastname"]; ?></td>
      </tr>
      <tr>
        <td>ชื่อเล่น</td>
        <td><?php echo $result["nikname"]; ?></td>
      </tr>
      <tr>
        <td>เพศ</td>
        <td><?php echo $result["gender"]; ?></td>
      </tr>
      <tr>
        <td>อายุ</td>
        <td><?php echo $result["age"]; ?></td>
      </tr>
      <tr>
        <td>facebook</td>
        <td><?php echo $result["facebook"]; ?></td>
      </tr>
      <tr>
        <td>เบอร์มือถือ</td>
        <td><?php echo $result["phone"]; ?></td>
      </tr>
      <tr>
        <td>สิ่งที่สนใจ</td>
        <td><textarea name="Interests" id="" cols="30" rows="4" disabled><?php echo $result["Interests"]; ?></textarea>
        </td>
      </tr>

    </table>
    <center>
      <form method="get" action="/webmini/user/home.php">
        <input type="submit" value="ยกเลิก">
      </form>
    </center>
  </main>
  <footer>

  </footer>
</body>

</html>
<?php
mysqli_close( $con );
?>