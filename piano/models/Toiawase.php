<?php
require_once dirname ( __FILE__ ) . '/../util/Logger.php';
require_once dirname ( __FILE__ ) . '/../mail/MailAddress.php';
/**
 * 問合せ内容
 */
class Toiawase{
    private $message = "";
    private $name = "";
    private $nameKana = "";
    private $email = "";
    private $tel = "";
    private $taikenLesson = false;
    
    public function validate(){
        $result = "";
        if ($this->message == null || $this->message == ""){
            $result .= "お問合せ内容を入力してください。";
        }
        if ($this->name == null || $this->name == ""){
            $result .= "お名前(漢字)を入力してください。";
        }
        if ($this->nameKana == null || $this->nameKana == ""){
            $result .= "お名前(フリガナ)を入力してください。";
        }
        if ($this->email == null || $this->email == ""){
            $result .= "E-Mailを入力してください。";
        } else {
            $validationResult = MailAddress::validate ( $this->email);
            if ($validationResult != ""){
                $result .= "E-Mailが正しくありません。";
            }
        }
        if ($this->tel == null || $this->tel == ""){
            $result .= "電話番号(半角)を入力してください。";
        }
        return $result;
    }
    
    public function clear(){
        $this->message = "";
        $this->name = "";
        $this->nameKana = "";
        $this->email = "";
        $this->tel = "";
    }
    
    public function getMessage(){
        return $this->message;
    }
    
    public  function setMessage($message){
        if ($message != null){
          $this->message = $message;
        }
    }

    public function getName(){
        return $this->name;
    }
    
    public  function setName($name){
        if ($name != null){
            $this->name = $name;
        }
    }
    
    public function getNameKana(){
        return $this->nameKana;
    }
    
    public  function setNameKana($nameKana){
        if ($nameKana != null){
            $this->nameKana = $nameKana;
        }
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public  function setEmail($email){
        if ($email != null){
            $this->email= $email;
        }
    }
    
    public function getTel(){
        return $this->tel;
    }
    
    public  function setTel($tel){
        if ($tel != null){
            $this->tel = $tel;
        }
    }
    
    public function setTaikenLesson($taikenLesson){
        $this->taikenLesson = $taikenLesson;
    }
    
    public  function isTaikenLesson(){
        return $this->taikenLesson;
    }
    
}