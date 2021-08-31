<?php
get_header();
global $wpdb;
while ( have_posts() ) {
    the_post();
    $campeonato_id = get_the_ID();
    $user_id = get_current_user_id();
    $tabela_posts =  $wpdb->prefix.'posts';
    $tabela_time =  $wpdb->prefix.'_sis__time';
    $tabela_campeonato_times = $wpdb->prefix.'_sis__campeonatos_times';
    $tabela_campeonato_fases = $wpdb->prefix.'_sis__campeonatos_fases';
    $tabela_campeonato_jogos = $wpdb->prefix.'_sis__campeonatos_jogos';
    $tabela_campeonato_inscritos = $wpdb->prefix.'_sis__campeonatos__inscritos';
    $tabela_campeonato_jogos_solicitacao = $wpdb->prefix.'_sis__campeonatos_jogos_solicitacao';
    $campeonato_iniciado = get_post_meta($campeonato_id,'campeonato_iniciado',true);
    $usuario_logado = is_user_logged_in();
    $author = $wpdb->get_results("SELECT post_author FROM {$tabela_posts} WHERE ID = {$campeonato_id}",ARRAY_A);
    $usuario_author =($author[0]['post_author'] == $user_id) ? true : false ;
    $permissao_global = current_user_can('manage_options');
    $now = strtotime('now') - 10800;
    $incio_proxima_fase = get_post_meta($campeonato_id,'iniciar_proxima_fase',true);
    
    $fase_id_atual = $wpdb->get_results("
        SELECT 
            * 
        FROM 
            {$tabela_campeonato_fases} 
        WHERE 
            campeonato_id = {$campeonato_id} 
        AND 
            status = 'Em progresso'"
        ,
        ARRAY_A
    );

    $times_campeonato = $wpdb->get_results("
        SELECT 
            tm.*
        FROM 
            {$tabela_time} as tm
        INNER JOIN 
            {$tabela_campeonato_times} as camp_time
        ON 
            tm.ID = camp_time.time_id  
        WHERE 
            camp_time.campeonato_id={$campeonato_id}
    ",ARRAY_A);

    $users_campeonato = $wpdb->get_results("
        SELECT 
            *
        FROM 
            {$wpdb->prefix}_sis__campeonatos__inscritos as camp_time
        WHERE 
            camp_time.campeonato_id={$campeonato_id}
        AND
            camp_time.time_id = 0
        AND
            camp_time.user_id = {$user_id}
    ");
    
    $return = apply_filters('verifica_status_fase',$fase_id_atual[0]['ID'],$campeonato_id,0);
    ?>
    <div class="box-crumbs">
        <div class="container container-single">
            <section class="crumbs">
                <div class="row">
                    <div class="col-12">
                        <h1 class="title-single"><?php echo get_the_title(); ?></h1>
                    </div>

                </div>
            </section> 
        </div>
    </div>
    <div class="box-page">
        <div class="container">
            <section class="article-single-campeonato">
                <div class="row">
                    <div class="col-12">
                        
                    	<input type="hidden" name="universal-campeonato-id" id="universal-campeonato-id" value="<?php echo $campeonato_id?>">
                        <nav>
                          <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Informações gerais</a>
                            <a class="nav-item nav-link" id="nav-inscritos-tab" data-toggle="tab" href="#nav-inscritos" role="tab" aria-controls="nav-inscritos" aria-selected="false">Inscritos</a>
                            <a class="nav-item nav-link" id="nav-tabela-tab" data-toggle="tab" href="#nav-tabela" role="tab" aria-controls="nav-tabela" aria-selected="false">Tabela</a>
                            <?php 
                            if($usuario_logado){
                            ?>
                            	<a class="nav-item nav-link" id="nav-contestacoes-tab" data-toggle="tab" href="#nav-contestacoes" role="tab" aria-controls="nav-contestacoes" aria-selected="false" campeonato_id="<?= $campeonato_id ?>">Solicitações</a>
                            <?php 
                            }
                            ?>
                          </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                          
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="row row-dados-single-campeonato">
                                    <div class="col-md-6">
                                        <div class="dados-single-campeonato">
                                            <div class="texto-single-campeonato">
                                                <?php the_content(); ?>
                                            </div>
                                            <table class="table table-dark">
                                                <tbody>
                                                <tr>
                                                    <th scope="row">LOCAL:</th>
                                                    <td><?php echo get_field('local', $campeonato_id);?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">DATA:</th>
                                                    <td><?php echo date("d/m/Y H:i", strtotime(get_field('data',$campeonato_id)));?></td>
                                                    </tr>
                                                <tr>
                                                    <th scope="row">VALOR:</th>
                                                    <td><?php echo get_field('valor', $campeonato_id);?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">PLATAFORMA:</th>
                                                    <td><?php echo get_field('plataforma', $campeonato_id);?></td>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    $categoria = '';
                                                    $terms = get_the_terms( $post->ID , 'categoria_camp' );
                                                    if ( $terms != null ){
                                                        foreach( $terms as $term ) {
                                                            $categoria = $term->name;
                                                        }

                                                    }
                                                    ?>
                                                    <th scope="row">CATEGORIA:</th>
                                                    <td><?php echo $categoria;?></td>
                                                </tr>
                                                
                                                </tbody>
                                            </table>
                                            <?php $min_jogadores = get_field('num_min_jogadores', $campeonato_id);?>
                                            <input type="hidden" name="num_min_jogadores" class="num_min_jogadores" value="<?php echo $min_jogadores ?>">
                                       
                                            <?php $max_jogadores = get_field('num_max_jogadores', $campeonato_id);?>
                                            <input type="hidden" name="num_max_jogadores" class="num_max_jogadores" value="<?php echo $max_jogadores ?>">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a class="bnt-single-regulamento" href="<?php echo get_field('regulamento', $campeonato_id);?>"  target="_blank">Regulamento</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php
                                                    if ($usuario_logado) {                                                        
                                                        $user_data = get_userdata($user_id);
                                                        $data_encerramento_inscricao = get_field('data_final_inscricao', $campeonato_id);
                                                        
                                                        //verifica se o campeonato é em times para verificar o máximo de inscritos
                                                        if (get_field('campeonato_em_equipe', $campeonato_id) == "Sim"){
                                                            $num_inscritos = count($times_campeonato);
                                                        }else{
                                                            $inscritos_campeonato = $wpdb->get_results("
                                                                SELECT 
                                                                    ci.user_id
                                                                FROM 
                                                                    {$tabela_campeonato_inscritos} as ci
                                                                WHERE 
                                                                    ci.campeonato_id={$campeonato_id}
                                                            ",ARRAY_A);
                                                            $num_inscritos = count($inscritos_campeonato);
                                                        }
                                                        $numero_maximo_times = get_field('numero_maximo_times', $campeonato_id);
                                                        
                                                        if ($now < strtotime($data_encerramento_inscricao) && $num_inscritos < $numero_maximo_times) {
                                                            $equipe = get_field('campeonato_em_equipe', $campeonato_id);
                                                            if ($equipe == "Sim"){
                                                                $sql = "SELECT 
                                                                    *
                                                                FROM 
                                                                    {$tabela_time}
                                                                WHERE 
                                                                    user_id_capitao = {$user_id}
                                                                ";
                                                                $meus_times = $wpdb->get_results($sql, ARRAY_A); 
                                                                if (!empty($meus_times)) { 
                                                                    $sql = "SELECT * FROM {$tabela_campeonato_times} WHERE capitao_id = {$user_id} AND campeonato_id = {$campeonato_id}";
                                                                    $meus_times_inscritos = $wpdb->get_results($sql, ARRAY_A);
                                                                    if (empty($meus_times_inscritos) && !$usuario_author) {?>
                                                                        <a class="bnt-single-inscrevase" href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal">Inscrever meu time</a>
                                                                <?php    
                                                                    }else{ ?>
                                                                        <a class="btn-erro-time-ja-inscrito" href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="Você já possui um time inscrito nesse campeonato">Inscreva-se</a>
                                                                        
                                                                <?php    
                                                                    }

                                                                
                                                                }else{ ?>
                                                                        <a class="btn-erro-criar-time" href="/meus-times/;" data-toggle="tooltip" data-placement="bottom" title="Você precisa ser capitão de um time para inscrevê-lo em um campeonato">Criar meu time</a>
                                                                        
                                                                <?php    
                                                                    }
                                                                //print_r($meus_times);
                                                            }else{ 
                                                                if (empty($users_campeonato)) {
                                                                    
                                                                
                                                            ?>
                                                                <a class="bnt-single-inscrevase" href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal">Inscreva-se</a>
                                                                
                                                            <?php
                                                                }else{ ?>
                                                                    <a class="btn-erro-time-ja-inscrito" href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="Você já está inscrito nesse campeonato">Inscreva-se</a>
                                                            <?php
                                                                }    
                                                            } 
                                                        }else{                                                            
                                                            /*$class_mydb = new wpdb ( 'st_user_aabb', 'YFrDVCtcwAAz3nc', 'st_torneios', '50.62.161.72' ); 
                                                            $class_mydb -> show_errors();
                                                            $class_rows = $class_mydb -> get_results( "SELECT senha FROM usuarios WHERE email = '".$user_data->user_email."'", ARRAY_A );
                                                            $url ='http://torneios.aabbesports.com.br/login.php?username='.$user_data->user_email.'&password='.base64_encode($class_rows[0]['senha']);*/
                                                            ?>
                                                            <a class="btn-erro-time-ja-inscrito" href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="Inscrições encerradas">Inscreva-se</a>
                                                        <?php
                                                        }
                                                        ?>
                                                        
                                                    <?php
                                                    } else { ?>
                                                        <a class="bnt-single-inscrevase" href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal">Acesse</a>

                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <?php 

                                            // Verifica se o campeonato já iniciou, para permitir a definição do início do campeonato
                                            if(!$campeonato_iniciado && $usuario_logado && $usuario_author){
                                                ?>
                                                <button onclick="iniciaCampeonato(<?= $campeonato_id ?>)" class="btn btn-warning  btn-block">Iniciar campeonato</button>
                                                <?php
                                            }

                                           
                                            ?>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="box-img-single-campeonato">
                                            <img class="img-single-campeonato" src="<?php the_post_thumbnail_url(); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-inscritos" role="tabpanel" aria-labelledby="nav-inscritos-tab">
                                <div class="times-do-campeonato">
                                    <?php
                                    if (get_field('campeonato_em_equipe', $campeonato_id) == "Sim"){
                                        if(empty($times_campeonato)){
                                            ?>
                                            <div class="sem-times">Nenhum time inscrito neste campeonato.</div>
                                            <?php
                                        }else{
                                            ?>
                                                <div class="row row-inscritos-campeonato">
                                                    
                                                    <?php
                                                    $dados_times = [];
                                                    foreach ($times_campeonato as $key => $value) { 
                                                        $user = get_user_by('ID',$value['user_id_capitao']);
                                                        $dados_times[$value['ID']] = array(
                                                            'time_nome' => $value['time_nome'],
                                                            'time_imagem' => $value['time_imagem'],
                                                            'time_capitao' => $value['user_id_capitao'],
                                                        );
                                                    ?>
                                                        <div class="card-deck col-md-4 p-3" >
                                                            <div class="card-times">
                                                                <!-- <img class="card-img-top" src="https://cdn4.buysellads.net/uu/1/41334/1550855374-cc_light.png" alt="Card image cap">-->
                                                                <div class="box-card-img">
                                                                    <?php 
                                                                        $img =  wp_get_attachment_url($value['time_imagem']);
                                                                        echo ($img==false) ? '<img class="card-img-top" src="'. AABB_THEME_URI . '/img/Icons/img-time-sem-foto.png">' : '<img class="card-img-top" src="'.$img.'">';
                                                                    ?>
                                                                </div>
                                                                    
                                                                <div class="card-body">
                                                                    <h5 class="card-title"><?= $value['time_nome'] ?></h5>
                                                                    <p class="card-text">Capitão: <?= $user->data->display_name ?></p>
                                                                </div>
                                                                <div class="card-footer ">
                                                                     <button class="btn btn-warning  btn-lg btn-block btn-ver-membros-campeonato" data-time-id="<?= $value['ID'] ?>">Ver jogadores</button>
                                                                </div>
                                                                <?php 
                                                                if(get_current_user_id() == $value['user_id_capitao'] && $now < strtotime($data_encerramento_inscricao)){
                                                                ?>
                                                                    <div class="card-footer ">
                                                                         <button class="btn btn-primary  btn-lg btn-block btn-edita-jogadores-campeonato" data-time-id="<?= $value['ID'] ?>">Editar jogadores</button>
                                                                         <button class="btn btn-danger  btn-lg btn-block btn-remove-time-campeonato" data-time-id="<?= $value['ID'] ?>">Cancelar inscrição</button>
                                                                    </div>
                                                                <?php 
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        
                                                    <?php } ?>
                                                </div>    
                                             
                                            <?php
                                        }
                                    }else{
                                        $results = $wpdb->get_results("
                                                        SELECT 
                                                            *
                                                        FROM 
                                                            {$wpdb->prefix}_sis__campeonatos__inscritos as camp_time
                                                        WHERE 
                                                            camp_time.campeonato_id={$campeonato_id}
                                                        AND
                                                            camp_time.time_id = 0 "); 
                                        
                                        
                                    ?>
                                        
                                        <table class="table table-inscritos-individual">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nickname</th>
                                                    <th>AABB</th>
                                                    <th>Inscrição</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $dados_times = []; ?>
                                            <?php $count = 0; ?>
                                            <?php foreach ($results as $result) {
                                                $count++;
                                                $dados_times[$result->user_id] = array(
                                                    'time_nome' => $result->user_jogo_nickname,
                                                    'time_imagem' => '',
                                                    'time_capitao' => $result->user_id,
                                                );
                                                echo "<tr>";
                                                echo "<td>".$count."</td>";
                                                echo "<td>".$result->user_jogo_nickname."</td>";
                                                echo "<td>".get_user_meta($result->user_id,'cidade_aabb', true)."</td>";
                                                echo "<td>".date('d/m/Y', strtotime($result->usuario_data_inscricao))."</td>";
                                                echo "</tr>";
                                            } ?>
                                            </tbody>
                                        </table>

                                     <?php } ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-tabela" role="tabpanel" aria-labelledby="nav-tabela-tab">
                                <div class="lista-chaveamento">
                                    <?php 
                                    
                                     // Exibição e controle das datas das fases
                                    $sql_datas_fases = "
                                        SELECT 
                                            * 
                                        FROM 
                                            {$tabela_campeonato_fases} 
                                        WHERE 
                                            campeonato_id = {$campeonato_id}  
                                        ORDER BY 
                                            ordem
                                        ASC
                                    ";
                                    $results = $wpdb->get_results($sql_datas_fases,ARRAY_A);

                                    if(!empty($results)){
                                        if($usuario_logado && ($usuario_author || $permissao_global)){
                                            ?>
                                            <div class="gestao-fases">
                                                <form id="fases_data" action="" method="POST">
                                                    <?php 
                                                    foreach ($results as $key => $value) {

                                                        $status = ($value['status'] == 'Concluído') ? 'readonly' : '';
                                                        ?>
                                                        <div class="row row-gestao-fase">
                                                            <div class="col-12">
                                                                <div class="fases" fase_id="<?= $value['ID'] ?>">
                                                                    <h4 class="titulo-fase">Fase: <?= $value['nome_fase'] ?></h4>
                                                                    <h6 class="status-fase">Status: <?= $value['status'] ?></h6>
                                                                    <?php 
                                                                        if($incio_proxima_fase == 'manual' && $now > strtotime($value['data_encerramento'])  && $value['status'] == "Em progresso" ){
                                                                            ?>
                                                                            <button type="button" id="finalizaFaseManual" fase_id="<?= $value['ID'] ?>" campeonato_id="<?= $campeonato_id ?>">Finalizar Fase</button>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-md-12">
                                                                            <p class="label-data-fase">Data início:</p>
                                                                            <input <?= $status ?> required="" type="datetime-local" name="data_inicio_<?= $value['ID'] ?>" value="<?= str_replace(' ','T',$value['data_inicio'])?>">
                                                                        </div>

                                                                        <div class="col-lg-6 col-md-12">
                                                                            <p class="label-data-fase">Data término:</p>
                                                                            <input <?= $status ?> required="" type="datetime-local" name="data_termino_<?= $value['ID'] ?>" value="<?=  str_replace(' ','T',$value['data_encerramento'])?>">
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" required="" name="fase_id[]" value="<?=  $value['ID']  ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <div class="row row-bnt-salvar-datas">
                                                        <div class="col col-bnt-salvar-datas">
                                                            <input id="salvar-datas-fases" type="submit" value="Salvar Datas">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        <?php
                                        }else{
                                            echo '<div class="gestao-fases">';
                                            foreach ($results as $key => $value) {
                                                ?>
                                                
                                                    <div class="row row-gestao-fase">
                                                        <div class="col-12">
                                                            <div class="fases">
                                                                <h4 class="titulo-fase">Fase: <?= $value['nome_fase'] ?></h4>
                                                                <h6 class="status-fase">Status: <?= $value['status'] ?></h6>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <p class="label-data-fase">Data início:</p>
                                                                        <span class="label-data-fase"><?= date('d/m/Y H:i:s',strtotime($value['data_inicio']))?></span>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <p class="label-data-fase">Data término:</p>
                                                                        <span class="label-data-fase"><?= date('d/m/Y H:i:s',strtotime($value['data_encerramento']))?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                            }
                                            echo '</div>';
                                        }
                                    }else{
                                        //(math)Se não tiver resuldos, vai liberar o botão para gerar uma nova tabela
                                        if($now > strtotime($data_encerramento_inscricao) && $usuario_logado && $usuario_author){
                                            ?>
                                            <div class="row m-3">
                                                <button onclick="gerarTabela(<?= $campeonato_id ?>)" class="btn btn-warning m-auto w-25">Gerar Tabela</button>
                                            </div>
                                            <?php
                                        }
                                    }

                                    $sql = "
                                        SELECT 
                                            *,
                                            j.ID as 'jogo_id'
                                        FROM 
                                            {$tabela_campeonato_jogos} as j
                                        INNER JOIN 
                                            {$tabela_campeonato_fases} as f
                                        ON 
                                            f.ID = j.fase_id
                                        -- LEFT JOIN 
                                        --    {$tabela_campeonato_jogos_solicitacao} as js
                                        -- ON 
                                        --    js.jogo_id = j.ID
                                        WHERE 
                                            f.campeonato_id = {$campeonato_id}
                                            --AND
                                            -- (js.acao = 'Postagem'  OR js.acao IS NULL OR js.acao = 'Sistema finalizando jogo por motivo de Falta de postagem de resultado')
                                        ORDER BY 
                                            fase_id DESC,numero_do_jogo ASC
                                    ";
                                    $sql = "
                                        SELECT 
                                            *,
                                            j.ID as 'jogo_id',
                                            f.id as jogo_fase_id
                                        FROM 
                                            {$tabela_campeonato_jogos} as j
                                        INNER JOIN 
                                            {$tabela_campeonato_fases} as f
                                        ON 
                                            f.ID = j.fase_id
                                        WHERE 
                                            f.campeonato_id = {$campeonato_id}
                                        ORDER BY 
                                            fase_id DESC,numero_do_jogo ASC
                                    ";                                    
                                    $results = $wpdb->get_results($sql,ARRAY_A);
                                    $acesso_wo = true;
                                    foreach ($results as $key) {
                                        if($key['time_1_id']){
                                            $time_1_nome = $dados_times[$key['time_1_id']]['time_nome'];
                                            $time_1_capitao = $dados_times[$key['time_1_id']]['time_capitao'];
                                        }else{
                                            if($key['time_1_id'] === NULL){
                                                $time_1_nome = '-';
                                                $acesso_wo = false;
                                            }else{
                                                $time_1_nome = 'WO';
                                            }
                                            $time_1_capitao = null;
                                        }
                                        if($key['time_2_id']){
                                            $time_2_nome = $dados_times[$key['time_2_id']]['time_nome'];
                                            $time_2_capitao = $dados_times[$key['time_2_id']]['time_capitao'];
                                        }else{                                            
                                            if($key['time_2_id'] === NULL){
                                                $time_2_nome = '-';
                                                $acesso_wo = false;
                                            }else{
                                                $time_2_nome = 'WO';
                                            }
                                            $time_2_capitao = null;
                                        }
                                        $time_vencedor_id  = ($key['resultado_status'] == 'Confirmado') ? $key['vencedor_id'] : 'N' ;
                                        ?>
                                        <div class="fase">
                                            <?php
                                                if($key['numero_do_jogo'] == 1){
                                                    echo '<h1 class="title-single">'.$key['nome_fase'].'</h1>';
                                                }
                                            ?>
                                            <?php 
                                                //if ($campeonato_iniciado == 1 && $usuario_logado  &&  ($user_id == $time_1_capitao || $user_id == $time_2_capitao || $usuario_author) && $key['wo'] == 'Não' && ($key['resultado_status'] == 'Em Aberto' || ($key['resultado_status'] == 'Contestado' && ($usuario_author || $permissao_global))) && $acesso_wo &&  ($usuario_author || empty($key['data_encerramento']) || $now < strtotime($key['data_encerramento']) ) ) {
                                                if ($campeonato_iniciado == 1 && $usuario_logado  &&  $usuario_author && $key['wo'] == 'Não' && ($key['resultado_status'] == 'Em Aberto' || ($key['resultado_status'] == 'Contestado' && ($usuario_author || $permissao_global))) && $acesso_wo &&  ($usuario_author || empty($key['data_encerramento']) || $now < strtotime($key['data_encerramento']) ) ) { ?>
                                                    <div class="times">
                                                        <div class="row justify-content-center">
                                                            <div class="col-11" style="border: 1px solid #000; background-color: #d2d2d2; padding: 15px 50px;  margin-bottom: 5px; ">
                                                                <div class="row">
                                                                    <div class="col-1">
                                                                        <?php 
                                                                        if (get_field('campeonato_em_equipe', $campeonato_id) == "Sim"){
                                                                            $img =  wp_get_attachment_url($dados_times[$key['time_1_id']]['time_imagem']);
                                                                            echo ($img==false) ? '<img class="img-time-tabela" src="'. AABB_THEME_URI . '/img/Icons/img-time-sem-foto.png">' : '<img class="card-img-top" src="'.$img.'">';
                                                                        }else{
                                                                            $img =  wp_get_attachment_url(get_userdata($key['time_1_id'])->user_image);
                                                                            echo ($img==false) ? '<img class="img-time-tabela" src="'. AABB_THEME_URI . '/img/avatar-padrao.jpg">' : '<img class="card-img-top" src="'.$img.'">';
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <div class="time_1"><p class="texto-jogo-tabela"><?= $time_1_nome ?></p></div>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        <div class="time_1">
                                                                            <input type="number" pattern="^[0-9]" min="0" step="0"   name="resultado-time-1-<?=$key['jogo_id']?>" id="resultado-time-1-<?=$key['jogo_id']?>" class="input-resultados-jogos" value="<?= $key['resultado_time_1'] ?>" data-time="<?= $key['time_1_id'] ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-2"><p class="icon-x">X</p></div>
                                                                    <div class="col-1">
                                                                        <div class="time_1">
                                                                            <input type="number" pattern="^[0-9]" min="0" step="0"  name="resultado-time-2-<?=$key['jogo_id']?>" id="resultado-time-2-<?=$key['jogo_id']?>" class="input-resultados-jogos" value="<?= $key['resultado_time_2'] ?>" data-time="<?= $key['time_2_id'] ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <div class="time_1"><p class="texto-jogo-tabela"><?= $time_2_nome ?></p></div>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        <?php 
                                                                        if (get_field('campeonato_em_equipe', $campeonato_id) == "Sim"){
                                                                            $img =  wp_get_attachment_url($dados_times[$key['time_2_id']]['time_imagem']);
                                                                            echo ($img==false) ? '<img class="img-time-tabela" src="'. AABB_THEME_URI . '/img/Icons/img-time-sem-foto.png">' : '<img class="card-img-top" src="'.$img.'">';
                                                                        }else{
                                                                            $img =  wp_get_attachment_url(get_userdata($key['time_2_id'])->user_image);
                                                                            echo ($img==false) ? '<img class="img-time-tabela" src="'.AABB_THEME_URI.'/img/avatar-padrao.jpg">' : '<img class="card-img-top" src="'.$img.'">';
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                if($key['resultado_status'] == 'Contestado' && ($usuario_author || $permissao_global)){
                                                                    ?>
                                                                    <div class="col-12 col-btn-finalizar-contestacao-resultado">
                                                                        <a class="btn-finalizar-contestacao-resultado" data-jogo="<?=$key['jogo_id']?>" href="javascript:void(0)">Finalizar contestação</a>
                                                                    </div>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <div class="row">
                                                                        <div class="col-12 col-btn-salvar-resultado">
                                                                            <a class="btn-salvar-resultado" campeonato_id="<?= $campeonato_id ?>" data-jogo="<?=$key['jogo_id']?>" href="javascript:void(0)">Salvar resultado</a>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                } 
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php
                                                }else{
                                            ?>
                                                    <div class="times">
                                                        <div class="row justify-content-center">
                                                            <div class="col-10" style="border: 1px solid #000; background-color: #313131; padding: 15px 50px;  margin-bottom: 5px; color: #fff;">
                                                                <div class="row">
                                                                    <div class="col-1">
                                                                        <?php 
                                                                        echo ($time_vencedor_id==$key['time_1_id']) ?'<img  class="vencedor-aabb" src="'.AABB_THEME_URI . '/img/icon-vencedor.png">':'';
                                                                        if (get_field('campeonato_em_equipe', $campeonato_id) == "Sim"){
                                                                            $img =  wp_get_attachment_url($dados_times[$key['time_1_id']]['time_imagem']);
                                                                            echo ($img==false) ? '<img class="img-time-tabela" src="'. AABB_THEME_URI . '/img/Icons/img-time-sem-foto.png">' : '<img class="card-img-top" src="'.$img.'">';
                                                                        }else{
                                                                            $img =  wp_get_attachment_url(get_userdata($key['time_1_id'])->user_image);
                                                                            echo ($img==false) ? '<img class="img-time-tabela" src="'. AABB_THEME_URI . '/img/avatar-padrao.jpg">' : '<img class="card-img-top" src="'.$img.'">';
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <div class="time_1"><p class="texto-jogo-tabela"><?= $time_1_nome ?></p></div>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        <div class="time_1"><p class="texto-jogo-tabela"><?= $key['resultado_time_1'] ?></p></div>
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <p class="icon-x">X</p>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        <div class="time_1"><p class="texto-jogo-tabela"><?= $key['resultado_time_2'] ?></p></div>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <div class="time_1"><p class="texto-jogo-tabela"><?= $time_2_nome ?></p></div>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        <?php 
                                                                        if (get_field('campeonato_em_equipe', $campeonato_id) == "Sim"){
                                                                            $img =  wp_get_attachment_url($dados_times[$key['time_2_id']]['time_imagem']);
                                                                            echo ($img==false) ? '<img class="img-time-tabela" src="'. AABB_THEME_URI . '/img/Icons/img-time-sem-foto.png">' : '<img class="card-img-top" src="'.$img.'">';
                                                                        }else{
                                                                            $img =  wp_get_attachment_url(get_userdata($key['time_2_id'])->user_image);
                                                                            echo ($img==false) ? '<img class="img-time-tabela" src="'.AABB_THEME_URI.'/img/avatar-padrao.jpg">' : '<img class="card-img-top" src="'.$img.'">';
                                                                        }
                                                                        echo ($time_vencedor_id == $key['time_2_id']) ? '<img  class="vencedor-aabb" src="'.AABB_THEME_URI . '/img/icon-vencedor.png">' : ''
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row resultado-situacao-descricao" align="center">
                                                                    <p>
                                                                    <?php 
                                                                        switch($key['resultado_status']){
                                                                            case 'Confirmado' : 
                                                                                echo 'Finalizado';
                                                                            break;
                                                                            case 'Confirmacao pendente' : 
                                                                                echo 'Aguardando confirmação de resultado';
                                                                            break;
                                                                            case 'Contestado' : 
                                                                                echo 'Aguardando avaliação de resultado';
                                                                            break;
                                                                            default: 
                                                                                echo 'Em aberto';
                                                                            break;
                                                                        }
                                                                    ?>
                                                                    </p>
                                                                </div>
                                                                <?php 
                                                                //(math) Agora verifica se o campeonato já foi iniciado antes de liberar a inserção de resultados
                                                                if($campeonato_iniciado && $usuario_logado  &&  ($user_id == $time_1_capitao || $user_id == $time_2_capitao || $usuario_author) && $key['wo'] == 'Não' && $acesso_wo && ($usuario_author || empty($key['data_encerramento']) || $now < ( strtotime($key['data_encerramento']))) ){
                                                                    if($key['resultado_status'] == 'Confirmacao pendente'){
                                                                        $sql_busca_autor_postagem = "
                                                                            SELECT 
                                                                                user_id 
                                                                            FROM 
                                                                                {$tabela_campeonato_jogos_solicitacao} 
                                                                            WHERE 
                                                                                jogo_id={$key['jogo_id']} 
                                                                            AND
                                                                                acao = 'Postagem'
                                                                        ";                                                                        
                                                                        $resultado = $wpdb->get_results($sql_busca_autor_postagem,ARRAY_A);
                                                                        if($user_id != $resultado[0]['user_id']){
                                                                            $time_id_solicitante =  ($resultado[0]['user_id'] == $time_1_capitao) ? $key['time_2_id'] : $key['time_1_id'];
                                                                            ?>
                                                                            <div class="row">
                                                                                <div class="col-lg-6 col-btn-confirmar-resultado">
                                                                                    <a class="btn-confirmar-resultado" data-jogo="<?=$key['jogo_id']?>" href="javascript:void(0)">Confirmar resultado</a>
                                                                                </div>
                                                                                <div class="col-lg-6 col-btn-contestar-resultado">
                                                                                    <!-- <a class="btn-contestar-resultado" data-jogo="<?=$key['jogo_id']?>" href="javascript:void(0)">Contestar resultado</a> -->
                                                                                    <button type="button" class="btn-contestar-resultado" onclick="reportar(<?= $campeonato_id.','.$key['jogo_id'].','.$time_id_solicitante.','.$key['jogo_fase_id'] ?>,'Contestar resultado do jogo')" data-toggle="modal">Contestar resultado</button>
                                                                                </div>
                                                                            </div>
                                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-contestacoes" role="tabpanel" aria-labelledby="nav-contestacoes-tab">
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th>Solicitante</th>
                                            <th>E-mail</th>
                                            <th>Assunto</th>
                                            <th>Data abertura</th>
                                            <th>Data atualização</th>
                                            <th>Situação</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody class="lista-solicitacoes">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body modal-body-custom">
                            <?php
                            if ($usuario_logado) { ?>
                                <div class="dadods-extras-campeonatos">
                                    <?php $equipe = get_field('campeonato_em_equipe', $campeonato_id)?>
                                    <?php if ($equipe == "Sim"){ ?>
                                        <div class="row justify-content-between row-listagem-times-inscricao">
                                        <p class="nome-time-inscricao">Qual equipe deseja inscrever?</p>
                                        
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
                                                                <p class="card-text">Criação: <?= date('d/m/Y',strtotime($key['time_data_criacao']) - 10800)?></p>
                                                            </div>
                                                            <div class="card-footer ">
                                                                 <button class="btn btn-warning  btn-lg btn-block bnt-ver-membros" data-time-id="<?= $key['ID'] ?>">Escolher jogadores<i class="fa fa-edit" title="Editar time"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                            }
                                            ?>
                                            
                                        </div>
                                        <div class="row row-listagem-membros-inscricao">
                                        	<p class="nome-time-inscricao">Quais jogadores deseja inscrever?</p>
                                            <div class="col-12">
                                        		<table id="membros-time-inscricao" class="table table-striped table-dark">
                                        			<thead>
                                        				<tr>
    													    <th scope="col">#</th>
    													    <th scope="col">Jogador</th>
                                                            <th scope="col">Nickname no jogo</th>
    											    	</tr>
    											    </thead>
    											    <tbody>
    											    	
    											    </tbody>
                                        		</table>
                                        	</div>
                                            <div class="row row-botoes-inscricao">
                                                <div class="col-6">
                                                    <button class="btn btn-danger btn-block btn-cancelar-inscricao-jogadores">Voltar<i class="fa fa-edit" title="Aceitar convite"></i></button>
                                                    
                                                </div>
                                                <div class="col-6">
                                                    <button class="btn btn-success btn-block btn-salvar-jogadores">Confirmar inscrição<i class="fa fa-edit" title="Aceitar convite"></i></button>
                                                    
                                                </div>
                                            </div>
                                            <input type="hidden" name="time-selecionado" id="time-selecionado">
                                            <input type="hidden" name="campeonato-id" id="campeonato-id" value="<?php echo $campeonato_id?>">
                                            <input type="hidden" name="capitao-id" id="capitao-id" value="<?php echo $user_id?>">
                                        </div>
                                    <?php }else{?>
                                        <?php 
                                        	$socio_aabb = get_user_meta($user_id, 'socio_aabb', true);
                                         	$cidade_aabb = get_user_meta($user_id, 'cidade_aabb', true);
                                         	$user_cpf = get_user_meta($user_id, 'user_cpf', true);
                                         	if($categoria != "AABB GAMERS" || ($categoria == "AABB GAMERS" && $socio_aabb == "Sim" && $cidade_aabb != '' && $user_cpf != '')) { ?>
	                                        <label for="id-jogo">Identificador no jogo</label>
	                                        <input type="text" name="id_jogo">
	                                        <button type="button" class="action-inscrevase" data-user-id="<?php echo $user_id; ?>" data-campeonato-id="<?php echo $campeonato_id?>" data-equipe="<?php echo $equipe?>">Enviar</button>
                                  		<?php }else{ ?>
                                  			<p>Para participar deste campeonato, você precisar ser sócio de alguma AABB, e ter o CPF cadastrado na plataorma!</p>
                                  			<p>Verifique seus dados cadastrais, <a href="/meus-dados/">clicando aqui</a></p>
                              			<?php } ?>
                                    <?php }?>
                                </div>
                                <div class="box-confirmacao-sucesso" style="display: none">
                                    <?php if (empty(get_field('link_de_pagamento', $campeonato_id))){?>
                                        <h3 class="texto-register">Sua inscrição no campeonato foi realizada com sucesso!</h3>
                                    <?php }else{ ?>
                                        <h3 class="texto-register">Sua pré-inscrição no campeonato foi realizada com sucesso! Sua inscrição será efetivada após recebermos a confirmação do pagamento, que deve ser realizada atravéz do link abaixo.</h3>
                                        <a href="<?php echo get_field('link_de_pagamento', $campeonato_id);?>"><?php echo get_field('link_de_pagamento', $campeonato_id);?></a>
                                    <?php } ?>
                                </div>
                                <div class="box-confirmacao-erro" style="display: none">
                                    <h3 class="texto-register">Desculpe, ocorreu um erro inesperado em sua inscrição!</h3>
                                </div>
                            <?php
                            } else { ?>
                                <div class="row">
                                    <div class="box-texto-register">
                                        <h3 class="texto-register">Para se cadastrar nesse campeonato, você precisa estar online no site.</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="bnt-register" href="<?php bloginfo('url');?>/registre-se?redirect=<?php echo get_the_permalink()?>">Criar conta</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="bnt-login" href="<?php bloginfo('url');?>/wp-login.php?redirect=<?php echo get_the_permalink()?>">Entrar</a>
                                    </div>
                                </div>

                            <?php
                            } ?>
                            <?php //    echo do_shortcode('[user_registration_form id="96"]')?>
                        </div>

                    </div>
                </div>
            </div>
            <div id="modal-membros-time">
                <div class="modal-body modal-body-custom">
                    <div class="row justify-content-center row-listagem-membros-inscricao">
                        <div class="col-10 offset-1">
                            <p class="nome-time-inscricao">Jogadores inscritos por esse time</p>
                            <span class="btn-close" onclick="fecharModaljogadoresCamp()">X</span>
                            <table id="membros-time-inscritos-camp" class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-left">Jogador</th>
                                        <th scope="col" class="text-left">Nickname</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div id="modal-edicao-membros-time">
                <div class="modal-body modal-body-custom">
                    <div class="row justify-content-center row-listagem-edicao-membros-inscricao">
                        <div class="col-10 offset-1">
                            <p class="nome-time-inscricao">Jogadores inscritos por esse time</p>
                            <span class="btn-close" onclick="fecharModalEdicaojogadoresCamp()">X</span>
                            <table id="membros-edicao-inscritos-camp" class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-left">Jogador</th>
                                        <th scope="col" class="text-left">Nickname</th>
                                        <th scope="col" class="text-left">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function fecharModaljogadoresCamp(){
            $('#modal-membros-time').hide();
            $('.lista-jogadores').remove();
        }
        function fecharModalEdicaojogadoresCamp(){
            $('#modal-edicao-membros-time').hide();
            $('.lista-jogadores').remove();
        }
        function contestarResultados(){
            $('form#solicitacaoAdmin').submit(function(e){
                e.preventDefault();
                var form = document.querySelector('form#solicitacaoAdmin');
                var data = new FormData(form);
                data.append('action','ContestarResultadoJogo');
                $.ajax({
                    url : '/wp-admin/admin-ajax.php',
                    type : 'POST',
                    processData: false,
                    contentType: false,
                    data : data
                }).done(function(data){
                    console.log(data)
                    alert(data['mensagem']);
                    location.reload()
                })
            });        
        }
        function Concluirchamado(){
            $('form#Concluirchamado').submit(function(e){
                e.preventDefault();
                var form = document.querySelector('form#Concluirchamado');
                var data = new FormData(form);
                data.append('action','fecharChamado');
                $.ajax({
                    url : '/wp-admin/admin-ajax.php',
                    type : 'POST',
                    processData: false,
                    contentType: false,
                    data : data
                }).done(function(data){
                    console.log(data)
                    alert(data['mensagem']);
                    $('#modalConcluirchamado').modal('hide');
                    $('#modalConcluirchamado').remove();
                    location.reload()
                })
            });           
        }
        function reportar(campeonato_id,jogo_id,solicitante,fase_id,contestar){
            $('#modalSolicitacao').remove();
            modal =
            `<div class="modal fade" id="modalSolicitacao" tabindex="-1" role="dialog" aria-labelledby="modalSolicitacao" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="" method="POST" id="solicitacaoAdmin" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Solicitação</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                    
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">E-mail</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="assunto">Assunto</label>
                                    <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Digite aqui o assunto" value="${contestar}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="mensagem">Mensagem</label>
                                    <textarea required id="mensagem" name="mensagem" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="arquivo">Arquivo (Print para comprovação)</label>
                                    <input type="file" name='arquivo' required class="form-contro">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Enviar solicitação</button>
                        </div>
                        <input type="hidden" value="${campeonato_id}" name="campeonato_id">
                        <input type="hidden" value="${jogo_id}" name="jogo_id">
                        <input type="hidden" value="${fase_id}" name="fase_id">
                        <input type="hidden" value="${solicitante}" name="time_id">
                    </form>
                </div>
              </div>
            </div>`;
            $('body').append(modal);
            $('#modalSolicitacao').modal('show');
            contestarResultados();
        }      
        function concluir(chamado_id){
            $('#modalConcluirchamado').remove();
            modal =
            `<div class="modal fade" id="modalConcluirchamado" tabindex="-1" role="dialog" aria-labelledby="modalConcluirchamado" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="" method="POST" id="Concluirchamado" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Solicitação</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                    
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="mensagem_para_solicitante">Informe uma mensagem para o solicitante</label>
                                    <textarea required id="mensagem_para_solicitante" name="mensagem_para_solicitante" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="arquivo_para_solicitante">Anexe um arquivo para o solicitante</label>
                                    <input type="file" name='arquivo_para_solicitante'  class="form-contro">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Finalizar solicitação</button>
                        </div>
                        <input type="hidden" value="${chamado_id}" name="chamado_id">
                    </form>
                </div>
              </div>
            </div>`;
            $('body').append(modal);
            $('#modalConcluirchamado').modal('show');
            Concluirchamado();
        }      
        function atenderChamado(chamado_id){
            $('#modalAtendimento').remove();
            $.ajax({
                url : '/wp-admin/admin-ajax.php',
                method : 'POST',
                data :{
                    action : 'buscaChamado',
                    chamado_id : chamado_id
                }
            }).done(function(data){
                console.log(data);
                modal =
                `<div class="modal fade" id="modalAtendimento" tabindex="-1" role="dialog" aria-labelledby="modalAtendimento" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">                    
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Solicitação</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                    
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="data-solicitacao">Data de solicitação</label>
                                    <input readonly type="text" class="form-control" id="data-solicitacao" value="${data[0]['data']}" name="data-solicitacao" placeholder="Data de solicitação" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="data-atualizacao">Data de atualização</label>
                                    <input readonly type="text" class="form-control" id="data-atualizacao" value="${data[0]['data_atualizacao']}" name="data-atualizacao" placeholder="Data de atualização" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nome_solicitante">Nome</label>
                                    <input readonly type="text" class="form-control" id="nome_solicitante" value="${data[0]['nome_solicitante']}" name="nome_solicitante" placeholder="Nome" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email_solicitante">E-mail</label>
                                    <input readonly type="text" class="form-control" id="email_solicitante" value="${data[0]['email']}" name="email_solicitante" placeholder="E-mail" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="assunto_solicitante">Assunto</label>
                                    <input readonly type="text" class="form-control" id="assunto_solicitante"  value="${data[0]['solicitacao']}" name="assunto_solicitante" placeholder="Digite aqui o assunto" value="" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="jogo_report">Jogo</label>
                                    <div class="jogo_report_placar">
                                        <label>${data[0]['jogo'][0]['time_nome']}</label>
                                        <label>${data[0]['jogo'][0]['time_resultado']}</label>
                                        <label class="icon-x">X</label>
                                        <label>${data[0]['jogo'][1]['time_resultado']}</label>
                                        <label>${data[0]['jogo'][1]['time_nome']}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="mensagem_solicitante">Mensagem</label>
                                    <textarea readonly required id="mensagem_solicitante"name="mensagem_solicitante" class="form-control">${data[0]['mensagem']}</textarea>
                                </div>
                            </div>`;
                            if(data[0]['arquivo']){
                                modal+=
                                `<div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="arquivo">Arquivo (Print para comprovação)</label>
                                        <button>
                                        <a download="${data[0]['nome_solicitante']}${data[0]['data']}" href="${data[0]['arquivo']}" title="ImageName">
                                            Download
                                        </a>
                                    </div>
                                </div>`;
                            }
                            if(data[0]['retorno_mensagem']){
	                            modal+=
	                        	`<div class="form-row">
	                                <div class="form-group col-md-12">
	                                    <label for="mensagem_retorno">Retorno</label>
	                                    <textarea readonly required id="mensagem_retorno" name="mensagem_retorno" class="form-control">${data[0]['retorno_mensagem']}</textarea>
	                                </div>
	                            </div>`;
	                        }
                            if(data[0]['arquivo_retorno']){
	                            modal +=
	                            `<div class="form-row">
	                                <div class="form-group col-md-12">
	                                    <label for="arquivo">Arquivo retorno</label>
	                                    <button>
	                                    <a download="Retorno" href="${data[0]['arquivo_retorno']}" title="ImageName">
	                                        Download
	                                    </a>
	                                </div>
	                            </div>`;
	                        }
	                        modal+=
                            `</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>`;
                                    if(data[0]['status'] != 'Finalizado' && data[0]['permissao_global']){
                                        modal +=`<button type="button" class="btn btn-primary" onclick="concluir(${data[0]['ID']})">Concluir chamado</button>`;
                                    }   
                                modal +=`</div>                    
                        </div>
                    </div>
                                </div>`;
                $('body').append(modal);
                $('#modalAtendimento').modal('show');
            });
        }  
        function iniciaCampeonato(campeonato_id){
            $.ajax({
                url : '/wp-admin/admin-ajax.php',
                method : 'POST',
                data :{
                    action : 'iniciaCampeonato',
                    campeonato_id : campeonato_id
                }
            }).done(function(data){
                alert(data['mensagem']);
                if(data['error'] == false){
                    location.reload();
                }
            });
        }
        //(math)função para gerar a tabela
        function gerarTabela(campeonato_id){
            $.ajax({
                url : '/wp-admin/admin-ajax.php',
                method : 'POST',
                data :{
                    action : 'gerarTabela',
                    campeonato_id : campeonato_id
                }
            }).done(function(data){
                alert(data['mensagem']);
                console.log(data);
                if(data['error'] == false){
                    location.reload();
                }
            });
        }

        $('#nav-contestacoes-tab').on('click',function(){
            $('table .lista-solicitacoes tr').remove();
            $.ajax({
                url : '/wp-admin/admin-ajax.php',
                method : 'POST',
                data :{
                    action : 'buscaSolicitacoes',
                    campeonato_id : $(this).attr('campeonato_id')
                }
            }).done(function(data){
                console.log(data);
                if(data.length == 0){
                    $('table .lista-solicitacoes').append('<tr><td colspan="7">Nenhuma informação encontrada...</td></tr>'); 
                }else{
                    $(data).each(function(index){
                        var solicitacoes =
                        `<tr>
                            <td>${data[index]['nome_solicitante']}</td>
                            <td>${data[index]['email']}</td>
                            <td>${data[index]['solicitacao']}</td>
                            <td>${data[index]['data']}</td>
                            <td>${data[index]['data_atualizacao']}</td>
                            <td>${data[index]['status']}</td>
                            <td>
                                <button class="btn btn-primary atender-chamado" onclick="atenderChamado(${data[index]['ID']})" chamado_id="${data[index]['ID']}">Visualizar</button>
                                <br>`
                                if(data[index]['status'] != 'Finalizado' && data[0]['permissao_global'] ){
                                    solicitacoes +=`<button class="btn btn-success " onclick="concluir(${data[index]['ID']})" chamado_id="${data[index]['ID']}">Concluir</button>`;
                                }
                            solicitacoes+= `</td>
                        </tr>`;
                        $('table .lista-solicitacoes').append(solicitacoes);
                    });
                }
            });
        });
        
    </script>
    <style type="text/css">
        .vencedor-aabb{
            width: 20px;
            float: left;
            display: flex;
            position: absolute;
            left: -24px;
            top: 12px;
            padding: 2px 1px 1px 4px;
        }
        .resultado-situacao-descricao{
            justify-content: center;
        }
        .resultado-situacao-descricao p{
            /*background-color: #f8e100;
            padding: 5px;
            color: #000;*/
            color: #f8e100;
        }
    </style>
    <?php
}
get_footer();
    
