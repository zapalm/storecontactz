{**
 * Store contacts: module for PrestaShop 1.5
 *
 * @author      zapalm <zapalm@ya.ru>
 * @copyright   (c) 2013-2016, zapalm
 * @link        http://prestashop.modulez.ru/en/frontend-features/39-store-contacts.html The module's homepage
 * @license     http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 *}

<!-- MODULE StoreContactz -->
{if $footer}
	<div id="block_contact_infos">
		<h4 class="title_block">{l s='Our contacts' mod='storecontactz'}</h4>
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
{elseif $block}
	<div id="storecontactz_block_sidebar" class="block">
		<h4 class="title_block">{l s='Contact us' mod='storecontactz'}</h4>
		<div class="block_content clearfix">
			<ul>
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
	</div>
{elseif $top}
	<div id="storecontactz_block_top" class="block">
		<div class="block_content clearfix">
			<ul>
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
	</div>
{/if}
<!-- /MODULE StoreContactz -->
