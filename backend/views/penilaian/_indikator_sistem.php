<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'tahun',
        'sasaran',
        'target',

        'sub_bobot',

        [
            'label' => 'KINERJA',
            'format' => 'raw',
            'value' => function ($data) use ($t) {
                if ($t == 1) {
                    return '<input type="text" data-sasaran="' . $data->id_smk_aspek_rencana . '">';
                }
                if ($t == 2) {
                    $capaian = (new \yii\db\Query())
                        ->select('predikat')
                        ->from('smk_aspek_rentang_nilai')
                        ->column();
                    
                    $capaianOptions = array_combine($capaian, $capaian);
                    $capaianOptions = ['' => '--Pilih Penilaian--'] + $capaianOptions;

                    return Html::dropDownList(
                        'role', // nama atribut
                        null, // nilai yang dipilih (null jika belum ada yang dipilih)
                        $capaianOptions,
                        [
                            'class' => 'form-control',
                            'id' => 'role',
                            'data-id' => $data->id_smk_aspek_rencana,
                            'onchange' => 'getData(this)', // memanggil fungsi getData saat nilai berubah
                        ]
                    );
                }
            },

        ],


    ],
]);
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('input[data-sasaran]').on('change', function() {
            var sasaran = $(this).data('sasaran');
            var value = $(this).val();

            // Kirim data melalui Ajax
            $.ajax({
                url: "<?php echo Yii::$app->urlManager->createUrl('/penilaian/save-data') ?>",
                method: 'POST',
                data: {
                    sasaran: sasaran,
                    value: value
                },
                success: function(response) {
                    console.log(response); // Tampilkan respons di console
                    // Lakukan sesuatu setelah data berhasil dikirim
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText); // Tampilkan pesan kesalahan di console
                    // Tangani kesalahan jika terjadi
                }
            });
        });
    });

    function getData(selectElement) {
    var selectedValue = selectElement.value; // Mendapatkan nilai yang dipilih dari dropdown
    var selectedId = selectElement.getAttribute('data-id'); // Mendapatkan data-id dari dropdown

    // Kirim permintaan AJAX ke server
    $.ajax({
        url: "<?php echo Yii::$app->urlManager->createUrl('/penilaian/ajax-action') ?>",
        type: 'POST', // Ganti dengan metode HTTP yang sesuai (GET/POST)
        data: {
            value: selectedValue,
            id: selectedId
        },
        success: function(response) {
            // Tangani respons dari server di sini
            console.log(response); // Contoh: mencetak respons ke konsol
        },
        error: function(xhr, status, error) {
            // Tangani kesalahan jika ada
            console.log(error); // Contoh: mencetak pesan kesalahan ke konsol
        }
    });
}

</script>