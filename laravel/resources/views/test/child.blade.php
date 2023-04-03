<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title>Child Window</title>
</head>
<body>
  <input type="text" id="textField" value="some value">
  <br><input type="button" id="btnSend" value="Send to Parent">
  <script>
    (function() {
      document.getElementById("btnSend").onclick = function() {
        opener.callback(document.getElementById("textField").value);
      };
    })();
  </script>
</body>
</html>
