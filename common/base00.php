<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=files";
$pdo=new PDO($dsn,'root',"");
date_default_timezone_set("Asia/Taipei");
session_start();


//查詢全部--all
function all($table,...$arg){
    global $pdo;
    $sql="select * from $table ";

    if(isset($arg[0]) && is_array($arg[0])){
        $tmp=[];
        foreach($arg[0] as $key => $value){
            $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }
        $sql=$sql." where " . implode(" && ",$tmp);
    }

    if(isset($arg[1])){
        $sql=$sql . $arg[1];
    }

    //echo $sql;

    return $pdo->query($sql)->fetchAll();
}

//查詢單筆--find
function find($table,$arg){
    global $pdo;

    $sql="select * from $table ";
    if(is_array($arg)){
        $tmp=[];
        foreach($arg as $key => $value){
            $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }
        $sql=$sql." where " . implode(" && ",$tmp);
    }else{
        $sql=$sql." where `id`='$arg'";
    }

    return $pdo->query($sql)->fetch();

//刪除資料del
function del($table,$arg){
    global $pdo;
    $sql="delete from $table ";

    if(is_array($arg)){
        $tmp=[];
        foreach($arg as $key => $value){
            $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }
        $sql=$sql." where " . implode(" && ",$tmp);
    }else{
        $sql=$sql." where `id`='$arg'";
    }

   // echo $sql;
    return $pdo->exec($sql);
    
    
//計算筆數
function nums($table,...$arg){
    global $pdo;
    $sql="select count(*) from $table ";


//萬用查詢
function q($sql){
    global $pdo;

    return $pdo->query($sql)->fetchAll();

//新增或更新資料
function save($table,$arg){
    global $pdo;

    if(!empty($arg as $key => $value))

    foreach($arg as $key => $value){
        if($key!='id'){




//頁面導向
function to ($url){
    header("location:".$url);
}
?>
