<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerGeKuqey\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerGeKuqey/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerGeKuqey.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerGeKuqey\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerGeKuqey\App_KernelDevDebugContainer([
    'container.build_hash' => 'GeKuqey',
    'container.build_id' => 'c8c52085',
    'container.build_time' => 1640518764,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerGeKuqey');