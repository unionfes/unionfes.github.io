<?php
//error_reporting(0);

if (!empty($_POST)) {


    $error = array();
    $message = null;
    
    // name
    if (strlen($_POST['name']) >= 3 ) {
        $message.= "\nName: ". $_POST['name'];
    } elseif (empty($_POST['name'])) {
        $error[] = 'お名前は必須です。';
    } else {
        $error[] = 'お名前は3文字以上必要です。';
    }

    // email
    if (preg_match('/^[^@]*@[^@]*\.[^@]*$/', $_POST['email'])) {
        $message.= "\nEmail: ". $_POST['email'];
    } elseif (empty($_POST['email'])) {
        $error[] = 'Eメールアドレスは必須です。';
    } else {
        $error[] = 'Eメールアドレスが正しくありません。';
    }
        
    // phone
    if (preg_match('/[0-9]/', $_POST['phone'])) {
        $message.= "\nPhone: ". $_POST['phone'];
    } elseif (empty($_POST['phone'])) {
        $message.= "\nPhone: ". $_POST['phone'];
    } else {
        $error[] = '電話番号が正しくありません。';
    }
    
    // message
    if (strlen($_POST['message']) > 10 ) {
        $message.= "\nMessage: ". $_POST['message'];
    } elseif (empty($_POST['message'])) {
        $error[] = 'メッセージは必須です。';
    } else {
        $error[] = 'メッセージが短すぎます。';
    }

    if (empty($error)) {
        require_once 'lib/swift_required.php';
    
        $subject = 'TOJO K-ON Union Fes 問い合わせ';

        $from = $_POST['email'];
        $fromName = 'TOJO K-ON Union Fes サイトユーザー';
        $to = array(
        	'no1aran@gmail.com'
        );

        /*
        //Create the Transport
        $transport = Swift_SmtpTransport::newInstance('xxx.com', 999)
          ->setUsername('xxx@xxx.com')
          ->setPassword('xxx');

        //Sendmail
        $transport = Swift_SendmailTransport::newInstance('/usr/sbin/sendmail -bs');
        */
        
        //Mail
        $transport = Swift_MailTransport::newInstance();

        //Create the Mailer using your created Transport
        $mailer = Swift_Mailer::newInstance($transport);

        //Create a message
        $message = Swift_Message::newInstance($subject)
          ->setFrom(array($from => $fromName))
          ->setTo($to)
          ->setBody($message);

        //Send the message
        try {
            $success = $mailer->send($message);
            unset($_POST['message']);
        } catch (Exception $e) {
            $error[] = $e->getMessage();
        }
        
    }
    
}
?>
<!doctype html>
<html lang="ja" dir="ltr">

