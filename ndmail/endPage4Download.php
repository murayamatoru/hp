<?php
//session_start();
require_once dirname ( __FILE__ ) . '/Constants.php';
require_once dirname ( __FILE__ ) . '/Keys.php';
require_once dirname ( __FILE__ ) . '/util/Logger.php';
require_once dirname ( __FILE__ ) . '/models/DownloadOrder.php';
require_once dirname ( __FILE__ ) . '/mail/Mailer.php';
session_start();
$downloadOrder = null;
$error = false;
$message = "";
if (isset ( $_SESSION [Keys::DOWNLOAD_ORDER] ) ) {
    $downloadOrder= $_SESSION [Keys::DOWNLOAD_ORDER];
}
//送信
if ($downloadOrder != null){
  $subject = "ダウンロード " . $downloadOrder->getSoftwareName();
  $mailMessage = "";
  $mailMessage.= "\n[名前]　" . $downloadOrder->getName();
  $mailMessage.= "\n\n[よみかな]　" . $downloadOrder->getNameKana();
  $mailMessage.= "\n\n[会社名]　" . $downloadOrder->getCompanyName();
  $mailMessage.= "\n\n[部署名]　" . $downloadOrder->getSectionName();
  $mailMessage.= "\n\n[住所1]　" . $downloadOrder->getAddress1();
  $mailMessage.= "\n\n[住所2]　" . $downloadOrder->getAddress2();
  $mailMessage.= "\n\n[メール]　" . $downloadOrder->getEmail();
  $mailMessage.= "\n\n[電話]　" . $downloadOrder->getTel();
//  $mailMessage.=  "\n\n[問合せ内容]　" . $downloadOrder->getMessage() ;
    
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
<title>ダウンロードページ</title>
<link href="next2.css" rel="stylesheet">
</head>
<body style="margin: 0px; padding: 0px;">
<div class="bd">

<div id="hpb-header">
<div id="hpb-headerMain">
  <h1>ネクストデザイン 「ソフトウェア一覧」</h1>
</div>

<div style="margin-top: 20px;">
<font size="+3">DDBuilder</font>（ 40 MB ） <a href="../download/ddbuilder/jp-co-nextdesign-ddbuilder.zip"><img src="../images/btn_dl.gif" width="217" height="27" border="0"></a> <br>
<p>DDDをサポートするソフトウェアツールです。</p>
<p>ダウンロード後のZIPファイルを解凍してください。</p>
<p>操作手順は説明書をご覧ください。</p>
</div>

<div style="margin-top: 20px;">
<font size="+3">Jクラスレポート</font>　( 16 MB ) <a href="../download/jclassreport/jp-co-nextdesign-jclassreport.zip"><img src="../images/btn_dl.gif" width="217" height="27" border="0"></a><br>
<p>Javaソースから各種情報、メトリクスを抽出するためのプログラムです。</p>
<p>ダウンロードファイルを適当な場所に保存した後、解凍してください。</p>
<p>起動方法は、解凍先の「はじめにお読みください(使い方).txt」をご覧ください。</p>
</div>

<div style="margin-top: 20px;">
<font size="+3">Let's アンケート・小テスト</font>（ 30 MB ） <a href="../download/question/QuestionDownload.zip"><img src="../images/btn_dl.gif" width="217" height="27" border="0"></a><br>
<p>簡易的にアンケートや小テストを実施するためのプログラムです。</p>
<p>ダウンロード後のZIPファイルを解凍すると １つの warファイル と 2つの pdfファイル があります。</p>
<p>Tomcat7相当のコンテナにデプロイして稼働できます。手順などは操作説明書をご覧ください。</p>
</div>

<div style="margin-top: 20px;">
<a href="../index.html">トップページへ戻る</a>
</div>

</body>
</html>
