<?php

$con = mysqli_connect( "localhost", "root", "", "user_information" );
$con->set_charset( "utf8" );

$password = base64_encode( $_POST["password"] . "" );
$strSQL = "SELECT username FROM user";
$objQuery = mysqli_query( $con, $strSQL );
$result = mysqli_fetch_array( $objQuery, MYSQLI_ASSOC );
$query = mysqli_query( $con, $strSQL );

while ( $result = mysqli_fetch_array( $query, MYSQLI_ASSOC ) ) {
    if ( $result['username'] == $_POST["username"] ) {
        echo '<script language="javascript">';
        echo 'alert("username มีผู้ใช้แล้ว")';
        echo '</script>';

        echo '<meta http-equiv= "refresh" content="0; url=register.php"/>';
        return;

    }
}

if ( empty( $_POST["username"] ) || empty( $_POST["password"] ) || empty( $_POST["firstname"] ) || empty( $_POST["lastname"] ) || empty( $_POST["birthdate"] ) ) {
    echo '<script language="javascript">';
    echo 'alert("กรอกข้อมูลไม่ครบ!")';
    echo '</script>';
    echo '<meta http-equiv= "refresh" content="0; url=register.php"/>';
} else {
    $sql = "INSERT INTO user (username, password, firstname, lastname,nikname,gender,birthdate,facebook,mail,phone,Interests,status)
    VALUES ('" . $_POST["username"] . "','" . $password . "','" . $_POST["firstname"] . "','" . $_POST["lastname"] . "'
    ,'" . $_POST["nikname"] . "','" . $_POST["gender"] . "','" . $_POST["birthdate"] . "','" . $_POST["facebook"] . "','" . $_POST["mail"] . "','" . $_POST["phone"] . "','" . $_POST["Interests"] . "','User'); ";

    $query = mysqli_query( $con, $sql );
    if ( $query ) {
        echo '<script language="javascript">';
        echo 'alert("เพิ่มกิจกรรม สำเร็จ!")';
        echo '</script>';
        echo '<meta http-equiv= "refresh" content="0; url=index.php"/>';

    } else {
        echo '<script language="javascript">';
        echo 'alert("เพิ่มกิจกรรม ไม่สำเร็จ!")';
        echo '</script>';
    }
}

mysqli_close( $con );