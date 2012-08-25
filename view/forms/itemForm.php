<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Eren
 * Date: 8/25/12
 * Time: 10:02 AM
 * To change this template use File | Settings | File Templates.
 */
include_once('model/category.php');
function itemForm($item=null){
    if($item == null){
        $item = new stdClass();
        $item->item_id = null;
        $item->title = null;
        $item->category_id = null;
        $item->sub_category_id = null;
        $item->item_id = null;
        $item->item_id = null;
        $item->item_id = null;
    }
    ?>
        <script type="text/javascript">
            function load_sub_categories(){
                var category_id = $("#item_form select#category").val();
                $("#item_form #sub_category").get(0).disabled = true
                if(category_id == -1){
                    $("#item_form #sub_category").html('<option value="-1">Önce kategori seçiniz</option>');
                    return;
                }
                $.ajax({
                    url:'ajax/sub_category.php',
                    type:"GET",
                    data:{category_id:category_id},
                    dataType:"JSON",
                    success:function(result){
                        $("#item_form #sub_category").html('').get(0).disabled = false;
                        $("#item_form #sub_category").append('<option value="-1">Lütfen bir alt kategori seçiniz</option>');
                        for(var i=0;i<result.length;i++)
                            $("#item_form #sub_category").append('<option value="'+result[i].sub_category_id+'">'+result[i].name+'</option>');
                    }
                })
            }
        </script>
        <form id="item_form">
            <input type="hidden" name="item_id" value="<?php echo $item->item_id?>" />
            <input type="hidden" name="action" value="add_edit_item" />

            <table>
                <tr>
                    <td colspan="2" align="center" class="header">İlan Ekle</td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <select name="category" id="category" onchange="load_sub_categories()">
                            <option value="-1">Lütfen bir kategori seçiniz</option>
                            <?php foreach(category::getCategories() as $c){ ?>
                            <option value="<?php echo $c->category_id?>" <?php echo $item->category_id == $c->category_id?'selected="selected"':''?>><?php echo $c->name?></option>
                            <?php }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Alt Kategori</td>
                    <td>
                        <select name="sub_category" id="sub_category">
                            <?php if($item->category_id == NULL){?>
                            <option value="-1">Önce kategori seçiniz</option>
                            <script type="text/javascript">
                                $("#item_form #sub_category").get(0).disabled = true;
                            </script>
                            <?php } else {?>
                            <?php foreach(category::getSubCategories() as $c){ ?>
                                <option value="<?php echo $c->sub_category_id?>" <?php echo $item->category_id == $c->category_id?'selected="selected"':''?>><?php echo $c->name?></option>
                                <?php }?>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Başlık</td>
                    <td><input type="text" name="title" value="<?php echo $item->title?>" maxlength="250"  /> </td>
                </tr>
            </table>
        </form>
    <?php
}