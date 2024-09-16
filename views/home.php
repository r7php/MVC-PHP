<?php 

date_default_timezone_set('America/Sao_Paulo');

?>

<div id="wrapper" style="background-color: #b21413;">
        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" >
        <center><img src="https://media-exp1.licdn.com/dms/image/C4D0BAQHOwHoW0RvGug/company-logo_200_200/0/1639512870582?e=2147483647&v=beta&t=P4eYaJL5AQ0qVYSeLYIY6KAls3vxx9ptUiyodmHGqHo" width="100"></center>
            <div class="sidebar-brand-text mx-3">
                    <hr class="sidebar-divider my-0" >
            </div>
            
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Inicio
            </div>

            <li class="nav-item">
                <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL.'feed';  ?>">
                <i class="fas fa-user-shield"></i>
                    <span>Home</span></a>
             </li>
            </li>
        </ul>
       
        <div id="content-wrapper"  class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" id="nsvB">

               <ul class="navbar-nav ml-auto" >

               
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                                
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


          
                        
                        
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6LGIoburyxkS1PjGSuwO41_h2C4GwIlrfo6SJ2Zw&s" width="40">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                  Perfil
                                </a>
                              
                              
                               <!-- <a class="dropdown-item" href="#">
                                     <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                  <a href="sair.php">
                                    Sair  
                                </a>-->
                                  <a class="dropdown-item" href="sair">
                                 <i class="fas fa-sign-out-alt"></i>
                                  Sair
                                </a>
                            </div>
                            
                        </li>

                    </ul>

                </nav>

                
                <!-- End of Topbar -->




               <div class="container-fluid">

                <!------------------------------------ inicio dos processos por usuario ----------------------------------->
                <div class="container-fluid">

                  
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo @$va; ?></h1><br>
 
                     
                    </div>

                  
                    <div class="row">

                    
                  
                      <!--   <?php  if($_SESSION['mod'] =='ADMINISTRATIVO'): ?>
                      
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                     
                                                 <a href="Pesquisar.php">Pesquisar</a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Pesquisa por nome</div>
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                         <?php endif;  ?>
                   
                      
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
             
  -->
</div>

    


<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 -->


</body>

</html>