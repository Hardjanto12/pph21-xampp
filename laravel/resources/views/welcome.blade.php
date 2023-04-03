<!DOCTYPE html>
<html>
<body>

<h1>The Window Object</h1>
<h2>The opener Property</h2>

<p id="demo">
Click the button to open a new window that writes "HELLO!" in the opener window.</p>

<button onclick="myFunction()">Try it</button>

<script>
function myFunction() {
  const myWindow = window.open("", "", "width=300,height=300");
  myWindow.opener.document.getElementById("demo").innerHTML = "HELLO!";
}
</script>

</body>
</html>
