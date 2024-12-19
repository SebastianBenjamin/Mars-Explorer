<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mars Explorer</title>
        <link rel="icon" href="https://github.com/SebastianBenjamin/marsrover-resources/blob/main/icons8-mars-64.png?raw=true">
        <link rel="stylesheet" href="./style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        
    </head>
    <body >
        <div class="side-menu">
            
            <ul id="sidemenuul">
                <div class="side-menu-header">
                    <div><img src="https://github.com/SebastianBenjamin/marsrover-resources/blob/main/mars-rover-sidemenu-header.gif?raw=true" alt="sidemenu-header-gif"></div> 
            MARS EXPLORER
        </div>
        <a href="index.html" id="Home">
            <img src="https://github.com/SebastianBenjamin/marsrover-resources/blob/main/home.png?raw=true" alt="home">
            Home</a>
            <a href="about.html" id="About">
                <img src="https://github.com/SebastianBenjamin/marsrover-resources/blob/main/about.png?raw=true" alt="about">
                About</a>
                <a href="missions.html" id="Missions">
            <img src="https://github.com/SebastianBenjamin/marsrover-resources/blob/main/mission.png?raw=true" alt="mission">
            Missions</a>
            <a href="ticket.html" id="Ticket">
                <img src="https://github.com/SebastianBenjamin/marsrover-resources/blob/main/ticket.png?raw=true" alt="ticket">
                Travel to Mars</a>
                <a href="account.html" id="Account">
                    
                    <img src="https://github.com/SebastianBenjamin/marsrover-resources/blob/main/login.png?raw=true" alt="signup">
                    Account</a>
                </ul>
                
                <div class="side-menu-footer">

                </div>
            </div> 

    <!--                                  Content section starts here                                      -->
    
    <div class="content" id="content">
        <div class="content-welcome" >
            <h1>Account</h1>

        </div>
        
            <div id="login">    
            <?php
     $email = '';
     $psw = '';
     
     
     if (isset($_GET["loginemail"]) && isset($_GET["loginpassword"])) {
         $email = $_GET["loginemail"];
         $psw = $_GET["loginpassword"];
     } else {
         echo "
         <script>
             var email = localStorage.getItem('email');
             var psw = localStorage.getItem('password');
     
             if (email && psw) {
                 window.location.href = 'userpage.php?loginemail=' + encodeURIComponent(email) + '&loginpassword=' + encodeURIComponent(psw);
             } else {
                 
             }
         </script>
         ";
     }


$connection = mysqli_connect("localhost:3306", "root", "") or die("Failed to connect to database");

if (!$connection) {
    echo "
    <script>
      window.location.href = `error.php?error=".mysqli_error($connection)."`; 

    </script>
    ";
} 


$connection->select_db("marsexplorer");


$email = mysqli_real_escape_string($connection, $email);
$psw = mysqli_real_escape_string($connection, $psw);


$myQuery = "SELECT * FROM users WHERE EMAIL='$email' AND PASSWORD='$psw'";


