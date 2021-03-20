<?php
get_header();
while ( have_posts() ) {
    the_post();
    ?>
    <div class="container-fluid container-single">
        <section class="crumbs-single-jogos" style="background-image: url(<?php echo get_field('capa', get_the_ID());?>); background-position: bottom right; background-size: cover;">
            <div class="row">
                <div class="col-12">
                    <h1 class="title-single-jogos"><?php //echo get_the_title(); ?></h1>
                </div>

            </div>
        </section>
        <section class="article-single-jogos">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="texto-single-jogos">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                $args = array(
                    'post_type' => 'campeonatos',
                    'meta_query' => array(
                        /*'relation' => 'AND',
                        array(
                            'key' => 'data',
                            'value' => date('Y-m-d H:i:s'),
                            'type' => 'data',
                            'compare' => '>'
                        ),*/
                        array(
                            'key' => 'jogo',
                            'value' => get_the_ID(),
                            'compare' => '=='
                        ),
                    ),
                    'orderby' => 'data',
                    'order' => 'ASC',
                );
                wp_reset_query();
                $query = new WP_Query($args);
                

                        ?>

                         <div class="table-campeonatos col-10 table-responsive-lg">
                            <table id="table-jogos-campeonatos" class="table table-light">
                                <thead>
                                <tr>
                                    <th>Campeonato</th>
                                    <th>Local</th>
                                    <th>Data</th>
                                    <th>Categoria</th>
                                    <th>Plataforma</th>
                                    <th></th>
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
                                            <td class="col-inscrevase"><a class="bnt-inscrevase-campeonato" href="<?php echo get_the_permalink();?>">inscreva-se</a></td>
                                        </tr>



                                        <?php
                                    }
                                }

                                ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Campeonato</th>
                                        <th>Local</th>
                                        <th>Data</th>
                                        <th>Categoria</th>
                                        <th>Plataforma</th>
                                        
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