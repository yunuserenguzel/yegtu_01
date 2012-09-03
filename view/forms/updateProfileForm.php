<?php
    include_once('model/user.php');
    $user_id = LoggedUser::GetUserId();
    $user = User::getUser($user_id);
    
?>

<form action="action/user.php" method="post">
    <input type="hidden" name="action" value="updateProfile"/>
    <table><br>
        <tr>
            <td>First Name</td>
            <td>:</td>
            <td><input type="text" value="<?php echo $user->name ?>" /></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td>:</td>
            <td><input type="text" value="<?php echo $user->surname ?>" /></td>
        </tr>
        <tr>
            <td>User Name</td>
            <td>:</td>
            <td><input type="text" value="<?php echo $user->username ?>" /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="text" value="<?php echo $user->password ?>" /></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="text" value="<?php echo $user->email ?>" /></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>:</td>
            <td><input type="text" value="<?php echo $user->phone ?>" /></td>
        </tr>
  
    </table><br>
    <input type="submit" value="Update" />
</form>

