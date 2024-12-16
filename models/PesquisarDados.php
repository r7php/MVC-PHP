

 <?php 

/**
 * 
 */
class PesquisarDados extends model
{
    
     public function PesquisarID($id){
      $sql  = "SELECT * FROM [BD_PONTO_MAIS].[dbo].[colaboradores] WHERE registration_number = '$id'";
         $sql = $this->db->prepare($sql);
         $sql->execute();
          if($sql->rowCount()){
              $val = $sql->fetchAll(PDO::FETCH_ASSOC); 
              return $val;
              
              
          }else{
              return 'Colaborador não encontrado!';
          }
         }

}
?>

  





