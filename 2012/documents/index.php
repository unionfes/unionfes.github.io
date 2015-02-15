<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja" dir="ltr">

<!--Head-->
<head>
<meta http-equiv="content-type" content="text/html; charset=utf8">
<meta http-equiv="content-script-type" content="text/javascript">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="imagetoolbar" content="no">
<meta name="description" content="筑波大学のバンドサークルTOJO K-ONにまつわる全ての人たちが、世代を超えて共演するライブイベント TOJO K-ON Union Fes の公式サイト。">
<meta name="copyright" content="Copyright (c) 2012 TOJO K-ON">
<title>TOJO K-ON Union Fes '12</title>
<link rel="stylesheet" type="text/css" media="all" href="../css/main.css">
<script src="../script/heightLine.js" type="text/javascript"></script>
</head>
<!--End Head-->

<!--Body-->
<body>

<!--Base-->
<div id="base">

<h1 class="title"><a href="../">TOJO K-ON<br>Union Fes '12</a></h1>
<div class="url">Friday, May 4, 2012</div>

<!--Container-->
<div id="container">

<ul id="nav">
	<li><a href="../index.php#news">NEWS</a></li>
	<li><a href="../index.php#about">ABOUT</a></li>
	<li><a href="../index.php#artists">ARTISTS</a></li>
	<li><a href="../index.php#contact">CONTACT</a></li>
</ul>

	<!--Content Container-->
	<div id="container-inner">

		<!--Content Left-->
		<div id="content" class="heightLine">
		
		<a name="about" class="name"><h2>DOCUMENTS</h2></a>
		<p>出演者に必要な書類をこちらでダウンロードできます。</p>
		<ul>
			<li>当日スケジュール <span class="new">New!</span>（PDF形式）<a href="./schedule.pdf">schedule.pdf</a></li>
			<li>注意事項（PDF形式）<a href="./notice.pdf">notice.pdf</a></li>
			<li>セッティングシート（PDF形式）<a href="./setting.pdf">setting.pdf</a></li>
			<li>セッティングシート（DOC形式）<a href="./setting.doc">setting.doc</a></li>
		</ul>
		</div>
		<!--End Content-->

	</div>
	<!--End Content Container-->

	<!--SideBar-->
	<div id="sidebar" class="heightLine">
	
		<h2>COUNTDOWN</h2>
	<p>

<?php /*
   declare target date; source: http://us.imdb.com/ReleaseDates?0121766 ; 
  */
  $day   = 4;     // Day of the countdown
  $month = 5;      // Month of the countdown
  $year  = 2012;   // Year of the countdown
  $hour  = 14;     // Hour of the day (east coast time)

  $calculation = ((mktime ($hour,0,0,$month,$day,$year) - time(void))/3600);
  $hours = (int)$calculation;
  $days  = (int)($hours/24);
  $daystohours = (int)($days*24);
?>

<p><span class="figure"><?php echo $days; ?></span> days, <span class="figure"><?php echo $hours-$daystohours; ?></span> hours</p>
	
	<h2>TOJO K-ON Union Fes '12</h2>
	<h3>日時</h3>
	<p>2012年5月4日（金・祝）<br>13:45~ Open<br>14:15~ Start<br />21:00~ 打ち上げ</p>
	<h3>場所</h3>
	<p>飯田橋スペースウィズ<br>東京都千代田区飯田橋1-7-3<br>増田金属ビルB1F<br><a href="http://www.spacewith.com/">http://www.spacewith.com/</a></p>
	<iframe width="240" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E9%A3%AF%E7%94%B0%E6%A9%8B%E3%82%B9%E3%83%9A%E3%83%BC%E3%82%B9%E3%82%A6%E3%82%A3%E3%82%BA&amp;sll=35.947144,139.98233&amp;sspn=0.009502,0.021136&amp;brcurrent=3,0x60188c41654910f1:0x841a0b43b636edb2,0&amp;ie=UTF8&amp;hq=%E9%A3%AF%E7%94%B0%E6%A9%8B%E3%82%B9%E3%83%9A%E3%83%BC%E3%82%B9%E3%82%A6%E3%82%A3%E3%82%BA&amp;hnear=&amp;radius=15000&amp;t=m&amp;ll=35.701429,139.746566&amp;spn=0.008713,0.010257&amp;z=15&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E9%A3%AF%E7%94%B0%E6%A9%8B%E3%82%B9%E3%83%9A%E3%83%BC%E3%82%B9%E3%82%A6%E3%82%A3%E3%82%BA&amp;sll=35.947144,139.98233&amp;sspn=0.009502,0.021136&amp;brcurrent=3,0x60188c41654910f1:0x841a0b43b636edb2,0&amp;ie=UTF8&amp;hq=%E9%A3%AF%E7%94%B0%E6%A9%8B%E3%82%B9%E3%83%9A%E3%83%BC%E3%82%B9%E3%82%A6%E3%82%A3%E3%82%BA&amp;hnear=&amp;radius=15000&amp;t=m&amp;ll=35.701429,139.746566&amp;spn=0.008713,0.010257&amp;z=15" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>
	<h3>料金</h3>
	<p>一般：¥1,500<br>学生：¥1000<br>※1ドリンク代¥500込み<br>※打ち上げはオーダー制</p>
	<h2>TWITTER</h2>
	<div id="twitter">
	<script src="http://widgets.twimg.com/j/2/widget.js"></script>
	<script>
	new TWTR.Widget({
	  version: 2,
	  type: 'profile',
	  rpp: 4,
	  interval: 30000,
	  width: 'auto',
	  height: 300,
	  theme: {
	    shell: {
	      background: '#009ece',
	      color: '#ffffff'
	    },
	    tweets: {
	      background: '#ffffff',
	      color: '#000000',
	      links: '#258bcf'
	    }
	  },
	  features: {
	    scrollbar: false,
	    loop: false,
	    live: false,
	    behavior: 'all'
	  }
	}).render().setUser('TojoKonUnionFes').start();
	</script>
	</div>

	</div>
	<!--End SideBar-->

</div>
<!--End Container-->

</div>
<!--End Base-->

</body>
<!-- End Body -->

</html>