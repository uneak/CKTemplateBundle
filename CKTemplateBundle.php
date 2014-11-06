<?php

namespace Uneak\CKTemplateBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Uneak\CKTemplateBundle\DependencyInjection\Compiler\CKTemplateCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class CKTemplateBundle extends Bundle {

	public function build(ContainerBuilder $container) {
		parent::build($container);
		$container->addCompilerPass(new CKTemplateCompilerPass());
	}

}
