<?php
//PARA PODER USARLAS ANTES DEBO DE TRAER LAS CLASES DE CONTROLLER Y DATOS
require_once 'Controller.php';
require_once 'db/datos.php';
//IMPLEMENTO LA INTERFACE CONTROLLER EN CLIENTECONTROLLER

class JuegoController implements Controller
{

    public static function index()
    {
        if (isset($GLOBALS['juegos'])) {
            $juegoTabla[] = null;
            //MUESTRO LA LISTA DE JUEGOS
            $juegos = $GLOBALS['juegos'];
        }

        include 'view/Juegos/index.php';
    }

    public static function filter()
    {
        //USO LA FUNCION FILTER PARA PODER FILTRAR LOS JUEGOS SEGUN SU TIPO (ACCION, AVENTURA O DEPORTE)
        if (isset($_GET['tipo'])) {
            $juegos = array(
                //RECOJO DE LA URL EL TIPO DEL JUEGO Y LA GUARDO 
                $_GET['tipo'] => $GLOBALS['juegos'][$_GET['tipo']]
            );
        }
        include 'view/Juegos/index.php';
    }

    public static function create()
    {
        //ME CONDUCE A LA VISTA CREATE DE JUEGOS
        include 'view/Juegos/Create.php';
    }
    public static function save()
    {

        if (isset($_POST)) {
            //UNA VEZ QUE COMPRUEBO QUE EXISTE UN POST GUARDO LOS DATOS EN UNA VARIABLE QUE ES UN ARRAY
            $juegos =
                array(
                    'id' => $_POST['Id'],
                    'nombre' => $_POST['Nombre'],
                    'descripcion' => $_POST['descripcion'],
                    'stock' => $_POST['stock'],
                    'precio' => $_POST['precio']
                );
            //DIVIDO EL ARRAY DE JUEGOS EN TRES PARTES, EL MISMO NUMERO QUE LOS TIPOS
            $accion = $GLOBALS['juegos']['Accion'];
            $aventura = $GLOBALS['juegos']['Aventura'];
            $deportes = $GLOBALS['juegos']['Deportes'];
            //RECOJO EL VALOR DE TIPO DE LA URL
            $item = $_POST['tipo'];
            //CON UN SWITCH COMPARO LOS DISTINTOS TIPOS Y AGREGO EL JUEGO A SU LISTA CORRESPONDIENTE
            switch ($item) {
                case 'Accion':
                    array_push($accion, $juegos);
                case 'Aventura':
                    array_push($aventura, $juegos);
                case 'Deportes':
                    array_push($deportes, $juegos);
                default:
                    "No existe esa categoría";
            }
            //FINALMENTE UNO TODAS LAS LISTAS DE JUEGOS EN UNA GLOBAL
            //var_dump($item);
            //var_dump($aventura);
            $GLOBALS['juegos'] = array(
                'Accion' => $accion,
                'Aventura' => $aventura,
                'Deportes' => $deportes
            );
            //var_dump($GLOBALS['juegos']);
            //var_dump($GLOBALS['juegos'][$_POST['tipo']]);
            //exit();


            //array_push($GLOBALS['juegos']['tipo'], $juego2);
            //array_push($GLOBALS['juegos'][$i][$j], $juego2);
            //los troce y desp lo uno.

        }
        //var_dump($GLOBALS['juegos'][$i][$j]);

        //REGRESO A LA VISTA INDEX USANDO LA FUNCION INDEX
        JuegoController::index();

    }
    public static function destroy($id)
    {
        //RECORRO LA LISTA DE JUEGOS HASTA LLEGAR AL ID Y SI ESTE COINCIDE CON EL QUE LE PASO LO BORRO
        foreach ($GLOBALS['juegos'] as $i => $tipos) {
            foreach ($tipos as $j => $juego) {
                if ($juego['id'] == $id) {
                    //var_dump($tipos);
                    //var_dump($GLOBALS['juegos'][$i][$j]);

                    //EL BORRADO ES POR EL INDICE DEL ARRAY o por el elemento en si.

                    unset($GLOBALS['juegos'][$i][$j]);
                    //var_dump($tipos);
                    // ME QUITA DE TIPOS EL ELEMENTO CORRECTAMENTE PERO DESPUES HAY QUE ASIGNARLO A $GLOBALS['juegos']  */
                }

            }
        }
        //REGRESO A LA VISTA INDEX USANDO LA FUNCION INDEX
        JuegoController::index();
    }

    public static function edit($id)
    {
        $juego = null;

        $juegos = $GLOBALS['juegos'];
        //var_dump($GLOBALS['juegos']);

        //RECORRO LA LISTA DE LOS JUEGOS DEL TIPO EN CONCRETO QUE QUIERO EDITAR
        //AL SER TRES ARRAY COMPRATEN LOS INDICES DEBO ESPECIFICAR EL TIPO DEL JUEGO PARA PODER CONSEGUIR SOLO UNO.
        foreach ($GLOBALS['juegos'][$_GET['tipo']] as $i => $tipos) {
            //var_dump($GLOBALS['juegos'][$_GET['tipo']][$i]['id']);
            //var_dump($id);
            //SI DENTRO DE LA LISTA POR TIPOS COINNCIDEN EL ID OBTENGO EL JUEGO QUE QUIERO EDITAR Y GUARDO SUS VALORES
            if ($GLOBALS['juegos'][$_GET['tipo']][$i]['id'] == $id) {
                $juego = $tipos;
                //var_dump($juego);
            }
        }
        //REGRESO A LA VISTA EDIT
        //var_dump($j);
        include 'view/juegos/edit.php';
    }

    public static function Update($id)
    {
        //GUARDO LOS DATOS QUE RECOJO DEL FORMULARIO EN VARIABLES
        $juegos = $GLOBALS['juegos'];
        $nombre = $_POST['Nombre'];
        $descripcion = $_POST['descripcion'];
        $stock = $_POST['stock'];
        $precio = $_POST['precio'];
        //var_dump($stock);
        //RECORRO LOS JUEGOS HASTA LLEGAR A LOS ID Y SI ESTOS COINCIDEN MODIFICO LOS DATOS
        foreach ($juegos as $key => $value) {
            //var_dump($GLOBALS['juegos'][$key]);
            foreach ($value as $i => $tipos) {
                //var_dump($tipos['id']);
                if ($tipos['id'] == $id) {
                    $GLOBALS['juegos'][$key][$i]['id'] = $id;
                    $GLOBALS['juegos'][$key][$i]['nombre'] = $nombre;
                    $GLOBALS['juegos'][$key][$i]['descripcion'] = $descripcion;
                    $GLOBALS['juegos'][$key][$i]['stock'] = $stock;
                    $GLOBALS['juegos'][$key][$i]['precio'] = $precio;
                    //var_dump($tipos['id'] == $id);
                    //var_dump($GLOBALS['juegos'][$key]);
                    //GUARDO LOS CAMBIOS EN LA VARIABLE GLOBAL ANTES DE SALIR
                    $juegos = $GLOBALS['juegos'];
                }
            }
        }
        //var_dump($juegos);
        //exit();
        //REGRESO A LA VISTA EDIT DE JUEGOS
        include 'view/juegos/index.php';
    }

}
?>