<?php
get_header();
$user_id = get_current_user_id();
if(is_user_logged_in() /* &&  ( $user_id == 1 || $user_id == 17  ||  $user_id == 19 || $user_id == 18)*/){
	global $wpdb;

	// Busca de times
	$sql = "
		SELECT 
			t.ID as ID,
			t.time_nome as time_nome,
			t.time_descricao,
			t.user_create_id,
			t.user_id_capitao,
			t.time_data_criacao,
			t.time_data_edicao,
			t.time_imagem,
			tm.user_id as user_id,
			tm.time_id as time_id,
			tm.time_convite_data as time_convite_data,
			tm.time_convite_data as time_convite_data,
			tm.time_convite_alteracao_status as time_convite_alteracao_status
		FROM 
			{$wpdb->prefix}_sis__time as t
		INNER JOIN 
			{$wpdb->prefix}_sis__times_membros  as tm
		ON 
			tm.time_id = t.ID
		WHERE 
			(
				t.time_status = 'Ativo'
				AND
				user_id_capitao = {$user_id}
			)
			OR
			(
				tm.user_id = {$user_id}
				AND
				tm.time_inscricao_status = 'Confirmado'
				AND
				t.time_status = 'Ativo'
			)
			
		GROUP BY time_id
		";
	$meus_times = $wpdb->get_results($sql,ARRAY_A);

	// Busca de convites
	$sql = "
		SELECT 
			t.ID as ID,
			t.time_nome as time_nome,
			t.time_descricao,
			t.user_create_id,
			t.user_id_capitao,
			t.time_data_criacao,
			t.time_data_edicao,
			t.time_imagem,
			tm.user_id as user_id,
			tm.time_id as time_id,
			tm.time_convite_data as time_convite_data,
			tm.time_convite_data as time_convite_data,
			tm.time_convite_alteracao_status as time_convite_alteracao_status
		FROM 
			{$wpdb->prefix}_sis__time as t
		INNER JOIN 
			{$wpdb->prefix}_sis__times_membros  as tm
		ON 
			tm.time_id = t.ID
		WHERE 
			(
				t.time_status = 'Ativo'
				AND
				tm.user_id = {$user_id}
				AND
				tm.time_inscricao_status = 'Pendente'
			)
		GROUP BY time_id
		";
	$meus_convites = $wpdb->get_results($sql,ARRAY_A);
	?>
	<div>
		<input type="hidden" id="usuario_logado_id" value="<?php echo $user_id ?>">
	</div>
	<!-- Modal Criação de times -->
	<div class="modal" tabindex="-1" role="dialog" id="modalNovoTime">
	  <div class="modal-dialog modal-lg" role="document">
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
	                    <label><strong>Nome do time</strong></label>
	                    <input type="text" name="time_nome" class="form-control" required="">
	                </div>
	                <div class="form-row">
	                	<label><strong>Descrição</strong></label>
	                    <textarea class="form-control" name="time_descricao" rows="10"></textarea>
	                </div>
	                <div class="form-row">
	                    <label><strong>Participantes</strong></label>
	                    <br>
	                    <table class="table table-bordered table-membros">
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
	                <div class="form-row">
	                	<label><strong>Selecione uma imagem para o seu time</strong></label>
	                    <input type="file" name="time_imagem" class="form-control" >
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
	  <div class="modal-dialog modal-lg" role="document">
	    <form method="POST" id="formEdicaoTime">
	        <div class="modal-content">
	            <div class="modal-header text-center">
	                <h5 class="modal-title text-center"><strong class="time_nome"></strong></h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body">
	            	<div class="text-center time_imagem_exibe">
	            		<img src="" class="" align="center">
	            	</div>
	            	<hr>
	                <div class="form-row">
	                	<label><strong>Nome do time</strong></label>
	                    <input type="text" name="time_nome" class="form-control" required="">
	                </div>
	                <div class="form-row">
	                	<label><strong>Descrição</strong></label>
	                    <textarea class="form-control" name="time_descricao" rows="10"></textarea>
	                    <div class="" style="width: 100%;">
	                    	<p class="time_descricao"></p>
	                    </div>
	                </div>
	                <div class="form-row">
	                    <label><strong>Participantes</strong></label>
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
	                                    <button type="button" class="btn btn-primary adicionarParticipantes" onclick="adicionaParticipante()">Adicionar participante</button>
	                                </td>
	                            </tr>
	                        </tfoot>
	                    </table>
	                </div>
	                <div class="form-row">
	                	<label><strong>Selecione uma nova imagem para o seu time, caso deseje alterar a atual</strong></label>
	                    <input type="file" name="time_imagem" class="form-control" align="text-center" >
	                </div>
	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-primary">Atualizar time</button>
	                <button type="button" id="excluirTime"  class="btn btn-danger">Excluir time</button>
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
	            <?php get_template_part( 'sidebar', 'minhaconta' ); ?>
	        </div>
	        <div class="col-12 col-md-8 col-sm-8 text-center">
					<?php 
					if(!empty($meus_convites)){
					?>
			        	<h1 class="title-page">Meus convites</h1>
		            	<div class="row justify-content-between">
		            	<?php
                        foreach ($meus_convites as $key) {
                            $user = get_user_by('ID',$key['user_id_capitao']);
                        	?>
            				<div class="card-deck col-md-6 p-3" >
								<div class="card-times">
									<!-- <img class="card-img-top" src="https://cdn4.buysellads.net/uu/1/41334/1550855374-cc_light.png" alt="Card image cap">-->
									<div class="box-card-img">
										<?php 
											$img =  wp_get_attachment_url($key['time_imagem']);
											echo ($img==false) ? '<img class="card-img-top" src="'. AABB_THEME_URI . '/img/logo-nova2.png">' : '<img class="card-img-top" src="'.$img.'">';
										?>
									</div>
										
									<div class="card-body">
								  		<h5 class="card-title"><?= $key['time_nome'] ?></h5>
								  		<p class="card-text">Capitão: <?= $user->data->display_name ?></p>
								  		<p class="card-text">Criação: <?= date('d/m/Y',strtotime($key['time_data_criacao'])) ?></p>
	                                </div>
									<div class="card-footer ">
	                                     <button class="btn btn-warning btn-block" onclick="modalEdicaoTime(<?= $key['ID'] ?>)">Ver time<i class="fa fa-edit" title="Ver time"></i></button>
	                                     <div class="row row-acoes-convite">
	                                     	<div class="col-6">
	                                     		<button class="btn btn-success btn-block" onclick="modalAceitarConvite(<?= $key['ID'] .','. $key['user_id'] ?>)">Aceitar convite<i class="fa fa-edit" title="Aceitar convite"></i></button>
	                                     		
	                                     	</div>
	                                     	<div class="col-6">
	                                     		<button class="btn btn-danger btn-block" onclick="modalRejeitarConvite(<?= $key['ID'] .','. $key['user_id'] ?>)">Rejeitar convite<i class="fa fa-edit" title="Aceitar convite"></i></button>
	                                     		
	                                     	</div>
	                                     </div>
									</div>
								</div>
							</div>
                        <?php
                        }
                        ?>
						</div>
						<?php
                    }
					?>
	            <h1 class="title-page">Meus times</h1>
            	<div class="row justify-content-between">
					<?php 
					if(!empty($meus_times)){
                        foreach ($meus_times as $key) {
                            $user = get_user_by('ID',$key['user_id_capitao']);
                        	?>
            				<div class="card-deck col-md-6 p-3" >
								<div class="card-times">
									<!-- <img class="card-img-top" src="https://cdn4.buysellads.net/uu/1/41334/1550855374-cc_light.png" alt="Card image cap">-->
									<div class="box-card-img">
										<?php 
											$img =  wp_get_attachment_url($key['time_imagem']);
											echo ($img==false) ? '<img class="card-img-top" src="'. AABB_THEME_URI . '/img/Icons/img-time-sem-foto.png">' : '<img class="card-img-top" src="'.$img.'">';
										?>
									</div>
										
									<div class="card-body">
								  		<h5 class="card-title"><?= $key['time_nome'] ?></h5>
								  		<p class="card-text">Capitão: <?= $user->data->display_name ?></p>
								  		<p class="card-text">Criação: <?= date('d/m/Y',strtotime($key['time_data_criacao']))?></p>
	                                </div>
									<div class="card-footer ">
	                                     <button class="btn btn-warning  btn-lg btn-block" onclick="modalEdicaoTime(<?= $key['ID'] ?>)">Ver time<i class="fa fa-edit" title="Editar time"></i></button>
									</div>
								</div>
							</div>
                        <?php
                        }
                    }
					?>
					<div class="card-deck col-md-6 p-3">
						<div class="card-times criar-time-card">
							<img class="card-img-top img-adcicionar-time" src="<?php echo AABB_THEME_URI?>/img/Icons/img-criar-time.png">
							<div class="card-footer ">
                                 <button class="btn btn-warning btn-lg btn-block" data-toggle="modal" data-target="#modalNovoTime">Criar time</button>
							</div>
						</div>
					</div>
				</div>
	        </div>
	    </div>
	</div>
</div>
<script type="text/javascript">
	
// Seção de times 

$(document).on('click','#excluirTime',function(){
	let time_id = $(this).attr('time_id');
	$('button').attr('disabled',true);
	if(jQuery('.table-membros tr').length > 1){
		alert('Todos os outros membros do time devem ser removidos para que você possa excluir o time');
		$('button').attr('disabled',false);
	}else{
	    var ret = confirm("Deseja realmente excluir esse time ? Após confirmar esta ação ela não poderá mais ser desfeita.");
	    if(ret){
	        $.ajax({
	            type : 'POST',
	            url: '/wp-admin/admin-ajax.php',
	            data: {
	                action : 'excluirTime',
	                'time_id' : time_id,
	            }
	            
	        }).done(function(r){
	            if(r['error']){
	                alert(r['mensagem']);
	                console.log(r);
	                $('button').attr('disabled',false);
	            }else{
	                alert(r['mensagem']);
	                console.log(r);
	                location.reload();
	            }
	        });
	    }else{
	    	$('button').attr('disabled',false);
	    }
	}
});

// Monta o modal na edição do time
function modalEdicaoTime(time_id){
    $('button').attr('disabled',true);
    $('#formEdicaoTime input[name="time_nome"]').val("");
    $('#formEdicaoTime textarea[name="time_descricao"]').val("");
    $('#formEdicaoTime input[name="time_participantes"]').val("");
    $('#formEdicaoTime input[name="time_id"]').val("");
    $('#formEdicaoTime input[name="time_imagem"]').val("");
    $('#formEdicaoTime .time_imagem_exibe img').attr('src','');
    $('#formEdicaoTime .table-membros tr').remove();
    $('#formEdicaoTime .time_nome').text('');
    $('#formEdicaoTime .time_descricao').text('');
    $('#formEdicaoTime #excluirTime').attr('onclick','');
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
            $('button').attr('disabled',false);
        }else{
        	let user_id = $('#usuario_logado_id').val();
        	let license = false;
        	if(user_id == r['data'][0]['user_id_capitao']){
        		license = true;
	            $('#formEdicaoTime input[name="time_nome"]').val(r['data'][0]['time_nome']);
	            $('#formEdicaoTime textarea[name="time_descricao"]').val(r['data'][0]['time_descricao']);
        	}else{
        		let time_descricao = (r['data'][0]['time_descricao'] != "") ? r['data'][0]['time_descricao'] : 'Nenhuma descriição informada';
        		$('#formEdicaoTime .time_descricao').text(time_descricao);
    			
        	}
        	$('#formEdicaoTime .time_nome').text(r['data'][0]['time_nome']);
            if(r['data'][0]['time_imagem'] != false){
                $('#formEdicaoTime .time_imagem_exibe img').attr('src',r['data'][0]['time_imagem']);
            }else{
                $('#formEdicaoTime .time_imagem_exibe img').attr('src',"<?php echo  AABB_THEME_URI . '/img/logo-nova2.png' ?>");
            }
            let part;
            console.log(r['data']['time_participantes'].length);
            for(let i=0;i<r['data']['time_participantes'].length;i++){
                dt = r["data"]["time_participantes"][i];
                part =
                '<tr>'+
                    '<td>'+dt["display_name"]+'</td>'+
                    '<td>'+dt["time_inscricao_status"]+'</td>'+
                    '<td>'
                ;
                if(license && dt["user_id"] != user_id){
                    part += '<button type="button" class="btn btn-danger" onclick="removeMembros($(this),'+dt["id"]+','+dt["user_id"]+','+dt['time_id']+')">Remover</button>';
                }else if( !license && dt["user_id"] == user_id && dt["time_inscricao_status"] == "Confirmado" ){
                	part += '<button type="button" class="btn btn-danger" onclick="sairDoTime($(this),'+dt["id"]+','+dt["user_id"]+','+dt['time_id']+')">Sair do time</button>';
                }
                part+='</td>'+
                '</tr>';
                $('#formEdicaoTime .table-membros').append(part);
                console.log(part);
            }
            $('#formEdicaoTime input[name="time_id"]').val(r['data'][0]['ID']);
            if(license){
            	$('#formEdicaoTime button[type="submit"]').show();
            	$('#formEdicaoTime input[name="time_imagem"]').parent().show();
            	$('#formEdicaoTime .adicionarParticipantes').show();
            	$('#formEdicaoTime input[name="time_nome"]').parent().show();
	            $('#formEdicaoTime textarea[name="time_descricao"]').show();
    			$('#formEdicaoTime .time_descricao').hide();
    			$('#formEdicaoTime #excluirTime').attr('time_id',r['data'][0]['ID']);
    			$('#formEdicaoTime #excluirTime').show();
            }else{
            	$('#formEdicaoTime input[name="time_nome"]').parent().hide();
	            $('#formEdicaoTime textarea[name="time_descricao"]').hide();
            	$('#formEdicaoTime button[type="submit"]').hide();
            	$('#formEdicaoTime input[name="time_imagem"]').parent().hide();
            	$('#formEdicaoTime .adicionarParticipantes').hide();
    			$('#formEdicaoTime .time_descricao').show();
    			$('#formEdicaoTime #excluirTime').hide();
            }
            $('#modalEdicaoTime').modal('show');
            $('button').attr('disabled',false);
        }
    });
}
// Função para remover time e voltar com botão de adicionar
function remove_item(el){
	$(el).parent().parent().remove()
	$('.adicionarParticipantes').show()
}
// Vincula o e-mail buscado ao usuário
function acoes(e){
	let td = $(e).attr('user_email')+'<input type="hidden" name="time_participantes[]" value="'+$(e).attr('user_email')+'"/>'
    $(e).parents('.add-member').after(td)
    $(e).parents('.add-member').remove();
    $('.adicionarParticipantes').show();
}

