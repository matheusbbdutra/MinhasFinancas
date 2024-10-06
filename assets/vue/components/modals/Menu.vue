<template>
  <div class="absolute top-full right-0 mt-2 w-48 bg-gray-800 rounded-md shadow-lg py-2 z-50 border border-gray-700" @click.stop>
    <div class="px-4 py-2 text-sm font-bold text-white border-b border-gray-700">WELCOME!</div>
    <ul class="dropdown-menu">
      <li @click="goToProfile" class="flex items-center px-4 py-2 hover:bg-gray-700 cursor-pointer text-white">
        <i class="fas fa-user mr-2"></i> My profile
      </li>
      <li @click="goToSettings" class="flex items-center px-4 py-2 hover:bg-gray-700 cursor-pointer text-white">
        <i class="fas fa-cog mr-2"></i> Settings
      </li>
      <li @click="goToActivity" class="flex items-center px-4 py-2 hover:bg-gray-700 cursor-pointer text-white">
        <i class="fas fa-calendar mr-2"></i> Activity
      </li>
      <li @click="goToSupport" class="flex items-center px-4 py-2 hover:bg-gray-700 cursor-pointer text-white">
        <i class="fas fa-life-ring mr-2"></i> Support
      </li>
      <li @click="logout" class="flex items-center px-4 py-2 hover:bg-gray-700 cursor-pointer text-white border-t border-gray-700">
        <i class="fas fa-sign-out-alt mr-2"></i> Logout
      </li>
    </ul>
  </div>
</template>

<script>
import { logout } from '../../services/authService';

export default {
  methods: {
    goToProfile() {
      // Lógica para redirecionar ao perfil
    },
    goToSettings() {
      // Lógica para configurações
    },
    goToActivity() {
      // Lógica para atividades
    },
    goToSupport() {
      // Lógica para suporte
    },
    logout() {
      logout();
      this.$emit('closeDropdown');
      this.$router.push('/login');
    }
  }
};
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.3s;
}

.fade-enter, .fade-leave-to {
  opacity: 0;
}
</style>
