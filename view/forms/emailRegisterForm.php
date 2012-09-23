<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Eren
 * Date: 9/2/12
 * Time: 1:01 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<script type="text/javascript">
    function formCheck(form){
        if($('#userName').val() == ""){
            alert("Lütfen mail adresinizi yazınız.");
            return false;
        }
    }
</script>
<form id="email_register_form" action="action/user.php" method="post" onsubmit="return formCheck(this)">
<input type="hidden" name="action" value="email_registration" />
<table>
    <tr>
        <td>E-mail</td>
        <td>
            <input type="text" name="email[]" id="userName" maxlength="30" />
            &nbsp;@&nbsp;
            <select name="email[]">
                <option value="ug">ug.bilkent.edu.tr</option>
                <option value="-">bilkent.edu.tr</option>
                <option value="ie">ie.bilkent.edu.tr</option>
                <option value="ctp">ctp.bilkent.edu.tr</option>
                <option value="bim">bim.bilkent.edu.tr</option>
                <option value="bups">bups.bilkent.edu.tr</option>
                <option value="bcc">bcc.bilkent.edu.tr</option>
                <option value="cs">cs.bilkent.edu.tr</option>
                <option value="ee">ee.bilkent.edu.tr</option>
                <option value="fen">fen.bilkent.edu.tr</option>
                <option value="unam">uname.bilkent.edu.tr</option>
                <option value="alumni">alumni.bilkent.edu.tr</option>
            </select>
        </td>

    </tr>
    <tr>
        <td colspan="2"style="text-align: center;">
            <input type="submit" value="Kayıt olma linkini email adresime gönder">
        </td>
    </tr>
</table>
</form>