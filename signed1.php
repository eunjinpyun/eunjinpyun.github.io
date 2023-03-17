<?

include "../common/dbconn.inc";
session_start();

$sessionid = $scid;
if ($scid) {
 $query = "select mem_id from ewha71_session where session_id='$sessionid'";
 $result = mysql_query($query, $dbconn);
 $rows  = mysql_num_rows($result);
// echo ("rows is $rows<br>");
// echo("sessionis is $sessionid<br>");

 if (!$mem_id)  {
 ?>
 <html>
 <HEAD>
    <meta charset="UTF-8">
    <TITLE>이화여고71년졸업생주소록</TITLE>
</HEAD>
   <script language="javascript">
   alert("주소록 로그인을 하셔야 이용하실 수 있습니다.\n\nYou need to login to use this service.");
   history.back();
   </script>
  </html>
 <?
 }
else {

// $mem_id  = mysql_result($result, 0, 0);
 $query =  "update ewha71_session set mem_id ='$mem_id', mem_name='$name' where session_id='$sessionid'";

// echo ("from signed.php: query = $query <br>");
$result = mysql_query($query, $dbconn);
// echo("from signed.php: result= $result");
 
?>
<html>

<head>
    <meta charset="UTF-8">
<title>이화71 주소록</title>
 
 
  <style type="text/css">
  //<!--
  body {  font-family: Arial, Helvetica, sans-serif; font-size: 12pt}
  th   {  font-family: Arial, Helvetica, sans-serif; font-size: 12pt; font-weight: bold; background-color: #D3DCE3;}
  td   {  font-family: Arial, Helvetica, sans-serif; font-size: 12pt; text-align: center;}
  form   {  font-family: Arial, Helvetica, sans-serif; font-size: 12pt}
  h1   {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 16pt; font-weight: bold}
  A:link    {  font-family: Arial, Helvetica, sans-serif; font-size: 12pt; text-decoration: none; color: black}
  A:visited {  font-family: Arial, Helvetica, sans-serif; font-size: 12pt; text-decoration: none; color: black}
  A:hover   {  font-family: Arial, Helvetica, sans-serif; font-size: 12pt; text-decoration: underline; color: red;}
  A:link.nav {  font-family: Verdana, Arial, Helvetica, sans-serif; color: #000000}
  A:visited.nav {  font-family: Verdana, Arial, Helvetica, sans-serif; color: #000000}
  A:hover.nav {  font-family: Verdana, Arial, Helvetica, sans-serif; color: red;}
  .nav {  font-family: Verdana, Arial, Helvetica, sans-serif; color: #000000}

  //-->

  </style>
</HEAD>
<BODY bgColor=#ffffff>
<CENTER>
<SCRIPT language=JavaScript>
function hash(form) {
        return true;
    }
</SCRIPT>
    <!-- SpaceID=150500018 loc=Z noad -->


  <TABLE border=0 cellPadding=0 cellSpacing=0>

    <tr height="45">
        <TD colspan="2" align=middle>

     	     <FONT face=arial><B>Ewha71 Address Book <br><br><br>
     	       <img src="images/badge.gif">
     	       <br><br><?=$name?> 님<br>환영합니다 </B></FONT><br>
             <TR height="75">
       		<TD>
       		<FORM action="set_pw.php?name=&mem_id=" method=post name=form onsubmit="return hash(this)" >
       		<p align="right"><INPUT name=.save type=submit value="로그아웃">&nbsp;&nbsp;&nbsp;</p>
       		</form>
       		</TD>
       		<TD>
       		<FORM action="logout.php?name=&mem_id=" method=post name=form onsubmit="return hash(this)" >
       		<p align="left"><INPUT name=.save type=submit value="로그아웃">&nbsp;&nbsp;&nbsp;</p>
       		</form>
       		</TD>
       	</TR>
      <TR>
	<TD colspan="2" align=middle>
             <FONT face=arial  size=-1><br>
           <a href="memberlike_srch.php?n_srch=<?=$name?>"><b>내정보 확인하기</b></a> <br><br><br><br>
  	<a href="namesrch.htm"><b>이름으로 검색</b></a> <b> / </b>  <a href="addr.htm"><b>주소로 검색</b></a>    <br><br>

          <br><br>
          <b>
<a href="list.php?comm=전체동창"> 전체 </a>
( <a href="list.php?comm=국내거주">국내거주</a>
  / <a href="list.php?comm=해외거주">해외거주</a>
  / <a href="list.php?comm=찾아보기">찾아보기</a>
  / <a href="list.php?comm=사망">사망</a>
)
</b>
<br><br><br><br>
<font size=3>반별주소록</font>
<b> (
          <!-- a href="class.htm">반별주소록</a> &nbsp;&nbsp;  -->
          <a href="list.php?comm=인">인</a> /
          <a href="list.php?comm=의">의</a> /
          <a href="list.php?comm=예">예</a> /
          <a href="list.php?comm=지">지</a> /
          <a href="list.php?comm=진">진</a> /
          <a href="list.php?comm=선">선</a> /
          <a href="list.php?comm=미">미</a> /
          <a href="list.php?comm=신">신</a> /
          <a href="list.php?comm=희">희</a> /
          <a href="list.php?comm=애">애</a>
          )
  </b>        <br>
  <br><br><br><br>
  <font size=3>소모임</font>
  <b> (
            <!-- a href="class.htm">반별주소록</a> &nbsp;&nbsp;  -->
            <a href="list.php?comm=이화골프">이화골프</a> /
            <a href="list.php?comm=이금회">이금회</a> /
            <a href="list.php?comm=새빛회">새빛회</a> /
            <a href="chorus.php">합창단</a>
            )
    </b>        <br>

 <!--
           <a href="suchup.php">동기수첩용 주소록</a>  <br><br>
           <a href="teachers_list.php">선생님 리스트</a> &nbsp;&nbsp;
           <a href="phonem.php">핸드폰번호 리스트</a> &nbsp;&nbsp;
-->
             </FONT><br><br><br>

            </td>
       </tr>

    </TABLE>

</CENTER>
</BODY>
</HTML>
<?
}
}
else {
?>
<title>이화71 주소록 </title>
   <script language="javascript">
   alert("주소록 로그인을 하셔야 이용하실 수 있습니다.\n\nYou need to login to use this service.");
       history.back();
   </script>
<?
 }
?>
