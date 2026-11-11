-- Ejecuta este script en tu base de Aiven for PostgreSQL (base "defaultdb")
-- para crear las tablas y los datos del sitio de Uriel.

CREATE TABLE IF NOT EXISTS perfil (
  id SERIAL PRIMARY KEY,
  nombre VARCHAR(80) NOT NULL,
  titular VARCHAR(200) NOT NULL,
  presentacion VARCHAR(300) NOT NULL,
  biografia TEXT NOT NULL,
  frase VARCHAR(300) NOT NULL,
  enlace_social VARCHAR(200) NOT NULL
);

CREATE TABLE IF NOT EXISTS servicios (
  id SERIAL PRIMARY KEY,
  icono VARCHAR(10) NOT NULL,
  titulo VARCHAR(60) NOT NULL,
  descripcion VARCHAR(250) NOT NULL
);

DELETE FROM perfil;
DELETE FROM servicios;

INSERT INTO perfil (nombre, titular, presentacion, biografia, frase, enlace_social) VALUES
('Uriel',
 'Ingeniería en Tecnologías de la Información y Comunicación',
 'Hola, soy Uriel, estudiante de Ingeniería en TIC. Me gusta crear soluciones <b>funcionales</b> y <b>prácticas</b> con tecnología. Estos son algunos de mis intereses:',
 'Desde que armé mi primera computadora me enamoré de la tecnología. Hoy curso la carrera de Ingeniería en Tecnologías de la Información y Comunicación, donde aprendo programación, redes, bases de datos y desarrollo web. Me gusta resolver problemas reales y seguir aprendiendo cada día. Este sitio es parte de mi práctica de Programación Web Orientada a Servicios.',
 'Un buen sistema es el que nadie nota... hasta que deja de funcionar. Y ahí es donde entra un ingeniero.',
 'https://github.com/');

INSERT INTO servicios (icono, titulo, descripcion) VALUES
('</>', 'DESARROLLO WEB', 'Páginas dinámicas con PHP, HTML, CSS y JavaScript conectadas a una base de datos.'),
('DB', 'BASES DE DATOS', 'Diseño de tablas y consultas para guardar y organizar la información.'),
('NET', 'REDES', 'Configuración y administración básica de redes y servicios de comunicación.'),
('IoT', 'PROYECTOS IoT', 'Prototipos con sensores y microcontroladores que conectan el mundo físico con internet.');
