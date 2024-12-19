<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mars Explorer/ERROR</title>
    <style>
        body{
            background-color: black;
            color:  rgba(112, 93, 207); 
            display: flex;
            align-items: center;
            justify-content: center;
font-family:ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;   

        }


.loader {
  width: 50px;
  height: 12px;
  --_g: no-repeat radial-gradient(farthest-side,coral 94%,coral);
  background:
    var(--_g) left,
    var(--_g) right;
  background-size: 12px 12px;
  position: relative;
}
.loader:before {
  content: "";
  position: absolute;
  height: 12px;
  aspect-ratio: 1;
  border-radius: 50%;
  background: coral;
  inset: 0;
  margin: auto;
  animation: l25-1 1s, l25-2 0.5s;
  animation-timing-function: cubic-bezier(.5,-900,.5,900);
  animation-iteration-count: infinite;
}
@keyframes l25-1 {
  100% {transform:translate(0.12px)}
}
@keyframes l25-2 {
  100% {inset:-0.15px 0 0;}
}
    </style>
</head>
<body>
  <?php
  $error=$_GET['error'];
  echo"
  <div style='display: flex;align-items: center;justify-content: center;flex-direction: column;'>
  <div class='loader'></div> <br><br>
    <h1>Sorry  ERROR occured :( </h1><h2>ERROR: $error  </h2>
    <h3>Please reload the page.</h3>

</div>
  ";
  ?>

<script>
    var i = localStorage.getItem('reloadCount') || 0; 
    i++;  

    window.addEventListener("load", function() {
        if (i > 1) {
            setTimeout(function() {
                history.back(); 
                localStorage.setItem('reloadCount', 0); 
            }, 500); 
        } else {
            localStorage.setItem('reloadCount', i);
        }
    });
</script>

</body>
</html>