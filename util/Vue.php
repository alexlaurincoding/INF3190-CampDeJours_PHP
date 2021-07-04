<?php 
class Vue {
    public static function render($vue, $template = "template"){
        ob_start();
        require('vue/' . $vue . '.php');
        $contenu = ob_get_clean();
        require('vue/' . $template . '.php');
    }

    public static function loadModals(...$modals){
        foreach($modals as $modal){
            require("vue/modals/" . $modal . ".php");
        }
    }
}