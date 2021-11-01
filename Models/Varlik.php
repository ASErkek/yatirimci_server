<?php
class Varlik
{
    //public $userId;
    public $banka;
    public $varlikTuru;
    public $miktar;

    private $varlikMatrisi;
    function __construct($banka,$varlikTuru,$miktar) {
        $this->banka     =$banka     ;
        $this->varlikTuru=$varlikTuru;
        $this->miktar    =$miktar    ;
    }
    function varliklaraEkle($banka,$varlikTuru,$miktar)
    {
        if(isset($this->varlikMatrisi[$varlikTuru][$banka]))
        {
            $this->varlikMatrisi[$varlikTuru][$banka] += $miktar;
        }
        else
        {
            $this->varlikMatrisi[$varlikTuru][$banka] = (float)$miktar;
        }
    }
    function varliklardanCikar($banka,$varlikTuru,$miktar)
    {
        if(isset($this->varlikMatrisi[$varlikTuru][$banka]))
        {
            $this->varlikMatrisi[$varlikTuru][$banka] -= $miktar;
            if($this->varlikMatrisi[$varlikTuru][$banka] < 0)
            {
                $this->varlikMatrisi[$varlikTuru][$banka] = 0;
            }
        }
        

    }
    function varlikListesiOlustur()
    {
        $varliklar = null;
        foreach($this->varlikMatrisi as $varlikTuru=>$tureGoreVarliklar)
        {
            $turdekiToplamVarlik = new Varlik(-1,$varlikTuru,0);
            foreach($tureGoreVarliklar as $banka=>$varlik)
            {
                 $varliklar[] = new Varlik($banka,$varlikTuru,$varlik);
                 $turdekiToplamVarlik->miktar += $varlik;
            }
            $varliklar[] =  $turdekiToplamVarlik;
        }
        return $varliklar;
    }
}

?>