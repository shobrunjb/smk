  <?= \frontend\widgets\CustomFrontDetailView::widget([
            'model' => $model,
            'attributes' => [
                'full_name',
                'email',
            ],
        ]) ?>
