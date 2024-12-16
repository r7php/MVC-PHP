<?php 

/**
 * 
 */
class Ajax extends model
{
	   


    public function buscarCpf($cpf){
        $array = [
            'registration_number'=>'Nao existe na base'
        ];
        $sql  = "SELECT*FROM [BD_PONTO_MAIS].[dbo].[colaboradores] where cpf ='$cpf' ";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        $val = $sql->fetchAll(PDO::FETCH_ASSOC); 
    
        return $val;
        exit;


    }
      public function AlterarFormCpf($AVALIACAO_PRODUTIVIDADE,$AVALIACAO_QUALIDADE,$AVALIACAO_COMPORTAMENTAL,$META_ACORDOS_FIRMADOS,$cpf,$id,$nome){
        
        $dados = array('msg'=>'erro');

        $sql  = "SELECT
        registration_number AS MATRICULA
        ,RIGHT(RTRIM(LTRIM(REPLACE(REPLACE(CPF,'.',''),'-',''))),4) AS SENHA
        FROM [BD_MIS].[dbo].[TB_FULL_CAPACITY]
        WHERE DT_ATUALIZACAO = (SELECT MAX(DT_ATUALIZACAO) FROM [BD_MIS].[dbo].[TB_FULL_CAPACITY]) 
        and RIGHT(RTRIM(LTRIM(REPLACE(REPLACE(CPF,'.',''),'-',''))),4) = '$cpf' and name = '$nome'
        ";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        if(!$sql->rowCount()){
            $dados['msg'] = 'Este CPF não existe na base do PONTO MAIS';
         
            
        }else{

       $sql  = "UPDATE [BD_MIS].[dbo].[TB_FULL_FEED_BACK] SET CPF_OPERADOR_ASSINATURA = '$cpf', AVALIACAO_PRODUTIVIDADE='$AVALIACAO_PRODUTIVIDADE',AVALIACAO_QUALIDADE='$AVALIACAO_QUALIDADE',AVALIACAO_COMPORTAMENTAL='$AVALIACAO_COMPORTAMENTAL',META_ACORDOS_FIRMADOS='$META_ACORDOS_FIRMADOS',STATUS='ASSINADO',DT_ASSINADO_CPF = getdate() where ID = $id";
        $sql = $this->db->prepare($sql);
        $sql->execute();
         $dados['msg'] = 'Feedback cadastrado com sucesso';
         
        }

