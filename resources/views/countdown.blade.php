<head>
<meta chrset="utf-8" />
<title>Countdown Timer</title>
</head>
<body>
　　<div class="countdown-container">
　　　　<h1>Countdown to end of today 🎉</h1>
　　　　<h2>You have ...</h2>
　　　　<div class="time-container">
　　　　　　<p class="time"><span id="day"></span>days</p>
　　　　　　<p class="time"><span id="hour"></span>hours</p>
　　　　　　<p class="time"><span id="min"></span>minutes</p>
　　　　　　<p class="time"><span id="sec"></span>seconds</p>
　　　　</div>
　　</div>
</body>
</html>

<style>
    html, body {
  font-family: serif;
  font-size: 16px;
}

.countdown-container {
  margin: 5rem;
}

.time-container {
  display: flex;
}

.time {
  margin: .2rem;
  background-color: lightpink;
  border-radius: 1rem;
  padding: 2rem;
}

#day,#hour,#min,#sec {
  font-size: 3rem;
  margin-right: 1rem;
}
</style>

<script>
const day = document.getElementById("day");
const hour = document.getElementById("hour");
const min = document.getElementById("min");
const sec = document.getElementById("sec");

function countdown(){
    const now = new Date(); //現在時刻を取得
    const tomorrow = new Date(now.getFullYear(),now.getMonth(),now.getDate()+1); //明日の0:00を取得
    const diff2 = tomorrow.getTime() - now.getTime(); //時間の差を取得（ミリ秒）
    const time1 = Date.parse('<?php echo $time1 ?>');
    const time2 = Date.parse('<?php echo $time2 ?>');
    const diff = now.getTime() - time1;
    // console.log(time)
    // console.log(tomorrow)
//ミリ秒から単位を修正
　　const calcDay = Math.floor(diff / 1000 / 60 / 60 / 24 );
　　const calcHour = Math.floor(diff / 1000 / 60 / 60 ) % 24;
　　const calcMin = Math.floor(diff / 1000 / 60) % 60;
　　const calcSec = Math.floor(diff / 1000) % 60;

　　//取得した時間を表示（2桁表示）
    day.innerHTML = calcDay < 10 ? '0' + calcDay : calcDay;
    hour.innerHTML = calcHour < 10 ? '0' + calcHour : calcHour;
    min.innerHTML = calcMin < 10 ? '0' + calcMin : calcMin;
    sec.innerHTML = calcSec < 10 ? '0' + calcSec : calcSec;
}

// function countdown_upd($time){
//     const now = new Date(); //現在時刻を取得
//     const target = Date.parse('');
//     const time = Date.parse('');
//     const diff = time - now.getTime();
    
//     const calcDay = Math.floor(diff / 1000 / 60 / 60 / 24 );
//     const calcHour = Math.floor(diff / 1000 / 60 / 60 ) % 24;
//     const calcMin = Math.floor(diff / 1000 / 60) % 60;
//     const calcSec = Math.floor(diff / 1000) % 60;

    //取得した時間を表示（2桁表示）
    day.innerHTML = calcDay < 10 ? '0' + calcDay : calcDay;
    hour.innerHTML = calcHour < 10 ? '0' + calcHour : calcHour;
    min.innerHTML = calcMin < 10 ? '0' + calcMin : calcMin;
    sec.innerHTML = calcSec < 10 ? '0' + calcSec : calcSec;
// }

countdown();
setInterval(countdown,1000);
</script>