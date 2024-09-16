<?php 
    /**
     * 
     */
    class notfoundController extends controller{
        
  
        public function index(){    
          $dados = array('dados'=>'');
            
            $this->loadView('notfound', $dados);

            
        }

     }




?>