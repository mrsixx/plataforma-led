
				if(isset($codTask)){
					//pego os dados da missão no banco
					$this->load->model('missoes');
					$task = $this->missoes->retornaTask(array('CodTask' => $codTask));


					//carregando a view enquanto passo as informações
					$data['title'] = "Tasks";
					$data['content'] = "tasks";
					$data['sidebar'] = "tasks";
					$data['inicio'] = false;
					$data['tasks'] = $task;
					switch ($tipo) {
						case 3:
							$data['realizar'] = true;
							break;
						
						default:
							$data['realizar'] = false;
							break;
					}
				}else{
					
					$data['inicio'] = false;
					if(isset($_GET['a']) and $_GET['a'] = 'criar')
						$data['visualizar'] = false;
					else{
						
					}
				}
