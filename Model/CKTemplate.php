<?php

namespace Uneak\CKTemplateBundle\Model;

use Uneak\CKTemplateBundle\Model\CKTemplateInterface;

class CKTemplate implements CKTemplateInterface {

	protected $title;
	protected $image;
	protected $description;
	protected $html;

	public function getTitle() {
		return $this->title;
	}

	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}

	public function getImage() {
		return $this->title;
	}

	public function setImage($image) {
		$this->image = $image;
		return $this;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;
		return $this;
	}

	public function getHtml() {
		return $this->html;
	}

	public function setHtml($html) {
		$this->html = $html;
		return $this;
	}

}
