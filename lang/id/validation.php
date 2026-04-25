<?php

return [
    'required' => ':attribute wajib diisi!',
    'required_with' => ':attribute wajib diisi jika :values diisi.',
    'same' => ':attribute dan :other harus sama.',
    'current_password' => ':attribute tidak sesuai!',
    'min' => [
        'array' => ':attribute minimal harus memiliki :min item.',
        'file' => ':attribute minimal harus :min kilobyte.',
        'numeric' => ':attribute minimal harus :min.',
        'string' => ':attribute minimal :min karakter!',
    ],
    'max' => [
        'array' => ':attribute tidak boleh lebih dari :max gambar!',
        'file' => ':attribute tidak boleh lebih dari :max kilobyte.',
        'numeric' => ':attribute tidak boleh lebih dari :max.',
        'string' => ':attribute maksimal :max karakter!',
    ],
    'attributes' => [
        'department_id' => 'Departemen',
        'category_id' => 'Kategori',
        'user_name' => 'Nama Alumni Magang',
        'school' => 'Sekolah/Universitas',
        'join_date' => 'Tanggal Bergabung',
        'end_date' => 'Tanggal Akhir',
        'department_code' => 'Kode Departemen',
        'department_name' => 'Nama Departemen',
        'category_type' => 'Tipe Kategori',
        'category_name' => 'Nama Kategori',
        'suggestion_title' => 'Judul',
        'suggestion_description' => 'Deskripsi',
        'current_password' => 'Password Saat Ini',
        'new_password' => 'Password Baru',
        'new_password_confirmation' => 'Konfirmasi Password Baru',
        'project_images' => 'Gambar Proyek',
    ],
];