// Busca os usuários pelo e-mail
function fetch(clickSearch){
	$('.info-search-result').remove();
	$(clickSearch).css('display','none');
	$(clickSearch).parents('.input-group-prepend .input-group-text').append('  <i class="fas fa-spinner fa-spin"></i>')
	let search_term = $(clickSearch).parents('.input-group').find('.dado_participante').val()
    $.post('<?php echo admin_url('admin-ajax.php'); ?>',{'action':'search_name','s' : search_term},
    function(response){
    	if(response.length > 0){
    		var  ul = "<div class='info-search-result'> <p>Membros encontrados:</p> <ul class='list-user-search'>";
    		response.forEach(function(key,index){
				ul+='<li user_email="'+key+'" onclick="acoes($(this))" >' + (index+1)+ '-' + key + '</li>';
			});
			ul += "</ul><div>"
        	$('.add-member').append(ul);
    	}else{
    		var  ul = "<div class='info-search-result' <p>Nenhum membro encontrado</p></ul><div>"
        	$('.add-member').append(ul);
    	}
        console.log(response);
    	$('.input-group-prepend .input-group-text').find('.fa-spinner').remove()
		$('.input-group-prepend .fa-search').css('display','block');
    });
}

// Função para adicionar participantes
function adicionaParticipante() {
	$('.adicionarParticipantes').hide();
    let input =`
		<div class="add-member">
			<div class="input-group mb-2">
		        <input type="text" class="form-control dado_participante" name="time_participantes[]" placeholder="Digite o email do participante" required>
		        <div class="input-group-prepend">
		          <div class="input-group-text"><i class="fas fa-search" onclick="fetch($(this))"></i></div>
		        </div>
		    </div>
    	</div>`;
    let hr;
    hr = '<tr>'
    + '<td>' 
    + input
    + '</td>'
    + '<td></td>'
    + '<td> <button type="button" class="btn btn-danger" onclick="remove_item($(this))">Remover</button></td>'
    + '</tr>';
    $('.table-membros').append(hr);
}

