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
  $subject = Constants::SITE_NAME . " 問合せ";
  $mailMessage = "";
  if ($toiawase->isTaikenLesson()){
    $mailMessage.=  "\n*** 体験レッスンの申し込みボタンからのメッセージです ***\n" ;
  }
  $mailMessage.= "\n[名前]　" . $toiawase->getName();
  $mailMessage.= "\n\n[よみかな]　" . $toiawase->getNameKana();
  $mailMessage.= "\n\n[会社名]　" . $toiawase->getCompanyName();
  $mailMessage.= "\n\n[部署名]　" . $toiawase->getSectionName();
  $mailMessage.= "\n\n[住所1]　" . $toiawase->getAddress1();
  $mailMessage.= "\n\n[住所2]　" . $toiawase->getAddress2();
  $mailMessage.= "\n\n[メール]　" . $toiawase->getEmail();
  $mailMessage.= "\n\n[電話]　" . $toiawase->getTel();
  $mailMessage.=  "\n\n[問合せ内容]　" . $toiawase->getMessage() ;
    
  $mailer = new Mailer ();
  $result = $mailer->sendInfo( Constants::ADDRESS_TO, $mailMessage, $subject);
  if ($result) {
      $message = "内容を受付ました。" ;
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
<title>お問合せ完了</title>
<link href="next2.css" rel="stylesheet">
</head>
<body style="margin: 0px; padding: 0px;">
<div id="hpb-skip"></div>
<!-- container -->
<div class="bd">
  <!-- header -->
  <div id="hpb-header">
    <div id="hpb-headerMain">
      <h1><?php print(Constants::SITE_NAME)?></h1>
    </div>
  </div>
  <!-- header end --><!-- inner -->
  <div id="hpb-inner">
    <!-- title -->
    <!-- title end --><!-- main -->
    <div id="hpb-main">
      <!-- contact -->
      <div id="contact">
        <div class="hpb-section">
          <form name="form1" method="post" action="endPage.php">
          <p><?php print($message); ?></p>
          <div class="submit">
            <input  type="button" onclick="location.href='http://www.nextdesign.co.jp/'" value="　　終了　　" class="button">
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