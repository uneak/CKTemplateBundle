<?php

namespace Uneak\CKTemplateBundle\Model;

use Ivory\CKEditorBundle\Exception\TemplateManagerException;
use Ivory\CKEditorBundle\Model\TemplateManager as ivoryTemplateManager;
use Uneak\CKTemplateBundle\Service\CKTemplateChain;

class CKTemplateManager extends ivoryTemplateManager {

	protected $ckTemplateChain;

	public function __construct(CKTemplateChain $ckTemplateChain, array $templates = array()) {
		parent::__construct($templates);
		$this->ckTemplateChain = $ckTemplateChain;
	}

	/**
	 * {@inheritdoc}
	 */
	public function hasTemplates() {
		$ckTemplates = $this->ckTemplateChain->getTemplates();
		$hasTemplates = parent::hasTemplates();
		return $hasTemplates && !!$ckTemplates;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getTemplates() {
		$ckTemplates = $this->ckTemplateChain->getTemplates();
		$templates = parent::getTemplates();
		return array_merge($templates, $ckTemplates);
	}


	/**
	 * {@inheritdoc}
	 */
	public function hasTemplate($name) {
		$has = parent::hasTemplate($name);
		if (!$has) {
			$ckTemplates = $this->ckTemplateChain->getTemplates();
			$has = isset($ckTemplates[$name]);
		}
		return $has;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getTemplate($name) {
		if (!$this->hasTemplate($name)) {
			throw TemplateManagerException::templateDoesNotExist($name);
		}

		$template = parent::getTemplate($name);
		if (!$template) {
			$ckTemplates = $this->ckTemplateChain->getTemplates();
			$template = $ckTemplates[$name];
		}
		return $template;
	}

}