// Criar novo time
$('#formNovoTime').submit(function(e){
	$('button').attr('disabled',true);
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
    }).done(function(r){
        if(r['error']){
            alert(r['mensagem']);
            console.log(r);
            $('button').attr('disabled',false);
        }else{
            alert(r['mensagem']);
            console.log(r);
            location.reload();
        }
    });
});

// Salvar dição do time
$('#formEdicaoTime').submit(function(e){
	$('button').attr('disabled',true);
    e.preventDefault();
    var myForm = $('#formEdicaoTime')[0];
    formData = new FormData(myForm);
    formData.append('action','AtualizaTime');
    $.ajax({
        type : 'POST',
        url: '/wp-admin/admin-ajax.php',
        data : formData,
        contentType: false,
        processData: false,
    }).done(function(r){
        if(r['error']){
            alert(r['mensagem']);
            console.log(r);
            $('button').attr('disabled',false);
        }else{
            alert(r['mensagem']);
            console.log(r);
            location.reload();
        }
    });
});

// Remove membros do time
function removeMembros(e,id,user_id,time_id){
	$('button').attr('disabled',true);
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
                $('button').attr('disabled',false);
            }else{
                alert(r['mensagem']);
                $(e).parent().parent().remove();
                console.log(r);
                $('button').attr('disabled',false);
            }
        });
    }else{
    	$('button').attr('disabled',false);
    }
}
function sairDoTime(e,id,user_id,time_id){
	$('button').attr('disabled',true);
    var ret = confirm("Deseja realmente sair deste time ? Após confirmar esta ação, caso queira participar do time novamente terá que ser convidado.");
    if(ret){
        $.ajax({
            type : 'POST',
            url: '/wp-admin/admin-ajax.php',
            data: {
                action : 'sairDoTime',
                'time_id' : time_id,
                'user_id' : user_id,
                'id' : id
            }
            
        }).done(function(r){
            if(r['error']){
                alert(r['mensagem']);
                console.log(r);
                $('button').attr('disabled',false);
            }else{
                alert(r['mensagem']);
                $(e).parent().parent().remove();
                console.log(r);
                location.reload();
            }
        });
    }else{
    	$('button').attr('disabled',false);
    }
}



