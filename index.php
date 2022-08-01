<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EAHelp</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="bg-img">
        <div class="content">
            <header> EAHelp </header>
            <form action="login.php" method="post">
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="text" name="usuario" placeholder="credencial" required>
                </div><!--field-->
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input class="pass-key" type="password" name="senha" placeholder="Senha" required>
                    <span class="show">mostrar</span>
                </div><!--field space-->
                <?php if(isset($_GET['login']) && $_GET['login'] == 'erro') { ?>
                  
                    <div class="text-danger ">
                      Usuário ou senha inválido(s)
                    </div>

                <?php } ?>
                <br>
                <div class="field">
                    
                    <input type="submit" value="Entrar">
                </div><!--field-->
            </form>

        </div><!--content-->
    </div> <!-- bg-img-->
   
    

    <script>

const  pass_field = document.querySelector(".pass-key");
const showBtn = document.querySelector(".show");
showBtn.addEventListener("click", function () {
    if (pass_field.type === "password"){
        pass_field.type = "text";
        showBtn.textContent = "esconder";
        showBtn.style.color = "#3498db";
    } else {
        pass_field.type = "password";
        showBtn.textContent = "mostrar"
        showBtn.style.color = "#222"
    }
});
    </script>
    
</body>
</html>