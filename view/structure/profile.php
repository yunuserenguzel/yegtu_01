<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Eren
 * Date: 9/23/12
 * Time: 10:19 AM
 * To change this template use File | Settings | File Templates.
 */
$user = User::getUser(LoggedUser::GetUserId());
?>
<script type="text/javascript">
    function enableEdit(button){
        button.disabled = true;
        var name = $("#my_profile #name").get(0);
        var surname = $("#my_profile #surname").get(0);
        var phone = $("#my_profile #phone").get(0);
        $(name).replaceWith('<input type="text" value="'+name.innerHTML+'" />');
        $(surname).replaceWith('<input type="text" value="'+surname.innerHTML+'" />');
        $(phone).replaceWith('<input type="text" value="'+phone.innerHTML+'" />');
    }
</script>

<table id="my_profile">
    <tr>
        <td>Kullanıcı adı: </td>
        <td><?php echo $user->username; ?></td>
    </tr>
    <tr>
        <td>İsim: </td>
        <td><span id="name"><?php echo $user->name; ?></span></td>
    </tr>
    <tr>
        <td>Soyisim: </td>
        <td><span id="surname"><?php echo $user->surname; ?></span></td>
    </tr>
    <tr>
        <td>Telefon: </td>
        <td><span id="phone"><?php echo $user->phone; ?></span></td>
    </tr>
    <tr>
        <td>E-mail: </td>
        <td><?php echo $user->email; ?></td>
    </tr>
    <tr>
        <td>
            <input type="button" value="Düzenlemeyi aç" onclick="enableEdit(this)" />
        </td>
    </tr>
</table>
<div>
</div>
