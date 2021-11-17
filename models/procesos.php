<?php 
    class Procesos
    {
        /* Modelo para realizar CRUD a cualquier tabla de la BD */
        public function isdu($query,$tipo) // i->Insert / s-> Select / d-> Delete / u-> Update
        {
            $rows = null;
            $modelo = new ConexionBD();
            $conexion = $modelo->get_conexion();
            $stm = $conexion->prepare($query);

            if($tipo == "s")
            {
                $stm->execute();

                while ($result = $stm->fetch())
                {
                        $rows[] = $result;
                }
                return $rows;
            }
            else
            {
                if (!$stm) {
                    return 0;
                } else {
                    $stm->execute();
                    return 1;
                }
            }
        }

        /* Modelo para contar registros*/
        public function row_data($query)
        {
            $modelo = new ConexionBD();
            $conexion = $modelo->get_conexion();
            $stmt = $conexion->query($query);
            $num_rows= $stmt->rowCount();
            return $num_rows;
        }

        /* Busca valor de X tabla*/
        public function BuscaValor($tabla, $campo, $condicion)
        {
            $rows = NULL;
            $modelo = new ConexionBD();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT $campo FROM $tabla WHERE $condicion";
            $stm = $conexion->prepare($sql);
            $stm->execute();
            while ($result = $stm->fetch())
            {
                $rows[] = $result;
            }
            return $rows;
        }
    }
?>