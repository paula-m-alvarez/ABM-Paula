<?php 
include("functions.php");

if($_SERVER['REQUEST_METHOD'] === 'POST') {
      
    delete($conexion, $id);

}

?>

<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
						<h2> Paula SS - Eliminar Barrio</h2>
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
                    </tr>

                </thead>
                   
            <tbody>
<?php

include("../head.php");

            $id = $_GET['id'];

            $barrio = obtener_barrio($conexion, $id); ?>

                <tr>              
                <td><?php echo $barrio['id_barrio']; ?></td>
                <td><?php echo $barrio['logo']; ?></td>
                <td><?php echo $barrio['banner']; ?></td>
                <td><?php echo $barrio['latitud']; ?></td>
                <td><?php echo $barrio['longitud']; ?></td>
                <tr> 

            </tbody>

        </table>			
    </div>     
    
   <form action = "delete.php?id=<?php echo $_GET['id']?>" method = "POST">         

    <button type="submit" value="delete" class="btn btn-danger">Eliminar</button>

   </form>

</body>
</html>     


