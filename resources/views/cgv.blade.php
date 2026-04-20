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
                <h1 class="text-3xl sm:text-4xl font-black text-white tracking-tight mb-4">Conditions Générales de Vente</h1>
                <p class="text-indigo-100 text-sm sm:text-base opacity-90 max-w-xl mx-auto">
                    Dernière mise à jour : 20 avril 2026. Merci d'utiliser ReplyBoost pour gérer votre réputation en ligne.
                </p>
            </div>

            <!-- Content section -->
            <div class="px-8 py-12 sm:px-12 prose prose-slate max-w-none prose-headings:text-slate-900 prose-headings:font-black prose-p:text-slate-600 prose-li:text-slate-600 prose-strong:text-indigo-600 prose-hr:border-slate-100 prose-p:leading-relaxed">
                <div class="space-y-16">
                    <section id="section-1">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">1</span>
                            Objet
                        </h2>
                        <p class="mt-4">
                            Les présentes Conditions Générales de Vente (CGV) régissent l’accès et l’utilisation du service SaaS <strong>“ReplyBoost”</strong>, permettant la génération de réponses automatisées aux avis clients via une interface d'intelligence artificielle.
                        </p>
                    </section>

                    <section id="section-2">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">2</span>
                            Éditeur
                        </h2>
                        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 overflow-x-auto mt-4">
                            <table class="w-full text-sm border-separate border-spacing-y-2">
                                <tr>
                                    <td class="font-bold text-slate-500 w-1/3">Nom</td>
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
                                    <td class="font-bold text-slate-500">Email</td>
                                    <td class="text-slate-900"><a href="mailto:contact@nicolasjacquemin.com" class="text-indigo-600 no-underline hover:underline">contact@nicolasjacquemin.com</a></td>
                                </tr>
                                <tr>
                                    <td class="font-bold text-slate-500">SIRET</td>
                                    <td class="text-slate-900">92446658400027</td>
                                </tr>
                            </table>
                        </div>
                    </section>

                    <section id="section-3">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">3</span>
                            Description du service
                        </h2>
                        <p class="mt-4">ReplyBoost permet à l’utilisateur de :</p>
                        <ul class="list-none pl-0 space-y-3 mt-4">
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Analyser des avis clients provenant de sources publiques.
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Générer des réponses automatiques basées sur l'intelligence artificielle.
                            </li>
                        </ul>
                        <p class="mt-4">Le service est accessible exclusivement en ligne et nécessite la souscription à un abonnement payant.</p>
                    </section>

                    <section id="section-4">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">4</span>
                            Prix
                        </h2>
                        <div class="flex items-center justify-between bg-indigo-600 rounded-2xl p-8 text-white mb-6 mt-4">
                            <div>
                                <p class="text-indigo-200 text-sm font-bold uppercase tracking-wider mb-1">Tarif Unique</p>
                                <h3 class="text-4xl font-black m-0 text-white">19,99€ <span class="text-lg font-normal opacity-80">/ mois</span></h3>
                            </div>
                            <div class="text-right hidden sm:block">
                                <p class="text-xs text-indigo-100 opacity-80 leading-relaxed italic">TVA non applicable, <br>article 293B du CGI</p>
                            </div>
                        </div>
                        <p>
                            L’éditeur se réserve le droit de modifier ses prix à tout moment. Le prix applicable est celui en vigueur au moment de la souscription par l'utilisateur.
                        </p>
                    </section>

                    <section id="section-5">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">5</span>
                            Paiement
                        </h2>
                        <p class="mt-4">
                            Le paiement est effectué via un prestataire de paiement sécurisé. L’abonnement est facturé mensuellement à la date anniversaire de la souscription, avec un <strong>renouvellement automatique</strong>.
                        </p>
                    </section>

                    <section id="section-6">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">6</span>
                            Abonnement
                        </h2>
                        <p class="mt-4">L'abonnement ReplyBoost :</p>
                        <ul class="list-none pl-0 space-y-3 mt-4">
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Est sans aucun engagement de durée.
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Est reconduit automatiquement chaque mois par défaut.
                            </li>
                        </ul>
                    </section>

                    <section id="section-7">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">7</span>
                            Résiliation
                        </h2>
                        <p class="mt-4">
                            L’utilisateur peut résilier son abonnement à tout moment via son espace client ou par notification directe. La résiliation prend effet à la <strong>fin de la période en cours</strong>. Aucun remboursement n’est effectué pour la période déjà payée mais non utilisée.
                        </p>
                    </section>

                    <section id="section-8">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">8</span>
                            Droit de rétractation
                        </h2>
                        <p class="mt-4">
                            Conformément à la législation en vigueur, l’utilisateur dispose normalement d’un délai de 14 jours pour se rétracter. Toutefois, en accédant immédiatement au service numérique après paiement, <strong>l’utilisateur accepte expressément de renoncer à son droit de rétractation</strong>.
                        </p>
                    </section>

                    <section id="section-9">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">9</span>
                            Responsabilité
                        </h2>
                        <p class="mt-4">
                            Le service est fourni “tel quel”. L’éditeur ne peut être tenu responsable :
                        </p>
                        <ul class="list-disc pl-5 space-y-2 mt-4">
                            <li>De l’exactitude ou de la pertinence des réponses générées par l'IA.</li>
                            <li>Des résultats obtenus en termes de réputation, d'image de marque ou de référencement local.</li>
                        </ul>
                    </section>

                    <section id="section-10">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">10</span>
                            Disponibilité
                        </h2>
                        <p class="mt-4">
                            L'accès au service est permanent, sauf interventions de maintenance technique ou pannes imprévues des serveurs. L’éditeur s'efforce de maintenir une disponibilité maximale.
                        </p>
                    </section>

                    <section id="section-11">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">11</span>
                            Données personnelles
                        </h2>
                        <p class="mt-4">
                            Toutes les données collectées sont traitées avec la plus grande confidentialité et conformément à notre politique de protection des données, en respect du RGPD.
                        </p>
                    </section>

                    <section id="section-12">
                        <h2 class="text-2xl flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 text-sm">12</span>
                            Droit applicable
                        </h2>
                        <p class="mt-4">Les présentes CGV sont soumises au <strong>droit français</strong>.</p>
                    </section>
                </div>
            </div>

            <div class="bg-slate-50 px-8 py-8 sm:px-12 border-t border-slate-100 text-center">
                <p class="text-slate-400 text-xs">
                    ReplyBoost est une plateforme éditée avec soin pour les entrepreneurs ambitieux.
                </p>
            </div>
        </div>

        <div class="mt-12 text-center text-slate-400 text-sm">
            <p>&copy; 2026 ReplyBoost. Tous droits réservés.</p>
        </div>
    </div>
</div>
@endsection
