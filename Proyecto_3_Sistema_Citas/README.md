# Sistema de Citas Web con Temporizador de Inactividad

## Objetivo del Proyecto
Desarrollar un sistema seguro y automatizado de control de citas que proteja activamente las sesiones de usuario en entornos compartidos y ofrezca una ordenación inteligente de los datos según su proximidad temporal.

## Problema que Resuelve
El riesgo crítico de filtración o alteración de datos confidenciales cuando un usuario olvida cerrar su sesión en una computadora pública o compartida, además de la desorganización de eventos por falta de jerarquía cronológica.

## Tecnologías Utilizadas
* **Backend:** PHP (Control de sesiones HTTP y variables de estado).
* **Base de Datos:** MySQL / phpMyAdmin (Modelado relacional y persistencia).
* **Frontend:** HTML5, CSS3, JavaScript (Temporizadores lógicos del lado del cliente).

## Conceptos Aplicados
* **Seguridad Pasiva por Inactividad:** Algoritmo de control basado en marcas de tiempo (`$_SESSION['last_activity']`) que calcula el delta de inactividad, destruyendo los datos de autenticación si se superan los 15 minutos configurados.
* **Priorización Cronológica Dinámica:** Estructuración de consultas parametrizadas que ordenan el listado en base a la proximidad temporal con respecto a la hora del servidor.
* **Sesiones Seguras e Integridad:** Enlace relacional estricto entre usuarios y agendas mediante restricciones de llave foránea (*Foreign Key*), aislando la información de cada cuenta.
* **Manejo de Mensajería Flash:** Sistema de alertas efímeras de redirección que informan de manera inmediata el estatus del procesamiento del backend.

## Instrucciones de Ejecución
1.  Asegúrate de iniciar el módulo MySQL en phpMyAdmin mediante el panel de control de XAMPP.
2.  Crea las tablas `users` y `appointments` ejecutando los scripts SQL incluidos.
3.  Despliega la aplicación en tu servidor local.
4.  Ingresa con credenciales válidas o realiza el registro de un nuevo usuario en la pantalla de login.

## Reflexión Personal

### ¿Qué aprendí?
Comprendí los fundamentos de la seguridad de sesiones web y la importancia del ciclo de vida de los estados en PHP, logrando programar funciones que protegen la privacidad del usuario de forma autónoma.

### ¿Qué fue difícil?
La correcta sincronización de los tiempos lógicos del servidor con la hora local de captura del usuario al momento de validar el ordenamiento secuencial de las citas.

### ¿Qué mejoraría?
Añadiría un modal preventivo con JavaScript que le muestre una cuenta regresiva visual al usuario cuando falte un minuto para que su sesión expire, dándole la opción de extender el tiempo.
