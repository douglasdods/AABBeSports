<?php
global $wpdb;

$campeonato_id = $_GET['campeonato_id'];
if (!empty($campeonato_id)){
    $sql = "SELECT user_id, id_jogo, nome_time FROM {$wpdb->prefix}user_campeonato WHERE campeonato_id = {$campeonato_id}";
    $results = $wpdb->get_results($sql, ARRAY_A);
    if (!empty($results)){ ?>
        <table id="user-campeonato-admin" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th >Nome</th>
                    <th>E-mail</th>
                    <th>ID Jogo</th>
                    <th>Time</th>
                    <th>Cidade</th>
                    <th>Funcionario BB</th>
                    <th>Family BB</th>
                    <th>Empresa parceira</th>
                    <th>Sócio AABB</th>

                </tr>
                </thead>
            <tbody>
        <?php
        foreach ($results as $result){
            $user = get_userdata($result['user_id']);
            $user_meta = get_user_meta($result['user_id']);
            ?>
                <tr>

                    <td><?php echo $user->display_name?></td>
                    <td><?php echo $user->user_email?></td>
                    <td><?php echo $result['id_jogo']?></td>
                    <td><?php echo $result['nome_time']?></td>
                    <td><?php echo $user_meta['user_registration_cidade'][0] ?></td>
                    <td><?php echo $user_meta['user_registration_funcionario_bb'][0]." / ". $user_meta['user_registration_user_chave_func_bb'][0]?></td>
                    <td><?php echo $user_meta['user_registration_user_family_bb'][0]." / ".  $user_meta['user_registration_chave_family_bb'][0] ?></td>
                    <td><?php echo $user_meta['user_registration_empresa_parceira'][0]." / ".  $user_meta['user_registration_user_matricula'][0]?></td>
                    <td><?php echo $user_meta['user_registration_user_socio_aabb'][0]." / ".  $user_meta['user_registration_user_cidade_aabb'][0] ?></td>
                </tr>

        <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th >Nome</th>
                    <th>E-mail</th>
                    <th>CPF</th>
                    <th>Cidade</th>
                    <th>Funcionario BB</th>
                    <th>Family BB</th>
                    <th>Empresa parceira</th>
                    <th>Sócio AABB</th>

                </tr>
            </tfoot>
        </table>

   <?php

    }
} else {

    ?>
    <div class="row row-campeonatos justify-content-center">

        <?php
        wp_reset_query();
        $args = array(
            'post_type' => 'campeonatos',
            'posts_per_page' => 10,
            'orderby' => 'data',
            'order' => 'ASC',
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

                ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}
?>