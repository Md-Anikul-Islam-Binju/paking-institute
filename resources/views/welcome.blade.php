
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Peking Institute | Launching Soon</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Poppins',sans-serif;
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            overflow:hidden;
            background:linear-gradient(-45deg,#001f3f,#003a70,#0056a6,#0099ff,#003a70);
            background-size:400% 400%;
            animation:gradientBG 15s ease infinite;
            position:relative;
            color:#fff;
        }

        /* Animated Background */

        @keyframes gradientBG{
            0%{background-position:0% 50%;}
            50%{background-position:100% 50%;}
            100%{background-position:0% 50%;}
        }

        /* Floating Light Orbs */

        .orb{
            position:absolute;
            border-radius:50%;
            background:rgba(255,255,255,.08);
            backdrop-filter:blur(10px);
            animation:float 12s infinite ease-in-out;
        }

        .orb:nth-child(1){
            width:250px;
            height:250px;
            top:-100px;
            left:-80px;
        }

        .orb:nth-child(2){
            width:180px;
            height:180px;
            bottom:-70px;
            right:-30px;
            animation-duration:10s;
        }

        .orb:nth-child(3){
            width:120px;
            height:120px;
            top:20%;
            right:10%;
            animation-duration:8s;
        }

        .orb:nth-child(4){
            width:80px;
            height:80px;
            left:12%;
            bottom:18%;
            animation-duration:14s;
        }

        @keyframes float{

            0%,100%{
                transform:translateY(0px);
            }

            50%{
                transform:translateY(-35px);
            }

        }

        /* Animated Stars */

        .star{
            position:absolute;
            width:4px;
            height:4px;
            border-radius:50%;
            background:white;
            animation:stars linear infinite;
        }

        @keyframes stars{
            from{
                transform:translateY(100vh);
                opacity:0;
            }
            20%{
                opacity:1;
            }
            to{
                transform:translateY(-150px);
                opacity:0;
            }
        }

        /* Glass Card */

        .container{

            position:relative;
            z-index:100;

            width:90%;
            max-width:820px;

            padding:65px;

            background:rgba(255,255,255,.10);

            border:1px solid rgba(255,255,255,.15);

            border-radius:30px;

            backdrop-filter:blur(18px);

            box-shadow:0 25px 60px rgba(0,0,0,.35);

            text-align:center;

            animation:show .9s ease;

        }

        @keyframes show{

            from{
                opacity:0;
                transform:translateY(50px);
            }

            to{
                opacity:1;
                transform:translateY(0);
            }

        }

        /* Logo */

        .logo{

            font-size:48px;

            font-weight:800;

            text-transform:uppercase;

            letter-spacing:3px;

            margin-bottom:25px;

            animation:glow 3s infinite alternate;

        }

        .logo span{

            color:#8ad4ff;

        }

        @keyframes glow{

            0%{

                text-shadow:0 0 10px rgba(255,255,255,.3);

            }

            100%{

                text-shadow:
                    0 0 15px white,
                    0 0 30px #67c7ff,
                    0 0 60px #67c7ff,
                    0 0 90px #67c7ff;

            }

        }

        h1{

            font-size:60px;

            font-weight:700;

            margin-bottom:20px;

        }

        p{

            font-size:20px;

            line-height:1.8;

            opacity:.95;

            margin-bottom:45px;

        }

        /* Animated Button */

        .btn{

            display:inline-flex;

            align-items:center;

            justify-content:center;

            position:relative;

            overflow:hidden;

            padding:17px 48px;

            border-radius:50px;

            background:linear-gradient(135deg,#00b4ff,#005eff);

            color:white;

            font-size:18px;

            font-weight:600;

            text-decoration:none;

            transition:.35s;

            box-shadow:0 12px 35px rgba(0,102,255,.5);

        }

        .btn span{

            position:relative;

            z-index:2;

        }

        .btn::before{

            content:"";

            position:absolute;

            top:-60%;

            left:-30%;

            width:40px;

            height:220%;

            background:rgba(255,255,255,.9);

            transform:rotate(25deg);

            animation:shine 2.3s linear infinite;

        }

        @keyframes shine{

            0%{
                left:-35%;
            }

            100%{
                left:140%;
            }

        }

        .btn:hover{

            transform:translateY(-6px) scale(1.06);

            box-shadow:0 18px 45px rgba(0,102,255,.7);

        }

        /* Footer */

        .footer{

            margin-top:40px;

            font-size:14px;

            opacity:.75;

            letter-spacing:1px;

        }

        /* Responsive */

        @media(max-width:768px){

            .container{
                padding:40px 25px;
            }

            .logo{
                font-size:30px;
            }

            h1{
                font-size:38px;
            }

            p{
                font-size:17px;
            }

            .btn{
                padding:15px 35px;
                font-size:16px;
            }

        }

    </style>

</head>

<body>

<div class="orb"></div>
<div class="orb"></div>
<div class="orb"></div>
<div class="orb"></div>

<div class="container">

    <div class="logo">
        PEKING <span>INSTITUTE</span>
    </div>

    <h1>Launching Soon</h1>

    <p>
        We are working hard to launch the new official website of
        <strong>Peking Institute</strong>.
        Our team is crafting a modern, faster, and better digital experience.
        Stay tuned—we'll be live very soon.
    </p>

    <a href="/login" class="btn">
        <span>Admin Login</span>
    </a>

    <div class="footer">
        © 2026 Peking Institute. All Rights Reserved.
    </div>

</div>

<script>

    // Create animated stars

    for(let i=0;i<80;i++){

        const star=document.createElement("div");

        star.className="star";

        star.style.left=Math.random()*100+"%";
        star.style.top=Math.random()*100+"%";

        star.style.width=(Math.random()*4+2)+"px";
        star.style.height=star.style.width;

        star.style.opacity=Math.random();

        star.style.animationDuration=(Math.random()*10+8)+"s";

        star.style.animationDelay=(Math.random()*8)+"s";

        document.body.appendChild(star);

    }

</script>

</body>
</html>
