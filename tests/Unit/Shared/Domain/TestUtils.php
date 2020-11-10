<?php


namespace Tests\Unit\Shared\Domain;


use Tests\Unit\Shared\Infraestructura\MatcherIsSimilar;

final class TestUtils
{
    public static function similarTo($value, $delta = 0.0): MatcherIsSimilar
    {
        return new MatcherIsSimilar($value, $delta);
    }
    protected function shouldBegintransaction()
    {
        $this->unitofwork()
            ->shouldReceive('beginTransaction')
            ->once();
    }

    protected function shouldCommit()
    {
        $this->unitofwork()
            ->shouldReceive('commit')
            ->once();
    }

    protected function shouldRollback()
    {
        $this->unitofwork()
            ->shouldReceive('rollback')
            ->once();
    }
}
