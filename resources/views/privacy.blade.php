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
                <h1 class="text-3xl sm:text-4xl font-black text-white tracking-tight mb-4">Politique de confidentialité</h1>
                <p class="text-indigo-100 text-sm sm:text-base opacity-90 max-w-xl mx-auto">
                    Dernière mise à jour : 20 avril 2026. Nous accordons une importance capitale à la protection de vos données.
                </p>
            </div>

            <!-- Content section -->
            <div class="px-8 py-12 sm:px-12 prose prose-slate max-w-none prose-headings:text-slate-900 prose-headings:font-black prose-p:text-slate-600 prose-li:text-slate-600 prose-strong:text-indigo-600 prose-hr:border-slate-100 prose-p:leading-relaxed">
                <div class="space-y-16">
                    <section id="section-1">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">1</span>
                            Responsable du traitement
                        </h2>
                        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 overflow-x-auto mt-4">
                            <table class="w-full text-sm border-separate border-spacing-y-2">
                                <tr>
                                    <td class="font-bold text-slate-500 w-1/3">Nom</td>
                                    <td class="text-slate-900">JACQUEMIN Nicolas</td>
                                </tr>
                                <tr>
                                    <td class="font-bold text-slate-500">Statut</td>
                                    <td class="text-slate-900">Auto-entrepreneur</td>
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
                            Données collectées
                        </h2>
                        <p class="mt-4">Nous collectons les données suivantes :</p>
                        <ul class="list-none pl-0 space-y-3 mt-4">
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                Votre adresse email (pour l'authentification et les notifications).
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                Données liées à l’utilisation du service (statistiques d'utilisation).
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                Informations de paiement (traitées de manière sécurisée par un prestataire externe).
                            </li>
                        </ul>
                    </section>

                    <section id="section-3">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">3</span>
                            Finalité
                        </h2>
                        <p class="mt-4">Les données sont collectées et utilisées exclusivement pour :</p>
                        <ul class="list-disc pl-5 space-y-2 mt-4">
                            <li>Fournir et maintenir le service ReplyBoost.</li>
                            <li>Gérer vos abonnements et la facturation.</li>
                            <li>Améliorer en continu le produit et l'expérience utilisateur.</li>
                        </ul>
                    </section>

                    <section id="section-4">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">4</span>
                            Base légale
                        </h2>
                        <p class="mt-4">Le traitement de vos données est basé sur :</p>
                        <ul class="list-none pl-0 space-y-3 mt-4">
                            <li class="flex items-start gap-3">
                                <div class="w-5 h-5 mt-1 bg-green-100 text-green-600 rounded flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span><strong>L’exécution du contrat :</strong> Nécessaire pour vous fournir l'accès au service souscrit.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="w-5 h-5 mt-1 bg-green-100 text-green-600 rounded flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span><strong>L’intérêt légitime :</strong> Pour l'amélioration technique et fonctionnelle de la plateforme.</span>
                            </li>
                        </ul>
                    </section>

                    <section id="section-5">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">5</span>
                            Conservation
                        </h2>
                        <p class="mt-4">
                            Les données personnelles sont conservées <strong>pendant toute la durée d’utilisation</strong> active du service. En cas de résiliation, les données sont supprimées ou anonymisées après un délai légal raisonnable, sauf obligation légale contraire.
                        </p>
                    </section>

                    <section id="section-6">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">6</span>
                            Partage
                        </h2>
                        <p class="mt-4">
                            Vos données peuvent être partagées avec des prestataires techniques tiers (hébergement, paiement, IA) strictement nécessaires au fonctionnement du service. 
                        </p>
                        <div class="bg-rose-50 border border-rose-100 rounded-2xl p-4 flex items-center gap-3 mt-4">
                            <div class="w-10 h-10 bg-rose-100 text-rose-600 rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <p class="m-0 text-rose-900 font-bold text-sm">Aucune donnée n’est vendue à des tiers ou utilisée à des fins publicitaires.</p>
                        </div>
                    </section>

                    <section id="section-7">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">7</span>
                            Sécurité
                        </h2>
                        <p class="mt-4">
                            Des mesures techniques et organisationnelles rigoureuses sont mises en place pour protéger vos données contre tout accès non autorisé, perte ou altération. Nous utilisons des protocoles de chiffrement standards.
                        </p>
                    </section>

                    <section id="section-8">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">8</span>
                            Vos droits
                        </h2>
                        <p class="mt-4">Conformément au RGPD, vous disposez des droits suivants :</p>
                        <ul class="list-disc pl-5 space-y-2 mt-4">
                            <li>Droit d'accès à vos données personnelles.</li>
                            <li>Droit de demander leur modification ou rectification.</li>
                            <li>Droit de demander leur suppression totale (droit à l’oubli).</li>
                        </ul>
                        <p class="mt-6">Pour exercer ces droits, contactez-nous à : <a href="mailto:contact@nicolasjacquemin.com" class="text-indigo-600 font-bold underline">contact@nicolasjacquemin.com</a></p>
                    </section>

                    <section id="section-9">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">9</span>
                            Cookies
                        </h2>
                        <p class="mt-4">
                            Le site peut utiliser des cookies dits "techniques" essentiels à votre navigation et des cookies d'analyse pour mesurer l'audience et améliorer nos services. Vous pouvez gérer ces préférences via votre navigateur.
                        </p>
                    </section>

                    <section id="section-10">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">10</span>
                            Modification
                        </h2>
                        <p class="mt-4">
                            Cette politique de confidentialité peut être modifiée à tout moment pour refléter les évolutions technologiques ou réglementaires. La version en vigueur est toujours celle publiée sur cette page.
                        </p>
                    </section>
                </div>
            </div>

            <div class="bg-slate-50 px-8 py-8 sm:px-12 border-t border-slate-100 text-center">
                <p class="text-slate-400 text-xs italic">
                    La protection de votre vie privée est au cœur de notre engagement.
                </p>
            </div>
        </div>

        <div class="mt-12 text-center text-slate-400 text-sm">
            <p>&copy; 2026 ReplyBoost. Confiance & Transparence.</p>
        </div>
    </div>
</div>
@endsection
