<?php include_once('lib/LoggedUser.php');?>
<div id="top">
	<div id="logo">
    	<img src="images/logo.png"  />
    </div>
    
    <div id="reklam">
    
    </div>

</div>
<div id="bottom">
	<div id="menu" class="menu">
    	<ul id="menu">
        	<li><a style="border-color:#F3CBCB" href="?p=item-list&c=1">Özel Ders</a></li>
        	<li><a style="border-color:#CBF3D5" href="?p=item-list&c=2">Ders Kitabı</a></li>
        	<li><a style="border-color:#CBCBF3" href="?p=item-list&c=3">Diğer</a></li>
        </ul>
    </div>
    <div id="accountMenu">
    <?php if( /*<[[TEST*/false/*TEST]]>*/ || LoggedUser::IsUserLogged()){?>
		<ul id="accountMenu" class="menu">
            <li><a style="border-color:#aaa" href="?p=logout">Çıkış</a></li>
        	<li><a style="border-color:#aaa" href="?p=profile">Profilim</a></li>
        </ul>
    <?php } else {?>
    	<ul id="accountMenu" class="menu">
        	<li><a style="border-color:#aaa" href="?p=form&f=register">Üye Ol</a></li>
        	<li><a style="border-color:#aaa" href="?p=form&f=login">Giriş Yap</a></li> 
        </ul>
    <?php } ?>
    </div>
</div>