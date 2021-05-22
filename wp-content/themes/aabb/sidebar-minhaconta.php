<?php
$user_id = get_current_user_id();
$id_post = get_user_meta($user->data->ID, 'foto_site');
get_field('_wp_attached_file', $id_post[0]); 
$userdata = get_userdata($user_id); 

$img =  wp_get_attachment_url(get_userdata($user_id)->user_image);
if($img == false){
    $img = AABB_THEME_URI.'/img/avatar-padrao.jpg';
}

?>

<div class="box-sidebar">
    <div class="box-imagem-usuario">
        <?php 
        $id_post = get_user_meta($user->data->ID, 'foto_site');
        get_field('_wp_attached_file', $id_post[0]); 
        $userdata = get_userdata($user_id);
        ?>
        <div class="box-img-user">
            <a class="btn shadow-none change-img-button" href="aabbsite/minha-imagem/">
                <img class="img-user-conta" src="<?php echo $img?>">
                <div class="drop-img-text">
                    <p>Editar Imagem</p>
                </div> 
            </a>
        </div>
    </div>
    <div class="box-nome-usuario">
        <p class="nome-usuario">Olá <?php echo $userdata->display_name?></p>
    </div>
    <div class="box-botoes">
        <a href="/meus-dados/" class="bnt-sidebar">Meus Dados</a>
        <a href="/meus-times/" class="bnt-sidebar">Meus Times</a>
        <a href="/meus-campeonatos/" class="bnt-sidebar">Meus Campeonatos</a>
        <a href="javascript:void(0)" class="btn-logout">Sair</a>
    </div>    

</div>