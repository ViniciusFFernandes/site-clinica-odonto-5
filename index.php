<?php
// index.php — Clínica Odontológica Modelo (conteúdo vem de config/clinica.php)
$cfg = require __DIR__ . '/config/clinica.php';

function e($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

function whats($cfg, $msg = null){
  $msg = $msg ?? $cfg['whatsapp_msg'];
  return 'https://wa.me/' . $cfg['whatsapp_numero'] . '?text=' . rawurlencode($msg);
}

/** Ícones (Lucide) inline como SVG. $class recebe utilitários Tailwind. */
function icon($name, $class = 'size-5'){
  static $map = [
    'sparkles' => '<path d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"/><path d="M20 2v4"/><path d="M22 4h-4"/><circle cx="4" cy="20" r="2"/>',
    'gem' => '<path d="M10.5 3 8 9l4 13 4-13-2.5-6"/><path d="M17 3a2 2 0 0 1 1.6.8l3 4a2 2 0 0 1 .013 2.382l-7.99 10.986a2 2 0 0 1-3.247 0l-7.99-10.986A2 2 0 0 1 2.4 7.8l2.998-3.997A2 2 0 0 1 7 3z"/><path d="M2 9h20"/>',
    'star' => '<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/>',
    'phone' => '<path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/>',
    'message-circle' => '<path d="M2.992 16.342a2 2 0 0 1 .094 1.167l-1.065 3.29a1 1 0 0 0 1.236 1.168l3.413-.998a2 2 0 0 1 1.099.092 10 10 0 1 0-4.777-4.719"/>',
    'map-pin' => '<path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/>',
    'clock' => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
    'heart-handshake' => '<path d="M19.414 14.414C21 12.828 22 11.5 22 9.5a5.5 5.5 0 0 0-9.591-3.676.6.6 0 0 1-.818.001A5.5 5.5 0 0 0 2 9.5c0 2.3 1.5 4 3 5.5l5.535 5.362a2 2 0 0 0 2.879.052 2.12 2.12 0 0 0-.004-3 2.124 2.124 0 1 0 3-3 2.124 2.124 0 0 0 3.004 0 2 2 0 0 0 0-2.828l-1.881-1.882a2.41 2.41 0 0 0-3.409 0l-1.71 1.71a2 2 0 0 1-2.828 0 2 2 0 0 1 0-2.828l2.823-2.762"/>',
    'sofa' => '<path d="M20 9V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v3"/><path d="M2 16a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-5a2 2 0 0 0-4 0v1.5a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5V11a2 2 0 0 0-4 0z"/><path d="M4 18v2"/><path d="M20 18v2"/><path d="M12 4v9"/>',
    'search' => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
    'clipboard-list' => '<rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M12 11h4"/><path d="M12 16h4"/><path d="M8 11h.01"/><path d="M8 16h.01"/>',
    'navigation' => '<polygon points="3 11 22 2 13 21 11 13 3 11"/>',
    'arrow-right' => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
    'arrow-down' => '<path d="M12 5v14"/><path d="m19 12-7 7-7-7"/>',
    'check' => '<path d="M20 6 9 17l-5-5"/>',
    'menu' => '<path d="M4 5h16"/><path d="M4 12h16"/><path d="M4 19h16"/>',
    'x' => '<path d="M18 6 6 18"/><path d="m6 6 12 12"/>',
    'instagram' => '<rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>',
    'quote' => '<path d="M16 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h3a1 1 0 0 1 1 1v1a2 2 0 0 1-2 2h-1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a4 4 0 0 0 4-4V5a2 2 0 0 0-2-2z"/><path d="M5 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h3a1 1 0 0 1 1 1v1a2 2 0 0 1-2 2H6a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a4 4 0 0 0 4-4V5a2 2 0 0 0-2-2z"/>',
  ];
  $inner = $map[$name] ?? '';
  return '<svg class="lucide ' . e($class) . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $inner . '</svg>';
}

$waLink = whats($cfg);
$mapsQ  = rawurlencode($cfg['maps_query']);
$hasInsta = !empty($cfg['instagram']);

$nav = [
  ['#experiencia', 'Experiência'],
  ['#tratamentos', 'Tratamentos'],
  ['#resultados', 'Resultados'],
  ['#sobre', 'A Dr(a). Nome Sobrenome'],
  ['#jornada', 'Jornada'],
  ['#localizacao', 'Localização'],
];

$servicosFlat = [];
foreach ($cfg['tratamentos'] as $t) { foreach ($t['itens'] as $it) { $servicosFlat[] = $it; } }

$ldjson = json_encode([
  '@context' => 'https://schema.org',
  '@graph' => [[
    '@type' => ['Dentist', 'LocalBusiness', 'MedicalBusiness'],
    '@id' => '#clinica',
    'name' => $cfg['name_full'],
    'description' => $cfg['seo_desc'],
    'telephone' => $cfg['phone_raw'],
    'url' => '/',
    'priceRange' => '$$$',
    'image' => '/img/hero-clinica.svg',
    'founder' => ['@type' => 'Person', 'name' => $cfg['doctor']],
  ] + ($hasInsta ? ['sameAs' => [$cfg['instagram']]] : []) + [
    'address' => [
      '@type' => 'PostalAddress',
      'streetAddress' => $cfg['address'],
      'addressLocality' => $cfg['city'],
      'addressRegion' => $cfg['state'],
      'addressCountry' => 'BR',
    ],
    'geo' => ['@type' => 'GeoCoordinates', 'latitude' => $cfg['geo_lat'], 'longitude' => $cfg['geo_lng']],
    'aggregateRating' => ['@type' => 'AggregateRating', 'ratingValue' => $cfg['rating_num'], 'reviewCount' => $cfg['reviews'], 'bestRating' => 5],
    'openingHoursSpecification' => [
      ['@type' => 'OpeningHoursSpecification', 'dayOfWeek' => ['Monday','Tuesday','Wednesday','Thursday','Friday'], 'opens' => '09:00', 'closes' => '19:00'],
      ['@type' => 'OpeningHoursSpecification', 'dayOfWeek' => ['Saturday'], 'opens' => '09:00', 'closes' => '13:00'],
    ],
    'availableService' => array_map(fn($s) => ['@type' => 'MedicalProcedure', 'name' => $s], $servicosFlat),
  ]],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= e($cfg['seo_title']) ?></title>
  <meta name="description" content="<?= e($cfg['seo_desc']) ?>" />
  <meta name="author" content="<?= e($cfg['doctor']) ?>" />
  <meta name="theme-color" content="#c9a24b" />
  <link rel="canonical" href="/" />
  <link rel="icon" href="favicon.ico" sizes="48x48" />

  <!-- Open Graph -->
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="<?= e($cfg['name_full']) ?>" />
  <meta property="og:title" content="<?= e($cfg['seo_title']) ?>" />
  <meta property="og:description" content="<?= e($cfg['seo_desc']) ?>" />
  <meta property="og:image" content="/img/hero-clinica.svg" />
  <meta property="og:locale" content="pt_BR" />
  <!-- Twitter Cards -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?= e($cfg['seo_title']) ?>" />
  <meta name="twitter:description" content="<?= e($cfg['seo_desc']) ?>" />
  <meta name="twitter:image" content="/img/hero-clinica.svg" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="css/main.css" />
  <script type="application/ld+json"><?= $ldjson ?></script>
</head>

<body class="min-h-screen bg-background font-sans text-foreground antialiased">

  <!-- Header -->
  <header id="siteHeader" class="fixed inset-x-0 top-0 z-50 transition-all duration-300 py-5">
    <div class="mx-auto grid max-w-7xl grid-cols-[minmax(0,1fr)_auto] items-center gap-4 px-5 lg:px-8">
      <a href="#topo" class="flex min-w-0 items-center gap-3">
        <img src="<?= e($cfg['logo']) ?>" alt="<?= e($cfg['name_full']) ?>" class="size-12 shrink-0 rounded-full object-contain ring-1 ring-gold/40" />
        <span class="min-w-0 leading-tight">
          <span class="block truncate font-display text-xl font-600 tracking-wide text-primary"><?= e($cfg['name']) ?></span>
          <span class="block truncate text-[0.7rem] font-medium tracking-[0.18em] text-gold-deep uppercase"><?= e($cfg['doctor']) ?></span>
        </span>
      </a>

      <div class="flex items-center gap-2">
        <nav class="hidden items-center gap-7 pr-4 xl:flex">
          <?php foreach ($nav as [$href, $label]): ?>
            <a href="<?= e($href) ?>" class="text-sm font-medium text-muted-foreground transition-colors hover:text-gold-deep"><?= e($label) ?></a>
          <?php endforeach; ?>
        </nav>
        <a href="<?= e($waLink) ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-full bg-primary px-5 py-2.5 text-sm font-semibold text-primary-foreground shadow-[var(--shadow-soft)] transition-transform hover:scale-[1.03]">
          <?= icon('message-circle', 'size-4') ?>Agendar avaliação
        </a>
        <button type="button" id="menuToggle" aria-label="Abrir menu" class="grid size-10 place-items-center rounded-full border border-border text-primary xl:hidden">
          <span data-menu-open><?= icon('menu', 'size-5') ?></span>
          <span data-menu-close class="hidden"><?= icon('x', 'size-5') ?></span>
        </button>
      </div>
    </div>

    <nav id="mobileMenu" class="mx-5 mt-3 hidden rounded-3xl border border-border bg-background/95 p-4 shadow-[var(--shadow-soft)] backdrop-blur xl:hidden">
      <?php foreach ($nav as [$href, $label]): ?>
        <a href="<?= e($href) ?>" class="block rounded-2xl px-4 py-3 text-sm font-medium text-foreground transition-colors hover:bg-secondary" data-close-menu><?= e($label) ?></a>
      <?php endforeach; ?>
      <a href="<?= e($waLink) ?>" target="_blank" rel="noopener noreferrer" class="mt-1 block rounded-2xl bg-primary px-4 py-3 text-center text-sm font-semibold text-primary-foreground" data-close-menu>Agendar pelo WhatsApp</a>
    </nav>
  </header>

  <main id="topo">
    <!-- Hero -->
    <section class="relative overflow-hidden pt-28 pb-16 lg:pt-36 lg:pb-24" style="background: var(--gradient-soft)">
      <div aria-hidden="true" class="pointer-events-none absolute -top-40 -right-40 size-[40rem] rounded-full bg-accent-soft blur-3xl"></div>
      <div aria-hidden="true" class="pointer-events-none absolute -bottom-52 -left-40 size-[34rem] rounded-full bg-nude/40 blur-3xl"></div>
      <div class="relative mx-auto grid max-w-7xl items-center gap-12 px-5 lg:grid-cols-[1.05fr_0.95fr] lg:gap-16 lg:px-8">
        <div class="reveal">
          <span class="inline-flex items-center gap-2 rounded-full border border-gold/40 bg-background/80 px-4 py-2 text-xs font-semibold tracking-[0.14em] text-gold-deep uppercase backdrop-blur">
            <?= icon('star', 'size-4 fill-gold text-gold') ?>
            <?= e($cfg['hero_selo']) ?>
          </span>
          <h1 class="mt-7 font-display text-[2.6rem] leading-[1.05] font-600 tracking-tight text-primary sm:text-6xl lg:text-[4.2rem]">
            Seu sorriso, sua beleza e sua <span class="italic text-gold-gradient">confiança</span> em harmonia.
          </h1>
          <p class="mt-7 max-w-xl text-lg leading-relaxed text-muted-foreground">
            <?= e($cfg['hero_subtitulo']) ?>
          </p>

          <div class="mt-9 flex flex-col gap-3 sm:flex-row">
            <a href="<?= e($waLink) ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 rounded-full bg-primary px-7 py-4 text-base font-semibold text-primary-foreground shadow-[var(--shadow-lift)] transition-transform hover:scale-[1.02]">
              <?= icon('sparkles', 'size-5') ?>Agendar avaliação
            </a>
            <a href="#tratamentos" class="inline-flex items-center justify-center gap-2 rounded-full border border-gold/50 bg-background px-7 py-4 text-base font-semibold text-gold-deep transition-colors hover:bg-accent-soft">
              <?= icon('arrow-down', 'size-5') ?>Conhecer tratamentos
            </a>
          </div>

          <div class="mt-9 flex items-center gap-4">
            <div class="flex gap-1 text-gold"><?php for ($k=0;$k<5;$k++) echo icon('star','size-5 fill-gold'); ?></div>
            <span class="text-sm text-muted-foreground"><strong class="font-semibold text-primary"><?= e($cfg['rating']) ?> no Google</strong> · Pacientes encantados</span>
          </div>
        </div>

        <div class="reveal relative" style="transition-delay:120ms">
          <div class="relative overflow-hidden rounded-[3rem] rounded-tr-[6rem] shadow-[var(--shadow-lift)] ring-1 ring-gold/20">
            <img src="img/hero-clinica.svg" alt="Dr(a). Nome Sobrenome na Clínica Odontológica Modelo, ambiente moderno e elegante" width="1200" height="1400" class="h-full w-full object-cover" />
            <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-gradient-to-t from-primary/25 via-transparent to-transparent"></div>
          </div>
          <div class="absolute -bottom-6 -left-4 flex items-center gap-3 rounded-3xl border border-gold/20 bg-background/95 px-5 py-4 shadow-[var(--shadow-soft)] backdrop-blur sm:left-6">
            <span class="grid size-11 shrink-0 place-items-center rounded-2xl bg-accent-soft text-gold-deep"><?= icon('gem', 'size-5') ?></span>
            <span class="min-w-0">
              <span class="block text-sm font-semibold text-primary">Odontologia estética</span>
              <span class="block text-xs text-muted-foreground">Resultados naturais e delicados</span>
            </span>
          </div>
          <div class="absolute -top-4 right-2 hidden items-center gap-2 rounded-full border border-gold/30 bg-background/95 px-4 py-2 text-xs font-semibold text-gold-deep shadow-[var(--shadow-soft)] backdrop-blur sm:flex">
            <?= icon('heart-handshake', 'size-4') ?>Cuidado personalizado
          </div>
        </div>
      </div>
    </section>

    <!-- Faixa de valores -->
    <div class="border-y border-gold/15 bg-cream/60">
      <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-center gap-x-10 gap-y-3 px-5 py-5 text-sm text-muted-foreground lg:px-8">
        <span class="inline-flex items-center gap-2"><?= icon('sparkles','size-4 text-gold-deep') ?> Estética que valoriza você</span>
        <span aria-hidden="true" class="hidden size-1 rounded-full bg-gold/50 sm:block"></span>
        <span class="inline-flex items-center gap-2"><?= icon('heart-handshake','size-4 text-gold-deep') ?> Atendimento humanizado</span>
        <span aria-hidden="true" class="hidden size-1 rounded-full bg-gold/50 sm:block"></span>
        <span class="inline-flex items-center gap-2"><?= icon('gem','size-4 text-gold-deep') ?> Alto padrão em cada detalhe</span>
      </div>
    </div>

    <!-- Experiência -->
    <section id="experiencia" class="mx-auto max-w-7xl px-5 py-20 lg:px-8 lg:py-28">
      <div class="grid items-center gap-12 lg:grid-cols-[1fr_1.05fr] lg:gap-16">
        <div class="reveal order-2 lg:order-1">
          <div class="grid grid-cols-2 gap-4">
            <div class="overflow-hidden rounded-[2rem] rounded-tl-[4rem] shadow-[var(--shadow-soft)] ring-1 ring-gold/15">
              <img src="img/exp-recepcao.svg" alt="Recepção acolhedora da Clínica Odontológica Modelo" loading="lazy" class="h-full w-full object-cover" />
            </div>
            <div class="mt-8 grid gap-4">
              <div class="overflow-hidden rounded-[2rem] shadow-[var(--shadow-soft)] ring-1 ring-gold/15">
                <img src="img/exp-consultorio.svg" alt="Consultório moderno da clínica" loading="lazy" class="h-full w-full object-cover" />
              </div>
              <div class="overflow-hidden rounded-[2rem] rounded-br-[4rem] shadow-[var(--shadow-soft)] ring-1 ring-gold/15">
                <img src="img/exp-detalhe.svg" alt="Detalhes de cuidado no ambiente da clínica" loading="lazy" class="h-full w-full object-cover" />
              </div>
            </div>
          </div>
        </div>
        <div class="reveal order-1 lg:order-2" style="transition-delay:100ms">
          <span class="text-sm font-semibold tracking-[0.2em] text-gold-deep uppercase">A experiência Odonto Modelo</span>
          <h2 class="mt-3 font-display text-4xl font-600 leading-tight tracking-tight text-primary sm:text-5xl"><?= e($cfg['exp_titulo']) ?></h2>
          <p class="mt-5 text-lg leading-relaxed text-muted-foreground"><?= e($cfg['exp_texto']) ?></p>
          <div class="mt-9 grid gap-x-8 gap-y-6 sm:grid-cols-2">
            <?php foreach ($cfg['exp_itens'] as $it): ?>
              <div class="flex items-start gap-3">
                <span class="mt-0.5 grid size-10 shrink-0 place-items-center rounded-2xl bg-accent-soft text-gold-deep"><?= icon($it['icon'], 'size-5') ?></span>
                <span class="min-w-0">
                  <span class="block font-display text-lg font-600 text-primary"><?= e($it['title']) ?></span>
                  <span class="block text-sm leading-relaxed text-muted-foreground"><?= e($it['desc']) ?></span>
                </span>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>

    <!-- Tratamentos -->
    <section id="tratamentos" class="relative overflow-hidden bg-cream/50 py-20 lg:py-28">
      <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="reveal mx-auto max-w-2xl text-center">
          <span class="text-sm font-semibold tracking-[0.2em] text-gold-deep uppercase">Tratamentos</span>
          <h2 class="mt-3 font-display text-4xl font-600 tracking-tight text-primary sm:text-5xl">Cuidados pensados para o seu sorriso</h2>
          <p class="mt-4 text-lg text-muted-foreground">Cada tratamento é conduzido com técnica, delicadeza e um planejamento sob medida — sempre em busca de resultados naturais.</p>
        </div>

        <div class="mt-16 space-y-10 lg:space-y-16">
          <?php foreach ($cfg['tratamentos'] as $i => $t): $flip = $i % 2 === 1; ?>
            <div class="reveal grid items-center gap-8 lg:grid-cols-2 lg:gap-14">
              <div class="<?= $flip ? 'lg:order-2' : '' ?>">
                <div class="group relative overflow-hidden rounded-[2.5rem] <?= $flip ? 'rounded-br-[5rem]' : 'rounded-bl-[5rem]' ?> shadow-[var(--shadow-lift)] ring-1 ring-gold/15">
                  <img src="<?= e($t['img']) ?>" alt="<?= e($t['alt']) ?>" loading="lazy" class="aspect-[4/3] h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                </div>
              </div>
              <div class="<?= $flip ? 'lg:order-1' : '' ?>">
                <span class="inline-flex items-center gap-2 rounded-full bg-accent-soft px-4 py-1.5 text-xs font-semibold tracking-[0.14em] text-gold-deep uppercase"><?= e($t['tag']) ?></span>
                <h3 class="mt-4 font-display text-3xl font-600 tracking-tight text-primary sm:text-4xl"><?= e($t['title']) ?></h3>
                <p class="mt-4 text-base leading-relaxed text-muted-foreground"><?= e($t['desc']) ?></p>
                <ul class="mt-6 flex flex-wrap gap-2.5">
                  <?php foreach ($t['itens'] as $it): ?>
                    <li class="inline-flex items-center gap-2 rounded-full border border-gold/25 bg-background px-4 py-2 text-sm font-medium text-primary">
                      <?= icon('check', 'size-4 text-gold-deep') ?><?= e($it) ?>
                    </li>
                  <?php endforeach; ?>
                </ul>
                <a href="<?= e(whats($cfg, 'Olá, Dr(a). Nome Sobrenome! Gostaria de saber mais sobre ' . $t['tag'] . '.')) ?>" target="_blank" rel="noopener noreferrer" class="mt-7 inline-flex items-center gap-2 rounded-full bg-whatsapp px-6 py-3.5 text-sm font-semibold text-whatsapp-foreground shadow-[var(--shadow-soft)] transition-transform hover:scale-[1.03]">
                  <?= icon('message-circle', 'size-4') ?>Falar sobre <?= e($t['tag']) ?>
                </a>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Antes e Depois -->
    <section id="resultados" class="mx-auto max-w-7xl px-5 py-20 lg:px-8 lg:py-28">
      <div class="reveal mx-auto max-w-2xl text-center">
        <span class="text-sm font-semibold tracking-[0.2em] text-gold-deep uppercase">Antes &amp; Depois</span>
        <h2 class="mt-3 font-display text-4xl font-600 tracking-tight text-primary sm:text-5xl"><?= e($cfg['ad_titulo']) ?></h2>
        <p class="mt-4 text-lg text-muted-foreground"><?= e($cfg['ad_texto']) ?></p>
      </div>

      <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($cfg['ad_casos'] as $i => $c): ?>
          <div class="reveal" style="transition-delay:<?= ($i % 3) * 90 ?>ms">
            <figure class="group relative overflow-hidden rounded-[2rem] border border-gold/15 bg-muted shadow-[var(--shadow-soft)]">
              <img src="<?= e($c['img']) ?>" alt="<?= e($c['alt']) ?>" loading="lazy" class="aspect-[4/3] h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
              <figcaption class="absolute inset-x-0 bottom-0 flex items-center justify-between gap-2 bg-gradient-to-t from-primary/80 to-transparent px-5 pt-10 pb-4">
                <span class="text-sm font-semibold text-primary-foreground"><?= e($c['label']) ?></span>
                <span class="rounded-full bg-background/90 px-3 py-1 text-[0.65rem] font-semibold tracking-wide text-gold-deep uppercase">Em breve</span>
              </figcaption>
            </figure>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="reveal mt-10 text-center">
        <a href="<?= e(whats($cfg, 'Olá, Dr(a). Nome Sobrenome! Gostaria de ver casos e resultados de tratamentos.')) ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-full border border-gold/40 bg-background px-7 py-3.5 text-base font-semibold text-gold-deep transition-colors hover:bg-accent-soft">
          <?= icon('message-circle', 'size-5') ?>Quero conhecer resultados
        </a>
      </div>
    </section>

    <!-- Sobre a Dr(a). Nome Sobrenome -->
    <section id="sobre" class="relative overflow-hidden bg-cream/50 py-20 lg:py-28">
      <div aria-hidden="true" class="pointer-events-none absolute -top-32 right-0 size-[30rem] rounded-full bg-accent-soft blur-3xl"></div>
      <div class="relative mx-auto max-w-7xl px-5 lg:px-8">
        <div class="grid items-center gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:gap-16">
          <div class="reveal">
            <div class="relative overflow-hidden rounded-[3rem] rounded-tl-[6rem] shadow-[var(--shadow-lift)] ring-1 ring-gold/20">
              <img src="img/sobre-clinica.svg" alt="Dr(a). Nome Sobrenome, responsável pela Clínica Odontológica Modelo" loading="lazy" width="1000" height="1200" class="h-full w-full object-cover" />
            </div>
          </div>
          <div class="reveal" style="transition-delay:100ms">
            <span class="text-sm font-semibold tracking-[0.2em] text-gold-deep uppercase">A profissional</span>
            <h2 class="mt-3 font-display text-4xl font-600 tracking-tight text-primary sm:text-5xl"><?= e($cfg['sobre_titulo']) ?></h2>
            <p class="mt-2 font-display text-xl italic text-gold-deep"><?= e($cfg['sobre_sub']) ?></p>
            <p class="mt-6 leading-relaxed text-muted-foreground"><?= e($cfg['sobre_p1']) ?></p>
            <p class="mt-4 leading-relaxed text-muted-foreground"><?= e($cfg['sobre_p2']) ?></p>
            <dl class="mt-8 grid grid-cols-3 gap-5 border-t border-gold/20 pt-8">
              <?php foreach ($cfg['sobre_stats'] as $s): ?>
                <div>
                  <dt class="font-display text-3xl font-700 text-gold-deep"><?= e($s['v']) ?></dt>
                  <dd class="mt-1 text-sm text-muted-foreground"><?= e($s['l']) ?></dd>
                </div>
              <?php endforeach; ?>
            </dl>
            <a href="<?= e(whats($cfg, 'Olá, Dr(a). Nome Sobrenome! Gostaria de conversar sobre um tratamento.')) ?>" target="_blank" rel="noopener noreferrer" class="mt-9 inline-flex items-center gap-2 rounded-full bg-primary px-7 py-4 text-base font-semibold text-primary-foreground shadow-[var(--shadow-soft)] transition-transform hover:scale-[1.02]">
              <?= icon('message-circle', 'size-5') ?>Conversar com a Dr(a). Nome Sobrenome
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Jornada do paciente -->
    <section id="jornada" class="mx-auto max-w-7xl px-5 py-20 lg:px-8 lg:py-28">
      <div class="reveal mx-auto max-w-2xl text-center">
        <span class="text-sm font-semibold tracking-[0.2em] text-gold-deep uppercase">Sua jornada</span>
        <h2 class="mt-3 font-display text-4xl font-600 tracking-tight text-primary sm:text-5xl"><?= e($cfg['jornada_titulo']) ?></h2>
        <p class="mt-4 text-lg text-muted-foreground">Um caminho simples e acolhedor, pensado para que você se sinta cuidado em cada etapa.</p>
      </div>

      <div class="mt-16 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
        <?php foreach ($cfg['jornada'] as $i => $s): ?>
          <div class="reveal relative" style="transition-delay:<?= $i * 100 ?>ms">
            <div class="relative h-full overflow-hidden rounded-[2rem] border border-gold/15 bg-card p-7 shadow-[var(--shadow-soft)]">
              <span aria-hidden="true" class="absolute -top-3 right-5 font-display text-7xl font-700 text-accent-soft"><?= e($s['n']) ?></span>
              <span class="relative grid size-12 place-items-center rounded-2xl bg-primary text-primary-foreground"><?= icon($s['icon'], 'size-5') ?></span>
              <h3 class="relative mt-5 font-display text-xl font-600 leading-snug text-primary"><?= e($s['title']) ?></h3>
              <p class="relative mt-2 text-sm leading-relaxed text-muted-foreground"><?= e($s['desc']) ?></p>
            </div>
            <?php if ($i < count($cfg['jornada']) - 1): ?>
              <span aria-hidden="true" class="absolute top-1/2 -right-3 z-10 hidden size-6 -translate-y-1/2 place-items-center rounded-full bg-gold text-white lg:grid"><?= icon('arrow-right', 'size-3.5') ?></span>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Depoimentos -->
    <section id="depoimentos" class="relative overflow-hidden bg-cream/50 py-20 lg:py-28">
      <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="reveal mx-auto max-w-2xl text-center">
          <span class="text-sm font-semibold tracking-[0.2em] text-gold-deep uppercase">Depoimentos</span>
          <h2 class="mt-3 font-display text-4xl font-600 tracking-tight text-primary sm:text-5xl">Histórias de quem sorri com a gente</h2>
          <p class="mt-4 text-lg text-muted-foreground">Nota <?= e($cfg['rating']) ?> no Google. O carinho dos nossos pacientes é o nosso maior orgulho.</p>
        </div>

        <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
          <?php foreach ($cfg['depoimentos'] as $i => $t): ?>
            <div class="reveal" style="transition-delay:<?= ($i % 3) * 90 ?>ms">
              <figure class="surface-card relative h-full p-8">
                <span aria-hidden="true" class="absolute right-7 top-7 text-gold/30"><?= icon('quote', 'size-9') ?></span>
                <div class="flex gap-1 text-gold">
                  <?php for ($k = 0; $k < 5; $k++) echo icon('star', 'size-4 fill-gold'); ?>
                </div>
                <blockquote class="mt-5 text-[0.95rem] leading-relaxed text-foreground">“<?= e($t['text']) ?>”</blockquote>
                <figcaption class="mt-7 flex min-w-0 items-center gap-3 border-t border-gold/15 pt-5">
                  <span class="grid size-12 shrink-0 place-items-center rounded-full bg-gradient-to-br from-gold to-gold-deep font-display text-base font-600 text-white"><?= e($t['initials']) ?></span>
                  <span class="min-w-0">
                    <span class="block truncate font-display text-lg font-600 text-primary"><?= e($t['name']) ?></span>
                    <span class="block truncate text-xs tracking-wide text-gold-deep uppercase"><?= e($t['role']) ?></span>
                  </span>
                </figcaption>
              </figure>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- CTA de conversão -->
    <section class="relative overflow-hidden py-20 lg:py-28" style="background: var(--gradient-deep)">
      <div aria-hidden="true" class="pointer-events-none absolute -bottom-32 -left-24 size-[32rem] rounded-full bg-white/15 blur-3xl"></div>
      <div aria-hidden="true" class="pointer-events-none absolute -top-32 -right-24 size-[28rem] rounded-full bg-primary/20 blur-3xl"></div>
      <div class="relative mx-auto max-w-3xl px-5 text-center lg:px-8">
        <span class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-4 py-2 text-xs font-semibold tracking-[0.14em] text-white uppercase backdrop-blur">
          <?= icon('sparkles', 'size-4') ?>Sua transformação começa aqui
        </span>
        <h2 class="mt-6 font-display text-4xl font-600 leading-tight tracking-tight text-white sm:text-5xl"><?= e($cfg['cta_titulo']) ?></h2>
        <p class="mx-auto mt-5 max-w-xl text-lg text-white/90"><?= e($cfg['cta_sub']) ?></p>
        <a href="<?= e($waLink) ?>" target="_blank" rel="noopener noreferrer" class="mt-10 inline-flex items-center gap-3 rounded-full bg-white px-9 py-5 text-lg font-semibold text-gold-deep shadow-[var(--shadow-lift)] transition-transform hover:scale-[1.03]">
          <?= icon('message-circle', 'size-6') ?>Falar no WhatsApp
        </a>
      </div>
    </section>

    <!-- Localização -->
    <section id="localizacao" class="mx-auto max-w-7xl px-5 py-20 lg:px-8 lg:py-28">
      <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:gap-14">
        <div class="reveal">
          <span class="text-sm font-semibold tracking-[0.2em] text-gold-deep uppercase">Localização</span>
          <h2 class="mt-3 font-display text-4xl font-600 tracking-tight text-primary sm:text-5xl">Venha nos conhecer em <?= e($cfg['city']) ?></h2>
          <ul class="mt-8 space-y-5 text-sm">
            <li class="flex gap-3">
              <?= icon('map-pin', 'mt-0.5 size-5 shrink-0 text-gold-deep') ?>
              <span class="text-muted-foreground"><?= e($cfg['name_full']) ?><br /><?= e($cfg['address']) ?><br /><?= e($cfg['city']) ?> - <?= e($cfg['state']) ?></span>
            </li>
            <li class="flex gap-3">
              <?= icon('clock', 'mt-0.5 size-5 shrink-0 text-gold-deep') ?>
              <span class="text-muted-foreground"><?= e($cfg['horario_semana']) ?><br /><?= e($cfg['horario_sabado']) ?></span>
            </li>
            <li class="flex gap-3">
              <?= icon('phone', 'mt-0.5 size-5 shrink-0 text-gold-deep') ?>
              <a href="tel:<?= e($cfg['phone_raw']) ?>" class="font-semibold text-primary hover:underline"><?= e($cfg['phone']) ?></a>
            </li>
          </ul>
          <div class="mt-8 flex flex-col gap-3 sm:flex-row">
            <a href="https://www.google.com/maps/dir/?api=1&destination=<?= $mapsQ ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 rounded-full bg-primary px-7 py-4 text-base font-semibold text-primary-foreground transition-transform hover:scale-[1.02]">
              <?= icon('navigation', 'size-5') ?>Como chegar
            </a>
            <a href="<?= e($waLink) ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 rounded-full border border-gold/40 bg-background px-7 py-4 text-base font-semibold text-gold-deep transition-colors hover:bg-accent-soft">
              <?= icon('message-circle', 'size-5') ?>Agendar avaliação
            </a>
          </div>
        </div>

        <div class="reveal" style="transition-delay:100ms">
          <div class="overflow-hidden rounded-[2.5rem] border border-gold/20 shadow-[var(--shadow-soft)]">
            <iframe title="Mapa — <?= e($cfg['name_full']) ?>" src="https://www.google.com/maps?q=<?= $mapsQ ?>&output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="h-[440px] w-full border-0"></iframe>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Rodapé -->
  <footer class="border-t border-gold/20 bg-cream/60">
    <div class="mx-auto grid max-w-7xl gap-10 px-5 py-14 sm:grid-cols-2 lg:grid-cols-4 lg:px-8">
      <div class="sm:col-span-2 lg:col-span-1">
        <div class="flex items-center gap-3">
          <img src="<?= e($cfg['logo']) ?>" alt="<?= e($cfg['name_full']) ?>" class="size-11 rounded-full object-contain ring-1 ring-gold/40" />
          <span class="font-display text-xl font-600 text-primary"><?= e($cfg['name']) ?></span>
        </div>
        <p class="mt-4 text-sm leading-relaxed text-muted-foreground">Odontologia estética de alto padrão em <?= e($cfg['city']) ?>. Beleza, confiança e cuidado em cada sorriso.</p>
      </div>
      <div>
        <h3 class="text-sm font-semibold tracking-wide text-primary uppercase">Contato</h3>
        <ul class="mt-4 space-y-2 text-sm text-muted-foreground">
          <li><a href="tel:<?= e($cfg['phone_raw']) ?>" class="hover:text-gold-deep">Telefone: <?= e($cfg['phone']) ?></a></li>
          <li><a href="<?= e($waLink) ?>" target="_blank" rel="noopener noreferrer" class="hover:text-gold-deep">WhatsApp: <?= e($cfg['phone']) ?></a></li>
          <?php if ($hasInsta): ?>
            <li><a href="<?= e($cfg['instagram']) ?>" target="_blank" rel="noopener noreferrer" class="hover:text-gold-deep">Instagram</a></li>
          <?php endif; ?>
        </ul>
      </div>
      <div>
        <h3 class="text-sm font-semibold tracking-wide text-primary uppercase">Endereço &amp; Horário</h3>
        <p class="mt-4 text-sm text-muted-foreground"><?= e($cfg['address']) ?><br /><?= e($cfg['city']) ?> - <?= e($cfg['state']) ?></p>
        <p class="mt-3 text-sm text-muted-foreground"><?= e($cfg['horario_semana']) ?><br /><?= e($cfg['horario_sabado']) ?></p>
      </div>
      <div>
        <h3 class="text-sm font-semibold tracking-wide text-primary uppercase">Agende agora</h3>
        <p class="mt-4 text-sm text-muted-foreground">Dê o primeiro passo para o sorriso que você merece.</p>
        <div class="mt-4 flex gap-3">
          <?php if ($hasInsta): ?>
            <a href="<?= e($cfg['instagram']) ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="grid size-11 place-items-center rounded-2xl border border-gold/30 bg-background text-gold-deep transition-colors hover:bg-accent-soft"><?= icon('instagram', 'size-5') ?></a>
          <?php endif; ?>
          <a href="<?= e($waLink) ?>" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp" class="grid size-11 place-items-center rounded-2xl bg-whatsapp text-whatsapp-foreground"><?= icon('message-circle', 'size-5') ?></a>
        </div>
      </div>
    </div>
    <div class="border-t border-gold/15 py-6 text-center text-xs text-muted-foreground">
      © <?= date('Y') ?> <?= e($cfg['name_full']) ?>. Todos os direitos reservados.
    </div>
  </footer>

  <!-- Botão flutuante WhatsApp -->
  <a href="<?= e($waLink) ?>" target="_blank" rel="noopener noreferrer" aria-label="Agendar pelo WhatsApp" class="fixed right-5 bottom-5 z-50 inline-flex items-center gap-2 rounded-full bg-whatsapp px-5 py-4 font-semibold text-whatsapp-foreground shadow-[var(--shadow-lift)] transition-transform hover:scale-105">
    <?= icon('message-circle', 'size-6') ?><span class="hidden sm:inline">Agendar no WhatsApp</span>
  </a>

  <script src="js/app.js"></script>
</body>
</html>
