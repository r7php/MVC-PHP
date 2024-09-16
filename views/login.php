
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="assets/css/cssLogin.css">
      <title>Feed Back</title>
      <link rel="shortcut icon" href="assets/logo/logo.ico" >
   </head>
   <body>
      <div class="cima" ></div>
      <form method="POST">
         <div style="margin-top: 10px;">
         <div class="wrapper fadeInDown" style="height: 50%;">
            <div id="formContent">
               <div class="fadeIn first">
                  <img src="https://img.freepik.com/vetores-premium/logo-ficticio-una-buena-idea_471774-60.jpg" id="icon" alt="User Icon" />
               </div>
               <input type="text" id="login" value="fulano" name="login" >
               <input type="password" value="123" id="password" class="fadeIn third" maxlength="4" name="senha" placeholder="4 últimos digitos(CPF)">
               <input type="submit" name='btn' class="fadeIn fourth" value="Log In" >
               <br>
               <p class="aviso"> 
                  <?php
                   if (!empty($aviso)){
                        echo $aviso;
                     }
                  ?>
               </p>
            </div>
         </div>
      </form>
   </body>
</html>