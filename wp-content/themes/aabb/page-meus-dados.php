<?php
get_header();
    
    $user_id = get_current_user_id();
    $id_post = get_user_meta($user->data->ID, 'foto_site');
    get_field('_wp_attached_file', $id_post[0]); 
    $userdata = get_userdata($user_id);
                                   
    ?>
    <div id="page-cadastro" class="background-cinza">
        
        <div class="container container-page margin-top-25">
            <div class="row">
                <div class="col-lg-4 margin-top-25">
                    <?php get_template_part( 'sidebar', 'minhaconta' ); ?>

                </div>
                <div class="col-lg-8 margin-top-25">
                    <div class="box-cadastro background-azul border-radius">
                        
                        <div class="row row-formulario-cadastro">
                            <div class="col-12">
                                <h1 class="titulo-cadastro"> Meus dados</h1>
                                <form class="form-atualizar-dados">
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="display_name" maxlength="50" placeholder="Nome completo" value="<?php echo $userdata->display_name?>">
                                            <div id="error-nome" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="user_email" maxlength="60" value="<?php echo $userdata->user_email?>" placeholder="E-mail">
                                            <div id="error-email-vazio" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                            <div id="error-email-invalido" class="invalid-feedback">
                                                Informe um endereço de e-mail válido!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="user_telefone" id="user_telefone" value="<?php echo get_user_meta($user_id, 'user_telefone', true)?>" placeholder="Telefone">
                                            <div id="error-telefone-vazio" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                            <div id="error-telefone-invalido" class="invalid-feedback">
                                                Informe um telefone válido!
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="user_data_nascimento" name="user_data_nascimento" value="<?php echo get_user_meta($user_id, 'user_data_nascimento', true)?>"placeholder="Data de nascimento">
                                            <div id="error-data_nascimento" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                            <div id="error-data-invalido" class="invalid-feedback">
                                                Informe uma data válida!
                                            </div>
                                        </div>
                                        <?php $sexo = get_user_meta($user_id, 'sexo_user', true);?>
                                        <div class="col-md-4">
                                            <select id="sexo" name="sexo" class="form-control">
                                                <option value=""></option>
                                                <option value="masculino" <?php echo $sexo == 'masculino' ? 'selected="selected"' : '';?>>Masculino</option>
                                                <option value="feminino" <?php echo $sexo == 'feminino' ? 'selected="selected"' : '';?>>Feminino</option>
                                            </select>
                                            <div id="error-sexo" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="user_cpf" name="user_cpf" value="<?php echo get_user_meta($user_id, 'user_cpf', true)?>" placeholder="CPF">
                                            <div id="error-cpf-vazio" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                            <div id="error-cpf-invalido" class="invalid-feedback">
                                                Informe um CPF válido!
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="cidade" maxlength="60" value="<?php echo get_user_meta($user_id, 'cidade', true)?>" placeholder="Cidade">
                                            <div id="error-cidade" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                        </div>
                                        <?php $estado = get_user_meta($user_id, 'user_estado', true);?>
                                        <div class="col-md-3">
                                            <select id="user_estado" name="user_estado" class="form-control">
                                                <option value=""></option>
                                                <option value="AC" <?php echo $estado == 'AC' ? 'selected="selected"' : '';?>>AC</option>
                                                <option value="AL" <?php echo $estado == 'AL' ? 'selected="selected"' : '';?>>AL</option>
                                                <option value="AP" <?php echo $estado == 'AP' ? 'selected="selected"' : '';?>>AP</option>
                                                <option value="AM" <?php echo $estado == 'AM' ? 'selected="selected"' : '';?>>AM</option>
                                                <option value="BA" <?php echo $estado == 'BA' ? 'selected="selected"' : '';?>>BA</option>
                                                <option value="CE" <?php echo $estado == 'CE' ? 'selected="selected"' : '';?>>CE</option>
                                                <option value="DF" <?php echo $estado == 'DF' ? 'selected="selected"' : '';?>>DF</option>
                                                <option value="ES" <?php echo $estado == 'ES' ? 'selected="selected"' : '';?>>ES</option>
                                                <option value="GO" <?php echo $estado == 'GO' ? 'selected="selected"' : '';?>>GO</option>
                                                <option value="MA" <?php echo $estado == 'MA' ? 'selected="selected"' : '';?>>MA</option>
                                                <option value="MT" <?php echo $estado == 'MT' ? 'selected="selected"' : '';?>>MT</option>
                                                <option value="MS" <?php echo $estado == 'MS' ? 'selected="selected"' : '';?>>MS</option>
                                                <option value="MG" <?php echo $estado == 'MG' ? 'selected="selected"' : '';?>>MG</option>
                                                <option value="PA" <?php echo $estado == 'PA' ? 'selected="selected"' : '';?>>PA</option>
                                                <option value="PB" <?php echo $estado == 'PB' ? 'selected="selected"' : '';?>>PB</option>
                                                <option value="PR" <?php echo $estado == 'PR' ? 'selected="selected"' : '';?>>PR</option>
                                                <option value="PE" <?php echo $estado == 'PE' ? 'selected="selected"' : '';?>>PE</option>
                                                <option value="PI" <?php echo $estado == 'PI' ? 'selected="selected"' : '';?>>PI</option>
                                                <option value="RJ" <?php echo $estado == 'RJ' ? 'selected="selected"' : '';?>>RJ</option>
                                                <option value="RN" <?php echo $estado == 'RN' ? 'selected="selected"' : '';?>>RN</option>
                                                <option value="RS" <?php echo $estado == 'RS' ? 'selected="selected"' : '';?>>RS</option>
                                                <option value="RO" <?php echo $estado == 'RO' ? 'selected="selected"' : '';?>>RO</option>
                                                <option value="RR" <?php echo $estado == 'RR' ? 'selected="selected"' : '';?>>RR</option>
                                                <option value="SC" <?php echo $estado == 'SC' ? 'selected="selected"' : '';?>>SC</option>
                                                <option value="SP" <?php echo $estado == 'SP' ? 'selected="selected"' : '';?>>SP</option>
                                                <option value="SE" <?php echo $estado == 'SE' ? 'selected="selected"' : '';?>>SE</option>
                                                <option value="TO" <?php echo $estado == 'TO' ? 'selected="selected"' : '';?>>TO</option>
                                                
                                            </select>
                                            <div id="error-estado" class="invalid-feedback">
                                                Obrigatório!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <?php $socio_aabb = get_user_meta($user_id, 'socio_aabb', true);?>
                                            <label for="user_socio_aabb">Sócio AABB? *</label>
                                            <select id="user_socio_aabb" class="form-control" name="user_socio_aabb">
                                                <option value="Sim" <?php echo $socio_aabb == 'Sim' ? 'selected="selected"' : '';?>>Sim</option>
                                                <option value="Não" <?php echo $socio_aabb != 'Sim' ? 'selected="selected"' : '';?>>Não</option>
                                            </select>
                                        </div>
                                        <?php $estado_aabb = get_user_meta($user_id, 'estado_aabb', true);?>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-5">
                                            <div class="box-estado-aabb" style="display: <?= $estado_aabb =='' ? 'none' : 'block'; ?>">
                                                <label for="user_estado-aabb">Estado AABB</label>
                                                <select id="user_estado-aabb" name="user_estado-aabb" class="form-control">
                                                    <option value=""></option>
                                                    <option value="AC" <?php echo $estado_aabb == 'AC' ? 'selected="selected"' : '';?>>AC</option>
                                                    <option value="AL" <?php echo $estado_aabb == 'AL' ? 'selected="selected"' : '';?>>AL</option>
                                                    <option value="AP" <?php echo $estado_aabb == 'AP' ? 'selected="selected"' : '';?>>AP</option>
                                                    <option value="AM" <?php echo $estado_aabb == 'AM' ? 'selected="selected"' : '';?>>AM</option>
                                                    <option value="BA" <?php echo $estado_aabb == 'BA' ? 'selected="selected"' : '';?>>BA</option>
                                                    <option value="CE" <?php echo $estado_aabb == 'CE' ? 'selected="selected"' : '';?>>CE</option>
                                                    <option value="DF" <?php echo $estado_aabb == 'DF' ? 'selected="selected"' : '';?>>DF</option>
                                                    <option value="ES" <?php echo $estado_aabb == 'ES' ? 'selected="selected"' : '';?>>ES</option>
                                                    <option value="GO" <?php echo $estado_aabb == 'GO' ? 'selected="selected"' : '';?>>GO</option>
                                                    <option value="MA" <?php echo $estado_aabb == 'MA' ? 'selected="selected"' : '';?>>MA</option>
                                                    <option value="MT" <?php echo $estado_aabb == 'MT' ? 'selected="selected"' : '';?>>MT</option>
                                                    <option value="MS" <?php echo $estado_aabb == 'MS' ? 'selected="selected"' : '';?>>MS</option>
                                                    <option value="MG" <?php echo $estado_aabb == 'MG' ? 'selected="selected"' : '';?>>MG</option>
                                                    <option value="PA" <?php echo $estado_aabb == 'PA' ? 'selected="selected"' : '';?>>PA</option>
                                                    <option value="PB" <?php echo $estado_aabb == 'PB' ? 'selected="selected"' : '';?>>PB</option>
                                                    <option value="PR" <?php echo $estado_aabb == 'PR' ? 'selected="selected"' : '';?>>PR</option>
                                                    <option value="PE" <?php echo $estado_aabb == 'PE' ? 'selected="selected"' : '';?>>PE</option>
                                                    <option value="PI" <?php echo $estado_aabb == 'PI' ? 'selected="selected"' : '';?>>PI</option>
                                                    <option value="RJ" <?php echo $estado_aabb == 'RJ' ? 'selected="selected"' : '';?>>RJ</option>
                                                    <option value="RN" <?php echo $estado_aabb == 'RN' ? 'selected="selected"' : '';?>>RN</option>
                                                    <option value="RS" <?php echo $estado_aabb == 'RS' ? 'selected="selected"' : '';?>>RS</option>
                                                    <option value="RO" <?php echo $estado_aabb == 'RO' ? 'selected="selected"' : '';?>>RO</option>
                                                    <option value="RR" <?php echo $estado_aabb == 'RR' ? 'selected="selected"' : '';?>>RR</option>
                                                    <option value="SC" <?php echo $estado_aabb == 'SC' ? 'selected="selected"' : '';?>>SC</option>
                                                    <option value="SP" <?php echo $estado_aabb == 'SP' ? 'selected="selected"' : '';?>>SP</option>
                                                    <option value="SE" <?php echo $estado_aabb == 'SE' ? 'selected="selected"' : '';?>>SE</option>
                                                    <option value="TO" <?php echo $estado_aabb == 'TO' ? 'selected="selected"' : '';?>>TO</option>

                                                </select>
                                                <div id="error-estado-aabb" class="invalid-feedback">
                                                    Campo obrigatório!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <?php $cidade_aabb = get_user_meta($user_id, 'cidade_aabb', true)?>
                                            <div class="box-cidade-aabb" style="display: <?= $cidade_aabb =='' ? 'none' : 'block'; ?>">
                                                <label for="user_cidade_aabb">Cidade AABB</label>
                                                <select id="user_cidade_aabb" name="user_cidade_aabb" class="form-control">
                                                    <option value="">Selecione a Cidade</option>
                                                    <option value="Caratinga" data-estado="MG" <?php echo $cidade_aabb == 'Caratinga' ? 'selected="selected"' : '';?>>Caratinga</option>
                                                    <option value="Belo Horizonte" data-estado="MG" <?php echo $cidade_aabb == 'Belo Horizonte' ? 'selected="selected"' : '';?>>Belo Horizonte</option>
                                                    <option value="São Paulo" data-estado="SP" <?php echo $cidade_aabb == 'São Paulo' ? 'selected="selected"' : '';?>>São Paulo</option>
                                                    <option value="Campinas" data-estado="SP" <?php echo $cidade_aabb == 'Campinas' ? 'selected="selected"' : '';?>>Campinas</option>
                                                    <option value="Rio de Janeiro" data-estado="RJ" <?php echo $cidade_aabb == 'Rio de Janeiro' ? 'selected="selected"' : '';?>>Rio de Janeiro</option>
                                                    <option value="Vitória" data-estado="ES" <?php echo $cidade_aabb == 'Vitória' ? 'selected="selected"' : '';?>>Vitória</option>
                                                </select>
                                                <div id="error-cidade-aabb" class="invalid-feedback">
                                                    Campo obrigatório!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-5">
                                            <?php $dependente_aabb = get_user_meta($user_id, 'dependente_aabb', true)?>
                                            <div class="box-dependente-aabb" style=" display: <?= $dependente_aabb == '' ? 'none' : 'block'; ?>">
                                                <label for="user_dependente_aabb">Titular ou Dependente?*</label>
                                                <select id="user_dependente_aabb" class="form-control" name="user_dependente_aabb">
                                                    <option value="" selected="selected">-</option>
                                                    <option value="Titular" <?php echo $dependente_aabb == 'Titular' ? 'selected="selected"' : '';?>>Titular</option>
                                                    <option value="Dependente" <?php echo $dependente_aabb == 'Dependente' ? 'selected="selected"' : '';?>>Dependente</option>
                                                </select>
                                                <div id="error-dependente" class="invalid-feedback">
                                                    Campo obrigatório!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="box-nome-titular-aabb" style=" display: <?= get_user_meta($user_id, 'titular_aabb', true) =='' ? 'none' : 'block'; ?>">
                                                <label for="nome-titular-aabb">Digite o nome do titular da cota</label>
                                                <input class="form-control" type="text" id="nome-titular-aabb" name="nome-titular-aabb" value="<?php echo get_user_meta($user_id, 'titular_aabb', true)?>" placeholder="">
                                                <div id="error-nome-titular-aabb" class="invalid-feedback">
                                                    Campo obrigatório!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="funcionario_bb">É funcionario BB?</label>
                                            <select id="funcionario_bb" class="form-control" name="funcionario_bb">
                                                <option value="Sim">Sim</option>
                                                <option value="Não" selected="selected">Não</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="box-matricula-funcionario">
                                                <label for="user_chave_func_bb">Matrícula</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                      <div class="input-group-text">F</div>
                                                    </div>
                                                    <input type="text" name="user_chave_func_bb" id="user_chave_func_bb" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-botao-cadastrar">
                                            <a class="botao-atualizar-cadastro background-roxo border-radius" type="submit">Atualizar dados</a>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-mensagem-erro margin-top-25">
                                            <div class="alert alert-danger mensagem-erro" role="alert">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>

                        </div>
                    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="separador-100 background-cinza"></div>
    <?php

get_footer();