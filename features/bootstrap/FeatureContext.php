<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends Behat\MinkExtension\Context\MinkContext
{
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
    }

    /**
     * @Then /^"([^"]*)" should be visible$/
     */
    public function shouldBeVisible($selector)
    {
        $element = $this->getSession()->getPage()->find('css', $selector);
        if (empty($element))
            throw new Exception('Element "'.$selector.'" not found');

        $display = $this->getSession()->evaluateScript(
            'jQuery("'.$selector.'").css("display")'
        );

        if ($display === 'none')
            throw new Exception('Element "'.$selector.'" is not visible');
    }

    /**
     * @Then /^"([^"]*)" should not be visible$/
     */
    public function shouldNotBeVisible($selector)
    {
        $element = $this->getSession()->getPage()->find('css', $selector);
        if (empty($element))
            throw new Exception('Element "'.$selector.'" not found');

        $display = $this->getSession()->evaluateScript(
            'jQuery("'.$selector.'").css("display")'
        );

        if ($display !== 'none')
            throw new Exception('Element "'.$selector.'" is visible');
    }

    /**
     * @Given /^I have an image with width "([^"]*)" and height "([^"]*)" in "([^"]*)"$/
     */
    public function iHaveAnImageWithWidthAndHeightIn($arg1, $arg2, $arg3)
    {
        $image = imagecreate($arg1, $arg2);
        imagecolorallocate($image, 0, 0, 0);
        imagepng($image, $arg3);
    }

    /**
     * @Given /^the "([^"]*)" element should display "([^"]*)"$/
     */
    public function theElementShouldDisplay($selector, $image_path)
    {
        $selector_image_path = $this->getSession()->evaluateScript(
            'jQuery("'.$selector.'").attr("src")'
        );

        if (md5_file(DOCROOT.substr($selector_image_path, strlen(URL::base()))) !== md5_file($image_path))
            throw new Exception('Element "'.$selector.'" displays "'.$selector_image_path.'" rather than "'.$image_path.'"');
    }

    /**
     * @Given /^the "([^"]*)" element should be "([^"]*)" by "([^"]*)" pixels$/
     */
    public function theElementShouldBeByPixels($selector, $width, $height)
    {
        $selector_image_path = $this->getSession()->evaluateScript(
            'jQuery("'.$selector.'").attr("src")'
        );

        list($selector_width, $selector_height, $type, $attr) = getimagesize(DOCROOT.substr($selector_image_path, strlen(URL::base())));

        if ($width != $selector_width OR $height != $selector_height)
            throw new Exception('Element "'.$selector.'" is '.$selector_width.'x'.$selector_height.' instead of '.$width.'x'.$height);
    }
}
