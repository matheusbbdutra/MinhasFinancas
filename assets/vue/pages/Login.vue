<template>
  <div class="flex items-center justify-center min-h-screen bg-gray-900">
    <div class="login-container bg-gray-800 p-8 rounded-lg shadow-lg max-w-sm w-full">
      <!-- Título Dinâmico com base no modo -->
      <h2 class="text-2xl font-bold text-white text-center mb-6">
        {{ loginMode ? 'Login' : 'Registrar' }}
      </h2>

      <div v-if="!loginMode" class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-300">Nome</label>
        <input
            type="text"
            id="name"
            v-model="name"
            required
            class="mt-1 w-full p-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Digite seu nome"
        />
      </div>
      
      <form @submit.prevent="submitForm">
        <div class="mb-4">
          <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
          <input
              type="email"
              id="email"
              v-model="email"
              required
              class="mt-1 w-full p-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
              placeholder="Digite seu email"
          />
        </div>
        
        <div class="mb-6">
          <label for="password" class="block text-sm font-medium text-gray-300">Senha</label>
          <input
              type="password"
              id="password"
              v-model="password"
              required
              class="mt-1 w-full p-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
              placeholder="Digite sua senha"
          />
        </div>

        <!-- Botão Dinâmico de Submit -->
        <button
            type="submit"
            class="w-full py-2 px-4 bg-blue-500 text-white rounded-lg font-bold hover:bg-blue-600 transition-colors"
        >
          {{ loginMode ? 'Entrar' : 'Registrar' }}
        </button>
      </form>

      <!-- Alternador de Modo Login / Registrar -->
      <div class="text-center mt-4">
        <p class="text-sm text-gray-400">
          {{ loginMode ? 'Não tem uma conta?' : 'Já tem uma conta?' }}
          <span @click="toggleMode" class="text-blue-400 hover:underline cursor-pointer">
            {{ loginMode ? 'Registre-se' : 'Faça Login' }}
          </span>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import ThemedSwal from "../../utils/ThemedSwal";

export default {
  data() {
    return {
      loginMode: true, // Controle para alternar entre login e registro
      email: '',
      password: '',
      name: '' // Necessário apenas para registro
    };
  },
  methods: {
    toggleMode() {
      this.loginMode = !this.loginMode;
      this.email = '';
      this.password = '';
      this.name = '';
    },
    async submitForm() {
      try {
        let response;
        if (this.loginMode) {
          response = await axios.post('/api/usuario/login', {
            email: this.email,
            password: this.password
          });
        } else {
          response = await axios.post('/api/usuario/registrar', {
            email: this.email,
            senha: this.password,
            nome: this.name,
            acao: 'create'
          });
        }

        if (response.status === 200 || response.status === 201) {
          const token = response.data.token;
          const user = response.data.user;
  
          sessionStorage.setItem('userName', user.name);
          sessionStorage.setItem('userEmail', user.email);
          sessionStorage.setItem('authToken', token);

          await this.$router.push('/dashboard');
        }
      } catch (error) {
        if (this.loginMode && error.response && error.response.status === 401) {
          await ThemedSwal.fire({
            icon: 'error',
            title: 'Authentication Failed',
            text: 'Email ou senha inválida, tente novamente.'
          });
        } else {
          await ThemedSwal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Erro ao se registrar, tente novamente.'
          });
        }
      }
    }
  }
};
</script>

<style scoped>
.login-container {
  max-width: 400px;
  width: 100%;
  padding: 40px;
  background-color: #2D3748; /* Mantendo o tom escuro */
}
</style>
