<?php

namespace ErikFig;

class HelloWorld
{
    public function handler()
    {
        $conteudo_view = '
        @extends("layouts.app")

        @section("content")

        @section("title", "Política de Privacidade")
        @section("meta_description", "")
        @section("meta_keywords", "")


        <div class="bg-primary">
            <h2 class="titulo-politica-privacidade">Política de Privacidade</h2>
        </div>

        <div class="container-lg container-md px-0 px-lg-3 px-md-3">
            <div class="bg-politica-privacidade text-justify shadow py-4">
                <ul class="nav nav-tabs mx-lg-3 pb-4 d-flex justify-content-lg-start justify-content-center" id="myTab" role="tablist">
                    @foreach($itens as $key => $item)
                        <li class="nav-item">
                            <a class="link nav-link border-0 @if($key == 0) active @endif"
                            data-toggle="tab" 
                            href="#<?php echo Str::slug($item->titulo)?>"
                            role="tab"
                            aria-controls="<?php echo Str::slug($item->titulo)?>"
                            aria-selected="{{$key == 0 ? true : false}}">{{$item->titulo}}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="texto-politica-privacidade tab-content" id="myTabContent">
                    @foreach($itens as $key => $item)
                        <div class="tab-pane fade @if($key == 0) show active @endif"
                        id="<?php echo Str::slug($item->titulo)?>"
                        role="tabpanel"
                        aria-labelledby="home-tab">
                            {!!$item->conteudo!!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        @endsection
        ';

        $conteudo_scss = '
        .titulo-politica-privacidade{
            font-size: 2.5rem;
            font-weight: 900;
            color: $white;
            text-align: center;
        }
        
        .bg-politica-privacidade{
            background-color: $white;
        }
        
        .texto-politica-privacidade{
            line-height: 1.5rem;
            font-size: 1rem;
            margin: 0 1rem;
            @include media-breakpoint-up(md) {
                margin: 0 4rem;
            }
            @include media-breakpoint-up(lg) {
                margin: 0 4rem;
            }
            @include media-breakpoint-up(xl) {
                margin: 0 4rem;
            }
        }
        
        .list-navegadores{
            list-style-type: none;
        }
        
        .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
            color: $blue;
            background-color: transparent;
            border: none;
            font-weight: 600;
        }
        ';

        $conteudo_migrate = '
        <?php

        use Illuminate\Database\Migrations\Migration;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Support\Facades\Schema;

        class CreatePoliticaPrivacidadeTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("politica_privacidade", function (Blueprint $table) {
                    $table->id();
                    $table->string("titulo", 60);
                    $table->longText("conteudo");
                    $table->boolean("ativo");
                    $table->timestamps();
                });
            }

