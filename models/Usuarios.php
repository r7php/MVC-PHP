<?php 

/**
 * 
 */
class Usuarios extends model
{
	
	public function verificar_login(){

        //unset($_SESSION['NOME_EQ']);

		if(!isset($_SESSION['NOME_EQ'])){
		 		header('Location:'.BASE_URL."login");
		 		exit;
		}

		// if(!isset($_SESSION['ID']) || (isset($_SESSION['ID']) && !empty($_SESSION['ID']))){
		// 		header('Location:'.BASE_URL."login");
		// 		exit;
		// }

		
	}

	public function logar($login,$senha){
           
           $sql  = "select*from BD_PONTO_MAIS.dbo.colaboradores where registration_number = '$login' and RIGHT(RTRIM(LTRIM(REPLACE(REPLACE(CPF,'.',''),'-',''))),4)='$senha'";
           

           $sql = $this->db->prepare($sql);
           $sql->execute();
           $val = $sql->fetch(PDO::FETCH_ASSOC); 

            if(!empty($val)){
		         
                  $nomeCompleto = $val['name'];
                  $_SESSION['ID'] = $val['registration_number'];
                  $_SESSION['CARGO'] = $val['job_title'];
                  
                    $n1 = $this->juntarNomeUltimoNome($nomeCompleto);
                    $n2 = $this->extrairPrimeiroSegundoNome($nomeCompleto);

                    
                    $ar = array("$n1","$n2");
                     for ($i=0; $i <2 ; $i++) { 
                      
                      $sql = "SELECT top 1 * FROM BD_PONTO_MAIS.dbo.colaboradores where team = '$ar[$i]'";
                      $sql = $this->db->prepare($sql);
                      $sql->execute();
                      $vals = $sql->fetch(PDO::FETCH_ASSOC); 
                      //var_dump($vals);
                      if($vals['team'] != ""){
                            $_SESSION['NOME_EQ'] =  $vals['team'];
                            return true;
                      }

                    }



		       


		    }else{
		    	return false;
		    }


        }






    private function juntarNomeUltimoNome($nomeCompleto) {
    // Explode o nome completo em um array, separando as palavras pelo espaço em branco
    $palavras = explode(' ', $nomeCompleto);

    // Remove possíveis espaços em branco antes ou depois de cada palavra
    $palavras = array_map('trim', $palavras);

    // Pega o primeiro nome
    $primeiroNome = array_shift($palavras);

    // Pega o último nome
    $ultimoNome = array_pop($palavras);

    // Junta o primeiro nome com o último nome
    $nomeCompleto = $primeiroNome . ' ' . $ultimoNome;

    return $nomeCompleto;
}

    private function extrairPrimeiroSegundoNome($nomeCompleto) {
    // Explode o nome completo em um array, separando as palavras pelo espaço em branco
    $palavras = explode(' ', $nomeCompleto);

    // Remove possíveis espaços em branco antes ou depois de cada palavra
    $palavras = array_map('trim', $palavras);

    // Pega o primeiro nome
    $primeiroNome = array_shift($palavras);

    // Pega o segundo nome (caso exista)
    $segundoNome = '';
    if (count($palavras) > 0) {
        $segundoNome = array_shift($palavras);
    }

    // Junta o primeiro nome com o segundo nome (caso exista)
    $nomeCompleto = $primeiroNome;
    if (!empty($segundoNome)) {
        $nomeCompleto .= ' ' . $segundoNome;
    }

    return $nomeCompleto;
  }







}







?>