<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PrintLCKB</title>

    <style>
        .titlelaporan {
            font-size: x-large;
            font-weight: bold;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        td {
            padding-left: 5px !important;
        }


        .ttdfooter {
            text-align: center;
            border: none !important;
        }

        .ttdfooter>tr>td {
            text-align: center;
            border: none !important;
        }

        .ttdfooter tr td {
            text-align: center;
            border: none !important;
        }
    </style>
</head>

<body>
    <div style="text-align: center; margin-bottom: 0; padding-bottom:0;">
        <img width="70" src="images/logo_kemenag.png" style="text-align: center; margin-bottom: 0; padding-bottom:0;" />
    </div>

    <p style="align:center; text-align:center; margin-bottom: 0; padding-bottom:0;">
        <span class="titlelaporan"> LAPORAN CAPAIAN KINERJA BULANAN</span> <br>
        <span style="font-weight: bold">KEMENTERIAN AGAMA REPUBLIK INDONESIA</span> <br>
        <span>Bulan: {{ $month }} | Tahun : {{ $year }}</span> <br>
        <span>&nbsp;</span>
    </p>


    <table style="width:100%; font-size:11pt;">
        <tr>
            <td width="15%">NAMA / NIP</td>
            <td>&nbsp;:&nbsp;</td>
            <td>
                <p style="margin-left: 20px; padding-left:20px;">{{ $user->name }} </p>
            </td>
            <td width="30%" rowspan="4"></td>
        </tr>
        <tr>
            <td>JABATAN</td>
            <td>&nbsp;:&nbsp;</td>
            <td> <span style="border-spacing: 0 50px;">{{ $user->jabatan }} </span></td>
        </tr>
        <tr>
            <td>SATUAN KERJA</td>
            <td>&nbsp;:&nbsp;</td>

            <td> <span style="border-spacing: 0 50px;">{{ $user->org_name }} </span></td>
        </tr>

    </table>

    <span>&nbsp;</span>

    <table style="width:100%; font-size:11pt; text-align:center">
        <thead>

            <tr style="background-color:rgb(165, 162, 162)">
                <th rowspan="2">NO</th>
                <th rowspan="2">PEKERJAAN / URAIAN TUGAS</th>
                <th colspan="2">HASIL</th>
                <th rowspan="2">BUKTI DOKUMEN</th>
            </tr>
            <tr style="background-color:rgb(165, 162, 162)">
                <th>VOL</th>
                <th>UNIT</th>
            </tr>
            <tr style="background-color:rgb(165, 162, 162)">
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
            </tr>

        </thead>

        <tbody style="font-weight:normal !important;">

            @foreach ($works as $key => $work)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td style="text-align: left; align:left;">
                        <span style="font-weight: bolder">{{ $work->work_name }}</span> <br>
                        <span style="font-size: small">{{ $work->work_detail }}</span>
                    </td>
                    <td>{{ $work->volume }}</td>
                    <td style="text-align: left;">{{ $work->unit }}</td>
                    <td>{{ $work->evidence }}</td>

                </tr>
            @endforeach

        </tbody>

    </table>

    <span>&nbsp;</span>

    <table class="ttdfooter" style="width:100%">
        <tr>
            <td width="29%">Diperika oleh</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Pembuat Laporan</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><span style="font-weight: bold"><u>{{ $user->nama_pemeriksa }}</u></span><br>
                NIP.{{ $user->nip_pemeriksa }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td width="29%"><span style="font-weight: bold"><u>{{ $user->name }}</u></span><br>
                NIP.{{ $user->username }}
            </td>
        </tr>

    </table>

</body>

</html>
