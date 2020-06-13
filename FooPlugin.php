<?php

class FooPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = [
        'initialize',
        'install',
        'uninstall',
    ];

    protected $_options = [
        'foo_bar' => 'baz',
    ];

    public function hookInitialize()
    {
        $events = Zend_EventManager_StaticEventManager::getInstance();
        $events->attach('OmekaCli', 'commands', function () {
            return ['Foo_Bar'];
        });
    }

    public function hookInstall()
    {
        $this->_installOptions();
    }

    public function hookUninstall()
    {
        $this->_uninstallOptions();
    }
}
