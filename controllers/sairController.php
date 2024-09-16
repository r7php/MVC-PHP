<?php 
    /**
     * 
     */
    class sairController extends controller{
        
  
        public function index(){    
            $dados = array('dados'=>'');
             // echo 'sair';
             
             header('Location:login');
             
             session_destroy();

            $this->loadView('sair', $dados);

            
        }

     }




?>