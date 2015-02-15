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
<title>TOJO K-ON Union Fes '14</title>
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
    
    <h1 style="color: #fff;font-size: 100px;font-weight: bold;letter-spacing: -2px;text-align: center;margin: 40px 0;line-height: 0.9;">TOJO K-ON<br>Union Fes '14</h1>
    
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
	
		<h2>Info</h2>
		<img src="img/title_info.png" alt="Info" class="title" id="info">
		<div class="row-blk">
    		<div class="left-blk">
    			<h3>Date</h3>
    			<p><span class="big">2014年5月4日（日）</span><br>15:30 Open<br>16:00 Start<br>20:40~　打ち上がるぜ！</p>
    		</div>
    		<div class="right-blk">
    			<h3>Price</h3>
    			<p>入場無料＋ドリンク代（500円）<br>※別途打ち上げ参加費</p>
    		</div>
    	</div>
    	<div class="row-blk">
    		<div class="left-blk"><h3>Live House</h3>
    			<p>浅草KURAWOOD<br>東京都台東区駒形1丁目3-8<br>ベッコアメ浅草ビルB1F<br><a href="http://kurawood.jp">http://kurawood.jp</a></p>
    		</div>
    		<div class="right-blk map">
    			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.805566694331!2d139.79390899999996!3d35.70640199999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188ec7fd3949a3%3A0x66fe4ebf5f8fbc7a!2z5rWF6I2J44Kv44Op44Km44OJ!5e0!3m2!1sja!2sus!4v1395809871028" width="" height="250" frameborder="0" style="border:0"></iframe>
    		</div>
    	</div>

		<p class="linktotop"><a href="#top">▲トップに戻る</a></p>
		
		<h2>About</h2>
		<img src="img/title_about.png" alt="About" class="title" id="about">
		<p>TOJO K-ON Union Fesは、筑波大学のバンドサークルTOJO K-ONにまつわる全ての人たちが、世代を超えて共演するライブイベントです。第1回は2011年5月4日に開催されました。今年もゴールデンウィーク真っ只中、5/4（日）に開催されます！みどりの日！！</p>
		<p><a href="2013">TOJO K-ON Union Fes '13 ウェブサイト</a></p>
		<p>出演はTOJO K-ONの関係者なら誰でも、現役でも卒業生でも学生でも社会人でも（無職でも）（光が見えなくても）参加できます。もちろん、観覧はどなたでも大歓迎。どしどしご参加ください！！</p>

		<p class="linktotop"><a href="#top">▲トップに戻る</a></p>

		<h2>Band</h2>
		<img src="img/title_band.png" alt="Band" class="title" id="band">

        <div id="band_group">
        	<div class="band">
        	<img src="img/band/1.jpg" alt="三人娘">
        		<div class="desc">
        			<p><span class="order">01</span><span class="bname">三人娘</span></p>
        			<p class="time">16:00 - 16:35</p>
        			<table class="members">
        			 <tr>
            			<th class="icon-vo"></th>
            			<td>アキコ</td>
            			<th class="icon-gt"></th>
            			<td>アキコ</td>
        			 </tr>
        			 <tr>
            			<th class="icon-ba"></th>
            			<td>マドカ</td>
            			<th class="icon-dr"></th>
            			<td>アラン</td>
        			 </tr>
            		</table>
            		<p>戻ってきちゃった！(GO!GO!7188のコピー）</p>
        		</div>
        	</div>
        	<div class="band">
        	<img src="img/band/2.jpg" alt="三人♂">
        		<div class="desc">
        			<p><span class="order">02</span><span class="bname">三人♂</span></p>
        			<p class="time">16:35 - 17:10</p>
        			<table class="members">
        			 <tr>
            			<th class="icon-vo"></th>
            			<td>セーノ</td>
            			<th class="icon-gt"></th>
            			<td>セーノ、やじま</td>
        			 </tr>
        			 <tr>
            			<th class="icon-ba"></th>
            			<td>やじま</td>
            			<th class="icon-dr"></th>
            			<td>DEBU</td>
        			 </tr>
             		</table>
            		<p>人間椅子のコピー</p>
        		</div>
        	</div>
        	<div class="band">
        	<img src="img/band/3.jpg" alt="完全体">
        		<div class="desc">
        			<p><span class="order">03</span><span class="bname">完全体</span></p>
        			<p class="time">17:10 - 17:45</p>
        			<table class="members">
        			 <tr>
            			<th class="icon-vo"></th>
            			<td>田崎</td>
            			<th class="icon-gt"></th>
            			<td>田崎</td>
        			 </tr>
        			 <tr>
            			<th class="icon-ba"></th>
            			<td>山元</td>
            			<th class="icon-dr"></th>
            			<td>戸川</td>
        			 </tr>
        			 <tr>
            			<th class="icon-gt"></th>
            			<td>山崎</td>
            			<th>&nbsp;</th>
            			<td>&nbsp;</td>
        			 </tr>

            		</table>
            		<p>アルカラのコピー</p>
        		</div>
        	</div>
        	<div class="band">
        	<img src="img/band/4.jpg" alt="未定">
        		<div class="desc">
        			<p><span class="order">04</span><span class="bname">Cellar Door</span></p>
        			<p class="time">17:45 - 18:20</p>
        			<table class="members">
        			 <tr>
            			<th class="icon-gt"></th>
            			<td>だいやま</td>
            			<th class="icon-vo"></th>
            			<td>だいやま</td>
        			 </tr>
        			 <tr>
            			<th class="icon-ba"></th>
            			<td>橋本</td>
            			<th class="icon-dr"></th>
            			<td>田中み</td>
        			 </tr>
            		</table>
            		<p>急ごしらえですが、宜しくお願いします。</p>
        		</div>
        	</div>
        	<div class="band">
        	<img src="img/band/5.jpg" alt="空中城塞ゴリョウカク">
        		<div class="desc">
        			<p><span class="order">05</span><span class="bname">空中城塞ゴリョウカク</span></p>
        			<p class="time">18:20 - 18:55</p>
        			<table class="members">
        			 <tr>
            			<th class="icon-gt"></th>
            			<td>みっきー</td>
            			<th class="icon-vo"></th>
            			<td>みっきー</td>
        			 </tr>
        			 <tr>
            			<th class="icon-gt"></th>
            			<td>もっちー</td>
            			<th class="icon-ba"></th>
            			<td>さっちゃん</td>
        			 </tr>
        			 <tr>
            			<th class="icon-dr"></th>
            			<td>SHOWGO</td>
            			<th>&nbsp;</th>
            			<td>&nbsp;</td>
        			 </tr>

            		</table>
        			<p>VOCAROCK</p>
        		</div>
        	</div>
        	<div class="band">
        	<img src="img/band/6.jpg" alt="ニューキャシーメガネ">
        		<div class="desc">
        			<p><span class="order">06</span><span class="bname">ニューキャシーメガネ</span></p>
        			<p class="time">18:55 - 19:30</p>
        			<table class="members">
        			 <tr>
            			<th class="icon-key"></th>
            			<td>EHAMIC</td>
            			<th class="icon-vo"></th>
            			<td>あゆみ</td>
        			 </tr>
        			 <tr>
            			<th class="icon-dr"></th>
            			<td>はなょし</td>
            			<th class="icon-ba"></th>
            			<td>ますもと</td>
        			 </tr>
        			 <tr>
            			<th class="icon-vo"></th>
            			<td>もとはせ</td>
            			<th class="icon-gt"></th>
            			<td>ぼんでぃ</td>
        			 </tr>

            		</table>
        			<p>結成10年目を迎えたキャシーのニューなメガネをご堪能ください。ＣＤ発売中！！</p>
        		</div>
        	</div>
        	<div class="band">
        	<img src="img/band/7.jpg" alt="B○S">
        		<div class="desc">
        			<p><span class="order">07</span><span class="bname">B○S</span></p>
        			<p class="time">19:30 - 20:05</p>
        			<table class="members">
        			 <tr>
            			<th class="icon-vo"></th>
            			<td>プー・アキ、ファーストサマーイケダ、カミヤネモ</td>
            			<th class="icon-gt"></th>
            			<td>JH（ジュンコハシモト）</td>
        			 </tr>
        			 <tr>
            			<th class="icon-ba"></th>
            			<td>ヒラノミョゾミ</td>
            			<th class="icon-dr"></th>
            			<td>コショージヤジマ</td>
        			 </tr>
        			 <tr>
            			<th class="icon-key"></th>
            			<td>マエマエコ</td>
            			<th>&nbsp;</th>
            			<td>&nbsp;</td>
        			 </tr>
            		</table>
            		<p>びしゅうううぅうぅう</p>
        		</div>
        	</div>
        	<div class="band">
        	<img src="img/band/8.jpg" alt="モツニコミ・ヤキニク・サラダ・キムチ">
        		<div class="desc">
        			<p><span class="order">08</span><span class="bname">モツニコミ・ヤキニク・サラダ・キムチ</span></p>
        			<p class="time">20:05 - 20:40</p>
        			<table class="members">
        			 <tr>
            			<th class="icon-vo"></th>
            			<td>いとう</td>
            			<th class="icon-gt"></th>
            			<td>いとう</td>
        			 </tr>
        			 <tr>
            			<th class="icon-ba"></th>
            			<td>やました</td>
            			<th class="icon-dr"></th>
            			<td>トゥガーワ</td>
        			 </tr>
            		</table>
            		<p>煮込んでやる！！！！！！！！！！！！！！！！！</p>
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