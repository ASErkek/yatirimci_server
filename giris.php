<?php

class Token
{
    public $id;
    public $ad;
    public $access_token;
    public $error_description;
    function __construct() {
        $this->id = 0;
        $this->ad = "";
        $this->access_token = "";
        $this->error_description = "";
     }
}

include("inc/vt_inc.php");
$k = new Token();
if(isset($_POST['kadi']) && isset($_POST['pass']))
{
    $sql = "";
    if(strlen($_POST['kadi'])>=3 && strlen($_POST['pass'])>=3)
    {
        
        $sql = vt_sec("users","kadi='". $_POST['kadi']."' AND pass='".$_POST['pass']."'");
        if(isset($sql[0]['id']))
        {
            
            $k->id = $sql[0]['id'];
            $k->kadi = $sql[0]['kadi'];
            $k->access_token = "1e27gt";
        }else{
            $k->error_description = "Kullanıcı adı ya da şifre hatalı";
        }
    }
    elseif(strlen($_POST['kadi'])>=3 && strlen($_POST['access_token'])>=3)
    {
        $sql = vt_sec("users","kadi='". $_POST['kadi']."' AND token='".$_POST['access_token']."'");
        if(isset($sql[0]['id']))
        {
            
            $k->id = $sql[0]['id'];
            $k->kadi = $sql[0]['kadi'];
            $k->access_token = $sql[0]['token'];
        }else{
            $k->error_description = "Tekrar giriş yapmanız gerekmekte";
        }
    } 
    
    else
    {
        $k->error_description = "Geçersiz giriş bilgileri";
    }
}
header('Content-Type: application/json');
echo json_encode($k);


?>