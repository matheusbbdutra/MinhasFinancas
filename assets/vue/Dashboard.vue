<template>
  <div class="min-h-screen bg-gray-900 text-white flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 shadow-lg">
      <div class="p-4">
        <h1 class="text-2xl font-bold text-white">Dashboard</h1>
      </div>
      <nav class="mt-4">
        <a
            v-for="item in navItems"
            :key="item.name"
            href="#"
            class="flex items-center px-4 py-3 text-gray-400 hover:bg-gray-700 hover:text-white transition-colors duration-200"
        >
          <component :is="item.icon" class="w-5 h-5 mr-2" />
          {{ item.name }}
        </a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 bg-gray-900 overflow-auto relative">
      <header class="mb-8">
        <h2 class="text-3xl font-semibold text-white">Visão Geral</h2>
      </header>

      <!-- Novo Card de Saldo -->
      <div class="bg-gray-800 rounded-lg shadow-md p-6 mb-8">
        <div class="flex justify-center items-center space-x-8">
          <SaldoInicial />
          <SaldoAtual />
          <SaldoPrevisto />
        </div>
      </div>

      <!-- Cards Overview -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <CardContas />
        <CardReceitas />
        <CardDespesas />
        <CardCartoesCredito />
      </div>

      <!-- Expense Evolution Chart -->
      <div class="mt-8">
        <h3 class="text-2xl font-semibold mb-4 text-white">Evolução das Despesas</h3>
        <div class="bg-gray-800 rounded-lg shadow-md p-6 relative">
          <canvas ref="expenseChart" class="h-64"></canvas>
        </div>
      </div>

      <!-- Floating Action Button (FAB) -->
      <FloatingActionButton />
    </main>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { LayoutDashboard, Users, CreditCard, Settings } from 'lucide-vue-next';
import { Chart, LineController, CategoryScale, LinearScale, PointElement, LineElement, Title, Tooltip, Legend } from 'chart.js';
import SaldoInicial from './components/SaldoInicial.vue';
import SaldoAtual from './components/SaldoAtual.vue';
import SaldoPrevisto from './components/SaldoPrevisto.vue';
import CardContas from './components/cards/CardContas.vue';
import CardReceitas from './components/cards/CardReceitas.vue';
import CardDespesas from './components/cards/CardDespesas.vue';
import CardCartoesCredito from './components/cards/CardCartoesCredito.vue';
import FloatingActionButton from './components/FloatingActionButton.vue';

Chart.register(LineController, CategoryScale, LinearScale, PointElement, LineElement, Title, Tooltip, Legend);

const navItems = ref([
  { name: 'Dashboard', icon: LayoutDashboard },
  { name: 'Accounts', icon: Users },
  { name: 'Transactions', icon: CreditCard },
  { name: 'Settings', icon: Settings },
]);

const expenseChart = ref(null);

const formatCurrency = (value) => {
  return value.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
};

const saldoInicial = ref(3.86);
const saldoAtual = ref(6.84);
const saldoPrevisto = ref(6.84);

// Gerar dados para o gráfico de despesas
const generateExpenseData = () => {
  return [
    { day: '01 a 02', expense: 2500 },
    { day: '02 a 03', expense: 3200 },
    { day: '03 a 04', expense: 3800 },
    { day: '04 a 05', expense: 3400 },
    { day: '05 a 06', expense: 3300 },
    { day: '06 a 07', expense: 4800 },
    { day: '07 a 08', expense: 2200 },
  ];
};

onMounted(() => {
  const ctx = expenseChart.value.getContext('2d');
  const expenseData = generateExpenseData();

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: expenseData.map((item) => item.day),
      datasets: [
        {
          label: 'Despesas',
          data: expenseData.map((item) => item.expense),
          borderColor: 'rgb(248, 113, 113)',
          tension: 0.1,
          pointRadius: 0,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            color: 'rgba(255, 255, 255, 0.7)',
            callback: function (value) {
              return value.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL', maximumFractionDigits: 0 });
            },
          },
          grid: {
            color: 'rgba(255, 255, 255, 0.1)',
          },
        },
        x: {
          ticks: {
            color: 'rgba(255, 255, 255, 0.7)',
          },
          grid: {
            color: 'rgba(255, 255, 255, 0.1)',
          },
        },
      },
      plugins: {
        legend: {
          display: false,
        },
      },
    },
  });
});
</script>