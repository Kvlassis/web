<?php
session_start();
$db=mysqli_connect("localhost","root","","dbweb21");
mysqli_query($db,"set names 'utf8'");


if($_GET["q"]==1)
{
	$sql="insert into users(username,password,email) values ('$_POST[usr]','$_POST[pwd]','$_POST[eml]')";
	if(mysqli_query($db,$sql))
	{
		echo 1;
	}
	else
	{
		echo 0;
	}


}


if($_GET["q"]==2)
{
	$sql="select * from users where username='$_POST[usr]' and password='$_POST[pwd]'";
	$t=mysqli_query($db,$sql);
	if(mysqli_num_rows($t)>0)
	{
	
		$r=mysqli_fetch_assoc($t);
		$_SESSION["login"]=$r['id'];
		echo 1;
		
	}
	else
	{
		echo 0;
		$_SESSION["login"]="";
	}


}


if($_GET["q"]==3)
{
	$sql="insert into users_poi(id_user,id_poi,datetime1,persons) values ('$_SESSION[login]','$_POST[idpoi]',now(),$_POST[num])";
	if(mysqli_query($db,$sql))
	{
		echo 1;
	}
	else
	{
		echo 0;
	}


}



if($_GET["q"]==4){

$sql="select distinct type from types";
	$t=mysqli_query($db,$sql);
	$A=[];
	while($r=mysqli_fetch_assoc($t))
	{
		$A[]=$r;
	}

	echo json_encode($A);
}




if($_GET["q"]==5){
$hour1=date("H"); $day1=date("l");
$sql="select *, pois.id as idp from pois, pois_freq,types 
	where pois.id=types.id_poi and pois_freq.id_poi=pois.id
	and types.type='$_GET[tp]' and pois_freq.day1='$day1' and pois_freq.hour1='$hour1'";
	$t=mysqli_query($db,$sql);
	$A=[];
	while($r=mysqli_fetch_assoc($t))
	{
		$A[]=$r;
	}

	echo json_encode($A);
}



if($_GET["q"]==6)
{
	$sql="update users set username='$_POST[usr]',password='$_POST[pwd]',email='$_POST[eml]' where id='$_SESSION[login]'";
	if(mysqli_query($db,$sql))
	{
		echo 1;
	}
	else
	{
		echo 0;
	}


}

if($_GET["q"]==7)
{
	$sql="select * from users where id='$_SESSION[login]'";
	$t=mysqli_query($db,$sql);
	if(mysqli_num_rows($t)>0)
	{
	
		$r=mysqli_fetch_assoc($t);
		
		echo json_encode($r);
		
	}
	else
	{
		echo 0;
		
	}


}


if($_GET["q"]==8)
{


    $sql = "select * from diloseis where id_user='$_SESSION[login]'";

    $t=mysqli_query($db,$sql);
    if(mysqli_num_rows($t)==0)
    {
        $sql="insert into diloseis(id_user,date1) values ('$_SESSION[login]','$_POST[date1]')";
        if(mysqli_query($db,$sql))
        {
            echo 1;
        }
        else
        {
            echo 0;
        }

    }
    else{
    $sql = "select datediff(now(),max(date1)) as dt from diloseis where id_user='$_SESSION[login]'";

    $t=mysqli_query($db,$sql);
    $r=mysqli_fetch_assoc($t);
    if($r['dt']>14){

    $sql="insert into diloseis(id_user,date1) values ('$_SESSION[login]','$_POST[date1]')";
    if(mysqli_query($db,$sql))
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
    }
    else echo 0;
}

}


if($_GET["q"]==9)
{

    $sql="
    select mypoi.id1 as id1, mypoi.name as name1, mypoi.datetime1 as date1 from 

    (select name,datetime1, pois.id as id1 from pois, users_poi
    where pois.id=users_poi.id_poi
    and users_poi.id_user=$_SESSION[login]
    and datediff(now(),datetime1)<7) as mypoi,
    (

    select datetime1,date1,pois.id as id1 from pois, users_poi, diloseis
        where pois.id=users_poi.id_poi
        and datediff(now(),datetime1)<7
        and diloseis.id_user=users_poi.id_user
        and users_poi.id_user<>$_SESSION[login]


    ) as userspoi

    where abs(mypoi.datetime1-userspoi.datetime1)<3600*2
    and mypoi.id1=userspoi.id1
    and abs(datediff(userspoi.date1,mypoi.datetime1))<=7

    ";
    $t=mysqli_query($db,$sql);

    $A=[];
    while($r=mysqli_fetch_assoc($t))
    {
        $A[]=$r;
    }


    echo json_encode($A);

}



if($_GET["q"]==10)
{
	$sql="
	select * from pois, users_poi
	where
	pois.id=users_poi.id_poi
	and users_poi.id_user=$_SESSION[login] ;
	
	
	";
	$t=mysqli_query($db,$sql);
	
	$A=[];
	while($r=mysqli_fetch_assoc($t))
	{
		$A[]=$r;
	}
	

	echo json_encode($A);

}


if($_GET["q"]==11)
{
	$sql="
	select * from diloseis where id_user=$_SESSION[login]
	
	";
	$t=mysqli_query($db,$sql);
	
	$A=[];
	while($r=mysqli_fetch_assoc($t))
	{
		$A[]=$r;
	}
	

	echo json_encode($A);

}


?>