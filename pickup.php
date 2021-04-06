<?php
    session_start();
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>OHAA PARCEL MANAGEMENT</title>

    <style>
            body{
            background: turquoise;
            }

            .content{
            max-width: 350px;
            margin: auto;
            background: turquoise;
            padding: 20px;
            border: solid 3.5px white;
            }

            button{
            transition-duration: 0.4s;
            padding: 5px;
            width: 20%;
            }

            button:hover {
            background-color: #4CAF50; /* Green */
            color: white;
            }

            a {
            text-decoration: none;
            display: inline-block;
            padding: 8px 16px;
            }

            a:hover {
            background-color: #ddd;
            color: black;
            }

            .previous {
            background-color: #4CAF50;
            color: white;
            position: absolute;
            top: 5px ;
            left: 5px;
            }

            .round {
            border-radius: 50%;
            }

    </style>

</head>

<body>

<a href="index.php" class="previous round">&#8249;</a>

<!-- <a href="displaypickup.php">Test2</a> -->

    <center><h1 style="color: blue;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">PICKUP OHAA</h1></center>

    <div class = "content">
    <form id="myform" action="displaypickup.php" method="post">

        House Number: 

            <select name="houseno" id="houseno" required>
                    <option value="">Select house number:</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                </select>
                <br><br>    

        <!-- PIN Number: -->

            <!-- <input name="pinno" id="pin" type="password" required/> 
            <br><br> -->
            <button type="submit" id="button" value="Submit">Submit</button>

    </form>
    </div>       

    <!-- <script>
        const inphouse = document.getElementById("houseno");
        const inppin = document.getElementById("pin");
        const inpbtn = document.getElementById("button");
        const inpform = document.getElementById("myform");
        
        let pindb = [1231,1232,1233,1234,1235];
        localStorage.setItem("pindb", JSON.stringify(pindb));
        
        inpbtn.onclick = function() {
            const house = inphouse.value;
            const pin = inppin.value;

            let pinDB= JSON.parse(localStorage.getItem("pindb"));
            alert(house +", "+ pin +", "+ pinDB);
            if (pinDB[house-1]==pin){
                alert("Great! Pin number are matched. :)");
                inpform.action ="/displaypickup.php";
            }
            else{
                alert("Pin number are wong! :(")
            }

        };
    //check house no and pin

    //if same, proceed post method

    </script> -->

    

</body>

</html>

<?php

?>