<?php include('components/header.php'); ?>

<!-- SECCIÓN: PORTAFOLIO -->
<div class="portfolio-page-wrapper">
    <div class="portfolio-intro-block">
        <div class="intro-card layout-right">
            <div class="intro-img" style="background-image: url('https://images.unsplash.com/photo-1531403009284-440f080d1e12?q=80&w=500');"></div>
            <div class="intro-text">
                <div class="orange-icon"><i class="fa-solid fa-pen"></i></div>
                <h2>Una Exhibición de Mis Proyectos Notables</h2>
                <p>Aquí en Portafolio, me enorgullece compartir una selección de mis proyectos más destacados.</p>
                <p>Desde diseño web hasta branding, mi portafolio representa el amplio alcance de mis habilidades y experiencias.</p>
            </div>
        </div>
        
        <div class="intro-card layout-left">
            <div class="intro-text">
                <div class="orange-icon"><i class="fa-solid fa-laptop"></i></div>
                <h2>Mis Proyectos Destacados</h2>
                <p>Con años de experiencia que he logrado alcanzar a lo largo de estos 3 años en la carrera, he logrado construir y completar proyectos notables en varias asignaturas.</p>
                <p>Explora mi portafolio para encontrar proyectos exitosos y casos de estudio convincentes que demuestran mi compromiso con la excelencia y la creatividad.</p>
            </div>
            <div class="intro-img" style="background-image: url('https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=500');"></div>
        </div>
    </div>

    <!-- Proyecto 1 -->
    <div class="project-detail shadow-box">
        <h2>TaskFlow</h2>
        <p><strong>TaskFlow</strong> es una aplicación web de <strong>Gestor de Tareas</strong> desarrollada con <strong>PHP y MySQL</strong>. Permite al usuario <strong>crear, editar, marcar como completadas y eliminar</strong> tareas de forma sencilla. Cada tarea incluye título, descripción, fecha límite y nivel de prioridad (Baja, Media o Alta). La aplicación cuenta con:</p>
        <ul class="project-list">
            <li>Interfaz moderna y responsive</li>
            <li>Estadísticas en tiempo real (Total, Pendientes y Completadas)</li>
            <li>Modal para editar tareas</li>
            <li>Marcado rápido de tareas completadas</li>
            <li>Conexión segura mediante PDO</li>
        </ul>
        <p>Es un gestor de tareas completo y funcional, ideal para organizar actividades diarias o proyectos escolares.</p>
        
        <p><strong>Tecnologías utilizadas:</strong></p>
        <ul class="project-list">
            <li>PHP (backend)</li>
            <li>MySQL (base de datos)</li>
            <li>PDO (conexión segura y sentencias preparadas)</li>
            <li>HTML5, CSS3 y JavaScript (Vanilla)</li>
        </ul>
        <p>Para visualizar el proyecto, entra al enlace de gitlab que te proporciono y se encontrará en la rama Master:<br>
        <a href="https://gitlab.com/212310126/app_24_a/-/tree/master?ref_type=heads" target="_blank" class="project-link">https://gitlab.com/212310126/app_24_a/-/tree/master?ref_type=heads</a></p>
        <div class="mockup-img" style="background-image: url('https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=1000');"></div>
    </div>

    <!-- Proyecto 2 -->
    <div class="project-detail shadow-box">
        <h2>Mini-aplicación de Gestor de Citas</h2>
        <p><strong>Sistema de Citas</strong> es una aplicación web desarrollada con <strong>PHP y MySQL</strong> para gestionar citas personales de manera segura y organizada. Funcionalidades principales:</p>
        <ul class="project-list">
            <li><strong>Registro e Inicio de Sesión</strong> con verificación en dos pasos (2FA) mediante código de 6 dígitos.</li>
            <li><strong>Crear, Editar y Eliminar</strong> citas con título, fecha, hora y descripción.</li>
            <li>Dashboard con lista de citas, estadísticas (totales, pendientes, para hoy y pasadas).</li>
            <li>Citas ordenadas automáticamente por fecha y hora.</li>
            <li>Cierre automático de sesión por inactividad (15 minutos).</li>
            <li>Alta seguridad: contraseñas encriptadas, PDO con sentencias preparadas y protección contra inyecciones SQL.</li>
        </ul>
        <p>Es un sistema completo, seguro y fácil de usar para administrar y controlar todas tus citas personales o profesionales.</p>
        
        <p><strong>Tecnologías utilizadas:</strong></p>
        <ul class="project-list">
            <li>PHP (backend)</li>
            <li>MySQL (base de datos)</li>
            <li>PDO (conexión segura)</li>
            <li>HTML5, CSS3 y JavaScript</li>
            <li>Sesiones PHP con seguridad avanzada (regeneración de ID y control de inactividad)</li>
        </ul>
        <p>Para visualizar el proyecto, entra al enlace de gitlab que te proporciono y se encontrará en la rama Master:<br>
        <a href="https://gitlab.com/212310126/mini-aplicacion_web/-/tree/master?ref_type=heads" target="_blank" class="project-link">https://gitlab.com/212310126/mini-aplicacion_web/-/tree/master?ref_type=heads</a></p>
        <div class="mockup-img" style="background-image: url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=1000');"></div>
    </div>
</div>

<?php include('components/footer.php'); ?>