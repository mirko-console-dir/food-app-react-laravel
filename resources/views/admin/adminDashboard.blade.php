<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12" style="background: red">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Hi ADMIN You're logged in!
                </div>
                <main class="py-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="nav flex-column nav-pills">
                                    <a class="nav-link {{ Route::is('admindashboard') ? 'active' : '' }}"
                                        href="{{ route('admindashboard') }}">
                                        Dashboard
                                    </a>
                                    <a class="nav-link {{ Route::is('admindashboard.products*') }}"
                                    href="{{ route('products.index') }}"
                                          >
                                          Products
                                      </a> 
                                      <a class="nav-link {{ Route::is('admindashboard.variants*') ? 'active' : '' }}"
                                      href="{{ route('variants.index') }}"
                                            >
                                            Variants
                                        </a> 
                                        <a class="nav-link {{ Route::is('admindashboard.purchases*') ? 'active' : '' }}"
                                        href="{{ route('purchases.index') }}"
                                              >
                                              Purchases
                                          </a> 
                                </div>
                            </div>
                            <div class="col border-left">
                                <div class="page">
                                      
                                       @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
