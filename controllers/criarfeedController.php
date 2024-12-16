<?php 
    /**
     * 
     */
    class criarfeedController extends controller{

 
        public function index(){    
            $dados = array('dados'=>'');
            $u = new Usuarios();
            $u->verificar_login();
            $this->loadTemplate('criarfeed', $dados);
        }

      
     }




?>