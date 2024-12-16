<?php 
    /**
     * 
     */
    class feedController extends controller{

 
        public function index(){    
            $dados = array('dados'=>'');
             $u = new Usuarios();
            $u->verificar_login();
            $this->loadTemplate('feed', $dados);
        }

        // public function testar(){
        //     echo '123';
        // }
     }




?>