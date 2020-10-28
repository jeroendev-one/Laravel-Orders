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
   @if (count($wanbetalers) > 0)
   <!-- List -->
   <div class="rounded-lg overflow-hidden shadow-lg bg-white min-h-64 lg:w-1/3 sm:w-1/3 md:w-1/3">
   <p class="underline px-2 text-gray-900 mb-2 text-2xl font-thin px-4 pt-3">Wanbetalers</p>
   <div class="py-5 px-3">


      @foreach ($wanbetalers as $wanbetaler)
      @if ($loop->first)
      <div class="flex justify-between px-2 py-2 bg-red-100 rounded">
      @else
      <div class="flex justify-between px-2 py-2">
      @endif
            
            @if (\App\Models\User::where('name', $wanbetaler->name)->value('profile_photo_path') != NULL)
            <img class="h-8 w-8 rounded-full" src="/storage/{{ \App\Models\User::where('name', $wanbetaler->name)->value('profile_photo_path') }}" alt="" /><p class="flex text text-gray-700"> {{ $wanbetaler->name }} </p>
            @else
            <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name={{ $wanbetaler->name }}&color=000&background=FFE8E8" alt="" /><p class="flex text text-gray-700"> {{ $wanbetaler->name }} </p>
            @endif
            
            </p>
            <p class="text-gray-500 font-thin">Openstaand: {{ $wanbetaler->amount }}</p>
         </div>
      @endforeach
      </div>
   </div>
   <!-- End list -->
   @endif
</body>
