<template>
  <div class="min-h-screen bg-gray-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl w-full">
      <!-- Header -->
      <div class="flex justify-between items-center mb-12">
        <div class="flex items-center">
          <div class="w-12 h-12 bg-brand-teal rounded-full flex items-center justify-center mr-3">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 2L3 7v11a1 1 0 001 1h12a1 1 0 001-1V7l-7-5z" clip-rule="evenodd"/>
            </svg>
          </div>
          <h1 class="text-2xl font-bold text-brand-navy">Ecojarah</h1>
        </div>

        <div class="bg-brand-light-green text-brand-navy px-4 py-2 rounded-lg text-sm font-medium">
          EN/AR
        </div>
      </div>

      <!-- Main Content -->
      <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
        <h2 class="text-3xl font-bold text-brand-navy mb-8">
          Your Account is Under Review
        </h2>

        <!-- Illustration -->
        <div class="flex justify-center mb-8">
          <div class="relative">
            <div class="w-64 h-64 bg-gradient-to-br from-brand-teal to-brand-light-green rounded-full flex items-center justify-center">
              <div class="w-48 h-48 bg-white rounded-full flex items-center justify-center shadow-lg">
                <div class="text-center">
                  <div class="w-16 h-16 bg-brand-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                  </div>
                  <div class="w-12 h-12 bg-brand-orange rounded-lg mx-auto">
                    <svg class="w-12 h-12 text-white p-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <h3 class="text-xl font-semibold text-gray-700 mb-6">
          Thank you for registering with Ecojara!
        </h3>

        <p class="text-gray-600 mb-4 leading-relaxed">
          Our team is verifying your details to ensure compliance with Egyptian<br>
          Electricity Regulatory Authority requirements.
        </p>

        <p class="text-gray-600 mb-6">
          You'll receive a confirmation email at
          <span class="text-brand-teal font-medium">user@email.com</span>
        </p>

        <div class="bg-brand-orange bg-opacity-10 rounded-lg p-4 mb-8">
          <p class="text-brand-orange font-semibold text-lg">
            Typically 1-2 business days
          </p>
        </div>

        <div class="flex justify-center space-x-4">
          <button
              @click="goToLogin"
              class="bg-brand-teal hover:bg-brand-teal-dark text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200"
          >
            Back to Login
          </button>
          <button
              @click="contactSupport"
              class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-medium transition-colors duration-200"
          >
            Contact Support
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useRouter } from 'vue-router';

const router = useRouter();

const goToLogin = () => {
  router.push('/buyer/login');
};

const contactSupport = () => {
  // Handle contact support logic
  window.location.href = 'mailto:support@ecojarah.com';
};
</script>