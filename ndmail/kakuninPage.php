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
    if (isset ( $_POST ["name"] ) ) {
        $toiawase->setName( trim ( $_POST ["name"] ));
    }
    if (isset ( $_POST ["nameKana"] ) ) {
        $toiawase->setNameKana( trim ( $_POST ["nameKana"] ));
    }
    if (isset ( $_POST ["companyName"] ) ) {
        $toiawase->setCompanyName( trim ( $_POST ["companyName"] ));
    }
    if (isset ( $_POST ["sectionName"] ) ) {
        $toiawase->setSectionName( trim ( $_POST ["sectionName"] ));
    }
    if (isset ( $_POST ["address1"] ) ) {
        $toiawase->setAddress1( trim ( $_POST ["address1"] ));
    }
    if (isset ( $_POST ["address2"] ) ) {
        $toiawase->setAddress2( trim ( $_POST ["address2"] ));
    }

    if (isset ( $_POST ["email"] ) ) {
        $toiawase->setEmail( trim ( $_POST ["email"] ));
    }
    if (isset ( $_POST ["tel"] ) ) {
        $toiawase->setTel( trim ( $_POST ["tel"] ));
    }
    if (isset ( $_POST ["message"] ) ) {
        $toiawase->setMessage( trim ( $_POST ["message"] ));
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
<title>お問合せ内容の確認</title>
<meta content="お問合せ内容の確認ページです。" name="description">
<!-- VIEW PORT 2018.3.6 -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="next2.css" rel="stylesheet">
</head>



<body style="margin: 0px; padding: 0px;">
<!-- WebAnalysis --><script src="/ControlPanel/static/js/wa.js" type="text/JavaScript"></script>
<noscript><img src="/mode2_piwik/piwik.php?idsite=1" style="border:0;" alt="WebAnalysis"></noscript>
<!-- End WebAnalysis -->
<div class="hd">
  <table style=" margin: 0 auto; width: 100%; height: 100%">
  <tr>
    <td><a href="../index.html" target="_new"><span style="font-size:80%; color:white;">&nbsp;&nbsp;ネクストデザイン</span></a></td>
  </tr>
  </table>
</div>
<div class="bd">
<h1>お問合せ内容の確認</h1>

  <!-- header end --><!-- inner -->
  <div id="hpb-inner">
    <!-- title -->
    <!-- title end --><!-- main -->
    <div id="hpb-main">
      <!-- contact -->
      <div id="contact">
        <div class="hpb-section">
          <!-- <h3>内容のご確認</h3> -->
          <!--  <form action="" method="get"> -->
          <form name="form1" method="post" action="endPage.php">
          <p><span><?php print($okMessage); ?></span><span style="color: red;"><?php print($errorMessage); ?></span></p>
          <p>内容を修正する場合は、「戻る」ボタンを押してください。</p>
          <br>
          <p>お名前（漢字）</p>
          <div class="section">
            <div><input type="text" name="name" value="<?php print($toiawase->getName()); ?>" class="m" disabled> </div>
          </div>
          <p>お名前（フリガナ）</p>
          <div class="section">
            <div><input type="text" name="nameKana"  value="<?php print($toiawase->getNameKana()); ?>"class="m" disabled> </div>
          </div>

          <p>会社名</p>
          <div class="section">
            <div><input type="text" name="companyName" value="<?php print($toiawase->getCompanyName()); ?>" class="m" disabled> </div>
          </div>
          <p>部署名</p>
          <div class="section">
            <div><input type="text" name="sectionName" value="<?php print($toiawase->getSectionName()); ?>" class="m" disabled> </div>
          </div>
          <p>住所1</p>
          <div class="section">
            <div><input type="text" name="address1" value="<?php print($toiawase->getAddress1()); ?>" class="m" disabled> </div>
          </div>
          <p>住所2</p>
          <div class="section">
            <div><input type="text" name="address2" value="<?php print($toiawase->getAddress2()); ?>" class="m" disabled> </div>
          </div>

          <p>E-Mail</p>
          <div class="section">
            <div><input type="text" name="email" value="<?php print($toiawase->getEmail()); ?>" class="l" disabled> </div>
          </div>
          <p>電話番号（半角）</p>
          <div class="section">
            <div><input type="text" name="tel" value="<?php print($toiawase->getTel()); ?>" class="l" disabled> </div>
          </div>
          <p>お問合せ内容</p>
          <div class="section">
            <div><textarea name="message" class="l" cols="40" rows="12" disabled><?php print($toiawase->getMessage()); ?></textarea> </div>
          </div>

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
</div>
<!-- container end --></body>
</html>