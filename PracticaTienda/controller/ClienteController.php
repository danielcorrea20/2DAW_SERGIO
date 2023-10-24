<?php
//PARA PODER USARLAS ANTES DEBO DE TRAER LAS CLASES DE CONTROLLER Y DATOS
require_once 'Controller.php';
require_once 'db/datos.php';
//IMPLEMENTO LA INTERFACE CONTROLLER EN CLIENTECONTROLLER
class ClienteController implements Controller
{

    public static function index()
    {
        if (isset($GLOBALS['clientes'])) {
            //CLASE PARA CONTROLAR TODAS LAS ACCIONES REFERIDAS A LOS CLIENTES
            $clientes = $GLOBALS['clientes'];
            //SI EXISTE LA ORDEN Y ESTA ES DES, ACTIVARA EL REVERSO. SINO SE MANTENDRA EN ORDEN
            if (isset($_GET['orden'])) {
                if ($_GET['orden'] == 'des') {
                    $clientes = array_reverse($GLOBALS['clientes']);
                }
            }
            //RETORNO A LA VISTA INDEX DE CLIENTE
            include 'view/cliente/index.php';
        }
    }
    public static function create()
    {
        //RETORNO A LA VISTA CREATE DE CLIENTE
        include 'view/Cliente/Create.php';
    }
    public static function save()
    {
        //METODO PARA GUARDAR UN NUEVO ITEM SIEMPRE QUE EXITA EL POST
        if (isset($_POST)) {
            //CREO UNA ARRAY LLAMADO CLIENTE PARA RELLENAR LOS DATOS
            $Cliente = array(
                'nombre' => $_POST['Nombre'],
                'dni' => $_POST['DNI'],
                'telefono' => $_POST['Telefono'],
                'correo' => $_POST['Correo']
            );
            //CON ARRAY_PUSH LOS METO EN LA LISTA
            array_push($GLOBALS['clientes'], $Cliente);
        } else {
            echo ('Falta algun dato');

        }
        //LALAMO A LA FUNCION INDEX QUE ME RETORNA A LA VISTA INDEX. USO :: PORQUE ES UN METODO ESTATICO.
        ClienteController::index();

    }
    public static function edit($id)
    {
        //FUNCION PARA PODER RETORNAR A LA VISTA EDIT
        $cliente = null;
        $clientes = $GLOBALS['clientes'];
        //RECORRO LA VARIABLE CLIENTE Y COMPRUEBO QUE LA $KEY DE LA LISTA = AL $ID QUE LE PASO A LA FUNCION
        //SI ES ASI GUARDO EL VALOR EU UNA VARIABLE PARA PODERLA PINTAR EN EL FORMULARIO,
        foreach ($clientes as $key => $value) {
            if ($key == $id) {
                $cliente = $value;
            }
        }
        //RETORNO A LA VISTA EDIT
        include 'view/cliente/edit.php';

    }

    public static function Update($id)
    {
        //FUNCION PARA REALIZAR LE EDICION DE DATOS
        //CON EL POST RECOJO TODOS LOS DATOS DEL FORMULARIO Y LO GUARDO EN VARIABLES
        $nombre = $_POST['Nombre'];
        $dni = $_POST['DNI'];
        $telefono = $_POST['Telefono'];
        $correo = $_POST['Correo'];

        //RECORRO LA LISTA HASTA QUE ENCUENTRA EL ID QUE LE HE PASADO, UNA VEZ ENCONTRADO REASSIGNO LOS VALORES.

        foreach ($GLOBALS['clientes'] as $key => $value) {
            if ($key == $id) {
                $GLOBALS['clientes'][$key]['nombre'] = $nombre;
                $GLOBALS['clientes'][$key]['dni'] = $dni;
                $GLOBALS['clientes'][$key]['telefono'] = $telefono;
                $GLOBALS['clientes'][$key]['correo'] = $correo;
            } else {
                $GLOBALS['error'] = "No se encuentra el cliente";
            }
        }
        //LLAMO A LA FUNCION INDEX PARA RETORNAR LA VISTA INDEX
        ClienteController::index();

    }

    public static function destroy($id)
    {
        //FUNCION PARA BORRAR UNA LINEA
        //SI EL  $ID EXISTE USO UNSET PARA BORRARLO
        if (array_key_exists($id, $GLOBALS['clientes'])) {
            unset($GLOBALS['clientes'][$id]);

        } else {
            $GLOBALS['error'] = "No se encuentra el cliente";

        }
        //LLAMO A LA FUNCION INDEX PARA RETORNAR LA VISTA INDEX
        ClienteController::index();
    }
}
?>