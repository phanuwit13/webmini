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
$strSQL = "UPDATE user SET firstname = '" . $_POST['firstname'] . "' ,lastname = '" . $_POST['lastname'] . "',nikname = '" . $_POST['nikname'] . "'
    ,gender = '" . $_POST['gender'] . "',birthdate = '" . $_POST['birthdate'] . "',facebook = '" . $_POST['facebook'] . "'
    ,mail = '" . $_POST['mail'] . "',phone = '" . $_POST['phone'] . "',Interests = '" . $_POST['Interests'] . "'
     WHERE userID = '" . $_SESSION['userID'] . "' ";
$objQuery = mysqli_query( $con, $strSQL );

echo "Save Completed!<br>";

echo '<meta http-equiv= "refresh" content="2; url=from.php"/>';

mysqli_close( $con );