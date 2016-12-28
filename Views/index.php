<?php 
    include('frames/menus.php');
    include('../Bussiness/usuarios.php');
    include('header.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inicio - Twins</title>
</head>
<body>

    <br/>
    <div id="wrapper">
        <div class="container-fluid">
            <div class="row">
                <!-- Contenido del menú, Copiar esto en cada página ya que no existe la masterpage aquí :c -->
                <div class="col col-lg-3 hidden-md-down">
                    <?php menuLateralIzquierdo(); ?>
                </div>
                <div class="col col-lg-9" style="max-height: 1500px; overflow: auto;"> <!-- style="max-height: 700px; overflow: auto;" -->
                    <div class="row">
                        <div class="col-xs-12 ">
                            <div class="card card-faded">
                                <h4 class="card-header card-secondary" >
                                    <center><strong>Busca nuevos amigos</strong></center>
                                </h4>
                                <div class="card-block">
                                    <div class="row">
                                        <form action="index.php" method="POST">
                                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                                <center><strong>Edad</strong></center><br/>
                                                <div id="slider"></div>
                                                <table width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <?php  

                                                                if(isset($_REQUEST['hdnEdadLower']))
                                                                {
                                                                    echo '<td align="left"><span id="slider-snap-value-lower">'.$_REQUEST['hdnEdadLower'].'</span></td>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<td align="left"><span id="slider-snap-value-lower">18</span></td>';
                                                                }

                                                                if(isset($_REQUEST['hdnEdadUpper']))
                                                                {
                                                                    echo '<td align="right"><span id="slider-snap-value-upper">'.$_REQUEST['hdnEdadUpper'].'</span></td>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<td align="right"><span id="slider-snap-value-upper">100</span></td>';
                                                                }

                                                            ?>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <?php  

                                                    if(isset($_REQUEST['hdnEdadLower']))
                                                    {
                                                        echo '<input type="hidden" name="hdnEdadLower" id="hdnEdadLower" value="'.$_REQUEST['hdnEdadLower'].'">';
                                                    }
                                                    else
                                                    {
                                                        echo '<input type="hidden" name="hdnEdadLower" id="hdnEdadLower" value="18">';
                                                    }

                                                    if(isset($_REQUEST['hdnEdadUpper']))
                                                    {
                                                        echo '<input type="hidden" name="hdnEdadUpper" id="hdnEdadUpper" value="'.$_REQUEST['hdnEdadUpper'].'">';
                                                    }
                                                    else
                                                    {
                                                        echo '<input type="hidden" name="hdnEdadUpper" id="hdnEdadUpper" value="100">';
                                                    }

                                                ?>
                                                <script type="text/javascript">
                                                    var handlesSlider = document.getElementById('slider');
                                                    <?php 
                                                        if(isset($_REQUEST['hdnEdadLower']) && isset($_REQUEST['hdnEdadUpper']))
                                                        {
                                                            echo 
                                                                'noUiSlider.create(slider, {
                                                                    start: ['.$_REQUEST['hdnEdadLower'].', '.$_REQUEST['hdnEdadUpper'].'],
                                                                    connect: true,
                                                                    step: 1,
                                                                    range: {
                                                                        "min": 18,
                                                                        "max": 100
                                                                    }
                                                                });';
                                                        }
                                                        else
                                                        {
                                                            echo 
                                                                'noUiSlider.create(slider, {
                                                                    start: [18, 100],
                                                                    connect: true,
                                                                    step: 1,
                                                                    range: {
                                                                        "min": 18,
                                                                        "max": 100
                                                                    }
                                                                });';
                                                        }

                                                    ?>


                                                    var snapValues = [
                                                        document.getElementById('slider-snap-value-lower'),
                                                        document.getElementById('slider-snap-value-upper')
                                                    ];

                                                    slider.noUiSlider.on('update', function( values, handle ) {
                                                        snapValues[handle].innerHTML = parseInt(values[handle]) + ' años';
                                                        document.getElementById("hdnEdadLower").value = parseInt(values[0]);
                                                        document.getElementById("hdnEdadUpper").value = parseInt(values[1]);

                                                    });
                                                </script>
                                            </div>
                                        
                                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                                <center><strong>Foto Perfil</strong></center><br/>
                                                <center><label class="c-input c-checkbox">
                                                <?php  

                                                    if(isset($_REQUEST['chkFotoPerfil']))
                                                    {
                                                        echo '<input type="checkbox" name="chkFotoPerfil" checked="true">';
                                                    }
                                                    else
                                                    {
                                                        echo '<input type="checkbox" name="chkFotoPerfil">';
                                                    }

                                                ?>
                                                  <span class="c-indicator"></span>
                                                  Si ?
                                                </label></center>

                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                <center><strong>Busco</strong></center><br/>
                                                <center>
                                                <select name="ddlBusco" class="form-control">
                                                <?php  

                                                    if(isset($_REQUEST['ddlBusco']))
                                                    {
                                                        if($_REQUEST['ddlBusco'] == 1)
                                                        {
                                                            echo    '<option value="1" selected="true">Hombres</option>'.
                                                                    '<option value="2">Mujeres</option>'.
                                                                    '<option value="3">Ambos</option>';
                                                        }
                                                        else if ($_REQUEST['ddlBusco'] == 2)
                                                        {
                                                            echo    '<option value="1">Hombres</option>'.
                                                                    '<option value="2" selected="true">Mujeres</option>'.
                                                                    '<option value="3">Ambos</option>';
                                                        }
                                                        else if ($_REQUEST['ddlBusco'] == 3)
                                                        {
                                                            echo    '<option value="1">Hombres</option>'.
                                                                    '<option value="2">Mujeres</option>'.
                                                                    '<option value="3" selected="true">Ambos</option>';
                                                        }       
                                                    }
                                                    else
                                                    {
                                                        echo    
                                                                '<option value="1">Hombres</option>
                                                                <option value="2">Mujeres</option>
                                                                <option value="3" selected="true">Ambos</option>';
                                                    }

                                                ?>
                                                </select>
                                                </center>

                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                            <br/>
                                                <center> <input type="submit" name="btnFiltrar" class="btn btn-success" value="Filtrar"> </center>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 

                        // primero defino las variables por defecto
                        $edadLower = 18; //edad minima
                        $edadUpper = 100; //edad máxima

                        $fotoPerfil = 0; // si es false, trae las que tiene y las que no

                        $sexo = 3; // ambos sexos

                        if(isset($_REQUEST['hdnEdadLower']))
                        {
                            $edadLower = $_REQUEST['hdnEdadLower'];
                            $edadUpper = $_REQUEST['hdnEdadUpper'];

                            if(isset($_REQUEST['chkFotoPerfil']))
                            {
                                $fotoPerfil = 1;
                            }
                            else
                            {
                                $fotoPerfil = 0;
                            }

                            $sexo = $_REQUEST['ddlBusco'];
                        }


                        obtenerUsuariosRegistrados($edadLower, $edadUpper, $fotoPerfil, $sexo); 

                    ?>
                    
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<?php include('footer.php'); ?>