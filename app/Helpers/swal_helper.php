<?php
function Set_notifikasi_swal_berhasil($jenis, $icon, $title, $text)
{
   session()->setFlashdata('jenis_alert', $jenis);
   session()->setFlashdata('swal_icon', $icon);
   session()->setFlashdata('swal_title', $title);
   session()->setFlashdata('swal_text', $text);
}

function Set_notifikasi_swal_konfirmasi($jenis, $title, $text, $icon, $titleconfirm, $textconfirm, $iconconfirm)
{
   session()->setFlashdata('jenis_alert', $jenis);
   session()->setFlashdata('swal_icon', $icon);
   session()->setFlashdata('swal_title', $title);
   session()->setFlashdata('swal_text', $text);
   session()->setFlashdata('swal_icon_confirm', $iconconfirm);
   session()->setFlashdata('swal_title_confirm', $titleconfirm);
   session()->setFlashdata('swal_text_confirm', $textconfirm);
}
