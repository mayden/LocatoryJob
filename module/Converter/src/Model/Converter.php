<?php
namespace Converter\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Converter implements InputFilterAwareInterface
{
    private $fromNumber;
    private $whichNumber;
    protected $inputFilter;

    private $romans = array(
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,
        );

    public function getFromNumber() {
        return $this->fromNumber;
    }

    public function getWhichNumber() {
        return $this->whichNumber;
    }

    public function convert2decimal($number)
    {
        $result = 0;
        foreach ($this->romans as $key => $value) {
            while (strpos($number, $key) === 0) {
                $result += $value;
                $number = substr($number, strlen($key));
            }
        }
        return $result;
    }
    public function exchangeArray($data)
    {
        $this->fromNumber     = (isset($data['fromNumber']))     ? $data['fromNumber']     : null;
        $this->whichNumber        = (isset($data['toNumber']))        ? $data['toNumber']        : null;
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    // In case we'll have another type of numbers. So we will filter them out.
    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}