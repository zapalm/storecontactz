<?php
/**
 * Store contacts: module for PrestaShop 1.5
 *
 * @author      zapalm <zapalm@ya.ru>
 * @copyright   (c) 2013-2016, zapalm
 * @link        http://prestashop.modulez.ru/en/frontend-features/39-store-contacts.html The module's homepage
 * @license     http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 */

require_once(_PS_MODULE_DIR_ . 'storecontactz/storecontactz.php');

/**
 * Contacts page controller.
 *
 * @property-read StoreContactz $module
 */
class StoreContactzPageModuleFrontController extends ModuleFrontController
{
    /**
     * @inheritdoc
     */
    public function __construct() {
        parent::__construct();
		$this->context = Context::getContext();
    }

    /**
     * @inheritdoc
     */
    public function init() {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function setMedia() {
        parent::setMedia();
    }

    /**
     * @inheritdoc
     */
    public function initContent() {
        parent::initContent();

        $this->initTemplate();
    }

    /**
     * Initiate template.
     */
    public function initTemplate() {
        $this->context->smarty->assign(array(
            'storeContacts' => $this->module->getContacts(),
            'page'          => true,
        ));

        $this->setTemplate('page.tpl');
    }
}