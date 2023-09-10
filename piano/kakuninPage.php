<?php
require_once dirname ( __FILE__ ) . '/Constants.php';
require_once dirname ( __FILE__ ) . '/Keys.php';
require_once dirname ( __FILE__ ) . '/util/Logger.php';
require_once dirname ( __FILE__ ) . '/models/Toiawase.php';
session_start();
$toiawase = null;
if (isset($_SESSION[Keys::TOIAWASE])){
    $toiawase = $_SESSION[Keys::TOIAWASE];
}
if ($toiawase != null){
    $toiawase->clear();
    if (isset ( $_POST ["message"] ) ) {
        $toiawase->setMessage( trim ( $_POST ["message"] ));
    }
    if (isset ( $_POST ["name"] ) ) {
        $toiawase->setName( trim ( $_POST ["name"] ));
    }
    if (isset ( $_POST ["nameKana"] ) ) {
        $toiawase->setNameKana( trim ( $_POST ["nameKana"] ));
    }
    if (isset ( $_POST ["email"] ) ) {
        $toiawase->setEmail( trim ( $_POST ["email"] ));
    }
    if (isset ( $_POST ["tel"] ) ) {
        $toiawase->setTel( trim ( $_POST ["tel"] ));
    }
} else {
    $toiawase = new Toiawase();
    $appError = "不具合発生:$toiawase is null.";
}
//チェック
$okMessage = "よろしければ、「送信」ボタンを押してください。";
$errorMessage = $toiawase ->validate();
$buttonTitle = "　　送信　　";
$string_disabled = "";
if ($errorMessage != ""){
    $okMessage = "";
    $string_disabled = "disabled";
    $buttonTitle = "　　----　　";
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
<title>お問合せ確認</title>
<link rel="stylesheet" href="hpbsmtparts.css" type="text/css" id="hpbsmtparts">
<link rel="stylesheet" href="container_00_14.css" type="text/css" id="hpbsmtcontainer">
<link rel="stylesheet" href="main_01_14.css" type="text/css" id="hpbsmtmain">
<link rel="stylesheet" href="user.css" type="text/css" id="hpbsmtuser">
</head>
<body id="hpb-smt-template-01-14-01" class="hpb-layoutset-02">
<div id="hpb-skip"></div>
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
      <h2><span class="ja">内容の確認</span><span class="en">CONTACT&nbsp;US</span></h2>
    </div>
    <!-- title end --><!-- main -->
    <div id="hpb-main">
      <!-- contact -->
      <div id="contact">
        <div class="hpb-section">
          <!-- <h3>内容のご確認</h3> -->
          <!--  <form action="" method="get"> -->
          <form name="form1" method="post" action="endPage.php">
          <p><span><?php print($okMessage); ?></span><span style="color: red;"><?php print($errorMessage); ?></span></p>
          <p>内容を修正される場合は、「戻る」ボタンを押してください。</p>
          <div class="section">
            <div><textarea name="message" class="l" cols="40" rows="12" disabled><?php print($toiawase->getMessage()); ?></textarea> </div>
          </div>
          <h4>お名前（漢字）</h4>
          <div class="section">
            <div><input type="text" name="name" value="<?php print($toiawase->getName()); ?>" class="m" disabled> </div>
          </div>
          <h4>お名前（フリガナ）</h4>
          <div class="section">
            <div><input type="text" name="nameKana"  value="<?php print($toiawase->getNameKana()); ?>"class="m" disabled> </div>
          </div>
          <h4>E-Mail</h4>
          <div class="section">
            <div><input type="text" name="email" value="<?php print($toiawase->getEmail()); ?>" class="l" disabled> </div>
          </div>
          <h4>電話番号（半角）</h4>
          <div class="section">
            <div><input type="text" name="tel" value="<?php print($toiawase->getTel()); ?>" class="l" disabled> </div>
          </div>
          <p><span><?php print($okMessage); ?></span><span style="color: red;"><?php print($errorMessage); ?></span></p>
          <div class="submit">
            <div><input type="submit" value="<?php print($buttonTitle); ?>" class="button" <?php print($string_disabled); ?>>
            <input  type="button" onclick="location.href='toiawasePage.html'" value="　　戻る　　" class="button"> </div>
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