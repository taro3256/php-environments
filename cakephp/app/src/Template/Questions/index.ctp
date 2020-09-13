<head>
    <!-- Bootstrap の CSS -->
    <?= $this->Html->css('bootstrap.min.css') ?>
    <!-- jQuery -->
    <?= $this->Html->script('jquery-3.3.1.min.js') ?>
    <!-- Bootstrap の JS -->
    <?= $this->Html->script('bootstrap.min.js') ?>
</head>

<body>
    <h2 class="mb-3"><i class="fas fa-list"></i>質問一覧</h2>

    <? if ($questions->isEmpty()): ?>
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title text-center">表示できる質問がありません。</h5>
            </div>
        </div>
    <? else: ?>
        <p><?= $this->Paginator->counter(['format' => '全{{pages}}ページ中{{page}}ページ目を表示しています']) ?></p>
        <? foreach ($questions as $question): ?>
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-user-circle"></i> <?= 'たろう' // TODO:ユーザー管理機能実装時に修正?>
                    </h5>
                    <p class="card-text"><?= nl2br(h($question->body)) ?></p>
                    <p class="card-subtitle mb-2 textmuted">
                        <small><?= h($question->created) ?></small>
                    </p>
                    <?= $this->Html->link('詳細へ', ['action' => 'view', $question->id], ['class' => 'card-link']) ?>
                    <?= $this->Form->postLink('削除する', ['action' => 'delete'], [$question->id],
                                            ['confirm' => '質問を削除します。よろしいですか？'], ['class' => 'card-link']) ?>
                </div>
            </div>
        <? endforeach; ?>

        <div class="pagninator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< 最初へ') ?>
                <?= $this->Paginator->prev('< 前へ') ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next('次へ >') ?>
                <?= $this->Paginator->last('最後へ >>') ?>
            </ul>
        </div>

    <? endif; ?>
</body>