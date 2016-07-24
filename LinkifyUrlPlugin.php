<?php
/**
 * LinkifyUrl plugin
 *
 * @copyright Daniel Berthereau, 2016
 * @license https://www.cecill.info/licences/Licence_CeCILL_V2.1-en.html
 * @package LinkifyUrl
 */

/**
 * The LinkifyUrl plugin.
 * @package Omeka\Plugins\LinkifyUrl
 */
class LinkifyUrlPlugin extends Omeka_Plugin_AbstractPlugin
{
    /**
     * @var array Filters for the plugin.
     */
    protected $_filters = array(
        'filterDisplayItemItmLocalUrl' => array('Display', 'Item', 'Item Type Metadata', 'Local URL'),
    );

    /**
     * Filter an element.
     *
     * @param string $text The text of the element
     * @param array $args The record and the element text object.
     * @return string The filtered text of the element.
     */
    public function filterDisplayItemItmLocalUrl($text, $args)
    {
        return $this->_convertUrlIntoLink($text, $args);
    }

    /**
     * Display a url as a link.
     *
     * @param string $text The text of the element
     * @param array $args The record and the element text object.
     * @return string The filtered text of the element.
     */
    protected function _convertUrlIntoLink($text, $args)
    {
        if (!is_admin_theme()) {
            $elementText = $args['element_text'];
            if (!$elementText->html) {
                $text = '<a href="' . $text . '">' . $text . '</a>';
            }
        }
        return $text;
    }
}
