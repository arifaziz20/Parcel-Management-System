<?php
    session_start();

    //sesion start with username(houseno)
    //back to home-> session unset
    
    $houseno = $_POST['houseno'];

    $_SESSION['username'] = $houseno;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <style>
        body{
        background: turquoise;
        }
        
        table, th, td {
        border-collapse: collapse;
        }
        th, td {
        padding: 5px;
        text-align: left;
        }
        td button {
        float:right;
        }
        td span{
        font-weight: bold;
        color: red;
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

        #status{
            margin: 0 auto;
            display: block;
            width: 85%;
        }

    </style>
</head>
<body>

<!-- <br><br> -->
<h1 style="text-align:center">House Number:
<?php echo $_SESSION['username']?>

</h1>
<div id="status">

</div>

<a href="pickup.php" class="previous round">&#8249;</a>

<script>

let houseno = JSON.parse("<?php echo $houseno?>");
let status = []; //array for store slots details
// let isExpired = [];
let slotAvail = JSON.parse(localStorage.getItem("slotAvail"));

for (let i=1;i<=5;i++)
{
    let keyname = houseno+'s'+i;
    let temp = JSON.parse(localStorage.getItem(keyname));
    status.push(temp);
}
//by Akmal
var dateNow = new Date();
let timeNow = dateNow.getTime();
// console.log(timeNow);

let output = document.getElementById('status');
toHTML();
assignbutton();

//by Ilham Hakimi
function toHTML(){
    let display = ' ';
    status.forEach(function(item,index){
        if(item){
            let idname = 'pickup-btn'+(index+1);
            
            let d = new Date(item['dateExp']);
            let n = d.getTime();
            console.log(n);
            if(n < timeNow){
                //remove button
                display += '<fieldset> Slot '+(index+1)+
                        '<br><table width=100%><tr><td>Courier: '+item['courier']+
                        '</td><td>Parcel Number: '+item['parcelno']+
                        '</td><td>Recipient Name: '+item['recip']+
                        '</td><td>Date Return: '+d.toLocaleString()+
                        '<span>&nbspRETURNED</span></td><td><button id="'+idname+
                        'exp">Remove</button></td></tr></table></fieldset>';

            } else{
                //pickup button
                display += '<fieldset> Slot '+(index+1)+
                        '<br><table width=100%><tr><td>Courier: '+item['courier']+
                        '</td><td>Parcel Number: '+item['parcelno']+
                        '</td><td>Recipient Name: '+item['recip']+
                        '</td><td>Date Return: '+d.toLocaleString()+
                        '</td><td><button id="'+idname+
                        '">Pick Up</button></td></tr></table></fieldset>';
            }

        } else {
            //empty slot
            display += '<fieldset> Slot '+(index+1)+
                        '<br><table width=100%><tr><td>Slot is empty! :(</td></tr></table></fieldset>'; 
        }

    });
    output.innerHTML = display;
    
}

//by amir Syazwan 1913373
function assignbutton(){
    for (let i=1;i<=5;i++){
        let idname='pickup-btn'+i;
        let inppickup = document.getElementById(idname);
        let remove='pickup-btn'+i+'exp';
        let inpremove = document.getElementById(remove);
        // console.log(inppickup);
        if(inppickup&&!inpremove){    
            inppickup.onclick = function() {
                alert("You have choose to pick up parcel in slot "+i+'. Kindly close the slot after taking the parcel.');
                slotAvail[houseno-1]++;
                localStorage.setItem('slotAvail',JSON.stringify(slotAvail));
                
                // let key = houseno + 's' + i;
                // console.log(typeof key);
                // localStorage.removeItem(key);
                localStorage.removeItem(houseno+'s'+i);

                status[i-1] = null;
                toHTML();
            };
        } else if(!inppickup&&inpremove) {
            inpremove.onclick = function() {
                alert("Parcel in slot "+i+' have been returned to courier. Please contact the courier.');
                slotAvail[houseno-1]++;
                localStorage.setItem('slotAvail',JSON.stringify(slotAvail));
                
                // let key = houseno + 's' + i;
                // console.log(typeof key);
                // localStorage.removeItem(key);
                localStorage.removeItem(houseno+'s'+i);

                status[i-1] = null;
                toHTML();
            };
        }
    }
}

let inpprev =document.getElementsByClassName('previous');

inpprev.onclick() = function(){
    <?php
    session_unset(); //remove ['username']
    session_destroy(); //destroy session
    ?>
};




</script>




</body>
</html>