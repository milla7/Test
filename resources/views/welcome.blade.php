<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <title>API - Test Netwey</title>
    <meta http-equiv="cleartype" content="on">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/hightlightjs-dark.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.8.0/highlight.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,500|Source+Code+Pro:300" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" media="all">
    <script>hljs.initHighlightingOnLoad();</script>
</head> 

<body>
<div class="left-menu">
    <div class="content-logo">
        <img  src="https://www.gdalab.com/wp-content/uploads/2021/09/cropped-Logo-GDALAB-Pequeno-226x63.png" />
    </div>
    <div class="content-menu">
        <ul>
            <li class="scroll-to-link active" data-target="introduccion">
                <a>Introducción</a>
            </li>
            <hr>
            <li class="scroll-to-link" data-target="login">
                <a>Login</a>
            </li>
            <li class="scroll-to-link" data-target="logout">
                <a>Logout</a>
            </li>
            <hr>
            <li class="scroll-to-link" data-target="create">
                <a>Create Customer</a>
            </li>
            <li class="scroll-to-link" data-target="find">
                <a>Find Customer</a>
            </li>
            <li class="scroll-to-link" data-target="delete">
                <a>Delete Customer</a>
            </li>
        </ul>
    </div>
</div>
<div class="content-page">
    <div class="content-code"></div>
    <div class="content">
        <div class="overflow-hidden content-section" id="content-introduccion">
            <h2 id="introduccion">Introducción</h2>
            <pre>
    Base URL

        http://localhost:8000/api/
                </pre>
            <p>
               API REST. Esta API tiene URLs predecibles, orientados a recursos y utiliza códigos de respuesta de HTTP para indicar el estado de la respuesta. Un objeto JSON es devuelto en todas las respuestas del API, incluidos los errores, aunque el API convierte la respuesta en objetos apropiados.</p>
            <p>
            1: Todos los request deben contener en el encabezado Authorization: Bearer <br>
            2:  ESTE TOKEN SE CREA LUEGO QUE INICIA SESION POR CADA USUARIO</p>
        </div>
        <div class="overflow-hidden content-section" id="content-login">
            <h2 id="login">Iniciar Sesión</h2>
            <pre><code class="bash">
# Petición
curl \
-X POST https://localhost:8000/api/login \
-F 'email=joanmilla21@gmail.com' \
-F 'clave=234975' \
                </code></pre>
            <p>
                Petición POST:<br>
                <code class="higlighted">https://localhost:8000/api/login</code>
            </p>
            <br>
            <pre><code class="json">
Respuesta Success Usuario:

{
    "success": false,
    "errors": {
        "email": [
            "The email field is required."
        ],
        "password": [
            "The password field is required."
        ]
    }
}

Respuesta Error:

{
    "success": false,
    "errors": {
        "password": [
            "the password is incorrect"
        ]
    }
}

                </code></pre>
            <h4>PARAMETROS</h4>
            <table>
                <thead>
                <tr>
                    <th>Parámetro</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Requerido</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>email</td>
                    <td>String</td>
                    <td>Correo electrónico del Usuario.</td>
                    <td>SI</td>
                </tr>
                <tr>
                    <td>password</td>
                    <td>String</td>
                    <td>Clave del Usuario.</td>
                    <td>SI</td>
                </tr>
                
               
                </tbody>
            </table>
        </div>



<div class="overflow-hidden content-section" id="content-logout">
    <h2 id="logout">Logout Usuario</h2>
    <pre><code class="bash">
# Petición
curl \
POST https://localhost:8000/api/logout \
-F 'id=1' \
        </code>
    </pre>
    <p>
        Petición POST:<br>
        <code class="higlighted">https://localhost:8000/api/logout</code>
    </p>
    <br>
    <pre>
        <code class="json">
Respuesta Success:
{
    "success": true,
    "data": "the user has logged out."
}

Respuesta Error:
{
    "success": false,
    "errors": {
        "id": [
            "The id field is required."
        ]
    }
}

        </code>
    </pre>
    <h4>PARAMETROS</h4>
            <table>
                <thead>
                <tr>
                    <th>Parámetro</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Requerido</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>id</td>
                    <td>String</td>
                    <td>Id del Usuario.</td>
                    <td>SI</td>
                </tr>               
                </tbody>
            </table>
        </div>

<div class="overflow-hidden content-section" id="content-create">
    <h2 id="create">Create Customer</h2>
    <pre><code class="bash">
