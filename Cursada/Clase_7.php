<?php


# Polimorfismo
interface Animal
{
    public function hacerSonido();
}


class Perro implements Animal
{
    public function hacerSonido()
    {
        # code logic
        echo 'Guau';
    }
}

class Gato implements Animal
{
    public function hacerSonido()
    {
        # code logic
        echo 'Miau';
    }
}





function animalHacerSonido(Animal $animal)
{
    echo $animal->hacerSonido();
}


animalHacerSonido(new Gato()); // Miau
animalHacerSonido(new Perro()); // guau





// Ejemplo adaptado

interface SqlContructor
{
    public function queryString();
}

class QueryUserConDescuento implements SqlContructor
{
    public $var;
    public function __construct(string $var = null)
    {
        $this->var = $var;
    }

    public function queryString() {}
}

class QueryNewUser implements SqlContructor
{
    public $var;
    public function __construct(string $var = null,)
    {
        # Aca van los condicionales
        $this->var = $var;
    }

    public function queryString()
    {
        $query = 'SELECT ';

        // If the query string
        // ...

        if (TRUE) {
        }

        if (TRUE or FALSE) {
            # code...
        }

        if (TRUE or FALSE) {
            # code...
        }

        if (TRUE or FALSE) {
            # code...
        }

        if (TRUE or FALSE) {
            # code...
        }



        return $query;
    }
}


function getQuery(SqlContructor $query)
{
    return $query->queryString();
}

$queryData1 = getQuery(new QueryUserConDescuento()); // Me devuelve una query para ejecutar en base a condiciones de un usuario
$queryData2 = getQuery(new QueryNewUser()); // Me devuelve una query para ejecutar en base a condiciones de un nuevo usuario. Puede tener o no reglas particulares








































# Expresiones regulares

/**
 *      /...../     Delimita la expresión
 *      ^           indica el inicio de una cadena 
 *      $           indica el termino de una cadena 
 *      .           Coincidencia ambigua
 *      {n,m}
 */


/*  Ejemplos

/^hola$/ coincide exactamente con "hola".
/^\d{3}-\d{2}-\d{4}$/ coincide con un formato de número de seguro social como "123-45-6789".
/^\d{4}-\d{4}-\d{4}-\d{4}$/ coincide con un formato de tarjeta de credito como "1234-1234-1234-1234".

*/

$numero_seguro_social = "123-456-7890";
$patron = "/^[a-B0-9]{3}-\d{3}-\d{4}$/";

if (preg_match($patron, $numero_seguro_social)) {
    echo "El formato del seguro socual es válido.";
} else {
    echo "El formato del seguro socual no es válido.";
}


/*
[a-zA-Z0-9]: Coincide con cualquier letra minúscula, mayúscula o número.
{8}: Especifica que deben ser exactamente 8 caracteres.



^: Comienza al inicio de la cadena.
producto\/: Coincide exactamente con la palabra "producto" seguida de un /. El \ se usa para escapar el carácter /.
\d+: Coincide con uno o más dígitos (0-9).
*/


// preg_match()
// preg_match_all()











function renderTemplate(string $html, array $vars)
{
    $patron = '/\{\{(\w+)\}\}/';

    $htmlResultante = preg_replace_callback($patron, function ($matches) use ($vars) {
        $variableAReemplazar = $matches[1]; // title, username, message
        return isset($vars[$variableAReemplazar]) ? $vars[$variableAReemplazar] : '-';
    }, $html);

    return $htmlResultante;
}


$html = "
    <html>
    <head><title>{{title}}</title></head>
    <body>
        <h1>Bienvenido, {{username}}</h1>
        <p>Este es tu mensaje: {{message}}</p>
        <footer>{{footer}}</footer>
    </body>
    </html>
";

$html = file_get_contents('../EmailTemplate.html');

$footer = file_get_contents('../footer.html');

renderTemplate($html, [
    'title' => 'User Pepe',
    'username' => 'Juan',
    'message' => 'Un mensaje custom',
    'footer' => $footer,
]);




?>



<?php

class RenderForm
{
    public static function run(bool $bool)
    {
        # logic code
        if ($bool) {
?>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

        <?php
        } else {
        ?>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <span class="input-group-text" id="basic-addon2">@example.com</span>
            </div>

            <div class="mb-3">
                <label for="basic-url" class="form-label">Your vanity URL</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4">
                </div>
                <div class="form-text" id="basic-addon4">Example help text goes outside the input group.</div>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                <span class="input-group-text">.00</span>
            </div>

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" placeholder="Server" aria-label="Server">
            </div>

            <div class="input-group">
                <span class="input-group-text">With textarea</span>
                <textarea class="form-control" aria-label="With textarea"></textarea>
            </div>

<?php
        }
    }
}
?>


<?php RenderForm::run($_GET['type_form']) ?>


<?php if ($_GET['type_form']) : ?>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
<?php else: ?>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <span class="input-group-text" id="basic-addon2">@example.com</span>
    </div>

    <div class="mb-3">
        <label for="basic-url" class="form-label">Your vanity URL</label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4">
        </div>
        <div class="form-text" id="basic-addon4">Example help text goes outside the input group.</div>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">$</span>
        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
        <span class="input-group-text">.00</span>
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Username" aria-label="Username">
        <span class="input-group-text">@</span>
        <input type="text" class="form-control" placeholder="Server" aria-label="Server">
    </div>

    <div class="input-group">
        <span class="input-group-text">With textarea</span>
        <textarea class="form-control" aria-label="With textarea"></textarea>
    </div>
<?php endif; ?>


<ul>
    <li class="menu"></li>
    <li class="menu"></li>
    <li class="menu"></li>
    <li class="menu"></li>
    <li class="menu"></li>
    <li class="menu"></li>
    <li class="menu"></li>
    <li class="menu"></li>
    <li class="menu"></li>
</ul>



<?php

$menues = [
    'user',
    'home',
];

if(validar($user, 'perfil')) $menues[] = ['products' => '#products'];
if(validar($user, 'perfil')) $menues[] = ['reporte' => '#products'];
if(validar($user, 'perfil')) $menues[] = ['perfil' => '#products'];
if(validar($user, 'perfil')) $menues[] = ['config' => '#products'];
?>


<ul>
    <?php foreach($menues as $key => $menu): ?>
    <a href="<?= $menu ?>" class="menu"><?= $key ?></li>
    <?php endforeach; ?>
</ul>


<?php for($x = 0; $x < count($menues); $x++): ?>
    
<?php endfor; ?>


<?php while(true): ?>
    
<?php endwhile; ?>



<?php switch(true): ?>
    <?php case 'tes': ?>
<?php endswitch; ?>




<ul>
<?php foreach($list as $item): echo
<<<ITEM
    <li id="itm-$item[number]">Item $item[name]</li>
ITEM;
endforeach; ?>
</ul>