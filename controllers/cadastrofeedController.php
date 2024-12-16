<?php 
    /**
     * 
     */
    class cadastrofeedController extends controller{

 
        public function index(){    

           $dados = array('dados'=>'');
           $buscar = new PesquisarDados();
           $u = new Usuarios();
           $u->verificar_login();
           $id = addslashes($_GET['id']);       
           
           $name = $_GET['name'];
           $id_super = $_SESSION['ID'];
           

           
            $meses = array(1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");

           $dados['MES'] = $meses[date("n")]; 
           $anoAtual = date("Y");
            $mesAtual = date("m");

            // Array associativo para os nomes dos meses
            $nomesMeses = array(
                "01" => "Janeiro",
                "02" => "Fevereiro",
                "03" => "Março",
                "04" => "Abril",
                "05" => "Maio",
                "06" => "Junho",
                "07" => "Julho",
                "08" => "Agosto",
                "09" => "Setembro",
                "10" => "Outubro",
                "11" => "Novembro",
                "12" => "Dezembro"
            );
            $options = '';
            $ultimosDoisMeses = array();
            for ($i = 0; $i < 2; $i++) {
                // Calcula o mês e o ano para o loop
                $mesLoop = $mesAtual - $i;
                $anoLoop = $anoAtual;

                // Ajusta o ano se o mês for menor que 1
                if ($mesLoop < 1) {
                    $mesLoop = 12 + $mesLoop;
                    $anoLoop--;
                }

                // Formata o mês com zero à esquerda se necessário
                $mesFormatado = str_pad($mesLoop, 2, "0", STR_PAD_LEFT);

                $options .= '<option value="' . $nomesMeses[$mesFormatado] .'-'.$anoLoop. '">' . $nomesMeses[$mesFormatado] .'-'.$anoLoop.'</option>';

            }




           $dt = $buscar->PesquisarID($id);
        
           foreach($dt as $v):
            
            $dados['Colaborador'] = $v['name'];
            $dados['team'] = $v['team'];
            $dados['department'] = $v['department'];
            $dados['admission_date'] = $v['admission_date'];
            $dados['registration_number'] = $v['registration_number'];

            $dados['name'] = $name;
            $dados['id'] = $id;
            $dados['id_super'] = $id_super;
            $dados['options']=$options;  

            $this->loadTemplate('cadastrofeed', $dados);

           endforeach;
            


           
           
           



           
        }

      
     }




?>