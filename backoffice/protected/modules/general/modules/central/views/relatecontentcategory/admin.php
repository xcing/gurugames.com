<h1>Manage Relate Content Categories</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'relate-content-category-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'contentId',
            'value' => '$data->contentId != ""? $data->content->title : ""',
            'filter' => CHtml::listData(Content::model()->findAll(array('order' => 'contentId DESC')), 'contentId', 'title'),
        ),
        array(
            'name' => 'categoryId',
            'value' => '$data->category->name',
            'filter' => CHtml::listData(Category::model()->findAll(array('order' => 'categoryId DESC')), 'categoryId', 'name'),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
