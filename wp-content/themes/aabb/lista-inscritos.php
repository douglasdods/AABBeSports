<?php
global $wpdb;
?>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<style>
    .dt-buttons {
        margin-top: 50px;
        margin-bottom: 30px;
    }
    .dt-buttons .dt-button {
        padding: 15px 33px;
        background: #f1f1f1;
        color: #000;
        border-radius: 5px;
        border: 1px solid rgba(0, 0, 0, 0.3);
    }
</style>

<?php
$campeonato_id = $_GET['campeonato_id'];
if (!empty($campeonato_id)){
    $equipe = get_field('campeonato_em_equipe', $campeonato_id);
    if ($equipe == "Sim") {

        $sql = "SELECT * FROM {$wpdb->prefix}_sis__campeonatos_times WHERE campeonato_id = {$campeonato_id}";
        $results = $wpdb->get_results($sql, ARRAY_A);
        if (!empty($results)){ ?>

            <table id="user-campeonato-admin" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Nome do Time</th>
                    <th>Capitão do time</th>
                    <th>Telefone do Capitão</th>
                    <th></th>

                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($results as $result){
                    $user = get_userdata($result['capitao_id']);
                    $telefone = get_user_meta($user->ID,'user_telefone', true);
                    $sql = "SELECT time_nome FROM {$wpdb->prefix}_sis__time WHERE ID = {$result['time_id']} ";
                    $time = $wpdb->get_results($sql, ARRAY_A);
                    //$user_meta = get_user_meta($result['user_id']);
                    ?>
                    <tr>

                        <td><?php echo $time[0]['time_nome']?></td>
                        <td><?php echo $user->display_name?></td>
                        <td><?php echo $telefone;?></td>
                        <td>
                            <a class="ver-membros-time-campeonato" href="javascript:void(0);" onclick="mostraJogadoresTimeCampeonato(<?php echo $result['time_id']?>, <?php echo $campeonato_id?>)" >Ver jogadores</a></td>

                    </tr>

                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Nome do Time</th>
                    <th>Capitão do time</th>
                    <th>Telefone do Capitão</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
            <div id="modal-membros-time">

                <div class="modal-body modal-body-custom">


                    <div class="row row-listagem-membros-inscricao">
                        <p class="nome-time-inscricao">Jogadores inscritos por esse time</p>
                        <span class="btn-close" onclick="fecharModaljogadoresCamp()">X</span>
                        <div class="col-12">
                            <table id="membros-time-inscritos-camp" class="table table-striped table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">Jogador</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>





                    <?php //    echo do_shortcode('[user_registration_form id="96"]')?>
                </div>


            </div>

            <?php

        }
    }else{
        $users_campeonato = $wpdb->get_results("
            SELECT 
                *
            FROM 
                {$wpdb->prefix}_sis__campeonatos__inscritos as camp_time
            WHERE 
                camp_time.campeonato_id={$campeonato_id}
            AND
                camp_time.time_id = 0
        ");

        if (!empty($users_campeonato)){ ?>

            <table id="user-campeonato-admin" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Nome do Jogador</th>
                    <th>Nickname</th>
                    <th>Telefone do Jogador</th>
                    <th>E-mail</th>
                    <th>AABB</th>
                    <th>CPF</th>

                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($users_campeonato as $result){
                    $user = get_userdata($result->user_id);
                    $telefone = get_user_meta($user->ID,'user_telefone', true);
                    $nick_name = $result->user_jogo_nickname;
                    $email = $user->user_email;
                    $aabb = get_user_meta($user->ID,'cidade_aabb', true);
                    $cpf = get_user_meta($user->ID,'user_cpf', true);


                    ?>
                    <tr>

                        <td><?= $user->display_name ?></td>
                        <td><?= $nick_name ?></td>
                        <td><?= $telefone ?></td>
                        <td><?= $email ?></td>
                        <td><?= $aabb ?></td>
                        <td><?= $cpf ?></td>

                    </tr>

                <?php  } ?>
                </tbody>

            </table>


            <?php

        }
    }
} else {

    ?>
    <div class="row row-campeonatos justify-content-center">

        <?php
        $user_logged = wp_get_current_user();


        wp_reset_query();
        $args = array(
            'post_type' => 'campeonatos',
            'posts_per_page' => -1,
            'orderby' => 'data',
            'order' => 'desc',


        );
        $query = new WP_Query($args); ?>
        <div class="col-md-10 table-responsive-lg">
            <table id="table-campeonatos" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th scope="col">Campeonato</th>
                    <th scope="col">Local</th>
                    <th scope="col">Data</th>
                    <th scope="col">Categoria</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>

                <?php
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        if(get_the_author_meta( 'ID' ) == $user_logged->ID || in_array('administrator', $user_logged->roles)){
                            $categoria = '';
                            $terms = get_the_terms($post->ID, 'categoria_camp');
                            if ($terms != null) {
                                foreach ($terms as $term) {
                                    $categoria = $term->name;
                                }

                            }

                            ?>


                            <tr>
                                <th scope="row"><?php echo get_the_title(); ?></th>
                                <td><?php echo get_field('local', get_the_ID()); ?></td>
                                <td><?php echo date("d/m/Y H:i", strtotime(get_field('data', get_the_ID()))); ?></td>
                                <td><?php echo $categoria; ?></td>
                                <td>
                                    <a href="admin.php?page=inscritos-campeonatos&campeonato_id=<?php echo get_the_ID(); ?>">Ver</a>
                                </td>
                            </tr>


                            <?php
                        }

                    }
                }

                ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
}
?>
<script type="text/javascript">
    function mostraJogadoresTimeCampeonato(time_id, campeonato_id){
        $.ajax({
            beforeSend: function(){

            },
            url: '/wp-admin/admin-ajax.php',
            type: 'POST',
            data: {
                'action' : 'mostrarMembrosTimesCampeonato',
                'time_id' :  time_id,
                'campeonato_id' : campeonato_id
            },
            success: function(response){
                console.log(response);

                $.each(response, function(key,iten){
                    $('#membros-time-inscritos-camp tbody').append('<tr class="lista-jogadores"><td class="text-left">'+iten.nome_jogador+'</td></tr>');
                });
                $('#modal-membros-time').show();
                //$('.row-listagem-membros-inscricao').show();

            }
        });
    }
    function fecharModaljogadoresCamp(){
        $('#modal-membros-time').hide();
        $('.lista-jogadores').remove();
    }
</script>
<style type="text/css">
    #modal-membros-time {
        display: none;
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: #000000ad;
        z-index: 9;
    }
    .btn-close {
        position: absolute;
        right: 25px;
        color: #fff;
        font-size: 20px;
        cursor: pointer;
    }
</style>