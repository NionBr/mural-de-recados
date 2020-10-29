<?php
include_once 'php_actions/db_connect.php';
include_once 'php_actions/mensage.php';
?>

<!DOCTYPE html>
<html lang="pt=-br">
<head>
    <meta charset="UTF-8">
    <title>Mural de recados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="blue-grey lighten-4">

    <div class="container z-depth-3 white">
        <div class="row center blue-grey darken-4 z-depth-2">
            <h2 class="white-text">Mural de recados</h2>
        </div>
        <div class="row">
            <div class="row">
                <form class="col s12" action="php_actions/create.php" method="POST">
                    <div class="row">
                      <div class="input-field col s10" >
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="recado" name="recado" class="materialize-textarea validate"></textarea>
                        <label for="recado">Novo recado</label>
                      </div>
    
                         <div class="input-field col s2">
                            <button name="btn-salvar" class="waves-effect waves-light btn">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="divider"></div>


        <div class="row">
            <?php
              $sql = "SELECT * FROM recados";
              $result = mysqli_query($connect, $sql);

              if(mysqli_num_rows($result) > 0):

              while($data = mysqli_fetch_array($result)):
            ?>
            <div class="col s12 m6 l3 ">
                <div class="card blue-grey darken-3">
                  <div class="card-content white-text">
                    <p><?php echo $data['recado']; ?></p>
                  </div>
                  <div class="card-action">
                    <a href="#modal<?php echo $data['id']; ?>" class="btn waves-effect waves-light red modal-trigger">Excluir</a>
                  </div>
                </div>

                <div id="modal<?php echo $data['id']; ?>" class="modal">
                  <div class="modal-content">
                    <h5>Opa!</h5>
                    <p>Tem certeza que deseja excluir este recado ?</p>
                  </div>
                  <div class="modal-footer">
                    
                      
                    <form action="php_actions/delete.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        <button type="submit" name="btn-deletar" class="btn red ">Sim, quero deletar</button>
                        
                        <a href="#" class=" modal-close waves-effect waves-grey btn grey ">Cancelar</a>
                    </form>
                      
                      

                    
                  </div>
                </div>

            </div>  
            <?php 
            endwhile; 
            else:?>

              <h4 class="center">:-(</h4>
              <h5 class="center">Não há nenhum recado aqui.<br> Preencha o campo para criar um recado.</h5>
              

            <?php
            endif;
            ?>
        </div>
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
      M.AutoInit();
    </script>
</body>
</html>
