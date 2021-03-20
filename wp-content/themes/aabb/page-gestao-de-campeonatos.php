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
        <section class="article content-todos-campeonatos">
            <div class="row">
                <?php
                wp_reset_query();
                $colunas = 0;
                $args = array(
                    'post_type' => 'campeonatos',
                    'posts_per_page' => 12,
                    /*'meta_query' => array(
                        array(
                            'key' => 'data',
                            'value' => date('Y-m-d H:i:s'),
                            'type' => 'data',
                            'compare' => '>'
                        ),
                    ),*/
                    'orderby' => 'data',
                    'order' => 'ASC',
                    'paged' => $paged,
                );
                $query = new WP_Query($args);

                ?>
                <div class="table-campeonatos col-md-12 table-responsive">
                    <table id="table-todos-campeonatos" class="table table-light">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col">Campeonato</th>
                            <th scope="col">Local</th>
                            <th scope="col">Data</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Plataforma</th>
                            <th scope="col">Jogo</th>
                            <th scope="col">Ação</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();



                                $categoria = '';
                                $terms = get_the_terms( $post->ID , 'categoria_camp' );
                                if ( $terms != null ){
                                    foreach( $terms as $term ) {
                                        $categoria = $term->name;
                                    }

                                }

                                ?>


                                <tr>
                                    <td><?php echo get_the_title();?></th>
                                    <td><?php echo get_field('local',get_the_ID());?></td>
                                    <td><?php echo date("d/m/Y H:i", strtotime(get_field('data',get_the_ID())));?></td>
                                    <td><?php echo $categoria;?></td>
                                    <td><?php echo get_field('plataforma',get_the_ID());?></td>
                                    <td><?php echo get_the_title(get_field('jogo',get_the_ID()));?></td>
                                    <td class="col-inscrevase"><a class="" href="<?php echo home_url().'/gestao-de-campeonato?campeonato='.get_the_ID();?>">Acesse</a></td>
                                </tr>



                                <?php
                            }
                        }

                        ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">Campeonato</th>
                                <th scope="col">Local</th>
                                <th scope="col">Data</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Plataforma</th>
                                <th scope="col">Jogo</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <?php
}
get_footer();