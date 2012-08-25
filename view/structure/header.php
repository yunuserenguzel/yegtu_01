<?php include_once('lib/LoggedUser.php');?>
<div id="top">
	<div id="logo">
    	<a href="./"><img src="images/logo.png"  /></a>
    </div>
    
    <div id="reklam">
        <script type="text/javascript"><!--
        google_ad_client = "ca-pub-1815361050557063";
        /* Biltrader - header */
        google_ad_slot = "6830842921";
        google_ad_width = 728;
        google_ad_height = 90;
        //-->
        </script>
        <script type="text/javascript"
                src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>
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
    <div id="add_item_button">
        <a href="./?p=form&f=item">+ İlan Ekle</a>
    </div>
    <div id="accountMenu">
    <?php if( /*<[[TEST*/true/*TEST]]>*/ || LoggedUser::IsUserLogged()){?>
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