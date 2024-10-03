<template>

  <header class="mb-8">
    <h2 class="text-4xl font-semibold text-white mr-4">Contas</h2>
  </header>
  <div class="contas">
    <table class="min-w-full table-auto border-collapse">
      <thead>
      <tr class="bg-gray-800 text-gray-300">
        <th class="px-4 py-2 border-b border-gray-700 text-left">Nome da Conta</th>
        <th class="px-4 py-2 border-b border-gray-700 text-left">Saldo Inicial</th>
        <th class="px-4 py-2 border-b border-gray-700 text-left">Receitas</th>
        <th class="px-4 py-2 border-b border-gray-700 text-left">Transf. Creditadas</th>
        <th class="px-4 py-2 border-b border-gray-700 text-left">Transf. Debitada</th>
        <th class="px-4 py-2 border-b border-gray-700 text-left">Despesas</th>
        <th class="px-4 py-2 border-b border-gray-700 text-left">Saldo Previsto</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="conta in contas" :key="conta.nome" class="odd:bg-gray-800 even:bg-gray-700 text-gray-300">
        <td class="px-4 py-2 border-b border-gray-700">{{ conta.nome }}</td>
        <td class="px-4 py-2 border-b border-gray-700">{{ formatCurrency(conta.saldoInicial) }}</td>
        <td class="px-4 py-2 border-b border-gray-700">{{ formatCurrency(conta.receitas) }}</td>
        <td class="px-4 py-2 border-b border-gray-700">{{ formatCurrency(conta.transfCreditadas) }}</td>
        <td class="px-4 py-2 border-b border-gray-700">{{ formatCurrency(conta.transfDebitada) }}</td>
        <td class="px-4 py-2 border-b border-gray-700">{{ formatCurrency(conta.despesas) }}</td>
        <td class="px-4 py-2 border-b border-gray-700">{{ formatCurrency(conta.saldoPrevisto) }}</td>
      </tr>
      </tbody>
    </table>
  </div>

  <FloatingActionButton />
</template>

<script>

import FloatingActionButton from "../components/FloatingActionButton.vue";

export default {
  components: {FloatingActionButton},
  data() {
    return {
      contas: [
        {
          nome: 'Conta Corrente',
          saldoInicial: 2334,
          receitas: 7145,
          transfCreditadas: 0,
          transfDebitada: 200,
          despesas: 1828.11,
          saldoPrevisto: 5140.23,
        },
        {
          nome: 'Minha Carteira',
          saldoInicial: 49.51,
          receitas: 0,
          transfCreditadas: 0,
          transfDebitada: 0,
          despesas: 0,
          saldoPrevisto: 49.51,
        },
        {
          nome: 'Investimento',
          saldoInicial: 0,
          receitas: 0,
          transfCreditadas: 0,
          transfDebitada: 0,
          despesas: 0,
          saldoPrevisto: 0,
        },
      ],
    };
  },
  methods: {
    formatCurrency(value) {
      return `R$ ${value.toFixed(2)}`;
    },
  },
};
</script>