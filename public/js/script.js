$(document).ready(function () {


    //fungsi konfirmasi hapus 
    $('.tombol-hapus').on('click', function (e) {

        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Data yang Anda hapus tidak dapat di Recovery !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Saya yakin !'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })

    });


    //fungsi konfirmasi Logout 
    $('.tombol-logout').on('click', function (e) {

        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Anda Yakin ingin logout ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Saya yakin !'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })

    });



    //fungsi untuk modal edit Dokter
    $('.modalEditDokter').on('click', function () {


        $('.tombolTambahDokter').on('click', function () {


            $('#judulModal').html('Tambah Data Dokter');
            $('.modal-footer button[type=submit]').html('Tambah Data');
            var id_var = document.getElementById("id_dummy").value;
            //baris ini berfungsi untuk menghilangkan data yang ada di modal karena fungsi ajax getUbah masih tersimpan
            console.log(id_var);
            $('#id_dokter').val(id_var);
            $('#nama').val('');
            $('#spesialis').val('');
            $('#alamat').val('');
            $('#notelp').val('');

        });

        // console.log('Edit');
        $('#judulModal').html('Update Data Dokter');
        $('.modal-footer button[type=submit]').html('Update Data');
        $('.modal-body form').attr('action', 'http://localhost/myapps/mvc-rumahsakit/public/dokter/update');

        const id_dokter = $(this).data('id_dokter');
        // console.log(nim);

        $.ajax({

            url: 'http://localhost/myapps/mvc-rumahsakit/public/dokter/getEdit',
            data: {
                id_dokter: id_dokter
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                // console.log('data');

                //berfungsi untuk menampilkan data json ke dalam modal tampil ubah
                $('#id_dokter').val(data.id_dokter);
                $('#nama').val(data.nama_dokter);
                $('#spesialis').val(data.spesialis);
                $('#notelp').val(data.no_telp);
                $('#alamat').val(data.alamat);

            }

        });

    });

    //fungsi modal edit obat
    $('.modalEditObat').on('click', function () {


        $('.tombolTambahObat').on('click', function () {


            $('#judulModal').html('Tambah Data Obat');
            $('.modal-footer button[type=submit]').html('Tambah Data');
            var id_var = document.getElementById("id_dummy").value;
            //baris ini berfungsi untuk menghilangkan data yang ada di modal karena fungsi ajax getUbah masih tersimpan
            console.log(id_var);
            $('#id_obat').val(id_var);
            $('#nama_obat').val('');
            $('#ket_obat').val('');
            $('#stok').val('');
            $('#unit').val('');

        });

        // console.log('Edit');
        $('#judulModal').html('Update Data Obat');
        $('.modal-footer button[type=submit]').html('Update Data');
        $('.modal-body form').attr('action', 'http://localhost/myapps/mvc-rumahsakit/public/obat/update');

        const id_obat = $(this).data('id_obat');
        // console.log(nim);

        $.ajax({

            url: 'http://localhost/myapps/mvc-rumahsakit/public/obat/getEdit',
            data: {
                id_obat: id_obat
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                // console.log('data');

                //berfungsi untuk menampilkan data json ke dalam modal tampil ubah
                $('#id_obat').val(data.id_obat);
                $('#nama_obat').val(data.nama_obat);
                $('#ket_obat').val(data.ket_obat);
                $('#stok').val(data.stok);
                $('#unit').val(data.unit);
            }

        });

    });

    //fungsi modal edit role access
    $('.modalEditRole').on('click', function () {


        $('.tombolTambahRole').on('click', function () {


            $('#judulModal').html('Tambah Role');
            $('.modal-footer button[type=submit]').html('Tambah Data');
            //baris ini berfungsi untuk menghilangkan data yang ada di modal karena fungsi ajax getUbah masih tersimpan
            $('#role').val('');

        });

        // console.log('Edit');
        $('#judulModal').html('Update Role');
        $('.modal-footer button[type=submit]').html('Update Data');
        $('.modal-body form').attr('action', 'http://localhost/myapps/mvc-rumahsakit/public/role/update');

        const id_role = $(this).data('id_role');
        // console.log(nim);

        $.ajax({

            url: 'http://localhost/myapps/mvc-rumahsakit/public/role/getEdit',
            data: {
                id_role: id_role
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                // console.log('data');

                //berfungsi untuk menampilkan data json ke dalam modal tampil ubah
                $('#id_role').val(data.id_role);
                $('#role').val(data.role);
            }

        });

    });

    //fungsi untuk checkbox pada table
    $('#masterCheck').on('click', function () {
        if (this.checked) {
            $('.check').each(function () {
                this.checked = true;
            })
        } else {
            $('.check').each(function () {
                this.checked = false;
            })
        }
    })

    $('.check').on('click', function () {
        if ($('.check:checked').length == $('.check').length) {
            $('#masterCheck').prop('checked', true)
        } else {
            $('#masterCheck').prop('checked', false)
        }
    })

    //fungsi untuk memanggil datatable Library dengan metode Client Side PRocessing
    $('#tblpasien').DataTable({


        columnDefs: [{
            "searchable": false,
            "orderable": false,
            "targets": [6]
        }],
        "order": [0, "asc"],

        "lengthMenu": [10, 25, 50, 75, 100],

        dom: 'Bfrtip',
        buttons: [{
                extend: 'pdf',
                orientation: 'potrait',
                pageSize: 'A4',
                title: 'Data Pasien',
                download: 'open'
            },
            'csv', 'excel', 'print', 'copy'
        ]

    });


    $('#tblmedis').DataTable({


        columnDefs: [{
            "searchable": false,
            "orderable": false,
            "targets": [0, 9]
        }],

        "lengthMenu": [25, 50, 75, 100],

        dom: 'Brftip',
        buttons: [{
                extend: 'pdf',
                orientation: 'potrait',
                pageSize: 'A4',
                title: 'Data Pasien',
                download: 'open'
            },
            'csv', 'excel', 'print', 'copy'
        ]

    });




});