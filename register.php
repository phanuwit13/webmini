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
        <h1 align="center">สมัครสมาชิก</h1>
        <hr width="100%">
    </header>
    <main>
    <form method="post" action="register_save.php" >
         <table align="center">
         
             <tr>
                 <td>username</td>
                 <td><input type="text" name="username"></td>
             </tr>
             <tr>
                <td>password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>ชื่อ</td>
                <td><input type="text" name="firstname"></td>
            </tr>
            <tr>
                <td>นามสกุล</td>
                <td><input type="text" name="lastname"></td>
            </tr>
            <tr>
                <td>ชื่อเล่น</td>
                <td><input type="text" name="nikname"></td>
            </tr>
            <tr>
                <td>เพศ</td>
                <td><input type="radio" name="gender" value="male"> Male <input type="radio" name="gender" value="female"> Female</td>
            </tr>
            <tr>
                <td>วันเกิด</td>
                <td><input type="date" name="birthdate"></td>
            </tr>
            <tr>
                <td>facebook</td>
                <td><input type="text" name="facebook"></td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td><input type="email" name="mail"></td>
            </tr>
            <tr>
                <td>เบอร์มือถือ</td>
                <td><input type="text" name="phone"></td>
            </tr>
            <tr>
                <td>สิ่งที่สนใจ</td>
                <td><textarea name="Interests" id="" cols="25" rows="3"></textarea></td>
            </tr>
         </table>
         <input type="submit" value="สมัครสมาชิก">
            </form>
         <center>            
           <br>
            <form method="get" action="/webmini/" >
                    <input type="submit" value="ยกเลิก">
                </form>
         </center>
    </main>
    <footer>

    </footer>
</body>
</html>