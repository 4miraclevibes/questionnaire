        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo" style="height: 150px">
              <a href="{{ route('dashboard') }}" class="app-brand-link">
                <span class="app-brand-logo demo">
                  <img src="{{ asset('assets/img/smk1sitiung.png') }}" style="max-width: 120px" alt="">
                </span>
              </a>
  
              <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
              </a>
            </div>
  
            <div class="menu-inner-shadow"></div>
  
            <ul class="menu-inner py-1 mt-3">
              {{-- Dashboard --}}
              <li class="menu-item">
                <a href="{{ route('dashboard') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-home"></i>
                  <div data-i18n="Analytics">Dashboard</div>
                </a>
              </li>
              @if (Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'operator')
              {{-- Users --}}
              <li class="menu-item {{ Route::is('users*') ? 'active' : '' }} {{ Auth::user()->role->name == 'operator' ? 'd-none' : '' }}">
                <a href="{{ route('users.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-user"></i>
                  <div data-i18n="Analytics">Users</div>
                </a>
              </li>
              {{-- Categories --}}
              <li class="menu-item {{ Route::is('categories*') ? 'active' : '' }} {{ Auth::user()->role->name == 'admin' ? 'd-none' : '' }}">
                <a href="{{ route('categories.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-category"></i>
                  <div data-i18n="Analytics">Categories</div>
                </a>
              </li>
              {{-- Questionnaires --}}
              <li class="menu-item {{ Route::is(['questionnaires*', 'categoryQuestionnaires*']) ? 'active' : '' }} {{ Auth::user()->role->name == 'admin' ? 'd-none' : '' }}">
                <a href="{{ route('questionnaires.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-paper-plane"></i>
                  <div data-i18n="Analytics">Questionnaires</div>
                </a>
              </li>
              @endif
              {{-- Results --}}
              <li class="menu-item {{ Route::is('results*') ? 'active' : '' }} {{ Auth::user()->role->name == 'admin' ? 'd-none' : '' }}  ">
                <a href="{{ route('results.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-bar-chart-alt-2"></i>
                  <div data-i18n="Analytics">Results</div>
                </a>
              </li>
            </ul>
          </aside>
          <!-- / Menu -->