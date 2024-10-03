<template>
  <div class="flex items-center justify-center min-h-screen bg-gray-900">
    <div class="login-container bg-gray-800 p-8 rounded-lg shadow-lg max-w-sm w-full">
      <!-- Título Dinâmico com base no modo -->
      <h2 class="text-2xl font-bold text-white text-center mb-6">
        {{ loginMode ? 'Login' : 'Registrar' }}
      </h2>

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
      // Alterna entre o modo de Login e Registrar
      this.loginMode = !this.loginMode;
      // Limpa os campos ao alternar
      this.email = '';
      this.password = '';
      this.name = '';
    },
    submitForm() {
      if (this.loginMode) {
        // Lógica de login
        console.log('Logando com:', this.email, this.password);
        // Faça uma requisição à API de login
        const mockApiResponse = {token: '1234567890'}; // Exemplo fictício
        sessionStorage.setItem('authToken', mockApiResponse.token);
        this.$router.push('/dashboard');
      } else {
        // Lógica de registro
        console.log('Registrando com:', this.name, this.email, this.password);
        // Faça uma requisição à API de registro
        const mockRegisterResponse = {success: true}; // Exemplo fictício
        if (mockRegisterResponse.success) {
          alert('Registrado com sucesso! Faça login.');
          this.toggleMode(); // Alterna para a tela de login após o registro bem-sucedido
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
