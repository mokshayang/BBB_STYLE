<?php
include_once "../api/base_test.php";
//因為此頁面是屬於 ajax
?>
<h3>編輯次選單</h3>
<!-- 需要單獨一隻API -->
<?=$_GET['id']?>
<hr>
<form action="./api/submenu.php" method="post" enctype="multipart/form-data">
    <table  id="content">
        <tr>
            <td>次選項名稱 :</td>
            <td>次選單連結網址 : </td>
            <td>刪除</td>
        </tr>
        <?php
        $rows = $Menu->all(['parent'=>$_GET['id']]);
        foreach($rows as $row){
        ?>
        <tr >
            <td>
                <input type="text" name="name[]" value="<?=$row['name']?>">
            </td>
            <td>
                <input type="text" name="href[]" value="<?=$row['href']?>">
            </td>
            <td>
                <input type="checkbox" name="del[]" value="<?=$row['id']?>">
            </td>
            <input type="hidden" name="id[]" value="<?=$row['id']?>" >
        </tr>
    
        <?php } ?>
    </table>
    <input type="reset" value="重置">
    <input type="hidden" name="parent" value="<?=$_GET['id']?>">
    <input type="hidden" name="table" value="Menu">
    <input type="submit" value="修改確定">
    <input type="button" value="更多次選單" onclick="more()">
</form>
<script>
function more(){
    let html = `
        <tr>
            <td><input type="text" name="add_name[]" ></td>
            <td><input type="text" name="add_href[]"></td>
            <td></td>
        </tr>`
        // $('#content').append(html);
        $('#content').append(html);
        console.log($('#content'));
}
</script>