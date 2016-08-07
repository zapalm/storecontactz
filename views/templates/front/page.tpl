{**
 * Store contacts: module for PrestaShop 1.5
 *
 * @author      zapalm <zapalm@ya.ru>
 * @copyright   (c) 2013-2016, zapalm
 * @link        http://prestashop.modulez.ru/en/frontend-features/39-store-contacts.html The module's homepage
 * @license     http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 *}

<!-- MODULE StoreContactz -->
{capture name=path}{l s='Our contacts' mod='storecontactz'}{/capture}
{include file="$tpl_dir./breadcrumb.tpl"}

<div id="storecontactz_page">
	<h1>{l s='Our contacts' mod='storecontactz'}</h1>
	<ul>
		{if $storeContacts.PS_SHOP_DETAILS}
			<li class="company">
				{$storeContacts.PS_SHOP_DETAILS}
			</li>
		{/if}
		{if $storeContacts.PS_SHOP_CODE || PS_SHOP_CITY}
			<li class="code_city">
				{$storeContacts.PS_SHOP_CODE}, {$storeContacts.PS_SHOP_CITY}
			</li>
		{/if}
		{if $storeContacts.PS_SHOP_ADDR1 || $storeContacts.PS_SHOP_ADDR2}
			<li class="street">
				{$storeContacts.PS_SHOP_ADDR1}, {$storeContacts.PS_SHOP_ADDR2}
			</li>
		{/if}
		{if $storeContacts.PS_SHOP_PHONE}
			<li class="phone">
				{l s='Phone' mod='storecontactz'}: {$storeContacts.PS_SHOP_PHONE}
			</li>
		{/if}
		{if $storeContacts.PS_SHOP_FAX}
			<li class="fax">
				{l s='Fax' mod='storecontactz'}: {$storeContacts.PS_SHOP_FAX}
			</li>
		{/if}
		{if $storeContacts.PS_SHOP_EMAIL}
			<li class="email">
				{l s='Email' mod='storecontactz'}: {mailto address=$storeContacts.PS_SHOP_EMAIL|escape:'htmlall':'UTF-8' encode='hex'}
			</li>
		{/if}
	</ul>
</div>
<!-- /MODULE StoreContactz -->