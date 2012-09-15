<?php

function item_atomic_view(
		$item
	){
	?>
    <a href="?p=item&i=<?php echo $item->item_id?>" class="item_list item_category<?php echo $item->category_id?>"  id="item<?php echo $item->item_id?>">
    	<div class="triangle" style="border-left-color: <?php echo $item->category_color?>"></div>
        <div class="icon"><img src="<?php echo 'images/'.$item->sub_category_icon?>" /></div>
        <div class="title"><?php echo $item->title?></div>
        <div class="owner"><?php echo $item->created_at?></div>
        <div class="price"><?php echo $item->price?>&nbsp;TL</div>

    </a>
    
    
    <?php
	
}
