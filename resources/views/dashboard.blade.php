<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bold text-dark">Dashboard Admin</h2>
            </div>
        </div>
    </x-slot>

    <div class="container py-4">
        <div class="row mb-4">
            <div class="col-12">
                <h3>Hi, {{ Auth::user()->name }}</h3>
                <p class="text-muted">
                    Anda dapat memantau aktivitas website SD Peraduan Waras di
                    sini.
                </p>
            </div>
        </div>

        <!-- Row with 5 columns (1 row) -->
        <div class="row g-4 justify-content-between">
            <!-- Total Admin -->
            <div class="col-lg-2 col-md-4">
                <div
                    class="card shadow-lg border border-dark text-black bg-gradient-primary"
                    style="border-radius: 12px"
                >
                    <div class="card-body text-center">
                        <i class="bi bi-person-badge display-3 mb-3"></i>
                        <h5 class="card-title">Total Admin</h5>
                        <p class="fs-1 fw-bold">10</p>
                    </div>
                </div>
            </div>

            <!-- Total Guru -->
            <div class="col-lg-2 col-md-4">
                <div
                    class="card shadow-lg border border-dark text-black bg-gradient-success"
                    style="border-radius: 12px"
                >
                    <div class="card-body text-center">
                        <i class="bi bi-person-workspace display-3 mb-3"></i>
                        <h5 class="card-title">Total Guru</h5>
                        <p class="fs-1 fw-bold">25</p>
                    </div>
                </div>
            </div>

            <!-- Total Siswa -->
            <div class="col-lg-2 col-md-4">
                <div
                    class="card shadow-lg border border-dark text-black bg-gradient-info"
                    style="border-radius: 12px"
                >
                    <div class="card-body text-center">
                        <i class="bi bi-people display-3 mb-3"></i>
                        <h5 class="card-title">Total Siswa</h5>
                        <p class="fs-1 fw-bold">200</p>
                    </div>
                </div>
            </div>

            <!-- Total Kelas -->
            <div class="col-lg-2 col-md-4">
                <div
                    class="card shadow-lg border border-dark text-black bg-gradient-warning"
                    style="border-radius: 12px"
                >
                    <div class="card-body text-center">
                        <i class="bi bi-easel display-3 mb-3"></i>
                        <h5 class="card-title">Total Kelas</h5>
                        <p class="fs-1 fw-bold">15</p>
                    </div>
                </div>
            </div>

            <!-- Total Alumni -->
            <div class="col-lg-2 col-md-4">
                <div
                    class="card shadow-lg border border-dark text-black bg-gradient-danger"
                    style="border-radius: 12px"
                >
                    <div class="card-body text-center">
                        <i class="bi bi-mortarboard display-3 mb-3"></i>
                        <h5 class="card-title">Total Alumni</h5>
                        <p class="fs-1 fw-bold">300</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
