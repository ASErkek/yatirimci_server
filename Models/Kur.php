<?php

#region enumlar
abstract class Bankalar
{
    public const Merkez_Bankasi  = 0;
    public const Garanti = 1;
    public const Is_Bankasi = 2;
    public const Akbank = 3;
    public const Yapi_Kredi = 4;
    public const Ziraat = 5;
    public const HSBC = 6;
    public const Halkbank = 7;
    public const Vakifbank = 8;
    public const TEB = 9;
    public const Sekerbank = 10;
    public const Kuveyt_Turk = 11;
    public const Enpara = 12;
}
abstract class VarlikTurleri
{
    public const TL = 0;
    public const USD = 1;
    public const EUR = 2;
    public const GBP = 3;
    public const Gram_Altin = 4;
    public const Ons_Altin = 5;
}
#endregion

class Kur{

    public $banka;
    public $varlikTuru;
    public $alis;
    public $satis;
    
    function __construct($s) {
        $this->banka = $s['banka'];
        $this->varlikTuru = $s['varlikTuru'];
        $this->alis = $s['alis'];
        $this->satis = $s['satis'];
     }
}
        
    
    

?>