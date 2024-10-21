<?php
    Class Informe {
        //atributo
        public $conexion;

        //metodo constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos

        public function consulta() {
            $con = "SELECT p.*, c.nombre AS categoria, pr.nombre AS proveedor FROM informe p 
                    INNER JOIN categoria c ON p.fo_categoria = c.idcategoria 
                    INNER JOIN proveedor pr ON p.fo_proveedor = pr.id_proveedor 
                    ORDER BY p.nombre";
            
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
        
            while ($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
        
            return $vec;
        }
        
        public function eliminar($id) {
            $del = "DELETE FROM informe WHERE id_informe = $id";
            mysqli_query($this->conexion, $del);
            
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El informe ha sido eliminado";
            
            return $vec;
        }

        public function insertar($params) {
            $ins = "INSERT INTO informe(Nombre, fo_categoria, Peso, Estatura, edad, fo_proveedor) 
                    VALUES('$params->Nombre', $params->fo_categoria, $params->Peso, $params->Estatura, $params->edad, $params->fo_proveedor)";
            
            mysqli_query($this->conexion, $ins);
            
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El informe ha sido guardado";
            
            return $vec;
        }

        public function editar($id, $params){
            $editar = "UPDATE informe SET codigo = '$params->codigo', nombre = '$params->nombre', 
            fo_categoria = $params->fo_categoria, precio_compra = $params->precio_compra, 
            peso = $params->peso, estatura = $params->estatura, edad = $params->edad, 
            fo_proveedor = $params->fo_proveedor WHERE id_informe = $id";
            mysqli_query($this->conexion, $editar);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El informe ha sido editado";
            return $vec;
        }
        
        public function filtro($valor){
            $filtro = "SELECT p.*, c.nombre AS categoria, pr.nombre AS proveedor FROM informe p 
            INNER JOIN categoria c ON p.fo_categoria = c.idcategoria 
            INNER JOIN proveedor pr ON p.fo_proveedor = pr.id_prov 
            WHERE p.Nombre LIKE '%$valor%' OR p.nombre LIKE '%$valor%' 
            OR categoria LIKE '%$valor%' OR proveedor LIKE '%$valor%'";
        
            $res = mysqli_query($this->conexion, $filtro);
            $vec = [];
        
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
        
            return $vec;
        }
        

    

    }

    
?>