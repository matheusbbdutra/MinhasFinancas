<template>

      <header class="mb-8">
        <div class="flex justify-between items-center">
          <h2 class="text-4xl font-semibold text-white mr-4">Dashboard</h2>
          <div class="bg-gray-800 rounded-lg shadow-md p-6 relative">
            <div class="flex space-x-8">
              <div class="date-selector flex items-center">
                <label for="month" class="mr-2">Mês</label>
                <select v-model="selectedMonth" id="month" class="p-2 rounded-lg bg-gray-700 text-white mr-4">
                  <option v-for="month in months" :key="month" :value="month">{{ month }}</option>
                </select>

                <label for="year" class="mr-2">Ano</label>
                <select v-model="selectedYear" id="year" class="p-2 rounded-lg bg-gray-700 text-white">
                  <option v-for="year in years" :key="year" :value="year">{{ year }}</option>
                </select>
              </div>
              <div class="user-info flex items-center">
                <UserCircle class="w-12 h-12 rounded-full mr-4"/>
                <div>
                  <p class="text-lg font-semibold">{{ user.name }}</p>
                  <p class="text-sm text-gray-400">{{ user.email }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
          <SaldoInicial />
          <SaldoAtual />
          <SaldoPrevisto />
      </div>

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
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Chart, LineController, CategoryScale, LinearScale, PointElement, LineElement, Title, Tooltip, Legend } from 'chart.js';
import SaldoInicial from '../components/cards/SaldoInicial.vue';
import SaldoAtual from '../components/cards/SaldoAtual.vue';
import SaldoPrevisto from '../components/cards/SaldoPrevisto.vue';
import CardContas from '../components/cards/CardContas.vue';
import CardReceitas from '../components/cards/CardReceitas.vue';
import CardDespesas from '../components/cards/CardDespesas.vue';
import CardCartoesCredito from '../components/cards/CardCartoesCredito.vue';
import FloatingActionButton from '../components/FloatingActionButton.vue';
import { UserCircle } from 'lucide-vue-next';

Chart.register(LineController, CategoryScale, LinearScale, PointElement, LineElement, Title, Tooltip, Legend);

const expenseChart = ref(null);

const formatCurrency = (value) => {
  return value.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
};

const saldoInicial = ref(3.86);
const saldoAtual = ref(6.84);
const saldoPrevisto = ref(6.84);

const dateTime = new Date();
const months = Array.from({ length: 12 }, (_, i) => {
  return new Date(0, i).toLocaleString('pt-BR', { month: 'long' });
});
const currentYear = dateTime.getFullYear();
const years = Array.from({ length: 10 }, (_, i) => currentYear + i);
const selectedMonth = ref((dateTime.getMonth() + 1).toString().padStart(2, '0'));
const selectedYear = ref(currentYear.toString());
const data = {
  month: selectedMonth.value,
  year: selectedYear.value
};

const user = {
      name: sessionStorage.getItem('userName'),
      email: sessionStorage.getItem('userEmail'),
      profileImage: "path/to/profile-image.jpg"
};

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
