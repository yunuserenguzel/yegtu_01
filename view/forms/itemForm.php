<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Eren
 * Date: 8/25/12
 * Time: 10:02 AM
 * To change this template use File | Settings | File Templates.
 */
include_once('model/category.php');
function itemForm(){

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
        <form id="item_form" action="action/item.php" method="POST">
            <input type="hidden" name="action" value="create_item" />

            <table>
                <tr>
                    <td colspan="2" align="center" class="header">İlan Ekle</td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <select name="category_id" id="category" onchange="load_sub_categories()">
                            <option value="-1">Lütfen bir kategori seçiniz</option>
                            <?php foreach(category::getCategories() as $c){ ?>
                            <option value="<?php echo $c->category_id?>"><?php echo $c->name?></option>
                            <?php }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Alt Kategori</td>
                    <td>
                        <select name="sub_category_id" id="sub_category" disabled="disabled">
                            <option value="-1">Önce kategori seçiniz</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Başlık</td>
                    <td><input type="text" name="title" value="" maxlength="250"  /> </td>
                </tr>
                <tr>
                    <td style="vertical-align: top">Açıklama</td>
                    <td>
                        <textarea rows="5" name="description">
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td>Fiyat</td>
                    <td><input type="text" style="width: 5.5ex;direction: rtl;" name="price" maxlength="5"/>&ensp;TL</td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;padding-right: 50px;">
                        <input type="submit" class="submit" value="Ekle"/>
                    </td>
                </tr>
            </table>
        </form>
    <?php
}