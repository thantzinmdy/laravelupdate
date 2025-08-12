@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>@lang('strings.backend.dashboard.welcome') {{ $logged_in_user->name }}!</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <div class="row">
                    
                      <?php
                          $color = 0;
                          $colors = rand_color();
                      ?>
                       <!-- Small boxes (Stat box) -->
                          <div class="col-lg-3 col-xs-6">
                            <div class="card">
                              <a href="{{ url('admin/auth/user') }}" style="text-decoration: none;">
                                <div class="card-body">
                                  <div class="h1 text-muted text-right mb-4">
                                    <i class="fas fa-user"></i>
                                  </div>
                                  <div class="h4 mb-0">Acccess User</div>
                                  <small class="text-muted text-uppercase font-weight-bold">Management</small>
                                  <div class="progress progress-xs mt-3 mb-0">
                                    <div class="progress-bar bg-{{ @$colors[$color++] }}" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                              </a>
                            </div>
                          </div>

                          <div class="col-lg-3 col-xs-6">
                            <div class="card">
                              <a href="{{ url('admin/auth/role') }}" style="text-decoration: none;">
                                <div class="card-body">
                                  <div class="h1 text-muted text-right mb-4">
                                    <i class="fas fa-user"></i>
                                  </div>
                                  <div class="h4 mb-0">Acccess Role</div>
                                  <small class="text-muted text-uppercase font-weight-bold">Management</small>
                                  <div class="progress progress-xs mt-3 mb-0">
                                    <div class="progress-bar bg-{{ @$colors[$color++] }}" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                              </a>
                            </div>
                          </div>

                          @foreach(Module::getOrdered() as $module)
                          @if($module->enabled())
                              <?php 
                                  $module = $module->getLowerName();
                                  $route = 'admin.'.$module.'.index';
                                  $active = 'admin/'.$module.'*';
                                  $mod_trans = $module.'::menus.backend.sidebar.'.$module;
                                  // dd($route);
                              ?>
                              @can('view '.$module)
                                  <!-- ./col -->
                                  <div class="col-lg-3 col-xs-6">
                                      <div class="card">
                                      <a href="{{ route($route) }}" style="text-decoration: none;">
                                        <div class="card-body">
                                          <div class="h1 text-muted text-right mb-4">
                                            <i class="{{ config($module.'.icon') }}"></i>
                                          </div>
                                          <div class="h4 mb-0">{{ ucfirst($module) }}</div>
                                          <small class="text-muted text-uppercase font-weight-bold">Management</small>
                                          <div class="progress progress-xs mt-3 mb-0">
                                            <div class="progress-bar bg-{{ @$colors[$color++] }}" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        </div>
                                      </a>
                                    </div>
                                  </div>
                                  <!-- ./col -->
                              @endcan
                          @endif
                          @endforeach

                  </div><!--card-block-->
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
