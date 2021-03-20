<?php
get_header();
$user_id = get_current_user_id();
if(is_user_logged_in()  &&  ( $user_id == 1 || $user_id == 17)){
	global $wpdb;
	$sql = "SELECT * FROM {$wpdb->prefix}_sis__time WHERE user_id_capitao = {$user_id}";
	$meus_times = $wpdb->get_results($sql,ARRAY_A);
	?>
	<!-- Modal Criação de times -->
	<div class="modal" tabindex="-1" role="dialog" id="modalNovoTime">
	  <div class="modal-dialog" role="document">
	    <form method="POST" id="formNovoTime">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title">Criação de times</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body">
	                <div class="form-row">
	                    <label>Nome do time</label>
	                    <input type="text" name="time_nome" class="form-control" required="">
	                </div>
	                <div class="form-row">
	                    <label>Descrição</label>
	                    <textarea class="form-control" name="time_descricao"></textarea>
	                </div>
	                <div class="form-row">
	                    <label>Imagem do time</label>
	                    <input type="file" name="time_imagem" class="form-control" >
	                </div>
	                <div class="form-row">
	                    <label>Participantes</label>
	                    <br>
	                    <table class="table table-bordered">
	                        <thead>
	                            <tr>
	                                <th>Nome dos participantes</th>
	                                <th>Status</th>
	                                <th>Ações</th>
	                            </tr>
	                        </thead>
	                        <tbody class="table-membros">
	                        </tbody>
	                        <tfoot class="text-center">
	                            <tr>
	                                <td colspan="3">
	                                    <button type="button" class="btn btn-primary" onclick="adicionaParticipante()">Adicionar participante</button>
	                                </td>
	                            </tr>
	                        </tfoot>
	                    </table>
	                </div>
	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-primary">Criar time</button>
	                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
	            </div>
	        </div>
	    </form>
	  </div>
	</div>

	<!-- Modal Edição de times -->

	<div class="modal" tabindex="-1" role="dialog" id="modalEdicaoTime">
	  <div class="modal-dialog" role="document">
	    <form method="POST" id="formEdicaoTime">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title">Edição de times</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body">
	                <div class="form-row">
	                    <label>Nome do time</label>
	                    <input type="text" name="time_nome" class="form-control" required="">
	                </div>
	                <div class="form-row">
	                    <label>Descrição</label>
	                    <textarea class="form-control" name="time_descricao"></textarea>
	                </div>
	                <div class="form-row">
	                    <label>Imagem do time</label>
	                    <input type="file" name="time_imagem" class="form-control" >
	                </div>
	                <div class="form-row">
	                    <label>Participantes</label>
	                    <br>
	                    <table class="table table-bordered">
	                        <thead>
	                            <tr>
	                                <th>Nome dos participantes</th>
	                                <th>Status</th>
	                                <th>Ações</th>
	                            </tr>
	                        </thead>
	                        <tbody class="table-membros">
	                        </tbody>
	                        <tfoot class="text-center">
	                            <tr>
	                                <td colspan="3">
	                                    <button type="button" class="btn btn-primary" onclick="adicionaParticipante()">Adicionar participante</button>
	                                </td>
	                            </tr>
	                        </tfoot>
	                    </table>
	                </div>
	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-primary">Atualizar time</button>
	                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
	                <input type="hidden" name="time_id" value="">
	            </div>
	        </div>
	    </form>
	  </div>
	</div>

	<!-- Fim modal times--> 

<div id="page-meus-times">
		
	
	<div class="container">
	    <div class="row">
	        <div class="col-12 col-md-4 col-sm-4">
	            <?php /*
	            <div class="menu">
	                <?php
	                wp_nav_menu( 
	                    array(
	                        'menu' =>8,
	                        'container_class' => 'menu-assinante'
	                    )
	                );
	                ?>
	            </div>
	            */ ?>
	            <?php get_template_part( 'sidebar', 'minhaconta' ); ?>
	        </div>
	        <div class="col-12 col-md-8 col-sm-8 text-center">
	            <h1>Meus times</h1>
	            	<div class="row">
						<?php 
						if(!empty($meus_times)){
                            foreach ($meus_times as $key) {
                                $user = get_user_by('ID',$key['user_id_capitao']);
                            	?>
								<?php print_r(wp_get_attachment_image(397)) ?>
	            				<div class="card-deck col-md-6 p-3" >
									<div class="card" >
										<!-- <img class="card-img-top" src="https://cdn4.buysellads.net/uu/1/41334/1550855374-cc_light.png" alt="Card image cap">-->
										<div class="card-body">
									  		<h5 class="card-title"><?= $key['time_nome'] ?></h5>
									  		<p class="card-text"><?= $user->data->display_name ?></p>
										</div>
										<div class="card-footer ">
		                                     <button class="btn btn-warning  btn-lg btn-block" onclick="modalEdicaoTime(<?= $key['ID'] ?>)">Editar<i class="fa fa-edit" title="Editar time"></i></button>
										</div>
									</div>
								</div>
                            <?php
                            }
                        }else{
                            echo '<p>Nenhum time encontrado...</p>';
                        }
						?>
						<div class="card-deck col-md-6 p-3">
							<div class="card">
								<img class="card-img-top" src="..." alt="Card image cap">
								<div class="card-body">
							  		<h5 class="card-title">Adicionar time</h5>
								</div>
								<div class="card-footer">
                                     <button class="btn btn-warning" data-toggle="modal" data-target="#modalNovoTime">Criar time</button>
								</div>
							</div>
						</div>
					</div>
	            <!-- 
	            <table class="table table-bordered">
	                <thead>
	                    <tr>
	                        <th>Código</th>
	                        <th>Nome</th>
	                        <th>Capitão</th>
	                        <th>Data de criação</th>
	                        <th>Número de membros</th>
	                        <th>Ações</th>

	                    </tr>
	                </thead>
	                <tbody>
	                        if(!empty($meus_times)){
	                            foreach ($meus_times as $key) {
	                                echo '<tr>';
	                                $user = get_user_by('ID',$key['user_id_capitao']);
	                                $nome = $user->data->display_name;
	                                echo '<td>' . $key['ID'] . '</id>';
	                                echo '<td>' . $key['time_nome'] . '</id>';
	                                echo '<td>'.$nome.'</id>';
	                                echo '<td>' . date('d/m/Y',strtotime($key['time_data_criacao'])). '</id>';
	                                echo '<td></td>';
	                                echo '<td>
	                                        <button class="btn btn-primary" onclick="modalEdicaoTime('.$key['ID'].')">Editar<i class="fa fa-edit" title="Editar time"></i></button>
	                                </td>';
	                                echo '</tr>';
	                            }
	                        }else{
	                            echo '<tr><td colspan="6">Nenhum time encontrado...</id></tr>';
	                        }
	                        ?>
	                    </tr>
	                </tbody>
	                <tfoot>
	                    <tr>
	                        <th colspan="6">
	                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalNovoTime">Criar time</button>
	                        </th>
	                    </tr>
	                </tfoot>
	            </table>
	        	-->
	        </div>
	    </div>
	</div>
</div>
	<script type="text/javascript">
	    function modalEdicaoTime(time_id){
	        //$(this).text('Buscanndo dados para edição');
	        $('button').attr('disabled',true);
	        $('#formEdicaoTime input[name="time_nome"]').val("");
	        $('#formEdicaoTime input[name="time_descricao"]').val("");
	        $('#formEdicaoTime input[name="time_participantes"]').val("");
	        $('#formEdicaoTime input[name="time_id"]').val("");
	        $('#formEdicaoTime input[name="time_imagem"]').val("");
	        $('#formEdicaoTime .table-membros tr').remove();
	        $.ajax({
	            type : 'POST',
	            url: '/wp-admin/admin-ajax.php',
	            data: {
	                action : 'BuscaTime',
	                time_id : time_id
	            }
	        }).done(function(r){
	            console.log(r);
	            if(r['error']){
	                alert('Não é possível o time neste momento');
	            }else{
	                $('#formEdicaoTime input[name="time_nome"]').val(r['data'][0]['time_nome']);
	                $('#formEdicaoTime input[name="time_descricao"]').val(r['data'][0]['time_descricao']);
	                $('#formEdicaoTime input[name="time_imagem"]').val(r['data'][0]['time_imagem']);
	                let part;
	                console.log(r['data']['time_participantes'].length);
	                for(let i=0;i<r['data']['time_participantes'].length;i++){
	                    dt = r["data"]["time_participantes"][i];
	                    part =
	                    '<tr>'+
	                        '<td>'+dt["display_name"]+'</td>'+
	                        '<td>'+dt["time_inscricao_status"]+'</td>'+
	                        '<td>'+
	                            '<button type="button" class="btn btn-danger" onclick="removeMembros($(this),'+dt["id"]+','+dt["user_id"]+','+dt['time_id']+')">Remover</button>'+
	                        '</td>'+
	                    '</tr>';
	                    $('#formEdicaoTime .table-membros').append(part);
	                    console.log(part);
	                }
	                $('#formEdicaoTime input[name="time_id"]').val(r['data'][0]['ID']);
	                $('#modalEdicaoTime').modal('show');
	            }
	        });
	        //$(this).text('Editar');
	        $('button').attr('disabled',false);
	    }
	    function acoes(e){
	        $(e).parent().parent().prev().val($(e).html());
	        $(e).parent().parent().prev().attr('readonly',true);
	        $('.datafetch .busca').remove();
	    }
	    function fetch(s){
	        $('.datafetch .busca').remove();
	        $.post('<?php echo admin_url('admin-ajax.php'); ?>',{'action':'search_name','s' : s},
	        function(response){
	            $('.datafetch').append(response);
	                console.log(response);
	        });
	    }
	    function adicionaParticipante() {
	        let input ='<input type="text" name="time_participantes[]" class="form-control" placeholder="Digite o email do participante" required onkeyup="fetch($(this).val())"></input><div class="datafetch"></div>';
	        let hr;
	        hr = '<tr>'
	        + '<td>' 
	        + input
	        + '</td>'
	        + '<td></td>'
	        + '<td> <button type="button" class="btn btn-danger" onclick="$(this).parent().parent().remove()">Remover</button></td>'
	        + '</tr>';
	        $('.table-membros').append(hr);
	    }
	    $('#formNovoTime').submit(function(e){
	        e.preventDefault();
	        let users = [];
	        var myForm = $('#formNovoTime')[0];
			formData = new FormData(myForm);
			formData.append('action','NovoTime');
	        $('#formNovoTime').find('input[name="time_participantes[]"]').each(function(i, el) {
	           users.push(el.value);
	        });
	        $.ajax({
	            type : 'POST',
	            url: '/wp-admin/admin-ajax.php',
	            data : formData,
	            contentType: false,
    			processData: false,
	            /*data: {
	                'action' : 'NovoTime',
	                'time_nome' : $('#formNovoTime input[name="time_nome"]').val(),
	                'time_descricao' : $('#formNovoTime input[name="time_descricao"]').val(),
	                'time_participantes' : users,
	                'time_iamgem' : $('#formNovoTime input[name="time_imagem"]').val(),
	            }
	            */
	        }).done(function(r){
	            if(r['error']){
	                alert(r['mensagem']);
	                console.log(r);
	            }else{
	                alert(r['mensagem']);
	                console.log(r);
	                location.reload();
	            }
	        });
	    });
	    $('#formEdicaoTime').submit(function(e){
	        e.preventDefault();
	        let users = [];
	        $('#formEdicaoTime').find('input[name="time_participantes[]"]').each(function(i, el) {
	           users.push(el.value);
	        });
	        $.ajax({
	            type : 'POST',
	            url: '/wp-admin/admin-ajax.php',
	            data: {
	                action : 'AtualizaTime',
	                'time_nome' : $('#formEdicaoTime input[name="time_nome"]').val(),
	                'time_descricao' : $('#formEdicaoTime input[name="time_descricao"]').val(),
	                'time_participantes' : users,
	                'time_imagem' : $('#formEdicaoTime input[name="time_imagem"]').val(),
	                'time_id' : $('#formEdicaoTime input[name="time_id"]').val(),
	            }
	            
	        }).done(function(r){
	            if(r['error']){
	                alert(r['mensagem']);
	                console.log(r);
	            }else{
	                alert(r['mensagem']);
	                console.log(r);
	                location.reload();
	            }
	        });
	    });
	    function removeMembros(e,id,user_id,time_id){
	        var ret = confirm("Deseja realmente remover este membro do time ? Após confirmar esta ação, caso deseje adicionar o usuário ao seu time terá que convida-lo novamente.");
	        if(ret){
	            $.ajax({
	                type : 'POST',
	                url: '/wp-admin/admin-ajax.php',
	                data: {
	                    action : 'removeMembro',
	                    'time_id' : time_id,
	                    'user_id' : user_id,
	                    'id' : id
	                }
	                
	            }).done(function(r){
	                if(r['error']){
	                    alert(r['mensagem']);
	                    console.log(r);
	                }else{
	                    alert(r['mensagem']);
	                    $(e).parent().parent().remove();
	                    console.log(r);
	                }
	            });
	        }
	    }
	</script>
	<?php
}
	get_footer();