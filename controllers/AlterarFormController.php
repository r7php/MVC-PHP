<?php 
    /**
     * 
     */
    class AlterarFormController extends controller{

 
        public function index(){    

            $dados = array('dados'=>'');
            
            $u = new Usuarios();
            $u->verificar_login();

            $up = new AlterarFormulario();
            $id = addslashes($_GET['id']);

            $al = $up->AlterForm($id);

            foreach($al as $key):
            	    $dados['dp'] = $key['SETOR'];
				    $dados['MES_AVALIADO'] = $key['MES_AVALIADO'];
				    $dados['COLABORADOR'] = $key['COLABORADOR'];
				    $dados['DATA_ADMISSAO'] = $key['DATA_ADMISSAO'];
				    $dados['SUPERVISOR'] =$key['SUPERVISOR'];
				    $dados['DATA_AVALIADO'] = date('Y-m-d H:i', strtotime($key['DATA_AVALIADO']));
				    $dados['AVALIACAO_PRODUTIVIDADE']=$key['AVALIACAO_PRODUTIVIDADE'];
				    $dados['AVALIACAO_QUALIDADE']=$key['AVALIACAO_QUALIDADE'];
				    $dados['AVALIACAO_COMPORTAMENTAL']=$key['AVALIACAO_COMPORTAMENTAL'];
				    $dados['META_ACORDOS_FIRMADOS']=$key['META_ACORDOS_FIRMADOS'];
				    $dados['cpf='] = $key['CPF_OPERADOR_ASSINATURA'];
				    $dados['STATUS']=$key['CPF_OPERADOR_ASSINATURA'];
				    $dados['nome'] =$key['COLABORADOR'];
				    $dados['escopo']=$key['ESCOPO'];
				    $dados['perfil']=$key['PERFIL'];
				    $dados['media']=$key['MEDIA'];
				    $dados['Assinado'] = '';
				    $dados['STATUS'] = $key['STATUS'];		
				    $dados['id'] = $id;

				    if($key['DT_ASSINADO_CPF'] > '2023-01-01 00:00:00.000'){
				      $dados['Assinado'] = date('Y-m-d H:i', strtotime($key['DT_ASSINADO_CPF']));  
				    }

            		$this->loadTemplate('AlterarForm', $dados);

            endforeach;
            

        }

      
     }




?>