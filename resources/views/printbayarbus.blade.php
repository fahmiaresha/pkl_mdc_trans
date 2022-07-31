<!DOCTYPE html>  
 <html>   
 <head>   
  <title>Kuitansi Sederhana</title>   
 </head>   
 <body>   
 <style>
    @page { size: 15cm 22cm landscape; }
  </style>
@foreach($pembayaran as $p)
@endforeach

<?php   
 $nominal = $p->JUMLAH_BAYAR;   
 if ($nominal)   
 {   
     $uang = number_format($nominal, 0, ',','.') ."</br>";   
     $terbilang = ucwords(''.Terbilang($nominal).'')." Rupiah";   
 }   
 $terbilang;
 ?>  
 <h2>Kwitansi Pembayaran Sewa Armada</h2>  
 <hr>  
 <p>
    <b>PT. Medina Dzikra Cemerlang Trans</b><br>
        JL. Suwoko No. 43 A Lamongan - Jawa Timur<br>
        Telp : (0322) 3101285
</p>
 <table width="555" border="0" cellpadding="3" cellspacing="0" style="border: 1px solid #000;">  
 <tr>  
   <td rowspan="6" width="120" style="border-right:1px solid #000;"> </td>  
   <td width="150" valign="top" > No </td>  
   <td valign="top" > : <?php echo ($p->ID_SEWA_BUS); ?> </td>  
 </tr>  
 <tr>  
   <td valign="top" > Telah Diterima Dari </td>  
   <td valign="top" > : <?php echo ($p->NAMA_CUSTOMER);?> </td>  
 </tr>  

 <tr>  
   <td valign="top" > Uang Sejumlah </td>  
   <td valign="top" > : <?= Terbilang($nominal) ?> Rupiah</td>  
 </tr>  
 <tr>  
   <td valign="top" > Keterangan </td>  
   <td valign="top" > : <?php echo ($p->JENIS_BAYAR);?></td>  
 </tr>  
 <tr>  
   <td valign="bottom"> <h3>Rp. <?php echo number_format($p->JUMLAH_BAYAR,'0',',','.');?> </h3> </td>  
   <td valign="top" align="right" height="80"> <?php echo "Lamongan, $p->TGL_BAYAR";?> </td>  
 </tr>  
 </table>  
 <style>  
 a { text-decoration: none; color: #0903E8; font-family: verdana; }  
 a:hover { color: #FA3C3C; }  
 </style>  
 
 </body>   
 </html>   
 <?php
function Terbilang($x)   
{   
 $bilangan = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");   
 if ($x < 12)   
  return " " . $bilangan[$x];   
 elseif ($x < 20)   
  return Terbilang($x - 10) . "belas";   
 elseif ($x < 100)   
  return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);   
 elseif ($x < 200)   
  return " seratus" . Terbilang($x - 100);   
 elseif ($x < 1000)   
  return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);   
 elseif ($x < 2000)   
  return " seribu" . Terbilang($x - 1000);   
 elseif ($x < 1000000)   
  return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);   
 elseif ($x < 1000000000)   
  return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);    
}   
?>
