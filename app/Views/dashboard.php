<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
    <h1>Dashboard</h1>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <?php if ($target_poin_harian_tahun_bulan_ini_lengkap == false) : ?>
                <?php if ((session()->get('user_level') == 'supervisi') || (session()->get('user_level') == 'staff')) : ?>
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <div>
                            <i class="bi bi-exclamation-triangle-fill"> <b>Perhatian : </b></i> <b>Direksi</b> ataupun <b>Head of Department (HOD)</b> belum menambahkan target poin harian untuk usergroup
                            <?php foreach ($usergroup_yang_tidak_ada_ditarget_poin_harian as $ugt) : ?>
                                <b><?= $ugt['nama_usergroup'] ?></b>,
                            <?php endforeach; ?>
                            di tahun <b><?= date("Y") ?></b> bulan <b>
                                <?php if (date("n") == 1) : ?>
                                    Januari
                                <?php elseif (date("n") == 2) : ?>
                                    Februari
                                <?php elseif (date("n") == 3) : ?>
                                    Maret
                                <?php elseif (date("n") == 4) : ?>
                                    April
                                <?php elseif (date("n") == 5) : ?>
                                    Mei
                                <?php elseif (date("n") == 6) : ?>
                                    Juni
                                <?php elseif (date("n") == 7) : ?>
                                    Juli
                                <?php elseif (date("n") == 8) : ?>
                                    Agustus
                                <?php elseif (date("n") == 9) : ?>
                                    September
                                <?php elseif (date("n") == 10) : ?>
                                    Oktober
                                <?php elseif (date("n") == 11) : ?>
                                    November
                                <?php elseif (date("n") == 12) : ?>
                                    Desember
                                <?php else : ?>
                                    Bulan tidak valid
                                <?php endif ?></b>
                            . Sehingga anda tidak dapat membuka form tambah task baru ditahun dan bulan ini,
                            Segera hubungi mereka !!!.
                        </div>
                    </div>
                <?php elseif ((session()->get('user_level') == 'hod') || (session()->get('user_level') == 'direksi')) : ?>
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <div>
                            <i class="bi bi-exclamation-triangle-fill"> <b>Perhatian : </b></i> Anda masih belum menambahkan target poin harian untuk usergroup
                            <?php foreach ($usergroup_yang_tidak_ada_ditarget_poin_harian as $ugt) : ?>
                                <b><?= $ugt['nama_usergroup'] ?></b>,
                            <?php endforeach; ?>
                            di tahun <b><?= date("Y") ?></b> bulan <b>
                                <?php if (date("n") == 1) : ?>
                                    Januari
                                <?php elseif (date("n") == 2) : ?>
                                    Februari
                                <?php elseif (date("n") == 3) : ?>
                                    Maret
                                <?php elseif (date("n") == 4) : ?>
                                    April
                                <?php elseif (date("n") == 5) : ?>
                                    Mei
                                <?php elseif (date("n") == 6) : ?>
                                    Juni
                                <?php elseif (date("n") == 7) : ?>
                                    Juli
                                <?php elseif (date("n") == 8) : ?>
                                    Agustus
                                <?php elseif (date("n") == 9) : ?>
                                    September
                                <?php elseif (date("n") == 10) : ?>
                                    Oktober
                                <?php elseif (date("n") == 11) : ?>
                                    November
                                <?php elseif (date("n") == 12) : ?>
                                    Desember
                                <?php else : ?>
                                    Bulan tidak valid
                                <?php endif ?></b>
                            . Sehingga <b>Supervisi</b> dan <b>Staff</b> tidak dapat membuka form tambah task baru ditahun dan bulan ini,
                            <a href="/target_poin_harian/daftar_target_poin_harian"><u>Segera tambahkan target poin harian tersebut secepatnya !!!.</u></a>
                        </div>
                    </div>
                <?php endif ?>
            <?php endif ?>
        </div>

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
                                    <span class="text-danger small fw-bold"><?= session()->get('user_level'); ?></span>
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
                                    <span class="text-danger small fw-bold"><?= $jumlah_pekerjaan ?> pekerjaan</span>
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
                                    <span class="text-danger small fw-bold"><?= $jumlah_task_selesai_bulan_ini ?> Task</span>
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
                                    <?php if (session()->get('user_level') == 'staff' || session()->get('user_level') == 'supervisi') : ?>
                                        <?php if (session()->get('id_usergroup') == 1) : ?>
                                            <span class="text-danger small fw-bold"><?= $target_poin_harian_design ?> poin</span>
                                        <?php elseif (session()->get('id_usergroup') == 2) : ?>
                                            <span class="text-danger small fw-bold"><?= $target_poin_harian_web ?> poin</span>
                                        <?php elseif (session()->get('id_usergroup') == 3) : ?>
                                            <span class="text-danger small fw-bold"><?= $target_poin_harian_mobile ?> poin</span>
                                        <?php elseif (session()->get('id_usergroup') == 4) : ?>
                                            <span class="text-danger small fw-bold"><?= $target_poin_harian_tester ?> poin</span>
                                        <?php elseif (session()->get('id_usergroup') == 5) : ?>
                                            <span class="text-danger small fw-bold"><?= $target_poin_harian_admin ?> poin</span>
                                        <?php elseif (session()->get('id_usergroup') == 6) : ?>
                                            <span class="text-danger small fw-bold"><?= $target_poin_harian_helpdesk ?> poin</span>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <div id="accordionExample_dash">
                                            <span class="text-danger small fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo_dash" aria-expanded="false" aria-controls="collapseTwo">
                                                Klik untuk melihat
                                            </span>
                                            <div id="collapseTwo_dash" class="accordion-collapse collapse" data-bs-parent="#accordionExample_dash">
                                                <div class="accordion-body">
                                                    <hr style="margin: 2px 0;">
                                                    <span class="small">Design : <?= $target_poin_harian_design ?> poin</span>
                                                    <hr style="margin: 2px 0;">
                                                    <span class="small">Web : <?= $target_poin_harian_web ?> poin</span>
                                                    <hr style="margin: 2px 0;">
                                                    <span class="small">Mobile : <?= $target_poin_harian_mobile ?> poin</span>
                                                    <hr style="margin: 2px 0;">
                                                    <span class="small">Tester : <?= $target_poin_harian_tester ?> poin</span>
                                                    <hr style="margin: 2px 0;">
                                                    <span class="small">Admin : <?= $target_poin_harian_admin ?> poin</span>
                                                    <hr style="margin: 2px 0;">
                                                    <span class="small">Helpdesk : <?= $target_poin_harian_helpdesk ?> poin</span>
                                                    <hr style="margin: 2px 0;">
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif ?>
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
                            <?php if (session()->get('user_level') == "hod" || session()->get('user_level') == "admin") : ?>
                                <a href="/pekerjaan/add_pekerjaan" class="btn btn-primary"><i class="bi bi-journal-plus"></i> Pekerjaan Baru</a>
                            <?php endif ?>
                            <a href="/pekerjaan/daftar_pekerjaan" class="btn btn-info"><i class="bi bi-question-diamond"></i> Detail Pekerjaan</a>
                            <a href="/pekerjaan/download_pekerjaan" class="btn btn-warning"><i class="bi bi-download"></i> Download Pekerjaan</a>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <div class="input-group">
                                    <?php if (session()->get('user_level') == "staff" || session()->get('user_level') == "supervisi") : ?>
                                        <button type="button" class="btn btn-primary me-2" style="border-radius: 5px; cursor:default; background-color: #007bff; border-color: #007bff;" onfocus="this.style.backgroundColor='#007bff'; this.style.borderColor='#007bff';">
                                            Poin anda bulan ini : <span class="badge text-bg-secondary"><?= $total_bobot_poin_bulan_ini ?></span>
                                        </button>
                                    <?php endif ?>
                                    <?php if (session()->get('user_level') == "supervisi") : ?>
                                        <a href="/task/daftar_verifikasi_task" class="btn me-2 btn-secondary" style="border-radius: 5px"><i class="bi bi-patch-check"></i> Verifikasi Task</a>
                                    <?php endif ?>
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

    <div class="row mb-5">
        <div class="col-12">
            <div class="row mb-4">
                <div class="col-4">
                    <div class="kanban-column-header" style="background-color: <?= $status_pekerjaan_presales['color'] ?>;">
                        <h5 style="font-weight: bold;">Presales <span class="badge bg-white text-primary"><?= $jumlah_pekerjaan_presales ?></span></h5>
                    </div>
                    <div class="kanban-column">
                        <div class="kanban-droppable" id="todo">
                            <?php foreach ($pekerjaan_presales as $pp) : ?>
                                <div class="kanban-card">
                                    <?php if (check_personil($pp['id_pekerjaan'], session()->get('id_user')) != null) : ?>
                                        <a href="<?= ($target_poin_harian_tahun_bulan_ini_lengkap == false) ? 'javascript:void(0)' : '/task/add_task/' . $pp['id_pekerjaan'] ?>" class="badge btn bg-success" title="Tambah task"><i class="bi bi-file-earmark-plus"></i></a>
                                    <?php endif ?>
                                    <a href="/task/daftar_task/<?= $pp['id_pekerjaan'] ?>" class="badge btn bg-primary" title="Lihat daftar task atau verifikasi task"><i class="bi bi-clipboard-data"></i></a>
                                    <?php if (session()->get('user_level') == "hod" || session()->get('user_level') == "admin") : ?>
                                        <a href="/pekerjaan/edit_pekerjaan/<?= $pp['id_pekerjaan'] ?>" class="badge btn bg-warning" title="Klik untuk mengedit data pekerjaan"><i class="bi bi-pencil"></i></a>
                                        <a href="/pekerjaan/edit_personil_pekerjaan/<?= $pp['id_pekerjaan'] ?>" class="badge btn bg-warning bg-opacity-75" title="Klik untuk mengedit data personil"><i class="bi bi-person-fill-gear"></i></a>
                                        <button type="button" class="badge btn bg-warning" title="Klik untuk mengubah status pekerjaan ini" data-bs-toggle="modal" data-bs-target="#modal_editpekerjaan_status_pekerjaan" onclick="editpekerjaan_status_pekerjaan(<?php echo $pp['id_pekerjaan'] ?>)"><i class="bi bi-pencil-square"></i></button>
                                    <?php endif ?>
                                    <br>
                                    <br>
                                    <?= $pp['nama_pekerjaan'] ?>
                                    <br>
                                    <span class="badge bg-primary"><?= $pp['jenis_layanan'] ?></span>
                                    <br>
                                    <br>
                                    <i class="bi bi-person-fill">
                                        <?php
                                        foreach ($personil as $per) {
                                            if ($pp['id_pekerjaan'] == $per['id_pekerjaan'] && $per['role_personil'] == 'project_manager') {
                                                foreach ($user as $usr) {
                                                    if ($per['id_user'] == $usr['id_user']) {
                                                        echo $usr['nama'] . ' (PM)';
                                                        break; // Keluar dari loop setelah menemukan nilai yang cocok
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </i>
                                    <br>
                                    <i class="bi bi-person-fill"> <?= $pp['nama_pic'] . ' (PIC)' ?></i>
                                    <?php
                                    $nomor_telepon1 = $pp['nowa_pic']; // nomor telepon dengan awalan 0
                                    if (substr($nomor_telepon1, 0, 1) == '0') {
                                        $nomor_telepon = '+62' . substr($nomor_telepon1, 1);
                                    }
                                    ?>
                                    <?php if (session()->get('user_level') == "hod" || session()->get('user_level') == "admin") : ?>
                                        <a href="https://wa.me/<?= $nomor_telepon ?>" target="_blank" class="badge btn bg-success" title="Hubungi PIC"><i class="bi bi-telephone"></i></a>
                                    <?php endif ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="kanban-column-header" style="background-color: <?= $status_pekerjaan_onprogres['color'] ?>;">
                        <h5 style="font-weight: bold;">On Progres <span class="badge bg-white text-primary"><?= $jumlah_pekerjaan_onprogres ?></span></h5>
                    </div>
                    <div class="kanban-column">
                        <div class="kanban-droppable" id="todo">
                            <?php foreach ($pekerjaan_onprogres as $po) : ?>
                                <div class="kanban-card">
                                    <?php if (check_personil($po['id_pekerjaan'], session()->get('id_user')) != null) : ?>
                                        <a href="<?= ($target_poin_harian_tahun_bulan_ini_lengkap == false) ? 'javascript:void(0)' : '/task/add_task/' . $po['id_pekerjaan'] ?>" class="badge btn bg-success" title="Tambah task"><i class="bi bi-file-earmark-plus"></i></a>
                                    <?php endif ?>
                                    <a href="/task/daftar_task/<?= $po['id_pekerjaan'] ?>" class="badge btn bg-primary" title="Lihat daftar task atau verifikasi task"><i class="bi bi-clipboard-data"></i></a>
                                    <?php if (session()->get('user_level') == "hod" || session()->get('user_level') == "admin") : ?>
                                        <a href="/pekerjaan/edit_pekerjaan/<?= $po['id_pekerjaan'] ?>" class="badge btn bg-warning" title="Klik untuk mengedit data pekerjaan"><i class="bi bi-pencil"></i></a>
                                        <a href="/pekerjaan/edit_personil_pekerjaan/<?= $po['id_pekerjaan'] ?>" class="badge btn bg-warning bg-opacity-75" title="Klik untuk mengedit data personil"><i class="bi bi-person-fill-gear"></i></a>
                                        <button type="button" class="badge btn bg-warning" title="Klik untuk mengubah status pekerjaan ini" data-bs-toggle="modal" data-bs-target="#modal_editpekerjaan_status_pekerjaan" onclick="editpekerjaan_status_pekerjaan(<?php echo $po['id_pekerjaan'] ?>)"><i class="bi bi-pencil-square"></i></button>
                                    <?php endif ?>
                                    <br>
                                    <br>
                                    <?= $po['nama_pekerjaan'] ?>
                                    <br>
                                    <span class="badge bg-primary"><?= $po['jenis_layanan'] ?></span>
                                    <br>
                                    <br>
                                    <i class="bi bi-person-fill">
                                        <?php
                                        foreach ($personil as $per) {
                                            if ($po['id_pekerjaan'] == $per['id_pekerjaan'] && $per['role_personil'] == 'project_manager') {
                                                foreach ($user as $usr) {
                                                    if ($per['id_user'] == $usr['id_user']) {
                                                        echo $usr['nama'] . ' (PM)';
                                                        break; // Keluar dari loop setelah menemukan nilai yang cocok
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </i>
                                    <br>
                                    <i class="bi bi-person-fill"> <?= $po['nama_pic'] . ' (PIC)' ?></i>
                                    <?php
                                    $nomor_telepon2 = $po['nowa_pic']; // nomor telepon dengan awalan 0
                                    if (substr($nomor_telepon2, 0, 1) == '0') {
                                        $nomor_teleponpo = '+62' . substr($nomor_telepon2, 1);
                                    }
                                    ?>
                                    <?php if (session()->get('user_level') == "hod" || session()->get('user_level') == "admin") : ?>
                                        <a href="https://wa.me/<?= $nomor_teleponpo ?>" target="_blank" class="badge btn bg-success" title="Hubungi PIC"><i class="bi bi-telephone"></i></a>
                                    <?php endif ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="kanban-column-header" style="background-color: <?= $status_pekerjaan_bast['color'] ?>;">
                        <h5 style="font-weight: bold;">Bast <span class="badge bg-white text-primary"><?= $jumlah_pekerjaan_bast ?></span></h5>
                    </div>
                    <div class="kanban-column">
                        <div class="kanban-droppable" id="todo">
                            <?php foreach ($pekerjaan_bast as $pb) : ?>
                                <div class="kanban-card">
                                    <a href="/task/daftar_task/<?= $pb['id_pekerjaan'] ?>" class="badge btn bg-primary" title="Lihat daftar task atau verifikasi task"><i class="bi bi-clipboard-data"></i></a>
                                    <?php if (session()->get('user_level') == "hod" || session()->get('user_level') == "admin") : ?>
                                        <button type="button" class="badge btn bg-warning" title="Klik untuk mengubah status pekerjaan ini" data-bs-toggle="modal" data-bs-target="#modal_editpekerjaan_status_pekerjaan" onclick="editpekerjaan_status_pekerjaan(<?php echo $pb['id_pekerjaan'] ?>)"><i class="bi bi-pencil-square"></i></button>
                                    <?php endif ?>
                                    <br>
                                    <br>
                                    <?= $pb['nama_pekerjaan'] ?>
                                    <br>
                                    <span class="badge bg-primary"><?= $pb['jenis_layanan'] ?></span>
                                    <br>
                                    <br>
                                    <i class="bi bi-person-fill">
                                        <?php
                                        foreach ($personil as $per) {
                                            if ($pb['id_pekerjaan'] == $per['id_pekerjaan'] && $per['role_personil'] == 'project_manager') {
                                                foreach ($user as $usr) {
                                                    if ($per['id_user'] == $usr['id_user']) {
                                                        echo $usr['nama'] . ' (PM)';
                                                        break; // Keluar dari loop setelah menemukan nilai yang cocok
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </i>
                                    <br>
                                    <i class="bi bi-person-fill"> <?= $pb['nama_pic'] . ' (PIC)' ?></i>
                                    <?php
                                    $nomor_telepon3 = $pb['nowa_pic']; // nomor telepon dengan awalan 0
                                    if (substr($nomor_telepon3, 0, 1) == '0') {
                                        $nomor_teleponpb = '+62' . substr($nomor_telepon3, 1);
                                    }
                                    ?>
                                    <?php if (session()->get('user_level') == "hod" || session()->get('user_level') == "admin") : ?>
                                        <a href="https://wa.me/<?= $nomor_teleponpb ?>" target="_blank" class="badge btn bg-success" title="Hubungi PIC"><i class="bi bi-telephone"></i></a>
                                    <?php endif ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Penambahan baris baru -->
            <div class="row">
                <div class="col-4">
                    <div class="kanban-column-header" style="background-color: <?= $status_pekerjaan_support['color'] ?>;">
                        <h5 style="font-weight: bold;">Support <span class="badge bg-white text-primary"><?= $jumlah_pekerjaan_support ?></span></h5>
                    </div>
                    <div class="kanban-column">
                        <div class="kanban-droppable" id="todo">
                            <?php foreach ($pekerjaan_support as $psp) : ?>
                                <div class="kanban-card">
                                    <?php if (check_personil($psp['id_pekerjaan'], session()->get('id_user')) != null) : ?>
                                        <a href="<?= ($target_poin_harian_tahun_bulan_ini_lengkap == false) ? 'javascript:void(0)' : '/task/add_task/' . $psp['id_pekerjaan'] ?>" class="badge btn bg-success" title="Tambah task"><i class="bi bi-file-earmark-plus"></i></a>
                                    <?php endif ?>
                                    <a href="/task/daftar_task/<?= $psp['id_pekerjaan'] ?>" class="badge btn bg-primary" title="Lihat daftar task atau verifikasi task"><i class="bi bi-clipboard-data"></i></a>
                                    <?php if (session()->get('user_level') == "hod" || session()->get('user_level') == "admin") : ?>
                                        <a href="/pekerjaan/edit_pekerjaan/<?= $psp['id_pekerjaan'] ?>" class="badge btn bg-warning" title="Klik untuk mengedit data pekerjaan"><i class="bi bi-pencil"></i></a>
                                        <a href="/pekerjaan/edit_personil_pekerjaan/<?= $psp['id_pekerjaan'] ?>" class="badge btn bg-warning bg-opacity-75" title="Klik untuk mengedit data personil"><i class="bi bi-person-fill-gear"></i></a>
                                        <button type="button" class="badge btn bg-warning" title="Klik untuk mengubah status pekerjaan ini" data-bs-toggle="modal" data-bs-target="#modal_editpekerjaan_status_pekerjaan" onclick="editpekerjaan_status_pekerjaan(<?php echo $psp['id_pekerjaan'] ?>)"><i class="bi bi-pencil-square"></i></button>
                                    <?php endif ?>
                                    <br>
                                    <br>
                                    <?= $psp['nama_pekerjaan'] ?>
                                    <br>
                                    <span class="badge bg-primary"><?= $psp['jenis_layanan'] ?></span>
                                    <br>
                                    <br>
                                    <i class="bi bi-person-fill">
                                        <?php
                                        foreach ($personil as $per) {
                                            if ($psp['id_pekerjaan'] == $per['id_pekerjaan'] && $per['role_personil'] == 'project_manager') {
                                                foreach ($user as $usr) {
                                                    if ($per['id_user'] == $usr['id_user']) {
                                                        echo $usr['nama'] . ' (PM)';
                                                        break; // Keluar dari loop setelah menemukan nilai yang cocok
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </i>
                                    <br>
                                    <i class="bi bi-person-fill"> <?= $psp['nama_pic'] . ' (PIC)' ?></i>
                                    <?php
                                    $nomor_telepon4 = $psp['nowa_pic']; // nomor telepon dengan awalan 0
                                    if (substr($nomor_telepon4, 0, 1) == '0') {
                                        $nomor_teleponpsp = '+62' . substr($nomor_telepon4, 1);
                                    }
                                    ?>
                                    <?php if (session()->get('user_level') == "hod" || session()->get('user_level') == "admin") : ?>
                                        <a href="https://wa.me/<?= $nomor_teleponpsp ?>" target="_blank" class="badge btn bg-success" title="Hubungi PIC"><i class="bi bi-telephone"></i></a>
                                    <?php endif ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="kanban-column-header" style="background-color: <?= $status_pekerjaan_cancle['color'] ?>;">
                        <h5 style="font-weight: bold;">Cancel <span class="badge bg-white text-primary"><?= $jumlah_pekerjaan_cancle ?></span></h5>
                    </div>
                    <div class="kanban-column">
                        <div class="kanban-droppable" id="todo">
                            <?php foreach ($pekerjaan_cancle as $pc) : ?>
                                <div class="kanban-card">
                                    <a href="/task/daftar_task/<?= $pc['id_pekerjaan'] ?>" class="badge btn bg-primary" title="Lihat daftar task atau verifikasi task"><i class="bi bi-clipboard-data"></i></a>
                                    <?php if (session()->get('user_level') == "hod" || session()->get('user_level') == "admin") : ?>
                                        <form action="/pekerjaan/delete_pekerjaan/<?= $pc['id_pekerjaan'] ?>" method="POST" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="badge btn bg-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data pekerjaan ?, jika iya maka data personil terkait pekerjaan juga akan terhapus.');"><i class="ri-delete-bin-5-line"></i></button>
                                        </form>
                                        <button type="button" class="badge btn bg-warning" title="Klik untuk mengubah status pekerjaan ini" data-bs-toggle="modal" data-bs-target="#modal_editpekerjaan_status_pekerjaan" onclick="editpekerjaan_status_pekerjaan(<?php echo $pc['id_pekerjaan'] ?>)"><i class="bi bi-pencil-square"></i></button>
                                    <?php endif ?>
                                    <br>
                                    <br>
                                    <?= $pc['nama_pekerjaan'] ?>
                                    <br>
                                    <span class="badge bg-primary"><?= $pc['jenis_layanan'] ?></span>
                                    <br>
                                    <br>
                                    <i class="bi bi-person-fill">
                                        <?php
                                        foreach ($personil as $per) {
                                            if ($pc['id_pekerjaan'] == $per['id_pekerjaan'] && $per['role_personil'] == 'project_manager') {
                                                foreach ($user as $usr) {
                                                    if ($per['id_user'] == $usr['id_user']) {
                                                        echo $usr['nama'] . ' (PM)';
                                                        break; // Keluar dari loop setelah menemukan nilai yang cocok
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </i>
                                    <br>
                                    <i class="bi bi-person-fill"> <?= $pc['nama_pic'] . ' (PIC)' ?></i>
                                    <?php
                                    $nomor_telepon5 = $pc['nowa_pic']; // nomor telepon dengan awalan 0
                                    if (substr($nomor_telepon5, 0, 1) == '0') {
                                        $nomor_teleponpc = '+62' . substr($nomor_telepon5, 1);
                                    }
                                    ?>
                                    <?php if (session()->get('user_level') == "hod" || session()->get('user_level') == "admin") : ?>
                                        <a href="https://wa.me/<?= $nomor_teleponpc ?>" target="_blank" class="badge btn bg-success" title="Hubungi PIC"><i class="bi bi-telephone"></i></a>
                                    <?php endif ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    </div>
</section>

<!--include Modal untuk mengedit data pekerjaan-->
<?= $this->include('/pekerjaan/modal_editpekerjaan_status_pekerjaan'); ?>

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