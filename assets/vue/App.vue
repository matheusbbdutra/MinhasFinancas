<template>
  <div class="min-h-screen bg-gray-900 text-white flex">
    <!-- Sidebar -->
    <aside v-if="!isLoginRoute" class="w-64 bg-gray-800 shadow-lg">
      <div class="p-4">
        <h1 class="text-2xl font-bold text-white">Dashboard</h1>
      </div>
      <nav class="mt-4">
        <router-link
            v-for="item in navItems"
            :key="item.name"
            :to="item.path"
            class="flex items-center px-4 py-3 text-gray-400 hover:bg-gray-700 hover:text-white transition-colors duration-200"
        >
          <component :is="item.icon" class="w-5 h-5 mr-2" />
          {{ item.name }}
        </router-link>
      </nav>
    </aside>
    <main class="flex-1 p-8 bg-gray-900 overflow-auto relative">
      <router-view />
    </main>
  </div>
</template>

<script setup>
import {computed, ref} from 'vue';
import { CreditCard, LayoutDashboard, Settings, Users } from 'lucide-vue-next';
import { useRoute } from 'vue-router';

const navItems = ref([
  { name: 'Dashboard', path: '/dashboard', icon: LayoutDashboard },
  { name: 'Contas', path: '/contas', icon: Users },
  { name: 'Transações', path: '/transacoes', icon: CreditCard },
  { name: 'Configurações', path: '/configuracoes', icon: Settings },
]);
const route = useRoute();

const isLoginRoute = computed(() => route.path === '/login');
</script>