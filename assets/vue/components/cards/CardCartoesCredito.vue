<template>
  <div class="bg-gray-800 rounded-lg shadow-md p-6">
    <div class="flex items-center">
      <div class="bg-blue-600 p-3 rounded-full">
        <LayoutDashboard class="w-6 h-6 text-white" />
      </div>
      <div class="ml-4">
        <p class="text-sm text-gray-400">Cartões de Crédito</p>
        <p class="text-2xl font-bold text-white">{{ formatCurrency(cartoesCredito) }}</p>
        <p class="text-sm text-gray-400">Total faturas a pagar</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { LayoutDashboard } from 'lucide-vue-next';

const cartoesCredito = ref(2447.82);

const formatCurrency = (value) => {
  return value.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
};
</script>