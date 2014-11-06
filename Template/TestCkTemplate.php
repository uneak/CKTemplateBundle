<?php

namespace Noviris\CKTemplateBundle\Template;

use Noviris\CKTemplateBundle\Model\CKTemplateTwig;

class TestCkTemplate extends CKTemplateTwig {
	
	public function __construct($twig, $parameters = array()) {
		parent::__construct($twig, $parameters);
		
		$this->addParameter("firstName", "Marc");
		
		$this->setTitle("test {{ firstName }} template");
		$this->setDescription("ceci est un template de {{ firstName ~ ' ' ~ lastName }}");
		$this->setImage("image.jpg");
		$this->setHtml("CKTemplateBundle:Template:test.html.twig");
	}

}
