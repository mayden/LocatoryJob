<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Converter\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Converter\Form\ConverterForm;
use Converter\Model\Converter;
use Zend\View\Model\ViewModel;

class ConverterController extends AbstractActionController
{
    public function indexAction()
    {
        return [];
    }

    public function convertAction()
    {
        $form = new ConverterForm();
        $request = $this->getRequest();

        // Checking if we have POST
        if ($request->isPost()) {

            // Doing new object Converter
            $converter = new Converter();

            $form->setInputFilter($converter->getInputFilter());
            $form->setData($request->getPost());

            // If everything is valid
            if ($form->isValid()) {
                $converter->exchangeArray($form->getData());


                if($converter->getWhichNumber() == "Arabic")
                {
                    $result = $converter->convert2decimal($converter->getFromNumber());
                }

                return new ViewModel([ 'originalNumber' => $this->params()->fromPost('fromNumber'), 'result' => $result]);

            }

            $this->flashMessenger()->addMessage('Your message');

        }

       return new ViewModel();
    }
}
