<?php
get_header();
    if(!is_user_logged_in()){
    	?>
    <div id="page-cadastro" class="background-cinza">
        
        <div class="container container-page margin-top-25">
            <div class="row">
                <div class="col-lg-4 margin-top-25">
                    
                </div>
                <div class="col-lg-8 margin-top-25">
                    <div class="box-cadastro background-azul border-radius">
                        
                        <div class="row row-formulario-cadastro">
                            <div class="col-12">
                                <h1 class="titulo-cadastro"> Criar conta</h1>
                                <form class="form-cadastro">
                                    
                                
                                    <div class="row form-group">

                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="display_name" maxlength="50" placeholder="Nome completo">
                                            <div id="error-nome" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="user_email" maxlength="60" placeholder="E-mail">
                                            <div id="error-email-vazio" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                            <div id="error-email-invalido" class="invalid-feedback">
                                                Informe um endereço de e-mail válido!
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="user_telefone" id="user_telefone" placeholder="WhatsApp">
                                            <div id="error-telefone-vazio" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                            <div id="error-telefone-invalido" class="invalid-feedback">
                                                Informe um telefone válido!
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="username" id="username" maxlength="50" placeholder="Nome de usuário">
                                            <div id="error-username" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="user_pass" placeholder="Senha de acesso">
                                            <div id="error-senha" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="user_socio_aabb">Sócio AABB? *</label>
                                            <select id="user_socio_aabb" class="form-control" name="user_socio_aabb">
                                                <option value="" selected="selected">-</option>
                                                <option value="Sim">Sim</option>
                                                <option value="Não">Não</option>
                                            </select>
                                            <div id="error-socio_aabb" class="invalid-feedback">
                                                Campo obrigatório!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-5">
                                            <div class="box-estado-aabb">
                                                <label for="user_estado-aabb">Estado AABB</label>
                                                <select id="user_estado-aabb" class="form-control" name="user_estado-aabb">
                                                    <option value="">Selecione o Estado</option>
                                                    <option value="AC">AC</option>
                                                    <option value="AL">AL</option>
                                                    <option value="AM">AM</option>
                                                    <option value="AP">AP</option>
                                                    <option value="BA">BA</option>
                                                    <option value="CE">CE</option>
                                                    <option value="DF">DF</option>
                                                    <option value="ES">ES</option>
                                                    <option value="GO">GO</option>
                                                    <option value="MA">MA</option>
                                                    <option value="MG">MG</option>
                                                    <option value="MS">MS</option>
                                                    <option value="MT">MT</option>
                                                    <option value="PA">PA</option>
                                                    <option value="PB">PB</option>
                                                    <option value="PE">PE</option>
                                                    <option value="PI">PI</option>
                                                    <option value="PR">PR</option>
                                                    <option value="RJ">RJ</option>
                                                    <option value="RN">RN</option>
                                                    <option value="RO">RO</option>
                                                    <option value="RR">RR</option>
                                                    <option value="RS">RS</option>
                                                    <option value="SC">SC</option>
                                                    <option value="SE">SE</option>
                                                    <option value="SP">SP</option>
                                                    <option value="TO">TO</option>
                                                </select>
                                                <div id="error-estado-aabb" class="invalid-feedback">
                                                    Campo obrigatório!
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-7">
                                            <div class="box-cidade-aabb">    
                                                <label for="user_cidade_aabb">Cidade AABB</label>
                                                <select id="user_cidade_aabb" name="user_cidade_aabb" class="form-control">
                                                    <option value="">Selecione a Cidade</option>
                                                    <option data-estado="AC" value="Cruzeiro do Sul">Cruzeiro do Sul</option>
                                                    <option data-estado="AC" value="Rio Branco">Rio Branco</option>
                                                    <option data-estado="AC" value="Sena Madureira">Sena Madureira</option>
                                                    <option data-estado="AL" value="Arapiraca">Arapiraca</option>
                                                    <option data-estado="AL" value="Coruripe">Coruripe</option>
                                                    <option data-estado="AL" value="Delmiro Gouveia">Delmiro Gouveia</option>
                                                    <option data-estado="AL" value="Junqueiro">Junqueiro</option>
                                                    <option data-estado="AL" value="Maceió">Maceió</option>
                                                    <option data-estado="AL" value="Palmeira dos Índios">Palmeira dos Índios</option>
                                                    <option data-estado="AL" value="Penedo">Penedo</option>
                                                    <option data-estado="AL" value="Santana do Ipanema">Santana do Ipanema</option>
                                                    <option data-estado="AL" value="São Miguel dos Campos">São Miguel dos Campos</option>
                                                    <option data-estado="AL" value="União dos Palmares">União dos Palmares</option>
                                                    <option data-estado="AL" value="Viçosa">Viçosa</option>
                                                    <option data-estado="AM" value="Boca do Acre">Boca do Acre</option>
                                                    <option data-estado="AM" value="Humaitá">Humaitá</option>
                                                    <option data-estado="AM" value="Manaus">Manaus</option>
                                                    <option data-estado="AM" value="Manicoré">Manicoré</option>
                                                    <option data-estado="AM" value="São Gabriel da Cachoeira">São Gabriel da Cachoeira</option>
                                                    <option data-estado="AM" value="Tefé">Tefé</option>
                                                    <option data-estado="AP" value="Macapá">Macapá</option>
                                                    <option data-estado="BA" value="Alagoinhas">Alagoinhas</option>
                                                    <option data-estado="BA" value="Amargosa">Amargosa</option>
                                                    <option data-estado="BA" value="Angical">Angical</option>
                                                    <option data-estado="BA" value="Barra">Barra</option>
                                                    <option data-estado="BA" value="Barra da Estiva">Barra da Estiva</option>
                                                    <option data-estado="BA" value="Barra do Mendes">Barra do Mendes</option>
                                                    <option data-estado="BA" value="Barreiras">Barreiras</option>
                                                    <option data-estado="BA" value="Belmonte">Belmonte</option>
                                                    <option data-estado="BA" value="Bom Jesus da Lapa">Bom Jesus da Lapa</option>
                                                    <option data-estado="BA" value="Brumado">Brumado</option>
                                                    <option data-estado="BA" value="Caetité">Caetité</option>
                                                    <option data-estado="BA" value="Casa Nova">Casa Nova</option>
                                                    <option data-estado="BA" value="Castro Alves">Castro Alves</option>
                                                    <option data-estado="BA" value="Coaraci">Coaraci</option>
                                                    <option data-estado="BA" value="Conceição do Coité">Conceição do Coité</option>
                                                    <option data-estado="BA" value="Condeúba">Condeúba</option>
                                                    <option data-estado="BA" value="Cruz das Almas">Cruz das Almas</option>
                                                    <option data-estado="BA" value="Euclides da Cunha">Euclides da Cunha</option>
                                                    <option data-estado="BA" value="Eunápolis">Eunápolis</option>
                                                    <option data-estado="BA" value="Feira de Santana">Feira de Santana</option>
                                                    <option data-estado="BA" value="Gandu">Gandu</option>
                                                    <option data-estado="BA" value="Guanambi">Guanambi</option>
                                                    <option data-estado="BA" value="Iaçu">Iaçu</option>
                                                    <option data-estado="BA" value="Ibirataia">Ibirataia</option>
                                                    <option data-estado="BA" value="Ibotirama">Ibotirama</option>
                                                    <option data-estado="BA" value="Ilhéus">Ilhéus</option>
                                                    <option data-estado="BA" value="Inhambupe">Inhambupe</option>
                                                    <option data-estado="BA" value="Ipiaú">Ipiaú</option>
                                                    <option data-estado="BA" value="Iramaia">Iramaia</option>
                                                    <option data-estado="BA" value="Irará">Irará</option>
                                                    <option data-estado="BA" value="Irecê">Irecê</option>
                                                    <option data-estado="BA" value="Itaberaba">Itaberaba</option>
                                                    <option data-estado="BA" value="Itabuna">Itabuna</option>
                                                    <option data-estado="BA" value="Itajuípe">Itajuípe</option>
                                                    <option data-estado="BA" value="Itambé">Itambé</option>
                                                    <option data-estado="BA" value="Itanhém">Itanhém</option>
                                                    <option data-estado="BA" value="Itapitanga">Itapitanga</option>
                                                    <option data-estado="BA" value="Itiúba">Itiúba</option>
                                                    <option data-estado="BA" value="Ituberá">Ituberá</option>
                                                    <option data-estado="BA" value="Jacaraci">Jacaraci</option>
                                                    <option data-estado="BA" value="Jacobina">Jacobina</option>
                                                    <option data-estado="BA" value="Jequié">Jequié</option>
                                                    <option data-estado="BA" value="Livramento de Nossa Senhora">Livramento de Nossa Senhora</option>
                                                    <option data-estado="BA" value="Macarani">Macarani</option>
                                                    <option data-estado="BA" value="Mairi">Mairi</option>
                                                    <option data-estado="BA" value="Miguel Calmon">Miguel Calmon</option>
                                                    <option data-estado="BA" value="Morro do Chapéu">Morro do Chapéu</option>
                                                    <option data-estado="BA" value="Mundo Novo">Mundo Novo</option>
                                                    <option data-estado="BA" value="Mutuípe">Mutuípe</option>
                                                    <option data-estado="BA" value="Nazaré">Nazaré</option>
                                                    <option data-estado="BA" value="Paratinga">Paratinga</option>
                                                    <option data-estado="BA" value="Paripiranga">Paripiranga</option>
                                                    <option data-estado="BA" value="Riachão do Jacuípe">Riachão do Jacuípe</option>
                                                    <option data-estado="BA" value="Riacho de Santana">Riacho de Santana</option>
                                                    <option data-estado="BA" value="Ribeira do Amparo">Ribeira do Amparo</option>
                                                    <option data-estado="BA" value="Ribeira do Pombal">Ribeira do Pombal</option>
                                                    <option data-estado="BA" value="Ruy Barbosa">Ruy Barbosa</option>
                                                    <option data-estado="BA" value="Salvador">Salvador</option>
                                                    <option data-estado="BA" value="Santa Luz">Santa Luz</option>
                                                    <option data-estado="BA" value="Santa Maria da Vitória">Santa Maria da Vitória</option>
                                                    <option data-estado="BA" value="Santana">Santana</option>
                                                    <option data-estado="BA" value="Santa Rita de Cássia">Santa Rita de Cássia</option>
                                                    <option data-estado="BA" value="Santo Amaro">Santo Amaro</option>
                                                    <option data-estado="BA" value="Santo Antônio de Jesus">Santo Antônio de Jesus</option>
                                                    <option data-estado="BA" value="Santo Estevão">Santo Estevão</option>
                                                    <option data-estado="BA" value="Seabra">Seabra</option>
                                                    <option data-estado="BA" value="Senhor do Bonfim">Senhor do Bonfim</option>
                                                    <option data-estado="BA" value="Serrinha">Serrinha</option>
                                                    <option data-estado="BA" value="Teixeira de Freitas">Teixeira de Freitas</option>
                                                    <option data-estado="BA" value="Ubaitaba">Ubaitaba</option>
                                                    <option data-estado="BA" value="Ubatã">Ubatã</option>
                                                    <option data-estado="BA" value="Valença">Valença</option>
                                                    <option data-estado="BA" value="Vitória da Conquista">Vitória da Conquista</option>
                                                    <option data-estado="BA" value="Wanderley">Wanderley</option>
                                                    <option data-estado="CE" value="Acopiara">Acopiara</option>
                                                    <option data-estado="CE" value="Aracati">Aracati</option>
                                                    <option data-estado="CE" value="Assaré">Assaré</option>
                                                    <option data-estado="CE" value="Barbalha">Barbalha</option>
                                                    <option data-estado="CE" value="Brejo Santo">Brejo Santo</option>
                                                    <option data-estado="CE" value="Camocim">Camocim</option>
                                                    <option data-estado="CE" value="Campos Sales">Campos Sales</option>
                                                    <option data-estado="CE" value="Cascavel">Cascavel</option>
                                                    <option data-estado="CE" value="Crateús">Crateús</option>
                                                    <option data-estado="CE" value="Crato">Crato</option>
                                                    <option data-estado="CE" value="Fortaleza">Fortaleza</option>
                                                    <option data-estado="CE" value="Icó">Icó</option>
                                                    <option data-estado="CE" value="Iguatu">Iguatu</option>
                                                    <option data-estado="CE" value="Independência">Independência</option>
                                                    <option data-estado="CE" value="Ipu">Ipu</option>
                                                    <option data-estado="CE" value="Itapajé">Itapajé</option>
                                                    <option data-estado="CE" value="Itapipoca">Itapipoca</option>
                                                    <option data-estado="CE" value="Limoeiro do Norte">Limoeiro do Norte</option>
                                                    <option data-estado="CE" value="Maranguape">Maranguape</option>
                                                    <option data-estado="CE" value="Milhã">Milhã</option>
                                                    <option data-estado="CE" value="Mombaça">Mombaça</option>
                                                    <option data-estado="CE" value="Morada Nova">Morada Nova</option>
                                                    <option data-estado="CE" value="Orós">Orós</option>
                                                    <option data-estado="CE" value="Pentecoste">Pentecoste</option>
                                                    <option data-estado="CE" value="Quixadá">Quixadá</option>
                                                    <option data-estado="CE" value="Quixeramobim">Quixeramobim</option>
                                                    <option data-estado="CE" value="Russas">Russas</option>
                                                    <option data-estado="CE" value="Santa Quitéria">Santa Quitéria</option>
                                                    <option data-estado="CE" value="Senador Pompeu">Senador Pompeu</option>
                                                    <option data-estado="CE" value="Sobral">Sobral</option>
                                                    <option data-estado="CE" value="Tauá">Tauá</option>
                                                    <option data-estado="CE" value="Várzea Alegre">Várzea Alegre</option>
                                                    <option data-estado="DF" value="Brasília">Brasília</option>
                                                    <option data-estado="ES" value="Afonso Cláudio">Afonso Cláudio</option>
                                                    <option data-estado="ES" value="Alegre">Alegre</option>
                                                    <option data-estado="ES" value="Aracruz">Aracruz</option>
                                                    <option data-estado="ES" value="Barra de São Francisco">Barra de São Francisco</option>
                                                    <option data-estado="ES" value="Castelo">Castelo</option>
                                                    <option data-estado="ES" value="Colatina">Colatina</option>
                                                    <option data-estado="ES" value="Domingos Martins">Domingos Martins</option>
                                                    <option data-estado="ES" value="Ecoporanga">Ecoporanga</option>
                                                    <option data-estado="ES" value="Guaçuí">Guaçuí</option>
                                                    <option data-estado="ES" value="Guarapari">Guarapari</option>
                                                    <option data-estado="ES" value="Itaguaçu">Itaguaçu</option>
                                                    <option data-estado="ES" value="Linhares">Linhares</option>
                                                    <option data-estado="ES" value="Mimoso do Sul">Mimoso do Sul</option>
                                                    <option data-estado="ES" value="Montanha">Montanha</option>
                                                    <option data-estado="ES" value="Muniz Freire">Muniz Freire</option>
                                                    <option data-estado="ES" value="Nova Venécia">Nova Venécia</option>
                                                    <option data-estado="ES" value="Santa Teresa">Santa Teresa</option>
                                                    <option data-estado="ES" value="São Gabriel da Palha">São Gabriel da Palha</option>
                                                    <option data-estado="ES" value="Serra">Serra</option>
                                                    <option data-estado="ES" value="Vila Velha">Vila Velha</option>
                                                    <option data-estado="GO" value="Anápolis">Anápolis</option>
                                                    <option data-estado="GO" value="Anicuns">Anicuns</option>
                                                    <option data-estado="GO" value="Bom Jardim de Goiás">Bom Jardim de Goiás</option>
                                                    <option data-estado="GO" value="Buriti Alegre">Buriti Alegre</option>
                                                    <option data-estado="GO" value="Caldas Novas">Caldas Novas</option>
                                                    <option data-estado="GO" value="Ceres">Ceres</option>
                                                    <option data-estado="GO" value="Cristalina">Cristalina</option>
                                                    <option data-estado="GO" value="Edéia">Edéia</option>
                                                    <option data-estado="GO" value="Fazenda Nova">Fazenda Nova</option>
                                                    <option data-estado="GO" value="Formosa">Formosa</option>
                                                    <option data-estado="GO" value="Goiânia">Goiânia</option>
                                                    <option data-estado="GO" value="Goiás">Goiás</option>
                                                    <option data-estado="GO" value="Goiatuba">Goiatuba</option>
                                                    <option data-estado="GO" value="Ipameri">Ipameri</option>
                                                    <option data-estado="GO" value="Iporá">Iporá</option>
                                                    <option data-estado="GO" value="Itaberaí">Itaberaí</option>
                                                    <option data-estado="GO" value="Itapaci">Itapaci</option>
                                                    <option data-estado="GO" value="Itapuranga">Itapuranga</option>
                                                    <option data-estado="GO" value="Jaraguá">Jaraguá</option>
                                                    <option data-estado="GO" value="Jataí">Jataí</option>
                                                    <option data-estado="GO" value="Joviânia">Joviânia</option>
                                                    <option data-estado="GO" value="Jussara">Jussara</option>
                                                    <option data-estado="GO" value="Mara Rosa">Mara Rosa</option>
                                                    <option data-estado="GO" value="Mineiros">Mineiros</option>
                                                    <option data-estado="GO" value="Montes Claros de Goiás">Montes Claros de Goiás</option>
                                                    <option data-estado="GO" value="Morrinhos">Morrinhos</option>
                                                    <option data-estado="GO" value="Orizona">Orizona</option>
                                                    <option data-estado="GO" value="Palmeiras de Goiás">Palmeiras de Goiás</option>
                                                    <option data-estado="GO" value="Paraúna">Paraúna</option>
                                                    <option data-estado="GO" value="Piracanjuba">Piracanjuba</option>
                                                    <option data-estado="GO" value="Piranhas">Piranhas</option>
                                                    <option data-estado="GO" value="Pires do Rio">Pires do Rio</option>
                                                    <option data-estado="GO" value="Pontalina">Pontalina</option>
                                                    <option data-estado="GO" value="Porangatu">Porangatu</option>
                                                    <option data-estado="GO" value="Posse">Posse</option>
                                                    <option data-estado="GO" value="Quirinópolis">Quirinópolis</option>
                                                    <option data-estado="GO" value="Rio Verde">Rio Verde</option>
                                                    <option data-estado="GO" value="Rubiataba">Rubiataba</option>
                                                    <option data-estado="GO" value="São Luís de Montes Belos">São Luís de Montes Belos</option>
                                                    <option data-estado="GO" value="São Miguel do Araguaia">São Miguel do Araguaia</option>
                                                    <option data-estado="GO" value="Silvânia">Silvânia</option>
                                                    <option data-estado="GO" value="Uruaçu">Uruaçu</option>
                                                    <option data-estado="MA" value="Bacabal">Bacabal</option>
                                                    <option data-estado="MA" value="Balsas">Balsas</option>
                                                    <option data-estado="MA" value="Barra do Corda">Barra do Corda</option>
                                                    <option data-estado="MA" value="Brejo">Brejo</option>
                                                    <option data-estado="MA" value="Buriticupu">Buriticupu</option>
                                                    <option data-estado="MA" value="Carolina">Carolina</option>
                                                    <option data-estado="MA" value="Caxias">Caxias</option>
                                                    <option data-estado="MA" value="Codó">Codó</option>
                                                    <option data-estado="MA" value="Cururupu">Cururupu</option>
                                                    <option data-estado="MA" value="Grajaú">Grajaú</option>
                                                    <option data-estado="MA" value="Imperatriz">Imperatriz</option>
                                                    <option data-estado="MA" value="Lago da Pedra">Lago da Pedra</option>
                                                    <option data-estado="MA" value="Parnarama">Parnarama</option>
                                                    <option data-estado="MA" value="Pedreiras">Pedreiras</option>
                                                    <option data-estado="MA" value="Pinheiro">Pinheiro</option>
                                                    <option data-estado="MA" value="Pio XII">Pio XII</option>
                                                    <option data-estado="MA" value="Presidente Dutra">Presidente Dutra</option>
                                                    <option data-estado="MA" value="Santa Inês">Santa Inês</option>
                                                    <option data-estado="MA" value="Santa Luzia">Santa Luzia</option>
                                                    <option data-estado="MA" value="São Domingos do Maranhão">São Domingos do Maranhão</option>
                                                    <option data-estado="MA" value="São João dos Patos">São João dos Patos</option>
                                                    <option data-estado="MA" value="São Luís">São Luís</option>
                                                    <option data-estado="MA" value="São Raimundo das Mangabeiras">São Raimundo das Mangabeiras</option>
                                                    <option data-estado="MA" value="Zé Doca">Zé Doca</option>
                                                    <option data-estado="MG" value="Abaeté">Abaeté</option>
                                                    <option data-estado="MG" value="Abre Campo">Abre Campo</option>
                                                    <option data-estado="MG" value="Águas Formosas">Águas Formosas</option>
                                                    <option data-estado="MG" value="Aimorés">Aimorés</option>
                                                    <option data-estado="MG" value="Alfenas">Alfenas</option>
                                                    <option data-estado="MG" value="Almenara">Almenara</option>
                                                    <option data-estado="MG" value="Andradas">Andradas</option>
                                                    <option data-estado="MG" value="Andrelândia">Andrelândia</option>
                                                    <option data-estado="MG" value="Araguari">Araguari</option>
                                                    <option data-estado="MG" value="Araxá">Araxá</option>
                                                    <option data-estado="MG" value="Arcos">Arcos</option>
                                                    <option data-estado="MG" value="Arinos">Arinos</option>
                                                    <option data-estado="MG" value="Baependi">Baependi</option>
                                                    <option data-estado="MG" value="Bambuí">Bambuí</option>
                                                    <option data-estado="MG" value="Barbacena">Barbacena</option>
                                                    <option data-estado="MG" value="Belo Horizonte">Belo Horizonte</option>
                                                    <option data-estado="MG" value="Betim">Betim</option>
                                                    <option data-estado="MG" value="Boa Esperança">Boa Esperança</option>
                                                    <option data-estado="MG" value="Bocaiúva">Bocaiúva</option>
                                                    <option data-estado="MG" value="Bom Sucesso">Bom Sucesso</option>
                                                    <option data-estado="MG" value="Brasília de Minas">Brasília de Minas</option>
                                                    <option data-estado="MG" value="Buritis">Buritis</option>
                                                    <option data-estado="MG" value="Buritizeiro">Buritizeiro</option>
                                                    <option data-estado="MG" value="Campo Belo">Campo Belo</option>
                                                    <option data-estado="MG" value="Capelinha">Capelinha</option>
                                                    <option data-estado="MG" value="Carangola">Carangola</option>
                                                    <option data-estado="MG" value="Caratinga">Caratinga</option>
                                                    <option data-estado="MG" value="Cataguases">Cataguases</option>
                                                    <option data-estado="MG" value="Conceição das Alagoas">Conceição das Alagoas</option>
                                                    <option data-estado="MG" value="Conceição do Mato Dentro">Conceição do Mato Dentro</option>
                                                    <option data-estado="MG" value="Conselheiro Lafaiete">Conselheiro Lafaiete</option>
                                                    <option data-estado="MG" value="Conselheiro Pena">Conselheiro Pena</option>
                                                    <option data-estado="MG" value="Coração de Jesus">Coração de Jesus</option>
                                                    <option data-estado="MG" value="Corinto">Corinto</option>
                                                    <option data-estado="MG" value="Coromandel">Coromandel</option>
                                                    <option data-estado="MG" value="Curvelo">Curvelo</option>
                                                    <option data-estado="MG" value="Diamantina">Diamantina</option>
                                                    <option data-estado="MG" value="Divinópolis">Divinópolis</option>
                                                    <option data-estado="MG" value="Dores do Indaiá">Dores do Indaiá</option>
                                                    <option data-estado="MG" value="Ervália">Ervália</option>
                                                    <option data-estado="MG" value="Espinosa">Espinosa</option>
                                                    <option data-estado="MG" value="Estrela do Sul">Estrela do Sul</option>
                                                    <option data-estado="MG" value="Extrema">Extrema</option>
                                                    <option data-estado="MG" value="Francisco Sá">Francisco Sá</option>
                                                    <option data-estado="MG" value="Frutal">Frutal</option>
                                                    <option data-estado="MG" value="Guanhães">Guanhães</option>
                                                    <option data-estado="MG" value="Guarará">Guarará</option>
                                                    <option data-estado="MG" value="Guaxupé">Guaxupé</option>
                                                    <option data-estado="MG" value="Guimarânia">Guimarânia</option>
                                                    <option data-estado="MG" value="Ibiá">Ibiá</option>
                                                    <option data-estado="MG" value="Inhapim">Inhapim</option>
                                                    <option data-estado="MG" value="Ipanema">Ipanema</option>
                                                    <option data-estado="MG" value="Itabira">Itabira</option>
                                                    <option data-estado="MG" value="Itanhandu">Itanhandu</option>
                                                    <option data-estado="MG" value="Itaobim">Itaobim</option>
                                                    <option data-estado="MG" value="Itaúna">Itaúna</option>
                                                    <option data-estado="MG" value="Ituiutaba">Ituiutaba</option>
                                                    <option data-estado="MG" value="Iturama">Iturama</option>
                                                    <option data-estado="MG" value="Janaúba">Janaúba</option>
                                                    <option data-estado="MG" value="Januária">Januária</option>
                                                    <option data-estado="MG" value="Jequitinhonha">Jequitinhonha</option>
                                                    <option data-estado="MG" value="Juiz de Fora">Juiz de Fora</option>
                                                    <option data-estado="MG" value="Lajinha">Lajinha</option>
                                                    <option data-estado="MG" value="Lavras">Lavras</option>
                                                    <option data-estado="MG" value="Luz">Luz</option>
                                                    <option data-estado="MG" value="Manga">Manga</option>
                                                    <option data-estado="MG" value="Manhuaçu">Manhuaçu</option>
                                                    <option data-estado="MG" value="Manhumirim">Manhumirim</option>
                                                    <option data-estado="MG" value="Martinho Campos">Martinho Campos</option>
                                                    <option data-estado="MG" value="Mato Verde">Mato Verde</option>
                                                    <option data-estado="MG" value="Minas Novas">Minas Novas</option>
                                                    <option data-estado="MG" value="Miraí">Miraí</option>
                                                    <option data-estado="MG" value="Monte Carmelo">Monte Carmelo</option>
                                                    <option data-estado="MG" value="Monte Santo de Minas">Monte Santo de Minas</option>
                                                    <option data-estado="MG" value="Montes Claros">Montes Claros</option>
                                                    <option data-estado="MG" value="Monte Sião">Monte Sião</option>
                                                    <option data-estado="MG" value="Muriaé">Muriaé</option>
                                                    <option data-estado="MG" value="Mutum">Mutum</option>
                                                    <option data-estado="MG" value="Muzambinho">Muzambinho</option>
                                                    <option data-estado="MG" value="Nanuque">Nanuque</option>
                                                    <option data-estado="MG" value="Oliveira">Oliveira</option>
                                                    <option data-estado="MG" value="Ouro Fino">Ouro Fino</option>
                                                    <option data-estado="MG" value="Paracatu">Paracatu</option>
                                                    <option data-estado="MG" value="Pará de Minas">Pará de Minas</option>
                                                    <option data-estado="MG" value="Passos">Passos</option>
                                                    <option data-estado="MG" value="Patos de Minas">Patos de Minas</option>
                                                    <option data-estado="MG" value="Peçanha">Peçanha</option>
                                                    <option data-estado="MG" value="Pedra Azul">Pedra Azul</option>
                                                    <option data-estado="MG" value="Pedro Leopoldo">Pedro Leopoldo</option>
                                                    <option data-estado="MG" value="Perdizes">Perdizes</option>
                                                    <option data-estado="MG" value="Pitangui">Pitangui</option>
                                                    <option data-estado="MG" value="Piumhi">Piumhi</option>
                                                    <option data-estado="MG" value="Poços de Caldas">Poços de Caldas</option>
                                                    <option data-estado="MG" value="Pompéu">Pompéu</option>
                                                    <option data-estado="MG" value="Ponte Nova">Ponte Nova</option>
                                                    <option data-estado="MG" value="Porteirinha">Porteirinha</option>
                                                    <option data-estado="MG" value="Pouso Alegre">Pouso Alegre</option>
                                                    <option data-estado="MG" value="Prata">Prata</option>
                                                    <option data-estado="MG" value="Resplendor">Resplendor</option>
                                                    <option data-estado="MG" value="Rio Paranaíba">Rio Paranaíba</option>
                                                    <option data-estado="MG" value="Rio Pomba">Rio Pomba</option>
                                                    <option data-estado="MG" value="Rubim">Rubim</option>
                                                    <option data-estado="MG" value="Sacramento">Sacramento</option>
                                                    <option data-estado="MG" value="Salinas">Salinas</option>
                                                    <option data-estado="MG" value="Santa Maria do Suaçuí">Santa Maria do Suaçuí</option>
                                                    <option data-estado="MG" value="Santa Rita do Sapucaí">Santa Rita do Sapucaí</option>
                                                    <option data-estado="MG" value="Santos Dumont">Santos Dumont</option>
                                                    <option data-estado="MG" value="São Francisco">São Francisco</option>
                                                    <option data-estado="MG" value="São João Nepomuceno">São João Nepomuceno</option>
                                                    <option data-estado="MG" value="São Sebastião do Paraíso">São Sebastião do Paraíso</option>
                                                    <option data-estado="MG" value="Serro">Serro</option>
                                                    <option data-estado="MG" value="Sete Lagoas">Sete Lagoas</option>
                                                    <option data-estado="MG" value="Teófilo Otoni">Teófilo Otoni</option>
                                                    <option data-estado="MG" value="Tiradentes">Tiradentes</option>
                                                    <option data-estado="MG" value="Três Pontas">Três Pontas</option>
                                                    <option data-estado="MG" value="Uberaba">Uberaba</option>
                                                    <option data-estado="MG" value="Uberlândia">Uberlândia</option>
                                                    <option data-estado="MG" value="Unaí">Unaí</option>
                                                    <option data-estado="MG" value="Varginha">Varginha</option>
                                                    <option data-estado="MG" value="Vazante">Vazante</option>
                                                    <option data-estado="MG" value="Viçosa">Viçosa</option>
                                                    <option data-estado="MG" value="Visconde do Rio Branco">Visconde do Rio Branco</option>
                                                    <option data-estado="MS" value="Amambái">Amambái</option>
                                                    <option data-estado="MS" value="Aparecida do Taboado">Aparecida do Taboado</option>
                                                    <option data-estado="MS" value="Aquidauana">Aquidauana</option>
                                                    <option data-estado="MS" value="Bataguassu">Bataguassu</option>
                                                    <option data-estado="MS" value="Bela Vista">Bela Vista</option>
                                                    <option data-estado="MS" value="Bonito">Bonito</option>
                                                    <option data-estado="MS" value="Caarapó">Caarapó</option>
                                                    <option data-estado="MS" value="Camapuã">Camapuã</option>
                                                    <option data-estado="MS" value="Campo Grande">Campo Grande</option>
                                                    <option data-estado="MS" value="Cassilândia">Cassilândia</option>
                                                    <option data-estado="MS" value="Chapadão do Sul">Chapadão do Sul</option>
                                                    <option data-estado="MS" value="Corumbá">Corumbá</option>
                                                    <option data-estado="MS" value="Coxim">Coxim</option>
                                                    <option data-estado="MS" value="Deodápolis">Deodápolis</option>
                                                    <option data-estado="MS" value="Dourados">Dourados</option>
                                                    <option data-estado="MS" value="Glória de Dourados">Glória de Dourados</option>
                                                    <option data-estado="MS" value="Ivinhema">Ivinhema</option>
                                                    <option data-estado="MS" value="Jardim">Jardim</option>
                                                    <option data-estado="MS" value="Maracajú">Maracajú</option>
                                                    <option data-estado="MS" value="Miranda">Miranda</option>
                                                    <option data-estado="MS" value="Mundo Novo">Mundo Novo</option>
                                                    <option data-estado="MS" value="Naviraí">Naviraí</option>
                                                    <option data-estado="MS" value="Nova Andradina">Nova Andradina</option>
                                                    <option data-estado="MS" value="Paranaíba">Paranaíba</option>
                                                    <option data-estado="MS" value="Ponta Porã">Ponta Porã</option>
                                                    <option data-estado="MS" value="Rio Brilhante">Rio Brilhante</option>
                                                    <option data-estado="MS" value="Rio Verde de Mato Grosso">Rio Verde de Mato Grosso</option>
                                                    <option data-estado="MS" value="São Gabriel do Oeste">São Gabriel do Oeste</option>
                                                    <option data-estado="MS" value="Sidrolândia">Sidrolândia</option>
                                                    <option data-estado="MS" value="Três Lagoas">Três Lagoas</option>
                                                    <option data-estado="MT" value="Água Boa">Água Boa</option>
                                                    <option data-estado="MT" value="Alta Floresta">Alta Floresta</option>
                                                    <option data-estado="MT" value="Alto Araguaia">Alto Araguaia</option>
                                                    <option data-estado="MT" value="Barra do Bugres">Barra do Bugres</option>
                                                    <option data-estado="MT" value="Barra do Garças">Barra do Garças</option>
                                                    <option data-estado="MT" value="Cáceres">Cáceres</option>
                                                    <option data-estado="MT" value="Campo Novo do Parecis">Campo Novo do Parecis</option>
                                                    <option data-estado="MT" value="Canarana">Canarana</option>
                                                    <option data-estado="MT" value="Colider">Colider</option>
                                                    <option data-estado="MT" value="Confresa">Confresa</option>
                                                    <option data-estado="MT" value="Cuiabá">Cuiabá</option>
                                                    <option data-estado="MT" value="Guarantã do Norte">Guarantã do Norte</option>
                                                    <option data-estado="MT" value="Guiratinga">Guiratinga</option>
                                                    <option data-estado="MT" value="Jaciara">Jaciara</option>
                                                    <option data-estado="MT" value="Juara">Juara</option>
                                                    <option data-estado="MT" value="Juína">Juína</option>
                                                    <option data-estado="MT" value="Lucas do Rio Verde">Lucas do Rio Verde</option>
                                                    <option data-estado="MT" value="Mirassol D'Oeste">Mirassol D'Oeste</option>
                                                    <option data-estado="MT" value="Nova Xavantina">Nova Xavantina</option>
                                                    <option data-estado="MT" value="Poconé">Poconé</option>
                                                    <option data-estado="MT" value="Porto dos Gaúchos">Porto dos Gaúchos</option>
                                                    <option data-estado="MT" value="Poxoréo">Poxoréo</option>
                                                    <option data-estado="MT" value="Primavera do Leste">Primavera do Leste</option>
                                                    <option data-estado="MT" value="Sinop">Sinop</option>
                                                    <option data-estado="MT" value="Sorriso">Sorriso</option>
                                                    <option data-estado="MT" value="Torixoréu">Torixoréu</option>
                                                    <option data-estado="MT" value="Vila Rica">Vila Rica</option>
                                                    <option data-estado="PA" value="Alenquer">Alenquer</option>
                                                    <option data-estado="PA" value="Almeirim">Almeirim</option>
                                                    <option data-estado="PA" value="Altamira">Altamira</option>
                                                    <option data-estado="PA" value="Ananindeua">Ananindeua</option>
                                                    <option data-estado="PA" value="Bragança">Bragança</option>
                                                    <option data-estado="PA" value="Breves">Breves</option>
                                                    <option data-estado="PA" value="Cametá">Cametá</option>
                                                    <option data-estado="PA" value="Castanhal">Castanhal</option>
                                                    <option data-estado="PA" value="Conceição do Araguaia">Conceição do Araguaia</option>
                                                    <option data-estado="PA" value="Itaituba">Itaituba</option>
                                                    <option data-estado="PA" value="Marabá">Marabá</option>
                                                    <option data-estado="PA" value="Monte Alegre">Monte Alegre</option>
                                                    <option data-estado="PA" value="Oriximiná">Oriximiná</option>
                                                    <option data-estado="PA" value="Paragominas">Paragominas</option>
                                                    <option data-estado="PA" value="Redenção">Redenção</option>
                                                    <option data-estado="PA" value="Rondon do Pará">Rondon do Pará</option>
                                                    <option data-estado="PA" value="Santarém">Santarém</option>
                                                    <option data-estado="PA" value="Tailândia">Tailândia</option>
                                                    <option data-estado="PA" value="Tucuruí">Tucuruí</option>
                                                    <option data-estado="PA" value="Xinguara">Xinguara</option>
                                                    <option data-estado="PB" value="Cajazeiras">Cajazeiras</option>
                                                    <option data-estado="PB" value="Campina Grande">Campina Grande</option>
                                                    <option data-estado="PB" value="Catolé do Rocha">Catolé do Rocha</option>
                                                    <option data-estado="PB" value="Guarabira">Guarabira</option>
                                                    <option data-estado="PB" value="Itabaiana">Itabaiana</option>
                                                    <option data-estado="PB" value="João Pessoa">João Pessoa</option>
                                                    <option data-estado="PB" value="Mamanguape">Mamanguape</option>
                                                    <option data-estado="PB" value="Monteiro">Monteiro</option>
                                                    <option data-estado="PB" value="Patos">Patos</option>
                                                    <option data-estado="PB" value="Pombal">Pombal</option>
                                                    <option data-estado="PB" value="Princesa Isabel">Princesa Isabel</option>
                                                    <option data-estado="PB" value="Santa Luzia">Santa Luzia</option>
                                                    <option data-estado="PB" value="São Bento">São Bento</option>
                                                    <option data-estado="PB" value="Sapé">Sapé</option>
                                                    <option data-estado="PB" value="Uiraúna">Uiraúna</option>
                                                    <option data-estado="PE" value="Afogados da Ingazeira">Afogados da Ingazeira</option>
                                                    <option data-estado="PE" value="Barreiros">Barreiros</option>
                                                    <option data-estado="PE" value="Bom Conselho">Bom Conselho</option>
                                                    <option data-estado="PE" value="Bonito">Bonito</option>
                                                    <option data-estado="PE" value="Cabrobó">Cabrobó</option>
                                                    <option data-estado="PE" value="Carpina">Carpina</option>
                                                    <option data-estado="PE" value="Caruaru">Caruaru</option>
                                                    <option data-estado="PE" value="Floresta">Floresta</option>
                                                    <option data-estado="PE" value="Garanhuns">Garanhuns</option>
                                                    <option data-estado="PE" value="Gravatá">Gravatá</option>
                                                    <option data-estado="PE" value="Ibimirim">Ibimirim</option>
                                                    <option data-estado="PE" value="Limoeiro">Limoeiro</option>
                                                    <option data-estado="PE" value="Parnamirim">Parnamirim</option>
                                                    <option data-estado="PE" value="Petrolina">Petrolina</option>
                                                    <option data-estado="PE" value="Recife">Recife</option>
                                                    <option data-estado="PE" value="Santa Cruz do Capibaribe">Santa Cruz do Capibaribe</option>
                                                    <option data-estado="PE" value="Serra Talhada">Serra Talhada</option>
                                                    <option data-estado="PE" value="Taquaritinga do Norte">Taquaritinga do Norte</option>
                                                    <option data-estado="PE" value="Timbaúba">Timbaúba</option>
                                                    <option data-estado="PE" value="Vitória de Santo Antão">Vitória de Santo Antão</option>
                                                    <option data-estado="PI" value="Água Branca">Água Branca</option>
                                                    <option data-estado="PI" value="Amarante">Amarante</option>
                                                    <option data-estado="PI" value="Bom Jesus">Bom Jesus</option>
                                                    <option data-estado="PI" value="Campo Maior">Campo Maior</option>
                                                    <option data-estado="PI" value="Castelo do Piauí">Castelo do Piauí</option>
                                                    <option data-estado="PI" value="Corrente">Corrente</option>
                                                    <option data-estado="PI" value="Curimatá">Curimatá</option>
                                                    <option data-estado="PI" value="Elesbão Veloso">Elesbão Veloso</option>
                                                    <option data-estado="PI" value="Floriano">Floriano</option>
                                                    <option data-estado="PI" value="Gilbués">Gilbués</option>
                                                    <option data-estado="PI" value="Jaicós">Jaicós</option>
                                                    <option data-estado="PI" value="Luzilândia">Luzilândia</option>
                                                    <option data-estado="PI" value="Oeiras">Oeiras</option>
                                                    <option data-estado="PI" value="Parnaíba">Parnaíba</option>
                                                    <option data-estado="PI" value="Paulistana">Paulistana</option>
                                                    <option data-estado="PI" value="Pedro II">Pedro II</option>
                                                    <option data-estado="PI" value="Picos">Picos</option>
                                                    <option data-estado="PI" value="Piracuruca">Piracuruca</option>
                                                    <option data-estado="PI" value="Piripiri">Piripiri</option>
                                                    <option data-estado="PI" value="São João do Piauí">São João do Piauí</option>
                                                    <option data-estado="PI" value="São Miguel do Tapuio">São Miguel do Tapuio</option>
                                                    <option data-estado="PI" value="Simplício Mendes">Simplício Mendes</option>
                                                    <option data-estado="PI" value="Teresina">Teresina</option>
                                                    <option data-estado="PI" value="União">União</option>
                                                    <option data-estado="PI" value="Uruçuí">Uruçuí</option>
                                                    <option data-estado="PI" value="Valença do Piauí">Valença do Piauí</option>
                                                    <option data-estado="PR" value="Altônia">Altônia</option>
                                                    <option data-estado="PR" value="Ampére">Ampére</option>
                                                    <option data-estado="PR" value="Andirá">Andirá</option>
                                                    <option data-estado="PR" value="Apucarana">Apucarana</option>
                                                    <option data-estado="PR" value="Assaí">Assaí</option>
                                                    <option data-estado="PR" value="Assis Chateaubriand">Assis Chateaubriand</option>
                                                    <option data-estado="PR" value="Astorga">Astorga</option>
                                                    <option data-estado="PR" value="Cambará">Cambará</option>
                                                    <option data-estado="PR" value="Campina da Lagoa">Campina da Lagoa</option>
                                                    <option data-estado="PR" value="Campo Largo">Campo Largo</option>
                                                    <option data-estado="PR" value="Campo Mourão">Campo Mourão</option>
                                                    <option data-estado="PR" value="Cascavel">Cascavel</option>
                                                    <option data-estado="PR" value="Castro">Castro</option>
                                                    <option data-estado="PR" value="Centenário do Sul">Centenário do Sul</option>
                                                    <option data-estado="PR" value="Chopinzinho">Chopinzinho</option>
                                                    <option data-estado="PR" value="Cianorte">Cianorte</option>
                                                    <option data-estado="PR" value="Clevelândia">Clevelândia</option>
                                                    <option data-estado="PR" value="Colorado">Colorado</option>
                                                    <option data-estado="PR" value="Cornélio Procópio">Cornélio Procópio</option>
                                                    <option data-estado="PR" value="Coronel Vivida">Coronel Vivida</option>
                                                    <option data-estado="PR" value="Cruzeiro do Oeste">Cruzeiro do Oeste</option>
                                                    <option data-estado="PR" value="Curitiba">Curitiba</option>
                                                    <option data-estado="PR" value="Dois Vizinhos">Dois Vizinhos</option>
                                                    <option data-estado="PR" value="Faxinal">Faxinal</option>
                                                    <option data-estado="PR" value="Foz do Iguaçu">Foz do Iguaçu</option>
                                                    <option data-estado="PR" value="Francisco Beltrão">Francisco Beltrão</option>
                                                    <option data-estado="PR" value="Goioerê">Goioerê</option>
                                                    <option data-estado="PR" value="Guaíra">Guaíra</option>
                                                    <option data-estado="PR" value="Guarapuava">Guarapuava</option>
                                                    <option data-estado="PR" value="Ibaiti">Ibaiti</option>
                                                    <option data-estado="PR" value="Ibiporã">Ibiporã</option>
                                                    <option data-estado="PR" value="Iporã">Iporã</option>
                                                    <option data-estado="PR" value="Irati">Irati</option>
                                                    <option data-estado="PR" value="Itapejara d'Oeste">Itapejara d'Oeste</option>
                                                    <option data-estado="PR" value="Ivaiporã">Ivaiporã</option>
                                                    <option data-estado="PR" value="Jacarezinho">Jacarezinho</option>
                                                    <option data-estado="PR" value="Jaguapitã">Jaguapitã</option>
                                                    <option data-estado="PR" value="Jandaia do Sul">Jandaia do Sul</option>
                                                    <option data-estado="PR" value="Janiópolis">Janiópolis</option>
                                                    <option data-estado="PR" value="Japurá">Japurá</option>
                                                    <option data-estado="PR" value="Joaquim Távora">Joaquim Távora</option>
                                                    <option data-estado="PR" value="Lapa">Lapa</option>
                                                    <option data-estado="PR" value="Laranjeiras do Sul">Laranjeiras do Sul</option>
                                                    <option data-estado="PR" value="Loanda">Loanda</option>
                                                    <option data-estado="PR" value="Londrina">Londrina</option>
                                                    <option data-estado="PR" value="Mallet">Mallet</option>
                                                    <option data-estado="PR" value="Mangueirinha">Mangueirinha</option>
                                                    <option data-estado="PR" value="Manoel Ribas">Manoel Ribas</option>
                                                    <option data-estado="PR" value="Marechal Cândido Rondon">Marechal Cândido Rondon</option>
                                                    <option data-estado="PR" value="Maringá">Maringá</option>
                                                    <option data-estado="PR" value="Marmeleiro">Marmeleiro</option>
                                                    <option data-estado="PR" value="Medianeira">Medianeira</option>
                                                    <option data-estado="PR" value="Moreira Sales">Moreira Sales</option>
                                                    <option data-estado="PR" value="Nova Esperança">Nova Esperança</option>
                                                    <option data-estado="PR" value="Palmas">Palmas</option>
                                                    <option data-estado="PR" value="Palmeira">Palmeira</option>
                                                    <option data-estado="PR" value="Palmital">Palmital</option>
                                                    <option data-estado="PR" value="Palotina">Palotina</option>
                                                    <option data-estado="PR" value="Paraíso do Norte">Paraíso do Norte</option>
                                                    <option data-estado="PR" value="Paranaguá">Paranaguá</option>
                                                    <option data-estado="PR" value="Paranavaí">Paranavaí</option>
                                                    <option data-estado="PR" value="Pato Branco">Pato Branco</option>
                                                    <option data-estado="PR" value="Pinhão">Pinhão</option>
                                                    <option data-estado="PR" value="Pitanga">Pitanga</option>
                                                    <option data-estado="PR" value="Ponta Grossa">Ponta Grossa</option>
                                                    <option data-estado="PR" value="Porecatu">Porecatu</option>
                                                    <option data-estado="PR" value="Porto União">Porto União</option>
                                                    <option data-estado="PR" value="Prudentópolis">Prudentópolis</option>
                                                    <option data-estado="PR" value="Querência do Norte">Querência do Norte</option>
                                                    <option data-estado="PR" value="Realeza">Realeza</option>
                                                    <option data-estado="PR" value="Rolândia">Rolândia</option>
                                                    <option data-estado="PR" value="Rondon">Rondon</option>
                                                    <option data-estado="PR" value="Salto do Lontra">Salto do Lontra</option>
                                                    <option data-estado="PR" value="Santa Cecília do Pavão">Santa Cecília do Pavão</option>
                                                    <option data-estado="PR" value="Santa Helena">Santa Helena</option>
                                                    <option data-estado="PR" value="Santa Izabel do Oeste">Santa Izabel do Oeste</option>
                                                    <option data-estado="PR" value="Santo Antônio da Platina">Santo Antônio da Platina</option>
                                                    <option data-estado="PR" value="São João">São João</option>
                                                    <option data-estado="PR" value="São Miguel do Iguaçu">São Miguel do Iguaçu</option>
                                                    <option data-estado="PR" value="São Pedro do Ivaí">São Pedro do Ivaí</option>
                                                    <option data-estado="PR" value="Sertanópolis">Sertanópolis</option>
                                                    <option data-estado="PR" value="Telêmaco Borba">Telêmaco Borba</option>
                                                    <option data-estado="PR" value="Terra Rica">Terra Rica</option>
                                                    <option data-estado="PR" value="Terra Roxa">Terra Roxa</option>
                                                    <option data-estado="PR" value="Toledo">Toledo</option>
                                                    <option data-estado="PR" value="Ubiratã">Ubiratã</option>
                                                    <option data-estado="PR" value="Umuarama">Umuarama</option>
                                                    <option data-estado="PR" value="Uraí">Uraí</option>
                                                    <option data-estado="PR" value="Wenceslau Braz">Wenceslau Braz</option>
                                                    <option data-estado="RJ" value="Bom Jesus do Itabapoana">Bom Jesus do Itabapoana</option>
                                                    <option data-estado="RJ" value="Campos dos Goytacazes">Campos dos Goytacazes</option>
                                                    <option data-estado="RJ" value="Cantagalo">Cantagalo</option>
                                                    <option data-estado="RJ" value="Itaperuna">Itaperuna</option>
                                                    <option data-estado="RJ" value="Macaé">Macaé</option>
                                                    <option data-estado="RJ" value="Miracema">Miracema</option>
                                                    <option data-estado="RJ" value="Niterói">Niterói</option>
                                                    <option data-estado="RJ" value="Resende">Resende</option>
                                                    <option data-estado="RJ" value="Rio Bonito">Rio Bonito</option>
                                                    <option data-estado="RJ" value="Rio de Janeiro">Rio de Janeiro</option>
                                                    <option data-estado="RJ" value="Rio de Janeiro">Rio de Janeiro</option>
                                                    <option data-estado="RJ" value="Santo Antônio de Pádua">Santo Antônio de Pádua</option>
                                                    <option data-estado="RJ" value="Teresópolis">Teresópolis</option>
                                                    <option data-estado="RJ" value="Três Rios">Três Rios</option>
                                                    <option data-estado="RJ" value="Valença">Valença</option>
                                                    <option data-estado="RN" value="Alexandria">Alexandria</option>
                                                    <option data-estado="RN" value="Apodi">Apodi</option>
                                                    <option data-estado="RN" value="Caicó">Caicó</option>
                                                    <option data-estado="RN" value="Currais Novos">Currais Novos</option>
                                                    <option data-estado="RN" value="João Câmara">João Câmara</option>
                                                    <option data-estado="RN" value="Mossoró">Mossoró</option>
                                                    <option data-estado="RN" value="Natal">Natal</option>
                                                    <option data-estado="RN" value="Nova Cruz">Nova Cruz</option>
                                                    <option data-estado="RN" value="Parelhas">Parelhas</option>
                                                    <option data-estado="RN" value="Pau dos Ferros">Pau dos Ferros</option>
                                                    <option data-estado="RN" value="São Paulo do Potengi">São Paulo do Potengi</option>
                                                    <option data-estado="RO" value="Ariquemes">Ariquemes</option>
                                                    <option data-estado="RO" value="Cacoal">Cacoal</option>
                                                    <option data-estado="RO" value="Guajará Mirim">Guajará Mirim</option>
                                                    <option data-estado="RO" value="Jaru">Jaru</option>
                                                    <option data-estado="RO" value="Ji-Paraná">Ji-Paraná</option>
                                                    <option data-estado="RO" value="Ouro Preto do Oeste">Ouro Preto do Oeste</option>
                                                    <option data-estado="RO" value="Pimenta Bueno">Pimenta Bueno</option>
                                                    <option data-estado="RO" value="Porto Velho">Porto Velho</option>
                                                    <option data-estado="RO" value="Presidente Médici">Presidente Médici</option>
                                                    <option data-estado="RO" value="Rolim de Moura">Rolim de Moura</option>
                                                    <option data-estado="RO" value="Vilhena">Vilhena</option>
                                                    <option data-estado="RR" value="Boa Vista">Boa Vista</option>
                                                    <option data-estado="RS" value="Agudo">Agudo</option>
                                                    <option data-estado="RS" value="Alegrete">Alegrete</option>
                                                    <option data-estado="RS" value="Antônio Prado">Antônio Prado</option>
                                                    <option data-estado="RS" value="Arroio Grande">Arroio Grande</option>
                                                    <option data-estado="RS" value="Bagé">Bagé</option>
                                                    <option data-estado="RS" value="Barra do Ribeiro">Barra do Ribeiro</option>
                                                    <option data-estado="RS" value="Bento Gonçalves">Bento Gonçalves</option>
                                                    <option data-estado="RS" value="Boa Vista do Buricá">Boa Vista do Buricá</option>
                                                    <option data-estado="RS" value="Caçapava do Sul">Caçapava do Sul</option>
                                                    <option data-estado="RS" value="Cacequi">Cacequi</option>
                                                    <option data-estado="RS" value="Cachoeira do Sul">Cachoeira do Sul</option>
                                                    <option data-estado="RS" value="Camaquã">Camaquã</option>
                                                    <option data-estado="RS" value="Campo Bom">Campo Bom</option>
                                                    <option data-estado="RS" value="Campo Novo">Campo Novo</option>
                                                    <option data-estado="RS" value="Candelária">Candelária</option>
                                                    <option data-estado="RS" value="Canguçu">Canguçu</option>
                                                    <option data-estado="RS" value="Canoas">Canoas</option>
                                                    <option data-estado="RS" value="Carazinho">Carazinho</option>
                                                    <option data-estado="RS" value="Catuípe">Catuípe</option>
                                                    <option data-estado="RS" value="Caxias do Sul">Caxias do Sul</option>
                                                    <option data-estado="RS" value="Cerro Largo">Cerro Largo</option>
                                                    <option data-estado="RS" value="Chapada">Chapada</option>
                                                    <option data-estado="RS" value="Constantina">Constantina</option>
                                                    <option data-estado="RS" value="Crissiumal">Crissiumal</option>
                                                    <option data-estado="RS" value="Cruz Alta">Cruz Alta</option>
                                                    <option data-estado="RS" value="Dom Feliciano">Dom Feliciano</option>
                                                    <option data-estado="RS" value="Dom Pedrito">Dom Pedrito</option>
                                                    <option data-estado="RS" value="Encantado">Encantado</option>
                                                    <option data-estado="RS" value="Encruzilhada do Sul">Encruzilhada do Sul</option>
                                                    <option data-estado="RS" value="Erechim">Erechim</option>
                                                    <option data-estado="RS" value="Espumoso">Espumoso</option>
                                                    <option data-estado="RS" value="Estância Velha">Estância Velha</option>
                                                    <option data-estado="RS" value="Estância Velha">Estância Velha</option>
                                                    <option data-estado="RS" value="Estrela">Estrela</option>
                                                    <option data-estado="RS" value="Farroupilha">Farroupilha</option>
                                                    <option data-estado="RS" value="Faxinal do Soturno">Faxinal do Soturno</option>
                                                    <option data-estado="RS" value="Flores da Cunha">Flores da Cunha</option>
                                                    <option data-estado="RS" value="Frederico Westphalen">Frederico Westphalen</option>
                                                    <option data-estado="RS" value="Garibaldi">Garibaldi</option>
                                                    <option data-estado="RS" value="Getúlio Vargas">Getúlio Vargas</option>
                                                    <option data-estado="RS" value="Giruá">Giruá</option>
                                                    <option data-estado="RS" value="Gramado">Gramado</option>
                                                    <option data-estado="RS" value="Gravataí">Gravataí</option>
                                                    <option data-estado="RS" value="Guaporé">Guaporé</option>
                                                    <option data-estado="RS" value="Horizontina">Horizontina</option>
                                                    <option data-estado="RS" value="Ibirubá">Ibirubá</option>
                                                    <option data-estado="RS" value="Igrejinha">Igrejinha</option>
                                                    <option data-estado="RS" value="Ijuí">Ijuí</option>
                                                    <option data-estado="RS" value="Itaqui">Itaqui</option>
                                                    <option data-estado="RS" value="Jaguarão">Jaguarão</option>
                                                    <option data-estado="RS" value="Júlio de Castilhos">Júlio de Castilhos</option>
                                                    <option data-estado="RS" value="Lagoa Vermelha">Lagoa Vermelha</option>
                                                    <option data-estado="RS" value="Lajeado">Lajeado</option>
                                                    <option data-estado="RS" value="Machadinho">Machadinho</option>
                                                    <option data-estado="RS" value="Marau">Marau</option>
                                                    <option data-estado="RS" value="Marcelino Ramos">Marcelino Ramos</option>
                                                    <option data-estado="RS" value="Montenegro">Montenegro</option>
                                                    <option data-estado="RS" value="Mostardas">Mostardas</option>
                                                    <option data-estado="RS" value="Nonoai">Nonoai</option>
                                                    <option data-estado="RS" value="Nova Palma">Nova Palma</option>
                                                    <option data-estado="RS" value="Nova Petrópolis">Nova Petrópolis</option>
                                                    <option data-estado="RS" value="Nova Prata">Nova Prata</option>
                                                    <option data-estado="RS" value="Osório">Osório</option>
                                                    <option data-estado="RS" value="Palmeira das Missões">Palmeira das Missões</option>
                                                    <option data-estado="RS" value="Panambi">Panambi</option>
                                                    <option data-estado="RS" value="Passo Fundo">Passo Fundo</option>
                                                    <option data-estado="RS" value="Pelotas">Pelotas</option>
                                                    <option data-estado="RS" value="Pinheiro Machado">Pinheiro Machado</option>
                                                    <option data-estado="RS" value="Piratini">Piratini</option>
                                                    <option data-estado="RS" value="Porto Alegre">Porto Alegre</option>
                                                    <option data-estado="RS" value="Porto Xavier">Porto Xavier</option>
                                                    <option data-estado="RS" value="Quaraí">Quaraí</option>
                                                    <option data-estado="RS" value="Restinga Seca">Restinga Seca</option>
                                                    <option data-estado="RS" value="Rio Grande">Rio Grande</option>
                                                    <option data-estado="RS" value="Rio Pardo">Rio Pardo</option>
                                                    <option data-estado="RS" value="Ronda Alta">Ronda Alta</option>
                                                    <option data-estado="RS" value="Roque Gonzales">Roque Gonzales</option>
                                                    <option data-estado="RS" value="Rosário do Sul">Rosário do Sul</option>
                                                    <option data-estado="RS" value="Sananduva">Sananduva</option>
                                                    <option data-estado="RS" value="Santa Bárbara do Sul">Santa Bárbara do Sul</option>
                                                    <option data-estado="RS" value="Santa Cruz do Sul">Santa Cruz do Sul</option>
                                                    <option data-estado="RS" value="Santa Maria">Santa Maria</option>
                                                    <option data-estado="RS" value="Santana do Livramento">Santana do Livramento</option>
                                                    <option data-estado="RS" value="Santa Rosa">Santa Rosa</option>
                                                    <option data-estado="RS" value="Santa Vitória do Palmar">Santa Vitória do Palmar</option>
                                                    <option data-estado="RS" value="Santiago">Santiago</option>
                                                    <option data-estado="RS" value="Santo Ângelo">Santo Ângelo</option>
                                                    <option data-estado="RS" value="Santo Antônio da Patrulha">Santo Antônio da Patrulha</option>
                                                    <option data-estado="RS" value="Santo Augusto">Santo Augusto</option>
                                                    <option data-estado="RS" value="Santo Cristo">Santo Cristo</option>
                                                    <option data-estado="RS" value="São Borja">São Borja</option>
                                                    <option data-estado="RS" value="São Francisco de Assis">São Francisco de Assis</option>
                                                    <option data-estado="RS" value="São Francisco de Paula">São Francisco de Paula</option>
                                                    <option data-estado="RS" value="São Gabriel">São Gabriel</option>
                                                    <option data-estado="RS" value="São Jerônimo">São Jerônimo</option>
                                                    <option data-estado="RS" value="São José do Ouro">São José do Ouro</option>
                                                    <option data-estado="RS" value="São Leopoldo">São Leopoldo</option>
                                                    <option data-estado="RS" value="São Lourenço do Sul">São Lourenço do Sul</option>
                                                    <option data-estado="RS" value="São Luiz Gonzaga">São Luiz Gonzaga</option>
                                                    <option data-estado="RS" value="São Pedro do Sul">São Pedro do Sul</option>
                                                    <option data-estado="RS" value="São Sebastião do Caí">São Sebastião do Caí</option>
                                                    <option data-estado="RS" value="São Sepé">São Sepé</option>
                                                    <option data-estado="RS" value="Sarandi">Sarandi</option>
                                                    <option data-estado="RS" value="Serafina Corrêa">Serafina Corrêa</option>
                                                    <option data-estado="RS" value="Sertão">Sertão</option>
                                                    <option data-estado="RS" value="Sobradinho">Sobradinho</option>
                                                    <option data-estado="RS" value="Soledade">Soledade</option>
                                                    <option data-estado="RS" value="Tapejara">Tapejara</option>
                                                    <option data-estado="RS" value="Tapera">Tapera</option>
                                                    <option data-estado="RS" value="Tapes">Tapes</option>
                                                    <option data-estado="RS" value="Taquara">Taquara</option>
                                                    <option data-estado="RS" value="Taquari">Taquari</option>
                                                    <option data-estado="RS" value="Tenente Portela">Tenente Portela</option>
                                                    <option data-estado="RS" value="Torres">Torres</option>
                                                    <option data-estado="RS" value="Três Coroas">Três Coroas</option>
                                                    <option data-estado="RS" value="Três de Maio">Três de Maio</option>
                                                    <option data-estado="RS" value="Três Passos">Três Passos</option>
                                                    <option data-estado="RS" value="Tupanciretã">Tupanciretã</option>
                                                    <option data-estado="RS" value="Uruguaiana">Uruguaiana</option>
                                                    <option data-estado="RS" value="Vacaria">Vacaria</option>
                                                    <option data-estado="RS" value="Venâncio Aires">Venâncio Aires</option>
                                                    <option data-estado="RS" value="Vera Cruz">Vera Cruz</option>
                                                    <option data-estado="RS" value="Veranópolis">Veranópolis</option>
                                                    <option data-estado="SC" value="Abelardo Luz">Abelardo Luz</option>
                                                    <option data-estado="SC" value="Alfredo Wagner">Alfredo Wagner</option>
                                                    <option data-estado="SC" value="Araranguá">Araranguá</option>
                                                    <option data-estado="SC" value="Balneário Camboriú">Balneário Camboriú</option>
                                                    <option data-estado="SC" value="Barracão">Barracão</option>
                                                    <option data-estado="SC" value="Blumenau">Blumenau</option>
                                                    <option data-estado="SC" value="Bom Retiro">Bom Retiro</option>
                                                    <option data-estado="SC" value="Braço do Norte">Braço do Norte</option>
                                                    <option data-estado="SC" value="Brusque">Brusque</option>
                                                    <option data-estado="SC" value="Caçador">Caçador</option>
                                                    <option data-estado="SC" value="Campos Novos">Campos Novos</option>
                                                    <option data-estado="SC" value="Canoinhas">Canoinhas</option>
                                                    <option data-estado="SC" value="Capinzal">Capinzal</option>
                                                    <option data-estado="SC" value="Chapecó">Chapecó</option>
                                                    <option data-estado="SC" value="Cocal do Sul">Cocal do Sul</option>
                                                    <option data-estado="SC" value="Concórdia">Concórdia</option>
                                                    <option data-estado="SC" value="Cunha Porã">Cunha Porã</option>
                                                    <option data-estado="SC" value="Curitibanos">Curitibanos</option>
                                                    <option data-estado="SC" value="Descanso">Descanso</option>
                                                    <option data-estado="SC" value="Florianópolis">Florianópolis</option>
                                                    <option data-estado="SC" value="Fraiburgo">Fraiburgo</option>
                                                    <option data-estado="SC" value="Gaspar">Gaspar</option>
                                                    <option data-estado="SC" value="Guaraciaba">Guaraciaba</option>
                                                    <option data-estado="SC" value="Ibirama">Ibirama</option>
                                                    <option data-estado="SC" value="Indaial">Indaial</option>
                                                    <option data-estado="SC" value="Itajaí">Itajaí</option>
                                                    <option data-estado="SC" value="Itapiranga">Itapiranga</option>
                                                    <option data-estado="SC" value="Jacinto Machado">Jacinto Machado</option>
                                                    <option data-estado="SC" value="Jaraguá do Sul">Jaraguá do Sul</option>
                                                    <option data-estado="SC" value="Joaçaba">Joaçaba</option>
                                                    <option data-estado="SC" value="Joinville">Joinville</option>
                                                    <option data-estado="SC" value="Lages">Lages</option>
                                                    <option data-estado="SC" value="Laguna">Laguna</option>
                                                    <option data-estado="SC" value="Maravilha">Maravilha</option>
                                                    <option data-estado="SC" value="Mondaí">Mondaí</option>
                                                    <option data-estado="SC" value="Orleans">Orleans</option>
                                                    <option data-estado="SC" value="Palma Sola">Palma Sola</option>
                                                    <option data-estado="SC" value="Palmitos">Palmitos</option>
                                                    <option data-estado="SC" value="Papanduva">Papanduva</option>
                                                    <option data-estado="SC" value="Pinhalzinho">Pinhalzinho</option>
                                                    <option data-estado="SC" value="Pomerode">Pomerode</option>
                                                    <option data-estado="SC" value="Ponte Serrada">Ponte Serrada</option>
                                                    <option data-estado="SC" value="Quilombo">Quilombo</option>
                                                    <option data-estado="SC" value="Rio do Sul">Rio do Sul</option>
                                                    <option data-estado="SC" value="Salete">Salete</option>
                                                    <option data-estado="SC" value="São Bento do Sul">São Bento do Sul</option>
                                                    <option data-estado="SC" value="São Carlos">São Carlos</option>
                                                    <option data-estado="SC" value="São Joaquim">São Joaquim</option>
                                                    <option data-estado="SC" value="São José do Cedro">São José do Cedro</option>
                                                    <option data-estado="SC" value="São Lourenço do Oeste">São Lourenço do Oeste</option>
                                                    <option data-estado="SC" value="São Miguel do Oeste">São Miguel do Oeste</option>
                                                    <option data-estado="SC" value="Seara">Seara</option>
                                                    <option data-estado="SC" value="Taió">Taió</option>
                                                    <option data-estado="SC" value="Tangará">Tangará</option>
                                                    <option data-estado="SC" value="Timbó">Timbó</option>
                                                    <option data-estado="SC" value="Tubarão">Tubarão</option>
                                                    <option data-estado="SC" value="Videira">Videira</option>
                                                    <option data-estado="SC" value="Xanxerê">Xanxerê</option>
                                                    <option data-estado="SE" value="Aquidabã">Aquidabã</option>
                                                    <option data-estado="SE" value="Aracaju">Aracaju</option>
                                                    <option data-estado="SE" value="Frei Paulo">Frei Paulo</option>
                                                    <option data-estado="SE" value="Itabaiana">Itabaiana</option>
                                                    <option data-estado="SE" value="Nossa Senhora da Glória">Nossa Senhora da Glória</option>
                                                    <option data-estado="SE" value="Porto da Folha">Porto da Folha</option>
                                                    <option data-estado="SE" value="Propriá">Propriá</option>
                                                    <option data-estado="SE" value="Ribeirópolis">Ribeirópolis</option>
                                                    <option data-estado="SE" value="Tobias Barreto">Tobias Barreto</option>
                                                    <option data-estado="SP" value="Adamantina">Adamantina</option>
                                                    <option data-estado="SP" value="Amparo">Amparo</option>
                                                    <option data-estado="SP" value="Araçatuba">Araçatuba</option>
                                                    <option data-estado="SP" value="Araraquara">Araraquara</option>
                                                    <option data-estado="SP" value="Atibaia">Atibaia</option>
                                                    <option data-estado="SP" value="Bariri">Bariri</option>
                                                    <option data-estado="SP" value="Barretos">Barretos</option>
                                                    <option data-estado="SP" value="Bauru">Bauru</option>
                                                    <option data-estado="SP" value="Bebedouro">Bebedouro</option>
                                                    <option data-estado="SP" value="Birigüi">Birigüi</option>
                                                    <option data-estado="SP" value="Botucatu">Botucatu</option>
                                                    <option data-estado="SP" value="Bragança Paulista">Bragança Paulista</option>
                                                    <option data-estado="SP" value="Cafelândia">Cafelândia</option>
                                                    <option data-estado="SP" value="Campinas">Campinas</option>
                                                    <option data-estado="SP" value="Capão Bonito">Capão Bonito</option>
                                                    <option data-estado="SP" value="Cardoso">Cardoso</option>
                                                    <option data-estado="SP" value="Catanduva">Catanduva</option>
                                                    <option data-estado="SP" value="Chavantes">Chavantes</option>
                                                    <option data-estado="SP" value="Dracena">Dracena</option>
                                                    <option data-estado="SP" value="Duartina">Duartina</option>
                                                    <option data-estado="SP" value="Espírito Santo do Pinhal">Espírito Santo do Pinhal</option>
                                                    <option data-estado="SP" value="Estrela D'Oeste">Estrela D'Oeste</option>
                                                    <option data-estado="SP" value="Franca">Franca</option>
                                                    <option data-estado="SP" value="Garça">Garça</option>
                                                    <option data-estado="SP" value="Guaíra">Guaíra</option>
                                                    <option data-estado="SP" value="Ibitinga">Ibitinga</option>
                                                    <option data-estado="SP" value="Igaraçu do Tietê">Igaraçu do Tietê</option>
                                                    <option data-estado="SP" value="Itaí">Itaí</option>
                                                    <option data-estado="SP" value="Itapetininga">Itapetininga</option>
                                                    <option data-estado="SP" value="Itapeva">Itapeva</option>
                                                    <option data-estado="SP" value="Itapira">Itapira</option>
                                                    <option data-estado="SP" value="Itápolis">Itápolis</option>
                                                    <option data-estado="SP" value="Itararé">Itararé</option>
                                                    <option data-estado="SP" value="Jaboticabal">Jaboticabal</option>
                                                    <option data-estado="SP" value="Jales">Jales</option>
                                                    <option data-estado="SP" value="Jaú">Jaú</option>
                                                    <option data-estado="SP" value="Jundiaí">Jundiaí</option>
                                                    <option data-estado="SP" value="Junqueirópolis">Junqueirópolis</option>
                                                    <option data-estado="SP" value="Lençóis Paulista">Lençóis Paulista</option>
                                                    <option data-estado="SP" value="Limeira">Limeira</option>
                                                    <option data-estado="SP" value="Lins">Lins</option>
                                                    <option data-estado="SP" value="Marília">Marília</option>
                                                    <option data-estado="SP" value="Martinópolis">Martinópolis</option>
                                                    <option data-estado="SP" value="Matão">Matão</option>
                                                    <option data-estado="SP" value="Miguelópolis">Miguelópolis</option>
                                                    <option data-estado="SP" value="Mirandópolis">Mirandópolis</option>
                                                    <option data-estado="SP" value="Mirassol">Mirassol</option>
                                                    <option data-estado="SP" value="Mogi-Mirim">Mogi-Mirim</option>
                                                    <option data-estado="SP" value="Monte Alto">Monte Alto</option>
                                                    <option data-estado="SP" value="Nhandeara">Nhandeara</option>
                                                    <option data-estado="SP" value="Novo Horizonte">Novo Horizonte</option>
                                                    <option data-estado="SP" value="Olímpia">Olímpia</option>
                                                    <option data-estado="SP" value="Orlândia">Orlândia</option>
                                                    <option data-estado="SP" value="Ourinhos">Ourinhos</option>
                                                    <option data-estado="SP" value="Pederneiras">Pederneiras</option>
                                                    <option data-estado="SP" value="Penápolis">Penápolis</option>
                                                    <option data-estado="SP" value="Piracicaba">Piracicaba</option>
                                                    <option data-estado="SP" value="Piraju">Piraju</option>
                                                    <option data-estado="SP" value="Pirajuí">Pirajuí</option>
                                                    <option data-estado="SP" value="Pirassununga">Pirassununga</option>
                                                    <option data-estado="SP" value="Pompéia">Pompéia</option>
                                                    <option data-estado="SP" value="Presidente Bernardes">Presidente Bernardes</option>
                                                    <option data-estado="SP" value="Presidente Epitácio">Presidente Epitácio</option>
                                                    <option data-estado="SP" value="Presidente Prudente">Presidente Prudente</option>
                                                    <option data-estado="SP" value="Presidente Venceslau">Presidente Venceslau</option>
                                                    <option data-estado="SP" value="Promissão">Promissão</option>
                                                    <option data-estado="SP" value="Rancharia">Rancharia</option>
                                                    <option data-estado="SP" value="Ribeirão Preto">Ribeirão Preto</option>
                                                    <option data-estado="SP" value="Santa Cruz do Rio Pardo">Santa Cruz do Rio Pardo</option>
                                                    <option data-estado="SP" value="Santa Fé do Sul">Santa Fé do Sul</option>
                                                    <option data-estado="SP" value="Santos">Santos</option>
                                                    <option data-estado="SP" value="São Bernardo do Campo">São Bernardo do Campo</option>
                                                    <option data-estado="SP" value="São João da Boa Vista">São João da Boa Vista</option>
                                                    <option data-estado="SP" value="São José do Rio Preto">São José do Rio Preto</option>
                                                    <option data-estado="SP" value="São José dos Campos">São José dos Campos</option>
                                                    <option data-estado="SP" value="São Manuel">São Manuel</option>
                                                    <option data-estado="SP" value="São Paulo">São Paulo</option>
                                                    <option data-estado="SP" value="São Paulo">São Paulo</option>
                                                    <option data-estado="SP" value="São Paulo">São Paulo</option>
                                                    <option data-estado="SP" value="Sertãozinho">Sertãozinho</option>
                                                    <option data-estado="SP" value="Sorocaba">Sorocaba</option>
                                                    <option data-estado="SP" value="Sumaré">Sumaré</option>
                                                    <option data-estado="SP" value="Tanabi">Tanabi</option>
                                                    <option data-estado="SP" value="Tupã">Tupã</option>
                                                    <option data-estado="SP" value="Tupi Paulista">Tupi Paulista</option>
                                                    <option data-estado="SP" value="Votuporanga">Votuporanga</option>
                                                    <option data-estado="TO" value="Alvorada">Alvorada</option>
                                                    <option data-estado="TO" value="Araguaína">Araguaína</option>
                                                    <option data-estado="TO" value="Arraias">Arraias</option>
                                                    <option data-estado="TO" value="Colinas do Tocantins">Colinas do Tocantins</option>
                                                    <option data-estado="TO" value="Colméia">Colméia</option>
                                                    <option data-estado="TO" value="Cristalândia">Cristalândia</option>
                                                    <option data-estado="TO" value="Dianópolis">Dianópolis</option>
                                                    <option data-estado="TO" value="Guaraí">Guaraí</option>
                                                    <option data-estado="TO" value="Gurupi">Gurupi</option>
                                                    <option data-estado="TO" value="Miracema do Tocantins">Miracema do Tocantins</option>
                                                    <option data-estado="TO" value="Palmas">Palmas</option>
                                                    <option data-estado="TO" value="Paraíso do Tocantins">Paraíso do Tocantins</option>
                                                    <option data-estado="TO" value="Pedro Afonso">Pedro Afonso</option>
                                                    <option data-estado="TO" value="Porto Nacional">Porto Nacional</option>
                                                    <option data-estado="TO" value="Tocantinópolis">Tocantinópolis</option>

                                                </select>
                                                <div id="error-cidade-aabb" class="invalid-feedback">
                                                    Campo obrigatório!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-5">
                                            <div class="box-dependente-aabb">
                                                <label for="user_dependente_aabb">Titular ou Dependente?*</label>
                                                <select id="user_dependente_aabb" class="form-control" name="user_dependente_aabb">
                                                    <option value="" selected="selected">-</option>
                                                    <option value="Titular">Titular</option>
                                                    <option value="Dependente">Dependente</option>
                                                </select>
                                                <div id="error-dependente" class="invalid-feedback">
                                                    Campo obrigatório!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="box-nome-titular-aabb">
                                                <label for="nome-titular-aabb">Digite o nome do titular da cota</label>
                                                <input class="form-control" type="text" id="nome-titular-aabb" name="nome-titular-aabb" placeholder="">
                                                <div id="error-nome-titular-aabb" class="invalid-feedback">
                                                    Campo obrigatório!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-botao-cadastrar">
                                            <a class="botao-enviar-cadastro background-roxo border-radius" type="submit">Cadastrar</a>
                                            
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
	}else{ ?>
		<script type="text/javascript">
			window.location = "/";
		</script>
<?php
	}
get_footer();