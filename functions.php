
<?php
function showHome(){
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Figuras</title>
    </head>
    <body>
        <h1> HOME </h1>

        <h1>Figuras</h1>

        <a href="list">Ver todas las figuras geométricas</a>


        <h4> <h4>
        <form id="form-area" method="GET">
            <label for="area">Buscar figuras con área menor a: </label>
            <input type="number"  name="area" placeholder="Introduzca área...">
            <button type="submit">Buscar</button>
        </form>
        <div id="area"> </div>
        <script src="ajax.js"></script>
        
    </body>
    </html>
    ';
}

function showFiltro($area){

    require_once 'lib/Figuras.php';
    require_once 'lib/AreaFilter.php';
   
    echo "<h1> FILTRO.PHP </h1>";

    $figuras = new Figuras();

    echo "Las figuras con area menor a $area son:<ul>";
    foreach($figuras->getBy(new AreaFilter($area)) as $figura) {
        echo "<li>" . 
                $figura->ToString() . 
                " | <a href='verFigura/". $figura->getId() . "'>VER </a>" .
            "</li>";
    }
    echo "
        </ul>
        <a href='./'>Volver</a>";
}



function showList(){
    require_once 'lib/Figuras.php';
    // instancia la clase Figuras para acceder a las figuras
    $figuras = new Figuras();
    echo "<h1> LISTA </h1>";

    echo 
    "<h1>Listado de figuras</h1>
        <ul>";

    foreach($figuras->getAll() as $figura) {
        echo "<li>" . 
                $figura->ToString() . 
                " | <a href='verFigura/" . $figura->getId() . "'>VER </a>" .
            "</li>";
    }

    echo "
        </ul>
        <a href='./'>Volver</a>";

}
function showFiguras($paramsURL){
    require_once 'lib/Figuras.php';

    // instancia la clase Figuras para acceder a las figuras
    $figuras = new Figuras();

    // obtiene la figura según el ID pasado como parámetro
    $id = $paramsURL;
    $figura = $figuras->get($id);

    // imprime el detalle de la figura
    echo 
        "<ul>
            <li><strong>ID: </strong>" . $figura->getId() . "</li>
            <li><strong>Tipo: </strong>" . $figura->getName() . "</li>
            <li><strong>Perímetro: </strong>" . $figura->getPerimetro() . "</li>
            <li><strong>Área: </strong>" . $figura->getArea() . "</li>
        </ul>";
}
?>