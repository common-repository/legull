<?php
/**
 Admin Page Framework v3.5.6 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/admin-page-framework>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
abstract class Legull_AdminPageFramework_NetworkAdmin extends Legull_AdminPageFramework {
    protected $_aBuiltInRootMenuSlugs = array('dashboard' => 'index.php', 'sites' => 'sites.php', 'themes' => 'themes.php', 'plugins' => 'plugins.php', 'users' => 'users.php', 'settings' => 'settings.php', 'updates' => 'update-core.php',);
    public function __construct($sOptionKey = null, $sCallerPath = null, $sCapability = 'manage_network', $sTextDomain = 'admin-page-framework') {
        if (!$this->_isInstantiatable()) {
            return;
        }
        add_action('network_admin_menu', array($this, '_replyToBuildMenu'), 98);
        $sCallerPath = $sCallerPath ? $sCallerPath : Legull_AdminPageFramework_Utility::getCallerScriptPath(__FILE__);
        $this->oProp = new Legull_AdminPageFramework_Property_NetworkAdmin($this, $sCallerPath, get_class($this), $sOptionKey, $sCapability, $sTextDomain);
        parent::__construct($sOptionKey, $sCallerPath, $sCapability, $sTextDomain);
    }
    protected function _isInstantiatable() {
        if (isset($GLOBALS['pagenow']) && 'admin-ajax.php' === $GLOBALS['pagenow']) {
            return false;
        }
        if (is_network_admin()) {
            return true;
        }
        return false;
    }
    static public function getOption($sOptionKey, $asKey = null, $vDefault = null) {
        return Legull_AdminPageFramework_WPUtility::getSiteOption($sOptionKey, $asKey, $vDefault);
    }
}