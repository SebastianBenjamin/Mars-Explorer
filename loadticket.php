<?php

    $email=$_GET['ppemail'];
    
    echo "<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Mars Explorer/Travel</title>
        <link rel='icon' href='https://github.com/SebastianBenjamin/marsrover-resources/blob/main/icons8-mars-64.png?raw=true'>
        <link rel='stylesheet' href='./style.css'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.js' integrity='sha512-is1ls2rgwpFZyixqKFEExPHVUUL+pPkBEPw47s/6NDQ4n1m6T/ySeDW3p54jp45z2EJ0RSOgilqee1WhtelXfA==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js' integrity='sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>
        <style>
            input[type='email'],input[type='password'],input[type='text'],input[type='date'],input[type='tel'],select{
                width: 100% !important;
            }
            input[type='date']{
                margin: 0 !important;
            }
            form{
                div{
                    gap: 20px !important;
                }
            }
            label{
                width: 35% !important;
            }
            #line{
                height: 300px !important;
                width: 1px !important;
                background-color:rgba(128, 128, 128, 0.511)!important;
            }
        </style>
    </head>
    <body>
    <div class='side-menu'>
        <ul id='sidemenuul'>
            <div class='side-menu-header'>
                <div><img src='https://github.com/SebastianBenjamin/marsrover-resources/blob/main/mars-rover-sidemenu-header.gif?raw=true' alt='sidemenu-header-gif'></div> 
                MARS EXPLORER
            </div>
            <a href='index.html' id='Home'>
                <img src='https://github.com/SebastianBenjamin/marsrover-resources/blob/main/home.png?raw=true' alt='home'>
                Home</a>
            <a href='about.html' id='About'>
                <img src='https://github.com/SebastianBenjamin/marsrover-resources/blob/main/about.png?raw=true' alt='about'>
                About</a>
            <a href='missions.html' id='Missions'>
                <img src='https://github.com/SebastianBenjamin/marsrover-resources/blob/main/mission.png?raw=true' alt='mission'>
                Missions</a>
            <a href='ticket.html' id='Ticket'>
                <img src='https://github.com/SebastianBenjamin/marsrover-resources/blob/main/ticket.png?raw=true' alt='ticket'>
                Travel to Mars</a>
            <a href='account.html' id='Account'>
                <img src='https://github.com/SebastianBenjamin/marsrover-resources/blob/main/login.png?raw=true' alt='signup'>
                Account</a>
        </ul>

        <div class='side-menu-footer'>

        </div>
    </div> 

    <!-- Content section starts here -->

    <div class='content' id='content'>
        <div class='content-welcome' >
            <h1>Travel to Mars</h1>
        </div>
        <div id='register'>
            
        </div>
        <div id='login' style='width: 60%;'>    
            
            <h2>Book a Flight to Mars  </h2>
            <h3 style='font-weight: normal;margin:  0px 0px 10px 0px;' >Passenger Details</h3>
            <form action='./bookticket.php' method='GET' onsubmit='return validateDate()'>
                <div style='display: flex; width: 100%; gap: 10px;'>
                    <div style='display: flex;flex-direction: column; width: 50%;'>
                        <div>
                            <label for='name'>Name</label>
                            <input type='text' name='tname' id='name' placeholder='Full Name' required>
                        </div>
                        <div>
                            <label for='tdob'>DOB</label>
                            <input type='date' name='tdob' id='tdob' required>
                        </div>
                        <div>
                            <label for='temail'>Email</label>
                            <input type='email' name='temail' id='temail' required placeholder='Email'>
                        </div>
                        <div>
                            <label for='gender'>Gender </label>
                            <select name='gender' id='gender'>
                                <option value='Male'>Male</option>
                                <option value='Female'>Female</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for='date'>Departure</label>
                            <input type='date' name='tdate' id='date' required >
                        </div>
                        <select id='class' name='class' required onchange='cost(this.value)'>
                            <option value='' disabled selected>Flight Class</option>
                            <option value='Economy'>Economy</option>
                            <option value='Business'>Business</option>
                            <option value='Luxury'>Luxury</option>
                        </select>
                    </div>
                    <div id='line'></div>
                    <div style='display: flex;flex-direction: column; width: 50%;'>     
                        <div style='width:  100%;'>
                            <select id='row' name='row' required>
                                <option value='' disabled selected>Row </option>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                                <option value='6'>6</option>
                                <option value='7'>7</option>
                            </select>
                            <select id='seat' name='seat' required>
                                <option value='' disabled selected>Seat </option>
                                <option value='W'>Window</option>
                                <option value='A'>Aisle</option>
                                <option value='M'>Middle</option>
                            </select>
                            <input type='text' name='pemail' hidden id='pemail'> 
                            <input type='text' name='id' hidden id='id'> 
                        </div>

                        <select name='launch' id='launch' required>
                            <option value='' disabled selected>Launch Site</option>
                            <option value='Kennedy Space Center (USA)'>Kennedy Space Center (USA)</option>
                            <option value='Baikonur Cosmodrome (Kazakhstan)'>Baikonur Cosmodrome (Kazakhstan)</option>
                            <option value='Guiana Space Centre (French Guiana)'>Guiana Space Centre (French Guiana)</option>
                            <option value='Satish Dhawan Space Centre (India)'>Satish Dhawan Space Centre (India)</option>
                            <option value='Tanegashima Space Center (Japan)'>Tanegashima Space Center (Japan)</option>
                            <option value='Wenchang Satellite Launch Center (China)'>Wenchang Satellite Launch Center (China)</option>
                            <option value='Plesetsk Cosmodrome (Russia)'>Plesetsk Cosmodrome (Russia)</option>
                            <option value='Vandenberg Space Force Base (USA)'>Vandenberg Space Force Base (USA)</option>
                            <option value='SpaceX Starbase (Boca Chica, USA)'>SpaceX Starbase (Boca Chica, USA)</option>
                            <option value='Esrange Space Center (Sweden)'>Esrange Space Center (Sweden)</option>
                            <option value='Palmachim Airbase (Israel)'>Palmachim Airbase (Israel)</option>
                        </select>
                        
                        <select id='land' name='land' required>
                            <option value='' disabled selected>Landing Site</option>
                            <option value='Olympus Mons'>Olympus Mons</option>
                            <option value='Valles Marineris'>Valles Marineris</option>
                            <option value='Garett Valley'>Garett Valley</option>
                            <option value='Noctis Labyrinthus'>Noctis Labyrinthus</option>
                            <option value='Eos Chasma'>Eos Chasma</option>
                            <option value='Tharsis Volcanic Region'>Tharsis Volcanic Region</option>
                            <option value='North Polar Ice Cap'>North Polar Ice Cap</option>
                            <option value='South Polar Ice Cap'>South Polar Ice Cap</option>
                        </select>
                         <div style='justify-content: space-evenly !important;' >
              <label for='insurance'>Insurance</label>
              <input type='checkbox' name='insurance' id='insurance' required>
             
            <label for='medical'>Medical Test</label>
            <input type='checkbox' name='medical' id='medical' required>
          </div>
          <input type='text' id='code' onkeyup='couponcode(this.value)' placeholder='Coupon Code'>
          <div style='width:100%;border-top:1px solid  rgba(128, 128, 128, 0.511);display:flex;align-items:center;justify-content:space-evenly;' id='ticket-cost'>
          <h3>Total Cost : </h3><h3>0 USD</h3>
          </div>
                    </div>
                </div>
                
                <div style='margin-top: 20px;' class='form-submit'>
                    <button type='submit' id='submit' class='submit'>Book Ticket</button>
                </div>
            </form>
        
    </div> 
    <div class='ticket-parent' id='ticket-parent'  >
    <h1>Your Tickets</h1>
    <script>

