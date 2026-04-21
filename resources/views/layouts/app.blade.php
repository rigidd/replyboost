<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReplyBoost - AI Responses for Google Reviews</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3 {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body class="h-full">
    <div class="min-h-full">
        <nav class="bg-white border-b border-slate-200 fixed w-full z-999">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center justify-between w-full h-16">
                        <a href="{{ route('index') }}" class="shrink-0 flex items-center">
                            <span class="text-2xl font-black bg-linear-to-r from-indigo-600 to-violet-600 bg-clip-text text-transparent tracking-tight">ReplyBoost</span>
                        </a>

                        <div class="flex items-center gap-6">
                            @auth
                                <a href="{{ route('dashboard') }}" class="text-sm font-bold text-slate-600 hover:text-indigo-600 transition-colors">Dashboard</a>
                                <form action="{{ route('logout') }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-[10px] font-black text-slate-400 hover:text-red-500 uppercase tracking-widest transition-colors cursor-pointer">Déconnexion</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-sm font-bold text-slate-600 hover:text-indigo-600 transition-colors">Connexion</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <main class="pt-16">
            @yield('content')
        </main>

        <footer class="border-t border-slate-200">
            <div class="max-w-6xl mx-auto px-6 py-10">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                    <!-- Brand -->
                    <div>
                        <h3 class="text-lg font-semibold">ReplyBoost</h3>
                        <p class="text-sm text-gray-600 mt-2">
                            Générez des réponses professionnelles à vos avis clients en quelques secondes.
                        </p>
                    </div>

                    <!-- Links -->
                    <div>
                        <h4 class="text-sm font-semibold mb-3">Légal</h4>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li><a href="{{ route('legal') }}" class="hover:underline">Mentions légales</a></li>
                            <li><a href="{{ route('cgv') }}" class="hover:underline">Conditions générales de vente</a></li>
                            <li><a href="{{ route('privacy') }}" class="hover:underline">Politique de confidentialité</a></li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div>
                        <h4 class="text-sm font-semibold mb-3">Contact</h4>
                        <p class="text-sm text-gray-600">
                            Email : <a href="mailto:contact@nicolasjacquemin.com"
                                class="underline">contact@nicolasjacquemin.com</a>
                        </p>
                    </div>

                </div>

                <!-- Bottom -->
                <div class="border-t border-slate-200 mt-8 pt-6 text-center text-sm text-gray-500">
                    © {{ date('Y') }} ReplyBoost — Tous droits réservés
                    <br class="md:hidden">
                    <span class="block md:inline mt-1 md:mt-0">
                        TVA non applicable, art. 293B du CGI
                    </span>
                </div>

            </div>

        </footer>

    </div>

    @stack('scripts')
</body>

</html>