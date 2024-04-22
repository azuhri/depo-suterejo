  <!-- start: sidebar -->
  <div class="sidebar p-2 py-md-3 @@cardClass">
      <div class="container-fluid">
          <!-- sidebar: title-->
          <div class="title-text card p-2 mb-4 mt-1 d-flex flex-column align-items-center justify-content-center">
              <img class="w-50" src="{{asset("images/recycle2.png")}}" alt="">
          </div>
          <!-- sidebar: menu list -->
          <div class="main-menu flex-grow-1">
              <ul class="menu-list">
                  <li class="divider py-2 lh-sm"><span class="small">Dashboard Saya</span><br> <small
                          class="text-muted">Daftar Fitur Utama </small></li>
                  <li class="collapsed">
                      <a class="m-link {{url()->current() == route('admin.dashboard.index') ? "active" : ""  }}"
                          href="{{route('admin.dashboard.index')}}" aria-expanded="false">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                              viewBox="0 0 16 16">
                              <path fill-rule="evenodd"
                                  d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z">
                              </path>
                              <path class="var(--secondary-color)" fill-rule="evenodd"
                                  d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z">
                              </path>
                          </svg>
                          <span class="ms-2">Beranda</span>
                      </a>
                  </li>
                  <li class="collapsed">
                      <a class="m-link {{url()->current() == route('admin.dashboard.trash.index') ? "active" : ""  }}" href="{{route('admin.dashboard.trash.index')}}">
                          <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2"
                              fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                              <polyline points="3 6 5 6 21 6"></polyline>
                              <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                              </path>
                              <line x1="10" y1="11" x2="10" y2="17"></line>
                              <line x1="14" y1="11" x2="14" y2="17"></line>
                          </svg>
                          <span class="ms-2">Data Sampah</span>
                          {{-- <span class="arrow fa fa-angle-right ms-auto text-end"></span> --}}
                      </a>
                  </li>

                  <li class="collapsed">
                      <a class="m-link {{url()->current() == route('admin.dashboard.transaction.index') ? "active" : ""  }}" href="{{route('admin.dashboard.transaction.index')}}">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                              viewBox="0 0 16 16">
                              <path class="fill-secondary"
                                  d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                              <path
                                  d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                              <path
                                  d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                          </svg>
                          <span class="ms-2">Daftar Transaksi</span>
                      </a>
                  </li>

                  <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu_dashboard" href="#">
                        <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                        <span class="ms-2">Blog Artikel</span>
                    </a>
                </li>
              </ul>
          </div>
          <!-- sidebar: footer link -->
          <!-- sidebar: footer link -->
          <ul class="menu-list nav navbar-nav flex-row text-center menu-footer-link">
              <li class="nav-item flex-fill p-2">
                  <a class="d-inline-block w-100 color-400"  onclick="openModal('modalLogout')" title="sign-out">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M7.5 1v7h1V1h-1z" />
                          <path class="fill-secondary"
                              d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                      </svg>
                  </a>
              </li>
          </ul>
      </div>
  </div>
