<?php
#region enumlar
abstract class IslemTurleri
{
    public const Para_Aktarma  = 0;
    public const Para_Cekme  = 1;
    public const Satis  = 2;
    public const Alis  = 3;
}
#endregion

class Islem
{
    public $id;
    public $userId;
    public $banka;
    public $varlikTuru;
    public $kur;
    public $miktar;
    public $tur;
    public $zaman;
    
    function __construct($s) {
        $this->id         = $s['id'];  
        $this->userId     = $s['userId'];
        $this->banka      = $s['banka'];
        $this->varlikTuru = $s['varlikTuru']; 
        $this->kur        = $s['kur'];
        $this->miktar     = $s['miktar']; 
        $this->tur        = $s['tur']; 
        $this->zaman      = $s['zaman']; 
    }
    static function kullaniciIslemleriniCek($userid)
    {
        $sql = vt_sec("islemler","userId=".$userid,"zaman","<");
        $islemler;
        for($i=0;isset($sql[$i]);$i++)
        {
            $islemler[] = new Islem($sql[$i]);
        }
        if(count($islemler)>0)
        {
            return $islemler;
        }
        return null;
    }
}

?>