// Aceitar convite
function modalAceitarConvite(time_id,user_id){
	$('button').attr('disabled',true);
    var ret = confirm("Deseja confirmar a participação neste time ?");
    if(ret){
        $.ajax({
            type : 'POST',
            url: '/wp-admin/admin-ajax.php',
            data: {
                action : 'aceitaConvite',
                'time_id' : time_id,
                'user_id' : user_id,
            }
            
        }).done(function(r){
            if(r['error']){
                alert(r['mensagem']);
                console.log(r);
                $('button').attr('disabled',false);
            }else{
                alert(r['mensagem']);
                console.log(r);
                $('button').attr('disabled',false);
                location.reload();
            }
        });
    }else{
    	$('button').attr('disabled',false);
    }	
}

// Rejeitar convite
function modalRejeitarConvite(time_id,user_id){
	$('button').attr('disabled',true);
    var ret = confirm("Deseja rejeitar o convite para  participar deste time ?");
    if(ret){
        $.ajax({
            type : 'POST',
            url: '/wp-admin/admin-ajax.php',
            data: {
                action : 'rejeitaConvite',
                'time_id' : time_id,
                'user_id' : user_id,
            }
            
        }).done(function(r){
            if(r['error']){
                alert(r['mensagem']);
                console.log(r);
                $('button').attr('disabled',false);
            }else{
                alert(r['mensagem']);
                console.log(r);
                $('button').attr('disabled',false);
                location.reload();
            }
        });
    }else{
    	$('button').attr('disabled',false);
    }	
}
// Fim da seção de times 
</script>
<style type="text/css">
	.add-member .search-input{
		display: grid;
		grid-template-columns: 80% 20%;
	}
	.table-membros td,.table-membros th{
		color: #fff;
	}
	.input-group-prepend{
		cursor: pointer;
	}
	.info-search-result p {
		text-align: center;
	    font-weight: bold;
	    font-size: 20px;
	    margin: 0;
	}
	.list-user-search li{
		background-color: #000;
	    text-align: center;
	    padding: 5px;
	    cursor: pointer;
	    border-bottom: 1px solid #fff;
	}
	.list-user-search li:hover{
	    background-color: #ffe906;
	    font-weight: bold;
	    color: #000;
	    border-bottom: none;
	    transition: background 1s;
	}
	.datafetch{
	    border: 1px solid #000;
	    padding: 2%;
	    margin-top: 1%;
	    background-color: #f8e100;
	    border-radius: 6px;
	    color: #000;
	}
	.datafetch h6.busca{
		border: 1px solid #000;
	    padding: 2%;
	    margin-top: 1%;
	    background-color: #002950;
	    border-radius: 6px;
	    color: #fff;
	}
	.datafetch h6.busca:hover{
	    padding: 4%;
	    margin-top: 1%;
	    background-color: #fff;
	    color: #002950;
	    transition: padding 0.5s;
	    border-radius: 0px;
	    cursor: pointer;
	}
</style>
<?php
}
	get_footer();