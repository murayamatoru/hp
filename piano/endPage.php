<?php
//session_start();
require_once dirname ( __FILE__ ) . '/Constants.php';
require_once dirname ( __FILE__ ) . '/Keys.php';
require_once dirname ( __FILE__ ) . '/util/Logger.php';
require_once dirname ( __FILE__ ) . '/models/Toiawase.php';
require_once dirname ( __FILE__ ) . '/mail/Mailer.php';
session_start();
$toiawase = null;
$error = false;
$message = "";
if (isset ( $_SESSION [Keys::TOIAWASE] ) ) {
    $toiawase= $_SESSION [Keys::TOIAWASE];
}

//送信
if ($toiawase != null){
    $mailMessage = "";
    if ($toiawase->isTaikenLesson()){
        $mailMessage.=  "\n*** 体験レッスンの申し込みボタンからのメッセージです ***\n" ;
    }
    $mailMessage.=  "\n[問合せ内容]　" . $toiawase->getMessage() ;
    $mailMessage.= "\n\n[名前]　" . $toiawase->getName();
    $mailMessage.= "\n\n[よみかな]　" . $toiawase->getNameKana();
    $mailMessage.= "\n\n[メール]　" . $toiawase->getEmail();
    $mailMessage.= "\n\n[電話]　" . $toiawase->getTel();
    
  $mailer = new Mailer ();
  $result = $mailer->sendPiano( Constants::ADDRESS_TO1, $mailMessage);
  if ($result) {
      $message = "内容を受付ました。後日ご連絡を差し上げます。" ;
      $temp = $mailer->sendPiano( Constants::ADDRESS_TO2, $mailMessage);
      $temp = $mailer->sendPiano( Constants::ADDRESS_TO3, $mailMessage);
  } else {
      $error = true;
      $message = "ご迷惑をおかけします。\nシステムの不具合によって、お問合せ内容を送信できませんでした。\n連絡先：";
  }
} else {
    $error = true;
    $message = "ご迷惑をおかけします。\nシステムの不具合によって、お問合せ内容を送信できませんでした。\n連絡先：";
}
@session_destroy();
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
      <h2><span class="ja">完了</span><span class="en">CONTACT&nbsp;US</span></h2>
    </div>
    <!-- title end --><!-- main -->
    <div id="hpb-main">
      <!-- contact -->
      <div id="contact">
        <div class="hpb-section">
          <form name="form1" method="post" action="endPage.php">
          <h4><?php print($message); ?></h4>
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
  <!-- footer end -->
</div>
<!-- container end --></body>
</html>