<?php
spl_autoload_register(function ($clase) {
  require_once "clases/$clase.php";
});

$darBaja=filter_input(INPUT_GET, 'darBaja');
echo $darBaja;
$mensaje = filter_input(INPUT_GET, 'mensaje');
$men= isset($mensaje)?$mensaje:"";
$ok = filter_input(INPUT_GET, 'ok');
if(isset($_SESSION['borrar'])){
 if($_SESSION['borrar']=="borrado"){
     echo "session borrar" .$_SESSION['borrar'];
    session_unset($_SESSION['login']);
    session_destroy();
    $ok = false;
    header("location:index.php?ok=$ok");
    exit();
 }   
 }      
        
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="autor" content="macarena cortes" />
        <link rel="stylesheet" href="css/estilo.css" />
        <link rel="stylesheet" href="css/fontawesome/css/all.css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"/>
    </head>
    <body>
        <!--
        <div id="mostrarCookies"></div>
         caja informa que se van a crear cookies
        <div id="mostrarCookies">
        <div id="cajacookies" class="flotante" > 
            <div class="cc_grey"></div>
            <div class="row aviso">
                <div class="col-6">
                    <h3>Su privacidad es importante para nosotros</h3>
                    <p>Por la ley llamada LGPD, y ahora tambi??n hecho reglamento RGPD, los desarrolladores nos vemos obligados a mostrar un mensaje de si el usuario acepta que usemos cookies. Todo esto se debe en parte por el miedo por las cookies, quiz?? por el
                        desconocimiento de lo que son o para qu?? sirven. Las cookies son simples ficheros de texto en plano que no contienen absolutamente ning??n programa. No se ejecutan ni pueden infiltrarse en un ordenador, pero ya puestos a hacer leyes no
                        nos queda otra que obedecer.
                        <a href="politica_Cookies.html">pol??tica de privacidad</a>.</p>
                </div>
                <div class="col-6">
                    <button onclick="aceptarCookies()" class="btncookies"> Aceptar Cookies
                    </button>
                </div>
            </div> 
       
        </div>-->
        <header class="top-container">
            <div id="idiomas">
                <a class="idioma" herf="#">Espa??ol</a>
                <a class="idioma" herf="#">English</a>
                <a class="idioma" herf="#"> <i class="fas fa-phone"></i> <b>976 25 25 25</b></a>

            </div>
            <div class="banner">
               <img class="logo" src="imagenes/logo.png" alt="Logo Come_biensano" /> 
               <?php echo "<h2 class='mensaje'>".$men ."</h2>" ?>
            </div>
        </header>       
        <div class=" menutop" id="mymenutop">
            <div class="row" id="login">
                <form action="primerAcceso.php" method="POST" > 
                    <!--estos input van a cambiar en relacion si ha iniciado sessiion o no -->
                    <?php
                    if ($ok != true):
                        ?>
                    <div class="">
                        <input type="submit" name="nuevo" value="Nuevo Usuario" />
                    <input type="submit" name="viejo" value="Iniciar Sesi??n" />
                    </div>
                        <?php
                   elseif ($ok == true):
                       session_start();
                      if (isset($_SESSION['borrar'])) {
                           if ($_SESSION['borrar'] == "borrado") {                                                          
                               session_unset($_SESSION['login']);
                               session_destroy();
                               $ok = false;
                               header("location:index.php?ok=$ok");
                               exit();
                           }
                       }
                       if(isset($_SESSION['loginUsuario'] )){                       
                     $nombre=  $_SESSION['loginUsuario']['nombre'] ;             
                    }
                        ?>
                        <input type="button" onclick="ventana('user')" value='<?php echo $nombre ?>' />
                        <input type="submit" name="cerrar_session" value='Cerrar Sesi??n ' />
                        <?php
                    endif;
                    ?>
                </form>
            </div>
            <div class="navegacion" >
                <nav id="menu" class="menu"> 
                     <div clas="col-sm-12">
                    <div id="minilogoHidden"><img class ="minilogoHidden" style="max-width:70%; " src="imagenes/logopngMini.png"  style="display:hidden" alt="LOgo ComeBienSano mini"/></div>
                     </div>
                    <div clas="col-sm-12">
                    <a class="hijo" href="#idiomas">Inicio</a>
                    <a class="hijo" href="#menus">Menus</a>
                    <a class="hijo" href="#kits">Kits-Alimentos</a>
                    <a class="hijo" href="#contacto">Contacto</a>
                    </div>
                </nav>
            </div>
        </div>

        <section class="content">
            <div id="content1">
                <h2>Dedica tu tiempo a lo que realmente importa<br/> nosotros cocinamos por ti</h2>
                <p>Todos nuestras verduras y hortalizas proceden de cultivos ecol??gicos.<br/> Gran calidad con todos los nutrientes que necesitas para una alimentacion sana.</p>
            </div>
            <div class="contenedor2">
                <div class="conten2">
                    <h2>Queremos que comas bien<br/> y que comas sano</h2>
                    <p>Marcamos nuestra principal prioridad<br/> en una alimentaci??n sana y de calidad.<br/>Por eso tenemos una cuidadosa seleci??n de <br/>todos los alimentos.</p>
                </div>
                <div class="conten2">
                    <img src="imagenes/img1ComeBienSano.png" alt="img1ComeBienSano.png">
                </div>
            </div>
            <hr class="separador text-center"/>
            <div class="contenedor2">
                <div class="conten3">
                    <h2 class="font">cocinado por expertos</h2>
                    <p>Todos nuestros platos se elaboran siguiendo recetas tradicionales, con ingradientes naturales de alta calidad y sin aditivos ni conservantes. En el cocinado de nuestros platos s??lo utilizamos aceite de Oliva Virgen.</p>
                    <p>Reci??n cocinados, se enfrian rapidamente y se envasan al vacio para mantener todo su sabor.</p>
                    <img class="imgconten3" src="imagenes/img2ComeBienSano.png" alt="img2ComeBienSano.png">
                </div>
                <div class="conten3">
                    <h2 class="font">Preparado en tres minutos</h2>
                    <p>S??lo tienes que perforar el film superior y calentar en el microondas o ba??o mar??a.Si el plato es frio, solo tienes que abrir,emplatar y disfrutar.</p>
                    <p>Los pescados es suficiente con un minuto.</p>
                    <p>Y las carnes basta con dos minutos</p>
                    <img class="imgconten3"src="imagenes/img4ComeBienSano.png" alt="img4ComeBienSano.png">
                </div>
                <div class="conten3">
                    <h2 class="font">Platos frescos sin congelar</h2>
                    <p>Te entregamos tus men??s sin romper la cadena de frio para guardar en el frigorifico (0-4??). Tendr??s por delante mas de 10 d??as de caducidad.</p>
                    <p>No es necesario congelar, pero si lo deseas puedes hacerlo, ya que son platos frescos que no han sido nunca congelados.</p>
                    <img class="imgconten3"src="imagenes/img7ComeBienSano.jpg" alt="img7ComeBienSano.png">
                </div>

            </div>
            <div id="menus"></div>
            <br/>

            <section>
            <hr class="separador"/>
                <h2 class="font text-center">MENUS <br/>como funciona</h2>
          
            <div class="contenedor2">
                <div class="conten4">
                    <img src="imagenes/img6ComeBienSano.jpg" alt="img8ComeBienSano.png">
                </div>
                <div class="conten4">
                    <img src="imagenes/img8ComeBienSano.jpg" alt="img9ComeBienSano.png">
                </div>
                <div class="conten4">
                    <img src="imagenes/img9ComeBienSano.jpg" alt="img10ComeBienSano.png">
                </div>
                <div class="conten4">
                    <img src="imagenes/img10ComeBienSano.jpg" alt="img8ComeBienSano.png">
                </div>

            </div>
            </section>
            <?php
            if (!isset(($_SESSION['loginUsuario']))):
                ?>
                <section>
                   
                    <hr class="separador"/>
                        <div class=" font text-center paddingbtn">
                            <h3>Inicia sesion para poder realizar tu pedido</h3>
                        </div>

                    <div class="contenedor3">
                        <div class="conten6">
                            <h2 class="font">Men?? B??sico</h2>
                            <img src="imagenes/img15ComeBienSano.jpg" alt="img15ComeBienSano.jpg">
                           <p class="paddingbtn">Tu men?? semanal sano y equilibrado.<br/> Platos frescos con ingredientes naturales</p>

                        </div>
                        <div class="conten6">
                            <h2 class="font">Men?? Bajo en Sal</h2>
                            <img src="imagenes/img16ComeBienSano.jpg" alt="img16ComeBienSano.jpg">
                            <p class="paddingbtn">Para personas con problemas de hipertensi??n. <br/> 
                                Menus especialmente preparados sin sal, pero sacan el maximo sabor de los ingredientes.</p>

                        </div>
                        <div class="conten6">
                            <h2 class="font">Men?? Diabeticos</h2>
                            <img src="imagenes/img17ComeBienSano.jpg" alt="img17ComeBienSano.jpg">
                           <p class="paddingbtn">Men?? rico en vegatales, legumbres y fibras. Bajo en carbohidratos y az??cares</p><br/>

                        </div>
                        <div class="conten6">
                            <h2 class="font">Men?? Celiacos</h2>

                            <img src="imagenes/img18ComeBienSano.jpg" alt="img18ComeBienSano.jpg">
                              <p class="paddingbtn">Materia pima de la m??s alta calidad.<br/> Sin gluten acto para consumo para celiacos.</p>

                        </div>

                    </div>
                </section>

                    <?php
                     elseif (isset(($_SESSION['loginUsuario']))):
                    ?>
                <section>

                    <hr class="separador"/>

                    <div class=" text-center paddingbtn">
                        <h2 class='font orange'>Primero elige tu  men?? </h2>
                        <p>Elige el men?? que mejor se adapte a ti.<br/> 
                            Luego te prepararemos tu men?? para toda la semana.<br/>
                            Ya ver??s que buenos y saludables</p>
                    </div>
                    <div class="contenedor3">
                        <div class="conten6">
                            <h2 class="font">Men?? B??sico</h2>

                            <img src="imagenes/img15ComeBienSano.jpg" alt="img15ComeBienSano.jpg">                           
                             <button type="button" class="btnorange font" name="elegirMenu" onclick="muestraOculta('1')" value="basico"> Seleccionar</button>                            
                              <p class="paddingbtn">Tu men?? semanal sano y equilibrado.<br/> Platos frescos con ingredientes naturales</p>               
                        </div>         
                        <div class="conten6">
                            <h2 class="font">Men?? Bajo en Sal</h2>                
                            <img src="imagenes/img16ComeBienSano.jpg" alt="img16ComeBienSano.jpg">
                              <button type="button" class="btnorange font" name="elegirMenu" onclick="muestraOculta('3')" value="basico"> Seleccionar</button>   
                              <p class="paddingbtn">Para personas con problemas de hipertensi??n. 
                                Menus especialmente preparados sin sal, pero sacan el m??ximo sabor de los ingredientes.</p>

                        </div>
                        <div class="conten6">
                            <h2 class="font">Men?? Diabeticos</h2>

                            <img src="imagenes/img17ComeBienSano.jpg" alt="img17ComeBienSano.jpg">
                              <button type="button" class="btnorange font" name="elegirMenu" onclick="muestraOculta('2')" value="basico"> Seleccionar</button>   
                              <p class="paddingbtn">Men?? rico en vegatales, legumbres y fibras. Bajo en carbohidratos y az??cares<p/>

                        </div>
                        <div class="conten6">
                            <h2 class="font">Men?? Celiacos</h2>

                            <img src="imagenes/img18ComeBienSano.jpg" alt="img18ComeBienSano.jpg">
                              <button type="button" class="btnorange font" name="elegirMenu" onclick="muestraOculta('4')" value="basico"> Seleccionar</button>   
                              <p class="paddingbtn">Materia prima de la m??s alta calidad.<br/> Sin gluten apto para consumo personas celiacas.</p>
                        </div>

                    </div>

                    <div class="col-12 sombra" id="oculto" style="display: none"> 
                        
                        <div class="row justify-content-md-center paddingbtn" style="background-color: whitesmoke">
                            <div class="col-4 paddingbtn">
                                <div class="text-center paddingbtn"id='tipoMenu'></div>
                                <h2 class="text-center">Elige d??a de entrega<br/> y composici??n de tu men??</h2>
                            </div> 
                            <div class="col-8 paddingbtn"> 
                                <form class="paddingbtn" name="formulario" action="elegirMenu.php" method="POST">
                                    <div class="row justify-content-md-center">
                                        <div class="col-4">
                                            <div class="orange paddingbtn">                  
                                                <h4> Fecha de entrega: </h4><input type='text' name="fecha" id='txtDate' required="required"/>
                                            </div> 
                                        </div>
                                        <div class="col-4">
                                            <input type="radio" id="mdc" name="m" value="mdc" checked="checked"/>
                                            <label for="mdc">MENU DE UN D??A CON CENA</label><br/>
                                            <input type="radio" id="md" name="m" value="md" />
                                            <label for="md">MENU DE UN D??A SIN CENA</label><br/>
                                            <input type="radio" id="msc" name="m" value="msc"/>
                                            <label for="msc">MENU SEMANA CON CENA</label><br/>
                                            <input type="radio" id="ms" name="m" value="ms"/>
                                            <label for="ms">MENU SEMANA SIN CENA</label><br/>
                                         
                                        </div>
                                        <div class="col-4">
                                            <div id="apto" style='margin-top:2em;'></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </section>     
                    <?php
                endif;
                ?>
     
          
         
           <hr class="separador"/>
           <section>
            <div id="kits">
               </div>
                <h2 class="font orange text-center paddingbtn">KITS de ALIMENTOS <br/>como funciona</h2>
           
            <div class="row justify-content-md-center">

                <div class="col-lg-3 col-md-6 conten4">
                    <img src="imagenes/img11ComeBienSano.jpg" alt="img7ComeBienSano.png">
                </div>
                <div class="col-lg-3 col-md-6 conten5">
                    <h3>Elige tus comidas</h3>
                    <p>Te ofrecemos muchas recetas,variadas y apetitosas.Todas saludables. Solo tienes que elegir tu preferida.</p>
                </div>
                <div class="col-lg-3 col-md-6  conten4">
                    <img src="imagenes/img12ComeBienSano.jpg" alt="img7ComeBienSano.png">
                </div>
                <div class="col-lg-3 col-md-6 conten5">
                    <h3>Te llevamos el KITs</h3>
                    <p>en menos de 24h recibes tus productos.Envasados perfectamente para seguir manteniendo sus propiedades.</p>
                </div>
            </div>
              <div class="row justify-content-md-center">
                
                <div class="col-lg-3 col-md-6 conten5">
                    <h3>Desempaqueta tu caja</h3>
                    <p>Garantizamos la frescura de todos nuestros ingredientes y los entregamos en una caja aislada hasta tu propia puerta.</p>
                </div>
                <div class="col-lg-3 col-md-6 conten4">
                    <img src="imagenes/img14ComeBienSano.jpg" alt="img14ComeBienSano.png">
                </div>
               
                <div class="col-lg-3 col-md-6 conten5">
                    <h3>Cocina, crea y disfruta</h3>
                    <p>Siga nuestras sencillas recetas paso a paso para aprender nuevas habilidades,probar nuevos sabores y preparar comidas increibles para su familia, o amigos.</p>
                </div>
                   <div class="col-lg-3 col-md-6 conten4">
                    <img src="imagenes/img13ComeBienSano.jpg" alt="img13ComeBienSano.png">
                </div>
            </div> 
            </section>
                <?php
                if (!isset(($_SESSION['loginUsuario']))):
                    ?>
        <section>
              
                    <hr class="separador"/>
                <div class="text-center">
                    <h3 class="font">Inicia sesion para poder realizar tu pedido</h3>
                    <p>Muchas sabrosas recetas te est??n esperando.<br/>
                        F??ciles de preparar.<br/>Disfruta cocinando, y sorprende a tus comensales.</p>
                </div>  

                <div class="contenedor2">
                    <div class="conten6">
                        <h2 class="font">Primeros Platos</h2>
                        <ul>
                            <li>Risotto</li>
                            <li>Garbanzos gratinados</li>
                            <li>Crema de Calabaza</li>
                            <li>Ensalada de Repollo</li>
                            <li>Alcachofas con Champi??ones rehogadas</li>
                            <li>Fideos a la cazuela de pescado</li>
                            <li> ....si quieres ver mas platos con sus recetas, inicia session</li>
                        </ul>
                    </div>
                    <div class="conten6">
                        <h2 class="font">Segundos Platos</h2>
                        <ul>
                            <li>Chulestas de cerdo con verduras</li>
                            <li>Carrillera en salsa</li>
                            <li>Lomo relleno con pimientos, jam??n y queso</li>
                            <li>Nuggets de merluza</li>
                            <li>Croquetas de setas</li>
                            <li>Calamares encebollados</li>
                            <li> ....si quieres ver mas platos con sus recetas, inicia session</li>
                        </ul>
                    </div>
                    <div class="conten6">
                        <h2 class="font"> Postres</h2>
                        <ul>
                            <li>Arroz con leche</li>
                            <li>Bizcochos de chocolate</li>
                            <li>Bu??uelos</li>
                            <li>Cookies y galletas</li>
                            <li>Natillas con caramelo</li>
                            <li>Tarta tatin con miel</li>
                            <li> ....si quieres ver mas platos con sus recetas, inicia session</li>
                        </ul>
                    </div>
                </div>
        </section>
                <?php
            elseif (isset(($_SESSION['loginUsuario']))):
                ?>
                    
           <hr class="separador"/>
                <secction> 
                    <div class="text-center paddingbtn">

                        <h2 class="font">Elige que tipo de plato quieres cocinar</h2>
                        <p>Muchas sabrosas recetas te est??n esperando.
                            Muy f??ciles de preparar.<br/>Disfruta cocinando, y sorprende a tus comensales.</p>
                    </div>  

                    <div class="contenedor2">
                        <div class="conten6">
                            <h2 class="font">Primeros Platos</h2>
                            <ul>
                                <li>Risotto</li>
                                <li>Garbanzos gratinados</li>
                                <li>Crema de Calabaza</li>
                                <li>Ensalada de Repollo</li>
                                <li>Alcachofas con Champi??ones rehogadas</li>
                                <li>Fideos a la cazuela de pescado</li>
                                <form action="elegirReceta.php" method="POST" id="formenu">
                                    <button class="font" type="submit" name="receta" value="1">Seleccionar</button>
                                </form> 
                            </ul>
                        </div>
                        <div class="conten6">
                            <h2 class="font">Segundos Platos</h2>
                            <ul>
                                <li>Chulestas de cerdo con verduras</li>
                                <li>Carrillera en salsa</li>
                                <li>Lomo relleno con pimientos, jam??n y queso</li>
                                <li>Nuggets de merluza</li>
                                <li>Croquetas de setas</li>
                                <li>Calamares encebollados</li>
                                <form action="elegirReceta.php" method="POST" id="formenu">
                                      <button class="font" type="submit" name="receta" value="2">Seleccionar</button>
                                </form> 
                            </ul>
                        </div>
                        <div class="conten6">
                            <h2 class="font"> Postres</h2>
                            <ul>
                                <li>Arroz con leche</li>
                                <li>Bizcochos de chocolate</li>
                                <li>Bu??uelos</li>
                                <li>Cookies y galletas</li>
                                <li>Natillas con caramelo</li>
                                <li>Tarta tatin con miel</li>
                                <form action="elegirReceta.php" method="POST" id="formenu">
                                      <button class="font"type="submit" name="receta" value="3">Seleccionar</button>
                                </form> 
                            </ul>
                        </div>
                    </div>
                </secction> 
                        <?php
                    endif;
                    ?>       
                    </section>
        
            <div class="footer" id="contacto">
                <div class="row justify-content-md-center">
                       <div class="col-3 paddingbtn">
                       
                        <h4>ComeBiensano</h4>
                        <i class="fas fa-envelope-open-text"></i><p>comebiensano@comebiensano.com</p>
                        <p>puedes mandar un correo o si lo deseas puedes llamarnos por telefono</p>
                        </div>
                           
                       <div class="col-3 paddingbtn">
                     
                        <i class="fas fa-home"></i><p>Calle monasterio N??5 Zaragoza 50004</p>
                        <i class="fas fa-phone-alt"></i><h3>655 581 921</h3>
                        </div>
                                     
                       <div class="col-3"> 
                           <i class="fas fa-laptop-code"></i><p>Macarena Cort??s D??az </p>
                           <i class="fas fa-at"></i><p>masmaca@gmail.com</p>
                               <img  class="tfoto_peque" src="imagenes/derechos.png" alt="imagen derechos reservados"/>
                           </div>
                    </div>
                </div>
                
      
            
     
                    <script type="text/javascript" src="js/jaScroll.js"></script> 
                    <script type="text/javascript" src="js/jscookies.js"></script>
                    <script type="text/javascript" src="js/javaScript.js"></script>
                    <script type="text/javascript" src="js/calendar.js"></script>
                    

                    </body>

                    </html>
