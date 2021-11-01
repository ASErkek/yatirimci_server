<?php
include("inc/vt_inc.php");
include("Models/Kur.php");
include("Models/Islem.php");
include("Models/Varlik.php");
include("Models/Durum.php");

function KarZararHesapla($userId)
{
    $islemler = Islem::kullaniciIslemleriniCek($userId);



    $varlik = new Varlik(0,0,0);
    $varlik->userId = $userId;


    foreach($islemler as $islem)
    {
        switch($islem->tur)
        {
            case IslemTurleri::Para_Aktarma:
            {
                $varlik->varliklaraEkle($islem->banka,$islem->varlikTuru,$islem->miktar);
                break;
            }
            case IslemTurleri::Para_Cekme:
            {
                $varlik->varliklardanCikar($islem->banka,$islem->varlikTuru,$islem->miktar);
                break;
            }
            case IslemTurleri::Alis:
            {
                $tutar = $islem->miktar * $islem->kur;
                $varlik->varliklardanCikar($islem->banka,VarlikTurleri::TL,$tutar);
                $varlik->varliklaraEkle($islem->banka,$islem->varlikTuru,$islem->miktar);
                break;
            }
            case IslemTurleri::Satis:
            {
                $tutar = $islem->miktar * $islem->kur;
                $varlik->varliklardaEkle($islem->banka,VarlikTurleri::TL,$tutar);
                $varlik->varliklardanCikar($islem->banka,$islem->varlikTuru,$islem->miktar);
                break;
            }

        }
    }
    return $varlik->varlikListesiOlustur();

}


$_POST['userId'] = 1;
if(isset($_POST['userId']))
{
    $toplamTl =0;
    $toplamUSD =0;
    $karTL =0;
    $karUSD =0;

    $durum = new Durum();
    $durum->varliklar = KarZararHesapla($_POST['userId']);
    header('Content-Type: application/json');
    echo json_encode($durum);
}

?>