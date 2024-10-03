<template>
  <div>
    <button
        class="fixed bottom-8 right-8 bg-blue-500 text-white p-4 rounded-full shadow-lg hover:bg-blue-600 transition-colors duration-200 focus:outline-none"
        @click="toggleMenu"
    >
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
      </svg>
    </button>

    <transition name="fade">
      <div v-if="showMenu" class="fixed bottom-16 right-8 bg-gray-800 rounded-lg shadow-lg p-4 w-72 z-50">
        <ul>
          <li v-if="!isContasRoute" @click="openModal('transferencia')" class="flex items-center space-x-3 py-3 border-b border-gray-700 hover:bg-gray-700 cursor-pointer">
            <ArrowUpDown class="w-6 h-6 text-yellow-400" />
            <span class="text-white">Transferência</span>
          </li>
          <li v-if="!isContasRoute" @click="openModal('receita')" class="flex items-center space-x-3 py-3 border-b border-gray-700 hover:bg-gray-700 cursor-pointer">
            <PlusCircle class="w-6 h-6 text-green-400" />
            <span class="text-white">Receita</span>
          </li>
          <li v-if="!isContasRoute" @click="openModal('despesa')" class="flex items-center space-x-3 py-3 border-b border-gray-700 hover:bg-gray-700 cursor-pointer">
            <MinusCircle class="w-6 h-6 text-red-400" />
            <span class="text-white">Despesa</span>
          </li>
          <li v-if="!isContasRoute" @click="openModal('despesaCartao')" class="flex items-center space-x-3 py-3 hover:bg-gray-700 cursor-pointer">
            <CreditCard class="w-6 h-6 text-blue-400" />
            <span class="text-white">Despesa Cartão</span>
          </li>
          <li v-if="isContasRoute" @click="openModal('novaConta')" class="flex items-center space-x-3 py-3 hover:bg-gray-700 cursor-pointer">
            <Banknote class="w-6 h-6 text-blue-400" />
            <span class="text-white">Nova Conta</span>
          </li>
        </ul>
      </div>
    </transition>

    <!-- Modal for forms -->
    <Modal v-if="currentModal === 'transferencia'" @close="closeModal">
      <NovaTransferencia />
    </Modal>

    <Modal v-if="currentModal === 'receita'" @close="closeModal">
      <NovaReceita />
    </Modal>

    <Modal v-if="currentModal === 'despesa'" @close="closeModal">
      <NovaDespesa />
    </Modal>

    <Modal v-if="currentModal === 'despesaCartao'" @close="closeModal">
      <NovaDespesaCartao />
    </Modal>

    <Modal v-if="currentModal === 'novaConta'" @close="closeModal">
      <NovaConta />
    </Modal>
  </div>

</template>

<script setup>
import {computed, ref} from 'vue';
import { useRoute } from 'vue-router';
import { ArrowUpDown, PlusCircle, MinusCircle, CreditCard, Banknote } from 'lucide-vue-next';
import Modal from './modals/Modal.vue'
import NovaTransferencia from './modals/NovaTransferencia.vue'
import NovaReceita from './modals/NovaReceita.vue'
import NovaDespesa from './modals/NovaDespesa.vue'
import NovaDespesaCartao from './modals/NovaDespesaCartao.vue'
import NovaConta from "./modals/NovaConta.vue";

const showMenu = ref(false);
const currentModal = ref(null);
const route = useRoute();

const toggleMenu = () => {
  showMenu.value = !showMenu.value;
};

const openModal = (modalName) => {
  currentModal.value = modalName
  showMenu.value = false
}

const closeModal = () => {
  currentModal.value = null
}

const isContasRoute = computed(() => route.path === '/contas');
</script>