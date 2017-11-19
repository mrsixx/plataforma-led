</div>
<?php 
		//modal de notificações
		$this->load->view('panel/modais/notificacoes');
		//recebendo qual página o usuário está
		if(isset($content))
			$modal = $content;
		else
			$modal = "";

		//chamando os modais necessários de acordo com a página carregada
		switch ($modal) {
			case 'posts':
				$this->load->view('panel/modais/posts');
				break;

			case 'postagem':
				$this->load->view('panel/modais/posts');
				break;

			case 'ambiente':
				$this->load->view('panel/modais/ambiente');
				break;

			case 'turma':
				$this->load->view('panel/modais/turma');
				break;

			case 'tasks':
				$this->load->view('panel/modais/tasks');
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
	<script src="/assets/js/jquery-3.2.1.min.js"></script>
	<script src="/assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/assets/js/scripts/commons.js"></script>
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