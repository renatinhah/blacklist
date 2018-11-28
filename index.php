<?php

 // var_dump($_SERVER['REQUEST_URI']); 
 // var_dump($_POST["name"]);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title>Consulta cpf</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <style type="text/css">
      <!--
        .unsel {
          border-bottom-width: thin;
          border-bottom-style: solid;
          border-bottom-color: #0000FF; <!-- Cor da borda da aba -->
          font-style: normal;
        }
        .sel {
          border-top-width: thin;
          border-right-width: thin;
          border-bottom-width: 0px;
          border-left-width: thin;
          border-top-style: solid;
          border-right-style: solid;
          border-bottom-style: none;
          border-left-style: solid;
          border-top-color: #0000FF;<!-- cor da borda da aba-->
          border-right-color: #0000FF;<!-- cor da borda da aba-->
          border-left-color: #0000FF;<!-- cor da borda da aba-->
          font-weight: bold;
          background-color: #66CCFF;<!-- cor de fundo-->
        }
        .divsel {
          visibility: visible;
          position: absolute;
          left: 10px;<!-- distância do conteúdo em relação à esquerda do browser-->
          top: 50px;<!-- distância do conteúdo em relação ao topo-->
          height: 520px;<!-- altura do conteúdo-->
          /* width: 1000px;<!-- largura do conteúdo--> */
          background-color: #66CCFF;<!-- cor de fundo do conteúdo-->
        }

        .divunsel {
          visibility: hidden;
        }
    </style>
  </head>

  <body>

    <div align="center" id="aba">
      <script language="JavaScript">
        function sel(idaba){
          var aba=document.getElementById(idaba);
          var nAbas="5"; <!-- colocar o número de abas  1-->
          for(var i="1";i<nAbas;i++){
            var id="aba"+i;
            document.getElementById(id).className="unsel";
          }
          aba.className="sel";
          
          for(var u="1";u<nAbas;u++){
            var idt="textaba"+u;
            document.getElementById(idt).className="divunsel";
          }
          var iddiv="text"+idaba;
          document.getElementById(iddiv).className="divsel";
        }
      </script>
      <table width="100%" border="0" align="center" cellspacing="0" id="t_abas">
        <tr id="tr_abas">
          <td width="16,67%" class="unsel">&nbsp;</td>
          <td id="aba1" width="16,67%" class="sel" onClick="sel(this.id)">Consultar cpf</td>
          <td id="aba2" width="16,67%" class="unsel" onClick="sel(this.id)">Inserir cpf</td>
          <td id="aba3" width="16,67%" class="unsel" onClick="sel(this.id)">Alterar cpf</td>
          <td id="aba4" width="16,67%" class="unsel" onClick="sel(this.id)">Deletar cpf</td>
          <td width="16,67%" class="unsel">&nbsp;</td>
        </tr>
      </table>
    </div>

    <div id="textaba1" class="divsel">
      <form action="routes.php" method="get">
        <fieldset>
          <legend>Consulta CPF:</legend>
          Cpf:<br>
          <input type="text" name="cpf" value=""><br><br>
          <input type="submit" value="Submit">
        </fieldset>
        <br />
      </form>
    </div><!-- colocar aqui o conteúdo das abas. Atenção para seguir o mesmo modelo de id.-->
    <div id="textaba2" class="divunsel">Conteúdo da aba2 aqui</div>
    <div id="textaba3" class="divunsel">Conteúdo da aba3 aqui</div>
    <div id="textaba4" class="divunsel">Conteúdo da aba4 aqui</div>
  </body>
</html>

