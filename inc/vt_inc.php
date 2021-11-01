<?php
////////////////////////////////////////////////////////////////////////
//                         HEMENCOZUM </takb>                         //
//                                                                    //
//                            vt_inc  v1.0  PHP7                      //
//                             07.10.2018                             //
////////////////////////////////////////////////////////////////////////



$server = "localhost";
$kullaniciadi = "root";
$sifre = ""; 
$veritabani = "yatirimci";


ob_start();
session_start();
$baglanti = mysqli_connect($server,$kullaniciadi, $sifre,$veritabani);
if ( mysqli_connect_errno() ) exit( "Bağlantı sağlanamadı." );
mysqli_query($baglanti,"SET NAMES 'utf8'");

//___
function vt_ekle($vttablo, $vtdizi){
	global $baglanti;
	$ilk = "";
	$son = "";
	foreach ($vtdizi as $anahtar=>$deger){
		if($ilk == ""){
			$ilk = $anahtar;
			$son = "'".$deger . "'";
		}else{
			$ilk = $ilk . ", " . $anahtar;
			$son = $son . ", '" . $deger . "'";
		}
	}
	$sql = mysqli_query($baglanti,"INSERT INTO ".$vttablo." (". $ilk .") VALUES(". $son .")");
	return mysqli_insert_id($baglanti);
};
//___
function vt_sec(string $vttablo, $kosul = "", $olcut = "", $yon = "",$limit=""){
	global $baglanti;
	$sorgu = "SELECT * FROM $vttablo";
	if ($kosul != ""){
		$sorgu = $sorgu . " WHERE $kosul";
	}
	if ($olcut != ""){
		$sorgu = $sorgu . " ORDER BY $olcut";
	}
	if ($yon == ">"){
		$sorgu = $sorgu . " DESC";
	}else if ($yon == "<"){
		$sorgu = $sorgu . " ASC";
	}
	if ($limit != ""){
		$sorgu = $sorgu . " LIMIT $limit";
	}
	$sql = mysqli_query($baglanti,$sorgu);
	if($sql and mysqli_num_rows($sql) > 0){
		while($satir = mysqli_fetch_array($sql)){
			$vt_sec[] = $satir;
		}
		return $vt_sec;
	}else{
		return false;
	}
}

function vt_guncelle($vttablo, $vtdizin, $vtyer){
	global $baglanti;
	$sorgu = "";
	foreach ($vtdizin as $anahtar=>$deger){
		if($sorgu == ""){
			$sorgu = $anahtar . "='". $deger ."'";
		}else{
			$sorgu = $sorgu . ", " . $anahtar . "='". $deger ."'";
		}
	}
	$sql = mysqli_query($baglanti,"UPDATE $vttablo SET ".$sorgu." WHERE " . $vtyer);
	return $sql;
}
//___
function vt_sil($vttablo,$vtyer){
	global $baglanti;
		$sorgu= "DELETE FROM $vttablo WHERE " .$vtyer;
		$sql = mysqli_query($baglanti,$sorgu);
		return $sql;
}
//___VERİTABANI İŞLEMLERİ >


//___RESİM İŞLEMLERİ <
function resimupload($resim,$yuklenecekyer){
	if(!isset($_FILES[$resim]) || !isset($resim['tmp_name']))
	{
		return false;
	}
	$resim = $_FILES[$resim];
	$uploaddir = $yuklenecekyer; // upload edilecek klasör 
    $img = getimagesize($resim['tmp_name']); // resmin boyutları ve türü için kullanılıyor manuale detayı için bakabilirsin 
	
    $ext = explode('.', $resim['name']); // resmin uzantısını alıyoruz jpg, png, gif... 
	
    $new_name = time() . rand(100,999);; // rastgele bir isim yaratıyoruz. yoksa aynı isimli dosya üstüne yazılabilir 
    $uploadfile = $new_name . '.' . $ext[1]; // yeni dosya ismi uzantısıyla birlikte 
	if(move_uploaded_file($resim['tmp_name'], $uploaddir . '/' . $uploadfile)){
		
		$link = $uploadfile;
		return $link;
	}else{
		return false;
	}
}
//___RESİM İŞLEMLERİ >
function ayar($ad){
	$sql = vt_sec("ayarlar","ad='$ad'");
	return $sql[0]['deger'];
}
function mailgonder($eposta,$mailicerigi,$baslik=""){
	//__________________________________MAİL GONDERME<
		if($baslik=="") $baslik=ayar("sitetitle");
		
		$mail = new PHPMailer();
		$mail->IsSMTP();                                   // send via SMTP
		$mail->Host     = ayar('mailhost'); // SMTP servers
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->Username = ayar('mailadres');  // SMTP username
		$mail->Password = ayar('mailpass'); // SMTP password
		$mail->isHTML(true);
		$mail->From     = ayar('mailadres'); // smtp kullanýcý adýnýz ile ayný olmalý
		$mail->Fromname = ayar('sitetitle');
		$mail->AddAddress($eposta);
		$mail->CharSet = 'UTF-8';
		$mail->Subject  =  $baslik;
		$mail->Body     =  $mailicerigi;
			;
		
		if(!$mail->Send())
		{
		   return false;
		   echo "Mailer Error: " . $mail->ErrorInfo;
		}else{
			return true;
		}	
	
}
function readmore($string){
$string = strip_tags($string);

if (strlen($string) > 500) {

    // truncate string
    $stringCut = substr($string, 0, 200);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
}
echo $string;	
}

function mesaj($mesaj,$basari)
{
	
	if($basari)
	{
		return '
		<div class="alert alert-success">
			<button type="button" aria-hidden="true" class="close">
				<i class="material-icons">close</i>
			</button>
			<span>
				<b> Başarılı - </b> '.$mesaj.'</span>
		</div>
		';
	}else{
		return '
		<div class="alert alert-danger">
			<button type="button" aria-hidden="true" class="close">
				<i class="material-icons">close</i>
			</button>
			<span>
				<b> Hata - </b> '.$mesaj.'</span>
		</div>
		';

	}
	
	return $mesaj;
}
?>