<?php

namespace Uneak\CKTemplateBundle\Model;

use Uneak\CKTemplateBundle\Model\CKTemplate;

class CKTemplateTwig extends CKTemplate {

	protected $parameters;
	protected $twig;

	public function __construct($twig, $parameters = array()) {
		$this->parameters = $parameters;
		$this->twig = $twig;
	}

	public function addParameter($key, $value) {
		$this->parameters[$key] = $value;
		return $this;
	}

	public function removeParameter($key) {
		unset($this->parameters[$key]);
		return $this;
	}

	public function setParameters($parameters) {
		$this->parameters = array_merge($this->parameters, $parameters);
		return $this;
	}

	public function getParameters() {
		return $this->parameters;
	}

	
	public function getTitle() {
		return $this->twig->render($this->title, $this->parameters);
	}

	public function getPlainTitle() {
		return $this->title;
	}
	
	
	public function getDescription() {
		return $this->twig->render($this->description, $this->parameters);
	}

	public function getPlainDescription() {
		return $this->description;
	}
	
	public function getHtml() {
		return $this->twig->render($this->html, $this->parameters);
	}

	public function getPlainHtml() {
		return $this->html;
	}

}
