<style>
    #contentLeft li {
        list-style: none;
        margin: 2px;
        padding: 10px;
        background-color:#00CCCC;
        border: #CCCCCC solid 1px;
        color:#fff;
        float:left;
        width:120px;
        height: 80px;
    }
</style>
<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerCoreScript('jquery');
$cs->registerScriptFile($baseUrl . '/js/jquery-ui-1.10.2.js');
$cs->registerCssFile($baseUrl . '/css/jquery-ui/jquery-ui-1.10.2.custom.min.css');

Yii::app()->clientScript->registerScript('topgame', "
        $('#lockPane').dialog({
                    modal: true,
                    autoOpen: false,
                    closeOnEscape: false,
        });
        $('.ui-dialog-titlebar').hide();
        $('#contentLeft ul').sortable({opacity: 0.6, cursor: 'move', update: function() {
                $('#lockPane').dialog('open');
                var order = $(this).sortable('serialize');
                $.post('" . Yii::app()->createAbsoluteUrl('/game/dota2/guidehero/sort') . "', order, function(theResponse) {
                    $('#lockPane').dialog('close');
                });
            }
        });
    ", CClientScript::POS_END);
?>

<h3>Manage Ranking GuideHero</h3>

<?php
$this->renderPartial('_searchgroup', array(
    'heroId' => $heroId,
));
?>
<div id="contentLeft">
    <ul>
        <?php foreach ($guideheros as $guideheros_data) { ?>
            <li id="recordsArray_<?php echo $guideheros_data->guideHeroId; ?>">
                <div style="width:100px;height:18px;overflow: hidden;"><?php echo $guideheros_data->ordinal . '. ' . $guideheros_data->name; ?></div>
            </li>
        <?php } ?>
        <li style="clear:both;display:none;"></li>
    </ul>
</div>
<div id="lockPane" style="text-align:center;"><img src="<?php echo Yii::app()->baseUrl; ?>/images/loading.gif" /></div> 
