<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Music Project</title>
    </head>
        <body>
            <div class='Bouton'>
                <div class = 'Bouton1'>
                        <a href="Parametre" class='image_parametre'>
                        <img src="https://zupimages.net/up/23/11/u6b5.png" class='img_para' alt="" />
                        </a> 
                </div>
            </div>
            <div class='element'>
                <div class = 'Total'>
                    <div class='Logo'>
                        <img class="logo_nous" src="https://pbs.twimg.com/media/Fmrllq2aYAAT-S2?format=jpg&name=900x900">
                    </div>
                    <h1> Rechercher votre musique par titre :</h1>
                    <form method="get" action="recherche_liste">
                            <input type="text" name="Musique" class="input" required>
                    </form>
                </div>
            </div>
        </body>
    <style>

        html{
            margin: 0;
            padding: 0;
           overflow:hidden;  
        }
        body{
            padding: 0;
            margin: 0;
            overflow:hidden;
        }
        *{
            background-color:#4D4A45;
        }

        .logo_nous{
            //padding-left: 5%;
            width: 100%;
        }

        form{
            margin-top:5%;
            width: 100%;
            color: #FAA105;
        }
        .input{
            border: 0.1em solid #FAA105;
            border-radius: 50px;
            color: #FAA105;
            font-size: 500%;
            text-align: center;
            width: 100%;
        }
        .Logo{
            //width: 75%;    
        }
        
        .element{
            margin-top : 50px;
            display: grid;
            justify-content: center;
            grid-template-columns: 70%;
        }

        h1{
            color: #FAA105;
            font-size: 350%;
            text-align: center;
            padding-top: 5%;
        }
        
        .Total{
            width: 100%;
        }

        .Bouton1{
            width: 100%;
        }
        .Bouton{
            width:100%;
            display: grid;
            justify-content: right;
            grid-template-columns: 5%;
        }
        .image_parametre{
            width: 100%;
        }
        .img_para{
            width:100%;
        }

            
    </style>
</html>