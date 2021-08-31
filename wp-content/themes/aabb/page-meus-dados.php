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
                                                    <option data-estado="AC" value="Cruzeiro do Sul" <?php echo $cidade_aabb == 'Cruzeiro do Sul' ? 'selected="selected"' : '';?>>Cruzeiro do Sul</option>
                                                    <option data-estado="AC" value="Rio Branco" <?php echo $cidade_aabb == 'Rio Branco' ? 'selected="selected"' : '';?>>Rio Branco</option>
                                                    <option data-estado="AC" value="Sena Madureira" <?php echo $cidade_aabb == 'Sena Madureira' ? 'selected="selected"' : '';?>>Sena Madureira</option>
                                                    <option data-estado="AL" value="Arapiraca" <?php echo $cidade_aabb == 'Arapiraca' ? 'selected="selected"' : '';?>>Arapiraca</option>
                                                    <option data-estado="AL" value="Coruripe" <?php echo $cidade_aabb == 'Coruripe' ? 'selected="selected"' : '';?>>Coruripe</option>
                                                    <option data-estado="AL" value="Delmiro Gouveia" <?php echo $cidade_aabb == 'Delmiro Gouveia' ? 'selected="selected"' : '';?>>Delmiro Gouveia</option>
                                                    <option data-estado="AL" value="Junqueiro" <?php echo $cidade_aabb == 'Junqueiro' ? 'selected="selected"' : '';?>>Junqueiro</option>
                                                    <option data-estado="AL" value="Maceió" <?php echo $cidade_aabb == 'Maceió' ? 'selected="selected"' : '';?>>Maceió</option>
                                                    <option data-estado="AL" value="Palmeira dos Índios" <?php echo $cidade_aabb == 'Palmeira dos Índios' ? 'selected="selected"' : '';?>>Palmeira dos Índios</option>
                                                    <option data-estado="AL" value="Penedo" <?php echo $cidade_aabb == 'Penedo' ? 'selected="selected"' : '';?>>Penedo</option>
                                                    <option data-estado="AL" value="Santana do Ipanema" <?php echo $cidade_aabb == 'Santana do Ipanema' ? 'selected="selected"' : '';?>>Santana do Ipanema</option>
                                                    <option data-estado="AL" value="São Miguel dos Campos" <?php echo $cidade_aabb == 'São Miguel dos Campos' ? 'selected="selected"' : '';?>>São Miguel dos Campos</option>
                                                    <option data-estado="AL" value="União dos Palmares" <?php echo $cidade_aabb == 'União dos Palmares' ? 'selected="selected"' : '';?>>União dos Palmares</option>
                                                    <option data-estado="AL" value="Viçosa" <?php echo $cidade_aabb == 'Viçosa' ? 'selected="selected"' : '';?>>Viçosa</option>
                                                    <option data-estado="AM" value="Boca do Acre" <?php echo $cidade_aabb == 'Boca do Acre' ? 'selected="selected"' : '';?>>Boca do Acre</option>
                                                    <option data-estado="AM" value="Humaitá" <?php echo $cidade_aabb == 'Humaitá' ? 'selected="selected"' : '';?>>Humaitá</option>
                                                    <option data-estado="AM" value="Manaus" <?php echo $cidade_aabb == 'Manaus' ? 'selected="selected"' : '';?>>Manaus</option>
                                                    <option data-estado="AM" value="Manicoré" <?php echo $cidade_aabb == 'Manicoré' ? 'selected="selected"' : '';?>>Manicoré</option>
                                                    <option data-estado="AM" value="São Gabriel da Cachoeira" <?php echo $cidade_aabb == 'São Gabriel da Cachoeira' ? 'selected="selected"' : '';?>>São Gabriel da Cachoeira</option>
                                                    <option data-estado="AM" value="Tefé" <?php echo $cidade_aabb == 'Tefé' ? 'selected="selected"' : '';?>>Tefé</option>
                                                    <option data-estado="AP" value="Macapá" <?php echo $cidade_aabb == 'Macapá' ? 'selected="selected"' : '';?>>Macapá</option>
                                                    <option data-estado="BA" value="Alagoinhas" <?php echo $cidade_aabb == 'Alagoinhas' ? 'selected="selected"' : '';?>>Alagoinhas</option>
                                                    <option data-estado="BA" value="Amargosa" <?php echo $cidade_aabb == 'Amargosa' ? 'selected="selected"' : '';?>>Amargosa</option>
                                                    <option data-estado="BA" value="Angical" <?php echo $cidade_aabb == 'Angical' ? 'selected="selected"' : '';?>>Angical</option>
                                                    <option data-estado="BA" value="Barra" <?php echo $cidade_aabb == 'Barra' ? 'selected="selected"' : '';?>>Barra</option>
                                                    <option data-estado="BA" value="Barra da Estiva" <?php echo $cidade_aabb == 'Barra da Estiva' ? 'selected="selected"' : '';?>>Barra da Estiva</option>
                                                    <option data-estado="BA" value="Barra do Mendes" <?php echo $cidade_aabb == 'Barra do Mendes' ? 'selected="selected"' : '';?>>Barra do Mendes</option>
                                                    <option data-estado="BA" value="Barreiras" <?php echo $cidade_aabb == 'Barreiras' ? 'selected="selected"' : '';?>>Barreiras</option>
                                                    <option data-estado="BA" value="Belmonte" <?php echo $cidade_aabb == 'Belmonte' ? 'selected="selected"' : '';?>>Belmonte</option>
                                                    <option data-estado="BA" value="Bom Jesus da Lapa" <?php echo $cidade_aabb == 'Bom Jesus da Lapa' ? 'selected="selected"' : '';?>>Bom Jesus da Lapa</option>
                                                    <option data-estado="BA" value="Brumado" <?php echo $cidade_aabb == 'Brumado' ? 'selected="selected"' : '';?>>Brumado</option>
                                                    <option data-estado="BA" value="Caetité" <?php echo $cidade_aabb == 'Caetité' ? 'selected="selected"' : '';?>>Caetité</option>
                                                    <option data-estado="BA" value="Casa Nova" <?php echo $cidade_aabb == 'Casa Nova' ? 'selected="selected"' : '';?>>Casa Nova</option>
                                                    <option data-estado="BA" value="Castro Alves" <?php echo $cidade_aabb == 'Castro Alves' ? 'selected="selected"' : '';?>>Castro Alves</option>
                                                    <option data-estado="BA" value="Coaraci" <?php echo $cidade_aabb == 'Coaraci' ? 'selected="selected"' : '';?>>Coaraci</option>
                                                    <option data-estado="BA" value="Conceição do Coité" <?php echo $cidade_aabb == 'Conceição do Coité' ? 'selected="selected"' : '';?>>Conceição do Coité</option>
                                                    <option data-estado="BA" value="Condeúba" <?php echo $cidade_aabb == 'Condeúba' ? 'selected="selected"' : '';?>>Condeúba</option>
                                                    <option data-estado="BA" value="Cruz das Almas" <?php echo $cidade_aabb == 'Cruz das Almas' ? 'selected="selected"' : '';?>>Cruz das Almas</option>
                                                    <option data-estado="BA" value="Euclides da Cunha" <?php echo $cidade_aabb == 'Euclides da Cunha' ? 'selected="selected"' : '';?>>Euclides da Cunha</option>
                                                    <option data-estado="BA" value="Eunápolis" <?php echo $cidade_aabb == 'Eunápolis' ? 'selected="selected"' : '';?>>Eunápolis</option>
                                                    <option data-estado="BA" value="Feira de Santana" <?php echo $cidade_aabb == 'Feira de Santana' ? 'selected="selected"' : '';?>>Feira de Santana</option>
                                                    <option data-estado="BA" value="Gandu" <?php echo $cidade_aabb == 'Gandu' ? 'selected="selected"' : '';?>>Gandu</option>
                                                    <option data-estado="BA" value="Guanambi" <?php echo $cidade_aabb == 'Guanambi' ? 'selected="selected"' : '';?>>Guanambi</option>
                                                    <option data-estado="BA" value="Iaçu" <?php echo $cidade_aabb == 'Iaçu' ? 'selected="selected"' : '';?>>Iaçu</option>
                                                    <option data-estado="BA" value="Ibirataia" <?php echo $cidade_aabb == 'Ibirataia' ? 'selected="selected"' : '';?>>Ibirataia</option>
                                                    <option data-estado="BA" value="Ibotirama" <?php echo $cidade_aabb == 'Ibotirama' ? 'selected="selected"' : '';?>>Ibotirama</option>
                                                    <option data-estado="BA" value="Ilhéus" <?php echo $cidade_aabb == 'Ilhéus' ? 'selected="selected"' : '';?>>Ilhéus</option>
                                                    <option data-estado="BA" value="Inhambupe" <?php echo $cidade_aabb == 'Inhambupe' ? 'selected="selected"' : '';?>>Inhambupe</option>
                                                    <option data-estado="BA" value="Ipiaú" <?php echo $cidade_aabb == 'Ipiaú' ? 'selected="selected"' : '';?>>Ipiaú</option>
                                                    <option data-estado="BA" value="Iramaia" <?php echo $cidade_aabb == 'Iramaia' ? 'selected="selected"' : '';?>>Iramaia</option>
                                                    <option data-estado="BA" value="Irará" <?php echo $cidade_aabb == 'Irará' ? 'selected="selected"' : '';?>>Irará</option>
                                                    <option data-estado="BA" value="Irecê" <?php echo $cidade_aabb == 'Irecê' ? 'selected="selected"' : '';?>>Irecê</option>
                                                    <option data-estado="BA" value="Itaberaba" <?php echo $cidade_aabb == 'Itaberaba' ? 'selected="selected"' : '';?>>Itaberaba</option>
                                                    <option data-estado="BA" value="Itabuna" <?php echo $cidade_aabb == 'Itabuna' ? 'selected="selected"' : '';?>>Itabuna</option>
                                                    <option data-estado="BA" value="Itajuípe" <?php echo $cidade_aabb == 'Itajuípe' ? 'selected="selected"' : '';?>>Itajuípe</option>
                                                    <option data-estado="BA" value="Itambé" <?php echo $cidade_aabb == 'Itambé' ? 'selected="selected"' : '';?>>Itambé</option>
                                                    <option data-estado="BA" value="Itanhém" <?php echo $cidade_aabb == 'Itanhém' ? 'selected="selected"' : '';?>>Itanhém</option>
                                                    <option data-estado="BA" value="Itapitanga" <?php echo $cidade_aabb == 'Itapitanga' ? 'selected="selected"' : '';?>>Itapitanga</option>
                                                    <option data-estado="BA" value="Itiúba" <?php echo $cidade_aabb == 'Itiúba' ? 'selected="selected"' : '';?>>Itiúba</option>
                                                    <option data-estado="BA" value="Ituberá" <?php echo $cidade_aabb == 'Ituberá' ? 'selected="selected"' : '';?>>Ituberá</option>
                                                    <option data-estado="BA" value="Jacaraci" <?php echo $cidade_aabb == 'Jacaraci' ? 'selected="selected"' : '';?>>Jacaraci</option>
                                                    <option data-estado="BA" value="Jacobina" <?php echo $cidade_aabb == 'Jacobina' ? 'selected="selected"' : '';?>>Jacobina</option>
                                                    <option data-estado="BA" value="Jequié" <?php echo $cidade_aabb == 'Jequié' ? 'selected="selected"' : '';?>>Jequié</option>
                                                    <option data-estado="BA" value="Livramento de Nossa Senhora" <?php echo $cidade_aabb == 'Livramento de Nossa Senhora' ? 'selected="selected"' : '';?>>Livramento de Nossa Senhora</option>
                                                    <option data-estado="BA" value="Macarani" <?php echo $cidade_aabb == 'Macarani' ? 'selected="selected"' : '';?>>Macarani</option>
                                                    <option data-estado="BA" value="Mairi" <?php echo $cidade_aabb == 'Mairi' ? 'selected="selected"' : '';?>>Mairi</option>
                                                    <option data-estado="BA" value="Miguel Calmon" <?php echo $cidade_aabb == 'Miguel Calmon' ? 'selected="selected"' : '';?>>Miguel Calmon</option>
                                                    <option data-estado="BA" value="Morro do Chapéu" <?php echo $cidade_aabb == 'Morro do Chapéu' ? 'selected="selected"' : '';?>>Morro do Chapéu</option>
                                                    <option data-estado="BA" value="Mundo Novo" <?php echo $cidade_aabb == 'Mundo Novo' ? 'selected="selected"' : '';?>>Mundo Novo</option>
                                                    <option data-estado="BA" value="Mutuípe" <?php echo $cidade_aabb == 'Mutuípe' ? 'selected="selected"' : '';?>>Mutuípe</option>
                                                    <option data-estado="BA" value="Nazaré" <?php echo $cidade_aabb == 'Nazaré' ? 'selected="selected"' : '';?>>Nazaré</option>
                                                    <option data-estado="BA" value="Paratinga" <?php echo $cidade_aabb == 'Paratinga' ? 'selected="selected"' : '';?>>Paratinga</option>
                                                    <option data-estado="BA" value="Paripiranga" <?php echo $cidade_aabb == 'Paripiranga' ? 'selected="selected"' : '';?>>Paripiranga</option>
                                                    <option data-estado="BA" value="Riachão do Jacuípe" <?php echo $cidade_aabb == 'Riachão do Jacuípe' ? 'selected="selected"' : '';?>>Riachão do Jacuípe</option>
                                                    <option data-estado="BA" value="Riacho de Santana" <?php echo $cidade_aabb == 'Riacho de Santana' ? 'selected="selected"' : '';?>>Riacho de Santana</option>
                                                    <option data-estado="BA" value="Ribeira do Amparo" <?php echo $cidade_aabb == 'Ribeira do Amparo' ? 'selected="selected"' : '';?>>Ribeira do Amparo</option>
                                                    <option data-estado="BA" value="Ribeira do Pombal" <?php echo $cidade_aabb == 'Ribeira do Pombal' ? 'selected="selected"' : '';?>>Ribeira do Pombal</option>
                                                    <option data-estado="BA" value="Ruy Barbosa" <?php echo $cidade_aabb == 'Ruy Barbosa' ? 'selected="selected"' : '';?>>Ruy Barbosa</option>
                                                    <option data-estado="BA" value="Salvador" <?php echo $cidade_aabb == 'Salvador' ? 'selected="selected"' : '';?>>Salvador</option>
                                                    <option data-estado="BA" value="Santa Luz" <?php echo $cidade_aabb == 'Santa Luz' ? 'selected="selected"' : '';?>>Santa Luz</option>
                                                    <option data-estado="BA" value="Santa Maria da Vitória" <?php echo $cidade_aabb == 'Santa Maria da Vitória' ? 'selected="selected"' : '';?>>Santa Maria da Vitória</option>
                                                    <option data-estado="BA" value="Santana" <?php echo $cidade_aabb == 'Santana' ? 'selected="selected"' : '';?>>Santana</option>
                                                    <option data-estado="BA" value="Santa Rita de Cássia" <?php echo $cidade_aabb == 'Santa Rita de Cássia' ? 'selected="selected"' : '';?>>Santa Rita de Cássia</option>
                                                    <option data-estado="BA" value="Santo Amaro" <?php echo $cidade_aabb == 'Santo Amaro' ? 'selected="selected"' : '';?>>Santo Amaro</option>
                                                    <option data-estado="BA" value="Santo Antônio de Jesus" <?php echo $cidade_aabb == 'Santo Antônio de Jesus' ? 'selected="selected"' : '';?>>Santo Antônio de Jesus</option>
                                                    <option data-estado="BA" value="Santo Estevão" <?php echo $cidade_aabb == 'Santo Estevão' ? 'selected="selected"' : '';?>>Santo Estevão</option>
                                                    <option data-estado="BA" value="Seabra" <?php echo $cidade_aabb == 'Seabra' ? 'selected="selected"' : '';?>>Seabra</option>
                                                    <option data-estado="BA" value="Senhor do Bonfim" <?php echo $cidade_aabb == 'Senhor do Bonfim' ? 'selected="selected"' : '';?>>Senhor do Bonfim</option>
                                                    <option data-estado="BA" value="Serrinha" <?php echo $cidade_aabb == 'Serrinha' ? 'selected="selected"' : '';?>>Serrinha</option>
                                                    <option data-estado="BA" value="Teixeira de Freitas" <?php echo $cidade_aabb == 'Teixeira de Freitas' ? 'selected="selected"' : '';?>>Teixeira de Freitas</option>
                                                    <option data-estado="BA" value="Ubaitaba" <?php echo $cidade_aabb == 'Ubaitaba' ? 'selected="selected"' : '';?>>Ubaitaba</option>
                                                    <option data-estado="BA" value="Ubatã" <?php echo $cidade_aabb == 'Ubatã' ? 'selected="selected"' : '';?>>Ubatã</option>
                                                    <option data-estado="BA" value="Valença" <?php echo $cidade_aabb == 'Valença' ? 'selected="selected"' : '';?>>Valença</option>
                                                    <option data-estado="BA" value="Vitória da Conquista" <?php echo $cidade_aabb == 'Vitória da Conquista' ? 'selected="selected"' : '';?>>Vitória da Conquista</option>
                                                    <option data-estado="BA" value="Wanderley" <?php echo $cidade_aabb == 'Wanderley' ? 'selected="selected"' : '';?>>Wanderley</option>
                                                    <option data-estado="CE" value="Acopiara" <?php echo $cidade_aabb == 'Acopiara' ? 'selected="selected"' : '';?>>Acopiara</option>
                                                    <option data-estado="CE" value="Aracati" <?php echo $cidade_aabb == 'Aracati' ? 'selected="selected"' : '';?>>Aracati</option>
                                                    <option data-estado="CE" value="Assaré" <?php echo $cidade_aabb == 'Assaré' ? 'selected="selected"' : '';?>>Assaré</option>
                                                    <option data-estado="CE" value="Barbalha" <?php echo $cidade_aabb == 'Barbalha' ? 'selected="selected"' : '';?>>Barbalha</option>
                                                    <option data-estado="CE" value="Brejo Santo" <?php echo $cidade_aabb == 'Brejo Santo' ? 'selected="selected"' : '';?>>Brejo Santo</option>
                                                    <option data-estado="CE" value="Camocim" <?php echo $cidade_aabb == 'Camocim' ? 'selected="selected"' : '';?>>Camocim</option>
                                                    <option data-estado="CE" value="Campos Sales" <?php echo $cidade_aabb == 'Campos Sales' ? 'selected="selected"' : '';?>>Campos Sales</option>
                                                    <option data-estado="CE" value="Cascavel" <?php echo $cidade_aabb == 'Cascavel' ? 'selected="selected"' : '';?>>Cascavel</option>
                                                    <option data-estado="CE" value="Crateús" <?php echo $cidade_aabb == 'Crateús' ? 'selected="selected"' : '';?>>Crateús</option>
                                                    <option data-estado="CE" value="Crato" <?php echo $cidade_aabb == 'Crato' ? 'selected="selected"' : '';?>>Crato</option>
                                                    <option data-estado="CE" value="Fortaleza" <?php echo $cidade_aabb == 'Fortaleza' ? 'selected="selected"' : '';?>>Fortaleza</option>
                                                    <option data-estado="CE" value="Icó" <?php echo $cidade_aabb == 'Icó' ? 'selected="selected"' : '';?>>Icó</option>
                                                    <option data-estado="CE" value="Iguatu" <?php echo $cidade_aabb == 'Iguatu' ? 'selected="selected"' : '';?>>Iguatu</option>
                                                    <option data-estado="CE" value="Independência" <?php echo $cidade_aabb == 'Independência' ? 'selected="selected"' : '';?>>Independência</option>
                                                    <option data-estado="CE" value="Ipu" <?php echo $cidade_aabb == 'Ipu' ? 'selected="selected"' : '';?>>Ipu</option>
                                                    <option data-estado="CE" value="Itapajé" <?php echo $cidade_aabb == 'Itapajé' ? 'selected="selected"' : '';?>>Itapajé</option>
                                                    <option data-estado="CE" value="Itapipoca" <?php echo $cidade_aabb == 'Itapipoca' ? 'selected="selected"' : '';?>>Itapipoca</option>
                                                    <option data-estado="CE" value="Limoeiro do Norte" <?php echo $cidade_aabb == 'Limoeiro do Norte' ? 'selected="selected"' : '';?>>Limoeiro do Norte</option>
                                                    <option data-estado="CE" value="Maranguape" <?php echo $cidade_aabb == 'Maranguape' ? 'selected="selected"' : '';?>>Maranguape</option>
                                                    <option data-estado="CE" value="Milhã" <?php echo $cidade_aabb == 'Milhã' ? 'selected="selected"' : '';?>>Milhã</option>
                                                    <option data-estado="CE" value="Mombaça" <?php echo $cidade_aabb == 'Mombaça' ? 'selected="selected"' : '';?>>Mombaça</option>
                                                    <option data-estado="CE" value="Morada Nova" <?php echo $cidade_aabb == 'Morada Nova' ? 'selected="selected"' : '';?>>Morada Nova</option>
                                                    <option data-estado="CE" value="Orós" <?php echo $cidade_aabb == 'Orós' ? 'selected="selected"' : '';?>>Orós</option>
                                                    <option data-estado="CE" value="Pentecoste" <?php echo $cidade_aabb == 'Pentecoste' ? 'selected="selected"' : '';?>>Pentecoste</option>
                                                    <option data-estado="CE" value="Quixadá" <?php echo $cidade_aabb == 'Quixadá' ? 'selected="selected"' : '';?>>Quixadá</option>
                                                    <option data-estado="CE" value="Quixeramobim" <?php echo $cidade_aabb == 'Quixeramobim' ? 'selected="selected"' : '';?>>Quixeramobim</option>
                                                    <option data-estado="CE" value="Russas" <?php echo $cidade_aabb == 'Russas' ? 'selected="selected"' : '';?>>Russas</option>
                                                    <option data-estado="CE" value="Santa Quitéria" <?php echo $cidade_aabb == 'Santa Quitéria' ? 'selected="selected"' : '';?>>Santa Quitéria</option>
                                                    <option data-estado="CE" value="Senador Pompeu" <?php echo $cidade_aabb == 'Senador Pompeu' ? 'selected="selected"' : '';?>>Senador Pompeu</option>
                                                    <option data-estado="CE" value="Sobral" <?php echo $cidade_aabb == 'Sobral' ? 'selected="selected"' : '';?>>Sobral</option>
                                                    <option data-estado="CE" value="Tauá" <?php echo $cidade_aabb == 'Tauá' ? 'selected="selected"' : '';?>>Tauá</option>
                                                    <option data-estado="CE" value="Várzea Alegre" <?php echo $cidade_aabb == 'Várzea Alegre' ? 'selected="selected"' : '';?>>Várzea Alegre</option>
                                                    <option data-estado="DF" value="Brasília" <?php echo $cidade_aabb == 'Brasília' ? 'selected="selected"' : '';?>>Brasília</option>
                                                    <option data-estado="ES" value="Afonso Cláudio" <?php echo $cidade_aabb == 'Afonso Cláudio' ? 'selected="selected"' : '';?>>Afonso Cláudio</option>
                                                    <option data-estado="ES" value="Alegre" <?php echo $cidade_aabb == 'Alegre' ? 'selected="selected"' : '';?>>Alegre</option>
                                                    <option data-estado="ES" value="Aracruz" <?php echo $cidade_aabb == 'Aracruz' ? 'selected="selected"' : '';?>>Aracruz</option>
                                                    <option data-estado="ES" value="Barra de São Francisco" <?php echo $cidade_aabb == 'Barra de São Francisco' ? 'selected="selected"' : '';?>>Barra de São Francisco</option>
                                                    <option data-estado="ES" value="Castelo" <?php echo $cidade_aabb == 'Castelo' ? 'selected="selected"' : '';?>>Castelo</option>
                                                    <option data-estado="ES" value="Colatina" <?php echo $cidade_aabb == 'Colatina' ? 'selected="selected"' : '';?>>Colatina</option>
                                                    <option data-estado="ES" value="Domingos Martins" <?php echo $cidade_aabb == 'Domingos Martins' ? 'selected="selected"' : '';?>>Domingos Martins</option>
                                                    <option data-estado="ES" value="Ecoporanga" <?php echo $cidade_aabb == 'Ecoporanga' ? 'selected="selected"' : '';?>>Ecoporanga</option>
                                                    <option data-estado="ES" value="Guaçuí" <?php echo $cidade_aabb == 'Guaçuí' ? 'selected="selected"' : '';?>>Guaçuí</option>
                                                    <option data-estado="ES" value="Guarapari" <?php echo $cidade_aabb == 'Guarapari' ? 'selected="selected"' : '';?>>Guarapari</option>
                                                    <option data-estado="ES" value="Itaguaçu" <?php echo $cidade_aabb == 'Itaguaçu' ? 'selected="selected"' : '';?>>Itaguaçu</option>
                                                    <option data-estado="ES" value="Linhares" <?php echo $cidade_aabb == 'Linhares' ? 'selected="selected"' : '';?>>Linhares</option>
                                                    <option data-estado="ES" value="Mimoso do Sul" <?php echo $cidade_aabb == 'Mimoso do Sul' ? 'selected="selected"' : '';?>>Mimoso do Sul</option>
                                                    <option data-estado="ES" value="Montanha" <?php echo $cidade_aabb == 'Montanha' ? 'selected="selected"' : '';?>>Montanha</option>
                                                    <option data-estado="ES" value="Muniz Freire" <?php echo $cidade_aabb == 'Muniz Freire' ? 'selected="selected"' : '';?>>Muniz Freire</option>
                                                    <option data-estado="ES" value="Nova Venécia" <?php echo $cidade_aabb == 'Nova Venécia' ? 'selected="selected"' : '';?>>Nova Venécia</option>
                                                    <option data-estado="ES" value="Santa Teresa" <?php echo $cidade_aabb == 'Santa Teresa' ? 'selected="selected"' : '';?>>Santa Teresa</option>
                                                    <option data-estado="ES" value="São Gabriel da Palha" <?php echo $cidade_aabb == 'São Gabriel da Palha' ? 'selected="selected"' : '';?>>São Gabriel da Palha</option>
                                                    <option data-estado="ES" value="Serra" <?php echo $cidade_aabb == 'Serra' ? 'selected="selected"' : '';?>>Serra</option>
                                                    <option data-estado="ES" value="Vila Velha" <?php echo $cidade_aabb == 'Vila Velha' ? 'selected="selected"' : '';?>>Vila Velha</option>
                                                    <option data-estado="GO" value="Anápolis" <?php echo $cidade_aabb == 'Anápolis' ? 'selected="selected"' : '';?>>Anápolis</option>
                                                    <option data-estado="GO" value="Anicuns" <?php echo $cidade_aabb == 'Anicuns' ? 'selected="selected"' : '';?>>Anicuns</option>
                                                    <option data-estado="GO" value="Bom Jardim de Goiás" <?php echo $cidade_aabb == 'Bom Jardim de Goiás' ? 'selected="selected"' : '';?>>Bom Jardim de Goiás</option>
                                                    <option data-estado="GO" value="Buriti Alegre" <?php echo $cidade_aabb == 'Buriti Alegre' ? 'selected="selected"' : '';?>>Buriti Alegre</option>
                                                    <option data-estado="GO" value="Caldas Novas" <?php echo $cidade_aabb == 'Caldas Novas' ? 'selected="selected"' : '';?>>Caldas Novas</option>
                                                    <option data-estado="GO" value="Ceres" <?php echo $cidade_aabb == 'Ceres' ? 'selected="selected"' : '';?>>Ceres</option>
                                                    <option data-estado="GO" value="Cristalina" <?php echo $cidade_aabb == 'Cristalina' ? 'selected="selected"' : '';?>>Cristalina</option>
                                                    <option data-estado="GO" value="Edéia" <?php echo $cidade_aabb == 'Edéia' ? 'selected="selected"' : '';?>>Edéia</option>
                                                    <option data-estado="GO" value="Fazenda Nova" <?php echo $cidade_aabb == 'Fazenda Nova' ? 'selected="selected"' : '';?>>Fazenda Nova</option>
                                                    <option data-estado="GO" value="Formosa" <?php echo $cidade_aabb == 'Formosa' ? 'selected="selected"' : '';?>>Formosa</option>
                                                    <option data-estado="GO" value="Goiânia" <?php echo $cidade_aabb == 'Goiânia' ? 'selected="selected"' : '';?>>Goiânia</option>
                                                    <option data-estado="GO" value="Goiás" <?php echo $cidade_aabb == 'Goiás' ? 'selected="selected"' : '';?>>Goiás</option>
                                                    <option data-estado="GO" value="Goiatuba" <?php echo $cidade_aabb == 'Goiatuba' ? 'selected="selected"' : '';?>>Goiatuba</option>
                                                    <option data-estado="GO" value="Ipameri" <?php echo $cidade_aabb == 'Ipameri' ? 'selected="selected"' : '';?>>Ipameri</option>
                                                    <option data-estado="GO" value="Iporá" <?php echo $cidade_aabb == 'Iporá' ? 'selected="selected"' : '';?>>Iporá</option>
                                                    <option data-estado="GO" value="Itaberaí" <?php echo $cidade_aabb == 'Itaberaí' ? 'selected="selected"' : '';?>>Itaberaí</option>
                                                    <option data-estado="GO" value="Itapaci" <?php echo $cidade_aabb == 'Itapaci' ? 'selected="selected"' : '';?>>Itapaci</option>
                                                    <option data-estado="GO" value="Itapuranga" <?php echo $cidade_aabb == 'Itapuranga' ? 'selected="selected"' : '';?>>Itapuranga</option>
                                                    <option data-estado="GO" value="Jaraguá" <?php echo $cidade_aabb == 'Jaraguá' ? 'selected="selected"' : '';?>>Jaraguá</option>
                                                    <option data-estado="GO" value="Jataí" <?php echo $cidade_aabb == 'Jataí' ? 'selected="selected"' : '';?>>Jataí</option>
                                                    <option data-estado="GO" value="Joviânia" <?php echo $cidade_aabb == 'Joviânia' ? 'selected="selected"' : '';?>>Joviânia</option>
                                                    <option data-estado="GO" value="Jussara" <?php echo $cidade_aabb == 'Jussara' ? 'selected="selected"' : '';?>>Jussara</option>
                                                    <option data-estado="GO" value="Mara Rosa" <?php echo $cidade_aabb == 'Mara Rosa' ? 'selected="selected"' : '';?>>Mara Rosa</option>
                                                    <option data-estado="GO" value="Mineiros" <?php echo $cidade_aabb == 'Mineiros' ? 'selected="selected"' : '';?>>Mineiros</option>
                                                    <option data-estado="GO" value="Montes Claros de Goiás" <?php echo $cidade_aabb == 'Montes Claros de Goiás' ? 'selected="selected"' : '';?>>Montes Claros de Goiás</option>
                                                    <option data-estado="GO" value="Morrinhos" <?php echo $cidade_aabb == 'Morrinhos' ? 'selected="selected"' : '';?>>Morrinhos</option>
                                                    <option data-estado="GO" value="Orizona" <?php echo $cidade_aabb == 'Orizona' ? 'selected="selected"' : '';?>>Orizona</option>
                                                    <option data-estado="GO" value="Palmeiras de Goiás" <?php echo $cidade_aabb == 'Palmeiras de Goiás' ? 'selected="selected"' : '';?>>Palmeiras de Goiás</option>
                                                    <option data-estado="GO" value="Paraúna" <?php echo $cidade_aabb == 'Paraúna' ? 'selected="selected"' : '';?>>Paraúna</option>
                                                    <option data-estado="GO" value="Piracanjuba" <?php echo $cidade_aabb == 'Piracanjuba' ? 'selected="selected"' : '';?>>Piracanjuba</option>
                                                    <option data-estado="GO" value="Piranhas" <?php echo $cidade_aabb == 'Piranhas' ? 'selected="selected"' : '';?>>Piranhas</option>
                                                    <option data-estado="GO" value="Pires do Rio" <?php echo $cidade_aabb == 'Pires do Rio' ? 'selected="selected"' : '';?>>Pires do Rio</option>
                                                    <option data-estado="GO" value="Pontalina" <?php echo $cidade_aabb == 'Pontalina' ? 'selected="selected"' : '';?>>Pontalina</option>
                                                    <option data-estado="GO" value="Porangatu" <?php echo $cidade_aabb == 'Porangatu' ? 'selected="selected"' : '';?>>Porangatu</option>
                                                    <option data-estado="GO" value="Posse" <?php echo $cidade_aabb == 'Posse' ? 'selected="selected"' : '';?>>Posse</option>
                                                    <option data-estado="GO" value="Quirinópolis" <?php echo $cidade_aabb == 'Quirinópolis' ? 'selected="selected"' : '';?>>Quirinópolis</option>
                                                    <option data-estado="GO" value="Rio Verde" <?php echo $cidade_aabb == 'Rio Verde' ? 'selected="selected"' : '';?>>Rio Verde</option>
                                                    <option data-estado="GO" value="Rubiataba" <?php echo $cidade_aabb == 'Rubiataba' ? 'selected="selected"' : '';?>>Rubiataba</option>
                                                    <option data-estado="GO" value="São Luís de Montes Belos" <?php echo $cidade_aabb == 'São Luís de Montes Belos' ? 'selected="selected"' : '';?>>São Luís de Montes Belos</option>
                                                    <option data-estado="GO" value="São Miguel do Araguaia" <?php echo $cidade_aabb == 'São Miguel do Araguaia' ? 'selected="selected"' : '';?>>São Miguel do Araguaia</option>
                                                    <option data-estado="GO" value="Silvânia" <?php echo $cidade_aabb == 'Silvânia' ? 'selected="selected"' : '';?>>Silvânia</option>
                                                    <option data-estado="GO" value="Uruaçu" <?php echo $cidade_aabb == 'Uruaçu' ? 'selected="selected"' : '';?>>Uruaçu</option>
                                                    <option data-estado="MA" value="Bacabal" <?php echo $cidade_aabb == 'Bacabal' ? 'selected="selected"' : '';?>>Bacabal</option>
                                                    <option data-estado="MA" value="Balsas" <?php echo $cidade_aabb == 'Balsas' ? 'selected="selected"' : '';?>>Balsas</option>
                                                    <option data-estado="MA" value="Barra do Corda" <?php echo $cidade_aabb == 'Barra do Corda' ? 'selected="selected"' : '';?>>Barra do Corda</option>
                                                    <option data-estado="MA" value="Brejo" <?php echo $cidade_aabb == 'Brejo' ? 'selected="selected"' : '';?>>Brejo</option>
                                                    <option data-estado="MA" value="Buriticupu" <?php echo $cidade_aabb == 'Buriticupu' ? 'selected="selected"' : '';?>>Buriticupu</option>
                                                    <option data-estado="MA" value="Carolina" <?php echo $cidade_aabb == 'Carolina' ? 'selected="selected"' : '';?>>Carolina</option>
                                                    <option data-estado="MA" value="Caxias" <?php echo $cidade_aabb == 'Caxias' ? 'selected="selected"' : '';?>>Caxias</option>
                                                    <option data-estado="MA" value="Codó" <?php echo $cidade_aabb == 'Codó' ? 'selected="selected"' : '';?>>Codó</option>
                                                    <option data-estado="MA" value="Cururupu" <?php echo $cidade_aabb == 'Cururupu' ? 'selected="selected"' : '';?>>Cururupu</option>
                                                    <option data-estado="MA" value="Grajaú" <?php echo $cidade_aabb == 'Grajaú' ? 'selected="selected"' : '';?>>Grajaú</option>
                                                    <option data-estado="MA" value="Imperatriz" <?php echo $cidade_aabb == 'Imperatriz' ? 'selected="selected"' : '';?>>Imperatriz</option>
                                                    <option data-estado="MA" value="Lago da Pedra" <?php echo $cidade_aabb == 'Lago da Pedra' ? 'selected="selected"' : '';?>>Lago da Pedra</option>
                                                    <option data-estado="MA" value="Parnarama" <?php echo $cidade_aabb == 'Parnarama' ? 'selected="selected"' : '';?>>Parnarama</option>
                                                    <option data-estado="MA" value="Pedreiras" <?php echo $cidade_aabb == 'Pedreiras' ? 'selected="selected"' : '';?>>Pedreiras</option>
                                                    <option data-estado="MA" value="Pinheiro" <?php echo $cidade_aabb == 'Pinheiro' ? 'selected="selected"' : '';?>>Pinheiro</option>
                                                    <option data-estado="MA" value="Pio XII" <?php echo $cidade_aabb == 'Pio XII' ? 'selected="selected"' : '';?>>Pio XII</option>
                                                    <option data-estado="MA" value="Presidente Dutra" <?php echo $cidade_aabb == 'Presidente Dutra' ? 'selected="selected"' : '';?>>Presidente Dutra</option>
                                                    <option data-estado="MA" value="Santa Inês" <?php echo $cidade_aabb == 'Santa Inês' ? 'selected="selected"' : '';?>>Santa Inês</option>
                                                    <option data-estado="MA" value="Santa Luzia" <?php echo $cidade_aabb == 'Santa Luzia' ? 'selected="selected"' : '';?>>Santa Luzia</option>
                                                    <option data-estado="MA" value="São Domingos do Maranhão" <?php echo $cidade_aabb == 'São Domingos do Maranhão' ? 'selected="selected"' : '';?>>São Domingos do Maranhão</option>
                                                    <option data-estado="MA" value="São João dos Patos" <?php echo $cidade_aabb == 'São João dos Patos' ? 'selected="selected"' : '';?>>São João dos Patos</option>
                                                    <option data-estado="MA" value="São Luís" <?php echo $cidade_aabb == 'São Luís' ? 'selected="selected"' : '';?>>São Luís</option>
                                                    <option data-estado="MA" value="São Raimundo das Mangabeiras" <?php echo $cidade_aabb == 'São Raimundo das Mangabeiras' ? 'selected="selected"' : '';?>>São Raimundo das Mangabeiras</option>
                                                    <option data-estado="MA" value="Zé Doca" <?php echo $cidade_aabb == 'Zé Doca' ? 'selected="selected"' : '';?>>Zé Doca</option>
                                                    <option data-estado="MG" value="Abaeté" <?php echo $cidade_aabb == 'Abaeté' ? 'selected="selected"' : '';?>>Abaeté</option>
                                                    <option data-estado="MG" value="Abre Campo" <?php echo $cidade_aabb == 'Abre Campo' ? 'selected="selected"' : '';?>>Abre Campo</option>
                                                    <option data-estado="MG" value="Águas Formosas" <?php echo $cidade_aabb == 'Águas Formosas' ? 'selected="selected"' : '';?>>Águas Formosas</option>
                                                    <option data-estado="MG" value="Aimorés" <?php echo $cidade_aabb == 'Aimorés' ? 'selected="selected"' : '';?>>Aimorés</option>
                                                    <option data-estado="MG" value="Alfenas" <?php echo $cidade_aabb == 'Alfenas' ? 'selected="selected"' : '';?>>Alfenas</option>
                                                    <option data-estado="MG" value="Almenara" <?php echo $cidade_aabb == 'Almenara' ? 'selected="selected"' : '';?>>Almenara</option>
                                                    <option data-estado="MG" value="Andradas" <?php echo $cidade_aabb == 'Andradas' ? 'selected="selected"' : '';?>>Andradas</option>
                                                    <option data-estado="MG" value="Andrelândia" <?php echo $cidade_aabb == 'Andrelândia' ? 'selected="selected"' : '';?>>Andrelândia</option>
                                                    <option data-estado="MG" value="Araguari" <?php echo $cidade_aabb == 'Araguari' ? 'selected="selected"' : '';?>>Araguari</option>
                                                    <option data-estado="MG" value="Araxá" <?php echo $cidade_aabb == 'Araxá' ? 'selected="selected"' : '';?>>Araxá</option>
                                                    <option data-estado="MG" value="Arcos" <?php echo $cidade_aabb == 'Arcos' ? 'selected="selected"' : '';?>>Arcos</option>
                                                    <option data-estado="MG" value="Arinos" <?php echo $cidade_aabb == 'Arinos' ? 'selected="selected"' : '';?>>Arinos</option>
                                                    <option data-estado="MG" value="Baependi" <?php echo $cidade_aabb == 'Baependi' ? 'selected="selected"' : '';?>>Baependi</option>
                                                    <option data-estado="MG" value="Bambuí" <?php echo $cidade_aabb == 'Bambuí' ? 'selected="selected"' : '';?>>Bambuí</option>
                                                    <option data-estado="MG" value="Barbacena" <?php echo $cidade_aabb == 'Barbacena' ? 'selected="selected"' : '';?>>Barbacena</option>
                                                    <option data-estado="MG" value="Belo Horizonte" <?php echo $cidade_aabb == 'Belo Horizonte' ? 'selected="selected"' : '';?>>Belo Horizonte</option>
                                                    <option data-estado="MG" value="Betim" <?php echo $cidade_aabb == 'Betim' ? 'selected="selected"' : '';?>>Betim</option>
                                                    <option data-estado="MG" value="Boa Esperança" <?php echo $cidade_aabb == 'Boa Esperança' ? 'selected="selected"' : '';?>>Boa Esperança</option>
                                                    <option data-estado="MG" value="Bocaiúva" <?php echo $cidade_aabb == 'Bocaiúva' ? 'selected="selected"' : '';?>>Bocaiúva</option>
                                                    <option data-estado="MG" value="Bom Sucesso" <?php echo $cidade_aabb == 'Bom Sucesso' ? 'selected="selected"' : '';?>>Bom Sucesso</option>
                                                    <option data-estado="MG" value="Brasília de Minas" <?php echo $cidade_aabb == 'Brasília de Minas' ? 'selected="selected"' : '';?>>Brasília de Minas</option>
                                                    <option data-estado="MG" value="Buritis" <?php echo $cidade_aabb == 'Buritis' ? 'selected="selected"' : '';?>>Buritis</option>
                                                    <option data-estado="MG" value="Buritizeiro" <?php echo $cidade_aabb == 'Buritizeiro' ? 'selected="selected"' : '';?>>Buritizeiro</option>
                                                    <option data-estado="MG" value="Campo Belo" <?php echo $cidade_aabb == 'Campo Belo' ? 'selected="selected"' : '';?>>Campo Belo</option>
                                                    <option data-estado="MG" value="Capelinha" <?php echo $cidade_aabb == 'Capelinha' ? 'selected="selected"' : '';?>>Capelinha</option>
                                                    <option data-estado="MG" value="Carangola" <?php echo $cidade_aabb == 'Carangola' ? 'selected="selected"' : '';?>>Carangola</option>
                                                    <option data-estado="MG" value="Caratinga" <?php echo $cidade_aabb == 'Caratinga' ? 'selected="selected"' : '';?>>Caratinga</option>
                                                    <option data-estado="MG" value="Cataguases" <?php echo $cidade_aabb == 'Cataguases' ? 'selected="selected"' : '';?>>Cataguases</option>
                                                    <option data-estado="MG" value="Conceição das Alagoas" <?php echo $cidade_aabb == 'Conceição das Alagoas' ? 'selected="selected"' : '';?>>Conceição das Alagoas</option>
                                                    <option data-estado="MG" value="Conceição do Mato Dentro" <?php echo $cidade_aabb == 'Conceição do Mato Dentro' ? 'selected="selected"' : '';?>>Conceição do Mato Dentro</option>
                                                    <option data-estado="MG" value="Conselheiro Lafaiete" <?php echo $cidade_aabb == 'Conselheiro Lafaiete' ? 'selected="selected"' : '';?>>Conselheiro Lafaiete</option>
                                                    <option data-estado="MG" value="Conselheiro Pena" <?php echo $cidade_aabb == 'Conselheiro Pena' ? 'selected="selected"' : '';?>>Conselheiro Pena</option>
                                                    <option data-estado="MG" value="Coração de Jesus" <?php echo $cidade_aabb == 'Coração de Jesus' ? 'selected="selected"' : '';?>>Coração de Jesus</option>
                                                    <option data-estado="MG" value="Corinto" <?php echo $cidade_aabb == 'Corinto' ? 'selected="selected"' : '';?>>Corinto</option>
                                                    <option data-estado="MG" value="Coromandel" <?php echo $cidade_aabb == 'Coromandel' ? 'selected="selected"' : '';?>>Coromandel</option>
                                                    <option data-estado="MG" value="Curvelo" <?php echo $cidade_aabb == 'Curvelo' ? 'selected="selected"' : '';?>>Curvelo</option>
                                                    <option data-estado="MG" value="Diamantina" <?php echo $cidade_aabb == 'Diamantina' ? 'selected="selected"' : '';?>>Diamantina</option>
                                                    <option data-estado="MG" value="Divinópolis" <?php echo $cidade_aabb == 'Divinópolis' ? 'selected="selected"' : '';?>>Divinópolis</option>
                                                    <option data-estado="MG" value="Dores do Indaiá" <?php echo $cidade_aabb == 'Dores do Indaiá' ? 'selected="selected"' : '';?>>Dores do Indaiá</option>
                                                    <option data-estado="MG" value="Ervália" <?php echo $cidade_aabb == 'Ervália' ? 'selected="selected"' : '';?>>Ervália</option>
                                                    <option data-estado="MG" value="Espinosa" <?php echo $cidade_aabb == 'Espinosa' ? 'selected="selected"' : '';?>>Espinosa</option>
                                                    <option data-estado="MG" value="Estrela do Sul" <?php echo $cidade_aabb == 'Estrela do Sul' ? 'selected="selected"' : '';?>>Estrela do Sul</option>
                                                    <option data-estado="MG" value="Extrema" <?php echo $cidade_aabb == 'Extrema' ? 'selected="selected"' : '';?>>Extrema</option>
                                                    <option data-estado="MG" value="Francisco Sá" <?php echo $cidade_aabb == 'Francisco Sá' ? 'selected="selected"' : '';?>>Francisco Sá</option>
                                                    <option data-estado="MG" value="Frutal" <?php echo $cidade_aabb == 'Frutal' ? 'selected="selected"' : '';?>>Frutal</option>
                                                    <option data-estado="MG" value="Guanhães" <?php echo $cidade_aabb == 'Guanhães' ? 'selected="selected"' : '';?>>Guanhães</option>
                                                    <option data-estado="MG" value="Guarará" <?php echo $cidade_aabb == 'Guarará' ? 'selected="selected"' : '';?>>Guarará</option>
                                                    <option data-estado="MG" value="Guaxupé" <?php echo $cidade_aabb == 'Guaxupé' ? 'selected="selected"' : '';?>>Guaxupé</option>
                                                    <option data-estado="MG" value="Guimarânia" <?php echo $cidade_aabb == 'Guimarânia' ? 'selected="selected"' : '';?>>Guimarânia</option>
                                                    <option data-estado="MG" value="Ibiá" <?php echo $cidade_aabb == 'Ibiá' ? 'selected="selected"' : '';?>>Ibiá</option>
                                                    <option data-estado="MG" value="Inhapim" <?php echo $cidade_aabb == 'Inhapim' ? 'selected="selected"' : '';?>>Inhapim</option>
                                                    <option data-estado="MG" value="Ipanema" <?php echo $cidade_aabb == 'Ipanema' ? 'selected="selected"' : '';?>>Ipanema</option>
                                                    <option data-estado="MG" value="Itabira" <?php echo $cidade_aabb == 'Itabira' ? 'selected="selected"' : '';?>>Itabira</option>
                                                    <option data-estado="MG" value="Itanhandu" <?php echo $cidade_aabb == 'Itanhandu' ? 'selected="selected"' : '';?>>Itanhandu</option>
                                                    <option data-estado="MG" value="Itaobim" <?php echo $cidade_aabb == 'Itaobim' ? 'selected="selected"' : '';?>>Itaobim</option>
                                                    <option data-estado="MG" value="Itaúna" <?php echo $cidade_aabb == 'Itaúna' ? 'selected="selected"' : '';?>>Itaúna</option>
                                                    <option data-estado="MG" value="Ituiutaba" <?php echo $cidade_aabb == 'Ituiutaba' ? 'selected="selected"' : '';?>>Ituiutaba</option>
                                                    <option data-estado="MG" value="Iturama" <?php echo $cidade_aabb == 'Iturama' ? 'selected="selected"' : '';?>>Iturama</option>
                                                    <option data-estado="MG" value="Janaúba" <?php echo $cidade_aabb == 'Janaúba' ? 'selected="selected"' : '';?>>Janaúba</option>
                                                    <option data-estado="MG" value="Januária" <?php echo $cidade_aabb == 'Januária' ? 'selected="selected"' : '';?>>Januária</option>
                                                    <option data-estado="MG" value="Jequitinhonha" <?php echo $cidade_aabb == 'Jequitinhonha' ? 'selected="selected"' : '';?>>Jequitinhonha</option>
                                                    <option data-estado="MG" value="Juiz de Fora" <?php echo $cidade_aabb == 'Juiz de Fora' ? 'selected="selected"' : '';?>>Juiz de Fora</option>
                                                    <option data-estado="MG" value="Lajinha" <?php echo $cidade_aabb == 'Lajinha' ? 'selected="selected"' : '';?>>Lajinha</option>
                                                    <option data-estado="MG" value="Lavras" <?php echo $cidade_aabb == 'Lavras' ? 'selected="selected"' : '';?>>Lavras</option>
                                                    <option data-estado="MG" value="Luz" <?php echo $cidade_aabb == 'Luz' ? 'selected="selected"' : '';?>>Luz</option>
                                                    <option data-estado="MG" value="Manga" <?php echo $cidade_aabb == 'Manga' ? 'selected="selected"' : '';?>>Manga</option>
                                                    <option data-estado="MG" value="Manhuaçu" <?php echo $cidade_aabb == 'Manhuaçu' ? 'selected="selected"' : '';?>>Manhuaçu</option>
                                                    <option data-estado="MG" value="Manhumirim" <?php echo $cidade_aabb == 'Manhumirim' ? 'selected="selected"' : '';?>>Manhumirim</option>
                                                    <option data-estado="MG" value="Martinho Campos" <?php echo $cidade_aabb == 'Martinho Campos' ? 'selected="selected"' : '';?>>Martinho Campos</option>
                                                    <option data-estado="MG" value="Mato Verde" <?php echo $cidade_aabb == 'Mato Verde' ? 'selected="selected"' : '';?>>Mato Verde</option>
                                                    <option data-estado="MG" value="Minas Novas" <?php echo $cidade_aabb == 'Minas Novas' ? 'selected="selected"' : '';?>>Minas Novas</option>
                                                    <option data-estado="MG" value="Miraí" <?php echo $cidade_aabb == 'Miraí' ? 'selected="selected"' : '';?>>Miraí</option>
                                                    <option data-estado="MG" value="Monte Carmelo" <?php echo $cidade_aabb == 'Monte Carmelo' ? 'selected="selected"' : '';?>>Monte Carmelo</option>
                                                    <option data-estado="MG" value="Monte Santo de Minas" <?php echo $cidade_aabb == 'Monte Santo de Minas' ? 'selected="selected"' : '';?>>Monte Santo de Minas</option>
                                                    <option data-estado="MG" value="Montes Claros" <?php echo $cidade_aabb == 'Montes Claros' ? 'selected="selected"' : '';?>>Montes Claros</option>
                                                    <option data-estado="MG" value="Monte Sião" <?php echo $cidade_aabb == 'Monte Sião' ? 'selected="selected"' : '';?>>Monte Sião</option>
                                                    <option data-estado="MG" value="Muriaé" <?php echo $cidade_aabb == 'Muriaé' ? 'selected="selected"' : '';?>>Muriaé</option>
                                                    <option data-estado="MG" value="Mutum" <?php echo $cidade_aabb == 'Mutum' ? 'selected="selected"' : '';?>>Mutum</option>
                                                    <option data-estado="MG" value="Muzambinho" <?php echo $cidade_aabb == 'Muzambinho' ? 'selected="selected"' : '';?>>Muzambinho</option>
                                                    <option data-estado="MG" value="Nanuque" <?php echo $cidade_aabb == 'Nanuque' ? 'selected="selected"' : '';?>>Nanuque</option>
                                                    <option data-estado="MG" value="Oliveira" <?php echo $cidade_aabb == 'Oliveira' ? 'selected="selected"' : '';?>>Oliveira</option>
                                                    <option data-estado="MG" value="Ouro Fino" <?php echo $cidade_aabb == 'Ouro Fino' ? 'selected="selected"' : '';?>>Ouro Fino</option>
                                                    <option data-estado="MG" value="Paracatu" <?php echo $cidade_aabb == 'Paracatu' ? 'selected="selected"' : '';?>>Paracatu</option>
                                                    <option data-estado="MG" value="Pará de Minas" <?php echo $cidade_aabb == 'Pará de Minas' ? 'selected="selected"' : '';?>>Pará de Minas</option>
                                                    <option data-estado="MG" value="Passos" <?php echo $cidade_aabb == 'Passos' ? 'selected="selected"' : '';?>>Passos</option>
                                                    <option data-estado="MG" value="Patos de Minas" <?php echo $cidade_aabb == 'Patos de Minas' ? 'selected="selected"' : '';?>>Patos de Minas</option>
                                                    <option data-estado="MG" value="Peçanha" <?php echo $cidade_aabb == 'Peçanha' ? 'selected="selected"' : '';?>>Peçanha</option>
                                                    <option data-estado="MG" value="Pedra Azul" <?php echo $cidade_aabb == 'Pedra Azul' ? 'selected="selected"' : '';?>>Pedra Azul</option>
                                                    <option data-estado="MG" value="Pedro Leopoldo" <?php echo $cidade_aabb == 'Pedro Leopoldo' ? 'selected="selected"' : '';?>>Pedro Leopoldo</option>
                                                    <option data-estado="MG" value="Perdizes" <?php echo $cidade_aabb == 'Perdizes' ? 'selected="selected"' : '';?>>Perdizes</option>
                                                    <option data-estado="MG" value="Pitangui" <?php echo $cidade_aabb == 'Pitangui' ? 'selected="selected"' : '';?>>Pitangui</option>
                                                    <option data-estado="MG" value="Piumhi" <?php echo $cidade_aabb == 'Piumhi' ? 'selected="selected"' : '';?>>Piumhi</option>
                                                    <option data-estado="MG" value="Poços de Caldas" <?php echo $cidade_aabb == 'Poços de Caldas' ? 'selected="selected"' : '';?>>Poços de Caldas</option>
                                                    <option data-estado="MG" value="Pompéu" <?php echo $cidade_aabb == 'Pompéu' ? 'selected="selected"' : '';?>>Pompéu</option>
                                                    <option data-estado="MG" value="Ponte Nova" <?php echo $cidade_aabb == 'Ponte Nova' ? 'selected="selected"' : '';?>>Ponte Nova</option>
                                                    <option data-estado="MG" value="Porteirinha" <?php echo $cidade_aabb == 'Porteirinha' ? 'selected="selected"' : '';?>>Porteirinha</option>
                                                    <option data-estado="MG" value="Pouso Alegre" <?php echo $cidade_aabb == 'Pouso Alegre' ? 'selected="selected"' : '';?>>Pouso Alegre</option>
                                                    <option data-estado="MG" value="Prata" <?php echo $cidade_aabb == 'Prata' ? 'selected="selected"' : '';?>>Prata</option>
                                                    <option data-estado="MG" value="Resplendor" <?php echo $cidade_aabb == 'Resplendor' ? 'selected="selected"' : '';?>>Resplendor</option>
                                                    <option data-estado="MG" value="Rio Paranaíba" <?php echo $cidade_aabb == 'Rio Paranaíba' ? 'selected="selected"' : '';?>>Rio Paranaíba</option>
                                                    <option data-estado="MG" value="Rio Pomba" <?php echo $cidade_aabb == 'Rio Pomba' ? 'selected="selected"' : '';?>>Rio Pomba</option>
                                                    <option data-estado="MG" value="Rubim" <?php echo $cidade_aabb == 'Rubim' ? 'selected="selected"' : '';?>>Rubim</option>
                                                    <option data-estado="MG" value="Sacramento" <?php echo $cidade_aabb == 'Sacramento' ? 'selected="selected"' : '';?>>Sacramento</option>
                                                    <option data-estado="MG" value="Salinas" <?php echo $cidade_aabb == 'Salinas' ? 'selected="selected"' : '';?>>Salinas</option>
                                                    <option data-estado="MG" value="Santa Maria do Suaçuí" <?php echo $cidade_aabb == 'Santa Maria do Suaçuí' ? 'selected="selected"' : '';?>>Santa Maria do Suaçuí</option>
                                                    <option data-estado="MG" value="Santa Rita do Sapucaí" <?php echo $cidade_aabb == 'Santa Rita do Sapucaí' ? 'selected="selected"' : '';?>>Santa Rita do Sapucaí</option>
                                                    <option data-estado="MG" value="Santos Dumont" <?php echo $cidade_aabb == 'Santos Dumont' ? 'selected="selected"' : '';?>>Santos Dumont</option>
                                                    <option data-estado="MG" value="São Francisco" <?php echo $cidade_aabb == 'São Francisco' ? 'selected="selected"' : '';?>>São Francisco</option>
                                                    <option data-estado="MG" value="São João Nepomuceno" <?php echo $cidade_aabb == 'São João Nepomuceno' ? 'selected="selected"' : '';?>>São João Nepomuceno</option>
                                                    <option data-estado="MG" value="São Sebastião do Paraíso" <?php echo $cidade_aabb == 'São Sebastião do Paraíso' ? 'selected="selected"' : '';?>>São Sebastião do Paraíso</option>
                                                    <option data-estado="MG" value="Serro" <?php echo $cidade_aabb == 'Serro' ? 'selected="selected"' : '';?>>Serro</option>
                                                    <option data-estado="MG" value="Sete Lagoas" <?php echo $cidade_aabb == 'Sete Lagoas' ? 'selected="selected"' : '';?>>Sete Lagoas</option>
                                                    <option data-estado="MG" value="Teófilo Otoni" <?php echo $cidade_aabb == 'Teófilo Otoni' ? 'selected="selected"' : '';?>>Teófilo Otoni</option>
                                                    <option data-estado="MG" value="Tiradentes" <?php echo $cidade_aabb == 'Tiradentes' ? 'selected="selected"' : '';?>>Tiradentes</option>
                                                    <option data-estado="MG" value="Três Pontas" <?php echo $cidade_aabb == 'Três Pontas' ? 'selected="selected"' : '';?>>Três Pontas</option>
                                                    <option data-estado="MG" value="Uberaba" <?php echo $cidade_aabb == 'Uberaba' ? 'selected="selected"' : '';?>>Uberaba</option>
                                                    <option data-estado="MG" value="Uberlândia" <?php echo $cidade_aabb == 'Uberlândia' ? 'selected="selected"' : '';?>>Uberlândia</option>
                                                    <option data-estado="MG" value="Unaí" <?php echo $cidade_aabb == 'Unaí' ? 'selected="selected"' : '';?>>Unaí</option>
                                                    <option data-estado="MG" value="Varginha" <?php echo $cidade_aabb == 'Varginha' ? 'selected="selected"' : '';?>>Varginha</option>
                                                    <option data-estado="MG" value="Vazante" <?php echo $cidade_aabb == 'Vazante' ? 'selected="selected"' : '';?>>Vazante</option>
                                                    <option data-estado="MG" value="Viçosa" <?php echo $cidade_aabb == 'Viçosa' ? 'selected="selected"' : '';?>>Viçosa</option>
                                                    <option data-estado="MG" value="Visconde do Rio Branco" <?php echo $cidade_aabb == 'Visconde do Rio Branco' ? 'selected="selected"' : '';?>>Visconde do Rio Branco</option>
                                                    <option data-estado="MS" value="Amambái" <?php echo $cidade_aabb == 'Amambái' ? 'selected="selected"' : '';?>>Amambái</option>
                                                    <option data-estado="MS" value="Aparecida do Taboado" <?php echo $cidade_aabb == 'Aparecida do Taboado' ? 'selected="selected"' : '';?>>Aparecida do Taboado</option>
                                                    <option data-estado="MS" value="Aquidauana" <?php echo $cidade_aabb == 'Aquidauana' ? 'selected="selected"' : '';?>>Aquidauana</option>
                                                    <option data-estado="MS" value="Bataguassu" <?php echo $cidade_aabb == 'Bataguassu' ? 'selected="selected"' : '';?>>Bataguassu</option>
                                                    <option data-estado="MS" value="Bela Vista" <?php echo $cidade_aabb == 'Bela Vista' ? 'selected="selected"' : '';?>>Bela Vista</option>
                                                    <option data-estado="MS" value="Bonito" <?php echo $cidade_aabb == 'Bonito' ? 'selected="selected"' : '';?>>Bonito</option>
                                                    <option data-estado="MS" value="Caarapó" <?php echo $cidade_aabb == 'Caarapó' ? 'selected="selected"' : '';?>>Caarapó</option>
                                                    <option data-estado="MS" value="Camapuã" <?php echo $cidade_aabb == 'Camapuã' ? 'selected="selected"' : '';?>>Camapuã</option>
                                                    <option data-estado="MS" value="Campo Grande" <?php echo $cidade_aabb == 'Campo Grande' ? 'selected="selected"' : '';?>>Campo Grande</option>
                                                    <option data-estado="MS" value="Cassilândia" <?php echo $cidade_aabb == 'Cassilândia' ? 'selected="selected"' : '';?>>Cassilândia</option>
                                                    <option data-estado="MS" value="Chapadão do Sul" <?php echo $cidade_aabb == 'Chapadão do Sul' ? 'selected="selected"' : '';?>>Chapadão do Sul</option>
                                                    <option data-estado="MS" value="Corumbá" <?php echo $cidade_aabb == 'Corumbá' ? 'selected="selected"' : '';?>>Corumbá</option>
                                                    <option data-estado="MS" value="Coxim" <?php echo $cidade_aabb == 'Coxim' ? 'selected="selected"' : '';?>>Coxim</option>
                                                    <option data-estado="MS" value="Deodápolis" <?php echo $cidade_aabb == 'Deodápolis' ? 'selected="selected"' : '';?>>Deodápolis</option>
                                                    <option data-estado="MS" value="Dourados" <?php echo $cidade_aabb == 'Dourados' ? 'selected="selected"' : '';?>>Dourados</option>
                                                    <option data-estado="MS" value="Glória de Dourados" <?php echo $cidade_aabb == 'Glória de Dourados' ? 'selected="selected"' : '';?>>Glória de Dourados</option>
                                                    <option data-estado="MS" value="Ivinhema" <?php echo $cidade_aabb == 'Ivinhema' ? 'selected="selected"' : '';?>>Ivinhema</option>
                                                    <option data-estado="MS" value="Jardim" <?php echo $cidade_aabb == 'Jardim' ? 'selected="selected"' : '';?>>Jardim</option>
                                                    <option data-estado="MS" value="Maracajú" <?php echo $cidade_aabb == 'Maracajú' ? 'selected="selected"' : '';?>>Maracajú</option>
                                                    <option data-estado="MS" value="Miranda" <?php echo $cidade_aabb == 'Miranda' ? 'selected="selected"' : '';?>>Miranda</option>
                                                    <option data-estado="MS" value="Mundo Novo" <?php echo $cidade_aabb == 'Mundo Novo' ? 'selected="selected"' : '';?>>Mundo Novo</option>
                                                    <option data-estado="MS" value="Naviraí" <?php echo $cidade_aabb == 'Naviraí' ? 'selected="selected"' : '';?>>Naviraí</option>
                                                    <option data-estado="MS" value="Nova Andradina" <?php echo $cidade_aabb == 'Nova Andradina' ? 'selected="selected"' : '';?>>Nova Andradina</option>
                                                    <option data-estado="MS" value="Paranaíba" <?php echo $cidade_aabb == 'Paranaíba' ? 'selected="selected"' : '';?>>Paranaíba</option>
                                                    <option data-estado="MS" value="Ponta Porã" <?php echo $cidade_aabb == 'Ponta Porã' ? 'selected="selected"' : '';?>>Ponta Porã</option>
                                                    <option data-estado="MS" value="Rio Brilhante" <?php echo $cidade_aabb == 'Rio Brilhante' ? 'selected="selected"' : '';?>>Rio Brilhante</option>
                                                    <option data-estado="MS" value="Rio Verde de Mato Grosso" <?php echo $cidade_aabb == 'Rio Verde de Mato Grosso' ? 'selected="selected"' : '';?>>Rio Verde de Mato Grosso</option>
                                                    <option data-estado="MS" value="São Gabriel do Oeste" <?php echo $cidade_aabb == 'São Gabriel do Oeste' ? 'selected="selected"' : '';?>>São Gabriel do Oeste</option>
                                                    <option data-estado="MS" value="Sidrolândia" <?php echo $cidade_aabb == 'Sidrolândia' ? 'selected="selected"' : '';?>>Sidrolândia</option>
                                                    <option data-estado="MS" value="Três Lagoas" <?php echo $cidade_aabb == 'Três Lagoas' ? 'selected="selected"' : '';?>>Três Lagoas</option>
                                                    <option data-estado="MT" value="Água Boa" <?php echo $cidade_aabb == 'Água Boa' ? 'selected="selected"' : '';?>>Água Boa</option>
                                                    <option data-estado="MT" value="Alta Floresta" <?php echo $cidade_aabb == 'Alta Floresta' ? 'selected="selected"' : '';?>>Alta Floresta</option>
                                                    <option data-estado="MT" value="Alto Araguaia" <?php echo $cidade_aabb == 'Alto Araguaia' ? 'selected="selected"' : '';?>>Alto Araguaia</option>
                                                    <option data-estado="MT" value="Barra do Bugres" <?php echo $cidade_aabb == 'Barra do Bugres' ? 'selected="selected"' : '';?>>Barra do Bugres</option>
                                                    <option data-estado="MT" value="Barra do Garças" <?php echo $cidade_aabb == 'Barra do Garças' ? 'selected="selected"' : '';?>>Barra do Garças</option>
                                                    <option data-estado="MT" value="Cáceres" <?php echo $cidade_aabb == 'Cáceres' ? 'selected="selected"' : '';?>>Cáceres</option>
                                                    <option data-estado="MT" value="Campo Novo do Parecis" <?php echo $cidade_aabb == 'Campo Novo do Parecis' ? 'selected="selected"' : '';?>>Campo Novo do Parecis</option>
                                                    <option data-estado="MT" value="Canarana" <?php echo $cidade_aabb == 'Canarana' ? 'selected="selected"' : '';?>>Canarana</option>
                                                    <option data-estado="MT" value="Colider" <?php echo $cidade_aabb == 'Colider' ? 'selected="selected"' : '';?>>Colider</option>
                                                    <option data-estado="MT" value="Confresa" <?php echo $cidade_aabb == 'Confresa' ? 'selected="selected"' : '';?>>Confresa</option>
                                                    <option data-estado="MT" value="Cuiabá" <?php echo $cidade_aabb == 'Cuiabá' ? 'selected="selected"' : '';?>>Cuiabá</option>
                                                    <option data-estado="MT" value="Guarantã do Norte" <?php echo $cidade_aabb == 'Guarantã do Norte' ? 'selected="selected"' : '';?>>Guarantã do Norte</option>
                                                    <option data-estado="MT" value="Guiratinga" <?php echo $cidade_aabb == 'Guiratinga' ? 'selected="selected"' : '';?>>Guiratinga</option>
                                                    <option data-estado="MT" value="Jaciara" <?php echo $cidade_aabb == 'Jaciara' ? 'selected="selected"' : '';?>>Jaciara</option>
                                                    <option data-estado="MT" value="Juara" <?php echo $cidade_aabb == 'Juara' ? 'selected="selected"' : '';?>>Juara</option>
                                                    <option data-estado="MT" value="Juína" <?php echo $cidade_aabb == 'Juína' ? 'selected="selected"' : '';?>>Juína</option>
                                                    <option data-estado="MT" value="Lucas do Rio Verde" <?php echo $cidade_aabb == 'Lucas do Rio Verde' ? 'selected="selected"' : '';?>>Lucas do Rio Verde</option>
                                                    <option data-estado="MT" value="Mirassol D'Oeste" <?php echo $cidade_aabb == "Mirassol D'Oeste" ? "selected='selected'" : '';?>>Mirassol D'Oeste</option>
                                                    <option data-estado="MT" value="Nova Xavantina" <?php echo $cidade_aabb == 'Nova Xavantina' ? 'selected="selected"' : '';?>>Nova Xavantina</option>
                                                    <option data-estado="MT" value="Poconé" <?php echo $cidade_aabb == 'Poconé' ? 'selected="selected"' : '';?>>Poconé</option>
                                                    <option data-estado="MT" value="Porto dos Gaúchos" <?php echo $cidade_aabb == 'Porto dos Gaúchos' ? 'selected="selected"' : '';?>>Porto dos Gaúchos</option>
                                                    <option data-estado="MT" value="Poxoréo" <?php echo $cidade_aabb == 'Poxoréo' ? 'selected="selected"' : '';?>>Poxoréo</option>
                                                    <option data-estado="MT" value="Primavera do Leste" <?php echo $cidade_aabb == 'Primavera do Leste' ? 'selected="selected"' : '';?>>Primavera do Leste</option>
                                                    <option data-estado="MT" value="Sinop" <?php echo $cidade_aabb == 'Sinop' ? 'selected="selected"' : '';?>>Sinop</option>
                                                    <option data-estado="MT" value="Sorriso" <?php echo $cidade_aabb == 'Sorriso' ? 'selected="selected"' : '';?>>Sorriso</option>
                                                    <option data-estado="MT" value="Torixoréu" <?php echo $cidade_aabb == 'Torixoréu' ? 'selected="selected"' : '';?>>Torixoréu</option>
                                                    <option data-estado="MT" value="Vila Rica" <?php echo $cidade_aabb == 'Vila Rica' ? 'selected="selected"' : '';?>>Vila Rica</option>
                                                    <option data-estado="PA" value="Alenquer" <?php echo $cidade_aabb == 'Alenquer' ? 'selected="selected"' : '';?>>Alenquer</option>
                                                    <option data-estado="PA" value="Almeirim" <?php echo $cidade_aabb == 'Almeirim' ? 'selected="selected"' : '';?>>Almeirim</option>
                                                    <option data-estado="PA" value="Altamira" <?php echo $cidade_aabb == 'Altamira' ? 'selected="selected"' : '';?>>Altamira</option>
                                                    <option data-estado="PA" value="Ananindeua" <?php echo $cidade_aabb == 'Ananindeua' ? 'selected="selected"' : '';?>>Ananindeua</option>
                                                    <option data-estado="PA" value="Bragança" <?php echo $cidade_aabb == 'Bragança' ? 'selected="selected"' : '';?>>Bragança</option>
                                                    <option data-estado="PA" value="Breves" <?php echo $cidade_aabb == 'Breves' ? 'selected="selected"' : '';?>>Breves</option>
                                                    <option data-estado="PA" value="Cametá" <?php echo $cidade_aabb == 'Cametá' ? 'selected="selected"' : '';?>>Cametá</option>
                                                    <option data-estado="PA" value="Castanhal" <?php echo $cidade_aabb == 'Castanhal' ? 'selected="selected"' : '';?>>Castanhal</option>
                                                    <option data-estado="PA" value="Conceição do Araguaia" <?php echo $cidade_aabb == 'Conceição do Araguaia' ? 'selected="selected"' : '';?>>Conceição do Araguaia</option>
                                                    <option data-estado="PA" value="Itaituba" <?php echo $cidade_aabb == 'Itaituba' ? 'selected="selected"' : '';?>>Itaituba</option>
                                                    <option data-estado="PA" value="Marabá" <?php echo $cidade_aabb == 'Marabá' ? 'selected="selected"' : '';?>>Marabá</option>
                                                    <option data-estado="PA" value="Monte Alegre" <?php echo $cidade_aabb == 'Monte Alegre' ? 'selected="selected"' : '';?>>Monte Alegre</option>
                                                    <option data-estado="PA" value="Oriximiná" <?php echo $cidade_aabb == 'Oriximiná' ? 'selected="selected"' : '';?>>Oriximiná</option>
                                                    <option data-estado="PA" value="Paragominas" <?php echo $cidade_aabb == 'Paragominas' ? 'selected="selected"' : '';?>>Paragominas</option>
                                                    <option data-estado="PA" value="Redenção" <?php echo $cidade_aabb == 'Redenção' ? 'selected="selected"' : '';?>>Redenção</option>
                                                    <option data-estado="PA" value="Rondon do Pará" <?php echo $cidade_aabb == 'Rondon do Pará' ? 'selected="selected"' : '';?>>Rondon do Pará</option>
                                                    <option data-estado="PA" value="Santarém" <?php echo $cidade_aabb == 'Santarém' ? 'selected="selected"' : '';?>>Santarém</option>
                                                    <option data-estado="PA" value="Tailândia" <?php echo $cidade_aabb == 'Tailândia' ? 'selected="selected"' : '';?>>Tailândia</option>
                                                    <option data-estado="PA" value="Tucuruí" <?php echo $cidade_aabb == 'Tucuruí' ? 'selected="selected"' : '';?>>Tucuruí</option>
                                                    <option data-estado="PA" value="Xinguara" <?php echo $cidade_aabb == 'Xinguara' ? 'selected="selected"' : '';?>>Xinguara</option>
                                                    <option data-estado="PB" value="Cajazeiras" <?php echo $cidade_aabb == 'Cajazeiras' ? 'selected="selected"' : '';?>>Cajazeiras</option>
                                                    <option data-estado="PB" value="Campina Grande" <?php echo $cidade_aabb == 'Campina Grande' ? 'selected="selected"' : '';?>>Campina Grande</option>
                                                    <option data-estado="PB" value="Catolé do Rocha" <?php echo $cidade_aabb == 'Catolé do Rocha' ? 'selected="selected"' : '';?>>Catolé do Rocha</option>
                                                    <option data-estado="PB" value="Guarabira" <?php echo $cidade_aabb == 'Guarabira' ? 'selected="selected"' : '';?>>Guarabira</option>
                                                    <option data-estado="PB" value="Itabaiana" <?php echo $cidade_aabb == 'Itabaiana' ? 'selected="selected"' : '';?>>Itabaiana</option>
                                                    <option data-estado="PB" value="João Pessoa" <?php echo $cidade_aabb == 'João Pessoa' ? 'selected="selected"' : '';?>>João Pessoa</option>
                                                    <option data-estado="PB" value="Mamanguape" <?php echo $cidade_aabb == 'Mamanguape' ? 'selected="selected"' : '';?>>Mamanguape</option>
                                                    <option data-estado="PB" value="Monteiro" <?php echo $cidade_aabb == 'Monteiro' ? 'selected="selected"' : '';?>>Monteiro</option>
                                                    <option data-estado="PB" value="Patos" <?php echo $cidade_aabb == 'Patos' ? 'selected="selected"' : '';?>>Patos</option>
                                                    <option data-estado="PB" value="Pombal" <?php echo $cidade_aabb == 'Pombal' ? 'selected="selected"' : '';?>>Pombal</option>
                                                    <option data-estado="PB" value="Princesa Isabel" <?php echo $cidade_aabb == 'Princesa Isabel' ? 'selected="selected"' : '';?>>Princesa Isabel</option>
                                                    <option data-estado="PB" value="Santa Luzia" <?php echo $cidade_aabb == 'Santa Luzia' ? 'selected="selected"' : '';?>>Santa Luzia</option>
                                                    <option data-estado="PB" value="São Bento" <?php echo $cidade_aabb == 'São Bento' ? 'selected="selected"' : '';?>>São Bento</option>
                                                    <option data-estado="PB" value="Sapé" <?php echo $cidade_aabb == 'Sapé' ? 'selected="selected"' : '';?>>Sapé</option>
                                                    <option data-estado="PB" value="Uiraúna" <?php echo $cidade_aabb == 'Uiraúna' ? 'selected="selected"' : '';?>>Uiraúna</option>
                                                    <option data-estado="PE" value="Afogados da Ingazeira" <?php echo $cidade_aabb == 'Afogados da Ingazeira' ? 'selected="selected"' : '';?>>Afogados da Ingazeira</option>
                                                    <option data-estado="PE" value="Barreiros" <?php echo $cidade_aabb == 'Barreiros' ? 'selected="selected"' : '';?>>Barreiros</option>
                                                    <option data-estado="PE" value="Bom Conselho" <?php echo $cidade_aabb == 'Bom Conselho' ? 'selected="selected"' : '';?>>Bom Conselho</option>
                                                    <option data-estado="PE" value="Bonito" <?php echo $cidade_aabb == 'Bonito' ? 'selected="selected"' : '';?>>Bonito</option>
                                                    <option data-estado="PE" value="Cabrobó" <?php echo $cidade_aabb == 'Cabrobó' ? 'selected="selected"' : '';?>>Cabrobó</option>
                                                    <option data-estado="PE" value="Carpina" <?php echo $cidade_aabb == 'Carpina' ? 'selected="selected"' : '';?>>Carpina</option>
                                                    <option data-estado="PE" value="Caruaru" <?php echo $cidade_aabb == 'Caruaru' ? 'selected="selected"' : '';?>>Caruaru</option>
                                                    <option data-estado="PE" value="Floresta" <?php echo $cidade_aabb == 'Floresta' ? 'selected="selected"' : '';?>>Floresta</option>
                                                    <option data-estado="PE" value="Garanhuns" <?php echo $cidade_aabb == 'Garanhuns' ? 'selected="selected"' : '';?>>Garanhuns</option>
                                                    <option data-estado="PE" value="Gravatá" <?php echo $cidade_aabb == 'Gravatá' ? 'selected="selected"' : '';?>>Gravatá</option>
                                                    <option data-estado="PE" value="Ibimirim" <?php echo $cidade_aabb == 'Ibimirim' ? 'selected="selected"' : '';?>>Ibimirim</option>
                                                    <option data-estado="PE" value="Limoeiro" <?php echo $cidade_aabb == 'Limoeiro' ? 'selected="selected"' : '';?>>Limoeiro</option>
                                                    <option data-estado="PE" value="Parnamirim" <?php echo $cidade_aabb == 'Parnamirim' ? 'selected="selected"' : '';?>>Parnamirim</option>
                                                    <option data-estado="PE" value="Petrolina" <?php echo $cidade_aabb == 'Petrolina' ? 'selected="selected"' : '';?>>Petrolina</option>
                                                    <option data-estado="PE" value="Recife" <?php echo $cidade_aabb == 'Recife' ? 'selected="selected"' : '';?>>Recife</option>
                                                    <option data-estado="PE" value="Santa Cruz do Capibaribe" <?php echo $cidade_aabb == 'Santa Cruz do Capibaribe' ? 'selected="selected"' : '';?>>Santa Cruz do Capibaribe</option>
                                                    <option data-estado="PE" value="Serra Talhada" <?php echo $cidade_aabb == 'Serra Talhada' ? 'selected="selected"' : '';?>>Serra Talhada</option>
                                                    <option data-estado="PE" value="Taquaritinga do Norte" <?php echo $cidade_aabb == 'Taquaritinga do Norte' ? 'selected="selected"' : '';?>>Taquaritinga do Norte</option>
                                                    <option data-estado="PE" value="Timbaúba" <?php echo $cidade_aabb == 'Timbaúba' ? 'selected="selected"' : '';?>>Timbaúba</option>
                                                    <option data-estado="PE" value="Vitória de Santo Antão" <?php echo $cidade_aabb == 'Vitória de Santo Antão' ? 'selected="selected"' : '';?>>Vitória de Santo Antão</option>
                                                    <option data-estado="PI" value="Água Branca" <?php echo $cidade_aabb == 'Água Branca' ? 'selected="selected"' : '';?>>Água Branca</option>
                                                    <option data-estado="PI" value="Amarante" <?php echo $cidade_aabb == 'Amarante' ? 'selected="selected"' : '';?>>Amarante</option>
                                                    <option data-estado="PI" value="Bom Jesus" <?php echo $cidade_aabb == 'Bom Jesus' ? 'selected="selected"' : '';?>>Bom Jesus</option>
                                                    <option data-estado="PI" value="Campo Maior" <?php echo $cidade_aabb == 'Campo Maior' ? 'selected="selected"' : '';?>>Campo Maior</option>
                                                    <option data-estado="PI" value="Castelo do Piauí" <?php echo $cidade_aabb == 'Castelo do Piauí' ? 'selected="selected"' : '';?>>Castelo do Piauí</option>
                                                    <option data-estado="PI" value="Corrente" <?php echo $cidade_aabb == 'Corrente' ? 'selected="selected"' : '';?>>Corrente</option>
                                                    <option data-estado="PI" value="Curimatá" <?php echo $cidade_aabb == 'Curimatá' ? 'selected="selected"' : '';?>>Curimatá</option>
                                                    <option data-estado="PI" value="Elesbão Veloso" <?php echo $cidade_aabb == 'Elesbão Veloso' ? 'selected="selected"' : '';?>>Elesbão Veloso</option>
                                                    <option data-estado="PI" value="Floriano" <?php echo $cidade_aabb == 'Floriano' ? 'selected="selected"' : '';?>>Floriano</option>
                                                    <option data-estado="PI" value="Gilbués" <?php echo $cidade_aabb == 'Gilbués' ? 'selected="selected"' : '';?>>Gilbués</option>
                                                    <option data-estado="PI" value="Jaicós" <?php echo $cidade_aabb == 'Jaicós' ? 'selected="selected"' : '';?>>Jaicós</option>
                                                    <option data-estado="PI" value="Luzilândia" <?php echo $cidade_aabb == 'Luzilândia' ? 'selected="selected"' : '';?>>Luzilândia</option>
                                                    <option data-estado="PI" value="Oeiras" <?php echo $cidade_aabb == 'Oeiras' ? 'selected="selected"' : '';?>>Oeiras</option>
                                                    <option data-estado="PI" value="Parnaíba" <?php echo $cidade_aabb == 'Parnaíba' ? 'selected="selected"' : '';?>>Parnaíba</option>
                                                    <option data-estado="PI" value="Paulistana" <?php echo $cidade_aabb == 'Paulistana' ? 'selected="selected"' : '';?>>Paulistana</option>
                                                    <option data-estado="PI" value="Pedro II" <?php echo $cidade_aabb == 'Pedro II' ? 'selected="selected"' : '';?>>Pedro II</option>
                                                    <option data-estado="PI" value="Picos" <?php echo $cidade_aabb == 'Picos' ? 'selected="selected"' : '';?>>Picos</option>
                                                    <option data-estado="PI" value="Piracuruca" <?php echo $cidade_aabb == 'Piracuruca' ? 'selected="selected"' : '';?>>Piracuruca</option>
                                                    <option data-estado="PI" value="Piripiri" <?php echo $cidade_aabb == 'Piripiri' ? 'selected="selected"' : '';?>>Piripiri</option>
                                                    <option data-estado="PI" value="São João do Piauí" <?php echo $cidade_aabb == 'São João do Piauí' ? 'selected="selected"' : '';?>>São João do Piauí</option>
                                                    <option data-estado="PI" value="São Miguel do Tapuio" <?php echo $cidade_aabb == 'São Miguel do Tapuio' ? 'selected="selected"' : '';?>>São Miguel do Tapuio</option>
                                                    <option data-estado="PI" value="Simplício Mendes" <?php echo $cidade_aabb == 'Simplício Mendes' ? 'selected="selected"' : '';?>>Simplício Mendes</option>
                                                    <option data-estado="PI" value="Teresina" <?php echo $cidade_aabb == 'Teresina' ? 'selected="selected"' : '';?>>Teresina</option>
                                                    <option data-estado="PI" value="União" <?php echo $cidade_aabb == 'União' ? 'selected="selected"' : '';?>>União</option>
                                                    <option data-estado="PI" value="Uruçuí" <?php echo $cidade_aabb == 'Uruçuí' ? 'selected="selected"' : '';?>>Uruçuí</option>
                                                    <option data-estado="PI" value="Valença do Piauí" <?php echo $cidade_aabb == 'Valença do Piauí' ? 'selected="selected"' : '';?>>Valença do Piauí</option>
                                                    <option data-estado="PR" value="Altônia" <?php echo $cidade_aabb == 'Altônia' ? 'selected="selected"' : '';?>>Altônia</option>
                                                    <option data-estado="PR" value="Ampére" <?php echo $cidade_aabb == 'Ampére' ? 'selected="selected"' : '';?>>Ampére</option>
                                                    <option data-estado="PR" value="Andirá" <?php echo $cidade_aabb == 'Andirá' ? 'selected="selected"' : '';?>>Andirá</option>
                                                    <option data-estado="PR" value="Apucarana" <?php echo $cidade_aabb == 'Apucarana' ? 'selected="selected"' : '';?>>Apucarana</option>
                                                    <option data-estado="PR" value="Assaí" <?php echo $cidade_aabb == 'Assaí' ? 'selected="selected"' : '';?>>Assaí</option>
                                                    <option data-estado="PR" value="Assis Chateaubriand" <?php echo $cidade_aabb == 'Assis Chateaubriand' ? 'selected="selected"' : '';?>>Assis Chateaubriand</option>
                                                    <option data-estado="PR" value="Astorga" <?php echo $cidade_aabb == 'Astorga' ? 'selected="selected"' : '';?>>Astorga</option>
                                                    <option data-estado="PR" value="Cambará" <?php echo $cidade_aabb == 'Cambará' ? 'selected="selected"' : '';?>>Cambará</option>
                                                    <option data-estado="PR" value="Campina da Lagoa" <?php echo $cidade_aabb == 'Campina da Lagoa' ? 'selected="selected"' : '';?>>Campina da Lagoa</option>
                                                    <option data-estado="PR" value="Campo Largo" <?php echo $cidade_aabb == 'Campo Largo' ? 'selected="selected"' : '';?>>Campo Largo</option>
                                                    <option data-estado="PR" value="Campo Mourão" <?php echo $cidade_aabb == 'Campo Mourão' ? 'selected="selected"' : '';?>>Campo Mourão</option>
                                                    <option data-estado="PR" value="Cascavel" <?php echo $cidade_aabb == 'Cascavel' ? 'selected="selected"' : '';?>>Cascavel</option>
                                                    <option data-estado="PR" value="Castro" <?php echo $cidade_aabb == 'Castro' ? 'selected="selected"' : '';?>>Castro</option>
                                                    <option data-estado="PR" value="Centenário do Sul" <?php echo $cidade_aabb == 'Centenário do Sul' ? 'selected="selected"' : '';?>>Centenário do Sul</option>
                                                    <option data-estado="PR" value="Chopinzinho" <?php echo $cidade_aabb == 'Chopinzinho' ? 'selected="selected"' : '';?>>Chopinzinho</option>
                                                    <option data-estado="PR" value="Cianorte" <?php echo $cidade_aabb == 'Cianorte' ? 'selected="selected"' : '';?>>Cianorte</option>
                                                    <option data-estado="PR" value="Clevelândia" <?php echo $cidade_aabb == 'Clevelândia' ? 'selected="selected"' : '';?>>Clevelândia</option>
                                                    <option data-estado="PR" value="Colorado" <?php echo $cidade_aabb == 'Colorado' ? 'selected="selected"' : '';?>>Colorado</option>
                                                    <option data-estado="PR" value="Cornélio Procópio" <?php echo $cidade_aabb == 'Cornélio Procópio' ? 'selected="selected"' : '';?>>Cornélio Procópio</option>
                                                    <option data-estado="PR" value="Coronel Vivida" <?php echo $cidade_aabb == 'Coronel Vivida' ? 'selected="selected"' : '';?>>Coronel Vivida</option>
                                                    <option data-estado="PR" value="Cruzeiro do Oeste" <?php echo $cidade_aabb == 'Cruzeiro do Oeste' ? 'selected="selected"' : '';?>>Cruzeiro do Oeste</option>
                                                    <option data-estado="PR" value="Curitiba" <?php echo $cidade_aabb == 'Curitiba' ? 'selected="selected"' : '';?>>Curitiba</option>
                                                    <option data-estado="PR" value="Dois Vizinhos" <?php echo $cidade_aabb == 'Dois Vizinhos' ? 'selected="selected"' : '';?>>Dois Vizinhos</option>
                                                    <option data-estado="PR" value="Faxinal" <?php echo $cidade_aabb == 'Faxinal' ? 'selected="selected"' : '';?>>Faxinal</option>
                                                    <option data-estado="PR" value="Foz do Iguaçu" <?php echo $cidade_aabb == 'Foz do Iguaçu' ? 'selected="selected"' : '';?>>Foz do Iguaçu</option>
                                                    <option data-estado="PR" value="Francisco Beltrão" <?php echo $cidade_aabb == 'Francisco Beltrão' ? 'selected="selected"' : '';?>>Francisco Beltrão</option>
                                                    <option data-estado="PR" value="Goioerê" <?php echo $cidade_aabb == 'Goioerê' ? 'selected="selected"' : '';?>>Goioerê</option>
                                                    <option data-estado="PR" value="Guaíra" <?php echo $cidade_aabb == 'Guaíra' ? 'selected="selected"' : '';?>>Guaíra</option>
                                                    <option data-estado="PR" value="Guarapuava" <?php echo $cidade_aabb == 'Guarapuava' ? 'selected="selected"' : '';?>>Guarapuava</option>
                                                    <option data-estado="PR" value="Ibaiti" <?php echo $cidade_aabb == 'Ibaiti' ? 'selected="selected"' : '';?>>Ibaiti</option>
                                                    <option data-estado="PR" value="Ibiporã" <?php echo $cidade_aabb == 'Ibiporã' ? 'selected="selected"' : '';?>>Ibiporã</option>
                                                    <option data-estado="PR" value="Iporã" <?php echo $cidade_aabb == 'Iporã' ? 'selected="selected"' : '';?>>Iporã</option>
                                                    <option data-estado="PR" value="Irati" <?php echo $cidade_aabb == 'Irati' ? 'selected="selected"' : '';?>>Irati</option>
                                                    <option data-estado="PR" value="Itapejara d'Oeste" <?php echo $cidade_aabb == "Itapejara d'Oeste" ? "selected='selected'" : '';?>>Itapejara d'Oeste</option>
                                                    <option data-estado="PR" value="Ivaiporã" <?php echo $cidade_aabb == 'Ivaiporã' ? 'selected="selected"' : '';?>>Ivaiporã</option>
                                                    <option data-estado="PR" value="Jacarezinho" <?php echo $cidade_aabb == 'Jacarezinho' ? 'selected="selected"' : '';?>>Jacarezinho</option>
                                                    <option data-estado="PR" value="Jaguapitã" <?php echo $cidade_aabb == 'Jaguapitã' ? 'selected="selected"' : '';?>>Jaguapitã</option>
                                                    <option data-estado="PR" value="Jandaia do Sul" <?php echo $cidade_aabb == 'Jandaia do Sul' ? 'selected="selected"' : '';?>>Jandaia do Sul</option>
                                                    <option data-estado="PR" value="Janiópolis" <?php echo $cidade_aabb == 'Janiópolis' ? 'selected="selected"' : '';?>>Janiópolis</option>
                                                    <option data-estado="PR" value="Japurá" <?php echo $cidade_aabb == 'Japurá' ? 'selected="selected"' : '';?>>Japurá</option>
                                                    <option data-estado="PR" value="Joaquim Távora" <?php echo $cidade_aabb == 'Joaquim Távora' ? 'selected="selected"' : '';?>>Joaquim Távora</option>
                                                    <option data-estado="PR" value="Lapa" <?php echo $cidade_aabb == 'Lapa' ? 'selected="selected"' : '';?>>Lapa</option>
                                                    <option data-estado="PR" value="Laranjeiras do Sul" <?php echo $cidade_aabb == 'Laranjeiras do Sul' ? 'selected="selected"' : '';?>>Laranjeiras do Sul</option>
                                                    <option data-estado="PR" value="Loanda" <?php echo $cidade_aabb == 'Loanda' ? 'selected="selected"' : '';?>>Loanda</option>
                                                    <option data-estado="PR" value="Londrina" <?php echo $cidade_aabb == 'Londrina' ? 'selected="selected"' : '';?>>Londrina</option>
                                                    <option data-estado="PR" value="Mallet" <?php echo $cidade_aabb == 'Mallet' ? 'selected="selected"' : '';?>>Mallet</option>
                                                    <option data-estado="PR" value="Mangueirinha" <?php echo $cidade_aabb == 'Mangueirinha' ? 'selected="selected"' : '';?>>Mangueirinha</option>
                                                    <option data-estado="PR" value="Manoel Ribas" <?php echo $cidade_aabb == 'Manoel Ribas' ? 'selected="selected"' : '';?>>Manoel Ribas</option>
                                                    <option data-estado="PR" value="Marechal Cândido Rondon" <?php echo $cidade_aabb == 'Marechal Cândido Rondon' ? 'selected="selected"' : '';?>>Marechal Cândido Rondon</option>
                                                    <option data-estado="PR" value="Maringá" <?php echo $cidade_aabb == 'Maringá' ? 'selected="selected"' : '';?>>Maringá</option>
                                                    <option data-estado="PR" value="Marmeleiro" <?php echo $cidade_aabb == 'Marmeleiro' ? 'selected="selected"' : '';?>>Marmeleiro</option>
                                                    <option data-estado="PR" value="Medianeira" <?php echo $cidade_aabb == 'Medianeira' ? 'selected="selected"' : '';?>>Medianeira</option>
                                                    <option data-estado="PR" value="Moreira Sales" <?php echo $cidade_aabb == 'Moreira Sales' ? 'selected="selected"' : '';?>>Moreira Sales</option>
                                                    <option data-estado="PR" value="Nova Esperança" <?php echo $cidade_aabb == 'Nova Esperança' ? 'selected="selected"' : '';?>>Nova Esperança</option>
                                                    <option data-estado="PR" value="Palmas" <?php echo $cidade_aabb == 'Palmas' ? 'selected="selected"' : '';?>>Palmas</option>
                                                    <option data-estado="PR" value="Palmeira" <?php echo $cidade_aabb == 'Palmeira' ? 'selected="selected"' : '';?>>Palmeira</option>
                                                    <option data-estado="PR" value="Palmital" <?php echo $cidade_aabb == 'Palmital' ? 'selected="selected"' : '';?>>Palmital</option>
                                                    <option data-estado="PR" value="Palotina" <?php echo $cidade_aabb == 'Palotina' ? 'selected="selected"' : '';?>>Palotina</option>
                                                    <option data-estado="PR" value="Paraíso do Norte" <?php echo $cidade_aabb == 'Paraíso do Norte' ? 'selected="selected"' : '';?>>Paraíso do Norte</option>
                                                    <option data-estado="PR" value="Paranaguá" <?php echo $cidade_aabb == 'Paranaguá' ? 'selected="selected"' : '';?>>Paranaguá</option>
                                                    <option data-estado="PR" value="Paranavaí" <?php echo $cidade_aabb == 'Paranavaí' ? 'selected="selected"' : '';?>>Paranavaí</option>
                                                    <option data-estado="PR" value="Pato Branco" <?php echo $cidade_aabb == 'Pato Branco' ? 'selected="selected"' : '';?>>Pato Branco</option>
                                                    <option data-estado="PR" value="Pinhão" <?php echo $cidade_aabb == 'Pinhão' ? 'selected="selected"' : '';?>>Pinhão</option>
                                                    <option data-estado="PR" value="Pitanga" <?php echo $cidade_aabb == 'Pitanga' ? 'selected="selected"' : '';?>>Pitanga</option>
                                                    <option data-estado="PR" value="Ponta Grossa" <?php echo $cidade_aabb == 'Ponta Grossa' ? 'selected="selected"' : '';?>>Ponta Grossa</option>
                                                    <option data-estado="PR" value="Porecatu" <?php echo $cidade_aabb == 'Porecatu' ? 'selected="selected"' : '';?>>Porecatu</option>
                                                    <option data-estado="PR" value="Porto União" <?php echo $cidade_aabb == 'Porto União' ? 'selected="selected"' : '';?>>Porto União</option>
                                                    <option data-estado="PR" value="Prudentópolis" <?php echo $cidade_aabb == 'Prudentópolis' ? 'selected="selected"' : '';?>>Prudentópolis</option>
                                                    <option data-estado="PR" value="Querência do Norte" <?php echo $cidade_aabb == 'Querência do Norte' ? 'selected="selected"' : '';?>>Querência do Norte</option>
                                                    <option data-estado="PR" value="Realeza" <?php echo $cidade_aabb == 'Realeza' ? 'selected="selected"' : '';?>>Realeza</option>
                                                    <option data-estado="PR" value="Rolândia" <?php echo $cidade_aabb == 'Rolândia' ? 'selected="selected"' : '';?>>Rolândia</option>
                                                    <option data-estado="PR" value="Rondon" <?php echo $cidade_aabb == 'Rondon' ? 'selected="selected"' : '';?>>Rondon</option>
                                                    <option data-estado="PR" value="Salto do Lontra" <?php echo $cidade_aabb == 'Salto do Lontra' ? 'selected="selected"' : '';?>>Salto do Lontra</option>
                                                    <option data-estado="PR" value="Santa Cecília do Pavão" <?php echo $cidade_aabb == 'Santa Cecília do Pavão' ? 'selected="selected"' : '';?>>Santa Cecília do Pavão</option>
                                                    <option data-estado="PR" value="Santa Helena" <?php echo $cidade_aabb == 'Santa Helena' ? 'selected="selected"' : '';?>>Santa Helena</option>
                                                    <option data-estado="PR" value="Santa Izabel do Oeste" <?php echo $cidade_aabb == 'Santa Izabel do Oeste' ? 'selected="selected"' : '';?>>Santa Izabel do Oeste</option>
                                                    <option data-estado="PR" value="Santo Antônio da Platina" <?php echo $cidade_aabb == 'Santo Antônio da Platina' ? 'selected="selected"' : '';?>>Santo Antônio da Platina</option>
                                                    <option data-estado="PR" value="São João" <?php echo $cidade_aabb == 'São João' ? 'selected="selected"' : '';?>>São João</option>
                                                    <option data-estado="PR" value="São Miguel do Iguaçu" <?php echo $cidade_aabb == 'São Miguel do Iguaçu' ? 'selected="selected"' : '';?>>São Miguel do Iguaçu</option>
                                                    <option data-estado="PR" value="São Pedro do Ivaí" <?php echo $cidade_aabb == 'São Pedro do Ivaí' ? 'selected="selected"' : '';?>>São Pedro do Ivaí</option>
                                                    <option data-estado="PR" value="Sertanópolis" <?php echo $cidade_aabb == 'Sertanópolis' ? 'selected="selected"' : '';?>>Sertanópolis</option>
                                                    <option data-estado="PR" value="Telêmaco Borba" <?php echo $cidade_aabb == 'Telêmaco Borba' ? 'selected="selected"' : '';?>>Telêmaco Borba</option>
                                                    <option data-estado="PR" value="Terra Rica" <?php echo $cidade_aabb == 'Terra Rica' ? 'selected="selected"' : '';?>>Terra Rica</option>
                                                    <option data-estado="PR" value="Terra Roxa" <?php echo $cidade_aabb == 'Terra Roxa' ? 'selected="selected"' : '';?>>Terra Roxa</option>
                                                    <option data-estado="PR" value="Toledo" <?php echo $cidade_aabb == 'Toledo' ? 'selected="selected"' : '';?>>Toledo</option>
                                                    <option data-estado="PR" value="Ubiratã" <?php echo $cidade_aabb == 'Ubiratã' ? 'selected="selected"' : '';?>>Ubiratã</option>
                                                    <option data-estado="PR" value="Umuarama" <?php echo $cidade_aabb == 'Umuarama' ? 'selected="selected"' : '';?>>Umuarama</option>
                                                    <option data-estado="PR" value="Uraí" <?php echo $cidade_aabb == 'Uraí' ? 'selected="selected"' : '';?>>Uraí</option>
                                                    <option data-estado="PR" value="Wenceslau Braz" <?php echo $cidade_aabb == 'Wenceslau Braz' ? 'selected="selected"' : '';?>>Wenceslau Braz</option>
                                                    <option data-estado="RJ" value="Bom Jesus do Itabapoana" <?php echo $cidade_aabb == 'Bom Jesus do Itabapoana' ? 'selected="selected"' : '';?>>Bom Jesus do Itabapoana</option>
                                                    <option data-estado="RJ" value="Campos dos Goytacazes" <?php echo $cidade_aabb == 'Campos dos Goytacazes' ? 'selected="selected"' : '';?>>Campos dos Goytacazes</option>
                                                    <option data-estado="RJ" value="Cantagalo" <?php echo $cidade_aabb == 'Cantagalo' ? 'selected="selected"' : '';?>>Cantagalo</option>
                                                    <option data-estado="RJ" value="Itaperuna" <?php echo $cidade_aabb == 'Itaperuna' ? 'selected="selected"' : '';?>>Itaperuna</option>
                                                    <option data-estado="RJ" value="Macaé" <?php echo $cidade_aabb == 'Macaé' ? 'selected="selected"' : '';?>>Macaé</option>
                                                    <option data-estado="RJ" value="Miracema" <?php echo $cidade_aabb == 'Miracema' ? 'selected="selected"' : '';?>>Miracema</option>
                                                    <option data-estado="RJ" value="Niterói" <?php echo $cidade_aabb == 'Niterói' ? 'selected="selected"' : '';?>>Niterói</option>
                                                    <option data-estado="RJ" value="Resende" <?php echo $cidade_aabb == 'Resende' ? 'selected="selected"' : '';?>>Resende</option>
                                                    <option data-estado="RJ" value="Rio Bonito" <?php echo $cidade_aabb == 'Rio Bonito' ? 'selected="selected"' : '';?>>Rio Bonito</option>
                                                    <option data-estado="RJ" value="Rio de Janeiro" <?php echo $cidade_aabb == 'Rio de Janeiro' ? 'selected="selected"' : '';?>>Rio de Janeiro</option>
                                                    <option data-estado="RJ" value="Rio de Janeiro" <?php echo $cidade_aabb == 'Rio de Janeiro' ? 'selected="selected"' : '';?>>Rio de Janeiro</option>
                                                    <option data-estado="RJ" value="Santo Antônio de Pádua" <?php echo $cidade_aabb == 'Santo Antônio de Pádua' ? 'selected="selected"' : '';?>>Santo Antônio de Pádua</option>
                                                    <option data-estado="RJ" value="Teresópolis" <?php echo $cidade_aabb == 'Teresópolis' ? 'selected="selected"' : '';?>>Teresópolis</option>
                                                    <option data-estado="RJ" value="Três Rios" <?php echo $cidade_aabb == 'Três Rios' ? 'selected="selected"' : '';?>>Três Rios</option>
                                                    <option data-estado="RJ" value="Valença" <?php echo $cidade_aabb == 'Valença' ? 'selected="selected"' : '';?>>Valença</option>
                                                    <option data-estado="RN" value="Alexandria" <?php echo $cidade_aabb == 'Alexandria' ? 'selected="selected"' : '';?>>Alexandria</option>
                                                    <option data-estado="RN" value="Apodi" <?php echo $cidade_aabb == 'Apodi' ? 'selected="selected"' : '';?>>Apodi</option>
                                                    <option data-estado="RN" value="Caicó" <?php echo $cidade_aabb == 'Caicó' ? 'selected="selected"' : '';?>>Caicó</option>
                                                    <option data-estado="RN" value="Currais Novos" <?php echo $cidade_aabb == 'Currais Novos' ? 'selected="selected"' : '';?>>Currais Novos</option>
                                                    <option data-estado="RN" value="João Câmara" <?php echo $cidade_aabb == 'João Câmara' ? 'selected="selected"' : '';?>>João Câmara</option>
                                                    <option data-estado="RN" value="Mossoró" <?php echo $cidade_aabb == 'Mossoró' ? 'selected="selected"' : '';?>>Mossoró</option>
                                                    <option data-estado="RN" value="Natal" <?php echo $cidade_aabb == 'Natal' ? 'selected="selected"' : '';?>>Natal</option>
                                                    <option data-estado="RN" value="Nova Cruz" <?php echo $cidade_aabb == 'Nova Cruz' ? 'selected="selected"' : '';?>>Nova Cruz</option>
                                                    <option data-estado="RN" value="Parelhas" <?php echo $cidade_aabb == 'Parelhas' ? 'selected="selected"' : '';?>>Parelhas</option>
                                                    <option data-estado="RN" value="Pau dos Ferros" <?php echo $cidade_aabb == 'Pau dos Ferros' ? 'selected="selected"' : '';?>>Pau dos Ferros</option>
                                                    <option data-estado="RN" value="São Paulo do Potengi" <?php echo $cidade_aabb == 'São Paulo do Potengi' ? 'selected="selected"' : '';?>>São Paulo do Potengi</option>
                                                    <option data-estado="RO" value="Ariquemes" <?php echo $cidade_aabb == 'Ariquemes' ? 'selected="selected"' : '';?>>Ariquemes</option>
                                                    <option data-estado="RO" value="Cacoal" <?php echo $cidade_aabb == 'Cacoal' ? 'selected="selected"' : '';?>>Cacoal</option>
                                                    <option data-estado="RO" value="Guajará Mirim" <?php echo $cidade_aabb == 'Guajará Mirim' ? 'selected="selected"' : '';?>>Guajará Mirim</option>
                                                    <option data-estado="RO" value="Jaru" <?php echo $cidade_aabb == 'Jaru' ? 'selected="selected"' : '';?>>Jaru</option>
                                                    <option data-estado="RO" value="Ji-Paraná" <?php echo $cidade_aabb == 'Ji-Paraná' ? 'selected="selected"' : '';?>>Ji-Paraná</option>
                                                    <option data-estado="RO" value="Ouro Preto do Oeste" <?php echo $cidade_aabb == 'Ouro Preto do Oeste' ? 'selected="selected"' : '';?>>Ouro Preto do Oeste</option>
                                                    <option data-estado="RO" value="Pimenta Bueno" <?php echo $cidade_aabb == 'Pimenta Bueno' ? 'selected="selected"' : '';?>>Pimenta Bueno</option>
                                                    <option data-estado="RO" value="Porto Velho" <?php echo $cidade_aabb == 'Porto Velho' ? 'selected="selected"' : '';?>>Porto Velho</option>
                                                    <option data-estado="RO" value="Presidente Médici" <?php echo $cidade_aabb == 'Presidente Médici' ? 'selected="selected"' : '';?>>Presidente Médici</option>
                                                    <option data-estado="RO" value="Rolim de Moura" <?php echo $cidade_aabb == 'Rolim de Moura' ? 'selected="selected"' : '';?>>Rolim de Moura</option>
                                                    <option data-estado="RO" value="Vilhena" <?php echo $cidade_aabb == 'Vilhena' ? 'selected="selected"' : '';?>>Vilhena</option>
                                                    <option data-estado="RR" value="Boa Vista" <?php echo $cidade_aabb == 'Boa Vista' ? 'selected="selected"' : '';?>>Boa Vista</option>
                                                    <option data-estado="RS" value="Agudo" <?php echo $cidade_aabb == 'Agudo' ? 'selected="selected"' : '';?>>Agudo</option>
                                                    <option data-estado="RS" value="Alegrete" <?php echo $cidade_aabb == 'Alegrete' ? 'selected="selected"' : '';?>>Alegrete</option>
                                                    <option data-estado="RS" value="Antônio Prado" <?php echo $cidade_aabb == 'Antônio Prado' ? 'selected="selected"' : '';?>>Antônio Prado</option>
                                                    <option data-estado="RS" value="Arroio Grande" <?php echo $cidade_aabb == 'Arroio Grande' ? 'selected="selected"' : '';?>>Arroio Grande</option>
                                                    <option data-estado="RS" value="Bagé" <?php echo $cidade_aabb == 'Bagé' ? 'selected="selected"' : '';?>>Bagé</option>
                                                    <option data-estado="RS" value="Barra do Ribeiro" <?php echo $cidade_aabb == 'Barra do Ribeiro' ? 'selected="selected"' : '';?>>Barra do Ribeiro</option>
                                                    <option data-estado="RS" value="Bento Gonçalves" <?php echo $cidade_aabb == 'Bento Gonçalves' ? 'selected="selected"' : '';?>>Bento Gonçalves</option>
                                                    <option data-estado="RS" value="Boa Vista do Buricá" <?php echo $cidade_aabb == 'Boa Vista do Buricá' ? 'selected="selected"' : '';?>>Boa Vista do Buricá</option>
                                                    <option data-estado="RS" value="Caçapava do Sul" <?php echo $cidade_aabb == 'Caçapava do Sul' ? 'selected="selected"' : '';?>>Caçapava do Sul</option>
                                                    <option data-estado="RS" value="Cacequi" <?php echo $cidade_aabb == 'Cacequi' ? 'selected="selected"' : '';?>>Cacequi</option>
                                                    <option data-estado="RS" value="Cachoeira do Sul" <?php echo $cidade_aabb == 'Cachoeira do Sul' ? 'selected="selected"' : '';?>>Cachoeira do Sul</option>
                                                    <option data-estado="RS" value="Camaquã" <?php echo $cidade_aabb == 'Camaquã' ? 'selected="selected"' : '';?>>Camaquã</option>
                                                    <option data-estado="RS" value="Campo Bom" <?php echo $cidade_aabb == 'Campo Bom' ? 'selected="selected"' : '';?>>Campo Bom</option>
                                                    <option data-estado="RS" value="Campo Novo" <?php echo $cidade_aabb == 'Campo Novo' ? 'selected="selected"' : '';?>>Campo Novo</option>
                                                    <option data-estado="RS" value="Candelária" <?php echo $cidade_aabb == 'Candelária' ? 'selected="selected"' : '';?>>Candelária</option>
                                                    <option data-estado="RS" value="Canguçu" <?php echo $cidade_aabb == 'Canguçu' ? 'selected="selected"' : '';?>>Canguçu</option>
                                                    <option data-estado="RS" value="Canoas" <?php echo $cidade_aabb == 'Canoas' ? 'selected="selected"' : '';?>>Canoas</option>
                                                    <option data-estado="RS" value="Carazinho" <?php echo $cidade_aabb == 'Carazinho' ? 'selected="selected"' : '';?>>Carazinho</option>
                                                    <option data-estado="RS" value="Catuípe" <?php echo $cidade_aabb == 'Catuípe' ? 'selected="selected"' : '';?>>Catuípe</option>
                                                    <option data-estado="RS" value="Caxias do Sul" <?php echo $cidade_aabb == 'Caxias do Sul' ? 'selected="selected"' : '';?>>Caxias do Sul</option>
                                                    <option data-estado="RS" value="Cerro Largo" <?php echo $cidade_aabb == 'Cerro Largo' ? 'selected="selected"' : '';?>>Cerro Largo</option>
                                                    <option data-estado="RS" value="Chapada" <?php echo $cidade_aabb == 'Chapada' ? 'selected="selected"' : '';?>>Chapada</option>
                                                    <option data-estado="RS" value="Constantina" <?php echo $cidade_aabb == 'Constantina' ? 'selected="selected"' : '';?>>Constantina</option>
                                                    <option data-estado="RS" value="Crissiumal" <?php echo $cidade_aabb == 'Crissiumal' ? 'selected="selected"' : '';?>>Crissiumal</option>
                                                    <option data-estado="RS" value="Cruz Alta" <?php echo $cidade_aabb == 'Cruz Alta' ? 'selected="selected"' : '';?>>Cruz Alta</option>
                                                    <option data-estado="RS" value="Dom Feliciano" <?php echo $cidade_aabb == 'Dom Feliciano' ? 'selected="selected"' : '';?>>Dom Feliciano</option>
                                                    <option data-estado="RS" value="Dom Pedrito" <?php echo $cidade_aabb == 'Dom Pedrito' ? 'selected="selected"' : '';?>>Dom Pedrito</option>
                                                    <option data-estado="RS" value="Encantado" <?php echo $cidade_aabb == 'Encantado' ? 'selected="selected"' : '';?>>Encantado</option>
                                                    <option data-estado="RS" value="Encruzilhada do Sul" <?php echo $cidade_aabb == 'Encruzilhada do Sul' ? 'selected="selected"' : '';?>>Encruzilhada do Sul</option>
                                                    <option data-estado="RS" value="Erechim" <?php echo $cidade_aabb == 'Erechim' ? 'selected="selected"' : '';?>>Erechim</option>
                                                    <option data-estado="RS" value="Espumoso" <?php echo $cidade_aabb == 'Espumoso' ? 'selected="selected"' : '';?>>Espumoso</option>
                                                    <option data-estado="RS" value="Estância Velha" <?php echo $cidade_aabb == 'Estância Velha' ? 'selected="selected"' : '';?>>Estância Velha</option>
                                                    <option data-estado="RS" value="Estância Velha" <?php echo $cidade_aabb == 'Estância Velha' ? 'selected="selected"' : '';?>>Estância Velha</option>
                                                    <option data-estado="RS" value="Estrela" <?php echo $cidade_aabb == 'Estrela' ? 'selected="selected"' : '';?>>Estrela</option>
                                                    <option data-estado="RS" value="Farroupilha" <?php echo $cidade_aabb == 'Farroupilha' ? 'selected="selected"' : '';?>>Farroupilha</option>
                                                    <option data-estado="RS" value="Faxinal do Soturno" <?php echo $cidade_aabb == 'Faxinal do Soturno' ? 'selected="selected"' : '';?>>Faxinal do Soturno</option>
                                                    <option data-estado="RS" value="Flores da Cunha" <?php echo $cidade_aabb == 'Flores da Cunha' ? 'selected="selected"' : '';?>>Flores da Cunha</option>
                                                    <option data-estado="RS" value="Frederico Westphalen" <?php echo $cidade_aabb == 'Frederico Westphalen' ? 'selected="selected"' : '';?>>Frederico Westphalen</option>
                                                    <option data-estado="RS" value="Garibaldi" <?php echo $cidade_aabb == 'Garibaldi' ? 'selected="selected"' : '';?>>Garibaldi</option>
                                                    <option data-estado="RS" value="Getúlio Vargas" <?php echo $cidade_aabb == 'Getúlio Vargas' ? 'selected="selected"' : '';?>>Getúlio Vargas</option>
                                                    <option data-estado="RS" value="Giruá" <?php echo $cidade_aabb == 'Giruá' ? 'selected="selected"' : '';?>>Giruá</option>
                                                    <option data-estado="RS" value="Gramado" <?php echo $cidade_aabb == 'Gramado' ? 'selected="selected"' : '';?>>Gramado</option>
                                                    <option data-estado="RS" value="Gravataí" <?php echo $cidade_aabb == 'Gravataí' ? 'selected="selected"' : '';?>>Gravataí</option>
                                                    <option data-estado="RS" value="Guaporé" <?php echo $cidade_aabb == 'Guaporé' ? 'selected="selected"' : '';?>>Guaporé</option>
                                                    <option data-estado="RS" value="Horizontina" <?php echo $cidade_aabb == 'Horizontina' ? 'selected="selected"' : '';?>>Horizontina</option>
                                                    <option data-estado="RS" value="Ibirubá" <?php echo $cidade_aabb == 'Ibirubá' ? 'selected="selected"' : '';?>>Ibirubá</option>
                                                    <option data-estado="RS" value="Igrejinha" <?php echo $cidade_aabb == 'Igrejinha' ? 'selected="selected"' : '';?>>Igrejinha</option>
                                                    <option data-estado="RS" value="Ijuí" <?php echo $cidade_aabb == 'Ijuí' ? 'selected="selected"' : '';?>>Ijuí</option>
                                                    <option data-estado="RS" value="Itaqui" <?php echo $cidade_aabb == 'Itaqui' ? 'selected="selected"' : '';?>>Itaqui</option>
                                                    <option data-estado="RS" value="Jaguarão" <?php echo $cidade_aabb == 'Jaguarão' ? 'selected="selected"' : '';?>>Jaguarão</option>
                                                    <option data-estado="RS" value="Júlio de Castilhos" <?php echo $cidade_aabb == 'Júlio de Castilhos' ? 'selected="selected"' : '';?>>Júlio de Castilhos</option>
                                                    <option data-estado="RS" value="Lagoa Vermelha" <?php echo $cidade_aabb == 'Lagoa Vermelha' ? 'selected="selected"' : '';?>>Lagoa Vermelha</option>
                                                    <option data-estado="RS" value="Lajeado" <?php echo $cidade_aabb == 'Lajeado' ? 'selected="selected"' : '';?>>Lajeado</option>
                                                    <option data-estado="RS" value="Machadinho" <?php echo $cidade_aabb == 'Machadinho' ? 'selected="selected"' : '';?>>Machadinho</option>
                                                    <option data-estado="RS" value="Marau" <?php echo $cidade_aabb == 'Marau' ? 'selected="selected"' : '';?>>Marau</option>
                                                    <option data-estado="RS" value="Marcelino Ramos" <?php echo $cidade_aabb == 'Marcelino Ramos' ? 'selected="selected"' : '';?>>Marcelino Ramos</option>
                                                    <option data-estado="RS" value="Montenegro" <?php echo $cidade_aabb == 'Montenegro' ? 'selected="selected"' : '';?>>Montenegro</option>
                                                    <option data-estado="RS" value="Mostardas" <?php echo $cidade_aabb == 'Mostardas' ? 'selected="selected"' : '';?>>Mostardas</option>
                                                    <option data-estado="RS" value="Nonoai" <?php echo $cidade_aabb == 'Nonoai' ? 'selected="selected"' : '';?>>Nonoai</option>
                                                    <option data-estado="RS" value="Nova Palma" <?php echo $cidade_aabb == 'Nova Palma' ? 'selected="selected"' : '';?>>Nova Palma</option>
                                                    <option data-estado="RS" value="Nova Petrópolis" <?php echo $cidade_aabb == 'Nova Petrópolis' ? 'selected="selected"' : '';?>>Nova Petrópolis</option>
                                                    <option data-estado="RS" value="Nova Prata" <?php echo $cidade_aabb == 'Nova Prata' ? 'selected="selected"' : '';?>>Nova Prata</option>
                                                    <option data-estado="RS" value="Osório" <?php echo $cidade_aabb == 'Osório' ? 'selected="selected"' : '';?>>Osório</option>
                                                    <option data-estado="RS" value="Palmeira das Missões" <?php echo $cidade_aabb == 'Palmeira das Missões' ? 'selected="selected"' : '';?>>Palmeira das Missões</option>
                                                    <option data-estado="RS" value="Panambi" <?php echo $cidade_aabb == 'Panambi' ? 'selected="selected"' : '';?>>Panambi</option>
                                                    <option data-estado="RS" value="Passo Fundo" <?php echo $cidade_aabb == 'Passo Fundo' ? 'selected="selected"' : '';?>>Passo Fundo</option>
                                                    <option data-estado="RS" value="Pelotas" <?php echo $cidade_aabb == 'Pelotas' ? 'selected="selected"' : '';?>>Pelotas</option>
                                                    <option data-estado="RS" value="Pinheiro Machado" <?php echo $cidade_aabb == 'Pinheiro Machado' ? 'selected="selected"' : '';?>>Pinheiro Machado</option>
                                                    <option data-estado="RS" value="Piratini" <?php echo $cidade_aabb == 'Piratini' ? 'selected="selected"' : '';?>>Piratini</option>
                                                    <option data-estado="RS" value="Porto Alegre" <?php echo $cidade_aabb == 'Porto Alegre' ? 'selected="selected"' : '';?>>Porto Alegre</option>
                                                    <option data-estado="RS" value="Porto Xavier" <?php echo $cidade_aabb == 'Porto Xavier' ? 'selected="selected"' : '';?>>Porto Xavier</option>
                                                    <option data-estado="RS" value="Quaraí" <?php echo $cidade_aabb == 'Quaraí' ? 'selected="selected"' : '';?>>Quaraí</option>
                                                    <option data-estado="RS" value="Restinga Seca" <?php echo $cidade_aabb == 'Restinga Seca' ? 'selected="selected"' : '';?>>Restinga Seca</option>
                                                    <option data-estado="RS" value="Rio Grande" <?php echo $cidade_aabb == 'Rio Grande' ? 'selected="selected"' : '';?>>Rio Grande</option>
                                                    <option data-estado="RS" value="Rio Pardo" <?php echo $cidade_aabb == 'Rio Pardo' ? 'selected="selected"' : '';?>>Rio Pardo</option>
                                                    <option data-estado="RS" value="Ronda Alta" <?php echo $cidade_aabb == 'Ronda Alta' ? 'selected="selected"' : '';?>>Ronda Alta</option>
                                                    <option data-estado="RS" value="Roque Gonzales" <?php echo $cidade_aabb == 'Roque Gonzales' ? 'selected="selected"' : '';?>>Roque Gonzales</option>
                                                    <option data-estado="RS" value="Rosário do Sul" <?php echo $cidade_aabb == 'Rosário do Sul' ? 'selected="selected"' : '';?>>Rosário do Sul</option>
                                                    <option data-estado="RS" value="Sananduva" <?php echo $cidade_aabb == 'Sananduva' ? 'selected="selected"' : '';?>>Sananduva</option>
                                                    <option data-estado="RS" value="Santa Bárbara do Sul" <?php echo $cidade_aabb == 'Santa Bárbara do Sul' ? 'selected="selected"' : '';?>>Santa Bárbara do Sul</option>
                                                    <option data-estado="RS" value="Santa Cruz do Sul" <?php echo $cidade_aabb == 'Santa Cruz do Sul' ? 'selected="selected"' : '';?>>Santa Cruz do Sul</option>
                                                    <option data-estado="RS" value="Santa Maria" <?php echo $cidade_aabb == 'Santa Maria' ? 'selected="selected"' : '';?>>Santa Maria</option>
                                                    <option data-estado="RS" value="Santana do Livramento" <?php echo $cidade_aabb == 'Santana do Livramento' ? 'selected="selected"' : '';?>>Santana do Livramento</option>
                                                    <option data-estado="RS" value="Santa Rosa" <?php echo $cidade_aabb == 'Santa Rosa' ? 'selected="selected"' : '';?>>Santa Rosa</option>
                                                    <option data-estado="RS" value="Santa Vitória do Palmar" <?php echo $cidade_aabb == 'Santa Vitória do Palmar' ? 'selected="selected"' : '';?>>Santa Vitória do Palmar</option>
                                                    <option data-estado="RS" value="Santiago" <?php echo $cidade_aabb == 'Santiago' ? 'selected="selected"' : '';?>>Santiago</option>
                                                    <option data-estado="RS" value="Santo Ângelo" <?php echo $cidade_aabb == 'Santo Ângelo' ? 'selected="selected"' : '';?>>Santo Ângelo</option>
                                                    <option data-estado="RS" value="Santo Antônio da Patrulha" <?php echo $cidade_aabb == 'Santo Antônio da Patrulha' ? 'selected="selected"' : '';?>>Santo Antônio da Patrulha</option>
                                                    <option data-estado="RS" value="Santo Augusto" <?php echo $cidade_aabb == 'Santo Augusto' ? 'selected="selected"' : '';?>>Santo Augusto</option>
                                                    <option data-estado="RS" value="Santo Cristo" <?php echo $cidade_aabb == 'Santo Cristo' ? 'selected="selected"' : '';?>>Santo Cristo</option>
                                                    <option data-estado="RS" value="São Borja" <?php echo $cidade_aabb == 'São Borja' ? 'selected="selected"' : '';?>>São Borja</option>
                                                    <option data-estado="RS" value="São Francisco de Assis" <?php echo $cidade_aabb == 'São Francisco de Assis' ? 'selected="selected"' : '';?>>São Francisco de Assis</option>
                                                    <option data-estado="RS" value="São Francisco de Paula" <?php echo $cidade_aabb == 'São Francisco de Paula' ? 'selected="selected"' : '';?>>São Francisco de Paula</option>
                                                    <option data-estado="RS" value="São Gabriel" <?php echo $cidade_aabb == 'São Gabriel' ? 'selected="selected"' : '';?>>São Gabriel</option>
                                                    <option data-estado="RS" value="São Jerônimo" <?php echo $cidade_aabb == 'São Jerônimo' ? 'selected="selected"' : '';?>>São Jerônimo</option>
                                                    <option data-estado="RS" value="São José do Ouro" <?php echo $cidade_aabb == 'São José do Ouro' ? 'selected="selected"' : '';?>>São José do Ouro</option>
                                                    <option data-estado="RS" value="São Leopoldo" <?php echo $cidade_aabb == 'São Leopoldo' ? 'selected="selected"' : '';?>>São Leopoldo</option>
                                                    <option data-estado="RS" value="São Lourenço do Sul" <?php echo $cidade_aabb == 'São Lourenço do Sul' ? 'selected="selected"' : '';?>>São Lourenço do Sul</option>
                                                    <option data-estado="RS" value="São Luiz Gonzaga" <?php echo $cidade_aabb == 'São Luiz Gonzaga' ? 'selected="selected"' : '';?>>São Luiz Gonzaga</option>
                                                    <option data-estado="RS" value="São Pedro do Sul" <?php echo $cidade_aabb == 'São Pedro do Sul' ? 'selected="selected"' : '';?>>São Pedro do Sul</option>
                                                    <option data-estado="RS" value="São Sebastião do Caí" <?php echo $cidade_aabb == 'São Sebastião do Caí' ? 'selected="selected"' : '';?>>São Sebastião do Caí</option>
                                                    <option data-estado="RS" value="São Sepé" <?php echo $cidade_aabb == 'São Sepé' ? 'selected="selected"' : '';?>>São Sepé</option>
                                                    <option data-estado="RS" value="Sarandi" <?php echo $cidade_aabb == 'Sarandi' ? 'selected="selected"' : '';?>>Sarandi</option>
                                                    <option data-estado="RS" value="Serafina Corrêa" <?php echo $cidade_aabb == 'Serafina Corrêa' ? 'selected="selected"' : '';?>>Serafina Corrêa</option>
                                                    <option data-estado="RS" value="Sertão" <?php echo $cidade_aabb == 'Sertão' ? 'selected="selected"' : '';?>>Sertão</option>
                                                    <option data-estado="RS" value="Sobradinho" <?php echo $cidade_aabb == 'Sobradinho' ? 'selected="selected"' : '';?>>Sobradinho</option>
                                                    <option data-estado="RS" value="Soledade" <?php echo $cidade_aabb == 'Soledade' ? 'selected="selected"' : '';?>>Soledade</option>
                                                    <option data-estado="RS" value="Tapejara" <?php echo $cidade_aabb == 'Tapejara' ? 'selected="selected"' : '';?>>Tapejara</option>
                                                    <option data-estado="RS" value="Tapera" <?php echo $cidade_aabb == 'Tapera' ? 'selected="selected"' : '';?>>Tapera</option>
                                                    <option data-estado="RS" value="Tapes" <?php echo $cidade_aabb == 'Tapes' ? 'selected="selected"' : '';?>>Tapes</option>
                                                    <option data-estado="RS" value="Taquara" <?php echo $cidade_aabb == 'Taquara' ? 'selected="selected"' : '';?>>Taquara</option>
                                                    <option data-estado="RS" value="Taquari" <?php echo $cidade_aabb == 'Taquari' ? 'selected="selected"' : '';?>>Taquari</option>
                                                    <option data-estado="RS" value="Tenente Portela" <?php echo $cidade_aabb == 'Tenente Portela' ? 'selected="selected"' : '';?>>Tenente Portela</option>
                                                    <option data-estado="RS" value="Torres" <?php echo $cidade_aabb == 'Torres' ? 'selected="selected"' : '';?>>Torres</option>
                                                    <option data-estado="RS" value="Três Coroas" <?php echo $cidade_aabb == 'Três Coroas' ? 'selected="selected"' : '';?>>Três Coroas</option>
                                                    <option data-estado="RS" value="Três de Maio" <?php echo $cidade_aabb == 'Três de Maio' ? 'selected="selected"' : '';?>>Três de Maio</option>
                                                    <option data-estado="RS" value="Três Passos" <?php echo $cidade_aabb == 'Três Passos' ? 'selected="selected"' : '';?>>Três Passos</option>
                                                    <option data-estado="RS" value="Tupanciretã" <?php echo $cidade_aabb == 'Tupanciretã' ? 'selected="selected"' : '';?>>Tupanciretã</option>
                                                    <option data-estado="RS" value="Uruguaiana" <?php echo $cidade_aabb == 'Uruguaiana' ? 'selected="selected"' : '';?>>Uruguaiana</option>
                                                    <option data-estado="RS" value="Vacaria" <?php echo $cidade_aabb == 'Vacaria' ? 'selected="selected"' : '';?>>Vacaria</option>
                                                    <option data-estado="RS" value="Venâncio Aires" <?php echo $cidade_aabb == 'Venâncio Aires' ? 'selected="selected"' : '';?>>Venâncio Aires</option>
                                                    <option data-estado="RS" value="Vera Cruz" <?php echo $cidade_aabb == 'Vera Cruz' ? 'selected="selected"' : '';?>>Vera Cruz</option>
                                                    <option data-estado="RS" value="Veranópolis" <?php echo $cidade_aabb == 'Veranópolis' ? 'selected="selected"' : '';?>>Veranópolis</option>
                                                    <option data-estado="SC" value="Abelardo Luz" <?php echo $cidade_aabb == 'Abelardo Luz' ? 'selected="selected"' : '';?>>Abelardo Luz</option>
                                                    <option data-estado="SC" value="Alfredo Wagner" <?php echo $cidade_aabb == 'Alfredo Wagner' ? 'selected="selected"' : '';?>>Alfredo Wagner</option>
                                                    <option data-estado="SC" value="Araranguá" <?php echo $cidade_aabb == 'Araranguá' ? 'selected="selected"' : '';?>>Araranguá</option>
                                                    <option data-estado="SC" value="Balneário Camboriú" <?php echo $cidade_aabb == 'Balneário Camboriú' ? 'selected="selected"' : '';?>>Balneário Camboriú</option>
                                                    <option data-estado="SC" value="Barracão" <?php echo $cidade_aabb == 'Barracão' ? 'selected="selected"' : '';?>>Barracão</option>
                                                    <option data-estado="SC" value="Blumenau" <?php echo $cidade_aabb == 'Blumenau' ? 'selected="selected"' : '';?>>Blumenau</option>
                                                    <option data-estado="SC" value="Bom Retiro" <?php echo $cidade_aabb == 'Bom Retiro' ? 'selected="selected"' : '';?>>Bom Retiro</option>
                                                    <option data-estado="SC" value="Braço do Norte" <?php echo $cidade_aabb == 'Braço do Norte' ? 'selected="selected"' : '';?>>Braço do Norte</option>
                                                    <option data-estado="SC" value="Brusque" <?php echo $cidade_aabb == 'Brusque' ? 'selected="selected"' : '';?>>Brusque</option>
                                                    <option data-estado="SC" value="Caçador" <?php echo $cidade_aabb == 'Caçador' ? 'selected="selected"' : '';?>>Caçador</option>
                                                    <option data-estado="SC" value="Campos Novos" <?php echo $cidade_aabb == 'Campos Novos' ? 'selected="selected"' : '';?>>Campos Novos</option>
                                                    <option data-estado="SC" value="Canoinhas" <?php echo $cidade_aabb == 'Canoinhas' ? 'selected="selected"' : '';?>>Canoinhas</option>
                                                    <option data-estado="SC" value="Capinzal" <?php echo $cidade_aabb == 'Capinzal' ? 'selected="selected"' : '';?>>Capinzal</option>
                                                    <option data-estado="SC" value="Chapecó" <?php echo $cidade_aabb == 'Chapecó' ? 'selected="selected"' : '';?>>Chapecó</option>
                                                    <option data-estado="SC" value="Cocal do Sul" <?php echo $cidade_aabb == 'Cocal do Sul' ? 'selected="selected"' : '';?>>Cocal do Sul</option>
                                                    <option data-estado="SC" value="Concórdia" <?php echo $cidade_aabb == 'Concórdia' ? 'selected="selected"' : '';?>>Concórdia</option>
                                                    <option data-estado="SC" value="Cunha Porã" <?php echo $cidade_aabb == 'Cunha Porã' ? 'selected="selected"' : '';?>>Cunha Porã</option>
                                                    <option data-estado="SC" value="Curitibanos" <?php echo $cidade_aabb == 'Curitibanos' ? 'selected="selected"' : '';?>>Curitibanos</option>
                                                    <option data-estado="SC" value="Descanso" <?php echo $cidade_aabb == 'Descanso' ? 'selected="selected"' : '';?>>Descanso</option>
                                                    <option data-estado="SC" value="Florianópolis" <?php echo $cidade_aabb == 'Florianópolis' ? 'selected="selected"' : '';?>>Florianópolis</option>
                                                    <option data-estado="SC" value="Fraiburgo" <?php echo $cidade_aabb == 'Fraiburgo' ? 'selected="selected"' : '';?>>Fraiburgo</option>
                                                    <option data-estado="SC" value="Gaspar" <?php echo $cidade_aabb == 'Gaspar' ? 'selected="selected"' : '';?>>Gaspar</option>
                                                    <option data-estado="SC" value="Guaraciaba" <?php echo $cidade_aabb == 'Guaraciaba' ? 'selected="selected"' : '';?>>Guaraciaba</option>
                                                    <option data-estado="SC" value="Ibirama" <?php echo $cidade_aabb == 'Ibirama' ? 'selected="selected"' : '';?>>Ibirama</option>
                                                    <option data-estado="SC" value="Indaial" <?php echo $cidade_aabb == 'Indaial' ? 'selected="selected"' : '';?>>Indaial</option>
                                                    <option data-estado="SC" value="Itajaí" <?php echo $cidade_aabb == 'Itajaí' ? 'selected="selected"' : '';?>>Itajaí</option>
                                                    <option data-estado="SC" value="Itapiranga" <?php echo $cidade_aabb == 'Itapiranga' ? 'selected="selected"' : '';?>>Itapiranga</option>
                                                    <option data-estado="SC" value="Jacinto Machado" <?php echo $cidade_aabb == 'Jacinto Machado' ? 'selected="selected"' : '';?>>Jacinto Machado</option>
                                                    <option data-estado="SC" value="Jaraguá do Sul" <?php echo $cidade_aabb == 'Jaraguá do Sul' ? 'selected="selected"' : '';?>>Jaraguá do Sul</option>
                                                    <option data-estado="SC" value="Joaçaba" <?php echo $cidade_aabb == 'Joaçaba' ? 'selected="selected"' : '';?>>Joaçaba</option>
                                                    <option data-estado="SC" value="Joinville" <?php echo $cidade_aabb == 'Joinville' ? 'selected="selected"' : '';?>>Joinville</option>
                                                    <option data-estado="SC" value="Lages" <?php echo $cidade_aabb == 'Lages' ? 'selected="selected"' : '';?>>Lages</option>
                                                    <option data-estado="SC" value="Laguna" <?php echo $cidade_aabb == 'Laguna' ? 'selected="selected"' : '';?>>Laguna</option>
                                                    <option data-estado="SC" value="Maravilha" <?php echo $cidade_aabb == 'Maravilha' ? 'selected="selected"' : '';?>>Maravilha</option>
                                                    <option data-estado="SC" value="Mondaí" <?php echo $cidade_aabb == 'Mondaí' ? 'selected="selected"' : '';?>>Mondaí</option>
                                                    <option data-estado="SC" value="Orleans" <?php echo $cidade_aabb == 'Orleans' ? 'selected="selected"' : '';?>>Orleans</option>
                                                    <option data-estado="SC" value="Palma Sola" <?php echo $cidade_aabb == 'Palma Sola' ? 'selected="selected"' : '';?>>Palma Sola</option>
                                                    <option data-estado="SC" value="Palmitos" <?php echo $cidade_aabb == 'Palmitos' ? 'selected="selected"' : '';?>>Palmitos</option>
                                                    <option data-estado="SC" value="Papanduva" <?php echo $cidade_aabb == 'Papanduva' ? 'selected="selected"' : '';?>>Papanduva</option>
                                                    <option data-estado="SC" value="Pinhalzinho" <?php echo $cidade_aabb == 'Pinhalzinho' ? 'selected="selected"' : '';?>>Pinhalzinho</option>
                                                    <option data-estado="SC" value="Pomerode" <?php echo $cidade_aabb == 'Pomerode' ? 'selected="selected"' : '';?>>Pomerode</option>
                                                    <option data-estado="SC" value="Ponte Serrada" <?php echo $cidade_aabb == 'Ponte Serrada' ? 'selected="selected"' : '';?>>Ponte Serrada</option>
                                                    <option data-estado="SC" value="Quilombo" <?php echo $cidade_aabb == 'Quilombo' ? 'selected="selected"' : '';?>>Quilombo</option>
                                                    <option data-estado="SC" value="Rio do Sul" <?php echo $cidade_aabb == 'Rio do Sul' ? 'selected="selected"' : '';?>>Rio do Sul</option>
                                                    <option data-estado="SC" value="Salete" <?php echo $cidade_aabb == 'Salete' ? 'selected="selected"' : '';?>>Salete</option>
                                                    <option data-estado="SC" value="São Bento do Sul" <?php echo $cidade_aabb == 'São Bento do Sul' ? 'selected="selected"' : '';?>>São Bento do Sul</option>
                                                    <option data-estado="SC" value="São Carlos" <?php echo $cidade_aabb == 'São Carlos' ? 'selected="selected"' : '';?>>São Carlos</option>
                                                    <option data-estado="SC" value="São Joaquim" <?php echo $cidade_aabb == 'São Joaquim' ? 'selected="selected"' : '';?>>São Joaquim</option>
                                                    <option data-estado="SC" value="São José do Cedro" <?php echo $cidade_aabb == 'São José do Cedro' ? 'selected="selected"' : '';?>>São José do Cedro</option>
                                                    <option data-estado="SC" value="São Lourenço do Oeste" <?php echo $cidade_aabb == 'São Lourenço do Oeste' ? 'selected="selected"' : '';?>>São Lourenço do Oeste</option>
                                                    <option data-estado="SC" value="São Miguel do Oeste" <?php echo $cidade_aabb == 'São Miguel do Oeste' ? 'selected="selected"' : '';?>>São Miguel do Oeste</option>
                                                    <option data-estado="SC" value="Seara" <?php echo $cidade_aabb == 'Seara' ? 'selected="selected"' : '';?>>Seara</option>
                                                    <option data-estado="SC" value="Taió" <?php echo $cidade_aabb == 'Taió' ? 'selected="selected"' : '';?>>Taió</option>
                                                    <option data-estado="SC" value="Tangará" <?php echo $cidade_aabb == 'Tangará' ? 'selected="selected"' : '';?>>Tangará</option>
                                                    <option data-estado="SC" value="Timbó" <?php echo $cidade_aabb == 'Timbó' ? 'selected="selected"' : '';?>>Timbó</option>
                                                    <option data-estado="SC" value="Tubarão" <?php echo $cidade_aabb == 'Tubarão' ? 'selected="selected"' : '';?>>Tubarão</option>
                                                    <option data-estado="SC" value="Videira" <?php echo $cidade_aabb == 'Videira' ? 'selected="selected"' : '';?>>Videira</option>
                                                    <option data-estado="SC" value="Xanxerê" <?php echo $cidade_aabb == 'Xanxerê' ? 'selected="selected"' : '';?>>Xanxerê</option>
                                                    <option data-estado="SE" value="Aquidabã" <?php echo $cidade_aabb == 'Aquidabã' ? 'selected="selected"' : '';?>>Aquidabã</option>
                                                    <option data-estado="SE" value="Aracaju" <?php echo $cidade_aabb == 'Aracaju' ? 'selected="selected"' : '';?>>Aracaju</option>
                                                    <option data-estado="SE" value="Frei Paulo" <?php echo $cidade_aabb == 'Frei Paulo' ? 'selected="selected"' : '';?>>Frei Paulo</option>
                                                    <option data-estado="SE" value="Itabaiana" <?php echo $cidade_aabb == 'Itabaiana' ? 'selected="selected"' : '';?>>Itabaiana</option>
                                                    <option data-estado="SE" value="Nossa Senhora da Glória" <?php echo $cidade_aabb == 'Nossa Senhora da Glória' ? 'selected="selected"' : '';?>>Nossa Senhora da Glória</option>
                                                    <option data-estado="SE" value="Porto da Folha" <?php echo $cidade_aabb == 'Porto da Folha' ? 'selected="selected"' : '';?>>Porto da Folha</option>
                                                    <option data-estado="SE" value="Propriá" <?php echo $cidade_aabb == 'Propriá' ? 'selected="selected"' : '';?>>Propriá</option>
                                                    <option data-estado="SE" value="Ribeirópolis" <?php echo $cidade_aabb == 'Ribeirópolis' ? 'selected="selected"' : '';?>>Ribeirópolis</option>
                                                    <option data-estado="SE" value="Tobias Barreto" <?php echo $cidade_aabb == 'Tobias Barreto' ? 'selected="selected"' : '';?>>Tobias Barreto</option>
                                                    <option data-estado="SP" value="Adamantina" <?php echo $cidade_aabb == 'Adamantina' ? 'selected="selected"' : '';?>>Adamantina</option>
                                                    <option data-estado="SP" value="Amparo" <?php echo $cidade_aabb == 'Amparo' ? 'selected="selected"' : '';?>>Amparo</option>
                                                    <option data-estado="SP" value="Araçatuba" <?php echo $cidade_aabb == 'Araçatuba' ? 'selected="selected"' : '';?>>Araçatuba</option>
                                                    <option data-estado="SP" value="Araraquara" <?php echo $cidade_aabb == 'Araraquara' ? 'selected="selected"' : '';?>>Araraquara</option>
                                                    <option data-estado="SP" value="Atibaia" <?php echo $cidade_aabb == 'Atibaia' ? 'selected="selected"' : '';?>>Atibaia</option>
                                                    <option data-estado="SP" value="Bariri" <?php echo $cidade_aabb == 'Bariri' ? 'selected="selected"' : '';?>>Bariri</option>
                                                    <option data-estado="SP" value="Barretos" <?php echo $cidade_aabb == 'Barretos' ? 'selected="selected"' : '';?>>Barretos</option>
                                                    <option data-estado="SP" value="Bauru" <?php echo $cidade_aabb == 'Bauru' ? 'selected="selected"' : '';?>>Bauru</option>
                                                    <option data-estado="SP" value="Bebedouro" <?php echo $cidade_aabb == 'Bebedouro' ? 'selected="selected"' : '';?>>Bebedouro</option>
                                                    <option data-estado="SP" value="Birigüi" <?php echo $cidade_aabb == 'Birigüi' ? 'selected="selected"' : '';?>>Birigüi</option>
                                                    <option data-estado="SP" value="Botucatu" <?php echo $cidade_aabb == 'Botucatu' ? 'selected="selected"' : '';?>>Botucatu</option>
                                                    <option data-estado="SP" value="Bragança Paulista" <?php echo $cidade_aabb == 'Bragança Paulista' ? 'selected="selected"' : '';?>>Bragança Paulista</option>
                                                    <option data-estado="SP" value="Cafelândia" <?php echo $cidade_aabb == 'Cafelândia' ? 'selected="selected"' : '';?>>Cafelândia</option>
                                                    <option data-estado="SP" value="Campinas" <?php echo $cidade_aabb == 'Campinas' ? 'selected="selected"' : '';?>>Campinas</option>
                                                    <option data-estado="SP" value="Capão Bonito" <?php echo $cidade_aabb == 'Capão Bonito' ? 'selected="selected"' : '';?>>Capão Bonito</option>
                                                    <option data-estado="SP" value="Cardoso" <?php echo $cidade_aabb == 'Cardoso' ? 'selected="selected"' : '';?>>Cardoso</option>
                                                    <option data-estado="SP" value="Catanduva" <?php echo $cidade_aabb == 'Catanduva' ? 'selected="selected"' : '';?>>Catanduva</option>
                                                    <option data-estado="SP" value="Chavantes" <?php echo $cidade_aabb == 'Chavantes' ? 'selected="selected"' : '';?>>Chavantes</option>
                                                    <option data-estado="SP" value="Dracena" <?php echo $cidade_aabb == 'Dracena' ? 'selected="selected"' : '';?>>Dracena</option>
                                                    <option data-estado="SP" value="Duartina" <?php echo $cidade_aabb == 'Duartina' ? 'selected="selected"' : '';?>>Duartina</option>
                                                    <option data-estado="SP" value="Espírito Santo do Pinhal" <?php echo $cidade_aabb == 'Espírito Santo do Pinhal' ? 'selected="selected"' : '';?>>Espírito Santo do Pinhal</option>
                                                    <option data-estado="SP" value="Estrela D'Oeste" <?php echo $cidade_aabb == "Estrela D'Oeste" ? "selected='selected'" : '';?>>Estrela D'Oeste</option>
                                                    <option data-estado="SP" value="Franca" <?php echo $cidade_aabb == 'Franca' ? 'selected="selected"' : '';?>>Franca</option>
                                                    <option data-estado="SP" value="Garça" <?php echo $cidade_aabb == 'Garça' ? 'selected="selected"' : '';?>>Garça</option>
                                                    <option data-estado="SP" value="Guaíra" <?php echo $cidade_aabb == 'Guaíra' ? 'selected="selected"' : '';?>>Guaíra</option>
                                                    <option data-estado="SP" value="Ibitinga" <?php echo $cidade_aabb == 'Ibitinga' ? 'selected="selected"' : '';?>>Ibitinga</option>
                                                    <option data-estado="SP" value="Igaraçu do Tietê" <?php echo $cidade_aabb == 'Igaraçu do Tietê' ? 'selected="selected"' : '';?>>Igaraçu do Tietê</option>
                                                    <option data-estado="SP" value="Itaí" <?php echo $cidade_aabb == 'Itaí' ? 'selected="selected"' : '';?>>Itaí</option>
                                                    <option data-estado="SP" value="Itapetininga" <?php echo $cidade_aabb == 'Itapetininga' ? 'selected="selected"' : '';?>>Itapetininga</option>
                                                    <option data-estado="SP" value="Itapeva" <?php echo $cidade_aabb == 'Itapeva' ? 'selected="selected"' : '';?>>Itapeva</option>
                                                    <option data-estado="SP" value="Itapira" <?php echo $cidade_aabb == 'Itapira' ? 'selected="selected"' : '';?>>Itapira</option>
                                                    <option data-estado="SP" value="Itápolis" <?php echo $cidade_aabb == 'Itápolis' ? 'selected="selected"' : '';?>>Itápolis</option>
                                                    <option data-estado="SP" value="Itararé" <?php echo $cidade_aabb == 'Itararé' ? 'selected="selected"' : '';?>>Itararé</option>
                                                    <option data-estado="SP" value="Jaboticabal" <?php echo $cidade_aabb == 'Jaboticabal' ? 'selected="selected"' : '';?>>Jaboticabal</option>
                                                    <option data-estado="SP" value="Jales" <?php echo $cidade_aabb == 'Jales' ? 'selected="selected"' : '';?>>Jales</option>
                                                    <option data-estado="SP" value="Jaú" <?php echo $cidade_aabb == 'Jaú' ? 'selected="selected"' : '';?>>Jaú</option>
                                                    <option data-estado="SP" value="Jundiaí" <?php echo $cidade_aabb == 'Jundiaí' ? 'selected="selected"' : '';?>>Jundiaí</option>
                                                    <option data-estado="SP" value="Junqueirópolis" <?php echo $cidade_aabb == 'Junqueirópolis' ? 'selected="selected"' : '';?>>Junqueirópolis</option>
                                                    <option data-estado="SP" value="Lençóis Paulista" <?php echo $cidade_aabb == 'Lençóis Paulista' ? 'selected="selected"' : '';?>>Lençóis Paulista</option>
                                                    <option data-estado="SP" value="Limeira" <?php echo $cidade_aabb == 'Limeira' ? 'selected="selected"' : '';?>>Limeira</option>
                                                    <option data-estado="SP" value="Lins" <?php echo $cidade_aabb == 'Lins' ? 'selected="selected"' : '';?>>Lins</option>
                                                    <option data-estado="SP" value="Marília" <?php echo $cidade_aabb == 'Marília' ? 'selected="selected"' : '';?>>Marília</option>
                                                    <option data-estado="SP" value="Martinópolis" <?php echo $cidade_aabb == 'Martinópolis' ? 'selected="selected"' : '';?>>Martinópolis</option>
                                                    <option data-estado="SP" value="Matão" <?php echo $cidade_aabb == 'Matão' ? 'selected="selected"' : '';?>>Matão</option>
                                                    <option data-estado="SP" value="Miguelópolis" <?php echo $cidade_aabb == 'Miguelópolis' ? 'selected="selected"' : '';?>>Miguelópolis</option>
                                                    <option data-estado="SP" value="Mirandópolis" <?php echo $cidade_aabb == 'Mirandópolis' ? 'selected="selected"' : '';?>>Mirandópolis</option>
                                                    <option data-estado="SP" value="Mirassol" <?php echo $cidade_aabb == 'Mirassol' ? 'selected="selected"' : '';?>>Mirassol</option>
                                                    <option data-estado="SP" value="Mogi-Mirim" <?php echo $cidade_aabb == 'Mogi-Mirim' ? 'selected="selected"' : '';?>>Mogi-Mirim</option>
                                                    <option data-estado="SP" value="Monte Alto" <?php echo $cidade_aabb == 'Monte Alto' ? 'selected="selected"' : '';?>>Monte Alto</option>
                                                    <option data-estado="SP" value="Nhandeara" <?php echo $cidade_aabb == 'Nhandeara' ? 'selected="selected"' : '';?>>Nhandeara</option>
                                                    <option data-estado="SP" value="Novo Horizonte" <?php echo $cidade_aabb == 'Novo Horizonte' ? 'selected="selected"' : '';?>>Novo Horizonte</option>
                                                    <option data-estado="SP" value="Olímpia" <?php echo $cidade_aabb == 'Olímpia' ? 'selected="selected"' : '';?>>Olímpia</option>
                                                    <option data-estado="SP" value="Orlândia" <?php echo $cidade_aabb == 'Orlândia' ? 'selected="selected"' : '';?>>Orlândia</option>
                                                    <option data-estado="SP" value="Ourinhos" <?php echo $cidade_aabb == 'Ourinhos' ? 'selected="selected"' : '';?>>Ourinhos</option>
                                                    <option data-estado="SP" value="Pederneiras" <?php echo $cidade_aabb == 'Pederneiras' ? 'selected="selected"' : '';?>>Pederneiras</option>
                                                    <option data-estado="SP" value="Penápolis" <?php echo $cidade_aabb == 'Penápolis' ? 'selected="selected"' : '';?>>Penápolis</option>
                                                    <option data-estado="SP" value="Piracicaba" <?php echo $cidade_aabb == 'Piracicaba' ? 'selected="selected"' : '';?>>Piracicaba</option>
                                                    <option data-estado="SP" value="Piraju" <?php echo $cidade_aabb == 'Piraju' ? 'selected="selected"' : '';?>>Piraju</option>
                                                    <option data-estado="SP" value="Pirajuí" <?php echo $cidade_aabb == 'Pirajuí' ? 'selected="selected"' : '';?>>Pirajuí</option>
                                                    <option data-estado="SP" value="Pirassununga" <?php echo $cidade_aabb == 'Pirassununga' ? 'selected="selected"' : '';?>>Pirassununga</option>
                                                    <option data-estado="SP" value="Pompéia" <?php echo $cidade_aabb == 'Pompéia' ? 'selected="selected"' : '';?>>Pompéia</option>
                                                    <option data-estado="SP" value="Presidente Bernardes" <?php echo $cidade_aabb == 'Presidente Bernardes' ? 'selected="selected"' : '';?>>Presidente Bernardes</option>
                                                    <option data-estado="SP" value="Presidente Epitácio" <?php echo $cidade_aabb == 'Presidente Epitácio' ? 'selected="selected"' : '';?>>Presidente Epitácio</option>
                                                    <option data-estado="SP" value="Presidente Prudente" <?php echo $cidade_aabb == 'Presidente Prudente' ? 'selected="selected"' : '';?>>Presidente Prudente</option>
                                                    <option data-estado="SP" value="Presidente Venceslau" <?php echo $cidade_aabb == 'Presidente Venceslau' ? 'selected="selected"' : '';?>>Presidente Venceslau</option>
                                                    <option data-estado="SP" value="Promissão" <?php echo $cidade_aabb == 'Promissão' ? 'selected="selected"' : '';?>>Promissão</option>
                                                    <option data-estado="SP" value="Rancharia" <?php echo $cidade_aabb == 'Rancharia' ? 'selected="selected"' : '';?>>Rancharia</option>
                                                    <option data-estado="SP" value="Ribeirão Preto" <?php echo $cidade_aabb == 'Ribeirão Preto' ? 'selected="selected"' : '';?>>Ribeirão Preto</option>
                                                    <option data-estado="SP" value="Santa Cruz do Rio Pardo" <?php echo $cidade_aabb == 'Santa Cruz do Rio Pardo' ? 'selected="selected"' : '';?>>Santa Cruz do Rio Pardo</option>
                                                    <option data-estado="SP" value="Santa Fé do Sul" <?php echo $cidade_aabb == 'Santa Fé do Sul' ? 'selected="selected"' : '';?>>Santa Fé do Sul</option>
                                                    <option data-estado="SP" value="Santos" <?php echo $cidade_aabb == 'Santos' ? 'selected="selected"' : '';?>>Santos</option>
                                                    <option data-estado="SP" value="São Bernardo do Campo" <?php echo $cidade_aabb == 'São Bernardo do Campo' ? 'selected="selected"' : '';?>>São Bernardo do Campo</option>
                                                    <option data-estado="SP" value="São João da Boa Vista" <?php echo $cidade_aabb == 'São João da Boa Vista' ? 'selected="selected"' : '';?>>São João da Boa Vista</option>
                                                    <option data-estado="SP" value="São José do Rio Preto" <?php echo $cidade_aabb == 'São José do Rio Preto' ? 'selected="selected"' : '';?>>São José do Rio Preto</option>
                                                    <option data-estado="SP" value="São José dos Campos" <?php echo $cidade_aabb == 'São José dos Campos' ? 'selected="selected"' : '';?>>São José dos Campos</option>
                                                    <option data-estado="SP" value="São Manuel" <?php echo $cidade_aabb == 'São Manuel' ? 'selected="selected"' : '';?>>São Manuel</option>
                                                    <option data-estado="SP" value="São Paulo" <?php echo $cidade_aabb == 'São Paulo' ? 'selected="selected"' : '';?>>São Paulo</option>
                                                    <option data-estado="SP" value="São Paulo" <?php echo $cidade_aabb == 'São Paulo' ? 'selected="selected"' : '';?>>São Paulo</option>
                                                    <option data-estado="SP" value="São Paulo" <?php echo $cidade_aabb == 'São Paulo' ? 'selected="selected"' : '';?>>São Paulo</option>
                                                    <option data-estado="SP" value="Sertãozinho" <?php echo $cidade_aabb == 'Sertãozinho' ? 'selected="selected"' : '';?>>Sertãozinho</option>
                                                    <option data-estado="SP" value="Sorocaba" <?php echo $cidade_aabb == 'Sorocaba' ? 'selected="selected"' : '';?>>Sorocaba</option>
                                                    <option data-estado="SP" value="Sumaré" <?php echo $cidade_aabb == 'Sumaré' ? 'selected="selected"' : '';?>>Sumaré</option>
                                                    <option data-estado="SP" value="Tanabi" <?php echo $cidade_aabb == 'Tanabi' ? 'selected="selected"' : '';?>>Tanabi</option>
                                                    <option data-estado="SP" value="Tupã" <?php echo $cidade_aabb == 'Tupã' ? 'selected="selected"' : '';?>>Tupã</option>
                                                    <option data-estado="SP" value="Tupi Paulista" <?php echo $cidade_aabb == 'Tupi Paulista' ? 'selected="selected"' : '';?>>Tupi Paulista</option>
                                                    <option data-estado="SP" value="Votuporanga" <?php echo $cidade_aabb == 'Votuporanga' ? 'selected="selected"' : '';?>>Votuporanga</option>
                                                    <option data-estado="TO" value="Alvorada" <?php echo $cidade_aabb == 'Alvorada' ? 'selected="selected"' : '';?>>Alvorada</option>
                                                    <option data-estado="TO" value="Araguaína" <?php echo $cidade_aabb == 'Araguaína' ? 'selected="selected"' : '';?>>Araguaína</option>
                                                    <option data-estado="TO" value="Arraias" <?php echo $cidade_aabb == 'Arraias' ? 'selected="selected"' : '';?>>Arraias</option>
                                                    <option data-estado="TO" value="Colinas do Tocantins" <?php echo $cidade_aabb == 'Colinas do Tocantins' ? 'selected="selected"' : '';?>>Colinas do Tocantins</option>
                                                    <option data-estado="TO" value="Colméia" <?php echo $cidade_aabb == 'Colméia' ? 'selected="selected"' : '';?>>Colméia</option>
                                                    <option data-estado="TO" value="Cristalândia" <?php echo $cidade_aabb == 'Cristalândia' ? 'selected="selected"' : '';?>>Cristalândia</option>
                                                    <option data-estado="TO" value="Dianópolis" <?php echo $cidade_aabb == 'Dianópolis' ? 'selected="selected"' : '';?>>Dianópolis</option>
                                                    <option data-estado="TO" value="Guaraí" <?php echo $cidade_aabb == 'Guaraí' ? 'selected="selected"' : '';?>>Guaraí</option>
                                                    <option data-estado="TO" value="Gurupi" <?php echo $cidade_aabb == 'Gurupi' ? 'selected="selected"' : '';?>>Gurupi</option>
                                                    <option data-estado="TO" value="Miracema do Tocantins" <?php echo $cidade_aabb == 'Miracema do Tocantins' ? 'selected="selected"' : '';?>>Miracema do Tocantins</option>
                                                    <option data-estado="TO" value="Palmas" <?php echo $cidade_aabb == 'Palmas' ? 'selected="selected"' : '';?>>Palmas</option>
                                                    <option data-estado="TO" value="Paraíso do Tocantins" <?php echo $cidade_aabb == 'Paraíso do Tocantins' ? 'selected="selected"' : '';?>>Paraíso do Tocantins</option>
                                                    <option data-estado="TO" value="Pedro Afonso" <?php echo $cidade_aabb == 'Pedro Afonso' ? 'selected="selected"' : '';?>>Pedro Afonso</option>
                                                    <option data-estado="TO" value="Porto Nacional" <?php echo $cidade_aabb == 'Porto Nacional' ? 'selected="selected"' : '';?>>Porto Nacional</option>
                                                    <option data-estado="TO" value="Tocantinópolis" <?php echo $cidade_aabb == 'Tocantinópolis' ? 'selected="selected"' : '';?>>Tocantinópolis</option>

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