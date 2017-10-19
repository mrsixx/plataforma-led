<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="main">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="page-header">
                                    <h3>Mural</h3>
                                </div>
                                <?php 
                                    switch ($tipo) {
                                        case 1: 
                                        ?>

                                        <p class="well">Um mural é onde se pode compartilhar conteúdos e idéias relevantes, a fim de que sejam vistas por um determinado nicho social.<br/>Aqui na plataforma LED, os murais foram idealizados para agilizar sua comunicação com todos aqueles que fazem parte de seu cotidiano nesta escola :)
                                        </p>


                                        <?php 
                                            foreach ($murais as $indice => $tipo) {
                                                echo $indice;
                                                echo "<hr/>";
                                                echo '<ul>';
                                                foreach ($tipo as $mural) {
                                                    echo "<li><a href='"."/mural/$mural->CodMural"."'>".utf8_encode($mural->Nome).'</a></li>';
                                                }
                                                echo '</ul>';
                                                echo "<br/><br/>";
                                            }

                                            break;
                                            
                                        default: 
                                        ?>

                                        <p class="well">Um mural é onde se pode compartilhar conteúdos e idéias relevantes, a fim de que sejam vistas por um determinado nicho social.<br/>Aqui na plataforma LED, os murais foram idealizados para agilizar sua comunicação com todos aqueles que fazem parte de seu cotidiano nesta escola :)
                                        </p>


                                        <?php 
                                            foreach ($murais as $indice => $tipo) {
                                                echo $indice;
                                                echo "<hr/>";
                                                echo '<ul>';
                                                foreach ($tipo as $mural) {
                                                    echo "<li><a href='"."/mural/$mural->CodMural"."'>".utf8_encode($mural->Nome).'</a></li>';
                                                }
                                                echo '</ul>';
                                                echo "<br/><br/>";
                                            }

                                            break;
                                    }
                                ?>                                
                            </div>
                        </div>
                    </div>
<?php 