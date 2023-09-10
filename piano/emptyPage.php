<?php
require_once dirname ( __FILE__ ) . '/Constants.php';
require_once dirname ( __FILE__ ) . '/Keys.php';
require_once dirname ( __FILE__ ) . '/util/Logger.php';
require_once dirname ( __FILE__ ) . '/models/Toiawase.php';

if (isset ( $_POST ["name"] ) ) {
    $inputName = trim ( $_POST ["name"] );
}


?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=no">
<meta name="justsystems:DeviceType" content="SmartPhoneV">
<meta name="format-detection" content="telephone=no">
<meta name="GENERATOR" content="JustSystems Homepage Builder Version 21.0.5.0 for Windows">
<title>お問合せ完了</title>
<link rel="stylesheet" href="hpbsmtparts.css" type="text/css" id="hpbsmtparts">
<link rel="stylesheet" href="container_00_14.css" type="text/css" id="hpbsmtcontainer">
<link rel="stylesheet" href="main_01_14.css" type="text/css" id="hpbsmtmain">
<link rel="stylesheet" href="user.css" type="text/css" id="hpbsmtuser">
</head>
<body id="hpb-smt-template-01-14-01" class="hpb-layoutset-02">
<div id="hpb-skip"><a href="#hpb-title">本文へスキップ</a></div>
<!-- container -->
<div id="hpb-container">
  <!-- header -->
  <div id="hpb-header">
    <div id="hpb-headerMain">
      <h1><?php print(Constants::SCHOOL_NAME)?></h1>
    </div>
  </div>
  <!-- header end --><!-- inner -->
  <div id="hpb-inner">
    <!-- title -->
    <div id="hpb-title">
      <h2><span class="ja">お問合せ 完了</span><span class="en">CONTACT&nbsp;US</span></h2>
    </div>
    <!-- title end --><!-- main -->
    <div id="hpb-main">
      <!-- contact -->
      <div id="contact">
        <div class="hpb-section">
          <form name="form1" method="post" action="endPage.php">
          <h4>準備中</h4>
          <div class="submit">
            <input  type="button" onclick="location.href='index.html'" value="　　終了　　" class="button">
          </div>
          </form>
        </div>
      </div>
      <!-- contact end -->
    </div>
    <!-- main end --><!-- navi -->
    <!-- navi end -->
  </div>
  <!-- inner end --><!-- footer -->
  <div id="hpb-footer">
    <div id="hpb-footerNav">
      <ul>
        <li id="home"><a href="index.html"><span class="ja">ホーム</span><span class="en">HOME</span></a> 
        <li id="pagetop"><a href="#hpb-container"><span class="ja">トップ</span><span class="en">TOP</span></a> 
      </ul>
    </div>
  </div>
  <!-- footer end -->
</div>
<!-- container end --></body>
</html>