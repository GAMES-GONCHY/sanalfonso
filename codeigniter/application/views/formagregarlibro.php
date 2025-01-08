


<div class="page-wrapper">

<!-- Page Content-->
<div class="page-content-tab">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-12">
            <br><br><br>
<h1>Agregar Libro</h1>


<?php
echo form_open_multipart("libro/agregarlibrobd");// <form>
?>
<input type="text" name="titulo" class="form-control" placeholder="Ingrese el pais" required>
<input type="text" name="autor" class="form-control" placeholder="Ingrese la superficie" required>
<input type="text" name="genero" class="form-control" placeholder="Ingrese la población" required>
<input type="number" name="publicado" class="form-control" placeholder="Ingrese la población" required>
<input type="text" name="isbn" class="form-control" placeholder="Ingrese la población" required>
<button type="submit" class="btn btn-success">Agregar libro</button>


<?php
echo form_close();// </form>
?>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container -->