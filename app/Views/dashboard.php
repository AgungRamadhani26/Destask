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
                <div class="body_card mb-2 mt-2 ms-2 me-2">
                    <div class="align-items-center">
                        <div class="btn-group" role="group">
                            <a href="/pekerjaan/add_pekerjaan" class="btn btn-primary"><i class="bi bi-journal-plus"></i> Pekerjaan Baru</a>
                            <button type="button" class="btn btn-success"><i class="bi bi-database-add"></i> Import Pekerjaan</button>
                            <a href="/pekerjaan/daftar_pekerjaan" class="btn btn-info"><i class="bi bi-question-diamond"></i> Detail Pekerjaan</a>
                            <button type="button" class="btn btn-warning"><i class="bi bi-download"></i> Download Pekerjaan</button>
                        </div>
                        <div class="row mt-2">
                            <div class="col-3">
                                <select class="form-select" aria-label="Default select example">
                                    <option value="">10</option>
                                    <option value="">25</option>
                                    <option value="">50</option>
                                    <option value="">Semua</option>
                                </select>
                            </div>
                            <div class="col-9">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="search-addon">
                                            <i class="bi bi-search"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="searchInput" placeholder="Search...">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mb-5 ms-1">
        <div class="col-12">
            <div class="row mb-3">
                <div class="col-4 kanban-column">
                    <div class="kanban-column-header">
                        <h5 style="font-weight: bold;">Pending</h5>
                    </div>
                    <div class="kanban-droppable" id="todo">
                        <?php foreach ($pekerjaan_pending as $pp) : ?>
                            <div class="kanban-card">
                                <a href="" class="badge bg-success" title="Tambah task"><i class="bi bi-file-earmark-plus"></i></a>
                                <a href="" class="badge bg-primary" title="Lihat daftar task dan verifikasi task"><i class="bi bi-clipboard-data"></i></a>
                                <a href="" class="badge bg-warning" title="Klik untuk mengedit"><i class="bi bi-pencil"></i></a>
                                <a href="" class="badge bg-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data pekerjaan ?');"><i class="ri-delete-bin-5-line"></i></a>
                                <br>
                                <br>
                                <?= $pp['nama_pekerjaan'] ?>
                                <br>
                                <span class="badge bg-success"><?= $pp['jenis_layanan'] ?></span>
                                <br>
                                <br>
                                <i class="bi bi-person-fill">
                                    <?php
                                    foreach ($personil as $per) {
                                        if ($pp['id_pekerjaan'] == $per['id_pekerjaan'] && $per['role_personil'] == 'project_manager') {
                                            foreach ($user as $usr) {
                                                if ($per['id_user'] == $usr['id_user']) {
                                                    echo $usr['nama'];
                                                    break; // Keluar dari loop setelah menemukan nilai yang cocok
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </i>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-4 kanban-column">
                    <div class="kanban-column-header">
                        <h5 style="font-weight: bold;">Cancle</h5>
                    </div>
                    <div class="kanban-droppable" id="todo">
                        <?php foreach ($pekerjaan_cancle as $pc) : ?>
                            <div class="kanban-card">
                                <a href="" class="badge bg-success" title="Tambah task"><i class="bi bi-file-earmark-plus"></i></a>
                                <a href="" class="badge bg-primary" title="Lihat daftar task dan verifikasi task"><i class="bi bi-clipboard-data"></i></a>
                                <a href="" class="badge bg-warning" title="Klik untuk mengedit"><i class="bi bi-pencil"></i></a>
                                <a href="" class="badge bg-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data pekerjaan ?');"><i class="ri-delete-bin-5-line"></i></a>
                                <br>
                                <br>
                                <?= $pc['nama_pekerjaan'] ?>
                                <br>
                                <span class="badge bg-success"><?= $pc['jenis_layanan'] ?></span>
                                <br>
                                <br>
                                <i class="bi bi-person-fill">
                                    <?php
                                    foreach ($personil as $per) {
                                        if ($pc['id_pekerjaan'] == $per['id_pekerjaan'] && $per['role_personil'] == 'project_manager') {
                                            foreach ($user as $usr) {
                                                if ($per['id_user'] == $usr['id_user']) {
                                                    echo $usr['nama'];
                                                    break; // Keluar dari loop setelah menemukan nilai yang cocok
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </i>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-4 kanban-column">
                    <div class="kanban-column-header">
                        <h5 style="font-weight: bold;">Bast</h5>
                    </div>
                    <div class="kanban-droppable" id="todo">
                        <?php foreach ($pekerjaan_bast as $pb) : ?>
                            <div class="kanban-card">
                                <a href="" class="badge bg-success" title="Tambah task"><i class="bi bi-file-earmark-plus"></i></a>
                                <a href="" class="badge bg-primary" title="Lihat daftar task dan verifikasi task"><i class="bi bi-clipboard-data"></i></a>
                                <a href="" class="badge bg-warning" title="Klik untuk mengedit"><i class="bi bi-pencil"></i></a>
                                <a href="" class="badge bg-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data pekerjaan ?');"><i class="ri-delete-bin-5-line"></i></a>
                                <br>
                                <br>
                                <?= $pb['nama_pekerjaan'] ?>
                                <br>
                                <span class="badge bg-success"><?= $pb['jenis_layanan'] ?></span>
                                <br>
                                <br>
                                <i class="bi bi-person-fill">
                                    <?php
                                    foreach ($personil as $per) {
                                        if ($pb['id_pekerjaan'] == $per['id_pekerjaan'] && $per['role_personil'] == 'project_manager') {
                                            foreach ($user as $usr) {
                                                if ($per['id_user'] == $usr['id_user']) {
                                                    echo $usr['nama'];
                                                    break; // Keluar dari loop setelah menemukan nilai yang cocok
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </i>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- Penambahan baris baru -->
            <div class="row">
                <div class="col-4 kanban-column">
                    <div class="kanban-column-header">
                        <h5 style="font-weight: bold;">Support</h5>
                    </div>
                    <div class="kanban-droppable" id="todo">
                        <?php foreach ($pekerjaan_support as $psp) : ?>
                            <div class="kanban-card">
                                <a href="" class="badge bg-success" title="Tambah task"><i class="bi bi-file-earmark-plus"></i></a>
                                <a href="" class="badge bg-primary" title="Lihat daftar task dan verifikasi task"><i class="bi bi-clipboard-data"></i></a>
                                <a href="" class="badge bg-warning" title="Klik untuk mengedit"><i class="bi bi-pencil"></i></a>
                                <a href="" class="badge bg-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data pekerjaan ?');"><i class="ri-delete-bin-5-line"></i></a>
                                <br>
                                <br>
                                <?= $psp['nama_pekerjaan'] ?>
                                <br>
                                <span class="badge bg-success"><?= $psp['jenis_layanan'] ?></span>
                                <br>
                                <br>
                                <i class="bi bi-person-fill">
                                    <?php
                                    foreach ($personil as $per) {
                                        if ($psp['id_pekerjaan'] == $per['id_pekerjaan'] && $per['role_personil'] == 'project_manager') {
                                            foreach ($user as $usr) {
                                                if ($per['id_user'] == $usr['id_user']) {
                                                    echo $usr['nama'];
                                                    break; // Keluar dari loop setelah menemukan nilai yang cocok
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </i>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-4 kanban-column">
                    <div class="kanban-column-header">
                        <h5 style="font-weight: bold;">On Progres</h5>
                    </div>
                    <div class="kanban-droppable" id="todo">
                        <?php foreach ($pekerjaan_onprogres as $po) : ?>
                            <div class="kanban-card">
                                <a href="" class="badge bg-success" title="Tambah task"><i class="bi bi-file-earmark-plus"></i></a>
                                <a href="" class="badge bg-primary" title="Lihat daftar task dan verifikasi task"><i class="bi bi-clipboard-data"></i></a>
                                <a href="" class="badge bg-warning" title="Klik untuk mengedit"><i class="bi bi-pencil"></i></a>
                                <a href="" class="badge bg-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data pekerjaan ?');"><i class="ri-delete-bin-5-line"></i></a>
                                <br>
                                <br>
                                <?= $po['nama_pekerjaan'] ?>
                                <br>
                                <span class="badge bg-success"><?= $po['jenis_layanan'] ?></span>
                                <br>
                                <br>
                                <i class="bi bi-person-fill">
                                    <?php
                                    foreach ($personil as $per) {
                                        if ($po['id_pekerjaan'] == $per['id_pekerjaan'] && $per['role_personil'] == 'project_manager') {
                                            foreach ($user as $usr) {
                                                if ($per['id_user'] == $usr['id_user']) {
                                                    echo $usr['nama'];
                                                    break; // Keluar dari loop setelah menemukan nilai yang cocok
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </i>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-4 kanban-column">
                    <div class="kanban-column-header">
                        <h5 style="font-weight: bold;">Selesai</h5>
                    </div>
                    <div class="kanban-droppable" id="todo">
                        <?php foreach ($pekerjaan_selesai as $ps) : ?>
                            <div class="kanban-card">
                                <a href="" class="badge bg-success" title="Tambah task"><i class="bi bi-file-earmark-plus"></i></a>
                                <a href="" class="badge bg-primary" title="Lihat daftar task dan verifikasi task"><i class="bi bi-clipboard-data"></i></a>
                                <a href="" class="badge bg-warning" title="Klik untuk mengedit"><i class="bi bi-pencil"></i></a>
                                <a href="" class="badge bg-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data pekerjaan ?');"><i class="ri-delete-bin-5-line"></i></a>
                                <br>
                                <br>
                                <?= $ps['nama_pekerjaan'] ?>
                                <br>
                                <span class="badge bg-success"><?= $ps['jenis_layanan'] ?></span>
                                <br>
                                <br>
                                <i class="bi bi-person-fill">
                                    <?php
                                    foreach ($personil as $per) {
                                        if ($ps['id_pekerjaan'] == $per['id_pekerjaan'] && $per['role_personil'] == 'project_manager') {
                                            foreach ($user as $usr) {
                                                if ($per['id_user'] == $usr['id_user']) {
                                                    echo $usr['nama'];
                                                    break; // Keluar dari loop setelah menemukan nilai yang cocok
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </i>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Js untuk cari masing masing pekerjaan -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil input pencarian
        var searchInput = document.getElementById('searchInput');

        // Tambahkan event listener untuk input pencarian
        searchInput.addEventListener('input', function() {
            var searchTerm = searchInput.value.toLowerCase();
            var kanbanCards = document.querySelectorAll('.kanban-card');

            // Iterasi melalui setiap kanban card
            kanbanCards.forEach(function(card) {
                var cardText = card.textContent.toLowerCase();

                // Jika teks pada kartu cocok dengan pencarian, tampilkan
                if (cardText.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    // Jika tidak cocok, sembunyikan
                    card.style.display = 'none';
                }
            });
        });
    });
</script>

<?= $this->endSection(); ?>