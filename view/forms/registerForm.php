<form action="action/user.php" method="post" id="registerForm">
    <input type="hidden" name="action" value="register"/>
    <input type="hidden" name="email" value="<?php echo $_GET['email'];?>"   />
    <table>
        <tr>
            <td>Kullanıcı adı</td>
            <td><input type="text" name="username" /></td>
        </tr>
        <tr>
            <td>Şifre</td>
            <td><input type="password" name="password" /></td>
        </tr>
        <tr>
            <td>Şifre tekrar</td>
            <td><input type="password" name="password_retry" /></td>
        </tr>
    </table>
    <input type="submit" value="Submit" />

</form>
