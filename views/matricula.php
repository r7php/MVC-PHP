<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario com Bootstrap</title>
    <!-- Incluindo o CSS do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Digite um cpf</h4>
                    </div>
                    <div class="card-body">
                      
                            <div class="mb-3">
                                <label for="infoInput" class="form-label">Informação</label>
                                <input type="text" class="form-control" maxlength="14" name="cpf" id="infoInput" placeholder="Digite aqui"  oninput="applyCpfMask(event)">
                            </div>
                            <button type="button" class="btn btn-primary" id='btnCPF'>Procurar</button>
                            <div id='res' style="display:none">
                                    <br><img src="https://i.gifer.com/ZKZg.gif" width=50>
                            </div>
                            <hr>
                            Matrícula:<b><p id="msg-res"></p>
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/js/cpf.js"></script>

    
    <!-- Incluindo o JavaScript do Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
