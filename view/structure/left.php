<?php
global $s,$c,$p;
switch($p){
    case "profile":
        ?>
            <ul class="left_menu menu">
                <li><a href="#">Şifre Değiştir</a></li>
            </ul>
        <?php
        break;
    case 'form':

        break;
    case 'item':

        break;
    case 'item-list':
    default:
        if($c != null){
            $sub_categories = category::getSubCategories($GLOBALS['c']);
            ?>
            <ul class="left_menu menu" id="sub_category_menu">
                <?php foreach($sub_categories as $sub){
                ?>
                <li <?php echo $sub->sub_category_id == $s ? 'class="selected"':'' ?>>
                    <a href="?p=item-list&c=<?php echo $c?>&s=<?php echo $sub->sub_category_id?>">
                        <?php echo $sub->name?>
                    </a>
                </li>
                <?php } ?>
            </ul>
            <?php
        }    else{
        ?>
            <ul class="left_menu menu">
                <li><a href="?p=item-list&type=latest">En yeni ilanlar</a></li>
                <li><a href="?p=item-list&type=popular">Öne çıkan ilanlar</a></li>

            </ul>
        <?php
        }
        break;
}

