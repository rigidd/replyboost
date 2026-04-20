@extends('layouts.app')

@section('content')
<div class="bg-slate-50 min-h-screen py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Breadcrumb / Back Link -->
        <a href="{{ route('index') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-indigo-600 transition-colors mb-10 group">
            <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Retour à l'accueil
        </a>

        <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
            <!-- Header section -->
            <div class="bg-linear-to-br from-indigo-600 to-violet-700 px-8 py-12 sm:px-12 text-center">
                <h1 class="text-3xl sm:text-4xl font-black text-white tracking-tight mb-4">Mentions Légales</h1>
                <p class="text-indigo-100 text-sm sm:text-base opacity-90 max-w-xl mx-auto">
                    Informations obligatoires concernant l'éditeur et l'hébergeur du site ReplyBoost.
                </p>
            </div>

            <!-- Content section -->
            <div class="px-8 py-12 sm:px-12 prose prose-slate max-w-none prose-headings:text-slate-900 prose-headings:font-black prose-p:text-slate-600 prose-li:text-slate-600 prose-strong:text-indigo-600 prose-hr:border-slate-100 prose-p:leading-relaxed">
                <div class="space-y-16">
                    <section id="section-1">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">1</span>
                            Éditeur du site
                        </h2>
                        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 overflow-x-auto mt-4">
                            <table class="w-full text-sm border-separate border-spacing-y-2">
                                <tr>
                                    <td class="font-bold text-slate-500 w-1/3">Nom et prénom</td>
                                    <td class="text-slate-900">JACQUEMIN Nicolas</td>
                                </tr>
                                <tr>
                                    <td class="font-bold text-slate-500">Statut</td>
                                    <td class="text-slate-900">Entrepreneur individuel (auto-entrepreneur)</td>
                                </tr>
                                <tr>
                                    <td class="font-bold text-slate-500">Adresse</td>
                                    <td class="text-slate-900">11 rue du haut marais 59230 Sars-et-rosières</td>
                                </tr>
                                <tr>
                                    <td class="font-bold text-slate-500">Numéro SIRET</td>
                                    <td class="text-slate-900">92446658400027</td>
                                </tr>
                                <tr>
                                    <td class="font-bold text-slate-500">Email</td>
                                    <td class="text-slate-900"><a href="mailto:contact@nicolasjacquemin.com" class="text-indigo-600 no-underline hover:underline">contact@nicolasjacquemin.com</a></td>
                                </tr>
                            </table>
                        </div>
                    </section>

                    <section id="section-2">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">2</span>
                            Directeur de la publication
                        </h2>
                        <p class="mt-4">
                            Le directeur de la publication du site ReplyBoost est <strong>JACQUEMIN Nicolas</strong>.
                        </p>
                    </section>

                    <section id="section-3">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">3</span>
                            Hébergement
                        </h2>
                        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 mt-4 text-sm leading-relaxed">
                            <p class="m-0 font-bold text-slate-900 mb-2">Oracle France</p>
                            <p class="text-slate-600 mb-1">15 boulevard Charles de Gaulle</p>
                            <p class="text-slate-600 mb-1">92715 Colombes Cedex, France</p>
                            <p class="text-slate-600 mb-3"><a href="https://www.oracle.com" target="_blank" class="text-indigo-600 underline">www.oracle.com</a></p>
                            
                            <div class="pt-3 border-t border-slate-200">
                                <p class="text-xs text-slate-500 italic">
                                    Infrastructure : Oracle Cloud Infrastructure – région France Central (Paris, eu-paris-1)
                                </p>
                            </div>
                        </div>
                    </section>

                    <section id="section-4">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">4</span>
                            Propriété intellectuelle
                        </h2>
                        <p class="mt-4">
                            L’ensemble du contenu du présent site (textes, images, logos, structure logicielle, etc.) est la propriété exclusive de l’éditeur, sauf mention contraire explicite. 
                        </p>
                        <p class="mt-2">
                            Toute reproduction, distribution, modification ou utilisation de ces éléments sans l'autorisation écrite préalable de l’éditeur est strictement interdite et peut donner lieu à des poursuites.
                        </p>
                    </section>

                    <section id="section-5">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">5</span>
                            Responsabilité
                        </h2>
                        <p class="mt-4">
                            L’éditeur s’efforce de fournir des informations aussi précises que possible. Toutefois, il ne pourra être tenu responsable :
                        </p>
                        <ul class="list-disc pl-5 space-y-2 mt-4">
                            <li>Des éventuelles omissions ou inexactitudes dans les informations diffusées.</li>
                            <li>Des interruptions de service ou dysfonctionnements techniques du site.</li>
                            <li>De l'usage fait par l'utilisateur des réponses générées par l'intelligence artificielle.</li>
                        </ul>
                    </section>

                    <section id="section-6">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">6</span>
                            Données personnelles
                        </h2>
                        <p class="mt-4">
                            Les données personnelles collectées sur le site sont traitées avec la plus grande confidentialité, conformément à notre <a href="{{ route('privacy') }}" class="text-indigo-600 font-bold underline">Politique de confidentialité</a> accessible sur le site.
                        </p>
                    </section>

                    <section id="section-7">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">7</span>
                            Contact
                        </h2>
                        <p class="mt-4">
                            Pour toute question ou demande d'information, vous pouvez nous contacter par email à l'adresse suivante : 
                            <a href="mailto:contact@nicolasjacquemin.com" class="text-indigo-600 font-bold underline">contact@nicolasjacquemin.com</a>
                        </p>
                    </section>
                </div>
            </div>

            <div class="bg-slate-50 px-8 py-8 sm:px-12 border-t border-slate-100 text-center">
                <p class="text-slate-400 text-xs italic">
                    ReplyBoost — La technologie au service de votre réputation locale.
                </p>
            </div>
        </div>

        <div class="mt-12 text-center text-slate-400 text-sm">
            <p>&copy; 2026 ReplyBoost. Transparence et Professionnalisme.</p>
        </div>
    </div>
</div>
@endsection
