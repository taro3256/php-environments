<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class QuestionsTable extends Table {
    
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('questions'); // 使用されるテーブル名
        $this->setDisplayField('id'); // list形式でデータ取得
        $this->setPrimaryKey('id'); // プライマリキー

        $this->addBehavior('Timestamp'); // 自動設定

        $this->hasMany('Answers', [
            'fireignKey' => 'question_id'
        ]);
    }
}