<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="main">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="page-header">
                                    <h3>Mural</h3>
                                </div>
                                <div class="alert alert-warning alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Dica LED:</strong> O mural é uma ferramenta poderosa para fixar uma ideia com todos ao seu redor. <br/> Busque ser gentil e educado em suas publicações e comentários com os outros membros, assim eles estarão propensos a encarar melhor suas ideias :D
                                </div>
                                <p class="well">Um mural é onde se pode compartilhar conteúdos e idéias relevantes, a fim de que sejam vistas por um determinado nicho social.<br/>Aqui na plataforma LED, os murais foram idealizados para agilizar sua comunicação com todos aqueles que fazem parte de seu cotidiano nesta escola :)
                                </p>
                                <?php 
                                    switch ($tipo) {
                                        case 1: 
                                        ?>

                                        


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