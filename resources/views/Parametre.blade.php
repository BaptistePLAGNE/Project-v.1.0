<!DOCTYPE html>

<html>
        <head>
            <meta charset="utf-8" />
            <title>Music Project</title>
        </head>

        <body>

        <div class='Logo'> <img src="https://pbs.twimg.com/media/Fmrllq2aYAAT-S2?format=jpg&name=900x900"
         alt="An intimidating leopard."></div>

        <p><h1>Paramètre </h1></p>

        <div class="Element">
            <form method="POST" action="Play_Pause">
                @csrf
                <button type="submit"> <img src = "https://zupimages.net/up/23/11/5e1x.png"> </button>
                
            </form>
        </div>
    </body>
    <style>
        *{
         background-color: #4D4A45;
         font-family: sans-serif;
        }
        .Logo{
            text-align: center;
            margin-left: auto;
            margin-right: auto; 
            margin-top: 5%; 
            width: 100%;
        }
        h1{
            text-align: center;
            font-size: 100px;
            color: #FAA105; 
                    }


        .Element{
            width:100%;
            display: grid;
            justify-content: center;
            grid-template-columns: 100%;
        }
        form{
            text-align: center;
            width: 40%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</html>