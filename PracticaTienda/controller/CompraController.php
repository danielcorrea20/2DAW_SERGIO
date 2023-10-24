<?php
//PARA PODER USARLAS ANTES DEBO DE TRAER LAS CLASES DE CONTROLLER Y DATOS
require_once 'Controller.php';
require_once 'db/datos.php';
//IMPLEMENTO LA INTERFACE CONTROLLER EN CLIENTECONTROLLER
class CompraController implements Controller
{

    public static function index()
    {
        if (isset($GLOBALS['compras'])) {
            //CREO UNA VARIABLE AUXILIAR PARA CREAR UNA LISTA NUEVA
            $auxList = [];

            //tengo que recoger los id
            $juegos = $GLOBALS['juegos'];
            $clientes = $GLOBALS['clientes'];
            $compras = $GLOBALS['compras'];
            //var_dump($GLOBALS['juegos']);
            //RECORROR COMPRAS Y GUARDO CADA COMPRA EN LA VARIABLE COMPRA
            foreach ($compras as $i => $compra) {
                $auxCompra = $compra;
                //RECORRO LOS CLIENTES Y GUARDO CADA CLIENTE EN LA VARIABLE CLIENTE
                foreach ($clientes as $j => $cliente) {
                    //SI COINCIDEN EL DNI GUARGO EL VALOR NOMBRE DE LA VARIABLE CLIENTE EN LA UAXILIAR DE COMPRA
                    if ($compra['cliente_dni'] == $cliente['dni']) {
                        $auxCompra['nombre'] = $cliente['nombre'];
                    }
                }
                //HAGO LO MISMO PARA JUEGOS SALVO QUE ESTA VEZ DEBE COINCIDIR EL ID
                foreach ($juegos as $k => $tipos) {
                    foreach ($tipos as $j => $tipo) {
                        if ($compra['juego_id'] == $tipo['id']) {
                            $auxCompra['juego'] = $tipo['nombre'];
                        }
                    }
                }
                //FINALMENTE INCORPORO LA VARIABLE AUXILIAR DE COMPRA A LA LISTA AUXILIAR.
                array_push($auxList, $auxCompra);
            }

        }
        //REGRESO AL INDEX DE COMPRA
        include 'view/Compra/index.php';
    }
    public static function create()
    {
        //REGRESO A LA VISTA CREATE DE COMPRA
        include 'view/Compra/Create.php';
    }

