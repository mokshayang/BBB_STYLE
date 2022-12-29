<?php
include_once "base_test.php";
// dd($_POST);
//要丟改 del sh text

// foreach($_POST['id'] as $idx=>$id){
//     $row = $$table->find($id);
//     $row['text']=$_POST['text'][$idx];
//     $$table->save($row);
// }
// $row1 = $$table->find($_POST['sh']);

// foreach($_POST['id'] as $id) {
//     $row2=$$table->find($id);
//     $row2['sh']=0;
//     $$table->save($row2);
// }

// $row1['sh']=1;
// $$table->save($row1);

// foreach($_POST['del'] as $id){
//     $$table->del($id);
// }

// if(empty($$table->find(['sh'=>1]))){
//     $radio = $$table->min('id');
//     $$table->save(['sh'=>1,'id'=>$radio]);
//     // echo $raido;
// }

// ['sh'] and  ['']
$table=$_POST['table'];
foreach ($_POST['id'] as $idx => $id) {
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {//先刪除id[單筆] 比對 del=['','',''。。。。]
        $$table->del($id);
    } else {
        $row = $$table->find($id);//db = from in(ex> : 3 , 6, 9 ,11 )
        $row['text'] = $_POST['text'][$idx];//updata 賦值;
        $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $id) ? 1 : 0;

        $$table->save($row);
    }
}

//資料修改
if (!empty($$table->find(['sh' => 0]))) {
    if (empty($$table->find(['sh' => 1]))) {
        $radio = $$table->min('id');
        $$table->save(['sh' => 1, 'id' => $radio]);
    }
}

to("../back.php?do=".lcfirst($table));
