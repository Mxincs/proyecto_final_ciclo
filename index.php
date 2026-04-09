<?php
require_once 'includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();
?>

<?php include 'includes/header.php'; ?>

<main>

    <div class="fondo-estrella">

        <section id="hero" class="luceros-inicial">

            <div class="hero-left">
                <img src="img/jugador_con_aros.png" alt="Imagen Jugador de Fútbol" class="jugador-img">
            </div>

            <div class="hero-right">
                <div class="contenedor-right">
                    <img src="img/logo_LUCEROS_IFA.png" alt="Logo Luceros">
                    <h1>
                        FÚTBOL<br>
                        <span class="span-360">360</span>
                    </h1>
                </div>
            </div>

        </section>

        <section class="bienvenida-luceros">
            <div class="bienvenida-izquierda">
                <div class="contenedor-bienvenida-superior">
                    <h2>BIENVENIDO/A<br>LUCEROS</h2>
                    <span>International Football Academy</span>
                </div>
                <div class="contenedor-bienvenida-inferior">
                    <span><strong>Encantado de conocerte,</strong> soy N A, Director General de la Academia.</span>
                    <p><strong>LUCEROS International Football Academy</strong> ofrece un programa de <strong>"FORMACIÓN 360"</strong>
                    para que jóvenes futbolistas se formen como profesionales.</p>
                </div>
            </div>
            <div class="bienvenida-derecha">
                <img src="img/futbolista_lucero.png" alt="Imagen Jugador de Fútbol" class="imagen-jugador-bienvenida">
            </div>
        </section>

    </div>

    <section class="contenedor-aprendizaje-integral">
        <h2 class="texto-seccion">APRENDIZAJE INTEGRAL</h2>

        <div class="contenedor-mente-cuerpo-balon">
            <div class="contenedor-mcb">
                <img src="img/cerebro.png" alt="imagen cerebro">
                <span>MENTE</span>
            </div>
            <span class="texto-mas">+</span>
            <div class="contenedor-mcb">
                <img src="img/corazon.png" alt="imagen corazón">
                <span>CUERPO</span>
            </div>
            <span class="texto-mas">+</span>
            <div class="contenedor-mcb">
                <img src="img/balon.png" alt="imagen balón">
                <span>BALÓN</span>
            </div>
        </div>

        <div class="info-aprendizaje-integral">
            <p>
                <strong>El fútbol moderno es mucho más que solo talento,</strong> por eso, en <strong>LUCEROS International Football 
                Academy</strong> tenemos una filosofía basada en el aprendizaje integral, con <strong>programas específicos que permitan a nuestros 
                alumnos convertirse en atletas completos.</strong>
            </p>
        </div>

    </section>

    <section class="seccion-cursos-home color-fondo-negro">
        <h2 class="texto-seccion">PRÓXIMOS CURSOS</h2>
        <div class="info-aprendizaje-integral">
            <p>Descubre todos nuestros programas formativos disponibles.</p>
        </div>
        <div style="text-align:center; margin-top: 2rem;">
            <a href="cursos.php" class="btn-auth" style="display:inline-block; width:auto; padding: 1rem 3rem;">
                VER CURSOS
            </a>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>