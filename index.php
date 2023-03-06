<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="static/estilos.css">
</head>

<body>
    <h3 class="title">FORMULARIO DE VOTACION:</h3>
    <div class="formulario">
        <form name="form" id="formulario" action="votar.php" method="POST">
            <div class="formulario__voto" id="grupo__nombre">
                <label>Nombre y Apellido:</label>
                <tr>
                    <td>
                        <input type="text" class="formulario__input" name="nombre" id="nombre">
                    </td>
                </tr>
            </div>
            <div class="formulario__voto" id="grupo__alias">
                <label>Alias:</label>
                <tr>
                    <td>
                        <input type="text" class="formulario__input" name="alias" id="alias">
                    </td>
                </tr>
            </div>
            <div class="formulario__voto" id="grupo__rut">
                <label>RUT:</label>
                <tr class="formulario__grupo-input">
                    <td>
                        <input class="formulario__input" type="text" name="rut" id="rut">
                    </td>
                </tr>
            </div>
            <div class="formulario__voto" id="grupo__email">
                <label>Email:</label>
                <tr class="formulario__grupo-input">
                    <td>
                        <input class="formulario__input" type="text" name="email" id="email">
                    </td>
                </tr>
            </div>
            <div class="formulario__voto">
                <label>Regi&oacute;n:</labnel>
                    <tr>
                        <?php
                        require('./conexion/con_db.php');

                        $query = "SELECT region_id, region_nombre, region_ordinal FROM regiones";
                        $resultado = $conn->query($query);
                        ?>
                        <td>
                            <select class="select" id="region" name="region">
                                <option value="0">Seleccione Región</option>
                                <?php
                                while ($row = $resultado->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['region_id']; ?>"><?php echo $row['region_nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
            </div>
            <div class="formulario__voto">
                <label>Comuna:</label>
                <tr>
                    <td>
                        <select class="select" name="comuna" id="comuna">
                        </select>
                    </td>
                </tr>
            </div>
            <div class="formulario__voto">
                <label>Candidato:</label>
                <tr>
                    <?php
                    require('./conexion/con_db.php');

                    $query = "SELECT candidato_id, nombre FROM candidatos";
                    $resultado = $conn->query($query);
                    ?>
                    <td>
                        <select class="select" name="candidato" id="candidato">
                            <option value="">Seleccione Candidato</option>
                            <?php
                            while ($row = $resultado->fetch_assoc()) { ?>
                                <option value="<?php echo $row['candidato_id']; ?>"><?php echo $row['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
            </div>
            <div class="formulario__voto">
                <label>Como se enter&oacute; de Nosotros:</label>
                <tr>
                    <td>
                        <input type="checkbox" name="check[]" id="check" value="W"> Web
                        <input type="checkbox" name="check[]" id="check" value="T"> TV
                        <input type="checkbox" name="check[]" id="check" value="R"> Redes Sociales
                        <input type="checkbox" name="check[]" id="check" value="A"> Amigo
                    </td>
                </tr>
            </div>
            <div class="formulario__voto">
                <tr>
                    <td>
                        <input class="votar" type="submit" value="Votar" name="votar">
                    </td>
                </tr>
            </div>
        </form>
    </div>
    <script src="static/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
</body>

</html>
<script language="javascript">
    //Relacion select region-comuna
    $(document).ready(function() {
        $("#region").change(function() {

            $('#comuna').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#region option:selected").each(function() {
                region_id = $(this).val();
                $.post("includes/getComuna.php", {
                    region_id: region_id
                }, function(data) {
                    $("#comuna").html(data);
                });
            });
        })
    });
</script>