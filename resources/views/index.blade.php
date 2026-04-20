@extends('layouts.app')

@section('content')

    <!-- Hero Section -->
    <div class="relative bg-linear-to-b from-blue-50 to-white pt-16 pb-20">
        <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-24">
            <div class="px-4 max-w-xl mx-auto sm:px-6 lg:py-16 lg:max-w-none lg:mx-0 lg:px-0">
                <div>
                    <div class="mt-6">
                        <h1 class="text-4xl tracking-tight font-black text-slate-900 sm:text-5xl md:text-6xl text-center lg:text-left">
                            <span class="block">Générez des réponses</span>
                            <span class="block text-indigo-600">parfaites à vos avis</span>
                        </h1>
                        <p class="mt-4 text-base sm:text-lg text-slate-500 text-center lg:text-left">
                            Améliorez votre e-réputation en un clin d'œil. Recherchez simplement votre établissement
                            et laissez notre Intelligence Artificielle générer des réponses parfaites pour vous.
                        </p>
                        <div class="mt-8">
                            <form action="{{ route('places.store') }}" method="POST"
                                class="flex flex-col sm:flex-row items-stretch gap-3">
                                @csrf
                                <input type="hidden" name="place_id" id="hero-place-id">
                                <div class="relative flex-1 group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none z-10 transition-colors group-focus-within:text-indigo-500">
                                        <svg class="w-6 h-6 text-slate-400 group-focus-within:text-indigo-500" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="styled-autocomplete-container py-4!">
                                        <input type="text" id="hero-search-input" autocomplete="off"
                                            placeholder="Ex: Le Petit Chef Paris, Garage du Centre..."
                                            class="w-full bg-transparent focus:outline-none text-slate-700 placeholder-slate-400 text-lg">
                                    </div>
                                    <div id="hero-results" class="autocomplete-dropdown px-1"></div>
                                    @error('place_id')
                                        <p class="mt-2 text-sm text-rose-500 px-4 absolute top-full left-0">Veuillez
                                            sélectionner
                                            un établissement.</p>
                                    @enderror
                                </div>
                                <button type="submit"
                                    class="py-4 px-10 rounded-full shadow-lg shadow-indigo-200/50 bg-indigo-600 text-white font-bold hover:bg-indigo-700 transition-all transform hover:-translate-y-0.5 active:scale-95 focus:outline-none focus:ring-4 focus:ring-indigo-100 whitespace-nowrap">
                                    Analyser
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-12 sm:mt-16 lg:mt-0 flex items-center justify-center p-0 sm:p-4">
                <div class="w-full max-w-lg">
                    <!-- Hero Mockup Card -->
                    <div
                        class="bg-white rounded-3xl sm:rounded-[2.5rem] p-5 sm:p-8 shadow-2xl shadow-slate-200/60 border border-slate-100 transform rotate-0 lg:rotate-2 hover:rotate-0 transition-transform duration-700">
                        <!-- Reviewer Info -->
                        <div class="flex flex-col sm:flex-row sm:items-start justify-between mb-6 gap-3">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-14 h-14 rounded-full bg-linear-to-br from-blue-100 to-blue-200 flex items-center justify-center text-blue-600 text-xl font-bold border-2 border-white shadow-sm">
                                    N
                                </div>
                                <div>
                                    <h4 class="text-slate-900 font-bold text-lg">Nadine Breton</h4>
                                    <div class="flex text-yellow-400 gap-0.5">
                                        @for($i = 0; $i < 5; $i++)
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <span class="text-[10px] sm:text-xs font-semibold text-slate-400 bg-slate-50 px-3 py-1 rounded-full self-start sm:self-auto whitespace-nowrap">il y a 3 semaines</span>
                        </div>

                        <!-- Review Text -->
                        <p class="text-slate-600 text-base leading-relaxed mb-8">
                            "Très bonnes pizzas copieuses dans un cadre propre et agréable. Personnel disponible et
                            agréable"
                        </p>

                        <!-- AI Response Box -->
                        <div class="bg-indigo-50/50 rounded-3xl p-5 border border-indigo-100/50 relative overflow-hidden">
                            <div
                                class="absolute top-0 right-0 w-32 h-32 bg-indigo-500/5 rounded-full -mr-16 -mt-16 blur-2xl">
                            </div>

                            <div class="flex flex-col xs:flex-row xs:items-center justify-between gap-3 mb-4 relative z-10">
                                <div class="flex items-center gap-2">
                                    <span
                                        class="px-2 py-0.5 bg-indigo-600 text-white text-[10px] font-black rounded uppercase tracking-wider">IA</span>
                                    <span class="text-indigo-900 text-sm font-bold">Réponse prête</span>
                                </div>
                                <div
                                    class="text-xs font-semibold text-slate-500 flex items-center gap-1.5 bg-white px-3 py-1.5 rounded-xl border border-slate-200 shadow-sm shrink-0 self-start xs:self-auto">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3">
                                        </path>
                                    </svg>
                                    Copier
                                </div>
                            </div>

                            <div class="bg-white rounded-2xl p-4 shadow-sm border border-indigo-50/50 relative z-10">
                                <p class="text-slate-700 text-sm leading-relaxed">
                                    Merci beaucoup, Nadine, pour votre avis élogieux ! Nous sommes ravis que nos pizzas
                                    généreuses et notre cadre soigné vous aient plu. Au plaisir de vous accueillir !
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Small floating badges for visual richness (Now visible on mobile) -->
                    <div class="relative h-1">
                        <div
                            class="absolute -top-12 left-2 sm:-left-8 bg-blue-600 text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-2xl shadow-xl font-bold text-[10px] sm:text-xs animate-bounce z-20 scale-90 sm:scale-100">
                            +15% Visibilité
                        </div>
                        <div
                            class="absolute -top-4 -right-4 sm:-right-12 bg-indigo-600 text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-2xl shadow-xl font-bold text-[10px] sm:text-xs animate-pulse z-20 scale-90 sm:scale-100">
                            Satisfaction client augmentée
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scrollytelling Demo Section — TOP-LEVEL, no overflow-hidden ancestor -->
    <div id="scroll-section" style="height: 500vh;" class="bg-slate-50 relative">
        <div id="sticky-container" class="sticky top-0 w-full h-screen overflow-hidden bg-slate-50">

            <style>
                /* Card wrapper animates from center to left */
                #card-wrapper {
                    position: absolute;
                    top: 0;
                    bottom: 0;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    transition: left 0.05s linear, width 0.05s linear;
                    /* Start: centered, full width */
                    left: 0;
                    width: 100%;
                }

                #demo-mock-container {
                    width: min(520px, 92vw);
                    height: min(86vh, 780px);
                    border-radius: 1.5rem;
                    background: white;
                    overflow: hidden;
                    display: flex;
                    flex-direction: column;
                    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.13);
                    border: 1px solid #e2e8f0;
                    flex-shrink: 0;
                }

                #features-panel {
                    position: absolute;
                    right: 0;
                    top: 0;
                    bottom: 0;
                    width: 42%;
                    display: none;
                    /* Hidden by default on mobile/small screens */
                    flex-direction: column;
                    justify-content: center;
                    padding: 3rem 3rem 3rem 1.5rem;
                    opacity: 0;
                    transform: translateX(40px);
                    pointer-events: none;
                    transition: opacity 0.4s, transform 0.4s;
                }

                @media (min-width: 1024px) {
                    #features-panel {
                        display: flex;
                    }
                }

                .feature-chip {
                    opacity: 0;
                    transform: translateY(24px);
                    transition: opacity 0.5s ease, transform 0.5s ease;
                }

                .mock-review-card {
                    transition: opacity 0.5s ease, transform 0.5s ease;
                }

                /* Style the web component to fit seamlessly into our Tailwind layout */
                gmp-place-autocomplete {
                    display: block;
                    width: 100%;
                    --gmp-place-autocomplete-height: auto;
                }

                .styled-autocomplete-container {
                    position: relative;
                    background-color: white;
                    border: 1px solid #e2e8f0;
                    border-radius: 9999px;
                    padding-left: 3.5rem;
                    padding-right: 1.25rem;
                    padding-top: 1rem;
                    padding-bottom: 1rem;
                    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
                    transition: all 0.2s ease-in-out;
                }

                .styled-autocomplete-container:focus-within {
                    border-color: #818cf8;
                    box-shadow: 0 0 0 3px rgba(129, 140, 248, 0.5);
                }

                .pac-container {
                    z-index: 9999 !important;
                    border-radius: 1rem;
                    margin-top: 8px;
                    border: 1px solid #e2e8f0;
                    box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1);
                }

                /* Custom Autocomplete Results List */
                .autocomplete-dropdown {
                    position: absolute;
                    top: 100%;
                    left: 0;
                    right: 0;
                    z-index: 50;
                    background: white;
                    border: 1px solid #e2e8f0;
                    border-radius: 1rem;
                    margin-top: 0.5rem;
                    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
                    max-height: 300px;
                    overflow-y: auto;
                    display: none;
                }

                .autocomplete-item {
                    padding: 0.75rem 1.25rem;
                    cursor: pointer;
                    transition: background 0.2s;
                    display: flex;
                    align-items: center;
                    gap: 0.75rem;
                }

                .autocomplete-item:hover {
                    background-color: #f8fafc;
                }

                .autocomplete-item:not(:last-child) {
                    border-bottom: 1px solid #f1f5f9;
                }

                .autocomplete-item svg {
                    color: #94a3b8;
                }

                .autocomplete-item span {
                    font-size: 0.875rem;
                    color: inherit;
                    font-weight: 500;
                }

                #footer-results .autocomplete-item {
                    color: #f8fafc;
                }

                #footer-results .autocomplete-item:hover {
                    background-color: rgba(255, 255, 255, 0.1);
                    color: #818cf8;
                }

                #footer-results .autocomplete-item:not(:last-child) {
                    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
                }
            </style>

            <!-- Left: Card Wrapper -->
            <div id="card-wrapper">
                <div id="demo-mock-container">
                    <!-- Top Image -->
                    <div class="h-36 sm:h-48 w-full bg-cover bg-center shrink-0 relative"
                        style="background-image: url('{{ $mockPlace['image'] }}')">
                        <div
                            class="absolute top-3 left-3 right-3 bg-white/90 backdrop-blur rounded-full h-10 shadow-lg px-4 flex items-center justify-between border border-white/20">
                            <span class="text-slate-800 font-semibold text-sm truncate">{{ $mockPlace['name'] }}</span>
                            <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Header Info -->
                    <div class="px-5 py-4 shrink-0 bg-white border-b border-slate-100">
                        <h2 class="text-2xl font-bold text-slate-900 tracking-tight">{{ $mockPlace['name'] }}</h2>
                        <div class="flex items-center text-sm text-slate-600 mt-1">
                            <span class="text-yellow-500 font-bold mr-1">{{ $mockPlace['rating'] }}</span>
                            <span class="text-yellow-400 text-base tracking-tight mr-1">★★★★</span>
                            <span class="text-slate-400">({{ $mockPlace['reviews_count'] }} avis)</span>
                            <span class="mx-2 text-slate-300">·</span>
                            <span class="text-indigo-600 text-xs font-medium">{{ $mockPlace['category'] }}</span>
                        </div>

                        <!-- Mini action buttons -->
                        <div class="flex gap-4 mt-3">
                            <div class="flex flex-col items-center">
                                <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                                <span class="text-[10px] text-blue-600 font-medium mt-0.5">Itin.</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-10 h-10 border border-slate-200 rounded-full flex items-center justify-center text-blue-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                    </svg>
                                </div>
                                <span class="text-[10px] text-blue-600 font-medium mt-0.5">Enreg.</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-10 h-10 border border-slate-200 rounded-full flex items-center justify-center text-blue-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="text-[10px] text-blue-600 font-medium mt-0.5">Partager</span>
                            </div>
                        </div>

                        <!-- Tabs -->
                        <div class="flex mt-3 border-b border-slate-100 space-x-5 text-sm">
                            <div class="pb-2 text-slate-400">Présentation</div>
                            <div id="demo-tab-avis"
                                class="pb-2 text-slate-500 font-bold relative transition-colors duration-300">
                                Avis
                                <div id="demo-tab-indicator"
                                    class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 opacity-0 transition-opacity duration-300 rounded-t">
                                </div>
                            </div>
                            <div class="pb-2 text-slate-400">Photos</div>
                            <div class="pb-2 text-slate-400">À propos</div>
                        </div>
                    </div>

                    <!-- Reviews Area -->
                    <div class="bg-slate-50 flex-1 overflow-hidden relative">
                        <div id="reviews-inner"
                            class="absolute inset-x-0 top-0 px-4 py-4 transition-transform duration-350 ease-out">
                            @foreach($mockPlace['reviews'] as $index => $review)
                                <div class="mock-review-card bg-white rounded-2xl p-4 shadow-sm border border-slate-100 opacity-0 translate-y-8 mb-4"
                                    id="review-{{ $index }}">
                                    <div class="flex items-start">
                                        <img src="{{ $review['author_photo'] }}"
                                            class="w-10 h-10 rounded-full border-2 border-white shadow-sm shrink-0" alt="" />
                                        <div class="ml-3 flex-1 min-w-0">
                                            <div class="flex items-center justify-between">
                                                <span
                                                    class="font-bold text-slate-900 text-sm truncate">{{ $review['author_name'] }}</span>
                                                <span
                                                    class="text-[10px] text-slate-400 ml-2 shrink-0">{{ $review['date'] }}</span>
                                            </div>
                                            <div class="text-yellow-500 text-xs my-0.5">
                                                @for($i = 0; $i < $review['rating']; $i++)★@endfor
                                            </div>
                                            <p class="text-slate-600 text-xs leading-relaxed line-clamp-3">
                                                {{ $review['content'] }}
                                            </p>
                                        </div>
                                    </div>
                                    <!-- AI Zone -->
                                    <div class="mt-3 bg-indigo-50/60 rounded-xl p-3 border border-indigo-100/50">
                                        <div class="action-wrapper">
                                            <div class="flex items-center gap-2">
                                                <div class="w-6 h-6 bg-indigo-600 rounded-lg flex items-center justify-center">
                                                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="text-indigo-900 font-bold text-xs">Générer une réponse IA</p>
                                                    <p class="text-indigo-400 text-[10px]">Continuez de scroller...</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="loading-wrapper hidden items-center gap-2">
                                            <svg class="animate-spin h-4 w-4 text-indigo-600" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                                    stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                </path>
                                            </svg>
                                            <p class="text-indigo-800 font-semibold text-xs">Rédaction en cours...</p>
                                        </div>
                                        <div class="result-wrapper hidden">
                                            <div class="flex items-center gap-1.5 mb-1.5">
                                                <span
                                                    class="px-1.5 py-0.5 bg-indigo-600 text-white text-[9px] font-black rounded uppercase tracking-wide">IA</span>
                                                <span class="text-slate-700 text-xs font-semibold">Réponse prête</span>
                                            </div>
                                            <p
                                                class="text-slate-600 text-xs italic leading-relaxed bg-white/80 p-2 rounded-lg border border-indigo-50">
                                                "{{ $review['fake_response'] }}"
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Features Panel -->
            <div id="features-panel">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-10 pl-2">Pourquoi ReplyBoost ?</p>

                <!-- Feature 1 -->
                <div class="feature-chip mb-12 group" id="feat-1">
                    <div class="flex flex-col items-start px-2">
                        <div
                            class="w-14 h-14 bg-linear-to-br from-blue-500 to-cyan-400 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/30 mb-5 transform group-hover:-translate-y-1 transition-transform duration-300">
                            <!-- Lightning Bolt -->
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="font-extrabold text-slate-900 text-xl tracking-tight">Extraction instantanée</h3>
                        <p class="text-slate-500 text-base mt-2 leading-relaxed">Vos avis récupérés en quelques secondes
                            depuis n'importe quelle page Google Business.</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="feature-chip mb-12 group" id="feat-2">
                    <div class="flex flex-col items-start px-2">
                        <div
                            class="w-14 h-14 bg-linear-to-br from-purple-500 to-pink-500 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-purple-500/30 mb-5 transform group-hover:-translate-y-1 transition-transform duration-300">
                            <!-- Sparkles -->
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-extrabold text-slate-900 text-xl tracking-tight">Propulsé par l'IA</h3>
                        <p class="text-slate-500 text-base mt-2 leading-relaxed">Des réponses ultra-personnalisées,
                            professionnelles et prêtes à l'emploi en un clic.</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="feature-chip group" id="feat-3">
                    <div class="flex flex-col items-start px-2">
                        <div
                            class="w-14 h-14 bg-linear-to-br from-indigo-600 to-blue-600 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-600/30 mb-5 transform group-hover:-translate-y-1 transition-transform duration-300">
                            <!-- Clipboard Check -->
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-extrabold text-slate-900 text-xl tracking-tight">Copier &amp; Coller</h3>
                        <p class="text-slate-500 text-base mt-2 leading-relaxed">Copiez la réponse en un clic et publiez-la
                            directement sur votre profil Google.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Final CTA Section (Redesigned) -->
    <div class="relative bg-slate-950 overflow-hidden py-24 sm:py-40">
        <!-- Enhanced Decorative backgrounds -->
        <div
            class="absolute top-0 left-1/4 -translate-x-1/2 w-[600px] h-[600px] bg-indigo-600/20 rounded-full blur-[120px] pointer-events-none animate-pulse">
        </div>
        <div
            class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[100px] pointer-events-none">
        </div>
        <div
            class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-5 pointer-events-none">
        </div>

        <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 z-10">

            <div class="text-center mb-12">
                <h2 class="text-4xl sm:text-6xl font-black text-white tracking-tight mb-8">
                    Prêt à <span
                        class="text-transparent bg-clip-text bg-linear-to-r from-blue-400 via-indigo-400 to-purple-400">transformer
                        vos avis ?</span>
                </h2>
                <p class="text-xl text-slate-400 max-w-2xl mx-auto leading-relaxed">
                    Recherchez votre commerce ci-dessous et obtenez vos premières réponses IA en moins de 30 secondes.
                </p>
            </div>

            <!-- Enhanced Search Box with Glassmorphism -->
            <div class="max-w-4xl mx-auto">
                <div
                    class="bg-white/5 backdrop-blur-2xl p-3 sm:p-4 rounded-4xl border border-white/10 shadow-2xl relative group">
                    <div
                        class="absolute -inset-0.5 bg-linear-to-r from-blue-500 to-indigo-500 rounded-4xl opacity-20 group-hover:opacity-40 transition duration-500 blur">
                    </div>

                    <form action="{{ route('places.store') }}" method="POST"
                        class="relative flex flex-col sm:flex-row gap-3 bg-slate-900/40 rounded-3xl p-1">
                        @csrf
                        <input type="hidden" name="place_id" id="footer-place-id">
                        <div class="relative flex-1">
                            <div
                                class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none z-10 transition-colors group-focus-within:text-indigo-400">
                                <svg class="w-6 h-6 text-slate-500 group-focus-within:text-indigo-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <div
                                class="styled-autocomplete-container bg-transparent! border-none! shadow-none! py-5! pl-16!">
                                <input type="text" id="footer-search-input" autocomplete="off"
                                    placeholder="Rechercher votre commerce..."
                                    class="w-full bg-transparent focus:outline-none text-white placeholder-slate-500 text-xl font-medium">
                            </div>
                            <div id="footer-results"
                                class="autocomplete-dropdown z-50 px-1 bg-slate-900! border-white/20! text-white! overflow-hidden shadow-2xl top-auto! bottom-full! mb-4!">
                            </div>
                        </div>
                        <button type="submit"
                            class="px-10 py-5 bg-indigo-600 hover:bg-indigo-500 text-white text-lg font-black rounded-2xl shadow-xl shadow-indigo-600/20 transform hover:-translate-y-1 transition-all active:scale-95 whitespace-nowrap">
                            Essayer gratuitement
                        </button>
                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const scrollSection = document.getElementById('scroll-section');
            const cardWrapper = document.getElementById('card-wrapper');
            const featPanel = document.getElementById('features-panel');
            const tabAvis = document.getElementById('demo-tab-avis');
            const tabIndicator = document.getElementById('demo-tab-indicator');
            const reviewsInner = document.getElementById('reviews-inner');
            const reviews = document.querySelectorAll('.mock-review-card');
            const feat1 = document.getElementById('feat-1');
            const feat2 = document.getElementById('feat-2');
            const feat3 = document.getElementById('feat-3');

            window.addEventListener('scroll', () => {
                if (!scrollSection) return;
                const rect = scrollSection.getBoundingClientRect();
                const vh = window.innerHeight;
                const trackLength = rect.height - vh;
                const progress = Math.max(0, Math.min(1, -rect.top / trackLength));

                // Phase 1 (0 → 0.15): Card slides from center to left (Only on Desktop)
                const isDesktop = window.innerWidth >= 1024;
                const slideP = Math.min(1, progress / 0.15);

                if (cardWrapper) {
                    cardWrapper.style.left = '0';
                    if (isDesktop) {
                        // Card takes 55% of screen when fully slid; starts at 100%
                        const cardW = 100 - slideP * 45; // 100% → 55%
                        cardWrapper.style.width = cardW + '%';
                    } else {
                        cardWrapper.style.width = '100%';
                    }
                }

                // Phase 1b: Features panel fades in (Only on Desktop)
                if (featPanel) {
                    if (isDesktop) {
                        const panelOpacity = Math.min(1, Math.max(0, (progress - 0.1) / 0.1));
                        const panelTranslate = (1 - panelOpacity) * 40;
                        featPanel.style.opacity = panelOpacity;
                        featPanel.style.transform = `translateX(${panelTranslate}px)`;
                    } else {
                        featPanel.style.opacity = '0';
                    }
                }

                // Feature chips appear one by one
                const showFeature = (el, threshold) => {
                    if (!el) return;
                    const p2 = Math.min(1, Math.max(0, (progress - threshold) / 0.08));
                    el.style.opacity = p2;
                    el.style.transform = `translateY(${(1 - p2) * 24}px)`;
                };
                showFeature(feat1, 0.15);
                showFeature(feat2, 0.30);
                showFeature(feat3, 0.45);

                // Phase 2 (p > 0.20): Avis tab activates
                if (tabAvis && tabIndicator) {
                    if (progress > 0.20) {
                        tabAvis.classList.add('text-blue-600');
                        tabAvis.classList.remove('text-slate-500');
                        tabIndicator.classList.remove('opacity-0');
                        tabIndicator.classList.add('opacity-100');
                    } else {
                        tabAvis.classList.remove('text-blue-600');
                        tabAvis.classList.add('text-slate-500');
                        tabIndicator.classList.add('opacity-0');
                        tabIndicator.classList.remove('opacity-100');
                    }
                }

                // Phase 3: Virtual inner scroll — first card starts 160px lower so user has time to read it
                if (reviewsInner) {
                    const startOffset = 160; // first card appears lower in the viewport
                    let innerY;
                    if (progress <= 0.18) {
                        innerY = startOffset;
                    } else {
                        innerY = startOffset - (progress - 0.18) * 700;
                    }
                    reviewsInner.style.transform = `translateY(${innerY}px)`;
                }

                // Reviews & AI triggers
                handleReview(0, progress, 0.20, 0.30, 0.38);
                handleReview(1, progress, 0.42, 0.52, 0.60);
            });

            function handleReview(idx, p, appear, ai, done) {
                const el = reviews[idx];
                if (!el) return;
                if (p >= appear) {
                    el.classList.remove('opacity-0', 'translate-y-8');
                } else {
                    el.classList.add('opacity-0', 'translate-y-8');
                }

                const action = el.querySelector('.action-wrapper');
                const loading = el.querySelector('.loading-wrapper');
                const result = el.querySelector('.result-wrapper');
                if (!action || !loading || !result) return;

                if (p < ai) {
                    action.style.display = 'block';
                    loading.style.display = 'none';
                    result.style.display = 'none';
                } else if (p < done) {
                    action.style.display = 'none';
                    loading.style.display = 'flex';
                    result.style.display = 'none';
                } else {
                    action.style.display = 'none';
                    loading.style.display = 'none';
                    result.style.display = 'block';
                }
            }
        });

        // --- Custom Autocomplete Search Logic (Proxy via Laravel) ---
        function initCustomAutocomplete(inputId, resultsId, placeIdField, nameField, urlField) {
            const input = document.getElementById(inputId);
            const results = document.getElementById(resultsId);
            let debounceTimer;

            if (!input || !results) return;

            input.addEventListener('input', () => {
                clearTimeout(debounceTimer);
                const query = input.value.trim();

                if (query.length < 2) {
                    results.style.display = 'none';
                    return;
                }

                debounceTimer = setTimeout(async () => {
                    try {
                        const response = await fetch(`/api/places/autocomplete?input=${encodeURIComponent(query)}`);
                        const data = await response.json();

                        renderResults(data, results, input, placeIdField, nameField, urlField);
                    } catch (error) {
                        console.error('Autocomplete error:', error);
                    }
                }, 300);
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (e) => {
                if (!input.contains(e.target) && !results.contains(e.target)) {
                    results.style.display = 'none';
                }
            });
        }

        function renderResults(data, container, input, placeIdField, nameField, urlField) {
            if (data.length === 0) {
                container.style.display = 'none';
                return;
            }

            container.innerHTML = '';
            data.forEach(item => {
                const div = document.createElement('div');
                div.className = 'autocomplete-item';
                div.innerHTML = `
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>${item.text}</span>
                        `;
                div.onclick = async () => {
                    input.value = item.text;
                    container.style.display = 'none';

                    document.getElementById(placeIdField).value = item.id;
                };
                container.appendChild(div);
            });

            container.style.display = 'block';
        }

        // Initialize both search bars
        initCustomAutocomplete('hero-search-input', 'hero-results', 'hero-place-id', 'hero-name', 'hero-url');
        initCustomAutocomplete('footer-search-input', 'footer-results', 'footer-place-id', 'footer-name', 'footer-url');
    </script>
@endpush