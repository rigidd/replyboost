@extends('layouts.dashboard')

@section('content')
<div class="px-6 lg:px-12 py-8 lg:py-12 max-w-6xl mx-auto">
    <!-- Breadcrumbs / Greeting -->
    <div class="mb-10">
        <h1 class="text-3xl font-black text-slate-900 tracking-tight">Bonjour, {{ explode(' ', Auth::user()->name)[0] }} !</h1>
        <p class="text-slate-500 font-bold text-sm">Prêt à améliorer la réputation de {{ $place->name }} ?</p>
    </div>

    <!-- Header Summary Card -->
    <div class="bg-white rounded-[3rem] shadow-[0_20px_50px_rgba(0,0,0,0.04)] border border-slate-100 overflow-hidden mb-12 transform hover:scale-[1.01] transition-transform duration-500">
        <div class="h-56 w-full relative">
            @if($place->photo_url)
                <img src="{{ $place->photo_url }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-linear-to-t from-slate-950/90 via-slate-950/40 to-transparent"></div>
            @else
                <div class="w-full h-full bg-linear-to-br from-indigo-600 via-indigo-700 to-violet-800"></div>
                <div class="absolute inset-0 bg-slate-950/30"></div>
            @endif

            <div class="absolute inset-x-0 bottom-0 p-8 sm:p-10 flex flex-col sm:flex-row sm:items-end justify-between gap-6">
                <div class="flex items-center gap-6">
                    <div class="w-20 h-20 bg-white rounded-[2rem] shadow-2xl flex items-center justify-center text-4xl font-black text-indigo-600 border-4 border-white shrink-0">
                        {{ strtoupper(substr($place->name, 0, 1)) }}
                    </div>
                    <div class="text-white">
                        <h2 class="text-3xl font-black tracking-tight mb-1">{{ $place->name }}</h2>
                        <div class="flex items-center gap-2.5">
                            <span class="px-2 py-0.5 bg-green-500 text-white text-[10px] font-black rounded-lg uppercase tracking-widest shadow-lg shadow-green-500/20">Actif</span>
                            <p class="text-indigo-100 text-xs font-bold opacity-80">{{ $place->google_url ? 'Google Business Profile lié' : 'Mode local activé' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
        <!-- Stat Card 1 -->
        <div class="bg-white p-10 rounded-[2.5rem] border border-slate-100 shadow-sm flex items-center gap-8 group hover:shadow-xl hover:shadow-indigo-500/5 transition-all duration-300">
            <div class="w-20 h-20 bg-blue-50 rounded-3xl flex items-center justify-center text-blue-600 group-hover:scale-110 transition-transform duration-500">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                </svg>
            </div>
            <div>
                <p class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 font-black">Avis récupérés</p>
                <p class="text-4xl font-black text-slate-900 tracking-tight">{{ $stats['total_reviews'] }}</p>
            </div>
        </div>

        <!-- Stat Card 2 -->
        <div class="bg-white p-10 rounded-[2.5rem] border border-slate-100 shadow-sm flex items-center gap-8 group hover:shadow-xl hover:shadow-indigo-500/5 transition-all duration-300">
            <div class="w-20 h-20 bg-indigo-50 rounded-3xl flex items-center justify-center text-indigo-600 group-hover:scale-110 transition-transform duration-500">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
            </div>
            <div>
                <p class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 font-black">Réponses IA</p>
                <p class="text-4xl font-black text-slate-900 tracking-tight">{{ $stats['ai_responses'] }}</p>
            </div>
        </div>
    </div>

    <!-- Quick Action Card -->
    <div class="relative bg-linear-to-br from-indigo-600 via-indigo-700 to-violet-800 rounded-[3rem] p-10 lg:p-14 text-white overflow-hidden shadow-2xl shadow-indigo-600/20 transform hover:-translate-y-1 transition-all duration-500">
        <!-- Floating shapes -->
        <div class="absolute -top-12 -right-12 w-64 h-64 bg-white/10 rounded-full blur-3xl transition-transform duration-1000 group-hover:scale-150"></div>
        <div class="absolute -bottom-12 -left-12 w-48 h-48 bg-violet-400/20 rounded-full blur-2xl transition-transform duration-1000 group-hover:scale-150"></div>

        <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 items-center gap-10 lg:gap-20">
            <div>
                <h3 class="text-3xl lg:text-4xl font-black mb-4 tracking-tight leading-tight">Votre réputation est <br>entre de bonnes mains.</h3>
                <p class="text-indigo-100 text-base font-medium opacity-90 max-w-sm mb-10 leading-relaxed">
                    Accédez dès maintenant à tous vos avis et laissez notre IA rédiger pour vous les meilleures réponses professionnelles.
                </p>
                <a href="{{ route('dashboard.reviews') }}" class="inline-flex items-center gap-3 px-10 py-5 bg-white text-indigo-700 font-black rounded-[1.5rem] shadow-2xl hover:bg-slate-50 transition-all active:scale-95 text-base tracking-tight">
                    Gérer mes avis
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
            <div class="hidden lg:flex justify-end">
                <div class="w-64 h-64 bg-white/10 backdrop-blur-md rounded-[3rem] border border-white/20 p-8 flex flex-col justify-between shadow-2xl">
                    <div class="flex flex-col gap-4">
                        <div class="h-3 w-3/4 bg-white/30 rounded-full"></div>
                        <div class="h-3 w-1/2 bg-white/20 rounded-full"></div>
                    </div>
                    <div class="flex items-center gap-3 mt-10">
                        <div class="w-10 h-10 bg-white/40 rounded-full"></div>
                        <div class="flex-1 h-3 bg-white/30 rounded-full"></div>
                    </div>
                    <div class="mt-8 pt-6 border-t border-white/10">
                         <div class="h-10 w-full bg-white rounded-xl shadow-lg flex items-center justify-center text-indigo-600 text-xs font-black">BOOSTED</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
