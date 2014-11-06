<?php

namespace Uneak\CKTemplateBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class CKTemplateCompilerPass implements CompilerPassInterface {

	public function process(ContainerBuilder $container) {
		if ($container->hasDefinition('cktemplate_chain') === false || $container->hasDefinition('ivory_ck_editor.form.type') === false) {
			return;
		}

		$cktemplate_chain_definition = $container->getDefinition('cktemplate_chain');
		foreach ($container->findTaggedServiceIds('cktemplate.template') as $id => $attributes) {
			$cktemplate_chain_definition->addMethodCall('addTemplate', array(new Reference($id)));
		}
		
		$ivory_ck_editor_form_type_definition = $container->getDefinition('ivory_ck_editor.form.type');
		$ivory_ck_editor_form_type_definition->addMethodCall('setTemplateManager', array(new Reference('cktemplate_manager')));
		
	}

}
