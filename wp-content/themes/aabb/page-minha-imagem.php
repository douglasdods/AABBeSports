<?php
get_header();
$user_id = get_current_user_id();
if(is_user_logged_in()){
    global $wpdb;
    $user_id = get_current_user_id();
    $img =  wp_get_attachment_url(get_userdata($user_id)->user_image);
    if($img == false){
        $img = AABB_THEME_URI.'/img/avatar-padrao.jpg';
    }

    ?>
    <div id="page-meus-campeonatos">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-sm-4">
                    <?php get_template_part( 'sidebar', 'minhaconta' ); ?>
                </div>
                <div class="col-lg-8 margin-top-25">
                    <div class="box-cadastro background-azul">
                        <h1 class="title-page">Editar Imagem de Perfil</h1>
                        <div  class="d-flex">
                            <div class="w-50 p-3">
                                <div class="box-card-img">
                                    <img class="card-img-top" style="height: 200px; width: 200px" src="<?php echo $img?>" alt="Card image cap">
                                </div>
                            </div>
                            <div class="w-50 p-3">
                                <form method="POST" id="profile_img" class="w-100">
                                    <input type="file" name="user_image" class="form-control p-1">
                                    <button type="submit" style="border-radius:5px; margin-top: 10px;" class="btn btn-warning">Salvar Imagem</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#profile_img').submit(function(e){
            $('button').attr('disabled',true);
            e.preventDefault();
            var myform = $('#profile_img')[0];
            formData = new FormData(myform);
            formData.append('action','AtualizaImagem');
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                type: 'POST',
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
    </script>
    <?php
    
}
get_footer();