<?php
/**
 * @category  German
 * @package   German_LocalePack
 * @authors   MaWoScha <mawoscha@siempro.co, http://www.siempro.co/>
 * @developer MaWoScha <mawoscha@siempro.co, http://www.siempro.co/>  
 * @version   0.6.0.
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
$installer = $this;

$installer->startSetup();

$blockContent = <<<EOD
If you have any questions or suggestions, please contact us either
by email <a href="mailto:{{var store_email}}">{{var store_email}}</a>,
by phone at <a href="tel:{{var store_phone}}">{{var store_phone}}</a>,
via <a title="My Service-Site on Skype" href="skype:my.shop?chat" target="_blank">Skype-Chat</a> (Username: my.shop)
or in Facebook on our <a title="My Fanpage in Facebook" href="http://www.facebook.com/my.shop" target="_blank">My Fanpage</a>.
EOD;

$storeId = 6;

$staticBlocks = array(
    array(
        'title'         => 'eMail Template Say Hello (fa)',
        'identifier'    => 'email_template_say_hello',
        'content'       => 'Dear,',
        'is_active'     => 0,
        'stores'        => array($storeId)
    ),
    array(
        'title'         => 'eMail Template Contact (fa)',
        'identifier'    => 'email_template_contact',
        'content'       => $blockContent,
        'is_active'     => 0,
        'stores'        => array($storeId)
    ),
    array(
        'title'         => 'eMail Template Say Bye (fa)',
        'identifier'    => 'email_template_say_bye',
        'content'       => 'Thank you!',
        'is_active'     => 0,
        'stores'        => array($storeId)
    )
);

/**
 * Insert default blocks
 */
foreach ($staticBlocks as $data) {
    try {
        Mage::getModel('cms/block')->setData($data)->save();
    } catch (Exception $e) {
        # To prevent exception "A block identifier with the same properties already exists
        # in the selected store." in "app:code:core:Mage:Cms:Model:Resource:Block.php"
#        throw new Exception("Oops, mi error in FA German LocalePack");
    }
}

$installer->endSetup();

?>
