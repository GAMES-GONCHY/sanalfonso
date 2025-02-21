<!-- START CONTENT PAGE -->
<div id="content" class="app-content">




  <h1 class="page-header">Administradores</h1>


  <div class="container mt-4">
    <div class="row">
      <div class="col-xl-12">
        <div class="panel panel-inverse">
          <div class="panel-heading d-flex justify-content-between align-items-center">
            <h4 class="panel-title">Gestionar Administradores</h4>
            <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
              <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a> -->
            </div>
          </div>
          <div class="panel-body">
            <div class="row mb-3">
              <div class="col-md-6 mb-2">
                <a href="<?php echo base_url(); ?>index.php/crudusers/deshabilitados/2" class="btn btn-info btn-lg btn-block text-uppercase font-weight-bold w-100">
                  VER DESHABILITADOS
                </a>
              </div>
              <div class="col-md-6 mb-2">
                <a href="<?php echo base_url(); ?>index.php/crudusers/agregar/2" class="btn btn-success btn-lg btn-block text-uppercase font-weight-bold w-100">
                  Agregar Administrador
                </a>
              </div>
            </div>
            <table id="datatable" class="table table-hover table-striped align-middle">
              <thead>
                <tr>
                  <th width="1%">No.</th>
                  <th width="1%" data-orderable="false">Perfil</th>
                  <!-- <th>Cargar</th> -->
                  <th>Nickname</th>
                  <th>Nombre</th>
                  <th>Primer Apellido</th>
                  <th>Segundo Apellido</th>
                  <th>CI</th>
                  <th>E-mail</th>
                  <th>Fono</th>
                  <th>Género</th>
                  <th>Creado</th>
                  <th>Modificar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $cont = 1;
                foreach ($usuarios->result() as $row) {
                ?>
                  <tr>
                    <td><?php echo $cont ?></td>
                    <td>
                      <?php
                      $foto = $row->foto;
                      if ($foto == "") {
                      ?>
                        <img src="<?php echo base_url(); ?>uploads/usersphoto/perfil.jpg" width="40" alt="Perfil">
                      <?php
                      } else {
                      ?>
                        <img src="<?php echo base_url(); ?>uploads/usersphoto/<?php echo $foto ?>" width="40" alt="Perfil">
                      <?php
                      }
                      ?>
                    </td>
                    <!-- <td>
                      <?php
                      echo form_open_multipart("crudusers/subirfoto");
                      ?>
                      <input type="hidden" name="id" value="<?php echo $row->idUsuario ?>">
                      <input type="hidden" name="rol" value="<?php echo $row->rol ?>">
                      <button type="submit" class="btn btn-outline-lime me-1 mb-1"><b>Subir</b></button>
                      <?php
                      echo form_close();
                      ?>
                    </td> -->
                    <td><?php echo $row->nickName ?></td>
                    <td><?php echo $row->nombre ?></td>
                    <td><?php echo $row->primerApellido ?></td>
                    <td><?php echo $row->segundoApellido ?></td>
                    <td><?php echo $row->ci ?></td>
                    <td><?php echo $row->email ?></td>
                    <td><?php echo $row->fono ?></td>
                    <td>
                    <?php
                        if ($row->sexo == 'M') 
                        {
                            echo "Masculino";
                        }
                        else 
                        {
                          echo "Femenino";
                        }
                        ?>
                    </td>
                    <td><?php echo date('d-m-Y', strtotime($row->fechaRegistro)); ?></td>

                    <td>
                      <?php
                      echo form_open_multipart("crudusers/modificar"); // <form>
                      ?>
                      <input type="hidden" name="id" value="<?php echo $row->idUsuario ?>">
                      <button type="submit" class="btn btn-indigo me-1 mb-1">Modificar</button>
                      <?php
                      echo form_close(); // </form>
                      ?>
                    </td>
                    <td>
                      <?php
                      echo form_open_multipart("crudusers/deshabilitarbd"); // <form>
                      ?>
                      <input type="hidden" name="id" value="<?php echo $row->idUsuario ?>">
                      <input type="hidden" name="rol" value="<?php echo $row->rol ?>">
                      <button type="submit" class="btn btn-danger">Eliminar</button>

                      <?php
                      echo form_close(); // </form>
                      ?>
                    </td>
                  </tr>
                <?php
                  $cont++;
                }
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <th width="1%">No.</th>
                  <th width="1%" data-orderable="false">Perfil</th>
                  <!-- <th>Cargar</th> -->
                  <th>Nickname</th>
                  <th>Nombre</th>
                  <th>Primer Apellido</th>
                  <th>Segundo Apellido</th>
                  <th>CI</th>
                  <th>E-mail</th>
                  <th>Fono</th>
                  <th>Género</th>
                  <th>Creado</th>
                  <th>Modificar</th>
                  <th>Eliminar</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- START FOOTER-->
        </div>
      </div>
    </div>
  </div>
