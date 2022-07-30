

<html>
<center>
    <form method="post">
        <input type="text" id="il" name="il">
        <input type="submit" value="Getir">
    </form>
</center>
</html>

<?php
error_reporting(0);

if(!$_POST)
{
    die();
}
$il = $_POST['il'];
$gethavadurum = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=$il&appid=25ec0272aff270b3df4dad40b01329f3&units=metric&lang=tr");
if(str_contains($gethavadurum, 'city not found'))
{
    echo "İL BULUNAMADI";
    die();
}


$json = json_decode($gethavadurum, true);

$hissedilen = $json['main']['feels_like'];
$endusuk = $json['main']['temp_min'];
$enyuksek = $json['main']['temp_max'];
$ortalama = $json['main']['temp'];
echo '
<center>
<h2>En düşük sıcaklık: '.$endusuk.'</h2>
<h2>En yüksek sıcaklık: '.$enyuksek.'</h2>
<h2>Ortalama: '.$ortalama.'</h2>
<h2>Hissedilen: '.$hissedilen.'</h2>
</center>';
?>
