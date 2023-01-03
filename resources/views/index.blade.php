<section class="w-full px-3 antialiased bg-gradient-to-b via-indigo-500 from-indigo-600 to-slate-100 lg:px-6">
  <div class="mx-auto max-w-7xl">
    <nav class="flex items-center w-full h-24 select-none" x-data="{ showMenu: false }">
      <div class="relative flex flex-wrap items-center justify-between w-full h-24 mx-auto font-medium md:justify-center">
        <Link href="/" class="w-1/4 py-4 pl-6 pr-4 md:pl-4 md:py-0">
        <span class="p-1 text-xl font-black leading-none text-white select-none">
          <span>pharmapik</span>
          <span class="text-indigo-300" data-primary="indigo-300">.</span>
        </span>
        </Link>

        <div class="fixed top-0 left-0 z-40 items-center hidden w-full h-full p-3 text-xl bg-gray-900 bg-opacity-50 md:text-sm lg:text-base md:w-3/4 md:bg-transparent md:p-0 md:relative md:flex" :class="{'flex': showMenu, 'hidden': !showMenu }">
          <div class="flex-col w-full h-auto h-full overflow-hidden bg-white rounded-lg select-none md:bg-transparent md:rounded-none md:relative md:flex md:flex-row md:overflow-auto">
            <div class="flex flex-col items-center justify-center w-full h-full mt-12 text-center text-indigo-700 md:text-indigo-200 md:w-2/3 md:mt-0 md:flex-row md:items-center">
              <a href="#" class="inline-block px-4 py-2 mx-2 font-medium text-left text-indigo-700 md:text-white md:px-0 lg:mx-3 md:text-center">Home</a>
              <a href="#" class="inline-block px-0 px-4 py-2 mx-2 font-medium text-left md:px-0 hover:text-indigo-800 md:hover:text-white lg:mx-3 md:text-center">Features</a>
              <a href="#" class="inline-block px-0 px-4 py-2 mx-2 font-medium text-left md:px-0 hover:text-indigo-800 md:hover:text-white lg:mx-3 md:text-center">Blog</a>
              <a href="#" class="inline-block px-0 px-4 py-2 mx-2 font-medium text-left md:px-0 hover:text-indigo-800 md:hover:text-white lg:mx-3 md:text-center">Contact</a>
            </div>

            <div class="flex flex-col items-center justify-end w-full h-full pt-4 md:w-1/3 md:flex-row md:py-0">
              <Link href="{{ route('login') }}" class="w-full pl-6 mr-0 text-indigo-200 hover:text-white md:pl-0 md:mr-3 lg:mr-5 md:w-auto">
              Sign In
              </Link>

              <Link data-rounded="rounded-full" href="{{ route('register') }}" class="inline-flex items-center justify-center px-4 py-2 mr-1 text-base font-medium leading-6 text-indigo-600 whitespace-no-wrap transition duration-150 ease-in-out bg-white border border-transparent rounded-full hover:bg-white focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">
              Sign Up
              </Link>
            </div>
          </div>
        </div>

        <div @click="showMenu = !showMenu" class="absolute right-0 z-50 flex flex-col items-end w-10 h-10 p-2 mr-4 rounded-full cursor-pointer md:hidden hover:bg-gray-900 hover:bg-opacity-10" :class="{ 'text-gray-400': showMenu, 'text-gray-100': !showMenu }">
          <svg class="w-6 h-6" x-show="!showMenu" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" x-cloak>
            <path d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
          <svg class="w-6 h-6" x-show="showMenu" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" x-cloak>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </div>
      </div>
    </nav>

    <div class="container py-32 mx-auto text-center sm:px-4">

      <h1 class="text-4xl font-extrabold leading-10 tracking-tight text-white sm:text-5xl sm:leading-none md:text-6xl xl:text-7xl">
        <span class="block">
          Let us help you find the
        </span>

        <span class="relative inline-block mt-3 text-white">
          nearest pharmacy.
        </span>
      </h1>

      <div class="max-w-lg mx-auto mt-6 text-sm text-center text-indigo-100 md:mt-12 sm:text-base md:max-w-xl md:text-lg xl:text-xl">
        If you are ready to change the way you look for pharmacies around, then you'll want to use our website to make easy!
      </div>

      <section class="max-w-md mx-auto mt-12 flex justify-center">

        <Link href="{{ route('pharmacies.search') }}" modal class="bg-indigo-600 hover:bg-indigo-400 transition duration-500 text-indigo-100 flex justify-center items-center w-64 h-16 font-semibold text-2xl rounded-2xl">
          Try it now.
        </Link>

      </section>
    </div>
  </div>
</section>

<div class="flex flex-col bg-gray-100 dark:bg-gray-900 py-4">
  <div class="max-w-5xl w-full mx-auto px-6 lg:px-8">

    <span>
      <Link href="/">
      <AppLogo class="h-16 w-auto text-gray-700 dark:text-gray-200 sm:h-20" />
      </Link>
    </span>

    <header class="flex items-center my-6 gap-4">
      <div class="flex flex-col">
        <h1 class="text-4xl">Pharmapik</h1>
        <small class="text-gray-500">Find pharmacies near you</small>
      </div>

      <span class="flex-1" />

      <Link href="{{ route('pharmacies.search') }}" modal class="bg-gray-300 rounded-lg hover:bg-gray-400 hover:text-gray-50 transition duration-500 p-1.5">
      <SearchIcon class="h-5 w-5" />
      </Link>
    </header>

    @if($data->count())

    <!-- component -->
    <div class="-mx-4 sm:-mx-8 border-b px-4 sm:px-8 py-4 overflow-x-auto">
      <div class="inline-block min-w-full rounded-lg border overflow-hidden">
        <table class="min-w-full leading-normal">
          <thead>
            <tr class="shadow border-b">
              <th class="px-5 py-3 bg-gray-50 text-left text-md font-semibold text-gray-600 tracking-wider">
                Name
              </th>

              <th class="px-5 py-3 bg-gray-50 text-left text-md font-semibold text-gray-600 tracking-wider">
                Closeness (Km)
              </th>

              <th class="px-5 py-3 bg-gray-50 text-left text-md font-semibold text-gray-600 tracking-wider">
                Status
              </th>
            </tr>
          </thead>

          <tbody>
            @foreach ($data as $pharmacy)
            <tr>
              <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  {{ $pharmacy->name }}
                </p>
              </td>

              <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">{{ $pharmacy->distance }}</p>
              </td>

              <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                  <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                  <span class="relative">Open</span>
                </span>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="mt-6">
      {{$data->links()}}
    </div>

    @endif
  </div>

  <AppFooter />
</div>