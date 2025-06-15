<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
          <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-teal-600 rounded-full flex items-center justify-center">
              <span class="text-white font-bold text-lg">C</span>
            </div>
            <span
                class="text-gray-600 text-sm hidden sm:block">The World's Most User-Centric IREC Trading Platform</span>
          </div>
          <div class="flex items-center space-x-2">
            <button class="px-3 py-1 text-sm text-teal-600 bg-teal-50 rounded">EN</button>
            <span class="text-gray-400">/</span>
            <button class="px-3 py-1 text-sm text-gray-600 hover:text-teal-600">AR</button>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <div class="bg-white rounded-lg shadow-sm p-6 sm:p-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-center text-gray-900 mb-8">Create Buyer Account</h1>

        <form @submit.prevent="handleSubmit" class="space-y-6">
          <!-- Name Fields -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">
                First Name <span class="text-red-500">*</span>
              </label>
              <input
                  id="firstName"
                  v-model="form.firstName"
                  type="text"
                  required
                  class="form-input"
                  placeholder="First Name"
              />
            </div>
            <div>
              <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1">
                Last Name <span class="text-red-500">*</span>
              </label>
              <input
                  id="lastName"
                  v-model="form.lastName"
                  type="text"
                  required
                  class="form-input"
                  placeholder="Last Name"
              />
            </div>
          </div>

          <!-- Company Name -->
          <div>
            <label for="companyName" class="block text-sm font-medium text-gray-700 mb-1">
              Company Name <span class="text-red-500">*</span>
            </label>
            <input
                id="companyName"
                v-model="form.companyName"
                type="text"
                required
                class="form-input"
                placeholder="Company Name"
            />
          </div>

          <!-- Email -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
              Email Address <span class="text-red-500">*</span>
            </label>
            <input
                id="email"
                v-model="form.email"
                type="email"
                required
                class="form-input"
                placeholder="Email Address"
            />
          </div>

          <!-- Phone -->
          <div>
            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
              Phone Number <span class="text-red-500">*</span>
            </label>
            <input
                id="phone"
                v-model="form.phone"
                type="tel"
                required
                class="form-input"
                placeholder="Phone Number"
            />
          </div>

          <!-- Password Fields -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                Create Password <span class="text-red-500">*</span>
              </label>
              <input
                  id="password"
                  v-model="form.password"
                  type="password"
                  required
                  class="form-input"
                  placeholder="Create Password"
              />
            </div>
            <div>
              <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-1">
                Confirm Password <span class="text-red-500">*</span>
              </label>
              <input
                  id="confirmPassword"
                  v-model="form.confirmPassword"
                  type="password"
                  required
                  class="form-input"
                  placeholder="Confirm Password"
              />
            </div>
          </div>

          <!-- VAT Number -->
          <div>
            <label for="vatNumber" class="block text-sm font-medium text-gray-700 mb-1">
              VAT Registration Number (Optional)
            </label>
            <input
                id="vatNumber"
                v-model="form.vatNumber"
                type="text"
                class="form-input"
                placeholder="VAT Registration Number (Optional)"
            />
          </div>

          <!-- KYC Document Upload -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
              KYC Document Upload <span class="text-red-500">*</span>
            </label>
            <div
                @drop="handleDrop"
                @dragover.prevent
                @dragenter.prevent
                class="upload-area"
                :class="{ 'upload-area-active': isDragOver }"
                @dragenter="isDragOver = true"
                @dragleave="isDragOver = false"
            >
              <div class="flex flex-col items-center space-y-4">
                <div class="upload-icon">
                  <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                  </svg>
                </div>
                <div>
                  <p class="text-lg font-medium text-gray-900">Drag and drop your documents here</p>
                  <p class="text-sm text-gray-500 mt-1">Upload your business license and other required documents for
                    verification.</p>
                </div>
                <button
                    type="button"
                    @click="$refs.fileInput.click()"
                    class="browse-btn"
                >
                  Browse Files
                </button>
                <input
                    ref="fileInput"
                    type="file"
                    multiple
                    accept=".pdf,.jpg,.jpeg,.png,.doc,.docx"
                    @change="handleFileSelect"
                    class="hidden"
                />
              </div>
            </div>
            <div v-if="uploadedFiles.length > 0" class="mt-3">
              <p class="text-sm font-medium text-gray-700 mb-2">Uploaded Files:</p>
              <ul class="space-y-1">
                <li v-for="file in uploadedFiles" :key="file.name" class="file-item">
                  <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                          clip-rule="evenodd"/>
                  </svg>
                  {{ file.name }}
                </li>
              </ul>
            </div>
          </div>

          <!-- Terms Checkbox -->
          <div class="flex items-start space-x-3">
            <input
                id="terms"
                v-model="form.agreeToTerms"
                type="checkbox"
                required
                class="checkbox"
            />
            <label for="terms" class="text-sm text-gray-700">
              I agree to the <a href="#" class="link">Terms & Conditions</a>
            </label>
          </div>

          <!-- Submit Button -->
          <button
              type="submit"
              :disabled="!isFormValid"
              class="submit-btn"
          >
            Register
          </button>

          <!-- Login Link -->
          <p class="text-center text-sm text-gray-600">
            Already have an account?
            <router-link :to="{ name: 'buyer-login' }" class="link font-medium">Log in</router-link>
          </p>
        </form>
      </div>
    </main>
  </div>
