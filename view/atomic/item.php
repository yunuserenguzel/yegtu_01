<?php

function item_atomic_view(
		$item
	){
	?>
    <div class="item_list item_category<?php echo $item->category_id?>"  id="item<?php echo $item->item_id?>">
    	<div class="triangle" style="border-left-color: <?php echo $item->category_color?>"></div>
        <div class="icon"><img src="<?php echo $item->icon?>" /></div>
        <div class="title"><a href="?p=item&i=<?php echo $item->item_id?>"><?php echo $item->title?></a></div>
        <div class="owner"><?php echo $item->owner?></div>
        <div class="price"><?php echo $item->price?>&nbsp;TL</div>
    </div>
    
    
    <?php
	
}
