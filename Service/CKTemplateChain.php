<?php

namespace Uneak\CKTemplateBundle\Service;

use Uneak\CKTemplateBundle\Model\CKTemplateInterface;

class CKTemplateChain {

	protected $templates;

	public function __construct() {
		$this->templates = array();
	}

	public function addTemplate(CKTemplateInterface $template) {
		$this->templates[] = $template;
	}

	public function getTemplates() {

		$templates = array();
		foreach ($this->templates as $ckTemplate) {
			$templates[] = array(
				'title' => $ckTemplate->getTitle(),
				'image' => $ckTemplate->getImage(),
				'description' => $ckTemplate->getDescription(),
				'html' => $ckTemplate->getHtml(),
			);
		}

		return array(
			'CKTemplate_templates' => array(
				'imagesPath' => '',
				'templates' => $templates,
			),
		);
	}

}
