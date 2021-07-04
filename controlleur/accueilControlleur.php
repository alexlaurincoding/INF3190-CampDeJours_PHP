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
    if(Session::isConnecte()){
        if(Session::isAdmin()){
            Util::redirectControlleur("admin", "index");
        }else{
            Util::redirectControlleur("parent", "index");
        }
    }else{
        Vue::render('inscription');
    }
}