@extends('layouts.dashboard')

@section('content')
<div class="px-6 lg:px-12 py-8 lg:py-12 max-w-5xl mx-auto">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 mb-12">
        <div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tight mb-1">Avis clients</h1>
            <p class="text-slate-500 font-bold text-sm">Gérez et répondez aux avis de {{ $place->name }}.</p>
        </div>
        
        @php
            $pendingCount = $reviews->whereNull('response')->count();
        @endphp

        @if($pendingCount > 0)
            <button onclick="generateAll()" id="btn-generate-all" class="flex items-center gap-3 px-8 py-4 bg-linear-to-r from-indigo-600 to-violet-600 text-white text-sm font-black rounded-2xl shadow-xl shadow-indigo-100 hover:shadow-indigo-300 transition-all active:scale-95 group">
                <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                </svg>
                Générer pour tout ({{ $pendingCount }})
            </button>
        @endif
    </div>

    <!-- Reviews Filter (Simple Visual) -->
    <div class="flex items-center gap-6 mb-8 border-b border-slate-100 text-sm overflow-x-auto no-scrollbar">
        <button class="pb-4 text-indigo-600 font-black border-b-2 border-indigo-600 whitespace-nowrap">Tous les avis ({{ $reviews->count() }})</button>
        <button class="pb-4 text-slate-400 font-bold hover:text-slate-600 transition-colors whitespace-nowrap">Non traités</button>
        <button class="pb-4 text-slate-400 font-bold hover:text-slate-600 transition-colors whitespace-nowrap" disabled>Archives</button>
    </div>

    <!-- List -->
    <div class="space-y-6">
        @forelse($reviews as $review)
            <div id="review-{{ $review->id }}" class="bg-white rounded-[2rem] p-6 sm:p-8 shadow-sm border border-slate-100/60 transition-all hover:shadow-xl hover:shadow-slate-200/30 group">
                <div class="flex flex-col sm:flex-row items-start gap-6">
                    <!-- Author Avatar -->
                    @if($review->author_photo)
                        <img src="{{ $review->author_photo }}" class="w-14 h-14 rounded-2xl border-4 border-slate-50 shadow-sm shrink-0 object-cover" alt="" />
                    @else
                        <div class="w-14 h-14 rounded-2xl bg-linear-to-br from-indigo-50 to-indigo-100 border-4 border-white flex items-center justify-center text-indigo-600 text-xl font-black shadow-sm shrink-0">
                            {{ strtoupper(substr($review->author_name, 0, 1)) }}
                        </div>
                    @endif

                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between mb-2">
                            <div>
                                <h4 class="text-base font-black text-slate-900 tracking-tight">{{ $review->author_name }}</h4>
                                <div class="flex items-center gap-2 text-[10px] font-black text-slate-400 uppercase tracking-widest mt-0.5">
                                    <span>{{ $review->review_date }}</span>
                                    <span>•</span>
                                    <div class="flex gap-0.5 text-yellow-400">
                                        @for($i=0;$i<$review->rating;$i++)★@endfor
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class="text-slate-600 text-sm leading-relaxed mb-6 font-medium">
                            {{ $review->content }}
                        </p>

                        <!-- Response Area -->
                        <div id="response-container-{{ $review->id }}" class="bg-slate-50/80 rounded-2xl p-5 border border-slate-100 transition-all duration-300">
                            @if($review->response)
                                <div class="flex items-center justify-between gap-4 mb-4">
                                     <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Réponse enregistrée</span>
                                     </div>
                                     <button onclick="copyToClipboard('{{ $review->id }}', this)" class="text-[11px] font-black text-indigo-600 hover:text-indigo-700 underline px-2 py-1">Copier</button>
                                </div>
                                <p id="response-text-{{ $review->id }}" class="text-slate-800 text-sm leading-relaxed font-bold">
                                    {!! nl2br(e($review->response)) !!}
                                </p>
                            @else
                                <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 bg-white rounded-xl shadow-sm border border-slate-100 flex items-center justify-center text-indigo-600">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                            </svg>
                                        </div>
                                        <div class="text-left">
                                            <p class="text-indigo-900 font-black text-sm tracking-tight leading-none mb-1">Prêt à répondre</p>
                                            <p class="text-slate-400 text-[10px] font-bold uppercase tracking-wider">Génération IA disponible</p>
                                        </div>
                                    </div>
                                    <button onclick="generateResponse('{{ $review->id }}')" id="btn-{{ $review->id }}" class="w-full sm:w-auto px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-black rounded-xl shadow-lg transition-all active:scale-95 whitespace-nowrap">
                                        Générer la réponse
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
             <div class="py-20 text-center">
                 <div class="w-20 h-20 bg-slate-100 rounded-3xl flex items-center justify-center text-slate-300 mx-auto mb-6">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                 </div>
                 <h3 class="text-xl font-black text-slate-800 mb-2">Aucun avis trouvé</h3>
                 <p class="text-slate-500 font-medium">Nous n'avons pas encore récupéré d'avis pour votre établissement.</p>
             </div>
        @endforelse
    </div>
