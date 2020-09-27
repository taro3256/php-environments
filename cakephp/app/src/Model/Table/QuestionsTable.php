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

    /**
     * 回答付きの質問一覧を取得する
     *
     * @return \Cake\ORM\Query 回答付きの質問一覧クエリ
     */
    public function findQuestionsWithAnsweredCount()
    {
        $query = $this->find();
        $query
            ->select(['answered_count' => $query->func()->count('Answers.id')])
            ->leftJoinWith('Answers')
            ->group(['Questions.id'])
            ->enableAutoFields(true);

        return $query;
    }
}