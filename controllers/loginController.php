<?php 
    /**
     * 
     */
    class loginController extends controller{
        
  
        public function index(){    
            $dados = array(
                'aviso'=>''
            );        
            
             if(isset($_POST['login'])){
                   $login = addslashes($_POST['login']);
                   $senha = addslashes($_POST['senha']);
                   
                   $u = new Usuarios();
                   if($u->logar($login,$senha)){
                       header('Location:'.BASE_URL);
                   }else{
                    $link = BASE_URL."matricula";
                    $dados['aviso'] = "Erro ao fazer Login!<br>Caso precise saber sua matricula, <a href='$link'>clique aqui</a>";

                   }
                   

            }

            $this->loadView('login', $dados);
        }

     }




?>