</div>
@endsection

@push('scripts')
<script>
    async function generateAll() {
        const buttons = document.querySelectorAll('button[id^="btn-"]');
        const btnAll = document.getElementById('btn-generate-all');
        
        if (btnAll) {
            btnAll.disabled = true;
            btnAll.classList.add('opacity-50', 'cursor-not-allowed');
            btnAll.innerHTML = '<svg class="animate-spin h-5 w-5 mr-3 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Génération...';
        }

        const promises = Array.from(buttons)
            .filter(btn => btn.id !== 'btn-generate-all')
            .map(btn => {
                const reviewId = btn.id.replace('btn-', '');
                return generateResponse(reviewId);
            });

        await Promise.allSettled(promises);
        if (btnAll) btnAll.remove();
    }

    async function generateResponse(reviewId) {
        const btn = document.getElementById(`btn-${reviewId}`);
        const container = document.getElementById(`response-container-${reviewId}`);
        
        const originalText = btn?.innerHTML;
        if (btn) {
            btn.disabled = true;
            btn.innerHTML = '<svg class="animate-spin h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
        }

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
                const formatted = data.response.replace(/\n/g, '<br>');
                container.innerHTML = `
                    <div class="flex items-center justify-between gap-4 mb-4">
                         <div class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-indigo-600 rounded-full"></div>
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Réponse générée à l'instant</span>
                         </div>
                         <button onclick="copyToClipboard('${reviewId}', this)" class="text-[11px] font-black text-indigo-600 hover:text-indigo-700 underline px-2 py-1">Copier</button>
                    </div>
                    <p id="response-text-${reviewId}" class="text-slate-800 text-sm leading-relaxed font-bold opacity-0 translate-y-2 transition-all duration-500">
                        ${formatted}
                    </p>
                `;
                setTimeout(() => {
                    const textEl = document.getElementById(`response-text-${reviewId}`);
                    textEl.classList.remove('opacity-0', 'translate-y-2');
                }, 50);
            }
        } catch (error) {
            console.error(error);
            if (btn) {
                btn.disabled = false;
                btn.innerHTML = originalText;
            }
        }
    }

    function copyToClipboard(reviewId, btnElement) {
        const textElement = document.getElementById(`response-text-${reviewId}`);
        const text = textElement.innerText || textElement.textContent;

        navigator.clipboard.writeText(text).then(() => {
            const originalText = btnElement.innerText;
            btnElement.innerText = 'Copié !';
            btnElement.classList.add('text-green-600');
            setTimeout(() => {
                btnElement.innerText = originalText;
                btnElement.classList.remove('text-green-600');
            }, 2000);
        });
    }
</script>
@endpush
