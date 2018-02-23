<?php 
	namespace Ipssi\Test;

	use Ipssi\Math;
	use PHPUnit\Framework\TestCase;

	class MathTest extends TestCase
	{
		
		public function testDoubleNumber()
		{
			$this->assertEquals(4, Math::doubleNumber(2));
		}

		public function testDoubleNumberWithString()
		{
			$this->expectException(\TypeError::class);
			Math::doubleNumber('abc');
		}

		public function testDivideNumber()
		{
			$this->assertEquals(5, Math::divideNumber(10));
		}

		public function testDivideNumberByZero()
		{
			$this->expectException(\InvalidArgumentException::class);
			Math::divideNumber(0);
		}

		public function testDivideNumberErrorTypeNumber()
		{
			$this->expectException(\TypeError::class);
			Math::divideNumber('abc');
		}
	}