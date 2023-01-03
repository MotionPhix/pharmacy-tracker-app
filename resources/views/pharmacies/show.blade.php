<x-splade-modal class="p-0 rounded-lg" position="top">
  <section class="px-4 py-2 border-b rounded-t-lg">
    <h3 class="text-2xl">{{$pharmacy->name}}</h3>
    <div class="text-sm text-gray-500">
      Located in Lilongwe
    </div>
  </section>

  <section class="relative px-4 py-4 overflow-y-auto max-h-96 scrollbar-w-1 scrollbar-thumb-gray-400 scrollbar-track-gray-200 ">
    <ul class="space-y-4">
      <li class="flex items-center gap-4">
        <span class="text-gray-100 bg-gray-400 rounded-xl p-1">
          <ServiceIcon class="h-8 w-8" />
        </span>

        <section class="flex flex-col">
          <h3 class="text-indigo-600 font-semibold text-lg">Service options</h3>
          <p class="text-gray-500 text-sm">In-store shopping</p>
        </section>
      </li>

      <li class="flex items-center gap-4">
        <span class="text-gray-100 bg-gray-400 rounded-xl p-1">
          <LocationIcon class="h-8 w-8" />
        </span>

        <section class="flex flex-col">
          <h3 class="text-indigo-600 font-semibold text-lg">Address</h3>
          <p class="text-gray-500 text-sm">
            {{ $pharmacy->address }}
          </p>
        </section>
      </li>

      <li class="flex items-center gap-4">
        <span class="text-gray-100 bg-gray-400 rounded-xl p-1">
          <TimeIcon class="h-8 w-8" />
        </span>

        <section class="flex flex-col">
          <h3 class="text-indigo-600 font-semibold text-lg">Hours</h3>
          <p class="text-gray-500 text-sm">Open ⋅ Closes 9PM</p>
        </section>
      </li>

      <li class="flex items-center gap-4">
        <span class="text-gray-100 bg-gray-400 rounded-xl p-1">
          <PhoneIcon class="h-8 w-8" />
        </span>

        <section class="flex flex-col">
          <h3 class="text-indigo-600 font-semibold text-lg">Phone</h3>
          <p class="text-gray-500 text-sm">0999 40 55 93</p>
        </section>
      </li>
    </ul>

    <article class="absolute pr-3 -right-0 bottom-5">
      <Link href="#" class="flex items-center gap-2 transition duration-500 hover:text-blue-800">
        <span>Get directions</span> <ArrowTopRightOnSquareIcon class="h-4 w-4" />
      </Link>
    </article>
  </section>
</x-splade-modal>
