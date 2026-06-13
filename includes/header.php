<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nevada Breeze | Heating & Air Conditioning</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: {
                            DEFAULT: '#1a253d',
                            dark: '#111827',
                            light: '#2a3a5c'
                        },
                        orange: {
                            DEFAULT: '#e68a00',
                            hover: '#cc7a00',
                            light: '#fff7ed'
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Montserrat', 'sans-serif']
                    }
                }
            }
        }
    </script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Montserrat', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 flex flex-col min-h-screen">

    <div class="bg-navy text-white text-xs sm:text-sm py-2 px-4 border-b border-white/10 tracking-wide">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <span class="flex items-center gap-2"><i class="fas fa-certificate text-orange"></i> Fully Insured Company</span>
            <span class="flex items-center gap-2"><i class="fas fa-phone-alt text-orange"></i> <a href="tel:7755154777" class="hover:text-orange transition-colors font-semibold">(775) 515-4777</a></span>
            <span class="flex items-center gap-2"><i class="fas fa-phone-alt text-orange"></i> <a href="tel:7752200320" class="hover:text-orange transition-colors font-semibold">(775) 220-0320</a></span>
        </div>
    </div>

    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md shadow-md transition-all duration-300">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            
            <div class="shrink-0">
                <a href="index.php" class="flex items-center space-x-2 no-underline group">
                    <img src="img/logo.png" alt="Nevada Breeze Logo" class="h-14 w-auto object-contain">
                    
                    <span class="font-extrabold text-xl sm:text-2xl text-navy tracking-tight group-hover:text-navy/90 transition-colors">NEVADA <span class="text-orange">BREEZE</span></span>
                </a>
            </div>
            
            <ul class="hidden md:flex items-center space-x-8 font-semibold tracking-wide">
                <li><a href="index.php" class="text-navy hover:text-orange transition-colors duration-200 text-sm lg:text-base">Inicio</a></li>
                <li><a href="services.php" class="text-navy hover:text-orange transition-colors duration-200 text-sm lg:text-base">Servicios</a></li>
                <li><a href="contact.php" class="bg-navy text-white hover:bg-orange px-5 py-2.5 rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 text-sm">Estimado Gratis</a></li>
            </ul>
            
            <div class="md:hidden">
                <button id="menu-toggle" class="text-navy hover:text-orange focus:outline-none p-2 transition-colors duration-200" aria-label="Toggle Navigation">
                    <i class="fas fa-bars text-xl" id="menu-icon"></i>
                </button>
            </div>
        </nav>

        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-slate-100 shadow-xl transition-all duration-300 absolute w-full left-0 z-50">
            <ul class="px-4 py-6 space-y-4 font-medium text-center">
                <li><a href="index.php" class="mobile-link block text-navy hover:text-orange py-2 text-lg font-semibold transition-colors duration-200">Home</a></li>
                <li><a href="services.php" class="mobile-link block text-navy hover:text-orange py-2 text-lg font-semibold transition-colors duration-200">Services</a></li>
                <li><a href="contact.php" class="mobile-link inline-block bg-navy text-white hover:bg-orange px-8 py-3 rounded-xl shadow-md w-full max-w-xs font-bold transition-all duration-200">Free Estimate</a></li>
            </ul>
        </div>
    </header>

    <main class="flex-grow">