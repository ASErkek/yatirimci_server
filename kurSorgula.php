<?php
include("Models/Kur.php");
include("inc/vt_inc.php");
/*
for($i=0;$i<15;$i++)
{
    for($j=0;$j<5;$j++)
    {
        $dizi['banka'] = $i;
        $dizi['varlikTuru'] = $j;
        $sayi = rand($j*100,$j*100+100) / 100 + $j*5;
        $dizi['alis'] = $sayi;
        $dizi['satis'] = $sayi + ((float)$j /10);
        vt_ekle("kurlar",$dizi);

    }
}
*/

$_POST['banka'] = 1;
$_POST['varlikTuru'] = -1;

if(isset($_POST['banka']) && isset($_POST['varlikTuru']))
{
    $sart = "";
    if($_POST['banka']>= 0)
    {
        $sart = "banka=" . $_POST['banka'];
    }
    if($_POST['varlikTuru']>= 0)
    {
        if($sart != "")
        {
            $sart .= " AND ";
        }
        $sart .= "varlikTuru=" . $_POST['varlikTuru'];
    }
    $sql = vt_sec("kurlar",$sart);
    $kur_list;
    for($i=0;isset($sql[$i]);$i++)
    {
        $kur_list[] = new Kur($sql[$i]);
    }
    header('Content-Type: application/json');
    echo json_encode($kur_list);

}

?>