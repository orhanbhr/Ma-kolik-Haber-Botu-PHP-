<?php

	$url = file_get_contents("http://www.mackolik.com/futbol-haberleri");

	preg_match_all('#<div class="news-coll-temp">(.*?)<div class="clr"></div>#Ssie',$url,$haberler);

	#print_r($haberler);

	for($h=0; $h < 3; $h++){

		// Parçalamalar
		preg_match_all('#<div class="news-img-transp">(.*?)</div>#Ssie',$haberler[0][$h],$title);
		preg_match_all('#src="(.*?)"#Ssie',$haberler[0][$h],$img);
		preg_match_all('#<a href="(.*?)" target="_blank">#Ssie',$haberler[0][$h],$url);
		preg_match_all('#<div class="news-coll-text">(.*?)</div>#Ssie',$haberler[0][$h],$description);

		// Değişkenler
		$baslik = trim($title[1][0]);
		$resim = $img[1][0];
		$link = $url[1][0];
		$aciklama = $description[1][0];

		$icerikUrl = file_get_contents($link);

		preg_match_all('#<div class="newsdetail-text" itemprop="articleBody">(.*?)</div>#Ssie',$icerikUrl,$haberdetay);

		$icerik = $haberdetay[1][0];

		echo $icerik;

	}

?>
