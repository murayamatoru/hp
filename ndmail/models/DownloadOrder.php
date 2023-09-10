<?php
require_once dirname ( __FILE__ ) . '/../util/Logger.php';
require_once dirname ( __FILE__ ) . '/../mail/MailAddress.php';
/**
 * ダウンロード申請
 */
class DownloadOrder{
    private $name = "";
    private $nameKana = "";
    private $companyName = "";
    private $sectionName = "";
    private $address1 = "";
    private $address2 = "";
    private $email = "";
    private $tel = "";
    private $message = "";
    private $softwareName = "";
    
    public function validate(){
        $result = "";
//        if ($this->companyName == null || $this->companyName == ""){
//            $result .= "会社名を入力してください。";
//        }
//        if ($this->sectionName == null || $this->sectionName == ""){
//            $result .= "部署名を入力してください。";
//        }
//        if ($this->address1 == null || $this->address1 == ""){
//            $result .= "住所1を入力してください。";
//        }
//        if ($this->address2 == null || $this->address2 == ""){
//            $result .= "住所2を入力してください。";
//        }
//        if ($this->message == null || $this->message == ""){
//            $result .= "お問合せ内容を入力してください。";
//        }
        if ($this->name == null || $this->name == ""){
            $result .= "お名前(漢字)を入力してください。";
        }
//        if ($this->nameKana == null || $this->nameKana == ""){
//            $result .= "お名前(フリガナ)を入力してください。";
//        }
//        if ($this->email == null || $this->email == ""){
//            $result .= "E-Mailを入力してください。";
//        } else {
//            $validationResult = MailAddress::validate ( $this->email);
//            if ($validationResult != ""){
//                $result .= "E-Mailが正しくありません。";
//            }
//        }
//        if ($this->tel == null || $this->tel == ""){
//            $result .= "電話番号(半角)を入力してください。";
//        }
        return $result;
    }
    
    public function clear(){
        $this->companyName = "";
        $this->sectionName = "";
        $this->address1 = "";
        $this->address2 = "";
        $this->message = "";
        $this->name = "";
        $this->nameKana = "";
        $this->email = "";
        $this->tel = "";
    }

    public function getCompanyName(){
        return $this->companyName;
    }
    
    public function setCompanyName($companyName){
        if ($companyName != null){
          $this->companyName = $companyName;
        }
    }

    public function getSectionName(){
        return $this->sectionName;
    }
    
    public function setSectionName($sectionName){
        if ($sectionName != null){
          $this->sectionName = $sectionName;
        }
    }

    public function getAddress1(){
        return $this->address1;
    }
    
    public function setAddress1($address1){
        if ($address1 != null){
          $this->address1 = $address1;
        }
    }

    public function getAddress2(){
        return $this->address2;
    }
    
    public function setAddress2($address2){
        if ($address2 != null){
          $this->address2 = $address2;
        }
    }

    public function getMessage(){
        return $this->message;
    }
    
    public function setMessage($message){
        if ($message != null){
          $this->message = $message;
        }
    }

    public function getName(){
        return $this->name;
    }
    
    public function setName($name){
        if ($name != null){
            $this->name = $name;
        }
    }
    
    public function getNameKana(){
        return $this->nameKana;
    }
    
    public function setNameKana($nameKana){
        if ($nameKana != null){
            $this->nameKana = $nameKana;
        }
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($email){
        if ($email != null){
            $this->email= $email;
        }
    }
    
    public function getTel(){
        return $this->tel;
    }
    
    public function setTel($tel){
        if ($tel != null){
            $this->tel = $tel;
        }
    }
    
    public function getSoftwareName(){
        return $this->softwareName;
    }
    
    public function setSoftwareName($softwareName){
        $this->softwareName = $softwareName;
    }    
}