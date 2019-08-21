<?php include("head.php"); ?>
<?php
        include('includes/functions.php');

        if($_SERVER['REQUEST_METHOD'] === 'POST') { 

            post_index($conexion);
        
        }

?>

<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
						<h2> Paula SS - ABM</h2>
					</div>
					<div class="col-sm-7">
						<a href="includes/new.php" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Agregar Nuevo Barrio</span></a>
					</div>
                </div>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th># ID Barrio</th>
                        <th>Logo</th>						
						<th>Banner</th>
						<th>Latitud</th>
                        <th>Longitud</th>
						<th>Accion</th>
                    </tr>
                </thead>
            <tbody>

            <?php
               
                $barrios = obtener_barrios($conexion);

                foreach( $barrios as $barrio) { ?>

                <tr>              
                <td><?php echo $barrio['numero']; ?></td>
                <td><?php echo $barrio['logo']; ?></td>
                <td><?php echo $barrio['banner']; ?></td>
                <td><?php echo $barrio['latitud']; ?></td>
                <td><?php echo $barrio['longitud']; ?></td>
                <td>
                   <a href="includes/edit.php?id=<?php echo $barrio['id']?>" class="settings" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                   <a href="includes/delete.php?id=<?php echo $barrio['id']?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                </td>
                </tr>

                <?php } ?>
                
            </tbody>
        </table>			
    </div>     
</body>
</html>                                		


