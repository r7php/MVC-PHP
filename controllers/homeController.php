<?php 
    /**
     * 
     */
    class homeController extends controller{

 
        public function index(){  
    //        session_destroy();

         //   $u = new Usuarios();
           // $u->verificar_login();

            $dados = array();
                
            $this->loadTemplate('feed', $dados);
        }

    
     }




?>