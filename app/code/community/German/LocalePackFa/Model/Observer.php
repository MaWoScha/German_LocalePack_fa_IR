<?php
/**
 * @category  German
 * @package   German_LocalePack
 * @authors   MaWoScha <mawoscha@siempro.co, http://www.siempro.co/>, Rico Neitzel <rico@buro71a.de, http://www.buro71a.de/>
 * @developer MaWoScha <mawoscha@siempro.co, http://www.siempro.co/>, Rico Neitzel <rico@buro71a.de, http://www.buro71a.de/>
 * @version   0.1.0
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class German_LocalePackFa_Model_Observer {

    public function adminhtmlControllerActionPredispatchStart() {

        $helper = Mage::helper("localepackfa");
        if ($this->localeMatchesMagento() && Mage::getSingleton('admin/session')->isLoggedIn()) {
            Mage::getSingleton('core/session')->addNotice($helper->__('Attention: Your Locale Pack doesn\'t match your Magento Version. <a href="'.$this->getManageUrl().'">Get more information here.</a>'));
        }
    }

    /**
     * Version number of current locale
     *
     * @return string
     */
    public function getVersionNumber() {

        return (string)Mage::app()->getConfig()->getNode('modules/German_LocalePackFa/version');
    }

    /**
     * Check if Magento Version Number is the beginning of Locale Version Number
     *
     * @return bool
     */
    public function localeMatchesMagento() {

        $magento = Mage::getVersion();
        $locale = $this->getVersionNumber();

        if (strpos($magento, $locale) !== false) {
            return true;
        }

        return false;
    }

    /**
     * Get URL of AdminPanel LocalePack section
     *
     * @return string
     */
    public function getManageUrl() {
        return Mage::helper("adminhtml")->getUrl('adminhtml/system_config/edit', array('section'=>'localepackfa'));
    }
}
