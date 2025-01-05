# Proyecto Esqueleto api

Es un proyecto de estructura para desarrollar api rests con un entorno mas estructurado y fácil de usar, esta inspirado en en framework [Laravel](https://laravel.com/), pero con orientación únicamente a api rests, para un trabajo mas ligero y único. 

Nació como una necesidad propia para desarrollar el backend de una aplicación de manera rápida sin tener que hacer el código de cero y poder conectarlo a cualquier aplicación frontend sin importar cual sea. 

Aun esta en desarrollo, pero espero actualizarlo acá tanto.

## Tabla de Contenidos

- [Instalación](#instalación)
- [Requisitos Previos](#requisitos-previos)
- [Uso](#uso)
- [Arquitectura del Proyecto](#arquitectura-del-proyecto)

## Instalación

1. Clonar el repositorio:
    ```bash
    git clone https://github.com/FernandoAriel80/proyecto-esqueleto-api.git
    cd distribuidora-back
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
    ```
    - Ejecutar el script en el puerto http://localhost:8000
    ```bash
    ./start.sh         
    ```

    - Windows (con Git Bash o WSL):
    - Ejecutar el script en el puerto http://localhost:8000
    ```bash
    ./start.sh         
    ```

    - Windows (con PowerShell):
    - Convierte el script a un archivo .ps1 y usa:
    - Ejecutar el script en el puerto http://localhost:8000
    ```bash
    .\start.ps1         
    ```

    El backend se ejecutará en `http://127.0.0.1:8000`, para modo local o desarrollo.

## Arquitectura del Proyecto

**Carpetas y Archivo:**
/mi-proyecto
    /App
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

**Vista Archivos de Uso:**

- Controllers   /App/Controllers
- Models    /App/Models/Tables
- routes    /routes
