<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ohaa Parcel Storage</title>
    <style>
        @import 'https://fonts.googleapis.com/css?family=Raleway';

        html, body
        {
            margin: 0px;
        }

        body 
        {
            background: turquoise;
        }

        h1
        {
            margin: 0 auto;
            padding: 2em 0;
            color: #FFF;
            font: 40px Raleway;
            text-decoration: underline;
            font-weight: bolder;
            text-align: center;
        }

        div.container
        {
            font-family: Raleway;
            margin: 0 auto;
            padding: 8em 0em;
            text-align: center;
        }

        div.container a
        {
            color: #FFF;
            text-decoration: none;
            font: 40px Raleway;
            margin: 0px 100px;
            padding: 10px 10px;
            position: relative;
            z-index: 0;
            cursor: pointer;
        }

        /* Border X get width  */
        div.borderXwidth a:before, div.borderXwidth a:after
        {
            position: absolute;
            opacity: 0;
            width: 0%;
            height: 2px;
            content: '';
            background: #FFF;
            transition: all 0.3s;
        }

        div.borderXwidth a:before
        {
            left: 0px;
            top: 0px;
        }

        div.borderXwidth a:after
        {
            right: 0px;
            bottom: 0px;
        }

        div.borderXwidth a:hover:before, div.borderXwidth a:hover:after
        {
            opacity: 1;
            width: 100%;
            /* width: auto; */
        }
    </style>
</head>
<body>
    <h1 onclick="destroyer()">
       OHAA PARCEL STORAGE
    </h1>
    <div class="container borderXwidth">
        <a href="pickup.php">PICK UP</a>
        <a href="dropoff.php">DROP OFF</a>
    </div>
    
    <script>
    function destroyer(){
        localStorage.clear();
    }
    </script>
</body>
</html>
<?php
    
?>