        return $dados;

  
        }
        public function InserirFeed($department,$MES,$Colaborador,$admission_date,$team,$AVALIACAO_PRODUTIVIDADE,$AVALIACAO_QUALIDADE,$AVALIACAO_COMPORTAMENTAL,$META_ACORDOS_FIRMADOS,$id_sp,$tipo,$escopo,$perfil,$reg){
        
         $ano = date('Y');  
         
         $sql = $this->db->prepare("SELECT * FROM [BD_PONTO_MAIS].[dbo].[colaboradores] WHERE registration_number = '$id_sp'");   
         
         $sql->execute();
          if($sql->rowCount()){
              $val = $sql->fetchAll(PDO::FETCH_ASSOC); 
              foreach($val as $k):
                $id_sp = $k['registration_number'];  
                $COLABORADOR = $Colaborador;
                $sp = $team;
                $SETOR = $department;
                $MES_AVALIADO = $MES;
                $DATA_ADMISSAO = $admission_date;

                $AP = str_replace("'", '"', $AVALIACAO_PRODUTIVIDADE);
                $AQ = str_replace("'", '"', $AVALIACAO_QUALIDADE);
                $AC = str_replace("'", '"', $AVALIACAO_COMPORTAMENTAL);
                $MF = str_replace("'", '"', $META_ACORDOS_FIRMADOS);

                $sql = "INSERT INTO [BD_MIS].[dbo].[TB_FULL_FEED_BACK] VALUES('$SETOR','$MES_AVALIADO','$COLABORADOR','$DATA_ADMISSAO','$sp',getdate(),'$AP','$AQ','$AC','$MF','','PENDENTE',$id_sp,'$tipo','$escopo','$perfil','$reg','')";
                    $sql = $this->db->prepare($sql);
                    $sql->execute();
                    echo 'Cadastrado com sucesso!';
                    exit;
              endforeach;      
        }
    }

        public function carregar_colaborador_feed($colaborador){
            $st="";
            $st_td="";
            $sql = "SELECT top 50* FROM [BD_MIS].[dbo].[TB_FULL_FEED_BACK] where COLABORADOR = '$colaborador' order by DATA_AVALIADO DESC ";
            $sql = $this->db->prepare($sql);
            $sql->execute();
            if(!$sql->rowCount()){
                echo '0';
            }

            $val = $sql->fetchAll(PDO::FETCH_ASSOC); 
            return $val;

            // foreach ($val as $key){ 
            //        $st = $key['STATUS'];
            //        if($st == 'PENDENTE'){
            //             $st_td = "<td style='color:red'>" . $key['STATUS'] . "</td>";
            //        }else{
            //         $st_td = "<td style='color: #32CD32'>" . $key['STATUS'] . "</td>";
            //        }

            //        echo "<tr>";
            //        echo'<td><a href="AlterarForm.php?id='.$key['ID'].'">Feedback</td>';
            //        echo'<td>'.$key['COLABORADOR'].'</td>';
            //        echo "<td>" . date('Y-m-d H:i', strtotime($key['DATA_AVALIADO']))  . "</td>";
            //        echo $st_td;
            //        echo "<td>" . $key['MES_AVALIADO'] . "</td>";
            //        echo "</tr>";
            //     }

       }

	   public function pesquisa_colaborador($id,$nome_chefe,$ID_SUPERVISOR){
           
           $cargo="";
           $sql = $this->db->prepare("SELECT * FROM [BD_PONTO_MAIS].[dbo].[colaboradores]  where registration_number = '$ID_SUPERVISOR'");
           $sql->execute();
           $val = $sql->fetchAll(PDO::FETCH_ASSOC);  
           foreach($val as $c):
            $cargo.= $c['job_title'];
           endforeach;

           $sql="";
           if($cargo == 'Coordenador de Cobranca Pleno' or $cargo == 'Coordenador de Qualidade' or $cargo == 'Gestor'){
            $sql = "SELECT * FROM [BD_PONTO_MAIS].[dbo].[colaboradores]  where registration_number = '$id'";
           }else{

            $sql = "SELECT * FROM [BD_PONTO_MAIS].[dbo].[colaboradores]  where registration_number = '$id' and team = '$nome_chefe'";
            //$sql = "SELECT * FROM [BD_PONTO_MAIS].[dbo].[colaboradores]  where registration_number = '$id'";
           }

           $sql = $this->db->prepare($sql);
           $sql->execute();
            if($sql->rowCount()){
                $val = $sql->fetchAll(PDO::FETCH_ASSOC); 
                return $val;    
            }
       }

        public function Carregar_func($nome_chefe,$id){
           
           $cargo="";
           $sql = $this->db->prepare("SELECT * FROM [BD_PONTO_MAIS].[dbo].[colaboradores]  where registration_number = '$id'");
           $sql->execute();
           $val = $sql->fetchAll(PDO::FETCH_ASSOC);  
           foreach($val as $c):
            $cargo.= $c['job_title'];
           endforeach;

           $sql="";
           if($cargo == 'Coordenador de Cobranca Pleno' ){
            $sql  = "SELECT * FROM [BD_PONTO_MAIS].[dbo].[colaboradores] where job_title  in('Agente de Relacionamento','ESTAGIARIO', 'Recuperador de Ativos', 'Analista de Cobrança', 'Analista de Cobrança Pleno')";    
           }else if($cargo == 'Coordenador de Qualidade' or $cargo == 'Gestor'){
                    $sql  = "SELECT distinct *FROM [BD_PONTO_MAIS].[dbo].[colaboradores] where  team = '$nome_chefe' 
                             union
                             SELECT distinct * FROM [BD_PONTO_MAIS].[dbo].[colaboradores] where job_title  in(
                                                        'Assistente de Qualidade Junior',
                                                        'Jovem Aprendiz',
                                                        'Assistente de Qualidade Junior',
                                                        'Assistente de Qualidade Junior','Jovem Aprendiz','Agente de Relacionamento','ESTAGIARIO', 'Recuperador de Ativos', 'Analista de Cobrança', 'Analista de Cobrança Pleno','Supervisor de Operações')";    
           }
           else{
            $sql  = "SELECT * FROM [BD_PONTO_MAIS].[dbo].[colaboradores]  where team = '$nome_chefe'";    
           }

           $sql = $this->db->prepare($sql);
           $sql->execute();
           if($sql->rowCount()){
            $val = $sql->fetchAll(PDO::FETCH_ASSOC); 
            foreach ($val as $key){ 
               $total = $this->get_ALL($key['name']);
               $PT = $this->get_PENDENTE($key['name']);
               $AS = $this->get_ASSINADO($key['name']);
               

               echo "<tr>";
               echo'<td><a href="?id='.$key['name'].'">Feedback</td>';
               echo'<td>'.$key['name'].'</td>';
               echo "<td><b>" . $total['TOTAL'] . "</b></td>";
               echo "<td><b>" . $AS['ASSINADO'] . "</b></td>";
                echo "<td><b>" . $PT['PEN'] . "</b></td>";
               echo "</tr>";
            
           }     
                           
                
            }
        }



          public function Carregar_mes_anterior($ID_SUPERVISOR,$mes){

           $cargo="";
           $sql = $this->db->prepare("SELECT * FROM [BD_PONTO_MAIS].[dbo].[colaboradores]  where registration_number = $ID_SUPERVISOR");
           $sql->execute();
           $val = $sql->fetchAll(PDO::FETCH_ASSOC);  
           foreach($val as $c):
            $cargo.= $c['job_title'];
           endforeach;

           $sql="";
           if($cargo == 'Coordenador de Cobranca Pleno' or $cargo == 'Coordenador de Qualidade' or $cargo == 'Gestor'){
            $sql  = "SELECT distinct COLABORADOR, MES_AVALIADO FROM BD_MIS.dbo.TB_FULL_CAPACITY as A
                    inner join BD_MIS.dbo.TB_FULL_FEED_BACK as B on A.name = B.COLABORADOR WHERE A.DT_ATUALIZACAO = (SELECT MAX(DT_ATUALIZACAO) FROM BD_MIS.dbo.TB_FULL_CAPACITY) and B.MES_AVALIADO='$mes'";    
           }else{
            $sql  = "SELECT distinct COLABORADOR, MES_AVALIADO FROM BD_MIS.dbo.TB_FULL_CAPACITY as A
                    inner join BD_MIS.dbo.TB_FULL_FEED_BACK as B on A.name = B.COLABORADOR WHERE A.DT_ATUALIZACAO = (SELECT MAX(DT_ATUALIZACAO) FROM BD_MIS.dbo.TB_FULL_CAPACITY) and B.ID_SUPERVISOR = $ID_SUPERVISOR and B.MES_AVALIADO='$mes'";    
           }

            

           $sql = $this->db->prepare($sql);
           $sql->execute();
           
           
           if($sql->rowCount()){
            $val = $sql->fetchAll(PDO::FETCH_ASSOC); 
           
           
            foreach ($val as $key){ 
               $total = $this->get_ALL($key['COLABORADOR']);
               $PT = $this->get_PENDENTE($key['COLABORADOR']);
               $AS = $this->get_ASSINADO($key['COLABORADOR']);
               echo "<tr>";
               echo'<td><a href="?id='.$key['COLABORADOR'].'">Feedback</td>';
               echo'<td>'.$key['COLABORADOR'].'</td>';
               echo "<td>" . $total['TOTAL'] . "</td>";
               echo "<td>" . $AS['ASSINADO'] . "</td>";
                echo "<td>" . $PT['PEN'] . "</td>";
               echo "</tr>";
            
           }     
                        
                
            }

        }

        private function get_ALL($nome){
                $sql = "SELECT count(*) as TOTAL from [BD_MIS].[dbo].[TB_FULL_FEED_BACK]  where COLABORADOR = '$nome'";
                $sql = $this->db->prepare($sql);
                $sql->execute();
                $val = $sql->fetchAll(PDO::FETCH_ASSOC); 
                
                
                return $val[0];    
         }

         private function get_PENDENTE($nome){
                $sql = "SELECT count(*) as PEN from [BD_MIS].[dbo].[TB_FULL_FEED_BACK]  where COLABORADOR = '$nome' and STATUS = 'PENDENTE'";
                $sql = $this->db->prepare($sql);
                $sql->execute();
                $val = $sql->fetchAll(PDO::FETCH_ASSOC); 
                return $val[0];    
         }



         private function get_ASSINADO($nome){
                $sql = "SELECT count(*) as ASSINADO from [BD_MIS].[dbo].[TB_FULL_FEED_BACK]  where COLABORADOR = '$nome' and STATUS = 'ASSINADO'";
                $sql = $this->db->prepare($sql);
                $sql->execute();
                $val = $sql->fetchAll(PDO::FETCH_ASSOC); 
                return $val[0];    
         }




}







?>