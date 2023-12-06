@extends('dashboard/app')

@section('content')
<!-- partial -->
<link rel="stylesheet" href="{{ asset('dashboard\template\css\cards.css') }}">
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="row">

                        <div class="d-flex justify-content-between">
                            <h2 class="fw-bold mt-4">Menunggu Persetujuan</h2>
                            <div class="row form-group">
                                <div class="col me-2" style="align-items: center;">
                                    <form method="get" action="{{ route('adminjkt.persetujuan.cari') }}">
                                        @csrf
                                        <label class="" for="search">Cari Nama Tamu</label>
                                        <div class="d-flex" style="align-items: center">
                                            <input type="text" class="form-control me-1 mb-4" id="search" name="search" value="{{ $namaTamu ?? '' }}">
                                            <input type="hidden" name="status_surat" value="{{ $statusSurat ?? '' }}">
                                            <button class="btn mb-4" type="submit" style="background-color: #097b96; color: white">Cari</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="card mt-2">
                                <div class="card-body">
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th>Nama Tamu</th>
                                                <th>Asal Perusahaan</th>
                                                <th>Periode</th>

                                                <th>Status Surat</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($surat1 as $data)
                                            <td>{{ $data->surat1->nama_tamu }}</td>
                                <td>{{ $data->surat1->asal_perusahaan }}</td>
                                <td>{{ $data->surat1->periode->tanggal_masuk->format('d-m-Y') }}
                                    s.d. {{ $data->surat1->periode->tanggal_keluar->format('d-m-Y') }}</td>
                                <td><p class="badge badge-warning">{{ $data->statusSurat->nama_status_surat }}</p></td>
                                <td>
                                    <a href="{{ route('admin.surat2.show', ['id' => $data->id_surat_2]) }}" class="btn" style="background-color: #097b86; color: white">Lihat</a>
                                </td>
                            </tr>
                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="mt-3 d-flex justify-content-end" style="color: #097b96">
                                <ul class="pagination">
                                    {{-- Previous Page Link --}}
                                    @if ($surat1->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link">&laquo;</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $surat1->previousPageUrl() }}" rel="prev">&laquo;</a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @for ($page = max(1, $surat1->currentPage() - 2); $page <= min($surat1->lastPage(), $surat1->currentPage() + 2); $page++)
                                        @if ($surat1->currentPage() == $page)
                                            <li class="page-item active" aria-current="page">
                                                <span class="page-link" style="background-color: #097b96; color: white">{{ $page }}</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class=" page-link"  href="{{ $surat1->url($page) }}">{{ $page }}</a>
                                            </li>
                                        @endif
                                    @endfor

                                    {{-- Next Page Link --}}
                                    @if ($surat1->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link"style="background-color: #097b96; color: white" href="{{ $surat1->nextPageUrl() }}" rel="next">&raquo;</a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <span class="page-link">&raquo;</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                    </div>
                    {{-- <div class="col-lg-4 d-flex flex-column">
                      <div class="card card-rounded">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title card-title-dash">Type By Amount</h4>
                              </div>
                              <canvas class="my-auto" id="doughnutChart" height="200"></canvas>
                              <div id="doughnut-chart-legend" class="mt-5 text-center"></div>
                            </div>
                          </div>
                        </div>
                      </div> --}}
                    {{-- <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title card-title-dash">Todo list</h4>
                                    <div class="add-items d-flex mb-0">
                                      <!-- <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> -->
                                      <button class="add btn btn-icons btn-rounded btn-primary todo-list-add-btn text-white me-0 pl-12p"><i class="mdi mdi-plus"></i></button>
                                    </div>
                                  </div>
                                  <div class="list-wrapper">
                                    <ul class="todo-list todo-list-rounded">
                                      <li class="d-block">
                                        <div class="form-check w-100">
                                          <label class="form-check-label">
                                            <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                          </label>
                                          <div class="d-flex mt-2">
                                            <div class="ps-4 text-small me-3">24 June 2020</div>
                                            <div class="badge badge-opacity-warning me-3">Due tomorrow</div>
                                            <i class="mdi mdi-flag ms-2 flag-color"></i>
                                          </div>
                                        </div>
                                      </li>
                                      <li class="d-block">
                                        <div class="form-check w-100">
                                          <label class="form-check-label">
                                            <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                          </label>
                                          <div class="d-flex mt-2">
                                            <div class="ps-4 text-small me-3">23 June 2020</div>
                                            <div class="badge badge-opacity-success me-3">Done</div>
                                          </div>
                                        </div>
                                      </li>
                                      <li>
                                        <div class="form-check w-100">
                                          <label class="form-check-label">
                                            <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                          </label>
                                          <div class="d-flex mt-2">
                                            <div class="ps-4 text-small me-3">24 June 2020</div>
                                            <div class="badge badge-opacity-success me-3">Done</div>
                                          </div>
                                        </div>
                                      </li>
                                      <li class="border-bottom-0">
                                        <div class="form-check w-100">
                                          <label class="form-check-label">
                                            <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                          </label>
                                          <div class="d-flex mt-2">
                                            <div class="ps-4 text-small me-3">24 June 2020</div>
                                            <div class="badge badge-opacity-danger me-3">Expired</div>
                                          </div>
                                        </div>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                      <h4 class="card-title card-title-dash">Leave Report</h4>
                                    </div>
                                    <div>
                                      <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Month Wise </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                          <h6 class="dropdown-header">week Wise</h6>
                                          <a class="dropdown-item" href="#">Year Wise</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mt-3">
                                    <canvas id="leaveReport"></canvas>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                      <h4 class="card-title card-title-dash">Top Performer</h4>
                                    </div>
                                  </div>
                                  <div class="mt-3">
                                    <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                      <div class="d-flex">
                                        <img class="img-sm rounded-10" src="/dashboard/template/images/faces/face1.jpg" alt="profile">
                                        <div class="wrapper ms-3">
                                          <p class="ms-1 mb-1 fw-bold">Brandon Washington</p>
                                          <small class="text-muted mb-0">162543</small>
                                        </div>
                                      </div>
                                      <div class="text-muted text-small">
                                        1h ago
                                      </div>
                                    </div>
                                    <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                      <div class="d-flex">
                                        <img class="img-sm rounded-10" src="/dashboard/template/images/faces/face2.jpg" alt="profile">
                                        <div class="wrapper ms-3">
                                          <p class="ms-1 mb-1 fw-bold">Wayne Murphy</p>
                                          <small class="text-muted mb-0">162543</small>
                                        </div>
                                      </div>
                                      <div class="text-muted text-small">
                                        1h ago
                                      </div>
                                    </div>
                                    <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                      <div class="d-flex">
                                        <img class="img-sm rounded-10" src="/dashboard/template/images/faces/face3.jpg" alt="profile">
                                        <div class="wrapper ms-3">
                                          <p class="ms-1 mb-1 fw-bold">Katherine Butler</p>
                                          <small class="text-muted mb-0">162543</small>
                                        </div>
                                      </div>
                                      <div class="text-muted text-small">
                                        1h ago
                                      </div>
                                    </div>
                                    <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                      <div class="d-flex">
                                        <img class="img-sm rounded-10" src="/dashboard/template/images/faces/face4.jpg" alt="profile">
                                        <div class="wrapper ms-3">
                                          <p class="ms-1 mb-1 fw-bold">Matthew Bailey</p>
                                          <small class="text-muted mb-0">162543</small>
                                        </div>
                                      </div>
                                      <div class="text-muted text-small">
                                        1h ago
                                      </div>
                                    </div>
                                    <div class="wrapper d-flex align-items-center justify-content-between pt-2">
                                      <div class="d-flex">
                                        <img class="img-sm rounded-10" src="/dashboard/template/images/faces/face5.jpg" alt="profile">
                                        <div class="wrapper ms-3">
                                          <p class="ms-1 mb-1 fw-bold">Rafell John</p>
                                          <small class="text-muted mb-0">Alaska, USA</small>
                                        </div>
                                      </div>
                                      <div class="text-muted text-small">
                                        1h ago
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
