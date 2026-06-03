# Integración y Consumo de REST API – The Dog API

## Objetivo del Proyecto
Aprender el funcionamiento, consumo e integración de servicios y arquitecturas de red externas tipo REST dentro de un entorno backend en PHP, procesando conjuntos de datos remotos para su visualización dinámica.

## Problema que Resuelve
La necesidad de alimentar aplicaciones de software con datos, catálogos e información especializada y actualizada en tiempo real sin requerir de bases de datos locales masivas que consuman almacenamiento e infraestructura propia de la empresa.

## Tecnologías Utilizadas
* **Lenguaje de Programación:** PHP (Backend procesador de solicitudes).
* **Extensiones de Servidor:** cURL (Client URL Library).
* **Formato de Datos:** JSON (JavaScript Object Notation).
* **Servicio Externo:** Endpoints globales de *The Dog API*.

## Conceptos Aplicados
* **Peticiones HTTP por Capas:** Configuración avanzada de solicitudes asíncronas con cURL, manipulando parámetros de red críticos como `CURLOPT_RETURNTRANSFER` para canalizar las respuestas de forma segura.
* **Seguridad por Cabeceras (API Keys):** Implementación del protocolo de autenticación del servicio mediante la inyección del token privado en el header a través del parámetro `x-api-key`.
* **Deserialización Controlada de Datos:** Transformación de flujos de texto plano JSON a colecciones o matrices asociativas manejables en PHP mediante funciones `json_decode`.
* **Mapeo y Renderizado Semántico:** Iteración iterativa (`foreach`) de estructuras multidimensionales complejas para incrustar de forma automatizada propiedades textuales y fotográficas en elementos HTML5 semánticos.

## Instrucciones de Ejecución
1.  Asegúrate de tener habilitada la extensión `extension=curl` dentro del archivo `php.ini` de tu servidor local.
2.  Solicita una llave gratuita en el portal oficial de *The Dog API*.
3.  Reemplaza el valor de la variable destinada a la API Key en el script PHP por tu clave personal.
4.  Ejecuta el archivo PHP en tu navegador (`localhost:8080/NombreProyecto/ejemplo.php`).

## Reflexión Personal

### ¿Qué aprendí?
Comprendí a profundidad la arquitectura cliente-servidor y el ciclo de las peticiones HTTP (GET, respuestas por código de estado). Aprendí a integrar cualquier servicio web de terceros usando documentación técnica y el protocolo cURL.

### ¿Qué fue difícil?
Controlar de forma óptima el flujo de datos cuando el servicio externo devolvía objetos anidados o estructuras complejas, requiriendo un mapeo minucioso de índices asociativos en los bucles.

### ¿Qué mejoraría?
Implementaría un sistema de almacenamiento en caché (*Caching*) local para guardar de forma temporal las respuestas JSON y evitar consumir peticiones a la API externa de manera innecesaria cada vez que se refresque el sitio.