$(() => {
    $('#ppemail').val(localStorage.getItem('email'));
   
$('#pemail').val(localStorage.getItem('email'));
$('#id').val(generateRandomNumber());
$('#name').val(localStorage.getItem('uname'));
$('#sidemenuul>a:eq(3)').addClass('sidemenu-li');
  
$('#sbmt').click();
if(localStorage.getItem('email')){
    $('#submit').prop('disabled', false);
}
else{
    $('#submit').prop('disabled', true);
// $('#submit').click(function(e) {
//     alert('Please login to book tickets!');
//     e.preventDefault(); 
//     window.location.href = 'userpage.php'; 
//     });
    $('#submit').mouseover(function(e) {
        alert('Please login to book tickets!');
        window.location.href = 'userpage.php'; 
        e.preventDefault(); 
});
}
           
});
function generateRandomNumber() {
    
    const randomNumber = Math.floor(100000000 + Math.random() * 900000000); 
    
    return 'MXP' + randomNumber+'BS';
}
function cost(value){
var amount='0 USD';
if(document.getElementById('code').value.toLowerCase()!=='mxp-benji'){
switch(value){
case 'Economy':
   amount='$100,000 USD'; break;
case 'Business':
    amount='$250,000 USD'; break;
case 'Luxury':
    amount='$1,000,000 USD';break;
default:
amount='0 USD' ;   
}
    document.getElementById('ticket-cost').innerHTML='<h3>Total Cost : </h3><h3>'+amount+'</h3>';
}

}
    function couponcode(value){
if(value.toLowerCase()==='mxp-benji'){
alert('Coupon Valid ! \\n100% discount applied');
    document.getElementById('ticket-cost').innerHTML='<h3>Total Cost : </h3><h3>0 USD</h3>';

}
    }
function validateDate() {
    const dateInput = document.getElementById('date').value;
    const dateToCheck = new Date(dateInput);
    
    const today = new Date();
    today.setHours(0, 0, 0, 0);

    if (dateToCheck > today) {
        return true;
    } else {
               alert('Please select a date in future');

        return false; 
    }
}

    </script>
    ";
    $connection = mysqli_connect("localhost:3306", "root", "") or die("Failed to connect to database");

    if (!$connection) {
        echo "
        <script>
          window.location.href = `error.php?error=".mysqli_error($connection)."`; 

        </script>
        ";
    } 
    
    
    
    $connection->select_db("marsexplorer");
    
   


    

    $myQuery = "SELECT * FROM tickets WHERE PEMAIL='$email'";
    
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
                    echo"
                    <div class='ticket' id='ticket'>
                                     <span id='tsp1'></span>
                                     <span id='tsp2'></span>
                                     <span id='tsp3'></span>
                                     <div class='ticket-img'>
                                         <div id='qr$a' class='qr' onclick='window.open(`http://localhost/Mars%20Explorer/showticket.php?id=$id`,`_blank`);'></div>
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
                                     <button id='ticket-cancel-btn' onclick='cancelticket()'>Cancel Ticket</button>
                                 </div>
<script>
            var qrcode = new QRCode('qr$a', 'http://localhost/Mars%20Explorer/showticket.php?id=$id');
            function cancelticket() {
                if (confirm('Are you sure to Cancel Ticket $id ?')) {
                    window.location.href = 'cancelticket.php?id=$id';
                }
            }
          </script>";

                $a++;
               
               
            }
        
        } 
       
        else {
         
            echo "
           <h3 style='width:100%;text-align:center;'>No bookings</h3>
            ";
        }
    } else {
        echo "<br>Error in query execution: " . $connection->error;
        exit();
    }
    

    mysqli_close($connection);
    



   
echo"
</div>
 
    </body>
</html>";
?>

   