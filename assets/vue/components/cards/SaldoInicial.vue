<template>
  <div class="text-center bg-gray-800 rounded-lg shadow-md p-6">
    <p class="text-sm text-gray-400">Inicial</p>
    <p class="text-xl font-bold text-white">{{ formatCurrency(saldoInicial) }}</p>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const saldoInicial = ref(3.86);

const formatCurrency = (value) => {
  return value.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
};
</script>