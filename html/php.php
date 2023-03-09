<?php
date_default_timezone_set('America/Sao_Paulo');
header('Content-Type: text/html; charset=UTF-8');
include_once '../conn.php';
if (!isset($_SESSION)) session_start();
$usuarioConn =  $_SESSION['s_usuarioConn'];
$nivelAcesso = $_SESSION['s_nivelAcesso'];
if ($nivelAcesso != '1'){$d_none = 'd-none';}
$bd =  $_SESSION['s_bd'];
$s_bd =  $_SESSION['s_bd'];
$g_tabDentista =$_GET['dentistaAgenda'];
if ($usuarioConn == '') { header('Location: index.php');}
if ($nivelAcesso != '1'){$d_none = 'd-none';}
$P_Dia = date("Y-m-01");
$P_Dia = $P_Dia . ' 00:00:01';
$U_Dia = date("Y-m-t");
?>


