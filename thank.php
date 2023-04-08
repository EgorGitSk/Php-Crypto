<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/b3db48d41c.js" crossorigin="anonymous"></script>
    <style>
        .thanks{
            color: white;
            font-size: 2.5rem;
            margin-right: auto;
            
        }
        .close-page{
            display: inline-block;
            text-align: center;
            padding: 10px;
            font-size:1.5rem;
            align-items: center;
            align-self: flex-start;
            margin: 20px;
            margin-bottom: 20px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 2px solid white;
            transition: 0.5s ease;
            position: absolute;
        }
        .close-page a{
            color: white;
            text-decoration: none;
        }
        .close-page:hover{
            font-size:1.8rem;
            margin: 10px;
            padding: 20px;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            transition: 0.5s ease;
        }
        .position{
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align:center;
      }
      .position h1{
        font-family: 'Poppins', sans-serif;
        color: white;


      }
    </style>
    <title>Thank You</title>
</head>
<body class="bg-black">
    <div class="close-page">
        <a href="index.php">
        <i class="fa-solid fa-xmark"></i>
        </a>
    </div>
    <div class="position">
        <h1>Thanks!</h1>
      </div>
</body>
</html>