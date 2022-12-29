<?php
include "base_test.php";

// echo $_POST['text'];
// // $text=$_POST['text'];

$Ad->save(['text'=>$_POST['text'],'sh'=>1]);
to("../back.php?do=" . lcfirst($table));
?>