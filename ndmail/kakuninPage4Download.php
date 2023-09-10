<?php
require_once dirname ( __FILE__ ) . '/Constants.php';
require_once dirname ( __FILE__ ) . '/Keys.php';
require_once dirname ( __FILE__ ) . '/util/Logger.php';
require_once dirname ( __FILE__ ) . '/models/DownloadOrder.php';
session_start();
$downloadOrder = null;
if (isset($_SESSION[Keys::DOWNLOAD_ORDER])){
    $downloadOrder = $_SESSION[Keys::DOWNLOAD_ORDER];
}
if ($downloadOrder != null){
    $downloadOrder->clear();
    if (isset ( $_POST ["name"] ) ) {
        $downloadOrder->setName( trim ( $_POST ["name"] ));
    }
    if (isset ( $_POST ["nameKana"] ) ) {
        $downloadOrder->setNameKana( trim ( $_POST ["nameKana"] ));
    }
    if (isset ( $_POST ["companyName"] ) ) {
        $downloadOrder->setCompanyName( trim ( $_POST ["companyName"] ));
    }
    if (isset ( $_POST ["sectionName"] ) ) {
        $downloadOrder->setSectionName( trim ( $_POST ["sectionName"] ));
    }
    if (isset ( $_POST ["address1"] ) ) {
        $downloadOrder->setAddress1( trim ( $_POST ["address1"] ));
    }
    if (isset ( $_POST ["address2"] ) ) {
        $downloadOrder->setAddress2( trim ( $_POST ["address2"] ));
    }

    if (isset ( $_POST ["email"] ) ) {
        $downloadOrder->setEmail( trim ( $_POST ["email"] ));
    }
    if (isset ( $_POST ["tel"] ) ) {
        $downloadOrder->setTel( trim ( $_POST ["tel"] ));
    }
    if (isset ( $_POST ["message"] ) ) {
        $downloadOrder->setMessage( trim ( $_POST ["message"] ));
    }
} else {
    $downloadOrder = new DownloadOrder();
    $appError = "不具合発生:$downloadOrder is null.";
}
//チェック
$okMessage = "よろしければ、「送信」ボタンを押してください。";
$errorMessage = $downloadOrder ->validate();
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
<title>ご利用者情報の確認</title>
<meta content="ご利用者情報の確認ページです。" name="description">
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
<h1>ご利用者情報の確認</h1>

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
          <form name="form1" method="post" action="endPage4Download.php">
          <p><span><?php print($okMessage); ?></span><span style="color: red;"><?php print($errorMessage); ?></span></p>
          <p>内容を修正する場合は、「戻る」ボタンを押してください。</p>
          <br>
          <p>お名前（漢字）</p>
          <div class="section">
            <div><input type="text" name="name" value="<?php print($downloadOrder->getName()); ?>" class="m" disabled> </div>
          </div>
          <p>お名前（フリガナ）</p>
          <div class="section">
            <div><input type="text" name="nameKana"  value="<?php print($downloadOrder->getNameKana()); ?>"class="m" disabled> </div>
          </div>

          <p>会社名</p>
          <div class="section">
            <div><input type="text" name="companyName" value="<?php print($downloadOrder->getCompanyName()); ?>" class="m" disabled> </div>
          </div>
          <p>部署名</p>
          <div class="section">
            <div><input type="text" name="sectionName" value="<?php print($downloadOrder->getSectionName()); ?>" class="m" disabled> </div>
          </div>
          <p>住所1</p>
          <div class="section">
            <div><input type="text" name="address1" value="<?php print($downloadOrder->getAddress1()); ?>" class="m" disabled> </div>
          </div>
          <p>住所2</p>
          <div class="section">
            <div><input type="text" name="address2" value="<?php print($downloadOrder->getAddress2()); ?>" class="m" disabled> </div>
          </div>

          <p>E-Mail</p>
          <div class="section">
            <div><input type="text" name="email" value="<?php print($downloadOrder->getEmail()); ?>" class="l" disabled> </div>
          </div>
          <p>電話番号（半角）</p>
          <div class="section">
            <div><input type="text" name="tel" value="<?php print($downloadOrder->getTel()); ?>" class="l" disabled> </div>
          </div>
<!-- 
          <p>お問合せ内容</p>
          <div class="section">
            <div><textarea name="message" class="l" cols="40" rows="12" disabled><?php print($downloadOrder->getMessage()); ?></textarea> </div>
          </div>
-->

          <div class="submit">
            <div><input type="submit" value="<?php print($buttonTitle); ?>" class="button" <?php print($string_disabled); ?>>
            <input  type="button" onclick="location.href='downloadOrderPage.php'" value="　　戻る　　" class="button"> </div>
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