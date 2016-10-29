<?php


namespace CirclicalRecaptcha\Form\View\Helper;

use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormElement;

class Recaptcha extends FormElement
{
    public function render(ElementInterface $element)
    {
        $noScript = $element->getOption('no_script');
        $noSiteKey = $element->getOption('no_sitekey');
        $elementId = $element->getAttribute('id');

        return sprintf(
            '<div class="form-group">
                <div%s>
                    <div class="g-recaptcha"%s></div>
                </div>
            </div>
            %s',
            $elementId ? ' id="' . $elementId . '"' : '',
            $noSiteKey ? '' : 'data-sitekey="' . $element->getSecret() . '"',
            $noScript ? '' : '<script src="//www.google.com/recaptcha/api.js"></script>'
        );
    }
}