if ($result = $connection->query($myQuery)) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_array();
      
        echo"
        <h2  >Martian , $row[1] $row[2]</h2>
        <form action='./update.php' method='GET'>
    <div style='flex-direction:column;'>
    <div >
    <label for='registerfname' >First Name</label>
    <input type='text' name='registerfname' id='registerfname' placeholder='First name' value='$row[1]'readonly>
    </div>
    <div>
    <label for='registerlname'>Last Name</label>
        <input type='text' name='registerlname' id='registerlname' placeholder='Last name' value='$row[2]'readonly>
    </div>
    </div>
    <div>
    <label for='gender'>Gender</label>
    <select name='gender' id='gender' disabled>
    <option value='$row[9]' selected disabled >$row[9]</option>
          <option value='Male'>Male</option>
          <option value='Female'>Female</option>
      </select>
    </div>

    <div>
    <label for='loginemail'>Email </label>
    <input type='email' name='loginemail' id='loginemail' autocomplete='email' placeholder='Email' required value='$row[3]'readonly>
    </div>
    <div>
    <label for='psw'>Password</label>
        <input type='password' name='loginpassword' id='psw' autocomplete='current-password' placeholder='Password' required value='$row[4]'readonly>
        <span id='eye' onclick='showPassword()'></span>
    </div>
    <div>
    <label for='registermob'>Mobile</label>
    <input type='tel' name='registermob' id='registermob' placeholder='Mobile' value='$row[5]' readonly>
    </div>
    <div>
    <label for='registerdob'>DOB</label>
    <input type='date' name='registerdob' id='registerdob' value='$row[6]' readonly>
    </div>
    <div>
    <label for='country'>Country</label>
    <select name='registercountry' id='country' required disabled >
        <option value='$row[7]' selected>$row[7]</option>
        <option value='Afghanistan'>Afghanistan</option>
        <option value='Albania'>Albania</option>
        <option value='Algeria'>Algeria</option>
        <option value='Andorra'>Andorra</option>
        <option value='Angola'>Angola</option>
        <option value='Antigua and Barbuda'>Antigua and Barbuda</option>
        <option value='Argentina'>Argentina</option>
        <option value='Armenia'>Armenia</option>
        <option value='Australia'>Australia</option>
        <option value='Austria'>Austria</option>
        <option value='Azerbaijan'>Azerbaijan</option>
        <option value='Bahamas'>Bahamas</option>
        <option value='Bahrain'>Bahrain</option>
        <option value='Bangladesh'>Bangladesh</option>
        <option value='Barbados'>Barbados</option>
        <option value='Belarus'>Belarus</option>
        <option value='Belgium'>Belgium</option>
        <option value='Belize'>Belize</option>
        <option value='Benin'>Benin</option>
        <option value='Bhutan'>Bhutan</option>
        <option value='Bolivia'>Bolivia</option>
        <option value='Bosnia and Herzegovina'>Bosnia and Herzegovina</option>
        <option value='Botswana'>Botswana</option>
        <option value='Brazil'>Brazil</option>
        <option value='Brunei'>Brunei</option>
        <option value='Bulgaria'>Bulgaria</option>
        <option value='Burkina Faso'>Burkina Faso</option>
        <option value='Burundi'>Burundi</option>
        <option value='Cabo Verde'>Cabo Verde</option>
        <option value='Cambodia'>Cambodia</option>
        <option value='Cameroon'>Cameroon</option>
        <option value='Canada'>Canada</option>
        <option value='Central African Republic'>Central African Republic</option>
        <option value='Chad'>Chad</option>
        <option value='Chile'>Chile</option>
        <option value='China'>China</option>
        <option value='Colombia'>Colombia</option>
        <option value='Comoros'>Comoros</option>
        <option value='Congo'>Congo</option>
        <option value='Congo, Democratic Republic of the'>Congo, Democratic Republic of the</option>
        <option value='Costa Rica'>Costa Rica</option>
        <option value='Croatia'>Croatia</option>
        <option value='Cuba'>Cuba</option>
        <option value='Cyprus'>Cyprus</option>
        <option value='Czech Republic'>Czech Republic</option>
        <option value='Denmark'>Denmark</option>
        <option value='Djibouti'>Djibouti</option>
        <option value='Dominica'>Dominica</option>
        <option value='Dominican Republic'>Dominican Republic</option>
        <option value='Ecuador'>Ecuador</option>
        <option value='Egypt'>Egypt</option>
        <option value='El Salvador'>El Salvador</option>
        <option value='Equatorial Guinea'>Equatorial Guinea</option>
        <option value='Eritrea'>Eritrea</option>
        <option value='Estonia'>Estonia</option>
        <option value='Eswatini'>Eswatini</option>
        <option value='Ethiopia'>Ethiopia</option>
        <option value='Fiji'>Fiji</option>
        <option value='Finland'>Finland</option>
        <option value='France'>France</option>
        <option value='Gabon'>Gabon</option>
        <option value='Gambia'>Gambia</option>
        <option value='Georgia'>Georgia</option>
        <option value='Germany'>Germany</option>
        <option value='Ghana'>Ghana</option>
        <option value='Greece'>Greece</option>
        <option value='Grenada'>Grenada</option>
        <option value='Guatemala'>Guatemala</option>
        <option value='Guinea'>Guinea</option>
        <option value='Guinea-Bissau'>Guinea-Bissau</option>
        <option value='Guyana'>Guyana</option>
        <option value='Haiti'>Haiti</option>
        <option value='Honduras'>Honduras</option>
        <option value='Hungary'>Hungary</option>
        <option value='Iceland'>Iceland</option>
        <option value='India'>India</option>
        <option value='Indonesia'>Indonesia</option>
        <option value='Iran'>Iran</option>
        <option value='Iraq'>Iraq</option>
        <option value='Ireland'>Ireland</option>
        <option value='Israel'>Israel</option>
        <option value='Italy'>Italy</option>
        <option value='Jamaica'>Jamaica</option>
        <option value='Japan'>Japan</option>
        <option value='Jordan'>Jordan</option>
        <option value='Kazakhstan'>Kazakhstan</option>
        <option value='Kenya'>Kenya</option>
        <option value='Kiribati'>Kiribati</option>
        <option value='Korea, North'>Korea, North</option>
        <option value='Korea, South'>Korea, South</option>
        <option value='Kuwait'>Kuwait</option>
        <option value='Kyrgyzstan'>Kyrgyzstan</option>
        <option value='Laos'>Laos</option>
        <option value='Latvia'>Latvia</option>
        <option value='Lebanon'>Lebanon</option>
        <option value='Lesotho'>Lesotho</option>
        <option value='Liberia'>Liberia</option>
        <option value='Libya'>Libya</option>
        <option value='Liechtenstein'>Liechtenstein</option>
        <option value='Lithuania'>Lithuania</option>
        <option value='Luxembourg'>Luxembourg</option>
        <option value='Madagascar'>Madagascar</option>
        <option value='Malawi'>Malawi</option>
        <option value='Malaysia'>Malaysia</option>
        <option value='Maldives'>Maldives</option>
        <option value='Mali'>Mali</option>
        <option value='Malta'>Malta</option>
        <option value='Marshall Islands'>Marshall Islands</option>
        <option value='Mauritania'>Mauritania</option>
        <option value='Mauritius'>Mauritius</option>
        <option value='Mexico'>Mexico</option>
        <option value='Micronesia'>Micronesia</option>
        <option value='Moldova'>Moldova</option>
        <option value='Monaco'>Monaco</option>
        <option value='Mongolia'>Mongolia</option>
        <option value='Montenegro'>Montenegro</option>
        <option value='Morocco'>Morocco</option>
        <option value='Mozambique'>Mozambique</option>
        <option value='Myanmar'>Myanmar</option>
        <option value='Namibia'>Namibia</option>
        <option value='Nauru'>Nauru</option>
        <option value='Nepal'>Nepal</option>
        <option value='Netherlands'>Netherlands</option>
        <option value='New Zealand'>New Zealand</option>
        <option value='Nicaragua'>Nicaragua</option>
        <option value='Niger'>Niger</option>
        <option value='Nigeria'>Nigeria</option>
        <option value='North Macedonia'>North Macedonia</option>
        <option value='Norway'>Norway</option>
        <option value='Oman'>Oman</option>
        <option value='Pakistan'>Pakistan</option>
        <option value='Palau'>Palau</option>
        <option value='Palestine'>Palestine</option>
        <option value='Panama'>Panama</option>
        <option value='Papua New Guinea'>Papua New Guinea</option>
        <option value='Paraguay'>Paraguay</option>
        <option value='Peru'>Peru</option>
        <option value='Philippines'>Philippines</option>
        <option value='Poland'>Poland</option>
        <option value='Portugal'>Portugal</option>
        <option value='Qatar'>Qatar</option>
        <option value='Romania'>Romania</option>
        <option value='Russia'>Russia</option>
        <option value='Rwanda'>Rwanda</option>
        <option value='Saint Kitts and Nevis'>Saint Kitts and Nevis</option>
        <option value='Saint Lucia'>Saint Lucia</option>
        <option value='Saint Vincent and the Grenadines'>Saint Vincent and the Grenadines</option>
        <option value='Samoa'>Samoa</option>
        <option value='San Marino'>San Marino</option>
        <option value='Sao Tome and Principe'>Sao Tome and Principe</option>
        <option value='Saudi Arabia'>Saudi Arabia</option>
        <option value='Senegal'>Senegal</option>
        <option value='Serbia'>Serbia</option>
        <option value='Seychelles'>Seychelles</option>
        <option value='Sierra Leone'>Sierra Leone</option>
        <option value='Singapore'>Singapore</option>
        <option value='Slovakia'>Slovakia</option>
        <option value='Slovenia'>Slovenia</option>
        <option value='Solomon Islands'>Solomon Islands</option>
        <option value='Somalia'>Somalia</option>
        <option value='South Africa'>South Africa</option>
        <option value='Spain'>Spain</option>
        <option value='Sri Lanka'>Sri Lanka</option>
        <option value='Sudan'>Sudan</option>
        <option value='Sudan, South'>Sudan, South</option>
        <option value='Suriname'>Suriname</option>
        <option value='Sweden'>Sweden</option>
        <option value='Switzerland'>Switzerland</option>
        <option value='Syria'>Syria</option>
        <option value='Taiwan'>Taiwan</option>
        <option value='Tajikistan'>Tajikistan</option>
        <option value='Tanzania'>Tanzania</option>
        <option value='Thailand'>Thailand</option>
        <option value='Timor-Leste'>Timor-Leste</option>
        <option value='Togo'>Togo</option>
        <option value='Tonga'>Tonga</option>
        <option value='Trinidad and Tobago'>Trinidad and Tobago</option>
        <option value='Tunisia'>Tunisia</option>
        <option value='Turkey'>Turkey</option>
        <option value='Turkmenistan'>Turkmenistan</option>
        <option value='Tuvalu'>Tuvalu</option>
        <option value='Uganda'>Uganda</option>
        <option value='Ukraine'>Ukraine</option>
        <option value='United Arab Emirates'>United Arab Emirates</option>
        <option value='United Kingdom'>United Kingdom</option>
        <option value='United States'>United States</option>
        <option value='Uruguay'>Uruguay</option>
        <option value='Uzbekistan'>Uzbekistan</option>
        <option value='Vanuatu'>Vanuatu</option>
        <option value='Vatican City'>Vatican City</option>
        <option value='Venezuela'>Venezuela</option>
        <option value='Vietnam'>Vietnam</option>
        <option value='Yemen'>Yemen</option>
        <option value='Zambia'>Zambia</option>
        <option value='Zimbabwe'>Zimbabwe</option>
    </select>
    </div>
    <div>
    <button type='button' id='editbutton' >Edit</button>
    <button type='button' id='logout' >Logout</button>
    <input type='submit' value='Update' id='submitbutton'>
    </div>
    <button type='button' id='delete' onclick='deleteacc()' style='color:red;'>Delete Account</button>
