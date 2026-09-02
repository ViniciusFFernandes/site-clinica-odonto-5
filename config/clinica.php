<?php
/**
 * Configuração do site — Clínica Odontológica Modelo
 * Edite AQUI todos os dados e textos. O HTML (index.php) não precisa mudar.
 */
return [
  // ====== Identidade ======
  'name'    => 'Clínica Odontológica Modelo',
  'name_full' => 'Clínica Odontológica Modelo',
  'short'   => 'Odonto Modelo',
  'doctor'  => 'Dr(a). Nome Sobrenome',
  'tagline' => 'Odontologia Estética · Cidade Exemplo',
  'logo'    => 'img/logo.svg',

  // ====== Contato ======
  'phone'           => '(00) 00000-0000',
  'phone_raw'       => '+5500000000000',
  'whatsapp_numero' => '5500000000000',
  'whatsapp_msg'    => 'Olá, Dr(a). Nome Sobrenome! Vim pelo site da Clínica Odontológica Modelo e gostaria de agendar uma avaliação.',

  // ====== Endereço ======
  'address'    => 'Rua Exemplo, 000',
  'city'       => 'Cidade Exemplo',
  'state'   => 'UF',
  'maps_query' => 'Rua Exemplo, 000, Cidade Exemplo · UF',
  'geo_lat'    => 0,
  'geo_lng'    => 0,

  // ====== Avaliações ======
  'rating'     => '5,0',
  'rating_num' => 5.0,
  'reviews'    => 27,

  // ====== Horário ======
  'horario_semana' => 'Seg a Sex: 09h às 19h',
  'horario_sabado' => 'Sábado: 09h às 13h (com agendamento)',

  // ====== Redes sociais ======
  'instagram' => '',

  // ====== SEO ======
  'seo_title' => 'Clínica Odontológica Modelo | Dentista em Cidade Exemplo',
  'seo_desc'  => 'Clínica Odontológica Modelo: odontologia estética de alto padrão em Cidade Exemplo. Facetas, clareamento, harmonização do sorriso, implantes e reabilitação oral com atendimento personalizado. Nota 5,0 no Google. Agende sua avaliação pelo WhatsApp.',

  // ====== Hero ======
  'hero_titulo'    => 'Seu sorriso, sua beleza e sua confiança em harmonia.',
  'hero_subtitulo' => 'Na Clínica Odontológica Modelo, unimos odontologia moderna e cuidado personalizado para transformar sorrisos com naturalidade.',
  'hero_selo'      => 'Nota 5,0 no Google',

  // ====== Experiência ======
  'exp_titulo' => 'Mais que um atendimento, uma experiência personalizada.',
  'exp_texto'  => 'Cada detalhe da Clínica Odontológica Modelo foi pensado para acolher você. Do primeiro contato ao resultado final, cuidamos da sua beleza com escuta atenta, ambiente confortável e um planejamento feito sob medida para o seu sorriso.',
  'exp_itens'  => [
    ['icon' => 'heart-handshake', 'title' => 'Atendimento próximo',      'desc' => 'Escuta atenta e acolhimento em cada etapa do seu tratamento.'],
    ['icon' => 'sofa',            'title' => 'Ambiente confortável',     'desc' => 'Um espaço sofisticado e tranquilo, pensado para o seu bem-estar.'],
    ['icon' => 'sparkles',        'title' => 'Planejamento individualizado', 'desc' => 'Um plano desenhado exclusivamente para você e para os seus objetivos.'],
    ['icon' => 'gem',             'title' => 'Resultados naturais',      'desc' => 'Beleza discreta e harmônica, respeitando a naturalidade do seu rosto.'],
  ],

  // ====== Tratamentos (blocos por categoria: imagem + texto) ======
  'tratamentos' => [
    [
      'tag'   => 'Estética Dental',
      'title' => 'Sorrisos que valorizam a sua beleza',
      'desc'  => 'Design de sorriso sob medida, com resultados naturais e harmônicos que realçam a beleza única do seu rosto.',
      'img'   => 'img/tratamento-estetica.svg',
      'alt'   => 'Detalhe de um sorriso após tratamento estético dental',
      'itens' => ['Clareamento', 'Facetas', 'Harmonização do sorriso'],
    ],
    [
      'tag'   => 'Reabilitação Oral',
      'title' => 'Devolvendo função e naturalidade',
      'desc'  => 'Recuperação completa da mastigação e da estética com implantes, próteses e restaurações planejados nos mínimos detalhes.',
      'img'   => 'img/tratamento-reabilitacao.svg',
      'alt'   => 'Ambiente clínico moderno para reabilitação oral',
      'itens' => ['Implantes', 'Próteses', 'Restaurações'],
    ],
    [
      'tag'   => 'Saúde Bucal',
      'title' => 'Cuidado que começa na prevenção',
      'desc'  => 'A base de um sorriso bonito é uma boca saudável. Cuidamos da sua saúde bucal com limpeza, prevenção e acompanhamento contínuo.',
      'img'   => 'img/tratamento-saude.svg',
      'alt'   => 'Instrumentos odontológicos para saúde bucal e prevenção',
      'itens' => ['Limpeza', 'Prevenção', 'Tratamentos odontológicos gerais'],
    ],
  ],

  // ====== Antes e Depois ======
  'ad_titulo' => 'Transformações que devolvem autoestima.',
  'ad_texto'  => 'Cada sorriso conta uma história. Em breve, este espaço trará casos reais de pacientes da Clínica Odontológica Modelo — resultados que unem técnica, delicadeza e naturalidade.',
  'ad_casos'  => [
    ['img' => 'img/antes-depois-1.svg', 'alt' => 'Caso clínico — antes e depois do tratamento estético', 'label' => 'Facetas · Estética Dental'],
    ['img' => 'img/antes-depois-2.svg', 'alt' => 'Caso clínico — antes e depois do clareamento', 'label' => 'Clareamento'],
    ['img' => 'img/antes-depois-3.svg', 'alt' => 'Caso clínico — antes e depois da harmonização do sorriso', 'label' => 'Harmonização do sorriso'],
  ],

  // ====== Sobre a Dr(a). Nome Sobrenome ======
  'sobre_titulo' => 'Dr(a). Nome Sobrenome',
  'sobre_sub'    => 'Cuidado humano em cada etapa do seu tratamento',
  'sobre_p1' => 'A Dr(a). Nome Sobrenome conduz cada atendimento com dedicação e um olhar atento a quem está à sua frente. Mais do que tratar dentes, ela cuida de pessoas — ouvindo, acolhendo e planejando cada passo com carinho.',
  'sobre_p2' => 'Seu compromisso é com resultados naturais e com uma experiência tranquila, do primeiro contato ao sorriso final. Na Clínica Odontológica Modelo, cada detalhe existe para que você se sinta cuidado, confiante e à vontade.',
  'sobre_stats' => [
    ['v' => '5,0★', 'l' => 'nota dos pacientes'],
    ['v' => '100%', 'l' => 'atendimento personalizado'],
    ['v' => '∞',    'l' => 'cuidado em cada detalhe'],
  ],

  // ====== Jornada do paciente ======
  'jornada_titulo' => 'Do primeiro contato ao novo sorriso.',
  'jornada' => [
    ['n' => '01', 'icon' => 'message-circle', 'title' => 'Conversa inicial pelo WhatsApp', 'desc' => 'Tudo começa com uma conversa. Tire suas dúvidas e conte o que você deseja para o seu sorriso.'],
    ['n' => '02', 'icon' => 'search',         'title' => 'Avaliação personalizada',        'desc' => 'Uma análise cuidadosa e individual do seu caso, com atenção a cada detalhe.'],
    ['n' => '03', 'icon' => 'clipboard-list', 'title' => 'Planejamento do tratamento',     'desc' => 'Um plano feito sob medida, apresentado com clareza e transparência antes de começar.'],
    ['n' => '04', 'icon' => 'sparkles',       'title' => 'Transformação do sorriso',       'desc' => 'O cuidado se transforma em resultado: um sorriso natural, bonito e cheio de confiança.'],
  ],

  // ====== Depoimentos ======
  'depoimentos' => [
    ['name' => 'Marina Cavalcante', 'role' => 'Facetas', 'initials' => 'MC', 'text' => 'A Dr(a). Nome Sobrenome realizou um sonho. Minhas facetas ficaram naturais, exatamente como eu queria. Do começo ao fim me senti acolhida e segura.'],
    ['name' => 'Rafaela Sampaio',  'role' => 'Harmonização do sorriso', 'initials' => 'RS', 'text' => 'O ambiente é lindo e o atendimento é impecável. Cada detalhe transmite cuidado. Saí de lá encantada com o resultado e com a experiência.'],
    ['name' => 'Beatriz Nogueira', 'role' => 'Clareamento e limpeza', 'initials' => 'BN', 'text' => 'Nunca fui tão bem tratada em uma clínica. A Dr(a). Nome Sobrenome é atenciosa, delicada e explica tudo com calma. Meu sorriso ficou radiante.'],
    ['name' => 'Camila Fontes',    'role' => 'Implante', 'initials' => 'CF', 'text' => 'Tinha muito medo, mas fui conduzida com tanto carinho que tudo foi tranquilo. O implante ficou perfeito, idêntico aos meus outros dentes.'],
    ['name' => 'Larissa Andrade',  'role' => 'Reabilitação oral', 'initials' => 'LA', 'text' => 'Profissionalismo e sensibilidade na medida certa. Recuperei meu sorriso e minha autoestima. Recomendo a Clínica Odontológica Modelo de olhos fechados.'],
    ['name' => 'Patrícia Moura',   'role' => 'Estética dental', 'initials' => 'PM', 'text' => 'Uma experiência de outro nível. Ambiente sofisticado, atendimento humano e um resultado natural que superou todas as minhas expectativas.'],
  ],

  // ====== CTA final ======
  'cta_titulo' => 'Agende sua avaliação e descubra o melhor tratamento para o seu sorriso.',
  'cta_sub'    => 'Dê o primeiro passo para um sorriso mais bonito, natural e cheio de confiança. Será um prazer receber você.',
];
