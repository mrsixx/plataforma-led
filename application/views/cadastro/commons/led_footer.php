</div> <?php      //recebendo qual página o usuário está
if(isset($content))       $modal = $content;     else       $modal = "";

    //chamando os modais necessários de acordo com a página carregada
    switch ($modal) {
      case 'mural':
        $this->load->view('panel/modais/ambiente');
        break;

      case 'ambiente':
        $this->load->view('panel/modais/ambiente');
        break;
      
      default:
        # code...
        break;
    }
  ?>
      </div>
    </div>
  </div>

  <div id='loader' style="display: hidden;"></div>
  <script src="<?= base_url("assets/js/jquery-3.2.1.min.js") ?>"></script>
  <script src="<?= base_url("assets/js/bootstrap.min.js");?>"></script>
  <script type="text/javascript" src="<?= base_url("assets/js/scripts/commons.js");?>"></script>
  <script type="text/javascript">
  
  </script>
  <?php 
  //imprimindo chamadas de scripts caso necessário
  if(isset($filesfooter)){
        foreach ($filesfooter as $key => $value) {
            echo '<!-- script com '.$key.' -->';
            echo "\n";
            echo $value;
            echo "\n";
          }
        }
  ?>
</body>

</html>