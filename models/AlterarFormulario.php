 <?php 

/**
 * 
 */
class AlterarFormulario extends model
{
    
     public function AlterForm($id){
        
         $sql  = "SELECT * FROM [BD_MIS].[dbo].[TB_FULL_FEED_BACK] WHERE ID = $id ";
         $sql = $this->db->prepare($sql);
         $sql->execute();
           if($sql->rowCount()){
                $val = $sql->fetchAll(PDO::FETCH_ASSOC); 
                return $val;
          }

       }

}
?>

  