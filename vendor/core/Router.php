<?php

class Router
{
    static public function parse($url, $request)
    {
        $explode_url = explode('/', $url);

        if(!$explode_url[0]){
            //removendo o espaco vazio da primeira posicao do explode
            $explode_url = array_slice($explode_url, 1, sizeof($explode_url));
        }

        $request->controller = ucfirst($explode_url[0]);
        $request->action = $explode_url[1]."Action";
        $request->params = [];

        if(sizeof($explode_url) > 2){
            $request->params = array_slice($explode_url, 3);
        }
    }

}