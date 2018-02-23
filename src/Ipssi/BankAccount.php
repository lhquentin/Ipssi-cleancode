<?php 

namespace Ipssi;

class BankAccount
{
	/*private int $numero;
    private string $nom;
    private double $solde;
    private double $decouvert;

    public function __construct()
    {
    	$this->numero = 0;
        $this->nom = "";
        $this->solde = 0;
        $this->decouvert = 0;
    }

	public function creditAccount(double $credit)
	{
		return $this->solde += $credit;
	}

	public function debitAccount(double $debit)
	{
		if (($this->solde - $debit) < ($decouvert * -1)) {
			return false;
		}

		return $this->solde -= $debit;
	}*/

	/**
	 * @var float
	 **/
	private $balance;

	/**
	 * BankAccount constructor.
	 **/
	public function __construct($balance = 0)
	{
		$this->setBalance($balance);
	}

	/**
	 * @return float
	 **/
	public function getBalance(): float
	{
		return $this->balance;
	}

	/**
	 * Increase balance.
	 *
	 * @param float $balance
	 * @return BankAccount
	 * @throws InvalidArgumentException
	 **/
	public function increase(float $balance): BankAccount
	{
		BalanceValidator::valid($balance);

		$this->balance += $balance;
		return $this;
	}

	/**
	 * Decrease balance.
	 *
	 * @param float $balance
	 * @return BankAccount
	 * @throws InvalidArgumentException
	 **/
	public function decrease(float $balance): BankAccount
	{
		BalanceValidator::valid($balance);

		if ($balance > $this->getBalance()) {
			throw new \InvalidArgumentException('balance is over than you got');
		}

		$this->balance -= $balance;
		return $this;
	}

	/**
	 * @param float $balance
	 * @return BankAccount
	 **/
	protected	 function setBalance(float $balance): BankAccount
	{
		$this->balance = $balance;
		return $this;
	}
}
