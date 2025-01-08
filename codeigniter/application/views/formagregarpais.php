<br><br><br>
<h1>Agregar Pais</h1>


<?php
echo form_open_multipart("pais/agregarpaisbd");// <form>
?>
<input type="text" name="pais" class="form-control" placeholder="Ingrese el pais" required>
<input type="number" name="superficie" class="form-control" placeholder="Ingrese la superficie" required>
<input type="number" name="poblacion" class="form-control" placeholder="Ingrese la población" required>
<button type="submit" class="btn btn-success">Agregar Pais</button>


<?php
echo form_close();// </form>
?>
