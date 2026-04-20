@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-8 px-4 sm:px-6">
        <a href="{{ route('index') }}"
            class="text-indigo-600 hover:text-indigo-700 font-medium flex items-center mb-8 transition-colors group">
            <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            Retour à l'accueil
        </a>

        <!-- Place Header Card (Apple/SaaS style) -->
        <div
            class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden mb-10 shrink-0">
            <!-- Top Image / Gradient -->
            <div class="h-32 sm:h-40 w-full relative bg-slate-200">
                @if(isset($photoUrl) && $photoUrl)
                    <img src="{{ $photoUrl }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-linear-to-t from-black/40 to-transparent"></div>
                @else
                    <div class="w-full h-full bg-linear-to-r from-blue-500 via-indigo-500 to-purple-500 relative">
                        <div class="absolute inset-0 bg-white/10 backdrop-blur-sm"></div>
                    </div>
                @endif
                <!-- Floating element simulating a map pin or place logo -->
                <div class="absolute -bottom-8 left-6">
                    <div
                        class="w-16 h-16 bg-white rounded-2xl shadow-lg border-2 border-white flex items-center justify-center text-3xl font-black text-indigo-600 overflow-hidden">
                        {{ strtoupper(substr($place->name, 0, 1)) }}
                    </div>
                </div>
            </div>

            <!-- Header Info -->
            <div class="px-6 pt-12 pb-5 shrink-0 bg-white">
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">{{ $place->name }}</h2>
                <div class="flex items-center justify-between text-sm text-slate-600 mt-2">
                    <div class="flex items-center">
                        <span class="text-slate-500 font-medium mr-2">{{ count($place->reviews) }}
                            {{ count($place->reviews) > 1 ? 'Avis importés' : 'Avis importé' }}</span>
                        <span class="text-slate-300">·</span>
                        @if($place->google_url)
                            <a href="{{ $place->google_url }}" target="_blank"
                                class="ml-2 text-indigo-600 hover:text-indigo-700 font-medium flex items-center group">
                                Voir sur Google
                                <svg class="w-3 h-3 ml-1 group-hover:translate-x-0.5 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                            </a>
                        @endif
                    </div>

                    @php
                        $pendingCount = $place->reviews->whereNull('response')->count();
                    @endphp

                    @if($pendingCount > 0)
                        <button onclick="generateAll()" id="btn-generate-all"
                            class="flex items-center gap-2 px-4 py-2 bg-linear-to-r from-indigo-600 to-violet-600 text-white text-xs font-bold rounded-xl shadow-lg shadow-indigo-200 hover:from-indigo-500 hover:to-violet-500 transition-all active:scale-95 group">
                            <svg class="w-3.5 h-3.5 group-hover:animate-pulse" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            Tout générer ({{ $pendingCount }})
                        </button>
                    @endif
                </div>

                <!-- Tabs (Visual only) -->
                <div class="flex mt-6 border-b border-slate-100 space-x-6 text-sm">
                    <div class="pb-3 text-indigo-600 font-bold relative transition-colors duration-300">
                        Avis clients
                        <div class="absolute bottom-0 left-0 w-full h-0.5 bg-indigo-600 rounded-t"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews List -->
        <div class="space-y-5">
            @foreach($place->reviews as $review)
                <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 transition-all hover:shadow-md relative group"
                    id="review-{{ $review->id }}">
                    <div class="flex items-start">
                        @if($review->author_photo)
                            <img src="{{ $review->author_photo }}"
                                class="w-10 h-10 rounded-full border border-slate-100 shadow-sm shrink-0 object-cover" alt="" />
                        @else
                            <div
                                class="w-10 h-10 rounded-full bg-linear-to-br from-indigo-100 to-indigo-200 flex items-center justify-center text-indigo-600 font-bold shadow-sm shrink-0">
                                {{ strtoupper(substr($review->author_name, 0, 1)) }}
                            </div>
                        @endif
                        <div class="ml-4 flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-slate-900 text-sm truncate">{{ $review->author_name }}</span>
                                <span
                                    class="text-[10px] text-slate-400 font-medium ml-2 shrink-0 bg-slate-50 px-2 py-0.5 rounded-full">{{ $review->review_date }}</span>
                            </div>
                            <div class="text-yellow-400 text-xs my-1 flex gap-0.5">
                                @for($i = 0; $i < $review->rating; $i++)
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                                @for($i = $review->rating; $i < 5; $i++)
                                    <svg class="w-3.5 h-3.5 text-slate-200 fill-current" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                            <p class="text-slate-600 text-sm mt-2 leading-relaxed whitespace-pre-line">{{ $review->content }}
                            </p>
                        </div>
                    </div>

                    <!-- AI Zone -->
                    <div class="mt-5 bg-indigo-50/60 rounded-xl p-3 sm:p-4 border border-indigo-100/50 transition-all duration-300 ml-0 sm:ml-14"
                        id="response-container-{{ $review->id }}">
                        @if($review->response)
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-2.5">
                                <div class="flex flex-col">
                                    <div class="flex items-center gap-1.5">
                                        <span
                                            class="px-1.5 py-0.5 bg-indigo-600 text-white text-[9px] font-black rounded uppercase tracking-wide shadow-sm">IA</span>
                                        <span class="text-indigo-900 text-xs font-bold">Réponse prête</span>
                                    </div>
                                </div>
                                <button onclick="copyToClipboard('{{ $review->id }}', this)"
                                    class="text-xs font-semibold text-slate-500 hover:text-indigo-600 flex items-center justify-center bg-white px-2.5 py-1.5 rounded-lg border border-slate-200 shadow-sm transition-all hover:border-indigo-200 hover:shadow active:scale-95 w-full sm:w-auto">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3">
                                        </path>
                                    </svg>
                                    Copier la réponse
                                </button>
                            </div>
                            <p id="response-text-{{ $review->id }}"
                                class="text-slate-700 text-sm leading-relaxed bg-white/80 p-3.5 rounded-lg border border-indigo-50 shadow-[inset_0_1px_2px_rgba(0,0,0,0.02)]">
                                {!! nl2br(e($review->response)) !!}
                            </p>
                        @else
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                <div class="flex items-center gap-2.5">
                                    <div
                                        class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center shadow-md shadow-indigo-600/20 shrink-0">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-indigo-900 font-bold text-sm tracking-tight">Générer une réponse IA</p>
                                        <p class="text-indigo-500/80 text-[10px] uppercase font-bold tracking-wider">Polie, concise
                                            et percutante</p>
                                    </div>
                                </div>
                                <button onclick="generateResponse('{{ $review->id }}')" id="btn-{{ $review->id }}"
                                    class="group relative inline-flex items-center justify-center px-5 py-2.5 text-sm font-semibold text-white transition-all duration-200 bg-indigo-600 border border-transparent rounded-full hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 shadow-md active:scale-95 w-full sm:w-auto">
                                    Générer
                                    <svg class="w-4 h-4 ml-1.5 opacity-70 group-hover:opacity-100 group-hover:translate-x-0.5 transition-all"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach

            <!-- Blurred Paywall Card -->
            <div class="relative mt-12 pb-20">
                <!-- High Fidelity Blurred Mockup -->
                <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 opacity-50 blur-[6px] pointer-events-none select-none">
                    <div class="flex items-start">
                        <div class="w-10 h-10 rounded-full bg-linear-to-br from-slate-200 to-slate-300 shrink-0 shadow-sm"></div>
                        <div class="ml-4 flex-1">
                            <div class="flex items-center justify-between mb-2">
                                <div class="h-4 bg-slate-200 rounded w-1/4"></div>
                                <div class="h-3 bg-slate-100 rounded w-16"></div>
                            </div>
                            <div class="flex gap-0.5 mb-3">
                                @for($i=0;$i<5;$i++)<div class="w-3 h-3 bg-yellow-100 rounded-full"></div>@endfor
                            </div>
                            <div class="space-y-2">
                                <div class="h-3 bg-slate-100 rounded w-full"></div>
                                <div class="h-3 bg-slate-100 rounded w-5/6"></div>
                                <div class="h-3 bg-slate-100 rounded w-2/3"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Mock AI Zone -->
                    <div class="mt-5 ml-14 bg-indigo-50/30 rounded-xl p-4 border border-indigo-100/30">
                        <div class="flex items-center gap-2 mb-3">
                            <div class="w-6 h-6 bg-indigo-100 rounded flex items-center justify-center"></div>
                            <div class="h-3 bg-indigo-100 rounded w-24"></div>
                        </div>
                        <div class="h-16 bg-white/50 rounded-lg border border-indigo-50/50"></div>
                    </div>
                </div>
                
                <!-- CTA Overlay -->
                <div class="absolute inset-0 flex items-center justify-center -top-8 px-4">
                    <div class="bg-white/95 backdrop-blur-xl p-8 sm:p-10 rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.1)] border border-white text-center max-w-sm w-full transform transition-all hover:scale-[1.02] duration-500">
                        <div class="w-20 h-20 bg-indigo-100 rounded-[2rem] flex items-center justify-center text-indigo-600 mb-6 mx-auto shadow-inner">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 mb-3 tracking-tight">Débloquez tout</h3>
                        <p class="text-slate-500 text-sm mb-8 leading-relaxed px-2">Accédez à l'intégralité des avis de votre établissement et gérez votre réputation comme un pro.</p>
                        <button onclick="showSubscriptionModal()" class="w-full py-4 px-6 bg-linear-to-r from-indigo-600 to-violet-600 text-white font-black rounded-2xl shadow-xl shadow-indigo-200 hover:from-indigo-500 hover:to-violet-500 transition-all active:scale-95 cursor-pointer">
                            Récupérer plus d'avis
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Subscription Modal -->
    <div id="subscription-modal" class="fixed inset-0 z-5000 hidden">
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" onclick="hideSubscriptionModal()"></div>
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="relative bg-white rounded-[2.5rem] shadow-2xl max-w-lg w-full overflow-hidden transform transition-all">
                <!-- Close Button -->
                <button onclick="hideSubscriptionModal()" class="absolute top-6 right-6 p-2 text-slate-400 hover:text-slate-600 transition-colors z-20">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>

                <div class="p-8 sm:p-12 text-center">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-indigo-50 rounded-3xl text-indigo-600 mb-6">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                    
                    <h2 class="text-3xl font-black text-slate-900 mb-4 tracking-tight">Passez à la vitesse supérieure</h2>
                    <p class="text-slate-500 text-base mb-8 leading-relaxed">
                        Ne laissez aucun avis sans réponse. Avec <b>ReplyBoost Pro</b>, importez tous vos avis automatiquement et gagnez des heures chaque semaine.
                    </p>

                    <div class="space-y-4 mb-10 text-left">
                        <div class="flex items-center gap-3 bg-slate-50 p-4 rounded-2xl border border-slate-100">
                            <div class="w-8 h-8 bg-green-100 text-green-600 rounded-lg flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <span class="text-slate-700 font-semibold">Avis illimités</span>
                        </div>
                        <div class="flex items-center gap-3 bg-slate-50 p-4 rounded-2xl border border-slate-100">
                            <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <span class="text-slate-700 font-semibold">IA plus rapide & intelligente</span>
                        </div>
                    </div>

                    <button class="w-full py-5 bg-indigo-600 hover:bg-indigo-700 text-white font-black text-lg rounded-2xl shadow-xl shadow-indigo-200 transition-all active:scale-95 mb-4 cursor-pointer">
                        Essayer Pro - 14 jours gratuits
                    </button>
                    <p class="text-slate-400 text-xs">Sans engagement. Annulez à tout moment.</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            async function generateAll() {
                const buttons = document.querySelectorAll('button[id^="btn-"]');
                const btnAll = document.getElementById('btn-generate-all');

                if (btnAll) {
                    btnAll.disabled = true;
                    btnAll.classList.add('opacity-50', 'cursor-not-allowed');
                    btnAll.innerHTML = '<svg class="animate-spin h-3.5 w-3.5 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Génération en cours...';
                }

                const promises = Array.from(buttons)
                    .filter(btn => btn.id !== 'btn-generate-all' && !btn.id.startsWith('btn-copy-')) // Safety filter
                    .map(btn => {
                        const reviewId = btn.id.replace('btn-', '');
                        return generateResponse(reviewId);
                    });

                await Promise.allSettled(promises);

                if (btnAll) {
                    btnAll.remove(); // Hide it when done
                }
            }

            async function generateResponse(reviewId) {
                const btn = document.getElementById(`btn-${reviewId}`);
                const container = document.getElementById(`response-container-${reviewId}`);

                // Loading state with the premium spin design
                const originalText = btn.innerHTML;
                btn.disabled = true;
                btn.innerHTML = `
                                                            <svg class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                                            <span class="ml-2">Rédaction...</span>
                                                        `;
                btn.classList.add('opacity-80', 'cursor-not-allowed');

                try {
                    const response = await fetch(`/reviews/${reviewId}/generate`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    });

                    const data = await response.json();

                    if (data.success) {
                        // Formatting the response with line breaks converted to HTML
                        const formattedResponse = data.response.replace(/\n/g, '<br>');

                        container.innerHTML = `
                                                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-2.5">
                                                                        <div class="flex flex-col">
                                                                            <div class="flex items-center gap-1.5">
                                                                                <span class="px-1.5 py-0.5 bg-indigo-600 text-white text-[9px] font-black rounded uppercase tracking-wide shadow-sm">IA</span>
                                                                                <span class="text-indigo-900 text-xs font-bold">Réponse prête</span>
                                                                            </div>
                                                                        </div>
                                                                        <button onclick="copyToClipboard('${reviewId}', this)" class="text-xs font-semibold text-slate-500 hover:text-indigo-600 flex items-center justify-center bg-white px-2.5 py-1.5 rounded-lg border border-slate-200 shadow-sm transition-all hover:border-indigo-200 hover:shadow active:scale-95 w-full sm:w-auto">
                                                                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg>
                                                                            Copier la réponse
                                                                        </button>
                                                                    </div>
                                                                    <p id="response-text-${reviewId}" class="text-slate-700 text-sm leading-relaxed bg-white/80 p-3.5 rounded-lg border border-indigo-50 shadow-[inset_0_1px_2px_rgba(0,0,0,0.02)] opacity-0 transform translate-y-2 transition-all duration-500">
                                                                        ${formattedResponse}
                                                                    </p>
                                                                `;

                        // Trigger animation for smooth reveal
                        setTimeout(() => {
                            const textEl = document.getElementById(`response-text-${reviewId}`);
                            textEl.classList.remove('opacity-0', 'translate-y-2');
                        }, 50);
                    }
                } catch (error) {
                    console.error('Error:', error);
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                    btn.classList.remove('opacity-80', 'cursor-not-allowed');
                    alert("Un problème est survenu lors de la génération. Veuillez réessayer.");
                }
            }

            function copyToClipboard(reviewId, btnElement) {
                const textElement = document.getElementById(`response-text-${reviewId}`);
                // We use innerText to respect the newlines that were rendered as <br>
                const text = textElement.innerText || textElement.textContent;

                navigator.clipboard.writeText(text).then(() => {
                    const originalHtml = btnElement.innerHTML;
                    btnElement.innerHTML = '<svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copié !';
                    setTimeout(() => {
                        btnElement.innerHTML = originalHtml;
                    }, 2000);
                });
            }

            function showSubscriptionModal() {
                const modal = document.getElementById('subscription-modal');
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function hideSubscriptionModal() {
                const modal = document.getElementById('subscription-modal');
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }

            document.addEventListener('DOMContentLoaded', async () => {
                generateAll();
            })
        </script>
    @endpush
@endsection