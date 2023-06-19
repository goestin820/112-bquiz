<!-- 直接複製modal/title.php程式碼 -->

<h3>新增校園映像資料圖片</h3>
<hr>
<!-- <form action="./api/add_title.php" method="post" enctype="multipart/form-data"> -->
<form action="./api/add_image.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>校園映像資料圖片：</td>
            <td><input type="file" name='img'></td>
        </tr>
        <!-- <tr>
            <td>標題區替代文字：</td>
            <td><input type="text" name="text"></td>
        </tr> -->
        <tr>
            <!-- 在每個modal的程式碼中，新增hidden隱藏欄位 -->
            <input type="hidden" name="table" value="image">
            <td><input type="submit" value="新增"></td>
            <td><input type="reset" value="重置"></td>
        </tr>
    </table>
</form>




<?php

// switch ($_GET['do']) {
//     case 'title':
//         echo "HI";
//         break;
// }

?>