    public static function clienteExite($cliente_dni)
    {
        //VARIABLE PARA COMPROBAR SI EL CLIENTE EXISTE
        //var_dump($cliente_dni);
        $clientes = $GLOBALS['clientes'];
        //RECORRO LA LISTA CLIENTE Y SI EL DNI QUE PASO A LA FUNCION COINCIDE CON ALGUN DNI DE LA LISTA CLIENTE
        //ENTONCES ES TRUE Y EXISTE
        foreach ($clientes as $j => $cliente) {
            if ($cliente_dni == $cliente['dni']) {
                return true;
            }
        }
        //DE LO CONTRARIO ES FALSE
        return false;
    }
    public static function juegoExite($juego_id)
    {
        //VARIABLE PARA COMPROBAR QUE EL JUEGO EXISTE
        $juegos = $GLOBALS['juegos'];
        //RECORRO LA LISTA JUEGO Y SI EL ID QUE PASO A LA FUNCION COINCIDE CON ALGUN ID DE LA LISTA JUEGO
        //ENTONCES ES TRUE Y EXISTE
        foreach ($juegos as $j => $item) {
            foreach ($item as $j => $tipo) {
                //var_dump($tipo['id']);
                if ($juego_id == $tipo['id']) {
                    return true;
                }
            }
        }
        //DE LO CONTRARIO ES FALSE
        return false;
    }
    public static function save()
    {

        $compras = $GLOBALS['compras'];
        $auxList = [];
        $esta = false;
        if (isset($_POST)) {
            $compra = array(
                'cliente_dni' => $_POST['cliente_dni'],
                'juego_id' => $_POST['juego_id'],
                'precio' => $_POST['precio'],
                'cantidad' => $_POST['cantidad'],
                'fecha' => $_POST['fecha']
            );
            // var_dump(self::clienteExite($compra['cliente_dni']));
            // var_dump(self::juegoExite($compra['juego_id']));
            //UNA VEZ HE COMPROBADO QUE EL POST EXISTE DEBO COMPROBAR SI EL CLIENTE Y EL JUEGO EXISTE EN LAS LISTAS
            if (self::clienteExite($compra['cliente_dni']) && self::juegoExite($compra['juego_id'])) {
                //SI EN LA LISTA COMPRA EXISTE UN CLIENTE CON EL MISMO JUEGO, EN VEZ DE AÑADIR UNA FILA MÁS AUMENTO EN +1 EL VALOR DE CANTIDAD
                foreach ($compras as $k => $item) {
                    $auxCompra = $item;
                    //SI EL LOS DNI COINCIDEN Y LOS ID DEL JUEGO TAMBIEN ES QUE EL CLIENTE A COMPRADO UN JUEGO QUE YA TENIA.
                    if ($item['cliente_dni'] == $compra['cliente_dni'] && $item['juego_id'] == $compra['juego_id']) {
                        $suma = $item['cantidad'] + 1;
                        $auxCompra['cantidad'] = $suma;

                        $esta = true;
                    }
                    //AÑADO LA FILA CON LA CANTIDAD CORREGIDA A LA LISTA AUXILIAR
                    array_push($auxList, $auxCompra);
                }
                //SI ES LA PRIMERA VEZ QUE EL CLIENTE COMPRA EL JUEGO AÑADO UNA LINEA MAS
                if (!$esta) {
                    array_push($auxList, $compra);
                }
                var_dump($auxList);
                //MENSAJES DE ERROR EN CASO DE QUE NO EXISTA EL JUEGO O EL COMPRADOR
            } else {
                echo ('No existe el cliente o el juego');
            }
        } else {
            echo ('Falta algun dato');

        }
        //NO ME ACTUALIZA LA TABLA PORQUE REGRESO AL INDEX Y ESTE TIEMPO LA ANTIGUA VARIABLE AUXILIAR
        CompraController::index();
    }

    public static function edit($id)
    {
        //RECORRO LA VARIABLE COMPRAS PARA RECOGER LOS VALORES DE LA VARIABLE QUE EUIERO EDITAR
        $compra = null;
        $compras = $GLOBALS['compras'];
        foreach ($compras as $key => $value) {
            if ($key == $id) {
                $compra = $value;
            }
        }
        //REGRESO A LA VISTA EDIT
        include 'view/Compra/edit.php';
    }

    public static function update($id)
    {
        //GUARDO LOS DATOS DEL FORMULARIO EN VARIABLES
        $cliente_dni = $_POST['cliente_dni'];
        $juego_id = $_POST['juego_id'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $fecha = $_POST['fecha'];
        //RECORRO LA COMPRA QUE QUIERO EDITAR Y LE INSERTO LOS NUEVOS DATOS
        foreach ($GLOBALS['compras'] as $key => $value) {
            if ($key == $id) {
                $GLOBALS['compras'][$key]['cliente_dni'] = $cliente_dni;
                $GLOBALS['compras'][$key]['juego_id'] = $juego_id;
                $GLOBALS['compras'][$key]['precio'] = $precio;
                $GLOBALS['compras'][$key]['cantidad'] = $cantidad;
                $GLOBALS['compras'][$key]['fecha'] = $fecha;
            } else {
                $GLOBALS['error'] = "No se encuentra la compra";
            }
        }
        //LLAMO A LA FUNCION INDEX PARA REGRESAR AL INDEX USO :: PORQUE ES UNA FUNCION ESTATICA
        CompraController::index();
    }


    public static function destroy($id)
    {
        //SI EXISTE LA VARIABLE ID QUE PASO A LA FUNCION ACTIVO LA HERRAMIENTA UNSET
        if (array_key_exists($id, $GLOBALS['compras'])) {
            unset($GLOBALS['compras'][$id]);

        } else {
            $GLOBALS['error'] = "No se encuentra el cliente";

        }
        //LLAMO A LA FUNCION INDEX PARA REGRESAR AL INDEX USO :: PORQUE ES UNA FUNCION ESTATICA
        CompraController::index();

    }


}


?>