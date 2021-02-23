<?php

namespace lista;

class consultas
{
    public $nombre, $descripcion, $fecha, $hora;

    public function registrar()
    {
        $conexion = new conexion();
        $consulta = mysqli_prepare($conexion->conex, "INSERT INTO listado (NOMBRE,DESCRIPCION,FECHA,HORA) VALUES (?,?,?,?)");
        $consulta->bind_param("ssss", $this->nombre, $this->descripcion, $this->fecha, $this->hora);
        $consulta->execute();
        ?>
        <script>
            window.location = "http://localhost/CRUD_listaTareas/index.php?controller=sistema&action=tabla";
        </script>

        <?php
    }
    public function eliminaTarea($id)
    {
        $conexion = new conexion();
        $consulta = mysqli_prepare($conexion->conex, "DELETE FROM listado WHERE ID = ?");
        $consulta->bind_param("s", $id);
        $consulta->execute();
        ?>
        <script>
            window.location = "http://localhost/CRUD_listaTareas/index.php?controller=sistema&action=tabla";
        </script>

        <?php
    }
    public function actualizar($id){

        $conexion = new conexion();
        $consulta = mysqli_prepare($conexion->conex,"UPDATE listado SET NOMBRE = ?, DESCRIPCION = ?, FECHA = ?, HORA = ? WHERE ID = ?");
        $consulta->bind_param("sssss", $this->nombre, $this->descripcion, $this->fecha, $this->hora,$id);
        $consulta->execute();
        ?>
        <script>
            window.location = "http://localhost/CRUD_listaTareas/index.php?controller=sistema&action=tabla";
        </script>

        <?php
    }
    public function verTodo(){
        $conexion = new conexion();
        $consulta = "SELECT * FROM listado";
        $resultado = mysqli_query($conexion->conex,$consulta);
       ?>
        <form class="formulario" method="POST" action="http://localhost/CRUD_listaTareas/index.php?controller=sistema&action=crearTarea">
            <table class="table-registro">
                <tr>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>Hora</th>

                </tr>
                <tr>
                    <td>
                        <input type="text" name="titulo" class="centrar-texto" placeholder="Titulo" required>
                    <td>
                        <input type="text" name="descripcion" class="centrar-texto" placeholder="Descripcion" required>
                    </td>
                    <td>
                        <input type="date" name="fecha" class="centrar-texto" value="<?php echo $_SESSION["hoy"] = date("Y - n - j");   ?>">
                    </td>
                    <td>
                        <input type="time" name="hora" class="centrar-texto" required>
                    </td>
                </tr>
            </table>
            <input type="submit"  value="Agregar nuevo" class="boton">
        </form>
            <table >
    <tr >
<th style="border-bottom: 1px solid black">ID</th>
        <th style="border-bottom: 1px solid black">Nombre</th>
        <th style="border-bottom: 1px solid black">Descripcion</th>
        <th style="border-bottom: 1px solid black">Fecha</th>
        <th style="border-bottom: 1px solid black">Hora</th>
    </tr>

    <?php
    while ($filas = mysqli_fetch_array($resultado)){?>
        <tr>
        <td style="border-bottom: 1px solid black">
            <?php echo $filas[0]; ?>
        </td>
        <td style="border-bottom: 1px solid black">
            <?php echo $filas[1]; ?>
        <td style="border-bottom: 1px solid black">
                <?php echo $filas[2]; ?>
        </td>
        <td style="border-bottom: 1px solid black">
           <?php echo $filas[3]; ?>
        </td>
            <td style="border-bottom: 1px solid black">
                <?php echo $filas[4]; ?>
            </td>

        </tr>
<?php
    }
    ?>
</table>

        <h3 class="centrar-texto">Actualizar algun registro</h3>
        <form class="formulario" method="POST" action="http://localhost/CRUD_listaTareas/index.php?controller=sistema&action=actualizar">
            <label>Ingrese el ID a editar</label>
            <input type="number" size="3" name="id_ac">

            <table class="table-registro">
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                </tr>

                <tr>
                    <td>
                        <input type="text" name="titulo_ac" class="centrar-texto" placeholder="Titulo" required>
                    <td>
                        <input type="text" name="descripcion_ac" class="centrar-texto" placeholder="Descripcion" required>
                    </td>
                    <td>
                        <input type="date" name="fecha_ac" class="centrar-texto" value="<?php echo date("Y - n - j");   ?>" >
                    </td>
                    <td>
                        <input type="time" name="hora_ac" value="12:30">
                    </td>
                </tr>
            </table>
            <input type="submit" value="editar" class="boton-rojo"><br>
        </form>
        <h3 class="centrar-texto">Eliminar algun registro</h3>
        <form class="formulario" method="POST" action="http://localhost/CRUD_listaTareas/index.php?controller=sistema&action=eliminar">
            <label>Ingrese el ID a eliminar</label>
            <input type="number"size="3" name="id_el">
            <input type="submit" value="eliminar" class="boton-rojo">
        </form>
<?php
        }
        public function ordenarID(){
        $conexion = new conexion();
        $consulta1 = "CALL ordenarID1();";
        $consulta2 = "CALL ordenarID2();";
        $consulta3 = "CALL ordenarID3();";
        $consulta4 = "CALL ordenarID4();";
        mysqli_query($conexion->conex,$consulta1);
        mysqli_query($conexion->conex,$consulta2);
        mysqli_query($conexion->conex,$consulta3);
        mysqli_query($conexion->conex,$consulta4);
        }
}
?>

