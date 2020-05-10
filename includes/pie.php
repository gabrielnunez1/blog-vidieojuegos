<?php require_once 'conexion.php'; ?>
<div id='clearfix'></div>
        </div>
<footer id='pie'>
        <p> Desarollado por Gabriel &copy; 2018 </p>
       </footer>


<?php



$preguntas = array("Conceptos iníciales: Programación modular"," Programación estructurada "," Programación orientada a objetos"," Estructura
de un algoritmo","Diagramas de flujo"," Conectores Lógicos"," Operadores relacionales","
Desarrollo del ciclo While"," Desarrollo del ciclo For"," Desarrollo de condicionales IF"," CASE","
Variables"," Variables contadores "," Variables de acumulación"," Tratamiento básico de caracteres","
","Bases de Datos Conceptos y características","Sistema de bases de datos: concepto y componentes"," Estructura de datos relacional"," Conceptos básicos atributos","Conceptos claves","Conceptos relaciones"," Consultas","Diseño de páginas Web"," Definición de HTML"," Definición de los “tags” básicos: <html>
<head> <body> <div>etc"," Creación de una página sencilla"," Premisas básicas para la
creación de una página web"," Etapas en la construcción de una página web"," Prediseño diseño instalación y
prueba"," Editor de páginas web: Macromedia Dreamweaver o similar:"," Herramientas de
edición de textos"," Revisión del concepto de hipervínculo Clasificación de los
hipervínculos","Direcciones absolutas y relativas");

echo "Valor aleatorio: ". $preguntas[array_rand($preguntas)];
?>
       </body>
</html>