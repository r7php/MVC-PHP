<?php 
    /**
     * 
     */
    class matriculaController extends controller{

 
        public function index(){    
            $dados = array('dados'=>'');
            if(isset($_POST['cpf'])){
                echo $_POST['cpf'];
            }
            $this->loadTemplate('matricula', $dados);
        }


     } 




?>