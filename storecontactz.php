<?php
/**
 * Store contacts: module for PrestaShop 1.5
 *
 * @author      zapalm <zapalm@ya.ru>
 * @copyright   (c) 2013-2016, zapalm
 * @link        http://prestashop.modulez.ru/en/frontend-features/39-store-contacts.html The module's homepage
 * @license     http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 */

if (!defined('_PS_VERSION_'))
	exit;

class StoreContactz extends Module
{
	protected static $storeContacts;

	/**
	 * @inheritdoc
	 */
	public function __construct()
	{
		$this->name          = 'storecontactz';
		$this->tab           = 'front_office_features';
		$this->version       = '1.0.0';
		$this->author        = 'zapalm';
		$this->need_instance = 0;
		//$this->ps_versions_compliancy = array('min' => '1.5.0.0');

		parent::__construct();

		$this->displayName = $this->l('Store contacts');
		$this->description = $this->l('Allows to display store contact information in a block, footer and separate page.');
	}

	/**
	 * @inheritdoc
	 */
	public function install()
	{
		return parent::install()
			&& $this->registerHook('displayHeader')
			&& $this->registerHook('displayFooter')
			&& $this->registerHook('displayRightColumn')
			&& $this->registerHook('displayTop')
		;
	}

	/**
	 * @inheritdoc
	 */
	public function uninstall()
	{
		return parent::uninstall();
	}

	/**
	 * Get contacts.
	 *
	 * @return string[]
	 */
	public function getContacts()
	{
		if (self::$storeContacts === null) {
			self::$storeContacts = Configuration::getMultiple(array(
				'PS_SHOP_NAME',
				'PS_SHOP_EMAIL',
				'PS_SHOP_DETAILS',
				'PS_SHOP_ADDR1',
				'PS_SHOP_ADDR2',
				'PS_SHOP_CODE',
				'PS_SHOP_CITY',
				'PS_SHOP_COUNTRY',
				'PS_SHOP_STATE',
				'PS_SHOP_PHONE',
				'PS_SHOP_FAX',
				'PS_STORES_CENTER_LAT',
				'PS_STORES_CENTER_LONG'
			));
		}

		return self::$storeContacts;
	}

	/**
	 * Get module settings content.
	 *
	 * @return string
	 */
	public function getContent()
	{
		$fields_form   = array();
		$fields_form[] = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Info'),
					'icon'  => 'icon-info'
				),
				'input' => array(
					array(
						'type'  => 'free',
						'name'  => 'description',
						'label' => $this->l('Contact page URL'),
						'desc'  => $this->l('Use it for any link.'),
					),
					array(
						'type'  => 'free',
						'name'  => 'manage',
						'label' => $this->l('Contacts manage page'),
						'desc'  => $this->l('Click it to manage contacts.'),
					),
				),
			),
		);

		$helper = new HelperForm();
		$helper->module       = $this;
		$helper->show_toolbar = false;
		$helper->identifier   = $this->identifier;
		$helper->fields_value = array(
			'description' => $this->context->link->getModuleLink($this->name, 'page'),
			'manage'      => '<a class="link" href="' . $this->context->link->getAdminLink('AdminStores') . '#conf_id_PS_SHOP_NAME">' . $this->l('Manage') . '</a>',
		);

		return $helper->generateForm($fields_form);
	}

	/**
	 * Hook DisplayHeader.
	 */
	public function hookDisplayHeader()
	{
		$this->context->controller->addCSS(($this->_path).'storecontactz.css', 'all');
	}

	/**
	 * Hook common template data.
	 */
	private function _hookCommon()
	{
		if (!$this->isCached('storecontactz.tpl', $this->getCacheId())) {
			$this->smarty->assign(array(
				'storeContacts' => $this->getContacts(),
				'footer'        => false,
				'top'           => false,
				'block'         => false,
			));
		}
	}

	/**
	 * Hook DisplayTop.
	 *
	 * @param array $params
	 *
	 * @return string
	 */
	public function hookDisplayTop($params)
	{
		$this->_hookCommon();

		$this->smarty->assign(array(
			'top' => true,
		));

		return $this->display(__FILE__, 'storecontactz.tpl', $this->getCacheId());
	}

	/**
	 * Hook DisplayFooter.
	 *
	 * @param array $params
	 *
	 * @return string
	 */
	public function hookDisplayFooter($params)
	{
		$this->_hookCommon();

		$this->smarty->assign(array(
			'footer' => true,
		));

		return $this->display(__FILE__, 'storecontactz.tpl', $this->getCacheId());
	}

	/**
	 * Hook DisplayRightColumn.
	 *
	 * @param array $params
	 *
	 * @return string
	 */
	public function hookDisplayRightColumn($params)
	{
		$this->_hookCommon();

		$this->smarty->assign(array(
			'block' => true,
		));

		return $this->display(__FILE__, 'storecontactz.tpl', $this->getCacheId());
	}

	/**
	 * Hook DisplayLeftColumn.
	 *
	 * @param array $params
	 *
	 * @return string
	 */
	public function hookDisplayLeftColumn($params)
	{
		$this->_hookCommon();

		$this->smarty->assign(array(
			'block' => true,
		));

		return $this->display(__FILE__, 'storecontactz.tpl', $this->getCacheId());
	}
}