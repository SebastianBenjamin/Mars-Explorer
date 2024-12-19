<?php
$id=$_GET['id'];
$connection = mysqli_connect("localhost:3306", "root", "") or die("Failed to connect to database");


if (!$connection) {
    echo "
    <script>
      window.location.href = `error.php?error=".mysqli_error($connection)."`; 

    </script>
    ";
} 


$connection->select_db("marsexplorer");






$myQuery = "SELECT * FROM tickets WHERE id='$id'";

$a=0;
if ($result = $connection->query($myQuery)) {
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           
                $la=$row['launch_site'];
                $ls=$row['landing_site'];
                $id=$row['id'];
                $pname=$row['passenger_name'];
                $ddate=$row['departure_date'];
                $st=$row['seat_type'];
                $rn=$row['row_number'];
                $fc=$row['flight_class'];
                echo"<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Mars Explorer/$pname</title>
        <link rel='icon' href='https://github.com/SebastianBenjamin/marsrover-resources/blob/main/icons8-mars-64.png?raw=true'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.js' integrity='sha512-is1ls2rgwpFZyixqKFEExPHVUUL+pPkBEPw47s/6NDQ4n1m6T/ySeDW3p54jp45z2EJ0RSOgilqee1WhtelXfA==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js' integrity='sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>
        <link rel='stylesheet' href='./style.css'>
        
        </head>
        <body style='display:flex;align-items:center;justify-content:center;'>
                <div style='height:100%;width:70%;display:flex;align-items:center;justify-content:center; '>
                <div class='ticket' id='ticket' style='border:1px solid black !important;'onclick='print()'>
                                 <span id='tsp1'></span>
                                 <span id='tsp2'></span>
                                 <span id='tsp3'></span>
                                 <div class='ticket-img'>
                                     <div id='qr' class='qr' ></div>
                                     <h4>$id</h4>
                                 </div>
                                 <div class='ticket-dest'>
                                     <div class='l-div'>
                                         <h4>$la</h4>
                                         <h5>Earth</h5>
                                     </div>
                                     <div style='display: flex; align-items: center; justify-content: center; gap: 10px;'>
                                         <span></span>
                                         <div style='display: flex; align-items: center; justify-content: center; flex-direction: column; gap: 5px; margin-top: 31px;'>
                                             <img src='https://img.icons8.com/external-smashingstocks-hand-drawn-black-smashing-stocks/99/external-rocket-space-smashingstocks-hand-drawn-black-smashing-stocks-3.png' alt=''>
                                             <div style='background-color: rgba(0, 0, 0, 0.377); color: white; padding: 5px 10px; border-radius: 20px; font-size: small; display: flex; justify-content: center; align-items: center;'>
                                                 273d 75h
                                             </div>
                                                 <h5 style='font-weight:normal;color:rgba(128, 128, 128, 0.411)!important;'>Mars Explorer</h5>

                                         </div>
                                         <span></span>
                                     </div>
                                     <div class='l-div'>
                                         <h4>$ls</h4>
                                         <h5>Mars</h5>
                                     </div>
                                 </div>
                                 <div class='ticket-details'>
                                     <div>
                                         <h4>$pname</h4>
                                         <h5>Passenger</h5>
                                     </div>
                                     <div>
                                         <h4>$ddate 13:45</h4>
                                         <h5>Departure</h5>
                                     </div>
                                     <div>
                                         <h4>$st / $rn</h4>
                                         <h5>Seat</h5>
                                     </div>
                                     <div>
                                         <h4>$fc</h4>
                                         <h5>Class</h5>
                                     </div>
                                 </div>
                             </div>
                             </div>
                               <script>
                                
                                   var qrcode = new QRCode('qr','http://localhost/Mars%20Explorer/showticket.php?id=$id');
  
   function print() {
    Popup($('<div>').append($('#ticket').clone()).html());
}

function Popup(data) {
    var mywindow = window.open('', 'Mars Explorer/$id', 'height=400,width=600');
    mywindow.document.write('<html><head><title>Mars Explorer/$id</title>');
    mywindow.document.write(`<link rel='stylesheet' href='./style.css'/>`);
    mywindow.document.write('</head><body>');
    mywindow.document.write(data);
    mywindow.document.write('</body></html>');
    mywindow.document.close();  
    mywindow.print();
     mywindow.close();  // Optional: Uncomment if you want to close the popup after printing

    return true;
}
                                 </script>
                             </body></html>
                             ";}}}
mysqli_close($connection);

                             ?>