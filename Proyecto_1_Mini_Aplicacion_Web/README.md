# Mini-Aplicación Web de Gestión de Contactos y Citas

## Objetivo del Proyecto
Desarrollar una aplicación web dinámica que funcione de manera similar a una Single Page Application (SPA) parcial, permitiendo la manipulación segura de registros personales y agendas de tiempo mediante arquitecturas desacopladas lógicamente.

## Problema que Resuelve
La dificultad de los usuarios para gestionar sus redes de contactos y coordinar eventos o citas en una interfaz unificada sin experimentar flujos de recarga de página lentos o vulnerabilidades críticas de exposición de datos personales.

## Tecnologías Utilizadas
* **Backend:** PHP (Lógica de control y procesamiento API).
* **Base de Datos:** MySQL (Estructura relacional gestionada en MySQL Workbench).
* **Frontend:** HTML5, CSS3 (Diseño responsivo), JavaScript Nativo (Fetch API / JSON).
* **Herramientas:** Servidor local (XAMPP / Laragon), Control de versiones (Git/GitLab).

## Conceptos Aplicados
* **Persistencia Asíncrona:** Uso de la API `fetch` para el envío de objetos `FormData` y procesamiento de respuestas estructuradas en formato JSON en tiempo real.
* **Seguridad Perimetral:** Encriptación y hasheo de contraseñas utilizando los algoritmos nativos `password_hash()` y validación mediante `password_verify()`.
* **Seguridad en Datos:** Sentencias preparadas en PHP Data Objects (PDO) para anular vectores de inyección SQL, junto con funciones de escape HTML para mitigar vulnerabilidades XSS.
* **Normalización e Integridad:** Estructura relacional de tablas (`users`, `contacts`, `appointments`) vinculadas mediante claves foráneas con restricciones de borrado en cascada (`ON DELETE CASCADE`).

## Instrucciones de Ejecución
1.  Clona el repositorio en el directorio raíz de tu servidor local (`www` o `htdocs`).
2.  Importa el script de la base de datos a tu servidor MySQL local.
3.  Configura las credenciales de acceso dentro del archivo de configuración de conexión (`config/connection.php` o equivalente).
4.  Abre el navegador web e ingresa a `http://localhost/nombre_del_proyecto/index.php`.

## Reflexión Personal

### ¿Qué aprendí?
Consolidé el uso de JavaScript asíncrono para enlazar el frontend con un backend en PHP sin interrumpir la experiencia del usuario. Además, asimilé la importancia de no almacenar jamás contraseñas en texto plano, aplicando técnicas profesionales de hashing.

### ¿Qué fue difícil?
Coordinar la actualización reactiva de las tablas del Dashboard en el DOM justo después de procesar las respuestas JSON de inserción y borrado asíncrono, asegurando que los identificadores de fila se mapearan de forma exacta.

### ¿Qué mejoraría?
Implementaría una arquitectura de enrutamiento más escalable y añadiría un sistema de notificaciones visuales emergentes tipo *Toast* para confirmar las acciones del CRUD con mejor estética.
