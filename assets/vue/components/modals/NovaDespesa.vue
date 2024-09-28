<template>
  <div class="modal-content">
    <header class="flex justify-between items-center mb-4">
      <h2 class="text-lg font-semibold">Nova Despesa</h2>
      <button class="bg-red-400 text-white px-4 py-1 rounded">Salvar</button>
    </header>

    <div class="mb-4">
      <label class="block text-sm text-gray-400">Descrição</label>
      <input type="text" placeholder="Descrição" class="w-full p-2 rounded bg-gray-700 text-gray-300" />
    </div>

    <div class="mb-4">
      <label class="block text-sm text-gray-400">Valor</label>
      <input type="text" placeholder="R$ 0,00" class="w-full p-2 rounded bg-gray-700 text-gray-300" />
    </div>

    <div class="mb-4">
      <label class="block text-sm text-gray-400">Data vencimento</label>
      <input type="date" class="w-full p-2 rounded bg-gray-700 text-gray-300" value="2023-09-28" />
    </div>

    <div class="mb-4 flex justify-between">
      <label class="block text-sm text-gray-400">Efetivada</label>
      <input type="checkbox" class="toggle-checkbox" />
    </div>

    <div class="mb-4">
      <label class="block text-sm text-gray-400">Categoria</label>
      <select class="w-full p-2 rounded bg-gray-700 text-gray-300">
        <option>Outros</option>
      </select>
    </div>

    <div class="mb-4">
      <label class="block text-sm text-gray-400">Conta</label>
      <select class="w-full p-2 rounded bg-gray-700 text-gray-300">
        <option>Conta Corrente</option>
      </select>
    </div>

    <div>
      <button class="text-red-400">Mais Informações</button>
    </div>
  </div>
</template>

<script setup>
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
