<script setup lang="ts">
import { computed, inject, ref } from 'vue'

interface PharmacyInterface {
  pharmacies?: {
    id: Number
    name: String
    address?: String
  }[]
}

const props = withDefaults(defineProps<PharmacyInterface>(), {
  pharmacies: () => [],
})

const Splade = inject('$splade')

const search = ref('')

const filteredPharmacies = computed(() =>
  props.pharmacies.filter(
    i => i.name.toLowerCase().includes(search.value.toLowerCase()),
  ),
)

const closeModal = () => {
  Splade.refresh()
}

const showPharmacy = (pharmacy) => {
  Splade.modal(`/pharmacies/${pharmacy.id}`)
}
</script>

<template>
  <div class="flex items-center bg-gray-200 rounded-md">
    <div class="px-2">
      <svg
        class="fill-current text-gray-500 w-6 h-6" xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
      >
        <path
          class="heroicon-ui"
          d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"
        />
      </svg>
    </div>

    <input
      id="search"
      v-model="search"
      class="w-full focus:border-0 border-0 rounded-md bg-gray-200 text-gray-700 leading-tight focus:outline-none py-2 px-2"
      type="text"
      placeholder="Search pharmacies"
    >
  </div>

  <div class="text-sm scrollbar-w-1 overflow-y-auto scrollbar-thumb-gray-400 scrollbar-track-gray-200 max-h-72">
    <button
      v-for="(pharmacy, idx) in filteredPharmacies"
      :key="idx"
      class="flex w-full flex-col justify-start cursor-pointer text-gray-700 hover:text-blue-400 hover:bg-blue-100 rounded-md px-2 py-2 my-2"
      @click="showPharmacy(pharmacy)"
    >
      <h3 class="flex-grow font-semibold" v-text="pharmacy.name" />

      <small class="text-xs text-gray-500 tracking-wide">
        {{ pharmacy.address }}
      </small>
    </button>
  </div>

  <div v-if="!filteredPharmacies.length" class="flex py-6 flex-col text-center items-center gap-4 bg-gray-200 text-sm rounded-b-lg">
    <HomeModernIcon class="h-10 w-10 text-gray-400" />

    <section class="flex flex-col">
      <h3 class="text-lg font-semibold text-gray-700">
        No pharmacy <span class="text-blue-700 bg-gray-300 px-1 rounded">{{ search }}</span>
      </h3>

      <p class="text-gray-500">
        Looks like we don't have that in our database
      </p>
    </section>

    <span>
      <button
        type="button"
        class="bg-blue-500 duration-500 transition flex items-center gap-2 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        @click="closeModal"
      >
        <span>Ask</span> <ArrowRightIcon class="h-4 w-4" />
      </button>
    </span>
  </div>
</template>
