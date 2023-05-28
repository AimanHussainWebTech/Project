<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
    <link rel="stylesheet" href="style.css">
    <style>
    {
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}

nav{
    width: 100%;
    height: 75px;
    line-height: 75px;
    padding: 0px 100px;
    top:0px;
    z-index: 999;
    position: fixed;
    background-image:linear-gradient( to right,#2685A3,#2EA3C7,#34B8E0);
}
nav .logo p{
    font-size: 30px;
    font-weight: bold;
    float: left;
    color: aquamarine;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    cursor: pointer;
}
nav ul{
    float: right;
}
nav li{
    display:inline-block;
    list-style: none;
}
nav li a{
    font-size: 20px;
    text-transform: uppercase;
    padding: 0px 40px;
    color: aliceblue;
    text-decoration: none;
}

nav li a:hover{
    color:white;
    transition: all 0.4s ease 0s;

}

</style>
</head>
<body>
    <nav>
        <div class ="logo">
            <p>
                Vaccine
            </p>
</div>
        <ul>
            <li><a herf="#"> Home</a></li>
            <li><a herf="#"> About</a></li>
            <li><a herf="#"> services</a></li>
            <li><a herf="#"> signup</a></li>

            

</ul>
    </nav>

</body>
</html>