<?php
    function day($n) {
        $n = intval($n);
        if ($n >= 11 && $n <= 13) {
            return "{$n}<sup>th</sup>";
        }
        switch ($n % 10) {
            case 1:  return "{$n}<sup>st</sup>";
            case 2:  return "{$n}<sup>nd</sup>";
            case 3:  return "{$n}<sup>rd</sup>";
            default: return "{$n}<sup>th</sup>";
        }
    }

    function tgl_indo($tgl){
        $data = explode("-", $tgl);
        $hari = day($data[0]);
        $bulan = $data[1];
        $tahun = $data[2];

        if($bulan == "01") $bulan = "January";
        if($bulan == "02") $bulan = "February";
        if($bulan == "03") $bulan = "March";
        if($bulan == "04") $bulan = "April";
        if($bulan == "05") $bulan = "May";
        if($bulan == "06") $bulan = "June";
        if($bulan == "07") $bulan = "July";
        if($bulan == "08") $bulan = "August";
        if($bulan == "09") $bulan = "September";
        if($bulan == "10") $bulan = "October";
        if($bulan == "11") $bulan = "November";
        if($bulan == "12") $bulan = "December";

        return $hari . " of " . $bulan . " " . $tahun;
    }
?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .qrcode{
            width: 210px;
			position: absolute;
            left: 550px;
			bottom: 160px;
            font-size: 35px;
            word-spacing: 3px;
        }

        .nilai{
            background-color: red;
            width: 95px;
			position: absolute;
            right: 212px;
			bottom: 174px;
            font-size: 18px;
            font-family: 'rock';
            word-spacing: 3px;
        }

        .nama{
            background-color: red;
            width: 700px;
			position: absolute;
            left: 330px;
			top: 300px;
            font-size: 32px;
            font-family: 'rockb';
            word-spacing: 3px;
        }

        .ttl{
            background-color: red;
            width: 129px;
			position: absolute;
            right: 413px;
			top: 355px;
            font-size: 18px;
            font-family: 'rock';
            word-spacing: 3px;
        }

        .t4{
            background-color: red;
            width: 129px;
			position: absolute;
            right: 229px;
			top: 355px;
            font-size: 18px;
            font-family: 'rock';
            word-spacing: 3px;
        }
        
        .istima{
            background-color: red;
            width: 95px;
			position: absolute;
            right: 212px;
			bottom: 247px;
            font-size: 18px;
            font-family: 'rock';
            word-spacing: 3px;
        }
        
        .tarakib{
            background-color: red;
            width: 95px;
			position: absolute;
            right: 212px;
			bottom: 222px;
            font-size: 18px;
            font-family: 'rock';
            word-spacing: 3px;
        }
        
        .qiroah{
            background-color: red;
            width: 95px;
			position: absolute;
            right: 212px;
			bottom: 197px;
            font-size: 18px;
            font-family: 'rock';
            word-spacing: 3px;
        }

        .tgl{
            background-color: red;
			position: absolute;
            left: 797px;
			bottom: 126px;
            font-size: 18px;
            font-family: 'rock';
            word-spacing: 3px;
        }

        .no_doc{
            background-color: red;
            width: 129px;
			position: absolute;
            left: 464px;
			top: 355px;
            font-size: 18px;
            font-family: 'rock';
            word-spacing: 3px;
        }

        .gender{
            background-color: red;
            width: 129px;
			position: absolute;
            left: 373px;
			top: 407px;
            font-size: 18px;
            font-family: 'rock';
            word-spacing: 3px;
        }

        .country{
            background-color: red;
            width: 129px;
			position: absolute;
            left: 631px;
			top: 407px;
            font-size: 18px;
            font-family: 'rock';
            word-spacing: 3px;
        }

        .language{
            background-color: red;
            width: 129px;
			position: absolute;
            right: 210px;
			top: 407px;
            font-size: 18px;
            font-family: 'rock';
            word-spacing: 3px;
        }

        .tgl_akhir{
            background-color: red;
			position: absolute;
            left: 797px;
			bottom: 100px;
            font-size: 18px;
            font-family: 'rock';
            word-spacing: 3px;
        }

        <?php if($tipe == "gambar") :?>
            @page :first {
                background-image: url("<?= base_url()?>assets/img/sertifikat.jpg");
                background-image-resize: 6;
            }
        <?php endif;?>
        
    </style>
</head>
    <body style="text-align: center">
        <div class="qrcode">
            <img src="<?= base_url()?>assets/qrcode/<?= $id?>.png" width=100 alt="">
        </div>
        <div class="nilai"><p style="text-align: center; margin: 0px"><b><?= round($skor)?></b></p></div>
        <div class="nama"><p style="text-align: center; margin: 0px"><?= $nama?></p></div>
        <div class="ttl"><p style="text-align: center; margin: 0px"><?= date("M d Y", strtotime($tgl_lahir))?></p></div>
        <div class="t4"><p style="text-align: center; margin: 0px"><?= $t4_lahir?></p></div>
        <div class="gender"><p style="text-align: center; margin: 0px"><?= $jk?></p></div>
        <div class="country"><p style="text-align: center; margin: 0px">Indonesia</p></div>
        <div class="language"><p style="text-align: center; margin: 0px">Indonesia</p></div>
        <div class="istima"><p style="text-align: center; margin: 0px"><?= $istima?></p></div>
        <div class="tarakib"><p style="text-align: center; margin: 0px"><?= $tarakib?></p></div>
        <div class="qiroah"><p style="text-align: center; margin: 0px"><?= $qiroah?></p></div>
        <div class="no_doc"><p style="text-align: center; margin: 0px"><?= $no_doc?></p></div>
        <div class="tgl"><p style="text-align: center; margin: 0px"><?= tgl_indo(date("d-m-Y", strtotime($tgl_tes)))?></p></div>
        <div class="tgl_akhir"><p style="text-align: center; margin: 0px"><?= tgl_indo(date("d-m-Y", strtotime('+2 years', strtotime($tgl_tes))))?></p></div>
        
        <?php if($tipe == "gambar") :?>
            <pagebreak>
            <div style="position: absolute; left:0; right: 0; top: 0; bottom: 0;">
                <img src="<?= base_url()?>assets/img/sertifikat2.jpg" 
                    style="width: 210mm; height: 330mm; margin: 0;" />
            </div>
        <?php endif;?>
    </body>
</html>