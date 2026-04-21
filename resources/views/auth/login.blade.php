@extends('layouts.app')

@section('content')
<div class="bg-slate-50/50 min-h-screen py-20 px-4 sm:px-6 flex flex-col justify-center">
    <div class="max-w-md mx-auto w-full">
        @if($place)
            <!-- En-tête Contextuel (Activité déjà liée) -->
            <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-indigo-100/50 border border-indigo-50 mb-8 overflow-hidden transform transition-all duration-500 hover:scale-[1.02]">
                <div class="h-44 w-full relative">
                    @if($place->photo_url)
                        <img src="{{ $place->photo_url }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-linear-to-t from-slate-950/80 to-transparent"></div>
                    @else
                        <div class="w-full h-full bg-linear-to-br from-indigo-500 to-violet-600"></div>
                    @endif

                    <div class="absolute inset-0 flex flex-col justify-end p-7">
                        <div class="flex items-center gap-5">
                            <div class="w-14 h-14 bg-white rounded-2xl shadow-xl flex items-center justify-center text-2xl font-black text-indigo-600 shrink-0">
                                {{ strtoupper(substr($place->name, 0, 1)) }}
                            </div>
                            <div class="min-w-0">
                                <h2 class="text-2xl font-black text-white truncate drop-shadow-md leading-tight">{{ $place->name }}</h2>
                                <div class="flex items-center gap-2.5 mt-1.5">
                                    <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse shadow-sm shadow-green-400"></div>
                                    <p class="text-[10px] font-black text-indigo-50 uppercase tracking-[0.2em] opacity-90">Activé sur ReplyBoost Pro</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carte d'Alerte liée -->
            <div class="bg-amber-50 border border-amber-100 rounded-[2rem] p-7 mb-10 text-left flex items-start gap-6 shadow-sm">
                <div class="w-12 h-12 bg-white text-amber-500 rounded-2xl flex items-center justify-center shrink-0 shadow-sm border border-amber-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-[13px] font-bold text-amber-800 leading-relaxed opacity-80">
                        Cette activité est déjà liée à un compte ReplyBoost Pro. Connectez-vous avec vos identifiants pour accéder à vos avis et outils IA.
                    </p>
                </div>
            </div>
        @else
            <!-- Logo Header (Default) -->
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-linear-to-r from-indigo-600 to-violet-600 rounded-3xl text-white shadow-xl shadow-indigo-100 mb-6 transform hover:rotate-12 transition-transform duration-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tight">Bon retour !</h1>
                <p class="text-slate-500 text-sm font-bold mt-2 opacity-80 uppercase tracking-widest">Connectez-vous à votre espace Pro</p>
            </div>
        @endif

        <!-- Login Card -->
        <div class="bg-white rounded-[3rem] p-10 sm:p-12 shadow-2xl shadow-slate-200/40 border border-slate-100">
            <form action="{{ route('login.submit') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="group">
                    <label for="email" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1 group-focus-within:text-indigo-600 transition-colors">Email Professionnel</label>
                    <input type="email" name="email" id="email" required value="{{ old('email') }}" placeholder="votre@email.com"
                        class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:outline-none focus:ring-4 focus:ring-indigo-600/10 focus:border-indigo-600 focus:bg-white transition-all text-slate-700 font-bold placeholder:text-slate-300">
                    @error('email')
                        <p class="mt-3 text-xs text-red-500 font-black bg-red-50 p-3 rounded-xl border border-red-100 flex items-center gap-2">
                             <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                             {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="group">
                    <div class="flex items-center justify-between mb-2 ml-1">
                        <label for="password" class="text-[10px] font-black text-slate-400 uppercase tracking-widest group-focus-within:text-indigo-600 transition-colors">Mot de passe</label>
                        <a href="#" class="text-[10px] font-black text-indigo-600 hover:underline uppercase tracking-wider opacity-60 hover:opacity-100 transition-opacity">Oublié ?</a>
                    </div>
                    <input type="password" name="password" id="password" required placeholder="••••••••"
                        class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:outline-none focus:ring-4 focus:ring-indigo-600/10 focus:border-indigo-600 focus:bg-white transition-all text-slate-700 font-bold placeholder:text-slate-300">
                </div>

                <div class="flex items-center gap-3 pt-2">
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <div class="relative flex items-center h-5 w-5">
                            <input type="checkbox" name="remember" class="peer sr-only">
                            <div class="w-5 h-5 border-2 border-slate-200 rounded-lg bg-slate-50 peer-checked:bg-indigo-600 peer-checked:border-indigo-600 transition-all duration-200 shrink-0 shadow-inner group-hover:border-indigo-200"></div>
                            <svg class="absolute inset-0 m-auto w-3 h-3 text-white opacity-0 peer-checked:opacity-100 transition-opacity duration-200 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-black text-slate-400 select-none group-hover:text-slate-600 transition-colors">Se souvenir de moi</span>
                    </label>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-5 bg-linear-to-r from-indigo-600 to-violet-600 text-white font-black text-lg rounded-2xl shadow-xl shadow-indigo-200 hover:from-indigo-500 hover:to-violet-500 transition-all active:scale-[0.98] cursor-pointer">
                        Se connecter
                    </button>
                </div>
            </form>
        </div>

        <!-- Footnote -->
        <div class="mt-12 text-center">
            <p class="text-slate-400 text-sm font-bold">
                Nouveau ici ? <a href="{{ route('index') }}" class="text-indigo-600 font-black hover:underline ml-1">Lancer une analyse gratuite</a>
            </p>
        </div>
    </div>
</div>
@endsection
