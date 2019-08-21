<?php
$action = '../index.php';
if(isset($_GET['id'])) {
  $action = 'edit.php?id=' . $_GET['id'];
}

?>

<form action= <?php echo $action ?> method="POST" enctype="multipart/form-data">
            <div class="form-row align-items-center">

                <div class="col-auto my-1">
                <label class= "form-group">ID Barrio</label>
                <select name = "barrio" class="custom-select mr-sm-2">
                        <option value="">Seleccionar</option>
                        <option value="1" <?php if($barrio_id === '1') echo 'selected' ?>>Uno</option>
                        <option value="2" <?php if($barrio_id === '2') echo 'selected' ?>>Dos</option>
                        <option value="3" <?php if($barrio_id === '3') echo 'selected' ?>>Tres</option>
                    </select>
                </div>

<?php
            if(isset($_GET['id'])) { ?>

            <div class="form-group">
            <label>Logo - Cambiar imagen</label>
            <input type="file" class="form-control-file" name="logo" id="logo" value="<?php if(isset($logo)) echo $logo; ?>">
            <img id="imgSalida" width="15%" height="15%" src="../imagenes/<?php if(isset($logo)) echo $logo; ?>" />
            </div>

            <div class="form-group">
            <label>Banner - Cambiar imagen</label>
            <input type="file" class="form-control-file" name="banner" id="banner" value="<?php if(isset($banner)) echo $banner; ?>" >
            <img id="imgSalida2" width="15%" height="15%" src="../imagenes/<?php if(isset($banner)) echo $banner; ?>" />
            </div>
 
<?php } else  { ?>

            <div class="form-group">
            <label>Logo - Seleccione una imagen por favor</label>
            <input type="file" class="form-control-file" name="logo" id="logo" value="<?php if(isset($logo)) echo $logo; ?>">
            <img id="imgSalida" width="15%" height="15%" src="../imagenes/<?php if(isset($logo)) echo $logo; ?>" />
            </div>

            <div class="form-group">
            <label>Banner - Seleccione una imagen por favor</label>
            <input type="file" class="form-control-file" name="banner" id="banner" value="<?php if(isset($banner)) echo $banner; ?>" >
            <img id="imgSalida2" width="15%" height="15%" src="../imagenes/<?php if(isset($banner)) echo $banner; ?>" />
            </div>

<?php } ?>

            <div class="form-group">
                <label>Latitud</label>
                <input type="text" class="form-control" name="latitud" value="<?php if(isset($latitud)) echo $latitud; ?>" >
                </div>

            <div class="form-group">
                <label>Longitud</label>
                <input type="text" class="form-control" name="longitud" value="<?php if(isset($longitud)) echo $longitud; ?>" >
            </div>

            <button type="submit" value="edit" class="btn btn-primary">Guardar Cambios</button>
</form>

