
<div class="container2">
  <div class="tabela">
    <form method="post" action="/CodeIgniter_automoveis/index.php/tabela/verifica_pesquisa/?.<?php echo $email."/submit" ?>">
      <div class="form-row align-items-center">
        <div class="col-auto">
          <select class="custom-select mb-2 mr-sm-2 " id="inlineFormCustomSelect" name="tipo">
            <option value="fabricante" selected>Fabricante</option>
            <option value="modelo">Modelo</option>
            <option value="matricula">Matricula</option>
          </select>
        </div>
        <div class="col-auto">
          <input type="text" class="form-control mb-2" id="search" placeholder="Pesquisa.." name="search">
        </div>
        <div class="col-auto">
          <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </div>
      </div>
    </form>
  </div>
  <div class="tabela2">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Fabricante</th>
          <th scope="col">Modelo</th>
          <th scope="col">Cor</th>
          <th scope="col">Matricula</th>
          <th scope="col">Disponibilidade</th>
          <th scope="col">Remove</th>
          <th scope="col">Update</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(!empty($array)){
          // print_r(count($array));
          foreach ($array as $value){
            if($value["matricula"]!=""){
              echo "<tr><td class=".$value["fabricante_id"].">".$value["fabricante"]."</td><td class=".$value["modelo_id"].">".$value["Modelo"]."</td><td class=".$value["cor_id"].">".$value["Cor"]."</td><td>".$value["matricula"]."</td><td>".$value["disponibilidade"].'</td><td><button type="button"  value='.$value["automoveis_id"].' class="remove_button2 btn btn-danger btn-rounded btn-sm my-0" >Remove</button></td><td><button type="button"  value='.$value["automoveis_id"].' class="update_table btn btn-warning btn-rounded btn-sm my-0">Update</button></td></tr>';
            }
          }
        }
        ?>
      </tbody>
    </table>
    <div class="paginas">
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <?php
          $i=1;
          while ($i <= $num_pages) {
              ?>
              <li class="page-item "><a class="page1 page-link" href="/CodeIgniter_automoveis/index.php/tabela/verifica_pesquisa/?.<?php echo $email."/".$i ?>"><?php echo $i ?> </a></li>
              <?php
              $i++;
            }

          ?>
        </ul>
      </nav>
    </div>
  </div>

  <div id="janelaUpdate" style="width: 20%;height: auto;margin-left: 20%;position: absolute;display: none;">

    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Classificacao</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="formGroupExampleInput2">Modelo</label>
            <select class="custom-select mb-2 mr-sm-2 " id="modelo" name="modelo">
              <option value="1">Gulieta</option>
              <option value="2">320</option>
              <option value="3">120</option>
              <option value="4">A3</option>
              <option value="5">A4</option>
              <option value="6">Escort</option>
              <option value="7">Uno</option>
              <option value="8">Qashqai</option>
              <option value="9">Micra</option>
              <option value="10">106</option>
              <option value="11">308</option>
              <option value="12">Class A</option>
              <option value="13">GLA</option>
              <option value="14">Corolla</option>
              <option value="15">Yaris</option>
            </select>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Fabricante</label>
            <select class="custom-select mb-2 mr-sm-2 " id="fabricante" name="modelo">
              <option value="1">Alfa Romeo</option>
              <option value="2">BMW</option>
              <option value="3">Audi</option>
              <option value="4">Ford</option>
              <option value="5">Fiat</option>
              <option value="6">Nissan</option>
              <option value="7">Peugeot</option>
              <option value="8">Mercedes</option>
              <option value="9">Toyota</option>
            </select>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Cor</label>
            <select class="custom-select mb-2 mr-sm-2 " id="cor" name="cor">
              <option value="1">Vermelho</option>
              <option value="2">Verde</option>
              <option value="3">Preto</option>
              <option value="4">Branco</option>
              <option value="5">Cinzento</option>
              <option value="6">Azul</option>
              <option value="7">Amarelo</option>
            </select>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">Matricula</label>
            <input type="text" class="form-control" id="matricula" placeholder="XXYYZZ">
          </div>
          <div class="form-group">

            <div class="form_ava" style="padding-left:1em;">
              <form class="myform" >
                <label style="padding-right:6%;"><input type="radio" class="form-check-input" id="materialInline1" name="disponibilidade" value="1" checked  >Disponivel </label>
                <label > <input type="radio" class="form-check-input" id="materialInline2" name="disponibilidade" value="0"> Indisponivel</label>
              </form>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="update_table_pop_up btn btn-warning btn-rounded btn-sm my-0">Submit</button>
        </div>
      </div>
    </div>
  </div>

</div>
