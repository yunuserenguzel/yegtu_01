<?php

function item_atomic_view(
		$item
	){
	?>
    <div class="item item_category<?php echo $item->category?>" id="item<?php echo $item->item_id?>">
    	<div class="triangle"></div>
        <div class="icon"><img src="<?php echo $item->icon?>" /></div>
        <div class="title"><a href="?p=item&i=<?php echo $item->item_id?>"><?php echo $item->title?></a></div>
        <div class="owner"><?php echo $item->owner?></div>
        <div class="price"><?php echo $item->price?>&nbsp;TL</div>
    </div>
    
    
    <?php
	
}