</template>

<script setup>
import {ref, computed} from 'vue'

const form = ref({
  firstName: '',
  lastName: '',
  companyName: '',
  email: '',
  phone: '',
  password: '',
  confirmPassword: '',
  vatNumber: '',
  agreeToTerms: false
})

const uploadedFiles = ref([])
const isDragOver = ref(false)

const isFormValid = computed(() => {
  return form.value.firstName &&
      form.value.lastName &&
      form.value.companyName &&
      form.value.email &&
      form.value.phone &&
      form.value.password &&
      form.value.confirmPassword &&
      form.value.password === form.value.confirmPassword &&
      form.value.agreeToTerms &&
      uploadedFiles.value.length > 0
})

const handleFileSelect = (event) => {
  const files = Array.from(event.target.files)
  uploadedFiles.value = [...uploadedFiles.value, ...files]
}

const handleDrop = (event) => {
  event.preventDefault()
  isDragOver.value = false
  const files = Array.from(event.dataTransfer.files)
  uploadedFiles.value = [...uploadedFiles.value, ...files]
}

const handleSubmit = () => {
  if (isFormValid.value) {
    console.log('Form submitted:', form.value)
    console.log('Uploaded files:', uploadedFiles.value)
    // Handle form submission here
  }
}
</script>

<style scoped>
/* Form Input Styles */
.form-input {
  @apply w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 placeholder-gray-500;
  @apply focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent focus:bg-white;
  @apply transition-all duration-200;
  font-size: 14px;
}

.form-input:focus {
  box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.1);
}

/* Upload Area Styles */
.upload-area {
  @apply border-2 border-dashed border-gray-300 rounded-lg p-8 text-center cursor-pointer;
  @apply hover:border-teal-400 transition-all duration-200;
  background-color: #fafafa;
}

.upload-area-active {
  @apply border-teal-400 bg-teal-50;
}

.upload-icon {
  @apply w-12 h-12 text-teal-600 mx-auto;
}

/* Browse Button */
.browse-btn {
  @apply px-6 py-2 bg-teal-600 text-white rounded-lg font-medium;
  @apply hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2;
  @apply transition-all duration-200;
  font-size: 14px;
}

/* Submit Button */
.submit-btn {
  @apply w-full bg-teal-600 text-white py-4 px-6 rounded-lg font-semibold text-lg;
  @apply hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2;
  @apply disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200;
}

.submit-btn:not(:disabled):hover {
  transform: translateY(-1px);
  box-shadow: 0 4px 12px rgba(20, 184, 166, 0.3);
}

/* Checkbox Styles */
.checkbox {
  @apply h-4 w-4 text-teal-600 border-gray-300 rounded;
  @apply focus:ring-teal-500 focus:ring-2 focus:ring-offset-0;
}

/* Link Styles */
.link {
  @apply text-teal-600 hover:text-teal-700 underline transition-colors duration-200;
}

/* File Item */
.file-item {
  @apply text-sm text-gray-600 flex items-center;
}

/* Responsive adjustments */
@media (max-width: 640px) {
  .form-input {
    @apply py-3 px-3;
    font-size: 16px; /* Prevents zoom on iOS */
  }

  .upload-area {
    @apply p-6;
  }

  .submit-btn {
    @apply py-3 text-base;
  }
}

/* Custom focus styles for better accessibility */
.form-input:focus,
.checkbox:focus,
.browse-btn:focus,
.submit-btn:focus {
  outline: none;
}

/* Smooth transitions for all interactive elements */
* {
  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 150ms;
}
</style>