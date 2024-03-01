<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
    <h1>Dashboard</h1>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">

                <div class="col-xl-3">
                    <div class="card level_user_card">
                        <div class="body_card">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person-fill-check"></i>
                                </div>
                                <div class="ps-3 pt-2 pb-2">
                                    <h5 class="judul_card">Level User</h5>
                                    <span class="text-danger small fw-bold">HOD</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card pekerjaan_card">
                        <div class="body_card">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-briefcase-fill"></i>
                                </div>
                                <div class="ps-3 pt-2 pb-2">
                                    <h5 class="judul_card">Total Pekerjaan</h5>
                                    <span class="text-danger small fw-bold">25</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card target_tahun_card">
                        <div class="body_card">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-bullseye"></i>
                                </div>
                                <div class="ps-3">
                                    <h5 class="judul_card">Target poin bulan ini</h5>
                                    <span class="text-danger small fw-bold">600</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card task_selesai_card">
                        <div class="body_card">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-clipboard-check-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h5 class="judul_card">Task Selesai Bulan Ini</h5>
                                    <span class="text-danger small fw-bold">26</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="body_card">
                    <div class="row">
                        <div class="col-2 ms-5">
                            <a href="/pekerjaan/add_pekerjaan" class="btn btn-primary"><i class="bi bi-journal-plus"></i> Pekerjaan Baru</a>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-success"><i class="bi bi-database-add"></i> Import Pekerjaan</button>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-info"><i class="bi bi-question-diamond"></i> Detail Pekerjaan</button>
                        </div>
                        <div class="col-2 me-5">
                            <button type="button" class="btn btn-warning"><i class=" bi bi-download"></i> Download Pekerjaan</button>
                        </div>
                        <div class="col-2 ms-5">
                            <select name="" id="">
                                <option value="opsi1">100</option>
                                <option value="opsi2">500</option>
                                <option value="opsi3">1000</option>
                                <option value="opsi3">Semua</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>