# Petición
curl \
POST https://localhost:8000/api/create-customer \
-F 'dni=24636782' \
-F 'email=joanmilla21@gmail.com' \
-F 'name=Joan' \
-F 'last_name=Milla' \
-F 'address=Caracas, 23 de enero' \
-F 'id_reg=1' \
-F 'id_com=1' \
        </code>
    </pre>
    <p>
        Petición POST:<br>
        <code class="higlighted">https://localhost:8000/api/create-customer</code>
    </p>
    <br>
    <pre>
        <code class="json">
Respuesta Success:
{
    "success": true,
    "data": "the customer has created."
}

Respuesta Error:
{
    "success": false,
    "errors": {
        "dni": [
            "The dni field is required."
        ],
        "email": [
            "The email field is required."
        ],
        "name": [
            "The name field is required."
        ],
        "last_name": [
            "The last name field is required."
        ],
        "id_reg": [
            "The id reg field is required."
        ],
        "id_com": [
            "The id com field is required."
        ]
    }
}

        </code>
    </pre>
    <h4>PARAMETROS</h4>
            <table>
                <thead>
                <tr>
                    <th>Parámetro</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Requerido</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>dni</td>
                        <td>Number</td>
                        <td>Dni del Usuario.</td>
                        <td>SI</td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td>String</td>
                        <td>Email del Usuario.</td>
                        <td>SI</td>
                    </tr>
                    <tr>
                        <td>name</td>
                        <td>String</td>
                        <td>Nombre del Usuario.</td>
                        <td>SI</td>
                    </tr>
                    <tr>
                        <td>last_name</td>
                        <td>String</td>
                        <td>Apellido del Usuario.</td>
                        <td>SI</td>
                    </tr>
                    <tr>
                        <td>address</td>
                        <td>String</td>
                        <td>Dirección del Usuario.</td>
                        <td>NO</td>
                    </tr>
                    <tr>
                        <td>id_reg</td>
                        <td>String</td>
                        <td>Id de la region del Usuario.</td>
                        <td>SI</td>
                    </tr>
                    <tr>
                        <td>id_com</td>
                        <td>String</td>
                        <td>Id de la comuna del Usuario.</td>
                        <td>SI</td>
                    </tr>

                </tbody>
            </table>
        </div>






<div class="overflow-hidden content-section" id="find">
    <h2 id="find">Find Customer</h2>
    <pre><code class="bash">
# Petición
curl \
POST https://localhost:8000/api/find-customer \
-F 'search=24636782' \
        </code>
    </pre>
    <p>
        Petición POST:<br>
        <code class="higlighted">https://localhost:8000/api/find-customer </code>
    </p>
    <br>
    <pre>
        <code class="json">
Respuesta Success:
{
    "success": true,
    "data": {
        "costumer": {
            "name": "joan",
            "last_name": "milla",
            "address": null,
            "region_description": "Region 1",
            "commune_description": "Comuna 1"
        }
    }
}
Respuesta Error:
{
    "success": false,
    "errors": {
        "search": [
            "The search field is required."
        ]
    }
}

        </code>
    </pre>
    <h4>PARAMETROS</h4>
            <table>
                <thead>
                <tr>
                    <th>Parámetro</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Requerido</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>search</td>
                    <td>String</td>
                    <td>Parametro para buscar el cliente por dni o por email.</td>
                    <td>SI</td>
                </tr>               
                </tbody>
            </table>
        </div>




<div class="overflow-hidden content-section" id="content-delete">
    <h2 id="delete">Delete Customer</h2>
    <pre><code class="bash">
# Petición
curl \
POST https://localhost:8000/api/delete-customer \
-F 'dni=1' \
        </code>
    </pre>
    <p>
        Petición POST:<br>
        <code class="higlighted">https://localhost:8000/api/delete-customer</code>
    </p>
    <br>
    <pre>
        <code class="json">
Respuesta Success:
{
    "success": true,
    "data": "the user has logged out."
}

Respuesta Error:
{
    "success": false,
    "errors": {
        "id": [
            "The id field is required."
        ]
    }
}

        </code>
    </pre>
    <h4>PARAMETROS</h4>
            <table>
                <thead>
                <tr>
                    <th>Parámetro</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Requerido</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>dni</td>
                    <td>String</td>
                    <td>Dni del cliente.</td>
                    <td>SI</td>
                </tr>               
                </tbody>
            </table>
        </div>
</div>

        
</div>

</div>        
<div class="content-code"></div>
</div>
<script src="js/script.js"></script>
</body>
</html>