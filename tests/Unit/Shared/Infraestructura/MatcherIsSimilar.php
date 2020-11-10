<?php


namespace Tests\Unit\Shared\Infraestructura;


use Mockery\Matcher\MatcherAbstract;
use PHPUnit\Framework\ExpectationFailedException;
use Prophecy\Comparator\Factory;
use SebastianBergmann\Comparator\ComparisonFailure;

class MatcherIsSimilar extends MatcherAbstract
{

    private $value;
    private $delta;

    public function __construct($value, $delta = 0.0)
    {
        parent::__construct($value);
        $this->value = $value;
        $this->delta = $delta;
    }
    private function evaluate($other, $description = '', $returnResult = false) : bool {

        if($this->value === $other)
            return true;

        $isValid = true;
        $factory = new Factory();

        try {
            $comparation = $factory->getComparatorFor($this->value,$other);
            $comparation->assertEquals($this->value,$other,$this->delta);
        }catch (ComparisonFailure $f){
            if(!$returnResult){
                throw new ExpectationFailedException(
                    trim($description . "\n" . $f->getMessage()),
                    $f
                );
            }
            $isValid = false;
        }

        return $isValid;
    }

    public function match(&$actual)
    {
        return $this->evaluate($actual, '', true);
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
    }
}
