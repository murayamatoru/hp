<?php
require_once dirname ( __FILE__ ) . '/Constants.php';
require_once dirname ( __FILE__ ) . '/Keys.php';
require_once dirname ( __FILE__ ) . '/util/Logger.php';
require_once dirname ( __FILE__ ) . '/models/Toiawase.php';
session_start();
$toiawase = new Toiawase();
if (isset($_GET['taiken']) && $_GET['taiken'] == "lesson"){
    $toiawase->setTaikenLesson(true);
}
if (isset($_GET['from']) && $_GET['from'] == "index"){
    if (isset($_SESSION[Keys::TOIAWASE])){
        unset($_SESSION[Keys::TOIAWASE]);
    }
} else {
    if (isset($_SESSION[Keys::TOIAWASE])){
        $toiawase = $_SESSION[Keys::TOIAWASE];
    }
}
$messageForTitle = "お問合せ";
$messageForTaiken = "";
if ($toiawase->isTaikenLesson()){
    $messageForTitle = "体験レッスンのお申込み";
    $messageForTaiken = "<p>年齢（学年）、ピアノ歴（年数）のご記入をお願い致します。</p>";
}
$_SESSION[Keys::TOIAWASE] = $toiawase;
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
<title>お問合せ入力</title>
<link rel="stylesheet" href="hpbsmtparts.css" type="text/css" id="hpbsmtparts">
<link rel="stylesheet" href="container_00_14.css" type="text/css" id="hpbsmtcontainer">
<link rel="stylesheet" href="main_01_14.css" type="text/css" id="hpbsmtmain">
<link rel="stylesheet" href="user.css" type="text/css" id="hpbsmtuser">

<style type="text/css">
    <!-- 
  body{
  margin-right: auto;
  margin-left : auto;
  max-width : 800px;
}
    -->
  </style>
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
      <h2><span class="ja"><?php print($messageForTitle); ?></span><span class="en">CONTACT&nbsp;US</span></h2>
    </div>
    <!-- title end --><!-- main -->
    <div id="hpb-main">
      <!-- contact -->
      <div id="contact">
        <div class="hpb-section">
          <!--  <h3>以下に入力してください</h3> -->
          <p>*は必須項目です。</p>
          <!--  <form action="" method="get"> -->
          <form name="form1" method="post" action="kakuninPage.php">
          <h4>お問合せ内容*</h4>
          <?php print($messageForTaiken);?>
          <div class="section">
            <div><textarea name="message" class="l" cols="40" rows="12"><?php print($toiawase->getMessage()); ?></textarea> </div>
          </div>
          <h4>お名前（漢字）*</h4>
          <div class="section">
            <div><input type="text" name="name" value="<?php print($toiawase->getName()); ?>" class="m"> </div>
          </div>
          <h4>お名前（フリガナ）*</h4>
          <div class="section">
            <div><input type="text" name="nameKana"  value="<?php print($toiawase->getNameKana()); ?>"class="m"> </div>
          </div>
          <h4>E-Mail*</h4>
          <div class="section">
            <div><input type="text" name="email" value="<?php print($toiawase->getEmail()); ?>" class="l"> </div>
          </div>
          <h4>電話番号（半角）*</h4>
          <div class="section">
            <div><input type="text" name="tel" value="<?php print($toiawase->getTel()); ?>" class="l"> </div>
          </div>
          <div class="submit">
            <div><input type="submit" value="　　確認　　" class="button">
            <input  type="button" onclick="location.href='index.html'" value="　　キャンセル　　" class="button"> </div>
          </div>
          <p>お問合せやお申込みへの返信は gmail を使用しています。もし、gmail をブロックされている場合は解除して頂くか、その旨をお問合せ内容にお書きください。</p>
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