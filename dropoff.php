<?php
    session_start();
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>OHAA PARCEL</title>

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
            
            fieldset{
                border: none;
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

<a href="index.php" class="previous round">&#8249;</a>

<body>

    <center><h1 style="color: blue;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">DROPOFF OHAA</h1></center>

    <div class = "content">
    <!-- <form action="dataparcel.php" method="post"> -->
    <fieldset>
<legend>Details:</legend>
        Courier:
            <input name="courier" id="courier" type="text" required/> 
            <br><br>      
        Parcel Number:
            <input name="parcelno" id="parcelno" type="text" required/> 
            <br><br>
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
        Recipient Name:
            <input name="recipname" id="recip" type="text" required/> 
            <br><br>
        <button type="submit" id="button" value="Submit">Submit</button>
    </fieldset>
    </div>       

<script>

// let button = document.getElementsByTagName("button");
// button.onclick = function(){

//     let courier = document.getElementById("courier").value;
//     let parcelno = document.getElementById("parcelno").value;
//     let houseno = document.getElementById("houseno").value;
//     let recip = document.getElementById("recip").value;

//     let slot1 = {courier:courier, parcelno:parcelno ,houseno: houseno, recip:recip};


    
//     localStorage.setItem("slot1",JSON.stringify(slot1));
// }

// // let courier = document.getElementById("courier");
// // let parcelno = document.getElementById("parcelno");
// // let houseno = document.getElementById("houseno");
// // let recip = document.getElementById("recip");

    //by Ammar Arif 1919933
    const inpcourier = document.getElementById("courier");
    const inpparcel = document.getElementById("parcelno");
    const inphouse = document.getElementById("houseno");
    const inprecip = document.getElementById("recip");
    const inpbtn = document.getElementById("button");

    inpbtn.onclick = function() {
        const courier = inpcourier.value;
        const parcel = inpparcel.value;
        const house = inphouse.value;
        const recip = inprecip.value;

        if(!(courier&&parcel&&house&&recip)){
            alert("Input not completed.");
        }
        else{
            //by Amirul Afiq 1916491
            let slotAvail = JSON.parse(localStorage.getItem("slotAvail"));
            if (!slotAvail){
                slotAvail = [];
                for (let i=0;i<30;i++){
                    slotAvail[i] = 5;
                }
                localStorage.setItem("slotAvail",JSON.stringify(slotAvail));
            }

            if (slotAvail[house-1]==0){
                alert("Slot for house "+house+" is already fulled!");
            }
            else {
                slotAvail[house-1]--;
                let slot;
                switch(slotAvail[house-1]){
                    case 0:slot=5;
                        break;
                    case 1:slot=4;
                        break;
                    case 2:slot=3;
                        break;
                    case 3:slot=2;
                        break;
                    case 4:slot=1;
                        break;
                        
                }
                localStorage.removeItem("slotAvail");
                localStorage.setItem("slotAvail",JSON.stringify(slotAvail));
                
                //by Akmal 1911967
                var d = new Date();
                
                // d.setTime(d.getTime()+60000); 
                d.setDate(d.getDate()+2); //actual
                var n = d.getDate();
                
                // d.setHours(8);

                let details = {courier:courier, parcelno:parcel ,houseno: house, recip:recip, dateExp:d};
                let keyName = house+"s"+slot;
                localStorage.setItem(keyName,JSON.stringify(details));
                alert("Put the parcel in the slot. :)");

                inpcourier.value=' ';
                inpparcel.value=' ';
                inphouse.value=' ';
                inprecip.value=' ';
            }
        }
    };

    

    

    

</script>


</body>

</html>