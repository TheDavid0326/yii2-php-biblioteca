# Biblioteca Personal - Gestión de Libros

Este proyecto es una aplicación web desarrollada en **Yii2** que permite a los usuarios gestionar su colección de libros de manera sencilla y eficaz. Desde la organización de títulos, autores y géneros, hasta la personalización con portadas de libros, esta aplicación está diseñada para bibliófilos que desean mantener su biblioteca ordenada y accesible.

<p align="center">
    <h1 align="center">Página de Inicio</h1>
    <img src="https://i.imgur.com/rBMKdmX.jpeg" 
         style="max-width: 100%; height: auto; border-radius: 10px; box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);">
    <br>
</p>

## Características Principales

- **Gestión de Libros**: Añade, edita y elimina libros de tu colección.
- **Búsqueda y Filtrado**: Filtra libros por género, autor o título para encontrar rápidamente lo que buscas.
- **Portadas Personalizadas**: Sube portadas personalizadas para cada libro.
- **Acceso Controlado**: Acceso restringido a usuarios autenticados para gestionar la biblioteca privada.
- **Paginación**: Visualiza los libros en una lista paginada para una mejor experiencia de usuario.

## ESTRUCTURA DEL DIRECTORIO
-------------------

        assets/         → Contiene la definición de los recursos estáticos (CSS, JS, imágenes, etc.).
        commands/       → Contiene los comandos de consola (controladores para la terminal).
        config/         → Contiene los archivos de configuración de la aplicación.
        controllers/    → Contiene las clases de los controladores web.
        mail/           → Contiene los archivos de vista para los correos electrónicos.
        models/         → Contiene las clases de modelo (lógica de negocio y acceso a datos).
        runtime/        → Contiene los archivos generados durante la ejecución de la aplicación.
        tests/          → Contiene diversas pruebas para la aplicación básica.
        vendor/         → Contiene los paquetes de terceros de los que depende la aplicación.
        views/          → Contiene los archivos de vista para la interfaz web.
        web/            → Contiene el script de entrada y los recursos accesibles desde el navegador.

------------


## Tecnologías Utilizadas

- **Yii2**: Framework de PHP utilizado para el desarrollo de la aplicación.
- **Bootstrap**: Framework de CSS para el diseño y la interfaz de usuario.
- **HTML5 y CSS3**: Para la estructura y estilos de la aplicación.
- **JavaScript**: Para interacciones dinámicas en el frontend.
- **MySQL**: Base de datos utilizada para almacenar la información de los libros y usuarios.
- **PHP**: Lenguaje de programación backend.
- **Yii2 ActiveForm**: Para la creación de formularios de manera sencilla y eficiente.
- **Yii2 Pagination**: Para la paginación de resultados en la lista de libros.
- **Yii2 AccessControl**: Para gestionar el acceso a las diferentes partes de la aplicación.

## Aprendizajes Clave

- **MVC (Modelo-Vista-Controlador)**: Aprendizaje y aplicación del patrón de diseño MVC en Yii2.
- **Autenticación y Autorización**: Implementación de sistemas de autenticación y control de acceso con Yii2.
- **Formularios y Validación**: Creación y validación de formularios utilizando Yii2 ActiveForm.
- **Subida de Archivos**: Gestión de la subida y almacenamiento de archivos (imágenes de portadas de libros).
- **Paginación**: Implementación de paginación para mejorar la experiencia del usuario en listados largos.
- **Búsqueda y Filtrado**: Desarrollo de funcionalidades de búsqueda y filtrado de datos.
- **Bootstrap**: Uso de Bootstrap para el diseño responsive y la estilización de la interfaz de usuario.

## Estructura del Proyecto

- **Controladores**: 
  - `LibroController`: Gestiona las operaciones CRUD (Crear, Leer, Actualizar, Eliminar) para los libros.
  - `SiteController`: Maneja la lógica de la página principal, inicio de sesión y cierre de sesión.

- **Vistas**:
  - `site/index.php`: Página principal de la aplicación con una breve descripción y enlaces de acceso.
  - `libro/`: Contiene las vistas para listar, crear, actualizar y ver detalles de los libros.

- **Modelos**:
  - `Libro`: Modelo que representa la entidad "Libro" y gestiona la lógica de negocio relacionada con los libros.
  - `LibroSearch`: Modelo utilizado para la búsqueda y filtrado de libros.

- **Assets**: Archivos CSS y JavaScript para la estilización y funcionalidades dinámicas.

## Capturas de Pantalla

Página Principal
Página principal de la aplicación con descripción y enlaces de acceso.

Lista de Libros
Lista de libros con paginación y opciones de filtrado.

Formulario de Creación
Formulario para añadir un nuevo libro a la colección.

Contribuciones
Las contribuciones son bienvenidas. Si deseas mejorar este proyecto, por favor sigue estos pasos:

Haz un fork del proyecto.

Crea una rama para tu feature (git checkout -b feature/nueva-funcionalidad).

Realiza tus cambios y haz commit (git commit -m 'Añade nueva funcionalidad').

Haz push a la rama (git push origin feature/nueva-funcionalidad).

Abre un Pull Request.

Instalar Dependencias:

bash
Copy
composer install
Configurar la Base de Datos:

Crear una base de datos MySQL.

Configurar las credenciales de la base de datos en config/db.php.

Ejecutar Migraciones:

bash
Copy
php yii migrate
Iniciar el Servidor:

bash
Copy
php yii serve
Acceder a la Aplicación:
Abre tu navegador y visita http://localhost:8080.

Capturas de Pantalla
Página Principal
Página principal de la aplicación con descripción y enlaces de acceso.

Lista de Libros
Lista de libros con paginación y opciones de filtrado.

Formulario de Creación
Formulario para añadir un nuevo libro a la colección.



## Licencia
Este proyecto está bajo la licencia MIT. Consulta el archivo LICENSE para más detalles.

¡Gracias por visitar este proyecto! Esperamos que te sea útil para gestionar tu biblioteca personal. Si tienes alguna pregunta o sugerencia, no dudes en contactarnos.Licencia
Este proyecto está bajo la licencia MIT. Consulta el archivo LICENSE para más detalles.

¡Gracias por visitar este proyecto! Esperamos que te sea útil para gestionar tu biblioteca personal. Si tienes alguna pregunta o sugerencia, no dudes en contactarnos.
