<?php
session_start();
if ( $_SESSION['userID'] == "" ) {
    echo "Please Login!";
    exit();
}

$con = mysqli_connect( "localhost", "root", "", "user_information" );
$con->set_charset( "utf8" );
if ( isset( $_POST['userID'] ) ) {
    $struserID = $_POST['userID'];
}
$strSQL = "UPDATE user SET username = '" . $_POST['username'] . "'
	,firstname = '" . $_POST['firstname'] . "' ,lastname = '" . $_POST['lastname'] . "',nikname = '" . $_POST['nikname'] . "'
    ,gender = '" . $_POST['gender'] . "',birthdate = '" . $_POST['birthdate'] . "',facebook = '" . $_POST['facebook'] . "'
    ,mail = '" . $_POST['mail'] . "',phone = '" . $_POST['phone'] . "',Interests = '" . $_POST['Interests'] . "'
    ,status = '" . $_POST['status'] . "' WHERE userID = '" . $struserID . "' ";
$objQuery = mysqli_query( $con, $strSQL );

echo "Save Completed!<br>";

echo "<br> Go to <a href='admin_page.php'>Admin page</a>";

mysqli_close( $con );