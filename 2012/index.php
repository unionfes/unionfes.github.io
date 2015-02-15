<?php
//error_reporting(0);

if (!empty($_POST)) {


    $error = array();
    $message = null;
    
    // name
    if (strlen($_POST['name']) >= 3 ) {
        $message.= "\nName: ". $_POST['name'];
    } elseif (empty($_POST['name'])) {
        $error[] = '名前は必須です。';
    } else {
        $error[] = '名前は3文字以上必要です。';
    }
    
    // band
    if ($_POST['band']) {
        $message.= "\nBand: ". $_POST['band'];
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
        	'drill_drill_drill@me.com',
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
<link rel="stylesheet" type="text/css" media="all" href="./css/main.css">
<script src="./script/heightLine.js" type="text/javascript"></script>
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

<!--Body-->
<body>

<!--Base-->
<div id="base">

<h1 class="title"><a href="./">TOJO K-ON<br>Union Fes '12</a></h1>
<div class="url">Friday, May 4, 2012</div>

<!--Container-->
<div id="container">

<ul id="nav">
	<li><a href="#news">NEWS</a></li>
	<li><a href="#about">ABOUT</a></li>
	<li><a href="#artists">ARTISTS</a></li>
	<li><a href="#contact">CONTACT</a></li>
</ul>

	<!--Content Container-->
	<div id="container-inner">

		<!--Content Left-->
		<div id="content" class="heightLine">
		
		<?php
		if (!empty($error)) {
		    foreach($error as $message) {
		        echo '<strong>*'. $message .'</strong>';
		    }
		}
		
		if (!empty($success)) {
		    echo '<h3 style="color:green;">ありがとうございます。メッセージを受け付けました！</h3>';
		}
		
		?>
		
		<h2 class="nobd"><strong>TOJO K-ON Union Fes '12 は終了しました。<br>また来年にご期待ください！</strong></h2>
		<p><a href="http://d.hatena.ne.jp/TOJO_K-ON/20120504">TOJO K-ON Union Fes 2012の様子</a></p>
		
		<a name="news" class="name"><h2>NEWS</h2></a>
		<dl>
		<dt>2012/04/23</dt><dd><p><a href="./documents/">Documents</a> に当日スケジュールを掲載しました。</p></dd>
		<dt>2012/04/08</dt><dd><p>「ジャニス平島」のプロフィールを掲載しました。</p></dd>
		<dt>2012/04/07</dt><dd><p>「デカンタ」のプロフィールを掲載しました。</p></dd>
		<dt>2012/03/27</dt><dd><p><strong>ライブ開始時刻、出演順に変更がありました。</strong>出演順は <a href="#artists">Artists</a> をご覧ください。</br><a href="./documents/">Documents</a> に出演者用の資料を掲載しました。</p></dd>
		<dt>2012/03/20</dt><dd><p>「Parcodia」のプロフィールを掲載しました。</p></dd>
		</dl>
		
		<a name="about" class="name"><h2>ABOUT</h2></a>
		<p>TOJO K-ON Union Fesは、筑波大学のバンドサークルTOJO K-ONにまつわる全ての人たちが、世代を超えて共演するライブイベントです。2011年5月4日に記念すべき第1回が開催され、今年もめでたくゴールデンウィーク真っ只中、5/4（金）に開催の運びとなりました！！</p>
		
		<p><a href="http://d.hatena.ne.jp/TOJO_K-ON/20110505">TOJO K-ON Union Fes 2011の様子</a></p>

		<p>出演はTOJO K-ONの関係者なら誰でも、現役でも卒業生でも学生でも社会人でも（無職でも）参加できます。もちろん、観覧はどなたでも大歓迎。どしどしご参加ください！！</p>

		<a name="artists" class="name"><h2>ARTISTS</h2></a>
		<p>出演アーティスト発表！！（出演順）</p>
		
<div id="band_group">
	<div class="band">
	<img class="ap" src="./images/3.jpg">
		<div class="desc">
			<p><span class="order">01</span><span class="bname">募集中</span></p>
			<p class="time">14:15 - 14:50</p>
			<p class="members">伊藤(Vo/Gt), 藤本(Gt), 高(Ba), 谷嶋(Dr)</p>
			<p>頑張ってオリジナルをやるのでよかったら見てね</p>
		</div>
	</div>
	<div class="band">
	<img class="ap" src="./images/2.jpg">
		<div class="desc">
			<p><span class="order">02</span><span class="bname">ロな</span></p>
			<p class="time">14:50 - 15:25</p>
			<p class="members">ボUICHI(Vo), AYARAN(Gt), ONUZO(Gt), O(31)(Ba), O(29)(Ba), 嶋矢(Dr.)</p>
			<p>LUNA SEAやります。もっと来いよおおおおおおおおおお！！！！</p>
		</div>
	</div>
	<div class="band">
	<img class="ap" src="./images/5.jpg">
		<div class="desc">
			<p><span class="order">03</span><span class="bname">ジャニス平島</span></p>
			<p class="time">15:25 - 16:00</p>
			<p class="members">平島(Gt), 川端(Vo), 伊藤(Ba), 大橋(Dr), エハミック(Key)</p>
			<p>Janis Joplinのコピーやります。</p>
		</div>
	</div>
	<div class="band">
	<img class="ap" src="./images/6.jpg">
		<div class="desc">
			<p><span class="order">04</span><span class="bname">デカンタ</span></p>
			<p class="time">16:15 - 16:50</p>
			<p class="members">小林(Vo/Gt), 中山(Gt), 増本(Ba), 宝田(Dr)</p>
			<p>僕はデカンタ。君もデカンタ。</p>
		</div>
	</div>
	<div class="band">
	<img class="ap" src="./images/7.jpg">
		<div class="desc">
			<p><span class="order">05</span><span class="bname">テケレテテ</span></p>
			<p class="time">16:50 - 17:25</p>
			<p class="members">店長, もっちー, タッキー, せき, クリリン, SHOWGO</p>
			<p>Imagine the metal</p>
		</div>
	</div>
	<div class="band">
	<img class="ap" src="./images/9.jpg">
		<div class="desc">
			<p><span class="order">06</span><span class="bname">ニューキャシーメガネ</span></p>
			<p class="time">17:25 - 18:00</p>
			<p class="members">あゆみ(Vo), もとはせ(Cho), ぼんでぃ(Gt), ますもと(Ba), はなょし(Dr), エハミック(Key)</p>
			<p>アルバムできたのでライブ出ます！今が旬な6人組オリジナルバンド。</p>
		</div>
	</div>
	<div class="band">
	<img class="ap" src="./images/1.jpg">
		<div class="desc">
			<p><span class="order">07</span><span class="bname">Ikasa May</span></p>
			<p class="time">18:15 - 18:50</p>
			<p class="members">ヤス(Gt), やまさき(Gt), 関(Ba), TK(Dr)</p>
			<p>オリジナルインストゥルメンタルバンド。アクティブ系コミュ障目指してます。</p>
		</div>
	</div>
	<div class="band">
	<img class="ap" src="./images/4.jpg">
		<div class="desc">
			<p><span class="order">08</span><span class="bname">Parcodia</span></p>
			<p class="time">18:50 - 19:25</p>
			<p class="members">有川美貴子(Vo), 中沢彰吾(Gt), 佐藤周平(Ba), しーぽん(Key), アラン(Dr)</p>
			<p>今回が2度目の出演となります！Parcodiaです！<br>ぜひぜひパルコの音楽を楽しんでいただきたいと思います！よろしくお願いします！</p>
		</div>
	</div>
	<div class="band">
	<img class="ap" src="./images/8.jpg">
		<div class="desc">
			<p><span class="order">09</span><span class="bname">ZAMPAN</span></p>
			<p class="time">19:25 - 20:00</p>
			<p class="members">ひげ、ぽんしー＆もっちー、アイアンSHOWGO、不細工</p>
			<p>音楽が好きです。アニメが好きです。初音ミクが好きです。ニコ動が好きです。ゆとり世代が生んだミュータント、ZAMPAN(残飯)。こいつらを野放しにした奴は誰だ。盛り上がりが止まらねー！5人の化学反応が会場を沸かす、そのライブパフォーマンスに乞おうご期待！</p>
		</div>
	</div>
</div>

		<a name="contact" class="name"><h2>CONTACT</h2></a>
		<p>ご質問・ご意見などは、以下のフォームからご連絡ください。<br><strong>（出演者の募集は終了しています）</strong></p>
		<!-- <p>お問い合わせや出演を希望される方は、以下のフォームからご連絡ください。出演可能なアーティストはジャンルや個人・バンドなどの形態を問いませんが、基本的にTOJO K-ONの関係者（一度でもTOJO K-ONに所属したことのある方）が含まれるアーティストに限ります。</p> -->
		<!-- 
		<h3>注意事項</h3>
		<ul>
		<li>応募多数の場合、抽選により出演者を決定します。あらかじめご了承ください。</li>
		<li>出演者からは、1アーティストあたり¥20,000程度（予定）の出演費を頂戴します。出演者が正式に決定次第、正確な費用を出演者にお知らせします。</li>
		<li>2012年2月29日 23:59 にて出演者の募集を締め切ります。</li>
		</ul>
		 -->
		
		<h3>コンタクトフォーム</h3>
		<p><strong>*</strong> は必須項目です。</p>
		
		<div class="contact-form">
		<form action="index.php" method="post" accept-charset="utf-8">
		    
		    <table border="0" cellspacing="0" cellpadding="5">
		        <tr>
		            <th>氏名<strong>*</strong></th>
		            <td><input type="text" name="name" value="<?php if (!empty($_POST['name'])) echo $_POST['name']; ?>" id="name" class="validate[required] text-input"></td>
		        </tr>
		        <tr>
		            <th>バンド名</th>
		            <td><input type="text" name="band" value="<?php if (!empty($_POST['band'])) echo $_POST['band']; ?>" id="band"></td>
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
		            <td><textarea name="message" id="message" cols="60" rows="5"><?php if (!empty($_POST['message'])) echo $_POST['message']; ?></textarea></td>
		        </tr>
		        <tr>
		            <th>&nbsp;</th>
		            <td><input type="submit" value="送信">
		            <input type="reset" value="クリア"></td>
		        </tr>
		    </table>
		
		</form>

		</div>
		
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

<p><span class="figure"><?php //echo $days; ?>0</span> days, <span class="figure"><?php //echo $hours-$daystohours; ?>0</span> hours</p>
	
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