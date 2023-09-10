<?php
ini_set('display_errors', "On");
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
$_SESSION[Keys::TOIAWASE] = $toiawase;
?>

<!DOCTYPE HTML>
<html lang="ja">

<head>
<meta charset="UTF-8">
<title>問合せ入力</title>
<meta content="問合せ内容の入力ページです。" name="description">
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
<h1>お問合せ入力</h1>
<p>以下のフォームに必要事項をご記入の上、「確認」ボタンを押してください。</p>
<br>

  <form name="form1" method="post" action="kakuninPage.php">
  <p>お名前（漢字）*</p>
  <div class="section">
    <div><input type="text" name="name" value="<?php print($toiawase->getName()); ?>" class="m"> </div>
  </div>
  <p>お名前（フリガナ）</p>
  <div class="section">
    <div><input type="text" name="nameKana"  value="<?php print($toiawase->getNameKana()); ?>"class="m"> </div>
  </div>

  <p>会社名</p>
  <div class="section">
    <div><input type="text" name="companyName" value="<?php print($toiawase->getCompanyName()); ?>" class="m"> </div>
  </div>
  <p>部署名</p>
  <div class="section">
    <div><input type="text" name="sectionName" value="<?php print($toiawase->getSectionName()); ?>" class="m"> </div>
  </div>

<p>住所1</p>
<SELECT NAME="address1" SIZE=1>
<OPTION VALUE="北海道">北海道</OPTION>
<OPTION VALUE="青森">青森</OPTION>
<OPTION VALUE="岩手">岩手</OPTION>
<OPTION VALUE="宮城">宮城</OPTION>
<OPTION VALUE="秋田">秋田</OPTION>
<OPTION VALUE="山形">山形</OPTION>
<OPTION VALUE="福島">福島</OPTION>
<OPTION VALUE="茨城">茨城</OPTION>
<OPTION VALUE="栃木">栃木</OPTION>
<OPTION VALUE="群馬">群馬</OPTION>
<OPTION VALUE="埼玉">埼玉</OPTION>
<OPTION VALUE="千葉">千葉</OPTION>
<OPTION VALUE="東京都">東京都</OPTION>
<OPTION VALUE="神奈川">神奈川</OPTION>
<OPTION VALUE="新潟">新潟</OPTION>
<OPTION VALUE="富山">富山</OPTION>
<OPTION VALUE="石川">石川</OPTION>
<OPTION VALUE="福井">福井</OPTION>
<OPTION VALUE="山梨">山梨</OPTION>
<OPTION VALUE="長野">長野</OPTION>
<OPTION VALUE="岐阜">岐阜</OPTION>
<OPTION VALUE="静岡">静岡</OPTION>
<OPTION VALUE="愛知">愛知</OPTION>
<OPTION VALUE="三重">三重</OPTION>
<OPTION VALUE="滋賀">滋賀</OPTION>
<OPTION VALUE="京都府">京都府</OPTION>
<OPTION VALUE="大阪府">大阪府</OPTION>
<OPTION VALUE="兵庫">兵庫</OPTION>
<OPTION VALUE="奈良">奈良</OPTION>
<OPTION VALUE="和歌山">和歌山</OPTION>
<OPTION VALUE="鳥取">鳥取</OPTION>
<OPTION VALUE="島根">島根</OPTION>
<OPTION VALUE="岡山">岡山</OPTION>
<OPTION VALUE="広島">広島</OPTION>
<OPTION VALUE="山口">山口</OPTION>
<OPTION VALUE="徳島">徳島</OPTION>
<OPTION VALUE="香川">香川</OPTION>
<OPTION VALUE="愛媛">愛媛</OPTION>
<OPTION VALUE="高知">高知</OPTION>
<OPTION VALUE="福岡" SELECTED>福岡</OPTION>
<OPTION VALUE="佐賀">佐賀</OPTION>
<OPTION VALUE="長崎">長崎</OPTION>
<OPTION VALUE="熊本">熊本</OPTION>
<OPTION VALUE="大分">大分</OPTION>
<OPTION VALUE="宮崎">宮崎</OPTION>
<OPTION VALUE="鹿児島">鹿児島</OPTION>
<OPTION VALUE="沖縄">沖縄</OPTION>
<OPTION VALUE="海外">海外</OPTION>
</SELECT>
<span class="style1">　都道府を選択してください</span>

  <p>住所2</p>
  <div class="section">
    <div><input type="text" name="address2" value="<?php print($toiawase->getAddress2()); ?>" class="m"> </div>
  </div>

  <p>E-Mail</p>
  <div class="section">
    <div><input type="text" name="email" value="<?php print($toiawase->getEmail()); ?>" class="l"> </div>
  </div>
  <p>電話番号（半角）</p>
  <div class="section">
    <div><input type="text" name="tel" value="<?php print($toiawase->getTel()); ?>" class="l"> </div>
  </div>
  <p>お問合せ内容*</p>
  <div class="section">
    <div><textarea name="message" class="l" cols="40" rows="12"><?php print($toiawase->getMessage()); ?></textarea> </div>
  </div>
<br>
  <div class="submit">
    <div><input type="submit" value="　　確認　　" class="button">
    <input  type="button" onclick="location.href='../index.html'" value="　　キャンセル　　" class="button"> </div>
  </div>
  </form>

</div>
</body>
</html>
