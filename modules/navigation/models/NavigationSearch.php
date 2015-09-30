<?php

namespace vendor\kuakling\myiicms\modules\navigation\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\kuakling\myiicms\modules\navigation\models\Navigation;

/**
 * NavigationSearch represents the model behind the search form about `vendor\kuakling\myiicms\modules\navigation\models\Navigation`.
 */
class NavigationSearch extends Navigation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'post_date', 'update_date', 'parent_id', 'sort'], 'integer'],
            [['name', 'title', 'detail', 'attr_extra', 'display'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Navigation::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'post_date' => $this->post_date,
            'update_date' => $this->update_date,
            'parent_id' => $this->parent_id,
            'sort' => $this->sort,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'attr_extra', $this->attr_extra])
            ->andFilterWhere(['like', 'display', $this->display]);

        return $dataProvider;
    }
}
