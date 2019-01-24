<?php

use PHPUnit\Framework\TestCase;

class GenerateurCalculsTest extends TestCase{

    CONST A = 5;
    CONST B = 10;

    /** @test */
    public function TestgetOperateur(){
        $this->assertContains((new Generateur\GenerateurCalculs(1))->getOperateur(), ["addition", "soustraction", "division", "multiplication"]);
    }

    /** @test */
    public function TestGetNumber(){
        $this->assertInternalType('int', (new Generateur\GenerateurCalculs(1))->getNumber());
    }

    /** @test */
    public function TestaddAddition(){
        $this->assertEquals('5 + 10', (new Generateur\GenerateurCalculs(1))->addAddition(5, 10));
    }

    /** @test */
    public function TestaddSoustration(){
        $this->assertEquals('10 - 5', (new Generateur\GenerateurCalculs(1))->addSoustraction(10, 5));
    }

    /** @test */
    public function TestaddMultiplication(){
        $this->assertEquals('10 * 5', (new Generateur\GenerateurCalculs(1))->addMultiplication(10, 5));
    }

    /** @test */
    public function TestaddDivision(){
        $this->assertEquals('10 / 5', (new Generateur\GenerateurCalculs(1))->addDivision(10, 5));
    }

    /** @test */
    public function TestaddDivisionFalse(){
        $this->assertEquals(false, (new Generateur\GenerateurCalculs(1))->addDivision(5, 10));
    }

}