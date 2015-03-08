<?php

namespace twigger;

class Twigger{
	
	private $loader;
	private $twig;

	public function __construct($path = array()){
		$path = array_merge($path, array(__DIR__.'/error', __DIR__.'/../../../src/templates'));
		$this->loader = new \Twig_Loader_Filesystem($path);
		$this->twig = new \Twig_Environment($this->loader, array(
		    'cache' => false,
		));
	}

	public function render($template, $params = array()){
		try {
			echo $this->twig->render($template, $params);
		} catch (\Twig_Error $e) {
			echo $this->twig->render('error.html.twig', array('error' => $e, 'errorType' => get_class($e)));
		}
	}

}