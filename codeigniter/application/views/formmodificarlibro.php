<div class="page-wrapper">

<!-- Page Content-->
<div class="page-content-tab">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-12">
            <br><br><br>
<h1>Modificar Libro</h1>


<?php
foreach($infolibro->result() as $row)
{
?>

<?php
echo form_open_multipart("libro/modificarlibrobd");// <form>
?>

<input type="hidden" name="id" value="<?php echo $row->id ?>">
<input type="text" name="titulo" class="form-control" placeholder="Modifique el pais" value="<?php echo $row->titulo ?>">
<input type="text" name="autor" class="form-control" placeholder="Modifique la superficie" value="<?php echo $row->autor ?>">
<input type="text" name="genero" class="form-control" placeholder="Modifique la superficie" value="<?php echo $row->genero ?>">
<input type="number" name="publicado" class="form-control" placeholder="Modifique el pais" value="<?php echo $row->publicado ?>">
<input type="text" name="isbn" class="form-control" placeholder="Modifique el pais" value="<?php echo $row->isbn ?>">

<button type="submit" class="btn btn-success">Modificar libro</button>

<?php
echo form_close();// </form>
?>

<?php
}
?>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container -->