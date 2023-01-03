import './bootstrap'
import '../css/app.css'
import '@protonemedia/laravel-splade/dist/style.css'

import { createApp } from 'vue/dist/vue.esm-bundler.js'

// import Alpine from 'alpinejs'

import {
  ArrowTopRightOnSquareIcon,
  HomeModernIcon,
  MapIcon as LocationIcon,
  MagnifyingGlassIcon as SearchIcon,
} from '@heroicons/vue/24/outline'

import {
  ArrowRightIcon,
  CheckIcon,
  ChevronUpDownIcon,
  PhoneIcon,
  CursorArrowRaysIcon as ServiceIcon,
  ClockIcon as TimeIcon,
} from '@heroicons/vue/20/solid'

import {
  Listbox,
  ListboxButton,
  ListboxLabel,
  ListboxOption,
  ListboxOptions,
} from '@headlessui/vue'

import {
  SpladePlugin,
  renderSpladeApp,
} from '@protonemedia/laravel-splade'

import AppLogo from './components/AppLogo.vue'
import AppFooter from './components/AppFooter.vue'
import Lookup from './components/Lookup.vue'

// window.Alpine = Alpine
// const head = createHead()
// Alpine.start()

const el = document.getElementById('app')

createApp({
  render: renderSpladeApp({ el }),
})
  .use(SpladePlugin, {
    max_keep_alive: 10,
    transform_anchors: false,
    progress_bar: true,
    components: {
      AppLogo,
      AppFooter,
      Lookup,
      SearchIcon,
      ServiceIcon,
      LocationIcon,
      PhoneIcon,
      TimeIcon,
      ArrowRightIcon,
      CheckIcon,
      ArrowTopRightOnSquareIcon,
      HomeModernIcon,
      ChevronUpDownIcon,
      Listbox,
      ListboxLabel,
      ListboxButton,
      ListboxOptions,
      ListboxOption,
    },
  })
  .mount(el)
