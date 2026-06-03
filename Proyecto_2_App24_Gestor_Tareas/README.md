# TaskFlow – Gestor de Tareas Dinámico

## Objetivo del Proyecto
Construir una plataforma interactiva de productividad personal y laboral basada en un ciclo completo de operaciones CRUD, enfocada en la priorización inteligente de actividades y la optimización de flujos de trabajo en el navegador.

## Problema que Resuelve
La falta de organización y la dispersión del tiempo debido a la ausencia de herramientas centralizadas que muestren de forma prioritaria las actividades urgentes e importantes, provocando descuidos de entregas y metas.

## Tecnologías Utilizadas
* **Backend:** PHP (Controlador centralizado estructurado).
* **Base de Datos:** MySQL (Almacenamiento tipado).
* **Frontend:** HTML5, CSS3 (Estructuras de diseño avanzadas con CSS Grid), JavaScript Nativo (Eventos del DOM).

## Conceptos Aplicados
* **Patrón de Control Centralizado:** Uso de un script unificado de acciones (`task_actions.php`) estructurado mediante sentencias `switch-case` para canalizar las operaciones lógicas de creación, modificación y borrado.
* **Consultas de Ordenamiento Lógico:** Uso de condicionales en lenguaje estructurado (`CASE WHEN status = 'pendiente' THEN 1 ELSE 2 END`) directamente en la query SQL para forzar la jerarquía visual de las tareas pendientes.
* **Tipados de Datos Restrictivos:** Implementación de restricciones a nivel de base de datos usando campos `ENUM` para asegurar que las propiedades de prioridad (`baja`, `media`, `alta`) y estatus se mantengan íntegras.
* **Manipulación Dinámica del DOM:** Escucha activa mediante `DOMContentLoaded` para calcular analíticamente las métricas y actualizar dinámicamente los contadores de tareas del encabezado.

## Instrucciones de Ejecución
1.  Coloca las carpetas del proyecto dentro del entorno de tu servidor local (XAMPP/Laragon).
2.  Crea la base de datos ejecutando el comando `CREATE DATABASE app24_db;` e importa la estructura de la tabla `tasks`.
3.  Inicia los servicios de Apache y MySQL en tu panel de control local.
4.  Accede a la ruta local correspondiente desde tu navegador preferido.

## Reflexión Personal

### ¿Qué aprendí?
Aprendí a estructurar un backend altamente organizado separando la configuración del servidor, el controlador de procesos y las vistas. También profundicé en la optimización de queries complejas en MySQL.

### ¿Qué fue difícil?
Lograr que las ventanas modales de edición capturaran de forma limpia los metadatos de las tareas almacenadas e inyectaran los valores correspondientes en los inputs ocultos del formulario sin alterar el estado general de la interfaz.

### ¿Qué mejoraría?
Integraría tecnología Drag and Drop (arrastrar y soltar) mediante JavaScript para cambiar el estado de las tareas de una columna a otra al estilo de un tablero Kanban profesional.
