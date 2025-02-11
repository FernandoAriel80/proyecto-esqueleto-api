# Proyecto Esqueleto api

Es un proyecto de estructura para desarrollar api rests con un entorno mas estructurado y fácil de usar, esta inspirado en en framework [Laravel](https://laravel.com/), pero con orientación únicamente a api rests, para un trabajo mas ligero y único. 

Nació como una necesidad propia para desarrollar el backend de una aplicación de manera rápida sin tener que hacer el código de cero y poder conectarlo a cualquier aplicación frontend sin importar cual sea. 

Aun esta en desarrollo, pero espero actualizarlo acá tanto.

## Tabla de Contenidos

- [Instalación](#instalación)
- [Requisitos Previos](#requisitos-previos)
- [Uso](#uso)
- [Arquitectura del Proyecto](#arquitectura-del-proyecto)
- [Documentación ](#documentación)

## Instalación

1. Clonar el repositorio:
    ```bash
    git clone https://github.com/FernandoAriel80/proyecto-esqueleto-api.git
    cd proyecto-esqueleto-api
    ```
## Requisitos Previos

- **XAMPP** versión 8.2.12

Asegúrate de tener instalados los siguientes programas:

- XAMPP
- Git

## Uso

1. **Configurar el entorno:**
   - Asegúrate de que todos los requisitos previos estén instalados.
   - Edita el archivo `.env` para configurar las credenciales de la base de datos y otros servicios necesarios, usando el `.env.example`.

2. **Ejecutar el Backend:**
    - Linux:
    - Dar permisos de ejecución (solo la primera vez)
    ```bash
    chmod +x start.sh   
    ./start.sh    
    ```

    - Windows (con Git Bash o WSL):
    ```bash
    ./start.sh         
    ```

    - Windows (con PowerShell):
    - Convierte el script a un archivo .ps1 y usa:
    ```bash
    .\start.ps1         
    ```

    El script se ejecutará en `http://localhost:8000`, para modo local o desarrollo.

## Arquitectura del Proyecto

**Carpetas y Archivo:**

```plaintext
/mi-proyecto
    /app
        /Controller
            UserController.php
        /Core
            Database.php
            Request.php
            Response.php
            Router.php
        /Models
            Model.php
            /Tables
                User.php
    /config
        app.php
        database.php
        server.php
    /public
        .htaccess
        index.php
    /routes
        api.php
    .env.example
    .gitignore
    autoload.php
    README.md
    start.sh
```

**Vista Archivos de Uso:**

- Controllers   /app/Controllers
- Models    /app/Models/Tables
- routes    /routes

## Documentación

**Ejemplo de Uso en Model:**

- /app/Models/Tables/User.php

```php
<?php
    namespace app\Models\Tables;

    use app\Models\Model;

    class User extends Model
    {
        protected static $table = 'users';

        public function __construct()
        {
            parent::__construct(self::$table);
        }
    }
```

**Ejemplo de Uso en Controller:**

- /app/Controllers/UserController.php

```php
<?php

    namespace app\Controllers;

    use app\Models\Tables\User;
    use app\Core\Request;
    use app\Core\Response;

    class UserController
    {

        public function index()
        {
            $users = User::all();
            return Response::json($users);
        }

        public function store()
        {
            $request = new Request();
            $data = $request->all();

            if (empty(trim($data['nombre'])) || empty(trim($data['apellido']))) {
                return Response::json(['error' => 'Nombre y apellido son requeridos'], 400);
            }
            User::create($data);
            return Response::json(['message' => 'Usuario creado con éxito']);
        }
    }

```
**Ejemplo de Uso en Routes:**

- en /routes/api.php

```php
<?php
    use app\Core\Router;
    use app\Controllers\UserController;

    $userController = new UserController();

    Router::get('/',[$userController, 'index']);
    Router::post('/carga-usuario',[$userController,'store']);
```