<template>
  <div class="bg-gray-800 rounded-lg shadow-md p-6">
    <div class="flex items-center">
      <div class="bg-green-500 p-3 rounded-full">
        <CreditCard class="w-6 h-6 text-white" />
      </div>
      <div class="ml-4">
        <p class="text-sm text-gray-400">Receitas</p>
        <p class="text-2xl font-bold text-white">{{ formatCurrency(receitas) }}</p>
        <p class="text-sm text-gray-400">Previsto</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { CreditCard } from 'lucide-vue-next';

const receitas = ref(3145);

const formatCurrency = (value) => {
  return value.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
};
</script>