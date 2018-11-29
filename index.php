<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rest API Client Side Demo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
      function fMasc(objeto, mascara) {
        obj=objeto
        masc=mascara
        setTimeout("fMascEx()",1)
      }
      function fMascEx() {
        obj.value=masc(obj.value)
      }
      function mCPF(cpf){
        cpf=cpf.replace(/\D/g,"")
        cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
        cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
        cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
        return cpf
      }
      function mNum(num){
        num=num.replace(/\D/g,"")
        return num
      }
  </script>
</head>
<body>

  <div class="container">
    <h2>Demonstração visual da api cpfs bloqueados</h2>
    <form class="form-inline" action="" method="post">
      <div class="form-group">
        <label for="name">CPF</label>
        <input type="text" name="cpf" class="form-control" onkeydown="javascript: fMasc(this, mCPF);" required/>
      </div>
      <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>
    <p>&nbsp;</p>
    <h3>
      <?php
          if(isset($_POST['submit'])){
            $cpf = $_POST["cpf"];
            $browser = 'browser';
            require_once "routes.php";
            if(isset($cpfStatus) && $cpfStatus === "Blocked"){
              ?>
              <p>Cpf <?php echo $cpf . ": " . $cpfStatus ?></p>
              <form action="routes.php" method="post">
                <input type="submit" name="unlock" value="Retirar da lista" class="btn btn-default">
              </form> 
              <?php
            }
            if(isset($cpfStatus) && $cpfStatus === "Free"){
              ?>
                <p>Cpf <?php echo $cpf . ": " . $cpfStatus ?></p>
                <form action="/action_page.php">
                  <input type="submit" name="block" value="Adicionar na lista" class="btn btn-default">
                </form>
              <?php
            }
            if(isset($cpfStatus) && $cpfStatus === "Invalid"){
              ?>
                <p>Cpf <?php echo $cpf . " inválido. Por favor digite novamente. "?></p>
              <?php
            }
          }
      ?>
    </h3>
  </div>
</body>
</html>