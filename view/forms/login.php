<form action="./action/user.php" method="post">
    <input type="hidden" name="action" value="login" />
    <table>
        <tr>
            <td>E-mail</td>
            <td><input type="text" name="email" /></td>
        </tr>
        <tr>
            <td>Şifre</td>
            <td><input type="password" name="password" /></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Giriş" />
            </td>
        </tr>
    </table>
</form>