</form>

        ";
    } else{
        echo"<script>
        localStorage.clear();
        </script>";
    }
} else {
    echo "<br>Error in query execution: " . $connection->error;
    exit();
}


mysqli_close($connection);
?>


        </div>
   
</div>

</div>
<script>
    document.title = "Mars Explorer/" + localStorage.getItem('uname');
    $(() => {
        if(!localStorage.getItem('uname')){
               console.log("Not logged in");
               window.location.href = "login.html";
           }
           else{

            //    alert("Welcome "+localStorage.getItem('uname')+" !");
           }
        $('#submitbutton').hide();
        $('#logout').show();
        $("#sidemenuul>a:eq(4)").addClass("sidemenu-li");  


        $('#editbutton').click(function() {
    var elements = $('form').find('input, textarea');
    
    $('select').prop('disabled', !$('select').prop('disabled'));

    for (var i = 0; i < elements.length; i++) {
        if (elements[i].type !== 'submit'&&elements[i].type !== 'email') {
            elements[i].readOnly = !elements[i].readOnly;
        }
        if(elements[i].type == 'email'){
            $(elements[i]).attr('onclick', 'alert("email cant be editted !")');
        }
    }
    $('#submitbutton').show();
    $('#logout').hide();
});
$('#logout').click(function(){
localStorage.clear();
window.location.reload(true);
window.location.href = "login.html";

});
        
    });
    function showPassword() {
    var x = document.getElementById("psw");
    var y = document.getElementById("eye");
    if (x.type === "password") {
   x.type = "text";
   y.style.background="url('https://raw.githubusercontent.com/SebastianBenjamin/marsrover-resources/refs/heads/main/hidden.png')";
 } else {
   x.type = "password";
   y.style.background="url('https://raw.githubusercontent.com/SebastianBenjamin/marsrover-resources/refs/heads/main/eye.png')";
 }


}
function deleteacc(){
    var email = localStorage.getItem('email');
if(confirm('Are you sure to delete account ?')){
    localStorage.clear();
    window.location.href = "deleteacc.php?email=" + encodeURIComponent(email);}
}
    
    </script>
   
   

   
    
    </body>
    </html> 