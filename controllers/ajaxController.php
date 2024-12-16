<?php 
    /**
     * 
     */
    class ajaxController extends controller{


        public function alterarFeed(){
            $dados = array(
                'msg'=>'Erro ao fezer a inserção'
            );

            $ajax = new Ajax();
         
            $id = $_POST['id']; 
            $cpf = $_POST['cpf'];
            $nome = $_POST['nome'];
            $AVALIACAO_PRODUTIVIDADE = $_POST['AVALIACAO_PRODUTIVIDADE']; 
            $AVALIACAO_QUALIDADE = $_POST['AVALIACAO_QUALIDADE'];
            $AVALIACAO_COMPORTAMENTAL = $_POST['AVALIACAO_COMPORTAMENTAL'];
            $META_ACORDOS_FIRMADOS  = $_POST['META_ACORDOS_FIRMADOS'];

            if(empty($cpf)){
                echo json_encode($dados);
                exit;
            }else{
            $at = $ajax->AlterarFormCpf($AVALIACAO_PRODUTIVIDADE,$AVALIACAO_QUALIDADE,$AVALIACAO_COMPORTAMENTAL,$META_ACORDOS_FIRMADOS,$cpf,$id,$nome);
            echo json_encode($at);
            exit;
        }

        }

        public function InserirFeed(){
            $ajax = new Ajax();
            $PesquisarDados = new PesquisarDados();
            $id = $_POST['id']; 
            $dt = $PesquisarDados->PesquisarID($id);

            foreach($dt as $v):
            
            $Colaborador = $v['name'];
            $team = $v['team'];
            $department = $v['department'];
            $admission_date = $v['admission_date'];
            $reg = $v['registration_number'];

            $mesAtual = $_POST['MES'];            

            $AVALIACAO_PRODUTIVIDADE = $_POST['AVALIACAO_PRODUTIVIDADE']; 
            $AVALIACAO_QUALIDADE = $_POST['AVALIACAO_QUALIDADE'];
            $AVALIACAO_COMPORTAMENTAL = $_POST['AVALIACAO_COMPORTAMENTAL'];
            $META_ACORDOS_FIRMADOS  = $_POST['META_ACORDOS_FIRMADOS'];
            $id_sp = $_POST['id_sp'];

            $tipo = $_POST['tipo'];

            if($tipo == 'Pontual'){


            if(empty($_POST['perfil'])){
                echo 'Perfil não selecionado!';
                return false;
            }

            if(empty($_POST['escopo'])){
                echo 'escopo não selecionado!';
                return false;
             }
            }
            $escopo = $_POST['escopo'];
            $perfil = $_POST['perfil'];

            $result = $ajax->InserirFeed($department,$mesAtual,$Colaborador,$admission_date,$team,$AVALIACAO_PRODUTIVIDADE,$AVALIACAO_QUALIDADE,$AVALIACAO_COMPORTAMENTAL,$META_ACORDOS_FIRMADOS,$id_sp,$tipo,$escopo,$perfil,$reg);

            return $result;

            endforeach;

            

        }

        public function buscar_cpf_base($cpf){

            $Ajax = new Ajax();

            $r = $Ajax->buscarCpf($cpf);
            echo json_encode($r);
            exit;

        }
        public function carregar_mes_anterior($nome='',$ID_SUPERVISOR=''){
           $dados = array('dados'=>'');
           $Ajax = new Ajax();

           $mes = $_POST["mes"];
           $ID_SUPERVISOR = $_POST['ID_SUPERVISOR'];
           echo $s = $Ajax->Carregar_mes_anterior($ID_SUPERVISOR,$mes);
           //var_dump($s);
           //$dados['dados'] = $Ajax->Carregar_mes_anterior($ID_SUPERVISOR,$mes);
           //echo json_encode($dados);
           //exit();


        }

        public function carregar_mes($nome='',$ID_SUPERVISOR=''){
            $dados = array('dados'=>'');
            $Ajax = new Ajax();

             $nome = $_POST['nome'];
             $ID_SUPERVISOR = $_POST['ID_SUPERVISOR'];
             $dados['dados'] = $Ajax->Carregar_func($nome,$ID_SUPERVISOR);
             echo json_encode($dados);
             exit();


        }

        public function carregar_colaborador_feed($nome_colaborador=''){
            $dados = array('dados'=>'');
            $nome_colaborador = $_POST['nome_colaborador'];
            $Ajax = new Ajax();
            $val = $Ajax->carregar_colaborador_feed($nome_colaborador);
            //$dados['dados'] = $val;        
            echo json_encode($val);
            exit();

      

        }

        public function pesquisa_colaborador(){
            if(isset($_POST["id"])) {
                
            $id = $_POST["id"];
            $ID_SUPERVISOR = $_POST['ID_SUPERVISOR'];
            $nome = $_POST['NOME'];
            $Ajax = new Ajax();
             if($lista = $Ajax->pesquisa_colaborador($id,$nome,$ID_SUPERVISOR)){
                
                 foreach ($lista as $key){ 
                    echo "<tr>";
                    echo'<td><a href="cadastrofeed?id='.$key['registration_number'].'&&name='.$key['name'].'">Criar</td>';
                    echo "<td>" . $key['name'] . "</td>";
                    echo "</tr>";
                 }
             }
             else{
                 echo"Colaborador não encontrado";
                 }
            }

        }

     
     }




?>