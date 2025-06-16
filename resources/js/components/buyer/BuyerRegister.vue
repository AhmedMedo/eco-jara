<template>
  <div class="min-h-screen bg-gradient-to-br from-teal-50 to-blue-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div class="text-center">
        <div class="flex justify-center mb-6">
          <img :src="logo" alt="Ecojarah" class="w-16 h-16" />
        </div>
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Ecojarah</h2>
        <p class="text-gray-600">Create your buyer account</p>
      </div>

      <form @submit.prevent="handleRegister" class="mt-8 space-y-6">
        <div class="space-y-4">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label for="firstName" class="block text-sm font-medium text-gray-700 mb-2">
                First Name
              </label>
              <input
                  id="firstName"
                  name="firstName"
                  type="text"
                  v-model="form.firstName"
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-teal focus:border-transparent transition-colors duration-200"
                  placeholder="Enter your first name"
              />
            </div>

            <div>
              <label for="lastName" class="block text-sm font-medium text-gray-700 mb-2">
                Last Name
              </label>
              <input
                  id="lastName"
                  name="lastName"
                  type="text"
                  v-model="form.lastName"
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-teal focus:border-transparent transition-colors duration-200"
                  placeholder="Enter your last name"
              />
            </div>
          </div>

          <div>
            <label for="company" class="block text-sm font-medium text-gray-700 mb-2">
              Company Name
            </label>
            <input
                id="company"
                name="company"
                type="text"
                v-model="form.company"
                required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-teal focus:border-transparent transition-colors duration-200"
                placeholder="Enter your company name"
            />
          </div>

          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
              Email Address
            </label>
            <input
                id="email"
                name="email"
                type="email"
                v-model="form.email"
                required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-teal focus:border-transparent transition-colors duration-200"
                placeholder="Enter your email"
            />
          </div>

          <div>
            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
              Phone Number
            </label>
            <input
                id="phone"
                name="phone"
                type="tel"
                v-model="form.phone"
                required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-teal focus:border-transparent transition-colors duration-200"
                placeholder="Enter your phone number"
            />
          </div>

          <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
              Password
            </label>
            <input
                id="password"
                name="password"
                type="password"
                v-model="form.password"
                required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-teal focus:border-transparent transition-colors duration-200"
                placeholder="Enter your password"
            />
          </div>

          <div>
            <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-2">
              Confirm Password
            </label>
            <input
                id="confirmPassword"
                name="confirmPassword"
                type="password"
                v-model="form.confirmPassword"
                required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-teal focus:border-transparent transition-colors duration-200"
                placeholder="Confirm your password"
            />
          </div>
        </div>

        <div class="flex items-center">
          <input
              id="terms"
              name="terms"
              type="checkbox"
              v-model="form.terms"
              required
              class="h-4 w-4 text-brand-teal border-gray-300 rounded focus:ring-brand-teal"
          />
          <label for="terms" class="ml-2 block text-sm text-gray-700">
            I agree to the
            <a href="#" class="font-medium text-brand-teal hover:text-brand-teal-dark transition-colors duration-200">
              Terms of Service
            </a>
            and
            <a href="#" class="font-medium text-brand-teal hover:text-brand-teal-dark transition-colors duration-200">
              Privacy Policy
            </a>
          </label>
        </div>

        <div>
          <button
              type="submit"
              :disabled="loading"
              class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-brand-teal hover:bg-brand-teal-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-teal transition-colors duration-200 disabled:opacity-50"
          >
            <span v-if="loading" class="flex items-center">
              <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
              Creating Account...
            </span>
            <span v-else>Create Account</span>
          </button>
        </div>

        <div class="text-center">
          <p class="text-sm text-gray-600">
            Already have an account?
            <router-link to="/buyer/login" class="font-medium text-brand-teal hover:text-brand-teal-dark transition-colors duration-200">
              Sign in here
            </router-link>
          </p>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import logo from '../../../images/logo.png';

const router = useRouter();
const loading = ref(false);

const form = ref({
  firstName: '',
  lastName: '',
  company: '',
  email: '',
  phone: '',
  password: '',
  confirmPassword: '',
  terms: false
});

const handleRegister = async () => {
  if (form.value.password !== form.value.confirmPassword) {
    alert('Passwords do not match');
    return;
  }

  loading.value = true;

  // Simulate API call
  setTimeout(() => {
    loading.value = false;
    // Redirect to account under review page
    router.push('/buyer/account-review');
  }, 2000);
};
</script>