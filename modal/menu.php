<h3>新增主選單</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
      
        <tr>
            <td>主選項名稱 :</td>
            <td>
                <input type="text" name="name">
            </td>
            <td>選單連結網址 : </td>
            <td>
                <input type="text" name="href">
            </td>
        </tr>
    </table>
    <input type="reset" value="重置">
    <input type="hidden" name="table" value="Menu">
    <input type="submit" value="新增">
</form>