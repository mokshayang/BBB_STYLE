<?php
include "base_test.php";

// echo $_POST['text'];
// // $text=$_POST['text'];

$a=$Ad->save(['text'=>$_POST['text'],'sh'=>1]);
echo $a;
to("../back.php?do=ad");
?>