<template>
  <div class="text-center">
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