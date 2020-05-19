<?php

class EmailTemplateManager
{

    private $original;

    public function __construct( $template ){
        if( file_exists('../email-templates/'.$template) ) {
            $template = '../email-templates/'.$template;
            $this->original = file_get_contents($template);
        }else{
            throw new \Exception('Email Template does not exist');
        }
    }

    public function swap( $vars ){
        $template = $this->original;
        foreach( $vars as $k=>$v ){
            $template = str_replace('{{'.$k.'}}',$v,$template);
        }
        preg_match_all('/{{file:(.*)}}/',$template,$matches);
        foreach( $matches[1] as $file ){
            $file_contents = ( file_exists($file) ) ? file_get_contents($file) : '';
            $template = str_replace('{{file:'.$file.'}}',$file_contents,$template);
        }
        return $template;
    }
    
}
