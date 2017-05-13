<?php 
require_once(__DIR__.'/vendor/autoload.php');
$api = new \Yandex\Geo\Api();
if (!empty($_GET['address'])){
$address = htmlspecialchars($_GET['address']);
$api->setQuery($address); 
$api->setLang(\Yandex\Geo\Api::LANG_RU);
$api->load();
$response = $api->getResponse();
$count =  $response->getFoundCount();
$lat = [];
$long = [];
$add=[];
$collection = $response->getList();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>библиотека яндекс карты</title>
</head>
<body>
<form action="index.php" method="get">
<input type="text" name="address"> 
<input type="submit" name="search" value="отобразить">
</form>
<?php if(!empty($collection)):?>
<table border="2">
<tr>
	<th>Адрес</th>
	<th>Широта</th>
	<th>Долгота</th>
</tr>
<?php $i=0; $lat = []; $long = []; foreach ($collection as  $value) :?>
<tr>
	
		<td><?php $add[$i] = $value->getAddress(); echo $add[$i];?></td>
		<td><?php  $lat[$i] = $value->getlatitude(); echo $lat[$i];?></td>
		<td><?php $long[$i] =  $value->getlongitude();echo $long[$i];?></td>
		
</tr>
<?php $i++; endforeach;?>

</table>
<script src="//api-maps.yandex.ru/2.0/?load=package.standard,package.geoObjects&lang=ru-RU" type="text/javascript"></script>
<script type="text/javascript">
        ymaps.ready(init);
        var myMap, 
            myPlacemark;

        function init(){ 
            myMap = new ymaps.Map("map", {
                center: [<?php echo $lat[0];?>,<?php echo $long[0];?> ],
                zoom: 7
            }); 
            
            myPlacemark = new ymaps.Placemark([<?php echo $lat[0];?>,<?php echo $long[0];?> ], {
                hintContent: "<?php echo $add[0];?>",
            
            });
            
            myMap.geoObjects.add(myPlacemark);
        }
    </script>
<div id="map" style="width:400px; height:300px"></div>
<?php endif; ?>
</body>
</html>
