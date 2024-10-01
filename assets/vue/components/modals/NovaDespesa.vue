<template>
  <div class="modal-content">
    <header class="flex justify-between items-center mb-4">
      <h2 class="text-lg font-semibold">Nova Despesa</h2>
      <button @click="saveExpense" class="bg-red-400 text-white px-4 py-1 rounded">Salvar</button>
    </header>

    <div class="mb-4">
      <label class="block text-sm text-gray-400">Descrição</label>
      <input v-model="descricao" type="text" placeholder="Descrição" class="w-full p-2 rounded bg-gray-700 text-gray-300" />
    </div>

    <div class="mb-4">
      <label class="block text-sm text-gray-400">Valor</label>
      <input v-model="valor" type="text" placeholder="R$ 0,00" class="w-full p-2 rounded bg-gray-700 text-gray-300" />
    </div>

    <div class="mb-4">
      <label class="block text-sm text-gray-400">Data vencimento</label>
      <input v-model="dataVencimento" type="date" class="w-full p-2 rounded bg-gray-700 text-gray-300" />
    </div>

    <div class="mb-4 flex justify-between">
      <label class="block text-sm text-gray-400">Efetivada</label>
      <input v-model="efetivada" type="checkbox" class="toggle-checkbox" />
    </div>

    <div class="mb-4">
      <label class="block text-sm text-gray-400">Categoria</label>
      <select v-model="categoria" class="w-full p-2 rounded bg-gray-700 text-gray-300">
        <option v-for="cat in categorias" :key="cat" :value="cat">{{ cat }}</option>
      </select>
    </div>

    <div class="mb-4">
      <label class="block text-sm text-gray-400">Conta</label>
      <select v-model="conta" class="w-full p-2 rounded bg-gray-700 text-gray-300">
        <option v-for="acc in contas" :key="acc" :value="acc">{{ acc }}</option>
      </select>
    </div>

  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const descricao = ref('');
const valor = ref('');
const dataVencimento = ref('');
const efetivada = ref(false);
const categoria = ref('');
const categorias = ref([]);
const conta = ref('');
const contas = ref([]);

onMounted(() => {
  axios.get('/api/categories')
      .then(response => {
        categorias.value = response.data;
      })
      .catch(error => {
        console.error('Error fetching categories:', error);
      });

  axios.get('/api/accounts')
      .then(response => {
        contas.value = response.data;
      })
      .catch(error => {
        console.error('Error fetching accounts:', error);
      });
});

const saveExpense = async () => {
  const expenseData = {
    descricao: descricao.value,
    valor: valor.value,
    dataVencimento: dataVencimento.value,
    efetivada: efetivada.value,
    categoria: categoria.value,
    conta: conta.value,
  };

  try {
    const response = await axios.post('/api/expenses', expenseData);

    if (response.status !== 200) {
      throw new Error('Failed to save expense');
    }

    console.log('Expense saved successfully');
  } catch (error) {
    console.error('Error:', error);
  }
};
</script>

<style scoped>
.modal-content {
  background: #1f2937;
  padding: 20px;
  border-radius: 10px;
}
.toggle-checkbox {
  background: #4b5563;
  height: 20px;
  width: 40px;
  border-radius: 50px;
}
</style>