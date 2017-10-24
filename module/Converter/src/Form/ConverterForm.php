<?php

namespace Converter\Form;

use Zend\Form\Form;

class ConverterForm extends Form
{
    public function __construct()
    {
        parent::__construct('converter');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'fromNumber',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));
        $this->add(array(
            'name' => 'toNumber',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));
    }
}