@extends('layouts.app')

@section('content')
    <div class="bg-slate-50/50 min-h-screen py-12 px-4 sm:px-6">
        <div class="max-w-md mx-auto">
            <!-- Detached Place Context Card -->
            <div
                class="bg-white rounded-[2.5rem] shadow-2xl shadow-indigo-100/50 border border-indigo-50 mb-10 overflow-hidden transform transition-all duration-500 hover:scale-[1.02]">
                <div class="h-52 w-full relative">
                    @if($place->photo_url)
                        <img src="{{ $place->photo_url }}" class="w-full h-full object-cover">
                        <!-- Overlay with deeper shadow for text readability -->
                        <div class="absolute inset-0 bg-linear-to-t from-slate-950/90 via-slate-950/40 to-transparent"></div>
                    @else
                        <div class="w-full h-full bg-linear-to-br from-indigo-600 via-indigo-700 to-violet-800"></div>
                    @endif

                    <div class="absolute inset-0 flex flex-col items-center justify-center p-8 text-center">
                        <div
                            class="w-20 h-20 bg-white/20 backdrop-blur-xl rounded-[2rem] flex items-center justify-center text-white text-3xl font-black mb-4 border border-white/30 shadow-2xl">
                            {{ strtoupper(substr($place->name, 0, 1)) }}
                        </div>
                        <h2 class="text-white text-3xl font-black tracking-tight mb-2">{{ $place->name }}</h2>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                            <p class="text-indigo-100 text-[10px] font-black uppercase tracking-[0.2em] opacity-90">Analyse
                                prête à débloquer</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Registration Form Card -->
            <div
                class="bg-white rounded-[2.5rem] p-10 sm:p-12 shadow-2xl shadow-slate-200/40 border border-slate-100 relative z-10">
                <div class="text-center mb-10">
                    <h1 class="text-3xl font-black text-slate-900 mb-4 tracking-tight">C'est presque fini !</h1>
                    <p class="text-slate-500 text-sm font-semibold leading-relaxed max-w-[280px] mx-auto">
                        Créez votre compte en 10 secondes pour accéder à tous les rapports.
                    </p>
                </div>

                <form action="{{ route('register.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="place_id" value="{{ $place->id }}">

                    <div class="group">
                        <label for="name"
                            class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1 group-focus-within:text-indigo-600 transition-colors">Nom
                            complet</label>
                        <input type="text" name="name" id="name" required placeholder="Ex: Jean Dupont" value="{{ old('name') }}"
                            class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:outline-none focus:ring-4 focus:ring-indigo-600/10 focus:border-indigo-600 focus:bg-white transition-all text-slate-700 font-bold placeholder:text-slate-300">
                        @error('name')
                            <p class="mt-2 text-xs text-red-500 font-black flex items-center gap-1.5 ml-1 animate-pulse">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="group">
                        <label for="email"
                            class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1 group-focus-within:text-indigo-600 transition-colors">Email
                            Professionnel</label>
                        <input type="email" name="email" id="email" required placeholder="jean@entreprise.com" value="{{ old('email') }}"
                            class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:outline-none focus:ring-4 focus:ring-indigo-600/10 focus:border-indigo-600 focus:bg-white transition-all text-slate-700 font-bold placeholder:text-slate-300">
                        @error('email')
                            <p class="mt-2 text-xs text-red-500 font-black flex items-center gap-1.5 ml-1 animate-pulse">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="group">
                        <label for="password"
                            class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1 group-focus-within:text-indigo-600 transition-colors">Mot
                            de passe</label>
                        <input type="password" name="password" id="password" required placeholder="••••••••"
                            class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:outline-none focus:ring-4 focus:ring-indigo-600/10 focus:border-indigo-600 focus:bg-white transition-all text-slate-700 font-bold placeholder:text-slate-300">
                        @error('password')
                            <p class="mt-2 text-xs text-red-500 font-black flex items-center gap-1.5 ml-1 animate-pulse">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Premium Custom Checkbox -->
                    <label class="flex items-start gap-4 pt-2 cursor-pointer group">
                        <div class="relative flex items-center h-6 w-6">
                            <input id="terms" name="terms" type="checkbox" required class="peer sr-only">
                            <!-- Custom box -->
                            <div
                                class="w-6 h-6 border-2 border-slate-200 rounded-lg bg-slate-50 peer-checked:bg-indigo-600 peer-checked:border-indigo-600 peer-focus:ring-4 peer-focus:ring-indigo-600/10 transition-all duration-200 shrink-0 shadow-inner group-hover:border-indigo-200">
                            </div>
                            <!-- Checkmark Icon (Sibling of Peer) -->
                            <svg class="absolute inset-0 m-auto w-3.5 h-3.5 text-white opacity-0 peer-checked:opacity-100 transition-opacity duration-200 pointer-events-none"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="text-[11px] leading-relaxed text-slate-500 font-bold select-none pt-0.5">
                                J'accepte les <a href="{{ route('cgv') }}" target="_blank"
                                    class="text-indigo-600 font-black hover:underline decoration-indigo-200">CGV</a>,
                                les <a href="{{ route('legal') }}" target="_blank"
                                    class="text-indigo-600 font-black hover:underline decoration-indigo-200">mentions
                                    légales</a>
                                et la <a href="{{ route('privacy') }}" target="_blank"
                                    class="text-indigo-600 font-black hover:underline decoration-indigo-200">politique de
                                    confidentialité</a>.
                            </div>
                            @error('terms')
                                <p class="mt-2 text-[10px] text-red-500 font-black flex items-center gap-1.5 animate-bounce-horizontal">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    Veuillez accepter les conditions.
                                </p>
                            @enderror
                        </div>
                    </label>

                    <div class="pt-2">
                        <button type="submit"
                            class="w-full py-5 bg-linear-to-r from-indigo-600 to-violet-600 text-white font-black text-lg rounded-2xl shadow-xl shadow-indigo-200 hover:from-indigo-500 hover:to-violet-500 transition-all active:scale-[0.98] cursor-pointer">
                            Créer mon compte
                        </button>
                    </div>
                </form>
            </div>

            <!-- Footnote -->
            <div class="mt-12 text-center">
                <p class="text-slate-400 text-sm font-semibold">
                    Vous avez déjà un compte ? <a href="{{ route('login') }}" class="text-indigo-600 font-black hover:underline ml-1">Se
                        connecter</a>
                </p>
            </div>
        </div>
    </div>
@endsection