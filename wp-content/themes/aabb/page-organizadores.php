<?php
get_header();



//echo "<pre>";
//print_r($organizadores);
//echo "</pre>";

?>
<section id="organizadores">
    <div class="container">
        <div class="row">
            <?php if ($_GET['organizador'] && isset($_GET['organizador'])):?>
                <?php
                $posts_per_page = 10;
                $args = array(
                    'post_type' => 'campeonatos',
                    'posts_per_page' => $posts_per_page,
                    'author__in' => array($_GET['organizador']),
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
                );
                $query = new WP_Query($args);
                $count = $query->found_posts; ?>
                <div class="table-campeonatos col-12 table-responsive-lg">
                    <table class="table table-light">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Campeonato</th>
                                <th scope="col">Organizador</th>
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
                                        $terms = get_the_terms( $post->ID , 'categoria_camp' );
                                        if ( $terms != null ){
                                            foreach( $terms as $term ) {
                                                $categoria = $term->name;
                                            }

                                        } ?>
                                    <tr>
                                        <td><?php echo get_the_title();?></th>
                                        <td><?php echo get_the_title();?></th>
                                        <td><?php echo get_field('local',get_the_ID());?></td>
                                        <td><?php echo date("d/m/Y H:i", strtotime(get_field('data',get_the_ID())));?></td>
                                        <td><?php echo $categoria;?></td>
                                        <td class="col-inscrevase"><a class="bnt-inscrevase-campeonato" href="<?php echo get_the_permalink();?>">Acesse</a></td>
                                    </tr>



                                        <?php
                                    }
                                } ?>
                        </tbody>
                    </table>
                    <div class="row row-paginacao-tabela">
                        <div class="box-links-paginacao">
                            <?php
                            $max_pages = $count / $posts_per_page;
                            $resto = $count % $posts_per_page;
                            if ($resto > 0) {
                                $max_pages = intval($max_pages) + 1;
                            }else{
                                $max_pages = intval($max_pages);
                            }
                            for ($i=1; $i <=$max_pages ; $i++) {
                                ?>
                                <a href="javascript:void(0);" class="link-paginacao <?php echo $i == 1 ? 'current': '';?>"><?= $i?></a>
                                <?php
                            }

                            ?>
                        </div>
                    </div>
                </div>
                ?>
            <?php else: ?>
                <?php $organizadores = get_users( array( 'role__in' => array( 'organizador') ) ); ?>
                <?php $img = AABB_THEME_URI.'/img/avatar-padrao.jpg'; ?>
                <?php foreach ($organizadores as $organizador): ?>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <a href="?organizador=<?= $organizador->data->ID?>">
                            <div class="box-organizador">
                                <img src="<?= $img ?> " class="img-organizador">
                                <h3 class="nome-organizador"><?= $organizador->data->display_name?></h3>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>


<?php
get_footer();