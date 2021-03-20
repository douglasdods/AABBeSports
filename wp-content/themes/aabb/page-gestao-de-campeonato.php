<?php
get_header();
while ( have_posts() ) {
    the_post();
    ?>
    <div class="container-fluid container-page">
        <section class="crumbs">
            <div class="row">
                <div class="col-12">
                    <h1 class="title-single"><?php echo get_the_title(); ?></h1>
                </div>

            </div>
        </section>
        <section class="article content">
            <?php 
                $campeonato_id = $_GET['campeonato'];
                if(!intval($campeonato_id) && empty($campeonato_id)){
                    header('Location:'.home_url());
                }
                else{
                    $campeonato = get_post($campeonato_id);
                    ?>
                    <div class="col-12">
                        <h1 class="title-single"><?php echo $campeonato->post_title; ?></h1>
                    </div>
                    <div class="acoes-campeonato ">
                        <div class="col-4 offset-4">
                            <?php
                            $campeonato_iniciado = get_post_meta($campeonato_id,'campeonato_iniciado',true);
                            if(!$campeonato_iniciado){
                                ?>
                                    <button onclick="iniciaCampeonato(<?= $campeonato_id ?>)" class="btn btn-warning  btn-block">Iniciar campeonato</button>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="informacoes-do-campeonato">
                        <div class="list-campeonato">
                            <h5>Nome:<span><?= $campeonato->post_title; ?></span></h5>
                        </div>
                        <div class="list-campeonato">
                            <h5>Local:<span><?= get_field('local',$campeonato_id) ?></span></h5>
                        </div>
                        <div class="list-campeonato">
                            <h5>Data Início:<span><?= date("d/m/Y H:i", strtotime(get_field('data',$campeonato_id))) ?></span></h5>
                        </div>
                        <div class="list-campeonato">
                            <h5>Plataforma:<span><?= get_field('plataforma',$campeonato_id) ?></span></h5>
                        </div>
                        <div class="list-campeonato">
                            <h5>Jogo:<span><?= get_the_title(get_field('jogo',$campeonato_id)) ?></span></h5>
                        </div>
                    </div>
                    <div class="times-do-campeonato">
                        <?php
                            global $wpdb;
                            $times_campeonato = $wpdb->get_results("
                                SELECT 
                                    tm.time_nome
                                FROM 
                                    {$wpdb->prefix}_sis__time as tm
                                INNER JOIN 
                                    {$wpdb->prefix}_sis__campeonatos_times as camp_time
                                ON 
                                    tm.ID = camp_time.time_id  
                                WHERE 
                                    camp_time.campeonato_id={$campeonato_id}
                            ",ARRAY_A);
                            if(empty($times_campeonato)){
                                ?>
                                <div class="sem-times">Nenhum time inscrito neste campeonato.</div>
                                <?php
                            }else{
                                ?>
                                <table class="table table-responsivectable-bordered table-dark">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>Membros</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($times_campeonato as $key => $value) {
                                            echo '<tr>';
                                                echo   '<td>'.$value['time_nome'].'</td>';
                                                echo   '<td><button class="btn btn-warning  btn-block">Ver membros</button></td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                        ?>
                    </div>
                    <?php                    
                }
            ?>
            <div class="col-12">
                <h1 class="title-single">Chaveamento</h1>
            </div>
            <div class="lista-chaveamento">
                <?php 
                $user_id = get_current_user_id();
                $sql = "
                    SELECT 
                        *,
                        j.ID as 'jogo_id'
                    FROM 
                        {$wpdb->prefix}_sis__campeonatos_jogos as j
                    INNER JOIN 
                        {$wpdb->prefix}_sis__campeonatos_fases as f
                    ON 
                        f.ID = j.fase_id
                    WHERE 
                        f.campeonato_id = {$campeonato_id}
                    ORDER BY 
                        fase_id DESC,numero_do_jogo ASC
                ";
                $results = $wpdb->get_results($sql,ARRAY_A);
                foreach ($results as $key) {
                    //print_r($key);
                    if($key['time_1_id']){
                        $sql_time_1 = "SELECT * FROM {$wpdb->prefix}_sis__time WHERE ID ={$key['time_1_id']}";
                        $time = $wpdb->get_results($sql_time_1,ARRAY_A);
                        $time_1_nome = $time[0]['time_nome'];
                        $time_1_capitao = $time[0]['user_id_capitao'];
                    }else{
                        $time_1_nome = 'WO';
                        $time_1_capitao = null;
                    }
                    if($key['time_2_id']){
                        $sql_time_2 = "SELECT * FROM {$wpdb->prefix}_sis__time WHERE ID ={$key['time_2_id']}";
                        $time = $wpdb->get_results($sql_time_2,ARRAY_A);
                        $time_2_nome = $time[0]['time_nome'];
                        $time_2_capitao = $time[0]['user_id_capitao'];
                    }else{
                        $time_2_nome = 'WO';
                        $time_2_capitao = null;
                    }
                    ?>
                    <div class="fase">
                        <?php
                            if($key['numero_do_jogo'] == 1){
                                echo '<h1 class="title-single">'.$key['nome_fase'].'</h1>';
                            }
                        ?>
                        <?php 
                            if (is_user_logged_in()  &&  ($user_id == $time_1_capitao || $user_id == $time_2_capitao || is_author($user_id)) && $key['wo'] == 'Não' && $key['resultado_status'] == 'Em Aberto') { ?>
                                <div class="times">
                                    <div class="col-6 offset-3" style="border: 1px solid #000; background-color: #fec32e;padding: 1% ">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="time_1"><?= $time_1_nome ?></div>
                                            </div>
                                            <div class="col-1">
                                                <div class="time_1">
                                                    <input type="text" name="resultado-time-1-<?=$key['jogo_id']?>" id="resultado-time-1-<?=$key['jogo_id']?>" class="input-resultados-jogos" value="<?= $key['resultado_time_1'] ?>" data-time="<?= $key['time_1_id'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-1">X</div>
                                            <div class="col-1">
                                                <div class="time_1">
                                                    <input type="text" name="resultado-time-2-<?=$key['jogo_id']?>" id="resultado-time-2-<?=$key['jogo_id']?>" class="input-resultados-jogos" value="<?= $key['resultado_time_2'] ?>" data-time="<?= $key['time_2_id'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="time_1"><?= $time_2_nome ?></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-btn-salvar-resultado">
                                                <a class="btn-salvar-resultado" data-jogo="<?=$key['jogo_id']?>" href="javascript:void(0)">Salvar resultado</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }else{
                        ?>
                                <div class="times">
                                    <div class="col-6 offset-3" style="border: 1px solid #000; background-color: #fec32e;padding: 1% ">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="time_1"><?= $time_1_nome ?></div>
                                            </div>
                                            <div class="col-1">
                                                <div class="time_1"><?= $key['resultado_time_1'] ?></div>
                                            </div>
                                            <div class="col-1">X</div>
                                            <div class="col-1">
                                                <div class="time_1"><?= $key['resultado_time_2'] ?></div>
                                            </div>
                                            <div class="col-4">
                                                <div class="time_1"><?= $time_2_nome ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </section>        
    </div>
    <script type="text/javascript">
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
    </script>
    <?php
}
get_footer();