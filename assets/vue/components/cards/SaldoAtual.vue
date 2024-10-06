<template>
  <div class="bg-gray-800 rounded-lg shadow-md p-6 text-center">
    <p class="text-sm text-gray-400">Saldo</p>
    <p class="text-2xl font-bold text-white">{{ formatCurrency(saldoAtual) }}</p>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const saldoAtual = ref(6.84);

const formatCurrency = (value) => {
  return value.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
};
</script>