<template>
  <div class="bg-gray-800 rounded-lg shadow-md p-6">
    <div class="flex items-center">
      <div class="bg-red-500 p-3 rounded-full">
        <Settings class="w-6 h-6 text-white" />
      </div>
      <div class="ml-4">
        <p class="text-sm text-gray-400">Despesas</p>
        <p class="text-2xl font-bold text-white">{{ formatCurrency(despesas) }}</p>
        <p class="text-sm text-gray-400">Previsto</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { Settings } from 'lucide-vue-next';

const despesas = ref(3092.51);

const formatCurrency = (value) => {
  return value.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
};
</script>