            /**
             * Reverse the migrations.
             *
             * @return void
             */
            public function down()
            {
                Schema::dropIfExists("politica_privacidade");
            }
        }
        ';

        $conteudo_seed = '
        <?php

        use App\Models\PoliticaPrivacidade;
        use Illuminate\Database\Seeder;

        class PoliticaPrivacidadeSeeder extends Seeder
        {
            /**
             * Run the database seeds.
             *
             * @return void
             */
            public function run()
            {
                $politica_privacidades = [
                    [
                        "titulo" => "Cookies",
                        "conteudo" => \'<div class="spacer-50"></div>
                        <h3>COOKIES – O QUE SÃO E COMO SÃO UTILIZADOS</h3>
                        <h4>Como utilizamos os cookies</h4>
                        <p>Cookies são arquivos ou informações que podem ser armazenadas em seus dispositivos quando você visita nosso site, para realizar pesquisas ou compras dos produtos ou serviços da HIDEA. Geralmente, contém o nome do site que o originou, seu tempo de vida e um valor, que é gerado aleatoriamente.</p>
                        <p>A HIDEA utiliza cookies para facilitar o uso e adaptar melhor suas páginas aos interesses e às necessidades dos Titulares, bem como para compilar informações sobre a utilização de seus sites e serviços, auxiliando a melhorar suas estruturas e seus conteúdos. Eles também podem ser utilizados para acelerar as suas atividades e experiências futuras em nosso portal.</p>
                        <p>A qualquer momento, o Titular poderá revogar seu consentimento quanto aos cookies, devendo apagá-los das páginas da HIDEA, utilizando as configurações de seu navegador de preferência. Para mais informações sobre como proceder em relação à gestão dos cookies nos navegadores:</p>
                        <ol class="list-navegadores text-left">
                            <li>
                                Internet Explorer: 
                                <a class="text-primary text-break" target="_blank" href="https://support.microsoft.com/pt-br/help/17442/windows-internet-explorer-delete-manage-cookies">https://support.microsoft.com/pt-br/help/17442/windows-internet-explorer-delete-manage-cookies</a>
                            </li>
                            <li>
                                Mozilla Firefox: 
                                <a class="text-primary text-break " target="_blank" href="https://support.mozilla.org/pt-BR/kb/ative-e-desative-os-cookies-que-os-sites-usam">https://support.mozilla.org/pt-BR/kb/ative-e-desative-os-cookies-que-os-sites-usam</a>
                            </li>
                            <li>
                                Google Chrome: 
                                <a class="text-primary text-break " target="_blank" href="https://support.google.com/accounts/answer/61416?co=GENIE.Platform%3DDesktop&hl=pt-BR">https://support.google.com/accounts/answer/61416?co=GENIE.Platform%3DDesktop&hl=pt-BR</a>
                            </li>
                            <li>
                                Safari: 
                                <a class="text-primary text-break " target="_blank" href="https://support.apple.com/pt-br/guide/safari/sfri11471/mac">https://support.apple.com/pt-br/guide/safari/sfri11471/mac</a>
                            </li>
                        </ol>
                        </p>
                        <p>Após o Titular autorizar a utilização, quando do uso das páginas da HIDEA, será armazenado um cookie em seu dispositivo para lembrá-lo na próxima sessão.</p>
                        <p>Por fim, lembramos que, caso o Titular não aceite alguns cookies das páginas da HIDEA, certos serviços poderão não funcionar de maneira ideal.</p>
                        <div class="spacer-20"></div>
                        <h4>Quais são os meus direitos como titular?</h4>
                        <p>A LGPD garante que você tenha uma série de direitos relacionados aos seus dados. Comprometidos com o cumprimento desses direitos, citaremos como você pode exercê-los junto à HIDEA.</p>
                        <ul>
                            <li>A revogação do consentimento</li>
                            <li>Acesso aos dados </li>
                            <li>Anonimização, bloqueio ou eliminação de dados desnecessários, excessivos ou tratados em desconformidade </li>
                            <li>Confirmação da existência de tratamento </li>
                            <li>Correção de dados incompletos, inexatos ou desatualizados </li>
                            <li>Eliminação dos dados tratados </li>
                            <li>Informação sobre a possibilidade de não fornecer o seu consentimento, bem como de ser informado sobre as consequências, em caso de negativa </li>
                            <li>Obtenção de informações sobre as entidades públicas ou privadas com as quais a HIDEA compartilhou seus dados </li>
                            <li>Requisição da portabilidade de seus dados a outro fornecedor de serviços ou produtos</li>
                        </ul>
                        <div class="spacer-20"></div>
                        <h3>FICOU COM DÚVIDA?</h3>
                        <p>A HIDEA IMPORTAÇÃO E COMÉRCIO LTDA, pessoa jurídica de direito privado inscrita no CNPJ sob o nº 29.071.280/0001-00, com sede na Rua Dois de Setembro, 4241 – Itoupava Norte – Blumenau - SC, CEP: 89053-200, entende como extremamente relevantes os registros eletrônicos e os dados pessoais deixados por você (“Titular”) na utilização dos diversos sites e serviços (“Serviços”) da HIDEA, servindo a presente Política de Privacidade ("Política") para regular, de forma simples, transparente e objetiva, quais dados pessoais serão obtidos, assim como quando e de qual forma eles poderão ser utilizados.</p>
                        <p>A presente política se aplica a serviços relacionados às atividades da HIDEA, entendendo como tal todas aquelas elencadas no site oficial da HIDEA, no endereço www.hidea.com.br</p>
                        <p>A presente política é voltada a clientes da HIDEA e ao público em geral, e engloba, de maneira básica, as formas nas quais tratamos os dados pessoais dessas pessoas.</p>
                        <p>Em caso de dúvidas adicionais ou requisições, por favor, entre em contato com nosso suporte: <a class="text-primary" href="mailto:lgpd@hidea.com.br">lgpd@hidea.com.br</a></p>
                        <p>Para ilustrar melhor a forma como realizamos o tratamento de dados, apresentamos um resumo de nossa Política de Privacidade e Proteção de Dados Pessoais (“Política”):</p>
                        <h5>AGENTE DE TRATAMENTO - HIDEA</h5>
                        <h5>PAPEL DO TRATAMENTO - Predominantemente Controladora</h5>
                        <div class="spacer-20"></div>
                        <h4>FINALIDADES</h4>
                        <p>Os dados pessoais coletados são utilizados para melhorar ou criar novos produtos e serviços aos clientes e parceiros da HIDEA, viabilizando uma interação dinâmica e transparente entre o titular dos dados e a operadora, para realizar pesquisas relacionadas às suas atividades - mediante o consentimento do titular – ou para interesse legítimo da HIDEA, sem prejudicar os interesses, direitos e liberdades fundamentais do titular.</p>
                        <p>Os dados serão utilizados pela HIDEA para que possa criar um relacionamento mais próximo com seu cliente e parceiro, demonstrando através de seus comunicados, os trabalhos por ela desenvolvida para geração de negócios entre o titular e a HIDEA.</p>
                        <p>BASE LEGAL – Artigo 7º, incisos I, V, IX e X da LGPD</p>
                        <p>Esta política poderá ser atualizada, a qualquer tempo, pela HIDEA mediante aviso no site.</p>\',
                        "ativo" => 1,
                    ],
                    [
                        "titulo" => "Política de Privacidade",
                        "conteudo" => \'<div class="spacer-50"></div>
                        <h3>O que é a Lei Geral de Proteção de Dados e como ela lhe protege?</h3>
                        <div class="spacer-20"></div>
                        <p>A <a class="text-primary" href="http://www.planalto.gov.br/ccivil_03/_Ato2015-2018/2018/Lei/L13709.htm" target="_blank">Lei 13.709/2018</a> foi sancionada em agosto de 2018, pelo então Presidente da República Michel Temer.</p>
                        <p>Essa implementação da LGPD foi fruto de oito anos de debates e adaptações. A sanção, <a class="text-primary" href="http://www.planalto.gov.br/ccivil_03/_Ato2015-2018/2018/Msg/VEP/VEP-451.htm" target="_blank">com vetos</a>, não coloca a lei em vigor imediatamente, pois foi dado um prazo para que as empresas pudessem se adaptar.</p>
                        <p>É preciso esperar 18 meses a partir da data da sanção, o que significa que a lei entrará de fato em vigor em fevereiro de 2020.</p>
                        <p>A necessidade de uma norma específica para a proteção de dados aumentou conforme a facilidade de produção e vazamento das informações foi ficando latente.</p>
                        <p>Atualmente, qualquer pessoa pode ter um smartphone e produzir uma variedade de dados a cada minuto. Além disso, temos os objetos conectados (com a Internet das Coisas), que coletam informações do ambiente e monitoram pessoas.</p>
                        <p>A LGPD nasce como uma maneira de limitar possíveis abusos e penalizar de forma objetiva o uso desregrado de dados por parte das empresas.</p>
                        <p>O Brasil entra, dessa forma, no grupo de países que contam com uma legislação específica para regular o tratamento de dados, ao lado de países da União Europeia e os Estados Unidos.</p>
                        <div class="spacer-20"></div>
                        <h3>O que é tratamento de dados?</h3>
                        <p>É toda e qualquer operação realizada com um dado: coleta, produção, recepção, classificação, utilização, acesso, reprodução, transmissão, distribuição, processamento, arquivamento, armazenamento, eliminação, avaliação ou controle da informação, modificação, comunicação, transferência, difusão ou extração.</p>
                        <p>Ou seja, se há um dado, alguma ação está sendo feita com ele. Dessa forma, podemos entender o tratamento de dados como um ciclo de vida das informações.</p>
                        <div class="spacer-20"></div>
                        <h3>Quais dados são coletados?</h3>
                        <h4>Dados pessoais</h4>
                        <p>Na LGPD é definido como “informação relacionada à pessoa identificada ou identificável”. Ou seja, quando ele permite a identificação, direta ou indireta, de uma pessoa (titular), como por exemplo: nome, sobrenome, data de nascimento, documentos pessoais (como CPF, RG, CNH, Carteira de Trabalho, passaporte e título de eleitor), endereço residencial ou comercial, telefone, e-mail e endereço IP.</p>
                        <h4>Dados pessoais sensíveis</h4>
                        <p>São aqueles que se referem à origem racial ou étnica, convicção religiosa, opinião política, filiação a sindicato ou à organização de caráter religioso, filosófico ou político, relacionados à saúde ou à vida sexual, dados genéticos ou biométricos relativos à pessoa natural.</p>
                        <p>O dono do dado é chamado de titular, seja ele antigo, presente ou potencial cliente, colaborador, contratado, parceiro comercial e terceiro.</p>
                        <p>A Lei Geral de Proteção de Dados Pessoais cita também o dado anonimizado, que é aquele que, originariamente, era relativo a uma pessoa, mas que perdeu a possibilidade de associação, direta ou indireta, a um indivíduo, considerando os meios técnicos razoáveis e disponíveis no momento do tratamento. Nesse caso, a LGPD não se aplicará a ele.</p>
                        <div class="spacer-20"></div>
                        <h3>COMO SE COLETA ESTES DADOS?</h3>
                        <h4>Dados pessoais fornecidos pelo titular</h4>
                        <p>Quando são inseridos ou encaminhados ativamente pelo titular ao entrar em contato ou acessar os canais de atendimento da HIDEA. Independentemente de quais dados o titular fornecer, nós apenas faremos uso daqueles efetivamente relevantes e necessários para o cumprimento das finalidades a ele declaradas, caso a caso.</p>
                        <h4>Dados coletados automaticamente</h4>
                        <p>Tais como: características do dispositivo de acesso, do navegador, IP (com data e hora), origem do IP, informações sobre cliques, páginas acessadas, termos de procura digitados em nossos portais, dentre outros. Para tal coleta, são utilizadas ferramentas como cookies, pixel tags, que têm o propósito de melhorar a experiência de navegação do titular nos serviços, de acordo com seus hábitos e suas preferências.</p>
                        <div class="spacer-20"></div>
                        <h3>COMO SEUS DADOS SERÃO UTILIZADOS</h3>
                        <p>Os dados pessoais coletados são utilizados para melhorar ou criar novos produtos e serviços aos clientes e parceiros da HIDEA, viabilizando uma interação dinâmica e transparente entre o titular dos dados e a operadora, para realizar pesquisas relacionadas às suas atividades - mediante o consentimento do titular – ou para interesse legítimo da HIDEA, sem prejudicar os interesses, direitos e liberdades fundamentais do titular.</p>
                        <p>Os dados serão utilizados pela HIDEA para que possa criar um relacionamento mais próximo com seu cliente e parceiro, demonstrando através de seus comunicados, os trabalhos por ela desenvolvida para geração de negócios entre o titular e a HIDEA.</p>
                        <div class="spacer-50"></div>
                        <h3>COOKIES – O QUE SÃO E COMO SÃO UTILIZADOS</h3>
                        <h4>Como utilizamos os cookies</h4>
                        <p>Cookies são arquivos ou informações que podem ser armazenadas em seus dispositivos quando você visita nosso site, para realizar pesquisas ou compras dos produtos ou serviços da HIDEA. Geralmente, contém o nome do site que o originou, seu tempo de vida e um valor, que é gerado aleatoriamente.</p>
                        <p>A HIDEA utiliza cookies para facilitar o uso e adaptar melhor suas páginas aos interesses e às necessidades dos Titulares, bem como para compilar informações sobre a utilização de seus sites e serviços, auxiliando a melhorar suas estruturas e seus conteúdos. Eles também podem ser utilizados para acelerar as suas atividades e experiências futuras em nosso portal.</p>
                        <p>A qualquer momento, o Titular poderá revogar seu consentimento quanto aos cookies, devendo apagá-los das páginas da HIDEA, utilizando as configurações de seu navegador de preferência. Para mais informações sobre como proceder em relação à gestão dos cookies nos navegadores:</p>
                        <ol class="list-navegadores text-left">
                            <li>
                                Internet Explorer: 
                                <a class="text-primary text-break " target="_blank" href="https://support.microsoft.com/pt-br/help/17442/windows-internet-explorer-delete-manage-cookies">https://support.microsoft.com/pt-br/help/17442/windows-internet-explorer-delete-manage-cookies</a>
                            </li>
                            <li>
                                Mozilla Firefox: 
                                <a class="text-primary text-break " target="_blank" href="https://support.mozilla.org/pt-BR/kb/ative-e-desative-os-cookies-que-os-sites-usam">https://support.mozilla.org/pt-BR/kb/ative-e-desative-os-cookies-que-os-sites-usam</a>
                            </li>
                            <li>
                                Google Chrome: 
                                <a class="text-primary text-break " target="_blank" href="https://support.google.com/accounts/answer/61416?co=GENIE.Platform%3DDesktop&hl=pt-BR">https://support.google.com/accounts/answer/61416?co=GENIE.Platform%3DDesktop&hl=pt-BR</a>
                            </li>
                            <li>
                                Safari: 
                                <a class="text-primary text-break " target="_blank" href="https://support.apple.com/pt-br/guide/safari/sfri11471/mac">https://support.apple.com/pt-br/guide/safari/sfri11471/mac</a>
                            </li>
                        </ol>
                        </p>
                        <p>Após o Titular autorizar a utilização, quando do uso das páginas da HIDEA, será armazenado um cookie em seu dispositivo para lembrá-lo na próxima sessão.</p>
                        <p>Por fim, lembramos que, caso o Titular não aceite alguns cookies das páginas da HIDEA, certos serviços poderão não funcionar de maneira ideal.</p>
                        <div class="spacer-20"></div>
                        <h4>Quais são os meus direitos como titular?</h4>
                        <p>A LGPD garante que você tenha uma série de direitos relacionados aos seus dados. Comprometidos com o cumprimento desses direitos, citaremos como você pode exercê-los junto à HIDEA. </p>
                        <ul>
                            <li>A revogação do consentimento</li>
                            <li>Acesso aos dados </li>
                            <li>Anonimização, bloqueio ou eliminação de dados desnecessários, excessivos ou tratados em desconformidade </li>
                            <li>Confirmação da existência de tratamento </li>
                            <li>Correção de dados incompletos, inexatos ou desatualizados </li>
                            <li>Eliminação dos dados tratados </li>
                            <li>Informação sobre a possibilidade de não fornecer o seu consentimento, bem como de ser informado sobre as consequências, em caso de negativa </li>
                            <li>Obtenção de informações sobre as entidades públicas ou privadas com as quais a HIDEA compartilhou seus dados </li>
                            <li>Requisição da portabilidade de seus dados a outro fornecedor de serviços ou produtos</li>
                        </ul>
                        <div class="spacer-20"></div>
                        <h3>FICOU COM DÚVIDA?</h3>
                        <p>A HIDEA IMPORTAÇÃO E COMÉRCIO LTDA, pessoa jurídica de direito privado inscrita no CNPJ sob o nº 29.071.280/0001-00, com sede na Rua Dois de Setembro, 4241 – Itoupava Norte – Blumenau - SC, CEP: 89053-200, entende como extremamente relevantes os registros eletrônicos e os dados pessoais deixados por você (“Titular”) na utilização dos diversos sites e serviços (“Serviços”) da HIDEA, servindo a presente Política de Privacidade ("Política") para regular, de forma simples, transparente e objetiva, quais dados pessoais serão obtidos, assim como quando e de qual forma eles poderão ser utilizados.</p>
                        <p>A presente política se aplica a serviços relacionados às atividades da HIDEA, entendendo como tal todas aquelas elencadas no site oficial da HIDEA, no endereço www.hidea.com.br</p>
                        <p>A presente política é voltada a clientes da HIDEA e ao público em geral, e engloba, de maneira básica, as formas nas quais tratamos os dados pessoais dessas pessoas.</p>
                        <p>Em caso de dúvidas adicionais ou requisições, por favor, entre em contato com nosso suporte: <a class="text-primary" class="text-primary" class="text-red" href="mailto:lgpd@hidea.com.br">lgpd@hidea.com.br</a></p>
                        <p>Para ilustrar melhor a forma como realizamos o tratamento de dados, apresentamos um resumo de nossa Política de Privacidade e Proteção de Dados Pessoais (“Política”):</p>
                        <h5>AGENTE DE TRATAMENTO - HIDEA</h5>
                        <h5>PAPEL DO TRATAMENTO - Predominantemente Controladora</h5>
                        <div class="spacer-20"></div>
                        <h4>FINALIDADES</h4>
                        <p>Os dados pessoais coletados são utilizados para melhorar ou criar novos produtos e serviços aos clientes e parceiros da HIDEA, viabilizando uma interação dinâmica e transparente entre o titular dos dados e a operadora, para realizar pesquisas relacionadas às suas atividades - mediante o consentimento do titular – ou para interesse legítimo da HIDEA, sem prejudicar os interesses, direitos e liberdades fundamentais do titular.</p>
                        <p>Os dados serão utilizados pela HIDEA para que possa criar um relacionamento mais próximo com seu cliente e parceiro, demonstrando através de seus comunicados, os trabalhos por ela desenvolvida para geração de negócios entre o titular e a HIDEA.</p>
                        <p>BASE LEGAL – Artigo 7º, incisos I, V, IX e X da LGPD</p>
                        <p>Esta política poderá ser atualizada, a qualquer tempo, pela HIDEA mediante aviso no site.</p>
                        <div class="spacer-20"></div>
                        <h4>Definições</h4>
                        <p>Caso tenha alguma dúvida sobre os termos utilizados nesta política, sugerimos consultar a tabela abaixo:</p>
                        <ol type="I">
                            <li>dado pessoal: informação relacionada a pessoa natural identificada ou identificável;</li>
                            <li>dado pessoal sensível: dado pessoal sobre origem racial ou étnica, convicção religiosa, opinião política, filiação a sindicato ou a organização de caráter religioso, filosófico ou político, dado referente à saúde ou à vida sexual, dado genético ou biométrico, quando vinculado a uma pessoa natural;</li>
                            <li>dado anonimizado: dado relativo a titular que não possa ser identificado, considerando a utilização de meios técnicos razoáveis e disponíveis na ocasião de seu tratamento;</li>
                            <li>banco de dados: conjunto estruturado de dados pessoais, estabelecido em um ou em vários locais, em suporte eletrônico ou físico;</li>
                            <li>titular: pessoa natural a quem se referem os dados pessoais que são objeto de tratamento;</li>
                            <li>controlador: pessoa natural ou jurídica, de direito público ou privado, a quem competem as decisões referentes ao tratamento de dados pessoais;</li>
                            <li>operador: pessoa natural ou jurídica, de direito público ou privado, que realiza o tratamento de dados pessoais em nome do controlador;</li>
                            <li>agentes de tratamento: o controlador e o operador;</li>
                            <li>tratamento: toda operação realizada com dados pessoais, como as que se referem a coleta, produção, recepção, classificação, utilização, acesso, reprodução, transmissão, distribuição, processamento, arquivamento, armazenamento, eliminação, avaliação ou controle da informação, modificação, comunicação, transferência, difusão ou extração;</li>
                            <li>consentimento: manifestação livre, informada e inequívoca pela qual o titular concorda com o tratamento de seus dados pessoais para uma finalidade determinada;</li>
                            <li>uso compartilhado de dados: comunicação, difusão, transferência internacional, interconexão de dados pessoais ou tratamento compartilhado de bancos de dados pessoais por órgãos e entidades públicos no cumprimento de suas competências legais, ou entre esses e entes privados, reciprocamente, com autorização específica, para uma ou mais modalidades de tratamento permitidas por esses entes públicos, ou entre entes privados;</li>
                        </ol>
                        <div class="spacer-20"></div>
                        <h4>Quais dados utilizamos</h4>
                        <p>A HIDEA poderá coletar as informações inseridas ativamente pelo Titular no momento de seu contato ou de seu cadastro e, ainda, informações coletadas automaticamente quando da utilização dos serviços disponíveis em nosso portal e da rede, como, por exemplo, identificação do estabelecimento comercial utilizado, IP com data e hora da conexão, entre outras.</p>
                        <p>Há, assim, o tratamento de dois tipos de dados pessoais: (a) aqueles fornecidos pelo próprio Titular; e (b) aqueles coletados automaticamente.</p>
                        <ol type="a">
                            <li>Dados pessoais fornecidos pelo Titular: a HIDEA coleta todos os dados pessoais inseridos ou encaminhadas ativamente pelo Titular ao entrar em contato ou acessar os portais da HIDEA, tais como nome completo, e-mail, gênero, data de nascimento, cidade e Estado, quando do preenchimento de formulários nos serviços, pelo Titular. Independentemente de quais dados o Titular fornecer ativamente à HIDEA, nós apenas faremos uso daqueles efetivamente relevantes e necessários para o atingimento das finalidades a ele declaradas, caso a caso.</li>
                            <li>Dados coletados automaticamente: a HIDEA também coleta uma série de informações de modo automático, tais como: características do dispositivo de acesso, do navegador, IP (com data e hora), origem do IP, informações sobre cliques, páginas acessadas, termos de procura digitados em nossos portais, dentre outras. Para tal coleta, fará uso de algumas tecnologias padrões, como cookies, pixel tags, que são utilizadas com o propósito de melhorar a experiência de navegação do Titular nos serviços, de acordo com seus hábitos e suas preferências.</li>
                        </ol>
                        <p>O Titular poderá acessar, atualizar e complementar seus dados, bem como solicitar a exclusão dos seus dados coletados pela HIDEA, pelo e-mail: <a class="text-primary" class="text-primary" href="mailto:lgpd@hidea.com.br">lgpd@hidea.com.br</a>. Iremos nos esforçar para respondê-lo no menor tempo possível, respeitando-se os prazos de guarda estabelecidos pela legislação.</p>
                        <p>A HIDEA trata, para as finalidades específicas aqui dispostas, dados considerados sensíveis pela Lei nº 13.709/2019, entendidos como aqueles relacionados à origem racial ou étnica, convicção religiosa, opinião política, filiação a sindicato ou à organização de caráter religioso, filosófico ou político, dado referente à saúde ou à vida sexual, sendo certo que faz o tratamento fundamentado por bases legais previamente autorizadas por lei.</p>
                        <div class="spacer-20"></div>
                        <h4>Como utilizamos os dados</h4>
                        <p>Os dados pessoais tratados pela HIDEA têm como finalidade predominante o estabelecimento de vínculo contratual ou a gestão, administração, prestação, ampliação e o melhoramento dos serviços ao Titular, adequando-as às suas preferências e aos seus gostos, bem como a criação de novos serviços e produtos a serem oferecidos.</p>
                        <p>A HIDEA, em alguns casos, também pode tratar dados pessoais quando necessários para o cumprimento de obrigação legal.</p>
                        <p>Além disso, a HIDEA também poderá tratar dados pessoais com base em seu interesse legítimo, sempre no limite do quanto é esperado pelo Titular, e nunca em prejuízo aos seus interesses, direitos e liberdades fundamentais.</p>
                        <p>Adicionalmente, as informações coletadas poderão, mediante o consentimento do Titular, serem utilizadas para a realização de pesquisas relacionadas às suas atividades.</p>
                        <div class="spacer-20"></div>
                        <h4>IV. Como utilizamos os cookies</h4>
                        <p>Cookies são arquivos ou informações que podem ser armazenadas em seus dispositivos quando você visita os websites ou utiliza os serviços on-line da HIDEA. Geralmente, contém o nome do site que o originou, seu tempo de vida e um valor, que é gerado aleatoriamente.</p>
                        <p>A HIDEA utiliza cookies para facilitar o uso e adaptar melhor suas páginas aos interesses e às necessidades dos Titulares, bem como para compilar informações sobre a utilização de seus sites e serviços, auxiliando a melhorar suas estruturas e seus conteúdos. Eles também podem ser utilizados para acelerar as suas atividades e experiências futuras em nosso portal.</p>
                        <p>Os Cookies nos ajudam a entender como os visitantes interagem com as páginas da HIDEA, fornecendo informações sobre as áreas visitadas, o tempo de visita ao site e quaisquer problemas encontrados, como mensagens de erro.</p>
                        <p>Os Cookies podem ser classificados como:</p>
                        <p>Necessários – São essenciais para que a página da HIDEA carregue corretamente e permita que você navegue em nossos sites e faça uso de todas as funcionalidades</p>
                        <p>Funcionais – Permitem que a página da HIDEA lembre de suas escolhas, para proporcionar uma experiência mais personalizada.</p>
                        <p>Marketing - São utilizados para fornecer mais conteúdo relevante e do interesse dos Titulares. Podem ser utilizados para apresentar publicidade mais direcionada ou limitar o número que esta é veiculada, nas páginas da HIDEA. Também, permitem a medição da eficácia de uma campanha publicitária da HIDEA.</p>
                        <p>Ainda, podem ser utilizados para indicar as páginas dos sites da HIDEA que o Titular visitou e a empresa pode compartilhar essas informações com terceiros, tais como agências publicitárias contratadas.</p>
                        <p>Após o Titular autorizar a utilização, quando do uso das páginas da HIDEA, será armazenado um cookie em seu dispositivo para lembrá-lo na próxima sessão.</p>
                        <p>A qualquer momento, o Titular poderá revogar seu consentimento quanto aos cookies, devendo apagá-los das páginas da HIDEA, utilizando as configurações de seu navegador de preferência. Para mais informações sobre como proceder em relação à gestão dos cookies nos navegadores:</p>
                        <ol class="list-navegadores text-left">
                            <li>
                                Internet Explorer: 
                                <a class="text-primary text-break " target="_blank" href="https://support.microsoft.com/pt-br/help/17442/windows-internet-explorer-delete-manage-cookies">https://support.microsoft.com/pt-br/help/17442/windows-internet-explorer-delete-manage-cookies</a>
                            </li>
                            <li>
                                Mozilla Firefox: 
                                <a class="text-primary text-break " target="_blank" href="https://support.mozilla.org/pt-BR/kb/ative-e-desative-os-cookies-que-os-sites-usam">https://support.mozilla.org/pt-BR/kb/ative-e-desative-os-cookies-que-os-sites-usam</a>
                            </li>
                            <li>
                                Google Chrome: 
                                <a class="text-primary text-break " target="_blank" href="https://support.google.com/accounts/answer/61416?co=GENIE.Platform%3DDesktop&hl=pt-BR">https://support.google.com/accounts/answer/61416?co=GENIE.Platform%3DDesktop&hl=pt-BR</a>
                            </li>
                            <li>
                                Safari: 
                                <a class="text-primary text-break " target="_blank" href="https://support.apple.com/pt-br/guide/safari/sfri11471/mac">https://support.apple.com/pt-br/guide/safari/sfri11471/mac</a>
                            </li>
                        </ol>
                        <p>Por fim, lembramos que, caso o Titular não aceite alguns cookies das páginas da HIDEA, certos serviços poderão não funcionar de maneira ideal.</p>
                        <div class="spacer-20"></div>
                        <h4>Com quem compartilhamos os dados</h4>
                        <p>A HIDEA trabalha em parceria com diversas empresas no Brasil. Desse modo, poderá compartilhar as informações coletadas nas seguintes hipóteses:</p>
                        <ol type="i">
                            <li>Com empresas parceiras e fornecedores, na prestação dos serviços voltados ao Titular.</li>
                            <li>Com autoridades, entidades governamentais ou outros terceiros, para a proteção dos interesses da HIDEA em qualquer tipo de conflito, incluindo ações judiciais e processos administrativos.</li>
                            <li>No caso de transações e alterações societárias envolvendo a HIDEA, hipótese em que a transferência das informações será necessária para a continuidade dos serviços.</li>
                            <li>Mediante ordem judicial ou pelo requerimento de autoridades administrativas que detenham competência legal para a sua requisição.</li>
                        </ol>
                        <div class="spacer-20"></div>
                        <h4>Como mantemos os dados seguros </h4>
                        <p>A HIDEA utiliza os meios razoáveis de mercado e legalmente requeridos para preservar a privacidade dos dados pessoais que coleta.</p>
                        <p>Além dos esforços técnicos, a HIDEA também adota medidas institucionais visando a proteção de dados pessoais, de modo que mantém uma estrutura e um programa de governança em privacidade aplicado às suas atividades, constantemente atualizados.</p>
                        <p>Embora adote os melhores esforços no sentido de preservar a privacidade e proteger os dados dos Titulares, nenhuma transmissão de informações é totalmente segura, de modo que a HIDEA não pode garantir integralmente que todos os dados que recebe ou envia não sejam alvo de acessos não autorizados perpetrados por meio de métodos desenvolvidos para obter informações de forma indevida. Por esse motivo, nós incentivamos os Titulares a tomarem as medidas apropriadas para se proteger, como, por exemplo, mantendo confidenciais todos os nomes de Titular e senhas, sendo certo que tais informações são pessoais, intransferíveis e de exclusiva responsabilidade dos Titulares.</p>
                        <div class="spacer-20"></div>
                        <h4>Manutenção dos dados</h4>
                        <p>Visando proteger a privacidade dos Titulares, os dados pessoais tratados pela HIDEA serão automaticamente eliminados quando deixarem de ser úteis para os fins para os quais foram coletados, ou quando o Titular solicitar sua eliminação, exceto se a sua manutenção for expressamente autorizada por lei ou regulação aplicável.</p>
                        <p>Contudo, as informações poderão ser conservadas para o cumprimento de obrigação legal ou regulatória, transferência a terceiro – desde que respeitados os requisitos de tratamento de dados – e uso exclusivo da HIDEA, inclusive para o exercício de seus direitos em processos judiciais ou administrativos.</p>
                        <div class="spacer-20"></div>
                        <h4>Seus direitos</h4>
                        <p>Em cumprimento à regulamentação aplicável, no que diz respeito ao tratamento de dados pessoais, a HIDEA respeita e garante ao Titular a possibilidade de apresentação de solicitações baseadas nos seguintes direitos:</p>
                        <ol type="i">
                            <li>A confirmação da existência de tratamento</li>
                            <li>O acesso aos dados</li>
                            <li>A correção de dados incompletos, inexatos ou desatualizados</li>
                            <li>Anonimização, bloqueio ou eliminação de dados desnecessários, excessivos ou tratados em desconformidade</li>
                            <li>A portabilidade de seus dados a outro fornecedor de serviços ou produtos, mediante requisição expressa pelo Titular</li>
                            <li>A eliminação dos dados tratados com consentimento do Titular</li>
                            <li>A obtenção de informações sobre as entidades públicas ou privadas com as quais a HIDEA compartilhou seus dados</li>
                            <li>A informação sobre a possibilidade de não fornecer o seu consentimento, bem como de ser informado sobre as consequências, em caso de negativa</li>
                            <li>A revogação do consentimento.</li>
                        </ol>
                        <p>Parte desses direitos poderá ser exercida diretamente pelo Titular, a partir da gestão de informações sobre a sua conta, enquanto outra parte dependerá do envio de requisição para o e-mail: <a class="text-primary" href="mailto:lgpd@hidea.com.br">lgpd@hidea.com.br</a>, para posterior avaliação e adoção das demais providências pela HIDEA.</p>
                        <p>A HIDEA empreenderá todos os esforços para atender aos pedidos no menor espaço de tempo possível, no entanto, fatores justificáveis, tais como a complexidade da ação requisitada, poderão atrasar ou impedir seu rápido atendimento.</p>
                        <p>Por fim, o Titular deve estar ciente que a sua requisição poderá ser legalmente rejeitada, seja por motivos formais (a exemplo de sua incapacidade de comprovar sua identidade) ou legais (a exemplo do pedido de exclusão de dados cuja manutenção é livre exercício de direito pela HIDEA).</p>
                        <div class="spacer-20"></div>
                        <h4>Legislação e foro</h4>
                        <p>Esta política será regida, interpretada e executada de acordo com as leis da República Federativa do Brasil, especialmente a Lei nº 13.709/2018, independentemente das leis de outros Estados ou países, sendo competente o foro de domicílio do Titular para dirimir qualquer dúvida decorrente deste documento.</p>\',
                        "ativo" => 1,
                    ],
                ];

                foreach ($politica_privacidades as $politica_privacidade) {
                    PoliticaPrivacidade::create($politica_privacidade);
                }
            }
        }
        ';

        $conteudo_model = '
        <?php

        namespace App\Models;

        use Illuminate\Database\Eloquent\Model;

        class PoliticaPrivacidade extends Model
        {
            protected $table = "politica_privacidade";

            public static function getAtivos(){
                return self::where("ativo", 1)->get();
            }
        }
        ';

        $conteudo_controller = '
        <?php

        namespace App\Http\Controllers;

        use App\Models\PoliticaPrivacidade;

        class PoliticaPrivacidadeController extends Controller
        {
            /**
             * Create a new controller instance.
             *
             * @return void
             */
            public function __construct()
            {
                parent::__construct();
            }

            /**
             * Show the application dashboard.
             *
             * @return \Illuminate\Contracts\Support\Renderable
             */
            public function index()
            {
                $itens = PoliticaPrivacidade::getAtivos();
                return view("politicaPrivacidade", ["itens" => $itens]);
            }
        }
        ';

        $conteudo_rota = '
        Route::get("politica-de-privacidade", "PoliticaPrivacidadeController@index")->name("politicaPrivacidade");
        ';

        // view politica_privaciade
        if(!(file_put_contents('resources/views/PoliticaPrivacidade/politicaPrivacidade.blade.php', $conteudo_view))){
            mkdir('resources/views/PoliticaPrivacidade/', 0777, true);
            file_put_contents('resources/views/PoliticaPrivacidade/politicaPrivacidade.blade.php', $conteudo_view);
        }

        // estilo sass
        if(!(file_put_contents('resources/sass/politica_privacidade.scss', $conteudo_scss))){
            mkdir('resources/sass/', 0777, true);
            file_put_contents('resources/sass/politica_privacidade.scss', $conteudo_scss);
        }
        
        // migration
        $destino_migration = 'database/migrations/'.date('Y_m_d').'000000_create_politica_privacidade_table.php';
        if(!(file_put_contents($destino_migration, $conteudo_migrate))){
            mkdir('database/migrations/', 0777, true);
            file_put_contents($destino_migration, $conteudo_migrate);
        }

        // seeder
        if(!(file_put_contents('database/seeds/PoliticaPrivacidadeSeeder.php', $conteudo_seed))){
            mkdir('database/seeds/', 0777, true);
            file_put_contents('database/seeds/PoliticaPrivacidadeSeeder.php', $conteudo_seed);
        }

        // model
        if(!(file_put_contents('app/Models/PoliticaPrivacidade.php', $conteudo_model))){
            mkdir('app/Models/', 0777, true);
            file_put_contents('app/Models/PoliticaPrivacidade.php', $conteudo_model);
        }

        // politica privacidade controller
        if(!(file_put_contents('app/Http/Controllers/PoliticaPrivacidadeController.php', $conteudo_controller))){
            mkdir('app/Http/Controllers/', 0777, true);
            file_put_contents('app/Http/Controllers/PoliticaPrivacidadeController.php', $conteudo_controller);
        }
        
        // rota
        if(!(file_put_contents('routes/web.php', $conteudo_rota, FILE_APPEND))){
            mkdir('routes/', 0777, true);
            file_put_contents('routes/web.php', $conteudo_rota, FILE_APPEND);
        }
    }
}