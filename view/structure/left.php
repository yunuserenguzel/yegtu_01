<?php
global $s,$c,$p;
switch($p){
    case 'item-list':
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
        }

        break;
}
?>
