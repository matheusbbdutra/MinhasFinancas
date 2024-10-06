<?php

namespace App\Domain\Financas\Entity;

class Transacao
{
    private int $id;
    
    public function __construct(
        private Conta $conta,
        private float $valor,
        private TipoTransacao $tipoTransacao,
        private \DateTime $dtLancamento,
        private \DateTime $dtVencimento,
        private ?Conta $contaDestino = null
    ) {
    }
    
    public function getConta(): Conta
    {
        return $this->conta;
    }

    public function setConta(Conta $conta): void
    {
        $this->conta = $conta;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function setValor(float $valor): void
    {
        $this->valor = $valor;
    }

    public function getTipoTransacao(): TipoTransacao
    {
        return $this->tipoTransacao;
    }

    public function setTipoTransacao(TipoTransacao $tipoTransacao): void
    {
        $this->tipoTransacao = $tipoTransacao;
    }

    public function getDtLancamento(): \DateTime
    {
        return $this->dtLancamento;
    }

    public function setDtLancamento(\DateTime $dtLancamento): void
    {
        $this->dtLancamento = $dtLancamento;
    }

    public function getDtVencimento(): \DateTime
    {
        return $this->dtVencimento;
    }

    public function setDtVencimento(\DateTime $dtVencimento): void
    {
        $this->dtVencimento = $dtVencimento;
    }

    public function getContaDestino(): ?Conta
    {
        return $this->contaDestino;
    }

    public function setContaDestino(?Conta $contaDestino): void
    {
        $this->contaDestino = $contaDestino;
    }
}
