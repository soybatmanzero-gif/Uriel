<?php
require 'conexion.php';

$perfil = $conexion->query("SELECT * FROM perfil LIMIT 1")->fetch(PDO::FETCH_ASSOC);
$servicios = $conexion->query("SELECT * FROM servicios ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);

function e($t) { return htmlspecialchars($t, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($perfil['nombre']) ?> | Ingeniería en TIC</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Raleway:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

  <header class="hero">
    <div class="menu">
      <nav>
        <a href="#inicio" class="activo">Inicio</a>
        <a href="#servicios">Intereses</a>
        <a href="#sobre-mi">Sobre mí</a>
        <a href="#contacto">Contacto</a>
      </nav>
      <div class="redes">
        <a href="<?= e($perfil['enlace_social']) ?>">GitHub</a>
      </div>
    </div>

    <div class="texto" id="inicio">
      <h1><?= e($perfil['nombre']) ?></h1>
      <p><?= e($perfil['titular']) ?></p>
    </div>

    <!-- Ilustración original: trazos de circuito -->
    <svg class="deco" viewBox="0 0 320 420" fill="none" stroke="#b83d17" stroke-width="16" stroke-linecap="round" stroke-linejoin="round">
      <path d="M60 420 V300 Q60 250 110 250 H200 Q250 250 250 200 V110"/>
      <circle cx="250" cy="90" r="20" fill="#b83d17"/>
      <path d="M150 420 V340 H260 Q290 340 290 310 V260"/>
      <circle cx="290" cy="240" r="14" fill="#b83d17"/>
      <path d="M110 250 V150 Q110 110 150 110 H170"/>
      <circle cx="185" cy="110" r="12" fill="#b83d17"/>
    </svg>
  </header>

  <section class="intro">
    <!-- La presentación viene de la base de datos (contiene etiquetas <b> controladas por nosotros) -->
    <p><?= $perfil['presentacion'] ?></p>
  </section>

  <section class="servicios" id="servicios">
    <?php foreach ($servicios as $s): ?>
      <div class="servicio">
        <div class="icono"><?= e($s['icono']) ?></div>
        <h3><?= e($s['titulo']) ?></h3>
        <hr>
        <p><?= e($s['descripcion']) ?></p>
      </div>
    <?php endforeach; ?>
  </section>

  <section class="sobre" id="sobre-mi">
    <div class="foto">
      <svg viewBox="0 0 300 300" fill="none" stroke="#b83d17" stroke-width="14" stroke-linecap="round" stroke-linejoin="round">
        <path d="M40 300 V210 Q40 170 80 170 H170 Q210 170 210 130 V60"/>
        <circle cx="210" cy="42" r="16" fill="#b83d17"/>
        <path d="M120 300 V240 H230"/>
        <circle cx="245" cy="240" r="12" fill="#b83d17"/>
      </svg>
    </div>
    <div class="info">
      <h2>Sobre mí</h2>
      <div class="carrera"><?= e($perfil['titular']) ?></div>
      <p><?= e($perfil['biografia']) ?></p>
    </div>
  </section>

  <section class="cierre" id="contacto">
    <div class="pajaro">&lt;/&gt;</div>
    <blockquote><?= e($perfil['frase']) ?></blockquote>
    <a href="<?= e($perfil['enlace_social']) ?>">Sígueme en GitHub &#9679;</a>
  </section>

</body>
</html>
