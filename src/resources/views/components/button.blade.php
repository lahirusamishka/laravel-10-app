<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full bg-gray-800 text-white hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800']) }}>{{ $slot }}</button>