<!--Head-->
<head>
<meta http-equiv="content-type" content="text/html; charset=utf8">
<meta http-equiv="content-script-type" content="text/javascript">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="imagetoolbar" content="no">
<meta name="description" content="筑波大学のバンドサークルTOJO K-ONにまつわる全ての人たちが、世代を超えて共演するライブイベント TOJO K-ON Union Fes の公式サイト。">
<meta name="copyright" content="Copyright (c) 2013 TOJO K-ON">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>TOJO K-ON Union Fes '13</title>
<link rel="stylesheet" type="text/css" href="./css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="./css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="./css/main.css">
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-31318834-3']);
    _gaq.push(['_trackPageview']);
    
    (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>

</head>
<!--End Head-->

<body>

<!--Container-->
<div class="container" id="top">
    
    <!--Guitar Head-->
    <div class="g-head">
        <h1 class="title">TOJO K-ON<br>Union Fes<br>'13</h1>
        <img src="img/g-head.jpg" alt="g-head">
    </div>
    <!--End Guitar Head-->
    
    <!--Guitar Nut-->
    <table class="g-nut">
        <tr>
        	<td class="td-first"><a href="#info">Info</a></td>
        	<td class="td-second"><a href="#about">About</a></td>
        	<td class="td-third"><a href="#band">Band</a></td>
        	<td class="td-last"><a href="#contact">Contact</a></td>
        </tr>
    </table>
    <!--End Guitar Nut-->
    
	<!--Guitar Neck-->
	<div class="g-neck">
	    <h2 style="display: block; font-size: 26px; text-align: center;">TOJO K-ON Union Fes '13 は終了しました。<br>
	    また来年のイベントにご期待ください！！</h2>
		
		<h2>Info</h2>
		<img src="img/title_info.png" alt="Info" class="title" id="info">
		<div class="row-blk">
    		<div class="left-blk">
    			<h3>Date</h3>
    			<p><span class="big">2013年5月5日（日）</span><br>14:30 - Open<br>15:00 - Start<br />20:30 - 22:30 打ち上げ</p>
    		</div>
    		<div class="right-blk">
    			<h3>Price</h3>
    			<p>一般：¥1,500<br>学生：¥1,000<br>※1ドリンク代¥500込み<br>※打ち上げのドリンクは別途注文制</p>
    		</div>
    	</div>
    	<div class="row-blk">
    		<div class="left-blk"><h3>Live House</h3>
    			<p>飯田橋スペースウィズ<br>東京都千代田区飯田橋1-7-3<br>増田金属ビルB1F<br><a href="http://www.spacewith.com">http://www.spacewith.com</a></p>
    		</div>
    		<div class="right-blk map">
    			<iframe width="" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E9%A3%AF%E7%94%B0%E6%A9%8B%E3%82%B9%E3%83%9A%E3%83%BC%E3%82%B9%E3%82%A6%E3%82%A3%E3%82%BA&amp;sll=35.947144,139.98233&amp;sspn=0.009502,0.021136&amp;brcurrent=3,0x60188c41654910f1:0x841a0b43b636edb2,0&amp;ie=UTF8&amp;hq=%E9%A3%AF%E7%94%B0%E6%A9%8B%E3%82%B9%E3%83%9A%E3%83%BC%E3%82%B9%E3%82%A6%E3%82%A3%E3%82%BA&amp;hnear=&amp;radius=15000&amp;t=m&amp;ll=35.701429,139.746566&amp;spn=0.008713,0.010257&amp;z=15&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E9%A3%AF%E7%94%B0%E6%A9%8B%E3%82%B9%E3%83%9A%E3%83%BC%E3%82%B9%E3%82%A6%E3%82%A3%E3%82%BA&amp;sll=35.947144,139.98233&amp;sspn=0.009502,0.021136&amp;brcurrent=3,0x60188c41654910f1:0x841a0b43b636edb2,0&amp;ie=UTF8&amp;hq=%E9%A3%AF%E7%94%B0%E6%A9%8B%E3%82%B9%E3%83%9A%E3%83%BC%E3%82%B9%E3%82%A6%E3%82%A3%E3%82%BA&amp;hnear=&amp;radius=15000&amp;t=m&amp;ll=35.701429,139.746566&amp;spn=0.008713,0.010257&amp;z=15">大きな地図で見る</a></small>
    		</div>
    	</div>

		<p class="linktotop"><a href="#top">▲トップに戻る</a></p>

		<h2>About</h2>
		<img src="img/title_about.png" alt="About" class="title" id="about">
		<p>TOJO K-ON Union Fesは、筑波大学のバンドサークルTOJO K-ONにまつわる全ての人たちが、世代を超えて共演するライブイベントです。第1回は2011年5月4日に開催されました。今年もゴールデンウィーク真っ只中、5/5（金）に開催されます！こどもの日！！</p>
		<p><a href="http://d.hatena.ne.jp/TOJO_K-ON/20120504">TOJO K-ON Union Fes '12の様子</a></p>
		<p>出演はTOJO K-ONの関係者なら誰でも、現役でも卒業生でも学生でも社会人でも（無職でも）参加できます。もちろん、観覧はどなたでも大歓迎。どしどしご参加ください！！</p>
		<div class="row-blk">
    		<div class="left-blk">
    			<a href="http://www.upsold.com/dshop/store/no1aran/"><img src="img/tshirt.png" alt="tshirt" width="" height="" /></a>
    		</div>
    		<div class="right-blk">
    			<h3>Tシャツ販売中！！</h3>
    			<p>ロゴTシャツを<a href="http://www.upsold.com/dshop/store/no1aran/">Upsold.comストア</a>で販売中です。<br>
    			その種類なんと40色以上！カラフルにユニオン<br>フェスを盛り上げていきましょう！！</p>
    			<p class="bold">Price（税込） ¥2,500【淡色】 / ¥3,000【濃色】</p>
    			<ul class="notice">
    				<li>プリントは片面のみです。</li>
    				<li>Tシャツの売上による利益分はTOJO K-ON Union Fes '13の運営費として使用されます。</li>
    				<li>お届けには1週間程度かかります。<br>余裕を持ってご注文ください。</li>
    			</ul>
    		</div>
    	</div>

		<p class="linktotop"><a href="#top">▲トップに戻る</a></p>

		<h2>Band</h2>
		<img src="img/title_band.png" alt="Band" class="title" id="band">
        <div id="band_group">
        	<div class="band">
        	<img src="img/band/1.jpg" alt="ザ・海峡">
        		<div class="desc">
        			<p><span class="order">01</span><span class="bname">ザ・海峡</span></p>
        			<p class="time">15:00 - 15:35</p>
        			<table class="members">
        			 <tr>
            			<th class="icon-vo"></th>
            			<td>たさき</td>
            			<th class="icon-gt"></th>
            			<td>たっきー</td>
        			 </tr>
        			 <tr>
            			<th class="icon-ba"></th>
            			<td>やまじゅん</td>
            			<th class="icon-dr"></th>
            			<td>アラン</td>
        			 </tr>
            		</table>
            		<p>Nothing's Carved In Stoneのコピー。</p>
        		</div>
        	</div>
        	<div class="band">
        	<img src="img/band/2.jpg" alt="第六回">
        		<div class="desc">
        			<p><span class="order">02</span><span class="bname">第六回</span></p>
        			<p class="time">15:35 - 16:10</p>
        			<table class="members">
        			 <tr>
            			<th class="icon-vo"></th>
            			<td>川端　彬子</td>
            			<th class="icon-gt"></th>
            			<td>山崎　裕</td>
        			 </tr>
        			 <tr>
            			<th class="icon-ba"></th>
            			<td>関　荘樹</td>
            			<th class="icon-key"></th>
            			<td>栗田　尚明</td>
        			 </tr>
        			 <tr>
            			<th class="icon-dr"></th>
            			<td>高橋　一貴</td>
            			<th>&nbsp;</th>
            			<td>&nbsp;</td>
        			 </tr>
            		</table>
            		<p>六回目になりました。東京事変のコピーをします。</p>
        		</div>
        	</div>
        	<div class="band">
        	<img src="img/band/3.jpg" alt="German measles">
        		<div class="desc">
        			<p><span class="order">03</span><span class="bname">German measles</span></p>
        			<p class="time">16:10 - 16:45</p>
        			<table class="members">
        			 <tr>
            			<th class="icon-vo"></th>
            			<td>ヨーシ・ダンキアン</td>
            			<th class="icon-gt"></th>
            			<td>イトン・ゴウキアン</td>
        			 </tr>
        			 <tr>
            			<th class="icon-ba"></th>
            			<td>イシ・グロジアン</td>
            			<th class="icon-dr"></th>
            			<td>ユョン・ヤジマヤン</td>
        			 </tr>
            		</table>
            		<p>システム・オブ・ア・ダウンやるよ～</p>
        		</div>
        	</div>
        	<div class="band">
        	<img src="img/band/4.jpg" alt="咤淵之光">
        		<div class="desc">
        			<p><span class="order">04</span><span class="bname">咤淵之光<span style="font-size: 50%;">（たぶちのひかり）</span></span></p>
        			<p class="time">16:45 - 17:20</p>
        			<table class="members">
        			 <tr>
            			<th style="font-size: 20%; line-height: 1;">ファッションモンスター</th>
            			<td>たぶち</td>
            			<th class="icon-ba"></th>
            			<td>おーの</td>
        			 </tr>
        			 <tr>
            			<th class="icon-gt"></th>
            			<td>いけっち</td>
            			<th class="icon-dr"></th>
            			<td>はなょし</td>
        			 </tr>
        			 <tr>
            			<th class="icon-key"></th>
            			<td>さわだ</td>
            			<th>&nbsp;</th>
            			<td>&nbsp;</td>
        			 </tr>
            		</table>
            		<p>たぶちさんを眺めてください。</p>
        		</div>
        	</div>
        	<div class="band">
        	<img src="img/band/5.jpg" alt="クロ・クロ">
        		<div class="desc">
        			<p><span class="order">05</span><span class="bname">クロ・クロ</span></p>
        			<p class="time">17:40 - 18:15</p>
        			<table class="members">
        			 <tr>
            			<th style="font-size: 20%; line-height: 1;">ちずわ</th>
            			<td>ちずわ</td>
            			<th class="icon-gt"></th>
            			<td>ダイヤマ</td>
        			 </tr>
        			 <tr>
            			<th class="icon-dr"></th>
            			<td>イノウエ</td>
            			<th>&nbsp;</th>
            			<td>&nbsp;</td>
        			 </tr>
            		</table>
        			<p>原作：くるり　演出・演奏：クロ・クロ　それでも地球は回っている。</p>
        		</div>
        	</div>
        	<div class="band">
        	<img src="img/band/6.jpg" alt="沈黙のバンド">
        		<div class="desc">
        			<p><span class="order">06</span><span class="bname">沈黙のバンド</span></p>
        			<p class="time">18:15 - 18:50</p>
        			<table class="members">
        			 <tr>
            			<th class="icon-gt"></th>
            			<td>タカヒロ</td>
            			<th class="icon-ba"></th>
            			<td>June</td>
        			 </tr>
        			 <tr>
            			<th class="icon-dr"></th>
            			<td>アラン</td>
            			<th>&nbsp;</th>
            			<td>&nbsp;</td>
        			 </tr>
            		</table>
        			<p>オリジナルをやります。</p>
        		</div>
        	</div>
        	<div class="band">
        	<img src="img/band/7.jpg" alt="LOSTINOUE">
        		<div class="desc">
        			<p><span class="order">07</span><span class="bname">LOSTINOUE</span></p>
        			<p class="time">18:50 - 19:25</p>
        			<table class="members">
        			 <tr>
            			<th class="icon-vo"></th>
            			<td>イノウエ</td>
            			<th class="icon-gt"></th>
            			<td>イトウ</td>
        			 </tr>
        			 <tr>
            			<th class="icon-ba"></th>
            			<td>やまじゅん</td>
            			<th class="icon-dr"></th>
            			<td>ヤジマ</td>
        			 </tr>
            		</table>
            		<p>奈良のロックバンド、LOSTAGEのコピーをします。心配ない！</p>
        		</div>
        	</div>
        	<div class="band">
        	<img src="img/band/8.jpg" alt="すずきふじもと">
        		<div class="desc">
        			<p><span class="order">08</span><span class="bname">すずきふじもと</span></p>
        			<p class="time">19:25 - 20:00</p>
        			<table class="members">
        			 <tr>
            			<th class="icon-vo"></th>
            			<td>みずき</td>
            			<th class="icon-gt"></th>
            			<td>ふじもと</td>
        			 </tr>
        			 <tr>
            			<th class="icon-ba"></th>
            			<td>くさっき〜</td>
            			<th class="icon-dr"></th>
            			<td>トゥガーワ</td>
        			 </tr>
            		</table>
            		<p>ご迷惑をおかけいたします。ウホウホ！！！！！！</p>
        		</div>
        	</div>
        </div>

		<p class="linktotop"><a href="#top">▲トップに戻る</a></p>

		<h2>Contact</h2>
		<img src="img/title_contact.png" alt="Contact" class="title" id="contact">
		<p>ご質問・ご意見などは、以下のフォームからご連絡ください。<br>
		<strong>*</strong> は必須項目です。</p>
		<?php
		if (!empty($error)) {
		    foreach($error as $message) {
		        echo '<strong>*'. $message .'</strong>';
		    }
		}
		
		if (!empty($success)) {
		    echo '<h4 style="color:green;">ありがとうございます。メッセージを受け付けました！</h4>';
		}
		
		?>
		<div class="contact-form">
    		<form action="index.php#contact" method="post" accept-charset="utf-8">
    		    <table border="0" cellspacing="0" cellpadding="8" class="formtable">
    		        <tr>
    		            <th>お名前<strong>*</strong></th>
    		            <td><input type="text" name="name" value="<?php if (!empty($_POST['name'])) echo $_POST['name']; ?>" id="name" class="validate[required] text-input"></td>
    		        </tr>
    		        <tr>
    		            <th>Eメール<strong>*</strong></th>
    		            <td><input type="text" name="email" value="<?php if (!empty($_POST['email'])) echo $_POST['email']; ?>" id="email"></td>
    		        </tr>
    		        <tr>
    		            <th>電話番号</th>
    		            <td><input type="text" name="phone" value="<?php if (!empty($_POST['phone'])) echo $_POST['phone']; ?>" id="phone"></td>
    		        </tr>
    		        <tr>
    		            <th>メッセージ<strong>*</strong></th>
    		            <td><textarea name="message" id="message" rows="6"><?php if (!empty($_POST['message'])) echo $_POST['message']; ?></textarea></td>
    		        </tr>
    		        <tr>
    		            <td colspan="2" class="buttontable">
        		            <input type="submit" value="Submit" class="btn btn-danger btn-large">
        		            <input type="reset" value="Clear" class="btn btn-earth btn-large">
    		            </td>
    		        </tr>
    		    </table>
    		</form>
		</div>
		
		<p class="linktotop"><a href="#top">▲トップに戻る</a></p>
		
		<img src="img/joint.png" alt="joint" width="" height="" class="joint" />
		
	</div>
	<!--End Guitar Neck-->

</div>
<!--End Container-->

<!--Guitar Pickups-->
<div class="pickup-outer">
	<div class="pickup pickup-first">
		<div class="pickup-inner">
	    	Copyright &copy; 2013 <a href="http://www.stb.tsukuba.ac.jp/~tojo_k-on/">TOJO K-ON</a>. All rights reserved.
		</div>
	</div>
	<div class="pickup">
		<div class="pickup-inner">
	    	Designed by <a href="http://twitter.com/round_kmdr">@round_kmdr</a> / Coded by <a href="http://twitter.com/no1aran">@no1aran</a>
		</div>
	</div>
</div>
<!--End Guitar Pickups-->

</body>
</html>