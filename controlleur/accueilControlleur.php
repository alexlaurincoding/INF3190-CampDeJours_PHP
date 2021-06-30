<?php

/**
 * Controlleur Accueil (par défaut)
 */

function index($param){
    Vue::render('accueil');
}

function description($param){
    Vue::render('description');
}

function contact($param){
    Vue::render('contact');
}

function inscription($param){
    Vue::render('inscription');
}