<?php
get_header();
while ( have_posts() ) {
    the_post();
    ?>
<div id="content-1-page-quem-somos">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-5 box-col">
                <div class="box-texto-aabb">
                    <div class="box-logo-aabb">
                        <img class="logo-aabb" src="<?php echo AABB_THEME_URI?>/img/logo-aabb.jpg">
                    </div>
                    <p class="texto-aabb">Uma associação assistencial, desportiva, social, educacional, cultural e recreativa, sem fins econômicos, constituída pelos funcionários do Banco do Brasil e pessoas da comunidade.</p>

                </div>
            </div>
            <div class="col-md-12 col-lg-5 box-col">
                <div class="box-texto-aabb">
                    <div class="box-logo-aabb-esports">
                        <img class="logo-aabb" src="<?php echo AABB_THEME_URI?>/img/logo-nova2.png">
                    </div>
                    <p class="texto-aabb">O Projeto foi idealizado para proporcionar um clube com interação e competições de esports aos atletas virtuais das mais diversas modalidades, plataformas e jogos.</p>
                </div>
            </div>
            
        </div>
    </div>
</div>
<div id="content-2-page-quem-somos">
    <div class="container">
        <section class="quem-somos-bloco-2">
            <div class="col-titulo-quem-somos-2">
                <h1 class="titulo-quem-somos-2">CATEGORIA DOS TORNEIOS</h1>
            </div>
            <div class="row justify-content-around row-bloco-2">
                <div class="col-md-12 col-lg-3 box-col">
                    <div class="box-texto-circuitos">
                        <div class="box-img-texto-circuitos">
                          <img src="<?php echo AABB_THEME_URI?>/img/Icons/icon-group.png">
                        </div>
                        <h3 class="titulo-circuitos">OPEN</h3>
                        <p class="texto-circuitos">Aberto para toda comunidade</p>

                    </div>
                </div>
                <div class="col-md-12 col-lg-3 box-col">
                    <div class="box-texto-circuitos">
                       	<div class="box-img-texto-circuitos">
                       		<img src="<?php echo AABB_THEME_URI?>/img/Icons/Jogos-menor.png">
                       	</div>
                       	<h3 class="titulo-circuitos">AABB GAMERS</h3>
                        <p class="texto-circuitos">Exclusivos para os sócios das AABBs de todo o Brasil</p>

                    </div>
                </div>
                <div class="col-md-12 col-lg-3 box-col">
                    <div class="box-texto-circuitos">
                       	<div class="box-img-texto-circuitos">
                       		<img src="<?php echo AABB_THEME_URI?>/img/Icons/icon-bb-players.png">
                       	</div>
                       	<h3 class="titulo-circuitos">BB PLAYERS</h3>
                        <p class="texto-circuitos">Exclusivo para os Funcionários do Banco do Brasil e seus Familiares</p>

                    </div>
                </div>
               
            </div>
        </section>
    </div>
</div>
    <?php
}
get_footer();