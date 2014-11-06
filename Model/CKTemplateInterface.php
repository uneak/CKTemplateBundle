<?php

namespace Uneak\CKTemplateBundle\Model;

interface CKTemplateInterface {
	public function getTitle();
	public function getImage();
	public function getDescription();
	public function getHtml();
}
