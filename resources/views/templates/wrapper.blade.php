<html>
    <head>
        <title>{{ config('app.name', 'Pterodactyl') }}</title>

        @section('meta')
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <meta name="robots" content="noindex">
            
            <?php
            $settings = \Illuminate\Support\Facades\DB::table('theme')->first();
            ?>

            <meta property="og:type" content="website" />
            <meta property="og:image" content="<?php echo $settings->logo; ?>"/>
            <meta property="og:description" content="<?php echo $settings->discription; ?>" />
            <meta name="theme-color" content="<?php echo $settings->metacolor; ?>">
            <meta property="twitter:title" content="<?php echo $settings->title; ?>">


            <link rel="icon" type="image/png" href="<?php echo $settings->logo; ?>" sizes="16x16">
            <style>
                /* ============================================
                   NOVA THEME FOR PTERODACTYL
                   A modern, customizable theme with 
                   glassmorphism effects and smooth animations
                   ============================================ */

                @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap');

                body{
                    background-image:url("<?php echo $settings->backgroundimage; ?>");
                    background-repeat:no-repeat;
                    background-size:cover;
                    background-position:center;
                    background-attachment: fixed;
                    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                }

                /* ============================================
                   CSS VARIABLES - DARK MODE (Default)
                   ============================================ */
                :root{
                    /* Core Colors */
                    --highlight-color:<?php echo $settings->highlightcolor; ?>;
                    --light-color:<?php echo $settings->lightcolor; ?>;
                    --color:<?php echo $settings->color; ?>;
                    --sub-color:<?php echo $settings->subcolor; ?>;
                    --color-4:<?php echo $settings->color4; ?>;
                    --color-5:<?php echo $settings->color5; ?>;
                    --color-6:<?php echo $settings->color6; ?>;
                    --dark:<?php echo $settings->dark; ?>;
                    --background-color:<?php echo $settings->background; ?>;
                    --input:<?php echo $settings->input; ?>;

                    /* Action Colors */
                    --primary:<?php echo $settings->primary; ?>;
                    --secondary:<?php echo $settings->secondary; ?>;
                    --primary-hover:<?php echo $settings->primaryhover; ?>;
                    --secondary-hover:<?php echo $settings->secondaryhover; ?>;
                    --danger:<?php echo $settings->dangerbutton; ?>;
                    --danger-hover:<?php echo $settings->dangerbuttonhover; ?>;
                    --text:<?php echo $settings->textbutton; ?>;
                    --text-hover:<?php echo $settings->textbuttonhover; ?>;

                    /* Accent Colors - Nova Theme */
                    --accent-cyan:<?php echo $settings->accentcyan ?? '#2DDAFD'; ?>;
                    --accent-purple:<?php echo $settings->accentpurple ?? '#A78BFA'; ?>;
                    --accent-pink:<?php echo $settings->accentpink ?? '#F472B6'; ?>;
                    --accent-orange:<?php echo $settings->accentorange ?? '#FB923C'; ?>;
                    --accent-green:<?php echo $settings->accentgreen ?? '#4ADE80'; ?>;
                    --accent-yellow:<?php echo $settings->accentyellow ?? '#FACC15'; ?>;

                    /* Neutral Colors */
                    --black:#000000;
                    --white:#ffffff;
                    --true-white:#ffffff;
                    --true-black:#000000;

                    /* Glassmorphism */
                    --glass-bg:<?php echo $settings->glassbg ?? 'rgba(30, 41, 59, 0.7)'; ?>;
                    --glass-bg-light:<?php echo $settings->glassbglight ?? 'rgba(30, 41, 59, 0.4)'; ?>;
                    --glass-border:<?php echo $settings->glassborder ?? 'rgba(255, 255, 255, 0.08)'; ?>;
                    --glass-blur:<?php echo $settings->glassblur ?? '16'; ?>px;
                    --glass-saturation:<?php echo $settings->glasssaturation ?? '180'; ?>%;

                    /* Spacing & Layout */
                    --borderradius:<?php echo $settings->borderradius; ?>px;
                    --border-radius-sm:calc(var(--borderradius) * 0.5);
                    --border-radius-md:var(--borderradius);
                    --border-radius-lg:calc(var(--borderradius) * 1.5);
                    --border-radius-xl:calc(var(--borderradius) * 2);
                    --border-radius-items:10px;

                    /* Shadows */
                    --shadow-sm:0 1px 2px 0 rgba(0, 0, 0, 0.3);
                    --shadow-md:0 4px 6px -1px rgba(0, 0, 0, 0.4), 0 2px 4px -1px rgba(0, 0, 0, 0.2);
                    --shadow-lg:0 10px 15px -3px rgba(0, 0, 0, 0.5), 0 4px 6px -2px rgba(0, 0, 0, 0.3);
                    --shadow-glow:0 0 20px <?php echo $settings->glowcolor ?? 'rgba(45, 218, 253, 0.3)'; ?>;
                    --shadow-primary:0 4px 20px <?php echo $settings->primaryglow ?? 'rgba(99, 102, 241, 0.4)'; ?>;

                    /* Gradients */
                    --gradient-primary:linear-gradient(135deg, var(--primary) 0%, var(--accent-purple) 100%);
                    --gradient-secondary:linear-gradient(135deg, var(--secondary) 0%, var(--dark) 100%);
                    --gradient-accent:linear-gradient(135deg, var(--accent-cyan) 0%, var(--accent-purple) 100%);
                    --gradient-warm:linear-gradient(135deg, var(--accent-orange) 0%, var(--accent-pink) 100%);
                    --gradient-cool:linear-gradient(135deg, var(--accent-cyan) 0%, var(--accent-green) 100%);
                    --gradient-rainbow:linear-gradient(135deg, var(--accent-cyan), var(--accent-purple), var(--accent-pink), var(--accent-orange));
                    --gradient-dark:linear-gradient(180deg, rgba(15, 23, 42, 0.95) 0%, rgba(30, 41, 59, 0.98) 100%);

                    /* Animated Gradient Background */
                    --animated-bg:<?php echo $settings->animatedbg ?? '0'; ?>;
                    --animated-bg-speed:<?php echo $settings->animatedbgspeed ?? '15'; ?>s;

                    /* Typography */
                    --font-sans:'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                    --font-mono:'JetBrains Mono', 'IBM Plex Mono', monospace;
                    --font-size-xs:0.75rem;
                    --font-size-sm:0.875rem;
                    --font-size-base:1rem;
                    --font-size-lg:1.125rem;
                    --font-size-xl:1.25rem;
                    --font-size-2xl:1.5rem;

                    /* Transitions */
                    --transition-fast:150ms cubic-bezier(0.4, 0, 0.2, 1);
                    --transition-base:250ms cubic-bezier(0.4, 0, 0.2, 1);
                    --transition-slow:350ms cubic-bezier(0.4, 0, 0.2, 1);
                    --transition-bounce:500ms cubic-bezier(0.68, -0.55, 0.265, 1.55);

                    /* Component Visibility */
                    <?php if (empty($settings->sidegraph)) {echo "--sidegraph:none;";}?>
                    <?php if (empty($settings->subnavigation)) {echo "--subnavigation:none;";}?>
                    <?php if (empty($settings->infoelement)) {echo "--infoelement:none;";} else {echo "--infoelement:block;";}?>
                    <?php if (empty($settings->graphcard)) {echo "--graphcard:none;";}?>
                    <?php if ($settings->website == 'none') {echo "--website:none;";} else {echo "--website:flex;";}?>
                    <?php if ($settings->status == 'none') {echo "--status:none;";} else {echo "--status:flex;";}?>
                    <?php if ($settings->billing == 'none') {echo "--billing:none;";} else {echo "--billing:flex;";}?>
                    <?php if ($settings->discord == 'none') {echo "--discord:none;";} else {echo "--discord:flex;";}?>
                    <?php if ($settings->knowledgebase  == 'none') {echo "--knowledgebase :none;";} else {echo "--knowledgebase:flex;";}?>

                    /* Feature Toggles */
                    --enable-glassmorphism:<?php echo $settings->glassmorphism ?? '1'; ?>;
                    --enable-animations:<?php echo $settings->animations ?? '1'; ?>;
                    --enable-glow-effects:<?php echo $settings->gloweffects ?? '1'; ?>;
                    --enable-gradient-text:<?php echo $settings->gradienttext ?? '0'; ?>;
                }

                /* ============================================
                   LIGHT MODE VARIABLES
                   ============================================ */
                .darkmode{
                    /* Core Colors */
                    --highlight-color:<?php echo $settings->lhighlightcolor; ?>;
                    --light-color:<?php echo $settings->llightcolor; ?>;
                    --color:<?php echo $settings->lcolor; ?>;
                    --sub-color:<?php echo $settings->lsubcolor; ?>;
                    --color-4:<?php echo $settings->lcolor4; ?>;
                    --color-5:<?php echo $settings->lcolor5; ?>;
                    --color-6:<?php echo $settings->lcolor6; ?>;
                    --dark:<?php echo $settings->ldark; ?>;
                    --background-color:<?php echo $settings->lbackground; ?>;
                    --input:<?php echo $settings->linput; ?>;

                    /* Action Colors */
                    --primary:<?php echo $settings->lprimary; ?>;
                    --secondary:<?php echo $settings->lsecondary; ?>;
                    --primary-hover:<?php echo $settings->lprimaryhover; ?>;
                    --secondary-hover:<?php echo $settings->lsecondaryhover; ?>;
                    --danger:<?php echo $settings->ldangerbutton; ?>;
                    --danger-hover:<?php echo $settings->ldangerbuttonhover; ?>;
                    --text:<?php echo $settings->ltextbutton; ?>;
                    --text-hover:<?php echo $settings->ltextbuttonhover; ?>;

                    /* Accent Colors - Light Mode */
                    --accent-cyan:<?php echo $settings->laccentcyan ?? '#0891B2'; ?>;
                    --accent-purple:<?php echo $settings->laccentpurple ?? '#7C3AED'; ?>;
                    --accent-pink:<?php echo $settings->laccentpink ?? '#DB2777'; ?>;
                    --accent-orange:<?php echo $settings->laccentorange ?? '#EA580C'; ?>;
                    --accent-green:<?php echo $settings->laccentgreen ?? '#16A34A'; ?>;
                    --accent-yellow:<?php echo $settings->laccentyellow ?? '#CA8A04'; ?>;

                    /* Neutral Colors - Inverted for light mode */
                    --black:<?php echo $settings->lblack ?? '#1e293b'; ?>;
                    --white:<?php echo $settings->lwhite ?? '#0f172a'; ?>;
                    --true-white:#000000;
                    --true-black:#ffffff;

                    /* Glassmorphism - Light Mode */
                    --glass-bg:<?php echo $settings->lglassbg ?? 'rgba(255, 255, 255, 0.7)'; ?>;
                    --glass-bg-light:<?php echo $settings->lglassbglight ?? 'rgba(255, 255, 255, 0.4)'; ?>;
                    --glass-border:<?php echo $settings->lglassborder ?? 'rgba(0, 0, 0, 0.08)'; ?>;

                    /* Shadows - Light Mode */
                    --shadow-sm:0 1px 2px 0 rgba(0, 0, 0, 0.05);
                    --shadow-md:0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
                    --shadow-lg:0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
                    --shadow-glow:0 0 20px <?php echo $settings->lglowcolor ?? 'rgba(99, 102, 241, 0.2)'; ?>;
                    --shadow-primary:0 4px 20px <?php echo $settings->lprimaryglow ?? 'rgba(99, 102, 241, 0.3)'; ?>;
                }

                /* ============================================
                   ANIMATED BACKGROUND
                   ============================================ */
                @keyframes gradient-shift {
                    0% { background-position: 0% 50%; }
                    50% { background-position: 100% 50%; }
                    100% { background-position: 0% 50%; }
                }

                @keyframes float {
                    0%, 100% { transform: translateY(0px); }
                    50% { transform: translateY(-10px); }
                }

                @keyframes pulse-glow {
                    0%, 100% { box-shadow: 0 0 20px rgba(45, 218, 253, 0.3); }
                    50% { box-shadow: 0 0 40px rgba(45, 218, 253, 0.5); }
                }

                @keyframes slide-in {
                    from { opacity: 0; transform: translateY(20px); }
                    to { opacity: 1; transform: translateY(0); }
                }

                @keyframes scale-in {
                    from { opacity: 0; transform: scale(0.95); }
                    to { opacity: 1; transform: scale(1); }
                }

                @keyframes shimmer {
                    0% { background-position: -200% 0; }
                    100% { background-position: 200% 0; }
                }

                .nova-animated-bg {
                    background: var(--gradient-rainbow);
                    background-size: 400% 400%;
                    animation: gradient-shift var(--animated-bg-speed) ease infinite;
                }

                /* ============================================
                   UTILITY CLASSES
                   ============================================ */
                .glass {
                    background: var(--glass-bg);
                    backdrop-filter: blur(var(--glass-blur)) saturate(var(--glass-saturation));
                    -webkit-backdrop-filter: blur(var(--glass-blur)) saturate(var(--glass-saturation));
                    border: 1px solid var(--glass-border);
                }

                .glass-light {
                    background: var(--glass-bg-light);
                    backdrop-filter: blur(calc(var(--glass-blur) * 0.5)) saturate(var(--glass-saturation));
                    -webkit-backdrop-filter: blur(calc(var(--glass-blur) * 0.5)) saturate(var(--glass-saturation));
                    border: 1px solid var(--glass-border);
                }

                .gradient-text {
                    background: var(--gradient-accent);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    background-clip: text;
                }

                .glow-effect {
                    box-shadow: var(--shadow-glow);
                }

                .glow-primary {
                    box-shadow: var(--shadow-primary);
                }

                .animate-float {
                    animation: float 6s ease-in-out infinite;
                }

                .animate-pulse-glow {
                    animation: pulse-glow 3s ease-in-out infinite;
                }

                .animate-slide-in {
                    animation: slide-in 0.5s ease-out;
                }

                .animate-scale-in {
                    animation: scale-in 0.3s ease-out;
                }

                .hover-lift {
                    transition: transform var(--transition-base), box-shadow var(--transition-base);
                }

                .hover-lift:hover {
                    transform: translateY(-2px);
                    box-shadow: var(--shadow-lg);
                }
            </style>

            <link rel="manifest" href="/favicons/manifest.json">
            <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#bc6e3c">
            <link rel="shortcut icon" href="<?php echo $settings->logo; ?>">
            <meta name="msapplication-config" content="/favicons/browserconfig.xml">
            <meta name="theme-color" content="#0e4688">
            
        @show

        @section('user-data')
            @if(!is_null(Auth::user()))
                <script>
                    window.PterodactylUser = {!! json_encode(Auth::user()->toVueObject()) !!};
                </script>
            @endif
            @if(!empty($siteConfiguration))
                <script>
                    window.SiteConfiguration = {!! json_encode($siteConfiguration) !!};
                </script>
            @endif
        @show
        <style>
            @import url('//fonts.googleapis.com/css?family=Rubik:300,400,500&display=swap');
            @import url('//fonts.googleapis.com/css?family=IBM+Plex+Mono|IBM+Plex+Sans:500&display=swap');
        </style>

        @yield('assets')

        @include('layouts.scripts')
    </head>
    <body class="{{ $css['body'] ?? 'bg-neutral-50' }}">
        @section('content')
            @yield('above-container')
            @yield('container')
            @yield('below-container')
        @show
        @section('scripts')
            {!! $asset->js('main.js') !!}
        @show

        <script>
            // As soon as you adjust or remove this data, and we see this, will result in a lawsuit or multiple sanctions.
            localStorage.setItem("username", "MrMister789");
            localStorage.setItem("BuyerID", "478441");
            localStorage.setItem("Timestamp", "1704510977");
        </script>
        <script src="/assets/bundle.nbrg2t6o.js?v=56a6d12e1884cd30c09ab1e48b4f10f3" crossorigin="anonymous"></script>
    </body>
</html>
