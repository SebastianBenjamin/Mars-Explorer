
function showPassword() {
    var x = document.getElementById("loginpassword");
    var y = document.getElementById("eye");
    if (x.type === "password") {
   x.type = "text";
   y.style.background="url('https://raw.githubusercontent.com/SebastianBenjamin/marsrover-resources/refs/heads/main/hidden.png')";
 } else {
   x.type = "password";
   y.style.background="url('https://raw.githubusercontent.com/SebastianBenjamin/marsrover-resources/refs/heads/main/eye.png')";
 }
}
