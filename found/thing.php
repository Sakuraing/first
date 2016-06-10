<?php
header("content-type:text/plain;charset=utf-8");
//定义一个数组
$pThing = arry
    (
	    array('tName' =>'钱包' ,'site' =>'芷园','pTime' =>'2016-05-01','state'=>'待认领','pName'=>'Jane','pTel'=>'640911' ,'describe'=>'xxx身份证，现金xx元，农业银行卡一张：602222xxxx124355868533'),
        array('tName' =>'钥匙' ,'site' =>'校巴','pTime' =>'2016-05-04','state'=>'待认领','pName'=>'Pen','pTel'=>'640922' ,'describe'=>'三个不同的钥匙，小熊挂饰一个'),
        array('tName' =>'包包' ,'site' =>'教三','pTime' =>'2016-05-08','state'=>'待认领','pName'=>'Jane','pTel'=>'640933','describe'=>'有两本笔记本，一本大物的书' ),
        array('tName' =>'校园卡' ,'site' =>'湿地公园','pTime' =>'2016-05-12','state'=>'待认领','pName'=>'Jane','pTel'=>'640944' ,'describe'=>'数学与信息学院网络工程专业5班，学号为201430350512的xxx')
    );
//判断如果是get请求，则进行搜索；如果是POST请求，则进行新建
//$_SERVER是一个超全局变量，在一个脚本的全部作用域中都可用，不用使用global关键字
//$_SERVER["REQUEST_METHOD"]返回访问页面使用的请求方法
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	search();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
	create();
}  

function search(){
	$jsonp = $_GET["callback"];
	//判断信息是否写全
	if(!isset($_POST["tName"])||empty($_POST["tName"])
		||!isset($_POST["site"])||empty($_POST["site"])
		||!isset($_POST["lTime"])||empty($_POST["lTime"])
		||!isset($_POST["state"])||empty($_POST["state"])){
		echo "{"success":false,"msg":"信息填写不全！请填写完整，方便我们正确定位查找您丢失的物品。"}";
		return;
	}
	//函数之外声明的变量拥有 Global 作用域，只能在函数以外进行访问。
	//global 关键词用于访问函数内的全局变量
	global $staff;
	//获取number参数
	$tName = $_GET["tName"];
	$site =$_GET["site"];
	$lTime = $_GET["lTime"];
	$result = $jsonp . '({"success":false,"msg":"没有找到与信息相符的物品。"})';
	
	//遍历$staff多维数组，查找key值为number的员工是否存在，如果存在，则修改返回结果
	foreach ($pThing as $value) {
		if($value["tName"]==$tName){
			$result = $jsonp.'({"success":true,"msg":"物品名称：'$value["tName"].',
			捨得地点：'$value["site"].',
            捨得时间：'$value["pTime"].',
			"})';
		}
	}

}

function creat(){
	//判断信息是否写全
	if(!isset($_POST["tName"])||empty($_POST["tName"])
		||!isset($_POST["site"])||empty($_POST["site"])
		||!isset($_POST["time"])||empty($_POST["time"])
		||!isset($_POST["state"])||empty($_POST["state"])
		||!isset($_POST["pName"])||empty($_POST["pName"])
		||!isset($_POST["pTel"])||empty($_POST["pTel"])){
		echo "{"success":false,"msg":"信息填写不全！请填写完整，方便我们联系您。"}";
		return;
	}
	//TODO: 获取POST表单数据并保存到数据库
	
	//提示保存成功
	echo '{"success":true,"msg":"物品：' . $_POST["tName"] . ' 信息保存成功！"}';
}




?>