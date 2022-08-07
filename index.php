<?php require 'function/verif.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>TC DOĞRULAMA</title>
</head>
<body>
<?php
$tc = $_POST['tc'];
if ((!empty($tc) && isset($_POST['kontrol']) && is_numeric($tc))){
        if ((tckimlik($tc))) {
            $result= "<p style='color:green'>TC KİMLİK NUMARANIZ DOĞRU</p>";
        }
        else
        {
            $result="<p style='color:red'>TC KİMLİK NUMARANIZ YANLIŞ</p>";
        }
}
    else
      {
        $result= "<p style='color:red'>Lütfen TC'nizi Giriniz!</p>";
      }
  

?>
<div class="container">
    <form action="" method="post">
<div class="logo">
<div class="brand-logo"></div>
</div>
  
  <div class="brand-title">TC KİMLİK KONTROL</div>
  <div class="inputs">
    <label>TC</label>
    <input type="text" name="tc" placeholder="TC'NİZİ GİRİNİZ.." />
    <button type="submit" name="kontrol" id="kontrol">KONTROL</button>
  </div>
  <?=$result?>
  <a href="https://sadiksefa.com">MADE BY DARKWOB</a>
  </form>
</div>

<script type="text/javascript">

	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script><
</body>
</html>
