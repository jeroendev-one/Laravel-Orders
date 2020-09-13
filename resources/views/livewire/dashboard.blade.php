<body class="antialiased">
   <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
   <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg shadow-lg">
      <div class="grid grid-cols-1 md:grid-cols-3">
         <div class="p-6">
            <div class="flex items-center">
               <i class="fas fa-pen"></i>
               <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ route('order') }}" class="underline text-gray-900 dark:text-white">Place order</a></div>
            </div>
            <div class="ml-12">
               <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                  Place your order
               </div>
            </div>
         </div>
         <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
            <div class="flex items-center">
               <i class="fas fa-shopping-cart"></i>
               <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ route('my-orders') }}" class="underline text-gray-900 dark:text-white">My orders</a></div>
            </div>
            <div class="ml-12">
               <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                  View your orders
               </div>
            </div>
         </div>
         <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
            <div class="flex items-center">
               <i class="fas fa-shopping-cart"></i>
               <div class="ml-4 text-lg leading-7 font-semibold"><a class="underline text-gray-900 dark:text-white">Total orders</a></div>
            </div>
            <div class="ml-12">
               <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                  Amount: {{ $totalOrders }}
               </div>
            </div>
         </div>
      </div>
   </div>
   <br>
   <!-- List -->
   <div class="rounded-lg overflow-hidden shadow-lg bg-white min-h-64 lg:w-1/3 sm:w-1/3 md:w-1/3">
   <i class="fa fa-money" aria-hidden="true"></i>
   <p class="underline px-2 text-gray-900 mb-2 text-2xl font-thin px-4 pt-3">Wanbetalers</p>
   <div class="py-5 px-3">
      @foreach ($wanbetalers as $wanbetaler)
      @if ($loop->first)
      <div class="flex justify-between px-2 py-2 bg-red-100 rounded">
         @else
         <div class="flex justify-between px-2 py-2">
            @endif
            <p class="flex text-gray-700">
               <svg class="h2 w-2 text-teal-500 mx-2" viewBox="0 0 8 8" fill="currentColor">
                  <circle cx="4" cy="4" r="3" />
               </svg>
               {{ $wanbetaler->name }}
            </p>
            <p class="text-gray-500 font-thin">Openstaand: {{ $wanbetaler->amount }}</p>
         </div>
         @endforeach
      </div>
   </div>
</body>