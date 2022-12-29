<?php
include_once "base_test.php";
// dd($_POST);
//要丟改 del sh text

// foreach($_POST['id'] as $idx=>$id){
//     $row = $Title->find($id);
//     $row['text']=$_POST['text'][$idx];
//     $Title->save($row);
// }
// $row1 = $Title->find($_POST['sh']);

// foreach($_POST['id'] as $id) {
//     $row2=$Title->find($id);
//     $row2['sh']=0;
//     $Title->save($row2);
// }

// $row1['sh']=1;
// $Title->save($row1);

// foreach($_POST['del'] as $id){
//     $Title->del($id);
// }

// if(empty($Title->find(['sh'=>1]))){
//     $radio = $Title->min('id');
//     $Title->save(['sh'=>1,'id'=>$radio]);
//     // echo $raido;
// }

foreach($_POST['id'] as $idx =>$id){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $Title->del($id);
    }else{
        $row=$Title->find($id);
        $row['text']=$_POST['text'][$idx];
        $row['sh']=(isset($_POST['sh']) && $_POST['sh']==$id)?1:0;

        $Title->save($row);
    }
}
if(empty($Title->find(['sh'=>1]))){
    $radio = $Title->min('id');
    $Title->save(['sh'=>1,'id'=>$radio]);
    
}

to("../back.php?do=title");

?>